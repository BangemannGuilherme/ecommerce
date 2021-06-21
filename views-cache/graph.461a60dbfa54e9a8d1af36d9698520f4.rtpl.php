<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      &nbsp;&nbsp;Graphs
      </h1>
    </section>

<!------------------------------------------------------------>

<script type="text/javascript">
    var x = [];

</script>
 <?php $counter1=-1;  if( isset($category) && ( is_array($category) || $category instanceof Traversable ) && sizeof($category) ) foreach( $category as $key1 => $value1 ){ $counter1++; ?>
  <script type="text/javascript"> 
    
  
    x.push(['<?php echo htmlspecialchars( $value1["genre"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["quantity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>']);


  </script>
  <?php } ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);




function drawChart() {


 
var data = new google.visualization.DataTable();
data.addColumn('string', 'genre');
data.addColumn('string', 'quantity');
    
data.addRows(x);

  
var options = {
title: 'Amount of games by genres',
width: 900,
legend: { position: 'none' },
chart: { title: 'Amount of games by genres'},
bars: 'horizontal', // Required for Material Bar Charts.
axes: {
x: {
0: { side: 'top', label: 'quantity'} // Top x-axis.
}
},
bar: { groupWidth: "90%" }
};

  var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

  chart.draw(data, google.charts.Bar.convertOptions(options));
}
</script>

<div id="columnchart_material" style="width: 800px; height: 500px;"></div>




<!------------------------------------------------------------>
<!-- /.content -->



<!-- /.content-wrapper -->