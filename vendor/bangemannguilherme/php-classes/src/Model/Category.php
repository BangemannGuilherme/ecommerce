<?php 

namespace BangemannGuilherme\Model;

use \BangemannGuilherme\Model;
use \BangemannGuilherme\DB\Sql;

class Category extends Model {


	public static function listAll()
	{
		$db = new Sql();

		return $db->select("SELECT * FROM tb_categories ORDER BY descategory");

	}

	public function save()
	{
		$db = new Sql();

		$results = $db->select("CALL sp_categories_save(:idcategory, :descategory)", array(
			":idcategory"=>$this->getidcategory(),
			":descategory"=>$this->getdescategory()
		));

		$this->setData($results[0]);

        Category::updateFile();

	}

	public function get($idcategory) 
    {
		$db = new Sql();
    	$results = $db->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", array(
			       ":idcategory"=>$idcategory
    ));
 
    $this->setData($results[0]);

    }

   /* public function update() {

		$db = new Sql();

        $results = $db->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)",
             array(
            ":iduser"=>$this->getiduser(),
            ":desperson"=>$this->getdesperson(),
            ":deslogin"=>$this->getdeslogin(),
            ":despassword"=>$this->getdespassword(),
            ":desemail"=>$this->getdesemail(),
            ":nrphone"=>$this->getnrphone(),
            ":inadmin"=>$this->getinadmin()
        ));

        $this->setData($results[0]);

    }*/

    public function delete() {

        $sql = new Sql();

        $sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
			':idcategory'=>$this->getidcategory()
		]);

        Category::updateFile();    

    }

    public static function updateFile() {

        $categories = Category::listAll();  //Lista categorias da DB

        $html = [];

        foreach ($categories as $row) {
            array_push($html, '<li><a href="/categories/'.$row['idcategory'].'">'.$row['descategory'].'</a></li>');
        }

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "categories-menu.html", implode('', $html));
    }

    public function getProducts($related = true) {

		$db = new Sql();

		if ($related === true) {

			return $db->select("
				SELECT * FROM tb_products WHERE idproduct IN( 
					SELECT a.idproduct 
					FROM tb_products a 
					INNER JOIN tb_productscategories b 
					ON a.idproduct = b.idproduct
					WHERE b.idcategory = :idcategory
				);
			", [
				':idcategory'=>$this->getidcategory()
			]);

		} else {

			return $db->select("
				SELECT * FROM tb_products WHERE idproduct NOT IN( 
					SELECT a.idproduct 
					FROM tb_products a 
					INNER JOIN tb_productscategories b 
					ON a.idproduct = b.idproduct
					WHERE b.idcategory = :idcategory
				);
			", [
				':idcategory'=>$this->getidcategory()
			]);


		}
	}

public function getProductsPage($page = 1, $itemsPerPage = 8)
	{

		$start = ($page - 1) * $itemsPerPage;

		$db = new Sql();

		$results = $db->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products a
			INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
			INNER JOIN tb_categories c ON c.idcategory = b.idcategory
			WHERE c.idcategory = :idcategory
			LIMIT $start, $itemsPerPage;
		", [
			':idcategory'=>$this->getidcategory()
		]);

		$resultTotal = $db->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>Product::checkList($results),
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public function addProduct(Product $product) {

		$db = new Sql();

		$db->query("INSERT INTO tb_productscategories (idcategory, idproduct) VALUES(:idcategory, :idproduct)", [
			':idcategory'=>$this->getidcategory(),
			':idproduct'=>$product->getidproduct()
		]);
	}

		public function removeProduct(Product $product) {

		$db = new Sql();

		$db->query("DELETE FROM tb_productscategories WHERE idcategory = :idcategory AND idproduct = :idproduct", [
			':idcategory'=>$this->getidcategory(),
			':idproduct'=>$product->getidproduct()
		]);
	}

	/*	public static function getGraph()
		{

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS extract(DAY FROM dtregister) AS dia, SUM(vltotal) AS total 
							FROM tb_orders GROUP BY dia");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


		return [
            'data'=>$results,
            'nrtotal'=>(int)$resultTotal[0]["nrtotal"]
			];
		}*/

	public static function getCategoryProducts() {

		$db = new Sql();

		$results = $db->select("SELECT SQL_CALC_FOUND_ROWS
		COUNT(pc.idcategory) AS quantity, c.descategory AS genre
		FROM tb_products p, tb_categories c, tb_productscategories pc
		WHERE p.idproduct=pc.idproduct AND c.idcategory=pc.idcategory
		GROUP BY descategory
		ORDER BY quantity");

		$resultTotal = $db->select("SELECT FOUND_ROWS() AS nrtotal;");


		return [
            'data'=>$results,
            'nrtotal'=>(int)$resultTotal[0]["nrtotal"]
			];
	}

	public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_categories 
			ORDER BY descategory
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
			FROM tb_categories 
			WHERE descategory LIKE :search
			ORDER BY descategory
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

	public static function getPageSearchBox($id , $nome, $page = 1, $itemsPerPage = 8)
	{
 
	   $start = ($page - 1) * $itemsPerPage;
 
	   $sql = new Sql();
 
	   $results = $sql->select("
		  SELECT SQL_CALC_FOUND_ROWS *
		  FROM tb_categories
		  WHERE idcategory LIKE :id
		  AND descategory LIKE :nome
		  ORDER BY descategory
		  LIMIT $start, $itemsPerPage;
	   ", [
		  ':id'=>'%'.$id.'%',
		  ':nome'=>'%'.$nome.'%'
	   ]);
 
	   $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");
 
	   return [
		  'data'=>$results,
		  'total'=>(int)$resultTotal[0]["nrtotal"],
		  'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
	   ];
 
	}

}





 ?>