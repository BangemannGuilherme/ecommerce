<?php

use \BangemannGuilherme\Model\User;
use \BangemannGuilherme\Model\Cart;
	
function formatPrice($vLprice) {

	return number_format($vLprice, 2, ",", ".");
}

function formatDate($date) {

	return date ('d/m/Y', strtotime($date));
}


function checkLogin($inadmin = true) {

	return User::checkLogin($inadmin);

}

function getUserName() {

	$user = User::getFromSession();

	return $user->getdesperson();
}

function getCartNrQtd()
{
		$cart = Cart::getFromSession();

		$totals = $cart->getProductsTotals();

		return $totals['nrqtd'];
}

function getCartVlSubTotal()
{
		$cart = Cart::getFromSession();

		$totals = $cart->getProductsTotals();

		return formatPrice($totals['vlprice']);
}

?>