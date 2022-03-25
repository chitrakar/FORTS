<?php 
    include('functions/init.php');

    $id = $_GET['id'];
    $request_query = "DELETE FROM request WHERE id = $id";
    $result = query($request_query);
    confirm($result);
    redirect('restaurant_request.php');
    
    
?>