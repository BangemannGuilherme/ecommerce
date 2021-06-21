<?php


use \BangemannGuilherme\PageAdmin;
use \BangemannGuilherme\Model\User;
use \BangemannGuilherme\Model\Category;
use \BangemannGuilherme\Model\Order;

$app->get('/admin/graphs', function() {
    
	User::verifyLogin();

	$page = new PageAdmin();

	$categoryproduct = Category::getCategoryProducts();

	//var_dump($categoryproduct);
	//exit;

	//$pg = [];

	//for ($i=0; $i <= $order['nrtotal']; $i++) { 
	//	array_push($pg, [
	//		'nr'=>$pg
	//	]);
	//}

	

	$page->setTpl("graph", [
		'category'=>$categoryproduct['data']
		//'tot'=>$tot
	]);

});

$app->get('/admin', function() {

	User::verifyLogin();
	
	$page = new PageAdmin();

	$page->setTpl("index");
	
});

$app->get('/admin/login', function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login", [
		"msgError"=>User::getError()
	]);

});

$app->post('/admin/login', function() {

	User::login($_POST["login"], $_POST["password"]);

	if(!isset($_GET["error"]) !== 0)
	{
		User::setError("Invalid User or Password!");

		header("Location: /admin/login");

	}

	header("Location: /admin");
	exit;

});

/*$app->get('/admin', function() {

	User::verifyLogin();
	
	$page = new PageAdmin();

	$page->setTpl("index");
	
});

$app->get('/admin/login/', function() {
    
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login", [
		"msgError"=>User::getError()
	]);

});

$app->post('/admin/login/', function() {

	User::login($_POST["login"], $_POST["password"]);

	//teste msg error

	if (!isset($_GET["error1"]) !== 0) {

		User::setError("Login ou senha incorretos!");

		
		header("Location: /admin/login/");
		//exit;
	}

	header("Location: /admin");
	exit;
	
});*/

$app->get('/admin/logout', function() {

	User::logout();

	User::setError("");

	header("Location: /admin/login");
	exit;
	
});


$app->get('/admin/forgot', function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot");

});

$app->post("/admin/forgot", function(){

	$user = User::getForgot($_POST["email"]);

	header("Location: /admin/forgot/sent");
	exit;

});

$app->get("/admin/forgot/sent", function(){

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-sent");	

});


$app->get("/admin/forgot/reset", function(){

	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-reset", array(
		"name"=>$user["desperson"],
		"code"=>$_GET["code"]
	));

});

$app->post("/admin/forgot/reset", function(){

	$forgot = User::validForgotDecrypt($_POST["code"]);	

	User::setForgotUsed($forgot["idrecovery"]);

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$password = User::getPasswordHash($_POST["password"]);

	$user->setPassword($password);

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-reset-success");

});



?>