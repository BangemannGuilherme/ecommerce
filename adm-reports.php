<?php

use \BangemannGuilherme\PageAdmin;
use \BangemannGuilherme\Model\User;
use \BangemannGuilherme\Model\Product;
use \BangemannGuilherme\DB\Sql;
use \Dompdf\Dompdf;


$app->get("/admin/reports", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("reports");


});

$app->get("/admin/reports/games", function() {

	User::verifyLogin();

	$allgames = Product::reportGames();

	//var_dump($product);
	//die;

	$db = new Sql();


	// INSTACIAR A CLASSE DOM PDF
	$pdf = new Dompdf();


	$html = "
	<style>
		table {
    	font-family: arial, sans-serif;
    	border-collapse: collapse;
    	width: 100%;
	}
	td, th {
    	border: 1px solid #black;
    	text-align: left;
	}
    </style>
	<h1>
	Relatório de Produtos
	</h1>
	<table>
  	<tr style='background-color: gray'>
    <th>ID</th>
    <th>Name</th>
    <th>Preço(R$)</th>
    <th>Data Registro</th>
  </tr>
	";

	foreach ($allgames as $games) {

	 $html .= '
  	<tr>
   		<td>'.$games["idproduct"].'</td>
   		<td>'.$games["desproduct"].'</td>
   		<td>'.$games["vlprice"].'</td>
   		<td>'.$games["dtregister"].'</td>
  	</tr>
 ';
}





	$html .= '</table>';




	$pdf->loadHtml($html);


	//RENDERIZAR O HTML
	$pdf->render();

	//gerar a saida do pdf
	$pdf->stream("report.pdf",
	 array(
	 	"Attachment"=>false

	));



});

$app->get("/admin/reports/categories", function() {

	User::verifyLogin();

	$allgames = Product::reportCategories();

	//var_dump($product);
	//die;

	$db = new Sql();


	// INSTACIAR A CLASSE DOM PDF
	$pdf = new Dompdf();


	$html = "
	<style>
		table {
    	font-family: arial, sans-serif;
    	border-collapse: collapse;
    	width: 100%;
	}
	td, th {
    	border: 1px solid #black;
    	text-align: left;
	}
    </style>
	<h1>
	Relatório de Produtos
	</h1>
	<table>
  	<tr style='background-color: green'>
    <th>ID</th>
    <th>Name</th>
    <th>Data(R$)</th>
  </tr>
	";

	foreach ($allgames as $games) {

	 $html .= '
  	<tr>
   		<td>'.$games["idcategory"].'</td>
   		<td>'.$games["descategory"].'</td>
   		<td>'.$games["dtregister"].'</td>
  	</tr>
 ';
}





	$html .= '</table>';




	$pdf->loadHtml($html);


	//RENDERIZAR O HTML
	$pdf->render();

	//gerar a saida do pdf
	$pdf->stream("report.pdf",
	 array(
	 	"Attachment"=>false

	));



});

/*$app->get("/admin/reports/games", function() {

	User::verifyLogin();

	$allgames = Product::reportGames();

	//var_dump($product);
	//die;

	$db = new Sql();


	// INSTACIAR A CLASSE DOM PDF
	$pdf = new Dompdf();


	$html = "
	<style>
		table {
    	font-family: arial, sans-serif;
    	border-collapse: collapse;
    	width: 100%;
	}
	td, th {
    	border: 1px solid #black;
    	text-align: left;
	}
    </style>
	<h1>
	Relatório de Produtos
	</h1>
	<table>
  	<tr style='background-color: gray'>
    <th>ID</th>
    <th>Name</th>
    <th>Preço(R$)</th>
    <th>Data Registro</th>
  </tr>
	";

	foreach ($allgames as $games) {

	 $html .= '
  	<tr>
   		<td>'.$games["idproduct"].'</td>
   		<td>'.$games["desproduct"].'</td>
   		<td>'.$games["vlprice"].'</td>
   		<td>'.$games["dtregister"].'</td>
  	</tr>
 ';
}





	$html .= '</table>';




	$pdf->loadHtml($html);


	//RENDERIZAR O HTML
	$pdf->render();

	//gerar a saida do pdf
	$pdf->stream("relatorio.pdf",
	 array(
	 	"Attachment"=>false

	));



});

$app->get("/admin/reports/games", function() {

	User::verifyLogin();

	$allgames = Product::reportGames();

	//var_dump($product);
	//die;

	$db = new Sql();


	// INSTACIAR A CLASSE DOM PDF
	$pdf = new Dompdf();


	$html = "
	<style>
		table {
    	font-family: arial, sans-serif;
    	border-collapse: collapse;
    	width: 100%;
	}
	td, th {
    	border: 1px solid #black;
    	text-align: left;
	}
    </style>
	<h1>
	Relatório de Produtos
	</h1>
	<table>
  	<tr style='background-color: gray'>
    <th>ID</th>
    <th>Name</th>
    <th>Preço(R$)</th>
    <th>Data Registro</th>
  </tr>
	";

	foreach ($allgames as $games) {

	 $html .= '
  	<tr>
   		<td>'.$games["idproduct"].'</td>
   		<td>'.$games["desproduct"].'</td>
   		<td>'.$games["vlprice"].'</td>
   		<td>'.$games["dtregister"].'</td>
  	</tr>
 ';
}





	$html .= '</table>';




	$pdf->loadHtml($html);


	//RENDERIZAR O HTML
	$pdf->render();

	//gerar a saida do pdf
	$pdf->stream("relatorio.pdf",
	 array(
	 	"Attachment"=>false

	));



});

$app->get("/admin/reports/games", function() {

	User::verifyLogin();

	$allgames = Product::reportGames();

	//var_dump($product);
	//die;

	$db = new Sql();


	// INSTACIAR A CLASSE DOM PDF
	$pdf = new Dompdf();


	$html = "
	<style>
		table {
    	font-family: arial, sans-serif;
    	border-collapse: collapse;
    	width: 100%;
	}
	td, th {
    	border: 1px solid #black;
    	text-align: left;
	}
    </style>
	<h1>
	Relatório de Produtos
	</h1>
	<table>
  	<tr style='background-color: gray'>
    <th>ID</th>
    <th>Name</th>
    <th>Preço(R$)</th>
    <th>Data Registro</th>
  </tr>
	";

	foreach ($allgames as $games) {

	 $html .= '
  	<tr>
   		<td>'.$games["idproduct"].'</td>
   		<td>'.$games["desproduct"].'</td>
   		<td>'.$games["vlprice"].'</td>
   		<td>'.$games["dtregister"].'</td>
  	</tr>
 ';
}





	$html .= '</table>';




	$pdf->loadHtml($html);


	//RENDERIZAR O HTML
	$pdf->render();

	//gerar a saida do pdf
	$pdf->stream("relatorio.pdf",
	 array(
	 	"Attachment"=>false

	));



});*/


?>