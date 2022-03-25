<?php 
    include('functions/init.php');

    $id = $_GET['id'];
    
    $sql = "DELETE FROM restaurant WHERE id = $id";
    $result = query($sql);
    redirect('admin/restaurants.php');

?>