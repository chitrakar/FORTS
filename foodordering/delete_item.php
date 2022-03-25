<?php
    include('functions/init.php');
    $itemId = $_GET['id'];
    $sql = "DELETE FROM items
    WHERE pid = '$itemId'";
    $result = query($sql);
    confirm($result);
    redirect('restaurant_admin.php');

?>