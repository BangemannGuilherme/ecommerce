<?php

use \BangemannGuilherme\PageAdmin;
use \BangemannGuilherme\Model\User;
use \BangemannGuilherme\Model\Category;
use \BangemannGuilherme\Model\Product;

/*$app->get("/admin/categories", function(){

	User::verifyLogin();

	$id = (isset($_GET['id'])) ? $_GET['id'] : "";
	$nome = (isset($_GET['nome'])) ? $_GET['nome'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;


	if ($id != '' || $nome != '') {

		$pagination = Product::getPageSearchBox($id, $nome, $page, 10);

	} else {

		$pagination = Product::getPage($page, 10);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++) {

		array_push($pages, [
			'href'=>'/admin/categories?'.http_build_query([
				'page'=>$x+1,
				'id'=>$id,
				'nome'=>$nome
			]),
			'text'=>$x+1,
		]);
	}

	//var_dump($pagination['data']);
	//exit;

	$page = new PageAdmin();

	$page->setTpl("categories", [
		"categories"=>$pagination['data'],
		"pages"=>$pages,
		"id"=>$id,
		"nome"=>$nome
	]);


});*/

$app->get("/admin/categories", function(){

	User::verifyLogin();

	$id = (isset($_GET['id'])) ? $_GET['id'] : "";
	$nome = (isset($_GET['nome'])) ? $_GET['nome'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($id != '' || $nome != '') {

		$pagination = Category::getPageSearchBox($id, $nome, $page);

	} else {

		$pagination = Category::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/categories?'.http_build_query([
				'page'=>$x+1,
				'id'=>$id,
				'nome'=>$nome
			]),
			'text'=>$x+1
		]);

	}

	$page = new PageAdmin();

	$page->setTpl("categories", [
		"categories"=>$pagination['data'],
		"id"=>$id,
		"nome"=>$nome,
		"pages"=>$pages
	]);	


});

/*$app->get("/admin/categories", function() {

	User::verifyLogin();

	$categories = Category::listAll();

	$page = new PageAdmin();

	$page->setTpl("categories", [
		'categories'=>$categories
	]);

});*/

$app->get("/admin/categories/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("categories-create");

});

$app->post("/admin/categories/create", function() {

	User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header('Location: /admin/categories');
	exit;

});

$app->get("/admin/categories/:idcategory/delete", function($idcategory) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header('Location: /admin/categories');
	exit;


});

	$app->get("/admin/categories/:idcategory", function($idcategory) {

	User::verifyLogin();
	
	$category = new Category();

	$category->get((int)$idcategory);


	$page = new PageAdmin();

	$page->setTpl("categories-update", [
		'category'=>$category->getValues()
	]);

});

	$app->post("/admin/categories/:idcategory", function($idcategory) {

	User::verifyLogin();
	
	$category = new Category();

	$category->get((int)$idcategory);

	$category->setData($_POST);

	$category->save();

	header('Location: /admin/categories');
	exit;

});

/*$app->get("/categories/:idcategory", function($idcategory)
{
	$category = new Category();

	$category->get((int)$idcategory);

	$page = new Page();

	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'products'=>[]
	]);

});*/

$app->get("/categories/:idcategory/products", function ($idcategory) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new PageAdmin();

	$page->setTpl("categories-products", [
	 	'category'=>$category->getValues(),
	 	'productsRelated'=>$category->getProducts(),
	 	'productsNotRelated'=>$category->getProducts(false)
	]);

});

$app->get("/admin/categories/:idcategory/products", function ($idcategory) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new PageAdmin();

	$page->setTpl("categories-products", [
	 	'category'=>$category->getValues(),
	 	'productsRelated'=>$category->getProducts(),
	 	'productsNotRelated'=>$category->getProducts(false)
	]);

});

$app->get("/admin/categories/:idcategory/products/:idproduct/add", function ($idcategory, $idproduct) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$product = new Product();

	$product->get((int)$idproduct);

	$category->addProduct($product);

	header("Location: /admin/categories/".$idcategory."/products");
	exit;
	

});

$app->get("/admin/categories/:idcategory/products/:idproduct/remove", function ($idcategory, $idproduct) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$product = new Product();

	$product->get((int)$idproduct);

	$category->removeProduct($product);

	header("Location: /admin/categories/".$idcategory."/products");
	exit;
	

});



?>