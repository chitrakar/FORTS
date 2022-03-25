<?php 
    include('functions/init.php');
    $pid = $_GET['id'];
    $msg = $_POST['msg'];
    $rating = $_POST['rate'];
    $uid = $_SESSION['uid'];
    $sql = "INSERT INTO reviews(msg,itemId,customerId,rating) VALUES('$msg','$pid','$uid','$rating')";
    $result = query($sql);
    redirect("order_history.php");

?>