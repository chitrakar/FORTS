<?php 
    include('../functions/init.php');
    $rid = $_SESSION['id'];
    if(isset($_POST['add'])){
        $chairno = $_POST['num_chair'];
        $floorno = $_POST['floor_num'];
            $sql = "INSERT INTO `table_detail` (`id`, `num_chairs`, `floor_num`, `restaurantId`, `status`) VALUES (NULL, '$chairno', '$floorno', '$rid', '0');";
			$result = $con->query($sql);
        redirect('table_manage.php');
    }
	
?>