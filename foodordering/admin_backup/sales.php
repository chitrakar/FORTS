<?php 
    define('location','index.php');
    define('navbar_position','');
    include('includes/header.php');
    if(!isset($_SESSION['admin'])){
        redirect('index.php');
    }

    echo '
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Centered Pills -->
                <ul class="nav nav-pills nav-justified">
                <li><a href="admin.php">Restaurants</a></li>
                <li><a href="restaurant_request.php">Restaurant Requests</a></li>
                <li><a href="customer_detail.php">Customers</a></li>
                <li class="active"><a href="sales.php">Sales History</a></li>
                
                </ul>
            </div>
        </div>
    </div>

        <div class="container">
            <table class="table">
                <tr class="bg-info">
                    <th>Item</th>
                    <th>Customer</th>
                    <th>Restaurant</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Date Purchased</th>
                    <th>Locations</th>
                </tr>         

    ';

    $sql = "SELECT * FROM purchase";
    $result=query($sql);
    if(num_rows($result)>0){
        while($row = fetch_array($result)){
            $lat = $row['lat'];
            $long = $row['longt'];
            $email = $row['email'];
            $pname = $row['pname'];
            $rname = $row['rname'];
            $qty = $row['qty'];
            $price = $row['price'];
            $total = $row['total'];
            $date_purchase = $row['date_purchase'];
            
            echo '
                <tr>
                    <td>'.$pname.'</td>
                    <td>'.$email.'</td>
                    <td>'.$rname.'</td>
                    <td>'.$qty.'</td>
                    <td>'.$price.'</td>
                    <td>'.$total.'</td>
                    <td>'.$date_purchase.'</td>
                    <td><a class="btn btn-success" href="location.php?lat='.$lat.'&long='.$long.'"><span class="glyphicon glyphicon-map-marker"></span></a></td>
                </tr>
            ';

        }
    }
    echo '</table></div>';

    include('includes/footer.php');
?>