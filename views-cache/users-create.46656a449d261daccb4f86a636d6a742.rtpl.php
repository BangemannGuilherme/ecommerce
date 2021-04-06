<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  &nbsp;&nbsp;User List
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Home&nbsp;&nbsp;</a></li>
    <li><a href="/admin/users">&nbsp;&nbsp;Usuários&nbsp;&nbsp;</a></li>
    <li class="active"><a href="/admin/users/create">&nbsp;&nbsp;Register&nbsp;&nbsp;</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">New User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/users/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="desperson">Name</label>
              <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Type your name">
            </div>
            <div class="form-group">
              <label for="deslogin">Login</label>
              <input type="text" class="form-control" id="deslogin" name="deslogin" placeholder="Type your login">
            </div>
            <div class="form-group">
              <label for="nrphone">Phone</label>
              <input type="tel" class="form-control" id="nrphone" name="nrphone" placeholder="Type your phone">
            </div>
            <div class="form-group">
              <label for="desemail">E-mail</label>
              <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Type your e-mail">
            </div>
            <div class="form-group">
              <label for="despassword">Password</label>
              <input type="password" class="form-control" id="despassword" name="despassword" placeholder="Type your password">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="inadmin" value="1"> Administrator Access
              </label>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Register</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->