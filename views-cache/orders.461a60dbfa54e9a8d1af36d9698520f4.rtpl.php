<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  &nbsp;&nbsp;Order List
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Home&nbsp;&nbsp;</a></li>
    <li class="active"><a href="/admin/orders">&nbsp;&nbsp;Orders&nbsp;&nbsp;</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group"> 
            <input type="text" name="id" class="form-control bg-light border-1 small" placeholder="ID"
            value="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-label="Search" aria-describedby="basic-addon2">
            <input type="text" name="nome" class="form-control bg-light border-1 small" placeholder="Name" 
            value="<?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-label="Search" aria-describedby="basic-addon2">
            <input type="text" name="vltotal" class="form-control bg-light border-1 small" placeholder="Amount Total =" 
            value="<?php echo htmlspecialchars( $vltotal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-label="Search" aria-describedby="basic-addon2">
            <input type="text" name="status" class="form-control bg-light border-1 small" placeholder="Status" 
            value="<?php echo htmlspecialchars( $status, ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-label="Search" aria-describedby="basic-addon2">
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
                    <th>Customer</th>
                    <th>Amount Total</th>
                    <th>Status</th>
                    <th style="width: 220px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($orders) && ( is_array($orders) || $orders instanceof Traversable ) && sizeof($orders) ) foreach( $orders as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <td><?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td>$<?php echo formatPrice($value1["vltotal"]); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td>
                      <a href="/admin/orders/<?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i> Details</a>
                      <a href="/admin/orders/<?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/status" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Status</a>
                      <a href="/admin/orders/<?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Are you sure you want to DELETE?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                  <?php }else{ ?>
                  <tr>
                      <td colspan="6">No orders</td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->