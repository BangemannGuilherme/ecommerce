<?php

use \BangemannGuilherme\Page;
use \BangemannGuilherme\Model\Product;
use \BangemannGuilherme\Model\Category;
use \BangemannGuilherme\Model\Cart;
use \BangemannGuilherme\Model\User;
use \BangemannGuilherme\Model\Address;
use \BangemannGuilherme\Model\Order;
use \BangemannGuilherme\Model\OrderStatus;


$app->get('/', function() {

	$products = Product::listAll();

	$page = new Page();

	$page->setTpl("index", [
		'products'=>Product::checkList($products)
	]);

});

$app->get("/products", function(){

	//User::verifyLogin();



	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;



	if ($search != '') {

		$pagination = Product::getPageSearch($search, $page);


	} else {

		$pagination = Product::getPage($page);


	}


	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/products?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	} 



	$page = new Page();


  	$page->setTpl("products", [
		"products"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	]);

});

$app->get("/categories/:idcategory", function($idcategory){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$category = new Category();

	$category->get((int)$idcategory);

	$pagination = $category->getProductsPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/category/'.$category->getidcategory().'?page='.$i,
			'page'=>$i
		]);
	}

	$page = new Page();

	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'products'=>$pagination["data"],
		'pages'=>$pages
	]);

});

$app->get("/products/:desurl", function($desurl){

	$product = new Product();

	$product->getFromURL($desurl);

	$page = new Page();

	$page->setTpl("single", [
		'product'=>$product->getValues(),
		'categories'=>$product->getCategories()
	]);

});

$app->get("/cart", function() {

	$cart = Cart::getFromSession();

	$page = new Page();

	$page -> setTpl("cart", [
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts(),
		'error'=>Cart::getMsgError()
	]);

});

$app->get("/cart/:idproduct/add", function($idproduct) {

	$product = new Product();

	$product->get((int)$idproduct);

	$cart = Cart::getFromSession();

	$qtd = (isset($_GET['qtd'])) ? (int)$_GET['qtd'] : 1;

	for ($i=0; $i < $qtd; $i++) { 
		
		$cart->addProduct($product);	
	}

	header("Location: /cart");
	exit;

});

$app->get("/cart/:idproduct/delete", function($idproduct) {

	$product = new Product();

	$product->get((int)$idproduct);

	$cart = Cart::getFromSession();

	$cart->removeProduct($product);

	header("Location: /cart");
	exit;

});

$app->get("/cart/:idproduct/deleteall", function($idproduct) {

	$product = new Product();

	$product->get((int)$idproduct);

	$cart = Cart::getFromSession();

	$cart->removeProduct($product, true);

	header("Location: /cart");
	exit;

});

$app->get("/cart", function() {

	$cart = Cart::getFromSession();

	$page = new Page();

	$page -> setTpl("cart", [
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts(),
		'error'=>Cart::getMsgError()
	]);

});

$app->get("/checkout", function() {

	User::verifyLogin(false);

	$address = new Address();

	$cart = Cart::getFromSession();

	if (!isset($_GET['zipcode'])) {

		$_GET['zipcode'] = $cart->getdeszipcode();

	}

	if (isset($_GET['zipcode'])) {

		$address->loadFromCEP($_GET['zipcode']);

		$cart->setdeszipcode($_GET['zipcode']);

		$cart->save();

		$cart->getCalculateTotal();

	}

	if (!$address->getdesaddress()) $address->setdesaddress('');
	if (!$address->getdescomplement()) $address->setdescomplement('');
	if (!$address->getdesdistrict()) $address->setdesdistrict('');
	if (!$address->getdescity()) $address->setdescity('');
	if (!$address->getdesstate()) $address->setdesstate('');
	if (!$address->getdescountry()) $address->setdescountry('');
	if (!$address->getdeszipcode()) $address->setdeszipcode('');

	$page = new Page();

	$page->setTpl("checkout", [
		'cart'=>$cart->getValues(),
		'address'=>$address->getValues(),
		'products'=>$cart->getProducts(),
		'error'=>Address::getMsgError()
	]);

});


