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

	$db = new Sql();

	// DOM PDF Class
	$pdf = new Dompdf();


	$html = "
	<style>
		table {
    	font-family: Times, serif;
    	border-collapse: collapse;
    	width: 100%;
	}
	td, th {
    	border: 1px solid #black;
    	text-align: left;
	}
    </style>
	<h1>
	Game Report
	</h1>
	<table>
  	<tr style='background-color: #45b77d'>
    <th>ID</th>
    <th>Name</th>
    <th>Price($)</th>
    <th>Registered Date</th>
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


	//html render
	$pdf->render();

	//pdf generate
	$pdf->stream("report.pdf",
	 array(
	 	"Attachment"=>false

	));

});

$app->get("/admin/reports/categories", function() {

	User::verifyLogin();

	$allgames = Report::reportCategories();

	$db = new Sql();

	// DOM PDF Class
	$pdf = new Dompdf();


	$html = "
	<style>
		table {
    	font-family: Times, serif;
    	border-collapse: collapse;
    	width: 100%;
	}
	td, th {
    	border: 1px solid #black;
    	text-align: left;
	}
    </style>
	<h1>
	Genre Report
	</h1>
	<table>
  	<tr style='background-color: #45b77d'>
    <th>ID</th>
    <th>Name</th>
    <th>Registered Date</th>
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

	//html render
	$pdf->render();

	//pdf generate
	$pdf->stream("report.pdf",
	 array(
	 	"Attachment"=>false

	));

});

$app->get("/admin/reports/orders", function() {

	User::verifyLogin();

	$allgames = Report::reportOrders();

	$db = new Sql();

	// DOM PDF Class
	$pdf = new Dompdf();


	$html = "
	<style>
		table {
    	font-family: Times, serif;
    	border-collapse: collapse;
    	width: 100%;
	}
	td, th {
    	border: 1px solid #black;
    	text-align: left;
	}
    </style>
	<h1>
	Order Report
	</h1>
	<table>
  	<tr style='background-color: #45b77d'>
    <th>ID</th>
    <th>Person Name</th>
    <th>E-mail</th>
	<th>Order Status</th>
	<th>Amount Total($)</th>
	<th>Registered Date</th>
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

	//html render
	$pdf->render();

	//pdf generate
	$pdf->stream("report.pdf",
	 array(
	 	"Attachment"=>false

	));

});

$app->get("/admin/reports/genresxproducts", function() {

	User::verifyLogin();

	$allgames = Report::reportGenresxProd();

	$db = new Sql();

	// DOM PDF Class
	$pdf = new Dompdf();


	$html = "
	<style>
		table {
    	font-family: Times, serif;
    	border-collapse: collapse;
    	width: 100%;
	}
	td, th {
    	border: 1px solid #black;
    	text-align: left;
	}
    </style>
	<h1>
	Genre x Game Report
	</h1>
	<table>
  	<tr style='background-color: #45b77d'>
    <th>Genre Name</th>
    <th>Game Name</th>
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

	//html render
	$pdf->render();

	//pdf generate
	$pdf->stream("report.pdf",
	 array(
	 	"Attachment"=>false

	));

});

$app->get("/admin/reports/persons", function() {

	User::verifyLogin();

	$allgames = Report::reportPersons();

	$db = new Sql();

	// DOM PDF Class
	$pdf = new Dompdf();


	$html = "
	<style>
		table {
    	font-family: Times, serif;
    	border-collapse: collapse;
    	width: 100%;
	}
	td, th {
    	border: 1px solid #black;
    	text-align: left;
	}
    </style>
	<h1>
	User Report
	</h1>
	<table>
  	<tr style='background-color: #45b77d'>
    <th>Name</th>
    <th>E-mail</th>
    <th>Number Phone</th>
	<th>Login</th>
	<th>Admin 1=Yes  0=No</th>
	<th>Registered Date</th>
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

	//html render
	$pdf->render();

	//pdf generate
	$pdf->stream("report.pdf",
	 array(
	 	"Attachment"=>false

	));

});


?>