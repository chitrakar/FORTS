<?php 
    define('location','#');
    define('navbar_position','');
    include('includes/header.php');
    if(!isset($_SESSION['rname'])){
        redirect('index.php');
    }
?>

<!-- $_SESSION['rname']$_SESSION['id'] -->

<!-- show restaurant items here -->
<?php
    $rname = $_SESSION['rname'];
echo'
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Restaurant Name: '.$rname.' </h3>
            </div>
            
            <div class="col-md-12"></div>
            <div class="col-md-12">
                <!-- Centered Pills -->
                <ul class="nav nav-pills nav-justified">
                <li><a href="restaurant_admin.php">Our Menu</a></li>
                <li class="active"><a href="request_order.php">Request Orders</a></li>
                
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
                        <th>Sno.</th>
                        <th>Items</th>
                        <th>Customer</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Date Purchased</th>
                        <th>Locations</th>
                    </tr>
                    </thead>
                    <tbody>
                       
                    <?php
                            $rname = $_SESSION['rname'];
                            $item_query = "SELECT * FROM purchase WHERE rname = '$rname'";
                            $result = query($item_query);
                            $i = 1;
                            if(num_rows($result)>0){
                                while($row = fetch_array($result)){
                                    $email = $row['email'];
                                    $iname= $row['pname'];
                                    $qty = $row['qty'];
                                    $price=$row['price'];
                                    $total = $row['total'];
                                    $lat = $row['lat'];
                                    $long = $row['longt'];
                                    $date_purchase = $row['date_purchase'];
                                    echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td>'.$iname.'</td>
                                        <td>'.$email.'</td>
                                        <td>'.$qty.'</td>
                                        <td>'.$price.'</td>
                                        <td>'.$total.'</td>
                                        <td>'.$date_purchase.'</td>
                                        <td><a class="btn btn-success" href="location.php?lat='.$lat.'&long='.$long.'"><span class="glyphicon glyphicon-map-marker"></span></a></td>
                                        
                                    </tr>
                                    ';
                                    $i++;
                                }
                            }
                        ?>
                    
                    </tbody>
                </table>
            </div>

            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    


<?php include("./script.php");?>
<?php include('includes/footer.php'); ?>