$app->post("/checkout", function(){

	User::verifyLogin(false);

	if (!isset($_POST['zipcode']) || $_POST['zipcode'] === '') {
		Address::setMsgError("Informe o CEP.");
		header('Location: /checkout');
		exit;
	}

	if (!isset($_POST['desaddress']) || $_POST['desaddress'] === '') {
		Address::setMsgError("Informe o endereço.");
		header('Location: /checkout');
		exit;
	}

	if (!isset($_POST['desdistrict']) || $_POST['desdistrict'] === '') {
		Address::setMsgError("Informe o bairro.");
		header('Location: /checkout');
		exit;
	}

	if (!isset($_POST['descity']) || $_POST['descity'] === '') {
		Address::setMsgError("Informe a cidade.");
		header('Location: /checkout');
		exit;
	}

	if (!isset($_POST['desstate']) || $_POST['desstate'] === '') {
		Address::setMsgError("Informe o estado.");
		header('Location: /checkout');
		exit;
	}

	if (!isset($_POST['descountry']) || $_POST['descountry'] === '') {
		Address::setMsgError("Informe o país.");
		header('Location: /checkout');
		exit;
	}

	$user = User::getFromSession();

	$address = new Address();

	$_POST['deszipcode'] = $_POST['zipcode'];
	$_POST['idperson'] = $user->getidperson();

	$address->setData($_POST);

	$address->save();

	$cart = Cart::getFromSession();

	$totals = $cart->getCalculateTotal();

	$order = new Order();

	$order->setData([
		'idcart'=>$cart->getidcart(),
		'idaddress'=>$address->getidaddress(),
		'iduser'=>$user->getiduser(),
		'idstatus'=>OrderStatus::EM_ABERTO,
		'vltotal'=>$cart->getvltotal()
	]);

	$order->save();

	header("Location: /order/".$order->getidorder());

	/*switch ((int)$_POST['payment-method']) {
		case 1:
		header("Location: /order/".$order->getidorder()."/pagseguro");
		break;
		case 2:
		header("Location: /order/".$order->getidorder()."/paypal");
		break;
	}*/

	exit;

});

/*$app->get("/login", function() {

	$page = new Page();

	$page->setTpl("login");

});*/

$app->get("/login", function(){

	$page = new Page();

	$page->setTpl("login", [
		'error'=>User::getError(),
		'errorRegister'=>User::getErrorRegister(),
		'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>'']
	]);

});

$app->post("/login", function(){

	try {

		User::login($_POST['login'], $_POST['password']);

	} catch(Exception $e) {

		User::setError($e->getMessage());

	}

	header("Location: /checkout");
	exit;

});

$app->get("/logout", function(){

	User::logout();

	header("Location: /login");
	exit;

});

$app->post("/register", function(){

	$_SESSION['registerValues'] = $_POST;

	if (!isset($_POST['name']) || $_POST['name'] == '') {

		User::setErrorRegister("Insert your name");
		header("Location: /login");
		exit;

	}

	if (!isset($_POST['email']) || $_POST['email'] == '') {

		User::setErrorRegister("Insert your e-mail.");
		header("Location: /login");
		exit;

	}

	if (!isset($_POST['password']) || $_POST['password'] == '') {

		User::setErrorRegister("Insert your password.");
		header("Location: /login");
		exit;

	}

	if (User::checkLoginExist($_POST['email']) === true) {

		User::setErrorRegister("This e-mail address is already in use by another user.");
		header("Location: /login");
		exit;

	}

	$user = new User();

	$user->setData([
		'inadmin'=>0,
		'deslogin'=>$_POST['email'],
		'desperson'=>$_POST['name'],
		'desemail'=>$_POST['email'],
		'despassword'=>$_POST['password'],
		'nrphone'=>$_POST['phone']
	]);

	$user->save();

	User::login($_POST['email'], $_POST['password']);

	header('Location: /checkout');
	exit;

});

$app->get("/profile", function(){

	User::verifyLogin(false);

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl("profile", [
		'user'=>$user->getValues(),
		'profileMsg'=>User::getSuccess(),
		'profileError'=>User::getError()
	]);

});

$app->post("/profile", function(){

	User::verifyLogin(false);

	if (!isset($_POST['desperson']) || $_POST['desperson'] === '') {
		User::setError("Please, insert your Name.");
		header('Location: /profile');
		exit;
	}

	if (!isset($_POST['desemail']) || $_POST['desemail'] === '') {
		User::setError("Please, insert your E-mail.");
		header('Location: /profile');
		exit;
	}

	$user = User::getFromSession();

	if ($_POST['desemail'] !== $user->getdesemail()) {

		if (User::checkLoginExist($_POST['desemail']) === true) {

			User::setError("This E-mail Address is already registered.");
			header('Location: /profile');
			exit;

		}

	}

	$_POST['iduser'] = $user->getiduser();
	$_POST['inadmin'] = $user->getinadmin();
	$_POST['despassword'] = $user->getdespassword();
	$_POST['deslogin'] = $_POST['desemail'];

	$user->setData($_POST);

	$user->update();

	$_SESSION[User::SESSION] = $user->getValues();

	User::setSuccess("Successfully changed information!");

	header('Location: /profile');
	exit;

});

