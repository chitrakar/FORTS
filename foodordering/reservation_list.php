<?php 
    define('location','index.php');
    define('navbar_position','navbar-fixed-top');
    include('./functions/init.php');
    if(isset($_SESSION['admin'])){
        redirect('admin/');
    }
    if(!isset($_SESSION['email'])){
      redirect('index.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FoodOrdering</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mediaqueries.css">
    <style>
        
    </style>
</head>
<body>
    <div id="snackbar"></div>
<?php 
    include('includes/nav.php');
?>
<input type="hidden" name="" data-id="<?php echo $_SESSION['email'];?>" id='cid'>
<div class="container text-center">
  <div class="row">
    <div class="col-lg-12"><h2 class="text-primary">Bookings</h2></div>
    <div id="content">
       
    </div>
  </div>
</div>
<hr>
<br>




<script src="script.js"></script>
<?php include('includes/footer.php'); ?>