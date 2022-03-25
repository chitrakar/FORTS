<?php 
    define('location','index.php');
    define('navbar_position','');
    include('includes/header.php');

    $uid = $_SESSION['uid'];

    echo '
        <div class="container">
            <table class="table">
                <tr class="bg-primary">
                    <th>Item</th>
                    <th>Restaurant</th>
                    <th>Price</th>
                    <th>Rate </th>
                </tr>         

    ';

    $sql = "SELECT DISTINCT items.pid, items.name, items.price, restaurant.rname FROM purchase LEFT JOIN purchase_details ON purchase.purchaseid=purchase_details.purchaseId LEFT JOIN items ON purchase_details.item_id=items.pid LEFT JOIN restaurant ON items.rid=restaurant.id  WHERE customerId = '$uid'";
    $result=query($sql);
    if(num_rows($result)>0){
        while($row = fetch_array($result)){
            $pname = $row['name'];
            $rname = $row['rname'];
            $price = $row['price'];
            $pid = $row['pid'];
            // $date_purchase = $row['date_purchase'];
            
            echo '
                <tr>
                    <td><a href="product.php?id='.$pid.'&rname='.$rname.'">'.$pname.'</a></td>
                    <td>'.$rname.'</td>
                    <td>'.$price.'</td>
                    
                </tr>
            ';

        }
    }
    echo '</table></div>';

    include('includes/footer.php');
?>