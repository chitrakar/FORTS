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
    $itemId = $_GET['id'];

    $target_dir = "images/items/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
  
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $sql = "UPDATE items SET name='$pname', price='$price' ,image='$target_file' WHERE pid='$itemId' ";

    $result = query($sql);
    redirect('restaurant_admin.php');
?>