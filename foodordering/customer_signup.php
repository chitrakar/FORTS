<?php 
    include('./functions/init.php');
    if(isset($_SESSION['email'])){
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
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center"><?php validate_user_registration(); ?></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="margin-top: 120px;">
            <div class="panel panel-default">
                <div class="panel-body">
                <form method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                        <input type="password" name="confirm_password" id="password" class="form-control" placeholder="Confirm Password" required>
                    </div><br>
                    <span class="small">By clicking Sign Up, you agree to our <a>Terms</a>, <a>Data Policy</a> and <a>Cookies Policy</a>.</span><br><br>
                    <input type="submit" class="btn btn-success btn-block" name="signup" value="signup">
                </form>
            </div>
                </div>
            </div> 
            <div class="col-md-4"></div>
        </div>         
    </div>
<?php include("./script.php");?>
<?php include('includes/footer.php'); ?>