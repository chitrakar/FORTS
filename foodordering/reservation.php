<?php 

    define('location','index.php');
    define('navbar_position','');
    include('./functions/init.php');
    $id = $_GET['rid'];//resID
    $tid=$_GET['tid'];

    if(!isset($_SESSION['email'])){
        echo '<script>
        alert("You must login first to reserve a table");
        window.location.replace("index.php");</script>';
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
?>
    <?php
    
        $i =0;
        
            $query = "SELECT * FROM restaurant WHERE id = $id";
                $result = query($query);
                if(num_rows($result)>0){
                    while($row = fetch_array($result)){
                        $image = $row['image'];
                        $rname = $row['rname'];
                        $address = $row['address'];
                        echo'
                            <div class="restaurant_banner">
                                <div class="container this">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="responsive" width="150px" src="'.$image.'" alt="">
                                        </div>
                                        <div class="col-md-3">
                                            <h3>'.$rname.'</h3>
                                            <span class="glyphicon glyphicon-map-marker"></span>&nbsp;'.$address.'
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Delivery Hours:<br> 
                                            10:00 AM - 9:00 PM
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                }
            ?>
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#menu">Reservation Details</a></li>
                </ul>
                <div class="tab-content">
                    <div id="menu" class="tab-pane fade in active">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-lg-offset-3"><h2 class="text-primary">Choose a reservation Date and Time</h2></div>
                            </div>
                            <div class="row">
                                <form action="confirm_reservation.php?id=<?php echo $id ?>" method="POST">
                                    <div class="col-md-8 col-lg-offset-2">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?php
                                                $email = $_SESSION['email'];
                                                $user = $_SESSION['username'];
                                                ?>
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $user;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="number" id="phone" class="form-control" name="number" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" id="date" class="form-control" name="date" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="time">Select Time</label>
                                                <select class="form-control" id="time" name="time">
                                                    <option>10:00am</option>
                                                    <option>10:45am</option>
                                                    <option>11:30am</option>
                                                    <option>12:15pm</option>
                                                    <option>1:15pm</option>
                                                    <option>2:15pm</option>
                                                    <option>3:15pm</option>
                                                    <option>4:15pm</option>
                                                    <option>6:00pm</option>
                                                    <option>7:00pm</option>
                                                    <option>8:00pm</option>
                                                    <option>8:45pm</option>
                                                    <option>9:30pm</option>
                                                    <option>10:00pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $tid ?>" name="tableno">
                            
                                        <div class="col-lg-4 col-lg-offset-5"><input type="submit" class="btn btn-primary" value="Reserve" name="reserve"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <?php include("script.php");?>
            <?php include('includes/footer.php'); ?>

