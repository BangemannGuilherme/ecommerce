<?php

use \BangemannGuilherme\PageAdmin;
use \BangemannGuilherme\Model\User;
use \BangemannGuilherme\Model\Product;
use \BangemannGuilherme\DB\Sql;
use \BangemannGuilherme\Model\Report;
use \Dompdf\Dompdf;


$app->get("/admin/reports", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("reports");


});

$app->get("/admin/reports/games", function() {

	User::verifyLogin();

	$allgames = Report::reportGames();

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
  	<tr style='background-color: #45b77d'>
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

	$allgames = Report::reportCategories();

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
  	<tr style='background-color: #45b77d'>
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

$app->get("/admin/reports/orders", function() {

	User::verifyLogin();

	$allgames = Report::reportOrders();

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
  	<tr style='background-color: #45b77d'>
    <th>ID</th>
    <th>Name</th>
    <th>DaBBta(R$)</th>
	<th>AA(R$)</th>
	<th>Valor Total($)</th>
	<th>Data</th>
  </tr>
	";

	foreach ($allgames as $games) {

	 $html .= '
  	<tr>
   		<td>'.$games["idorder"].'</td>
   		<td>'.$games["desperson"].'</td>
		<td>'.$games["desemail"].'</td>
		<td>'.$games["desstatus"].'</td>
		<td>'.$games["vltotal"].'</td>
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

$app->get("/admin/reports/genresxproducts", function() {

	User::verifyLogin();

	$allgames = Report::reportGenresxProd();

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
  	<tr style='background-color: #45b77d'>
    <th>ID</th>
    <th>Name</th>
  </tr>
	";

	foreach ($allgames as $games) {

	 $html .= '
  	<tr>
   		<td>'.$games["descategory"].'</td>
   		<td>'.$games["desproduct"].'</td>
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

$app->get("/admin/reports/persons", function() {

	User::verifyLogin();

	$allgames = Report::reportPersons();

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
  	<tr style='background-color: #45b77d'>
    <th>ID</th>
    <th>Name</th>
    <th>NamFWASe</th>
	<th>NaDDme</th>
	<th>A</th>
	<th>NaCme</th>
  </tr>
	";

	foreach ($allgames as $games) {

	 $html .= '
  	<tr>
   		<td>'.$games["desperson"].'</td>
   		<td>'.$games["desemail"].'</td>
   		<td>'.$games["nrphone"].'</td>
		<td>'.$games["deslogin"].'</td>
		<td>'.$games["inadmin"].'</td>
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


?>