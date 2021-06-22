<?php

use \BangemannGuilherme\PageAdmin;
use \BangemannGuilherme\Model\User;
use \BangemannGuilherme\Model\Order;
use \BangemannGuilherme\Model\OrderStatus;


$app->get("/admin/orders/:idorder/status", function($idorder) {

	User::verifyLogin();

	$order = new Order();

	$order->get((int)$idorder);

	$page = new PageAdmin();

	$page->setTpl("order-status", [
		'order'=>$order->getValues(),
		'status'=>OrderStatus::listAll(),
		'msgSuccess'=>Order::getSuccess(),
		'msgError'=>Order::getError()

	]);

});

$app->post("/admin/orders/:idorder/status", function($idorder) {

	User::verifyLogin();

	if (!isset($_POST['idstatus']) || !(int)$_POST['idstatus'] > 0) {
		Order::setError("Informe o status atual.");
		header("Location: /admin/orders/".$idorder."/status");
		exit;
	}

	$order = new Order();

	$order->get((int)$idorder);

	$order->setidstatus((int)$_POST['idstatus']);

	$order->save();

	Order::setSuccess("Status atualizado!");

	header("Location: /admin/orders/".$idorder."/status");
	exit;

});



$app->get("/admin/orders/:idorder/delete", function($idorder) {

	User::verifyLogin();

	$order = new Order();

	$order->get((int)$idorder);

	$order->delete();

	header("Location: /admin/orders");
	exit;

 });

$app->get("/admin/orders/:idorder", function($idorder) {

	User::verifyLogin();

	$order = new Order();

	$order->get((int)$idorder);

	$cart = $order->getCart();

	$page = new PageAdmin();

	$page->setTpl("order", [
		'order'=>$order->getValues(),
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts()

	]);

 });

/*$app->get("/admin/orders", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("orders", [
		'orders'=>Order::listAll()


	]);

});*/

$app->get("/admin/orders", function() {

	User::verifyLogin();

	$id = (isset($_GET['id'])) ? $_GET['id'] : "";
	$nome = (isset($_GET['nome'])) ? $_GET['nome'] : "";
	$vltotal = (isset($_GET['vltotal'])) ? $_GET['vltotal'] : "";
	$status = (isset($_GET['status'])) ? $_GET['status'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	

	if ($id != '' || $nome != '' || $vltotal != '' || $status != '') {

		$pagination = Order::getPageSearchBox($id, $nome, $vltotal, $status, $page, 10);

	} else {

		$pagination = Order::getPage($page, 10);

	}


	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++) {

		array_push($pages, [
			'href'=>'/admin/orders?'.http_build_query([
				'page'=>$x+1,
				'id'=>$id,
				'nome'=>$nome,
				'vltotal'=>$vltotal,
				'status'=>$status
			]),
			'text'=>$x+1
		]);
	}

	$page = new PageAdmin();

	$page->setTpl("orders", array(
		"orders"=>$pagination['data'],
		"pages"=>$pages,
		"id"=>$id,
		"nome"=>$nome,
		'vltotal'=>$vltotal,
		'status'=>$status
	));


});


?>