<?php 
    define('location','#');
    define('navbar_position','');
    include('includes/header.php');
    if(!isset($_SESSION['rname'])){
        redirect('index.php');
    }
    $rname = $_SESSION['rname'];
    $id = $_SESSION['id'];
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $target_dir = "images/items/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

    $sql = "INSERT INTO items(rid,name,image,price,rname) VALUES('$id','$pname','$target_file','$price','$rname')";
    $result = query($sql);
    redirect('restaurant_admin.php');
?>