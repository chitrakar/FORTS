

<?php
    define('location','#');
    define('navbar_position','');
    include('includes/header.php');
    $totalset = $_GET['total'];
   echo ' <div class = "container">
   <form method="post">
        <input type="radio" name = "ordertype" value="yes"> Yes
        <input type="radio" name=  "ordertype" value="no"> No
        <input type ="submit" name="submit" value="Confirm">
    </form>
    </div>
    ';
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['ordertype'])) {
            if($_POST['ordertype']=='yes'){
                $link = "purchase.php?total=".$totalset;
                redirect($link);
            }
            else{
                
                $link = "cart.php";
                redirect($link);
                

            }
        } else {
            echo 'Please select the value.';
        }
    }



?>