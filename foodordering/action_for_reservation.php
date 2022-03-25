<?php 
    include('./functions/init.php');
    
    //loading reservation data
    if(isset($_POST['load'])){
        $uid = $_SESSION['uid'];
        $sql = "SELECT * FROM `reservation_detail` WHERE `customerId`='$uid'";
        $result = $con->query($sql);
        $data="";
        foreach($result as $r){
            $rid = $r['restaurantId'];
            $x = 0;
            if($r['status']==$x){
                $status = 'Pending';
            }
            else{
                $status = 'Accepted';
            }
            $sql1 = "SELECT rname FROM `restaurant` WHERE `id`='$rid'";
            $result1 = $con->query($sql1);
            foreach($result1 as $res){
                $rname = $res['rname'];
            }
           $data .= ' <div class="col-lg-6 col-lg-offset-3">
           <div class="thumbnail">
               Restaurant Name: <code>'.$rname.'</code><br>
               Rervation Date: <code>'.$r['reservation_date'].'</code><br>
               Reservation Time: <code>'.$r['reservationTime'].'</code><br>
               Phone Number: <code>'.$r['phone'].'</code><br>
                <h4>Status: <span class="text-primary">'.$status.'</span></h4>
               <div class="caption">
                   <button class="btn btn-danger" id="cancel" rid="'.$r['id'].'">Cancel</button>
               </div>
           </div>  
       </div>';
        } 
        echo $data;
    }

    // canceling reservation
    if(isset($_POST['cancel'])){
        $rid = $_POST['rid'];
        $sql = "DELETE FROM `reservation_detail` WHERE `id`='$rid'";
        $result = $con->query($sql);
        echo 'Reservation Cancelled Successfully';
        
    }
?>