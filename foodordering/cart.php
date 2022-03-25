<?php 
	define('location','index.php');
	include('includes/header.php'); 
	if(isset($_SESSION['admin'])){
        redirect('admin.php');
	}
	if(isset($_SESSION['rname'])){
        redirect('restaurant_admin.php');
    }
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" id="cart_msg">
			<!--Cart Message-->
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading"><strong>Cart Checkout</strong></div>
				<div class="panel-body">
					<div class="row">

						<div class="col-md-2 col-xs-2 col-sm-2"><b>Product Name</b></div>
						<div class="col-md-3 col-xs-3 col-sm-3"><b>Restaurant</b></div>
						<div class="col-md-1 col-xs-1 col-sm-1"><b>Quantity</b></div>
                        <div class="col-md-2 col-xs-2 col-sm-2"><b>Product Price</b></div>
                        <div class="col-md-2 col-xs-2 col-sm-2"><b>Total Price</b></div>
						<div class="col-md-2 col-xs-2 col-sm-2"><b>Action</b></div>
					</div>
					<div id="cart_checkout"></div>
					<!-- generate from ajax -->
					<!--<div class="row">
						<div class="col-md-2">
							<div class="btn-group">
								<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
								<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
							</div>
						</div>
						<div class="col-md-2"><img src='product_images/imges.jpg'></div>
						<div class="col-md-2">Product Name</div>
						<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
						<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
						<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
					</div> -->
					<!--<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4">
							<b>Total $500000</b>
						</div> -->
					</div>
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
		<div class="col-md-2"></div>

	</div>
	
<?php include("script.php");?>
<?php include('includes/footer.php'); ?>