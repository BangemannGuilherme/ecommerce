<?php 

namespace BangemannGuilherme\Model;

use \BangemannGuilherme\Model;
use \BangemannGuilherme\DB\Sql;

class Product extends Model {


	public static function listAll()
	{
		$db = new Sql();

		return $db->select("SELECT * FROM tb_products ORDER BY desproduct");

	}

    public static function checkList($list)
    {

        foreach ($list as &$row) {

            $r = new Product();
            $r->setData($row);
            $row = $r->getValues();
        }

        return $list;

    }

	public function save()
	{
		$db = new Sql();

		$results = $db->select("CALL sp_products_save(:idproduct, :desproduct, :vlprice, :desurl)", array(
			":idproduct"=>$this->getidproduct(),
			":desproduct"=>$this->getdesproduct(),
            ":vlprice"=>$this->getvlprice(),
            ":desurl"=>$this->getdesurl()
		));

		$this->setData($results[0]);

	}

	public function get($idproduct) 
    {
		$db = new Sql();
    	$results = $db->select("SELECT * FROM tb_products WHERE idproduct = :idproduct", array(
			       ":idproduct"=>$idproduct
    ));
 
    $this->setData($results[0]);

    }

    public function delete() {

        $sql = new Sql();

        $sql->query("DELETE FROM tb_products WHERE idproduct = :idproduct", [
			':idproduct'=>$this->getidproduct()
		]);
    }

    public function checkPhoto() {

        if (file_exists(
            $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
            "resources" . DIRECTORY_SEPARATOR . 
            "site" . DIRECTORY_SEPARATOR . 
            "images" . DIRECTORY_SEPARATOR .
            "products" . DIRECTORY_SEPARATOR . 
            $this->getidproduct() . ".jpg"
            )) {

            $url = "/resources/site/images/products/" . $this->getidproduct() . ".jpg";

        } else {

            $url = "/resources/site/images/products/product.jpg";

        }

        return $this->setdesphoto($url);
    }

    public function getValues() {

        $this->checkPhoto();

        $values = parent::getValues();

        return $values;

    }

    public function setPhoto($file) {

        $extension = explode('.', $file['name']);
        $extension = end($extension);

        switch ($extension) {

            case "jpg":
            case "jpeg":
            $image = imagecreatefromjpeg($file["tmp_name"]);
            break;

            case "gif":
            $image = imagecreatefromgif($file["tmp_name"]);
            break;

            case "png":
            $image = imagecreatefrompng($file["tmp_name"]);
            break;

        }

       $dest = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
            "resources" . DIRECTORY_SEPARATOR . 
            "site" . DIRECTORY_SEPARATOR . 
            "images" . DIRECTORY_SEPARATOR . 
            "products" . DIRECTORY_SEPARATOR .
            $this->getidproduct() . ".jpg";

        imagejpeg($image, $dest);

        imagedestroy($image);
        
        $this->checkPhoto();

    }

    public function getFromURL($desurl)
    {
        $db = new Sql();
        
        $rows = $db->select("SELECT * FROM tb_products WHERE desurl = :desurl LIMIT 1", [
            ':desurl'=>$desurl
        ]);

        $this->setData($rows[0]);

    }

    public function getCategories() 
    {
        $db = new Sql();
        
        return $db->select("SELECT * FROM tb_categories a INNER JOIN tb_productscategories b ON a.idcategory = b.idcategory WHERE b.idproduct =
                    :idproduct
        ", [
            ':idproduct'=>$this->getidproduct()
        ]);


    }

    public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS
            p.idproduct, p.desproduct, c.descategory, p.vlprice, p.desurl
            FROM tb_products p, tb_categories c, tb_productscategories pc
            WHERE p.idproduct=pc.idproduct AND c.idcategory=pc.idcategory
			ORDER BY p.desproduct
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>Product::checkList($results),
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products 
			WHERE desproduct LIKE :search
			ORDER BY desproduct
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>Product::checkList($results),
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

    public static function getPageSearchBox($id, $nome, $category, $preco, $page = 1, $itemsPerPage = 8)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();


        $results = $sql->select("
            SELECT SQL_CALC_FOUND_ROWS
            p.idproduct, p.desproduct, c.descategory, p.vlprice
            FROM tb_products p, tb_categories c, tb_productscategories pc
            WHERE p.idproduct=pc.idproduct AND c.idcategory=pc.idcategory
            AND p.idproduct LIKE :id
			AND p.desproduct LIKE :nome
            AND c.descategory LIKE :category
			AND p.vlprice LIKE :preco
            LIMIT $start, $itemsPerPage;
        ", [
            ':id'=>'%'.$id.'%',
            ':nome'=>'%'.$nome.'%',
            ':category'=>'%'.$category.'%',
            ':preco'=>'%'.$preco.'%'
        ]);

        //var_dump($results);
        //exit;

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        foreach ($results as &$result) {
            
        $result['desphoto'] = "/resources/site/images/products/" .$result['idproduct'] . ".jpg";
 
        }

        return [
            'data'=>Product::checkList($results),
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage),
        ];

    }

    /*public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products 
			ORDER BY desproduct
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products 
			WHERE desproduct LIKE :search
			ORDER BY desproduct
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}
    
    public static function getPageSearchBox($id, $nome, $preco, $page = 1, $itemsPerPage = 8)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();


        $results = $sql->select("
            SELECT SQL_CALC_FOUND_ROWS *
            FROM tb_products
            WHERE idproduct LIKE :id
			AND desproduct LIKE :nome
			AND vlprice LIKE :preco
            ORDER BY desproduct
            LIMIT $start, $itemsPerPage;
        ", [
            ':id'=>'%'.$id.'%',
            ':nome'=>'%'.$nome.'%',
            ':preco'=>'%'.$preco.'%'
        ]);

        //var_dump($results);
        //exit;

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        foreach ($results as &$result) {
            
        $result['desphoto'] = "/resources/site/images/products/" .$result['idproduct'] . ".jpg";
 
        }

        return [
            'data'=>Product::checkList($results),
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage),
        ];

    }*/



    


}

 ?>