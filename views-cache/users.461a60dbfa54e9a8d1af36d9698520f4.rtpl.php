<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  &nbsp;&nbsp;User List
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Home&nbsp;&nbsp;</a></li>
    <li class="active"><a href="/admin/users">&nbsp;&nbsp;Users&nbsp;&nbsp;</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/admin/users/create" class="btn btn-success">Register</a>
              <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group"> 
                  <input type="text" name="id" class="form-control bg-light border-1 small" placeholder="ID"
                  value="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-label="Search" aria-describedby="basic-addon2">
                  <input type="text" name="nome" class="form-control bg-light border-1 small" placeholder="Name" 
                  value="<?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-label="Search" aria-describedby="basic-addon2">
                  <input type="text" name="email" class="form-control bg-light border-1 small" placeholder="Email" 
                  value="<?php echo htmlspecialchars( $email, ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-label="Search" aria-describedby="basic-addon2">
                  <input type="text" name="login" class="form-control bg-light border-1 small" placeholder="Login" 
                  value="<?php echo htmlspecialchars( $login, ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-label="Search" aria-describedby="basic-addon2">
                  <input type="text" name="admin" class="form-control bg-light border-1 small" placeholder="Admin | 1 = Yes    0 = No" 
                  value="<?php echo htmlspecialchars( $admin, ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                      <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
            </div>


            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Login</th>
                    <th style="width: 60px">Admin</th>
                    <th style="width: 140px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>   <!-- RainTPL -->
                  <tr>
                    <td><?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php if( $value1["inadmin"] == 1 ){ ?>Yes<?php }else{ ?>No<?php } ?></td>
                    <td>
                      <a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                      <a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Are you sure you want to DELETE this account?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
