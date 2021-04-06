<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  &nbsp;&nbsp;Category List
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Home&nbsp;&nbsp;</a></li>
    <li><a href="/admin/categories">&nbsp;&nbsp;Categories&nbsp;&nbsp;</a></li>
    <li class="active"><a href="/admin/categories/create">&nbsp;&nbsp;Register&nbsp;&nbsp;</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">New Category</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/categories/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="descategory">Category Name</label>
              <input type="text" class="form-control" id="descategory" name="descategory" placeholder="Type the name of the category">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">&nbsp;&nbsp;Register&nbsp;&nbsp;</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->