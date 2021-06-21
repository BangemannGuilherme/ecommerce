<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      &nbsp;&nbsp;Report List
      </h1>
    </section>

    <!-- Main content -->
<section class="content">

<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th style="width: 10px">#</th>
                        <th>Report Name</th>
                        <th style="width: 240px">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <a href="/admin/reports/games" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Report</a>
                        </td>
                        <td>Games</td>
                    </tbody>
                    <tbody>
                        <td>
                            <a href="/admin/reports/categories" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Report</a>
                        </td>
                        <td>Genres</td>
                    </tbody>
                    <tbody>
                        <td>
                            <a href="/admin/reports/orders" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Report</a>
                        </td>
                        <td>Orders</td>
                    </tbody>
                    <tbody>
                        <td>
                            <a href="/admin/reports/persons" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Report</a>
                        </td>
                        <td>Persons</td>
                    </tbody>
                    <tbody>
                        <td>
                            <a href="/admin/reports/genresxproducts" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Report</a>
                        </td>
                        <td>Genres x Products</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
</div>


<!-- /.content-wrapper -->