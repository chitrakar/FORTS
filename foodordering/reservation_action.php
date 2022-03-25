
<?php 
    define('location','#');
    define('navbar_position','navbar-fixed-top');
    include('./functions/init.php');
    if(isset($_SESSION['admin'])){
        redirect('admin/');
    }
    if(!isset($_SESSION['email'])){
      redirect('index.php');
    }
    $uid=$_SESSION['uid'];
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
        .trans{
            width: 100%;
            margin: 0;
            overflow: hidden;
        }
        .res-img{
            width: 100%;
            height: auto;
            transform: scale(1.10);
            transition: transform 0.5s;
            
        }
        .res-img:hover{
            transform: scale(1.01);
        }
        .banner{
            margin-top:-20px;
        }
    </style>
</head>
<body>
    <div id="snackbar"></div>
<?php 
    include('includes/nav.php');


  $rid = $_GET['id'];
  $table = $_POST['tid'];
  $phone = $_POST['number'];
  $date = $_POST['date'];
  $time = $_POST['time'];
      

  $sql = "INSERT INTO `reservation_detail`(`reservation_date`, `reservationTime`, `phone`, `customerId`, `restaurantId`, `table_id`,`numberOfPeople`, `status`) VALUES ('$date','$time', '$phone','$uid','$rid','$table','0','1')";
  $result = $con->query($sql);

  
//   echo $c;

//   $char = explode(',',$c);
  
//   echo sizeof($char);


?>
<div class="container text-center">
  <div class="row">
    <div class="col-lg-12"><h2 class="text-primary">Your Booking has been added. You will soon receve message of confirmation.</h2></div>
    <a href="index.php" class="btn btn-default">Continue</a>
  </div>
</div>
<hr>
<br>


<?php include('includes/footer.php'); ?>