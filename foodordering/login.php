<?php 
    include('./functions/init.php');
    if(isset($_SESSION['admin'])){
        redirect('admin.php');
    }
    if(isset($_SESSION['email'])){
        redirect('index.php');
    }
    if(isset($_SESSION['rname'])){
        redirect('restaurant_admin.php');
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
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center"><?php if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['email'])){validate_user_login();}else{  validate_restaurant_login();}?></div>

        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="margin-top: 120px;">
                <!-- tabs -->
                <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#customer">Customer Login</a></li>
                <li><a data-toggle="tab" href="#restaurant">Restaurant Login</a></li>
                </ul>

                <div class="tab-content">
                    <div id="customer" class="tab-pane fade in active">
                        <!-- customer login -->
                        <div class="panel panel-default b-top">
                            <div class="panel-body">
                                <form method="post">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                                    </div><br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                                    </div><br>
                                    
                                    No account?<a href="customer_signup.php" class="btn btn-link" >Sign up</a><br><br>
                                    <input type="submit" class="btn btn-primary btn-block" name="signup" value="Customer Login">
                                </form>
                            </div>
                        </div>
                        <!-- /login -->
                    </div>
                    <div id="restaurant" class="tab-pane fade">
                        <!-- restaurant login -->
                        <div class="panel panel-default b-top">
                            <div class="panel-body">
                                <form method="post">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" name="rname" id="rid" class="form-control" placeholder="Enter Restaurant Name" required>
                                    </div><br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                                    </div><br>
                                    
                                    No account?<a href="restaurant_signup.php" class="btn btn-link" >Sign up</a><br><br>
                                    <input type="submit" class="btn btn-success btn-block" name="signup" value="Restaurant Login">
                                </form>
                            </div>
                        </div>
                        <!-- /login -->
                    </div>
                </div>
                <!-- tabs -->
            </div> 
            <div class="col-md-4"></div>
        </div>         
    </div>
<?php include("./script.php");?>
<?php include('includes/footer.php'); ?>