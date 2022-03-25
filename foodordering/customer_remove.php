<?php 
    include('functions/init.php');

    $id = $_GET['id'];

    $delete_query = "DELETE FROM customer WHERE id = $id";
    $result = query($delete_query);

    redirect('customer_detail.php');
    
    
?>