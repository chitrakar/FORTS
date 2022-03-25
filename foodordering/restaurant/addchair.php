<?php 
    include('../functions/init.php');

    $rname = $_SESSION['rname'];
    if(isset($_POST['add'])){
        $chairno = $_POST['chairno'];
        $tid = $_POST['tid'];
        for($i=0;$i<$chairno;$i++){
        $sql = "INSERT INTO `chair_detail` (`id`, `table_id`, `booked`) VALUES (NULL, '$tid', '0');";
        $result = $con->query($sql);
        }

        redirect('table_manage.php');
    }
    // if(isset($_POST['decrease'])){
    //     $chairno = $_POST['chairno'];
    //     $tid = $_POST['tid'];
    //     for($i=0;$i<$chairno;$i++){
    //     $sql = "INSERT INTO `chair_detail` (`id`, `table_id`, `booked`) VALUES (NULL, '$tid', '0');";
    //     $result = $con->query($sql);
    //     }

    //     redirect('table_manage.php');
    // }
	
?>