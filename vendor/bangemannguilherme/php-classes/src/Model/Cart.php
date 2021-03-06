<?php

namespace BangemannGuilherme\Model;

use \BangemannGuilherme\DB\Sql;
use \BangemannGuilherme\Model;
use \BangemannGuilherme\Model\Product;
use \BangemannGuilherme\Model\User;

class Cart extends Model {

	const SESSION = "Cart";
	const SESSION_ERROR = "CartError";

	public static function getFromSession() {

		$cart = new Cart();

		if (isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['idcart'] > 0) {

			$cart->get((int)$_SESSION[Cart::SESSION]['idcart']);
		} else {

			$cart->getFromSessionID();

			if (!(int)$cart->getidcart() > 0) {

				$data = [
					'dessessionid'=>session_id()
				];

				if (User::checkLogin(false)) {

					$user = User::getFromSession();

					$data['iduser'] = $user->getiduser();

				}

				$cart->setData($data);

				$cart->save();

				$cart->ToSession();

			}

		}

		return $cart;
	}

	public function ToSession() {

		$_SESSION[Cart::SESSION] = $this->getValues();
	}

	public function getFromSessionID() {

		$db = new Sql();

		$results = $db->select("SELECT * FROM tb_carts WHERE dessessionid = :dessessionid", [
			':dessessionid'=>session_id()
		]);

		if (count($results) > 0) {

			$this->setData($results[0]);

		}

	}


	public function get(int $idcart) {

		$db = new Sql();

		$results = $db->select("SELECT * FROM tb_carts WHERE idcart = :idcart", [
			':idcart'=>$idcart
		]);

		if (count($results) > 0) {

			$this->setData($results[0]);

		}
	
	}

	public function save()
	{

		$db = new Sql();

		$results = $db->select("CALL sp_carts_save(:idcart, :dessessionid, :iduser)", [
			':idcart'=>$this->getidcart(),
			':dessessionid'=>$this->getdessessionid(),
			':iduser'=>$this->getiduser()
		]);

		$this->setData($results[0]);

	}


	public function addProduct(Product $product) {

		$db = new Sql();

		$db->query("INSERT INTO tb_cartsproducts (idcart, idproduct) VALUES(:idcart, :idproduct)", [
			':idcart'=>$this->getidcart(),
			':idproduct'=>$product->getidproduct()
		]);

        $this->getCalculateTotal();

	}

	public function removeProduct(Product $product, $all = false) {

		$db = new Sql();

		if ($all) {

		$db->query("UPDATE tb_cartsproducts SET dtremoved = NOW() WHERE idcart = :idcart AND idproduct = :idproduct AND dtremoved IS NULL", [
			':idcart'=>$this->getidcart(),
			':idproduct'=>$product->getidproduct()
		]);

		} else {

		$db->query("UPDATE tb_cartsproducts SET dtremoved = NOW() WHERE idcart = :idcart AND idproduct = :idproduct AND dtremoved IS NULL LIMIT 1", [
			':idcart'=>$this->getidcart(),
			':idproduct'=>$product->getidproduct()
		]);

	    }

        $this->getCalculateTotal();

    }

	public function getProducts() {

		$db = new Sql();

		$rows = $db->select("
			SELECT b.idproduct, b.desproduct , b.vlprice, b.desurl, COUNT(*) AS nrqtd, SUM(b.vlprice) AS vltotal 
			FROM tb_cartsproducts a 
			INNER JOIN tb_products b ON a.idproduct = b.idproduct 
			WHERE a.idcart = :idcart AND a.dtremoved IS NULL 
			GROUP BY b.idproduct, b.desproduct, b.vlprice, b.desurl 
			ORDER BY b.desproduct
		", [
			':idcart'=>$this->getidcart()
		]);

		return Product::checkList($rows);

	}

	public function getProductsTotals()
	{

		$db = new Sql();

		$results = $db->select("
			SELECT SUM(vlprice) AS vlprice, COUNT(*) AS nrqtd
			FROM tb_products a
			INNER JOIN tb_cartsproducts b ON a.idproduct = b.idproduct
			WHERE b.idcart = :idcart AND dtremoved IS NULL;
		", [
			':idcart'=>$this->getidcart()
		]);

		if (count($results) > 0) {
			return $results[0];
		} else {
			return [];
		}

	}

	public static function formatValueToDecimal($value):float {

		$value = str_replace('.', '', $value);
		return str_replace(',', '.', $value);

	}

	public static function setMsgError($msg) {

		$_SESSION[Cart::SESSION_ERROR] = $msg;

	}

	public static function getMsgError() {

		$msg = (isset($_SESSION[Cart::SESSION_ERROR])) ? $_SESSION[Cart::SESSION_ERROR] : "";

		Cart::clearMsgError();

		return $msg;
	}

	public static function clearMsgError() {

		$_SESSION[Cart::SESSION_ERROR] = NULL;
	}


	public function getValues()
	{
		
		$this->getCalculateTotal();

		return parent::getValues();
	}

    public function getCalculateTotal()
    {

        $totals = $this->getProductsTotals();

        $this->setvlsubtotal($totals['vlprice']);
        $this->setvltotal($totals['vlprice']);
    }

}

?>