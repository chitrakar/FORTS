<?php
        include('../functions/init.php');
        $tableId = $_GET['id'];
        $num_chairs = $_POST['num_chairs'];
        $floor_num = $_POST['floor_num'];


        $sql = "UPDATE table_detail SET num_chairs='$num_chairs', floor_num='$floor_num' WHERE id='$tableId' ";

        $result = query($sql);
        redirect('table_manage.php');

?>