$app->get("/order/:idorder", function($idorder){

	User::verifyLogin(false);

	$order = new Order();

	$order->get((int)$idorder);

	$page = new Page();

	$page->setTpl("payment", [
		'order'=>$order->getValues()
	]);

});

/*$app->get("/payment/:idorder", function($idorder) {
	
	User::verifyLogin(false);

	$order = new Order();

	$order->get((int)$idorder);

	// DADOS DO BOLETO PARA O SEU CLIENTE
	$days_of_deadline_for_payment = 10;
	$paymentslip_fee = 5.00;
	$due_date = date("d/m/Y", time() + ($days_of_deadline_for_payment * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 

	$amount_charged = formatPrice($order->getvltotal()); // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
	$amount_charged = str_replace(".", "", $amount_charged);
	$amount_charged = str_replace(",", ".",$amount_charged);
	$amount_paymentslip=number_format($amount_charged+$paymentslip_fee, 2, ',', '');

	$data_paymentslip["number"] = $order->getidorder();  // Nosso numero - REGRA: Máximo de 8 caracteres!
	$data_paymentslip["document_number"] = $order->getidorder();	// Num do pedido ou nosso numero
	$data_paymentslip["due_date"] = $due_date; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
	$data_paymentslip["document_date"] = date("d/m/Y"); // Data de emissão do Boleto
	$data_paymentslip["processing_date"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
	$data_paymentslip["amount_paymentslip"] = $amount_paymentslip; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

	// DADOS DO SEU CLIENTE
	$data_paymentslip["withdrawn"] = $order->getdesperson();
	$data_paymentslip["address1"] = $order->getdesaddress() . " " . $order->getdesdistrict();
	$data_paymentslip["address2"] = $order->getdescity() . " - " . $order->getdesstate() . " - " . $order->getdescountry() . " -  CEP: " . $order->getdeszipcode();

	// INFORMACOES PARA O CLIENTE
	$data_paymentslip["demonstrative1"] = "Pagamento de Compra na Loja Edu Store E-commerce";
	$data_paymentslip["demonstrative2"] = "Taxa bancária - R$ 0,00";
	$data_paymentslip["demonstrative3"] = "";
	$data_paymentslip["info1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
	$data_paymentslip["info2"] = "- Receber até 10 dias após o vencimento";
	$data_paymentslip["info3"] = "- Em caso de dúvidas entre em contato conosco: suporte@edustore.com.br";
	$data_paymentslip["info4"] = "&nbsp; Emitido pelo sistema Loja Edu Store E-commerce - www.edustore.com.br";

	// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
	$data_paymentslip["quantidade"] = "";
	$data_paymentslip["valor_unitario"] = "";
	$data_paymentslip["aceite"] = "";		
	$data_paymentslip["especie"] = "R$";
	$data_paymentslip["especie_doc"] = "";


	// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


	// DADOS DA SUA CONTA - ITAÚ
	$data_paymentslip["agencia"] = "1690"; // Num da agencia, sem digito
	$data_paymentslip["conta"] = "48781";	// Num da conta, sem digito
	$data_paymentslip["conta_dv"] = "2"; 	// Digito do Num da conta

	// DADOS PERSONALIZADOS - ITAÚ
	$data_paymentslip["carteira"] = "175";  // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157

	// SEUS DADOS
	$data_paymentslip["identificacao"] = "Edu Store";
	$data_paymentslip["cpf_cnpj"] = "24.700.731/0001-08";
	$data_paymentslip["endereco"] = "Rua Ademar Saraiva Leão, 234 - Alvarenga, 09853-120";
	$data_paymentslip["cidade_uf"] = "São Bernardo do Campo - SP";
	$data_paymentslip["cedente"] = "Edu Store LTDA - ME";

	// NÃO ALTERAR!
	$path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "resources" . DIRECTORY_SEPARATOR . "payment slipphp" . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR;

	require_once($path . "func_itau.php");
	require_once($path . "layout_itau.php");

});*/

?>