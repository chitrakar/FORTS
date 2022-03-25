<?php 
    define('location','#');
    define('navbar_position','');
    include('includes/header.php'); 
    if(!isset($_SESSION['admin'])){
        redirect('index.php');
    }
    echo'
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Centered Pills -->
                <ul class="nav nav-pills nav-justified">
                <li><a href="admin.php">Restaurants</a></li>
                <li class="active"><a href="restaurant_request.php">Restaurant Requests</a></li>
                <li><a href="sales.php">Sales History</a></li>
                <li><a href="customer_detail.php">Customers</a></li>
                </ul>
            </div>
        </div>
        
    </div>
        
        ';
    
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Restaurant Name</th>
                        <th>Address</th>
                        <th>email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $restaurant_query = "SELECT * FROM request";
                            $result = query($restaurant_query);
                            if(num_rows($result)>0){
                                while($row = fetch_array($result)){
                                    $id = $row['id'];
                                    $rname = $row['rname'];
                                    $address = $row['address'];
                                    $email = $row['email'];
                                    echo '
                                        <tr>
                                            <td>'.$id.'</td>
                                            <td>'.$rname.'</td>
                                            <td>'.$address.'</td>
                                            <td>'.$email.'</td>
                                            <td>
                                                <a class="btn btn-success" href="restaurant_accept.php?id='.$id.'" onclick="">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </a>
                                            <a class="btn btn-danger" href="restaurant_reject.php?id='.$id.'">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </a>
                                            </td>
                                        </tr>
                                    ';
                                }
                            }
                        ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include("./script.php");?>
<?php include('includes/footer.php'); ?>