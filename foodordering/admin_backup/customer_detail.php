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
                <li><a href="restaurant_request.php">Restaurant Requests</a></li>
                <li class="active"><a href="#">Customers</a></li>
                <li><a href="sales.php">Sales History</a></li>
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
                        <th>User Name</th>
                        <th>email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $query = "SELECT * FROM customer";
                            $result = query($query);
                            if(num_rows($result)>0){
                                while($row = fetch_array($result)){
                                    $id = $row['id'];
                                    $name = $row['username'];
                                    $email = $row['email'];
                                    echo '
                                        <tr>
                                            <td>'.$id.'</td>
                                            <td>'.$name.'</td>
                                            <td>'.$email.'</td>
                                            <td>
                                            <a class="btn btn-danger" href="customer_remove.php?id='.$id.'">
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