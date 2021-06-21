<?php 

namespace BangemannGuilherme\Model;

use \BangemannGuilherme\Model;
use \BangemannGuilherme\DB\Sql;

class Report extends Model {

    public static function reportGames()
	{
		$db = new Sql();

		return $db->select("SELECT * FROM tb_products ORDER BY desproduct");

	}

    public static function reportCategories()
	{
		$db = new Sql();

		return $db->select("SELECT * FROM tb_categories ORDER BY idcategory");

	}

    public static function reportOrders()
	{
		$db = new Sql();

		return $db->select("SELECT o.idorder, p.desperson, p.desemail, os.desstatus, o.vltotal, o.dtregister
        FROM tb_orders o, tb_ordersstatus os, tb_users u, tb_persons p
        WHERE o.idstatus=os.idstatus AND o.iduser=u.iduser AND u.idperson=p.idperson");

	}

    public static function reportGenresxProd()
	{
		$db = new Sql();

		return $db->select("SELECT pc.idcategory, c.descategory, p.desproduct
        FROM tb_products p, tb_categories c, tb_productscategories pc
        WHERE p.idproduct=pc.idproduct AND c.idcategory=pc.idcategory");

	}

    public static function reportPersons()
	{
		$db = new Sql();

		return $db->select("SELECT p.desperson, p.desemail, p.nrphone, u.deslogin, u.inadmin, u.dtregister
        FROM tb_persons p, tb_users u
        WHERE p.idperson=u.idperson
        ORDER BY u.dtregister");

	}

}

?>