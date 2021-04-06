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
    }

}

 ?>