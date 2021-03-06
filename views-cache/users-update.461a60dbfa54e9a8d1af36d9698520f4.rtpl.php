<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Error Message Style -->
  <style type="text/css">
    .error-msg{ font-family: Arial, Helvetica, sans-serif; color: rgb(255, 0, 0);}
  </style>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  &nbsp;&nbsp;User List
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">User Edit</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/users/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" id="form-user">
          <div class="box-body">
            <div class="form-group">
              <label for="desperson">Name</label>
              <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Insert your name" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              <span class='error-msg name'></span>
            </div>
            <div class="form-group">
              <label for="deslogin">Login</label>
              <input type="text" class="form-control" id="deslogin" name="deslogin" placeholder="Insert your login"  value="<?php echo htmlspecialchars( $user["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              <span class='error-msg login'></span>
            </div>
            <div class="form-group">
              <label for="nrphone">Phone</label>
              <input type="tel" class="form-control" id="nrphone" name="nrphone" placeholder="Insert your phone"  value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="desemail">E-mail</label>
              <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Insert your e-mail" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              <span class='error-msg email'></span>
            </div>
            <div class="form-group">
              <label for="despassword">Password</label>
              <input type="password" class="form-control" id="despassword" name="despassword" placeholder="Insert your password">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="inadmin" value="1" <?php if( $user["inadmin"] == 1 ){ ?>checked<?php } ?>> Administrator Access
              </label>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>

<!-- /.validations -->
<script type="text/javascript" src="/resources/admin/js/u-updat_valdn.js"></script>

<!-- /.content-wrapper -->