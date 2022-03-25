<?php
        include('../functions/init.php');
        $tableId = $_GET['id'];

        $sql = "DELETE FROM table_detail WHERE id = '$tableId'";

        $result = query($sql);
        redirect('table_manage.php');

?>
