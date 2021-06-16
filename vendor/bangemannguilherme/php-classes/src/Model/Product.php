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

}

 ?>