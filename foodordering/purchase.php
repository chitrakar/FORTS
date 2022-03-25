<?php 
    define('location','#');
    define('navbar_position','');
    include('includes/header.php');
    if(!isset($_SESSION['email'])){
        redirect('index.php');
    }
    $uid = $_SESSION['uid'];
    $lat = $_GET['lat'];
    $long = $_GET['long'];
    $totalset = $_GET['total'];

    $sql1 = "INSERT INTO purchase(customerId,total,lat,longt,date_purchase) VALUES('$uid','$totalset','$lat','$long',NOW());";
    $result1 = query($sql1);
    $sql2 = "SELECT * FROM purchase ORDER BY date_purchase DESC LIMIT 1;";
    $result2 = query($sql2);
        
        
    $sql = "SELECT DISTINCT cart.pid, cart.quantity, items.name, items.price FROM cart LEFT JOIN items ON cart.pid=items.pid WHERE customerId = '$uid';";
    $result = query($sql);
    if(num_rows($result)>0){
        while($row = fetch_array($result)){
            $pid=$row['pid'];
            $qty=$row['quantity'];
            $price=$row['price'];
            
            if(num_rows($result2)>0){
                while($row = fetch_array($result2)){
                    $purchase_id = $row['purchaseid'];
                }
            }
            
            $sql4= "INSERT INTO purchase_details(item_id, quantity, purchaseId) VALUES('$pid','$qty','$purchase_id');";
            $result3 = query($sql4);
        }
    }

    $sql2 = "DELETE FROM cart WHERE customerId='$uid'";
    $result2 = query($sql2);
    $link = "esewapay.php?total=".$totalset;
    redirect($link);
?>