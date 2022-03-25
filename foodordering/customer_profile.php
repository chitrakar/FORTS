<?php 
    define('location','#');
    define('navbar_position','');
    include('includes/header.php');
    if(!isset($_SESSION['email'])){
        redirect('index.php');
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center"><?php if($_SERVER['REQUEST_METHOD']=="POST"){edit_validate();} ?></div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="jumbotron">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Profile</h3></div>
                    <div class="panel-body">
                        
                        <table>
                        <?php
                        $email = $_SESSION['email'];
                        $sql = "SELECT * FROM customer WHERE email='$email'";
                        $result = query($sql);
                        if(num_rows($result)>0){
                            while($row = fetch_array($result)){
                                $username = $row['username'];
                                echo '<tr><td><h4>Username: </h4></td><td><h4><kbd>'.$username.'</kbd></h4></td></tr>';
                                echo '<tr><td><h4>Email: </h4></td><td><h4><kbd>'.$email.'</kbd></h4></td></tr>';
                                echo '<tr><td><h4>Password: </h4></td><td><h4><kbd>*****</kbd></h4></td></tr>';
                                echo '<tr><td><button class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit Profile</button></td></tr>';
                            }
                        }
                        ?>
                        <!-- Modal -->
                        <div id="edit" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Profile</h4>
                            </div>
                            <div class="modal-body">
                                <form method="POST" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="username" class="control-label col-sm-4">Username:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="username" name="uname">
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="email" class="control-label col-sm-4">Email address:</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="opassword" class="control-label col-sm-4">Old Password:</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="opassword" name="opassword">
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="npassword" class="control-label col-sm-4">New Password:</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="npassword" name="npassword">
                                        </div>
                                    </div><br>
                                    <input type="submit" value="Update">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>

                        </div>
                        </div>
                        </table>

                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-2"></div>
    </div>
</div>