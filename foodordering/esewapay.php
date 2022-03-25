<?php 
	define('location','index.php');
	include('includes/header.php'); 
	if(isset($_SESSION['admin'])){
        redirect('admin.php');
	}
	if(isset($_SESSION['rname'])){
        redirect('restaurant_admin.php');
    }

    $total = $_GET['total'];
    $adding = $total +10;
    $failed='http://merchant.com.np/page/esewa_payment_failed?q=fu';
    $success='http://merchant.com.np/page/esewa_payment_success?q=su';
?>
<div class="container-fluid">
	<div class="row text-center">
        <h4></h4>
        <form action="https://uat.esewa.com.np/epay/main" method="POST">
            <input value="<?php echo $adding;?>" name="tAmt" type="hidden" id="total">
            <input value="<?php echo $total;?>" name="amt" type="hidden" id="tot"> 
            <input value="5" name="txAmt" type="hidden" id="taxamount">
            <input value="2" name="psc" type="hidden" id="psc">
            <input value="3" name="pdc" type="hidden" id="pdc">
            <input value="EPAYTEST" name="scd" type="hidden">
            <input value="foodorde" name="pid" type="hidden">
            <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
            <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
            <input class="btn btn-success btn-lg" value="Pay with Esewa" type="submit" id="change">
        </form>
    </div>
</div>

<br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3">
            <b>WE'RE FOODORDERING</b>
            <p>About Us</p>
            <p>Available Areas</p>
            <p>Delivery Charges</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            <b>GET HELP</b> 
            <p>How to Order?</p>
            <p>FAQs</p>
            <p>Contact Us</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            <b>CALL US</b>
            <p>441442, 444120</p> 
            <p>980298832</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
        <b>CONNECT WITH US</b> <br>
            <i class="fab fa-twitter fa-2x"></i>
            <i class="fab fa-twitter fa-2x"></i>
            <i class="fab fa-instagram fa-2x"></i>
            <i class="fab fa-youtube fa-2x"></i>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12"></div>
        <div class="col-md-12  col-sm-12 col-xs-12">
            <b>SERVICE HOUR</b>
            <p>11:00 AM to 8:30 PM(NST)</p>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12"> </div>
    </div>
    <div class="row b-top">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <p>Terms of Usage and Privacy Policy</p>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <p>&copy; 2019 FoodOrdering Pvt. Ltd. All Rights Reserved</p>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        let total = $('#tot').val();
        let tax = $('#taxamount').val();
        let psc = $('#psc').val();
        let pdc = $('#pdc').val();
        // let tot = parseInt(total)+parseInt(tax)+parseInt(psc)+parseInt(pdc);
        // let newtot = tot.toString();
        // $('#pdc').val(tot);
        // let chang = document.getElementById('total');
        // chang.value = tot;

    })
</script>
<?php include('includes/footer.php'); ?>