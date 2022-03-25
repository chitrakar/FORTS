<?php 
    include('../functions/init.php');
    
    //loading reservation data
    if(isset($_POST['load'])){
        $rid = $_POST['rid'];
        // $sql = "SELECT * FROM `reservation_detail` WHERE restaurantId='$rid'";
        $sql= "SELECT customer.email, customer.phoneNum, reservation_detail.reservation_date, reservation_detail.reservationTime  FROM `customer` RIGHT JOIN `reservation_detail` ON (customer.id = reservation_detail.customerId AND reservation_detail.restaurantId = $rid) ;";
        $result = $con->query($sql);
        $data="";
        $i=1;
        foreach($result as $r){
            
           $data .= ' <tr class="gradeX">
           <td>'.$i.'</td>
           <td>'.$r['reservation_date'].'</td>
           <td>'.$r['reservationTime'].'</td>
           <td>'.$r['email'].'</td>
           <td>'.$r['phoneNum'].'</td>';
           if($r['status']=='0'){
                $data .= '<td class="text-warning">Pending</td>';
           }else{
               $data.='<td class="text-success">Accepted</td>';
           }
           $data .='
           <td><button class="btn btn-sm btn-success" id="accept" rid="'.$r['id'].'">Accept</button> <button class="btn btn-sm btn-danger" id="reject" rid="'.$r['id'].'">Reject</button>
           </td>
       </tr>';
       $i++;
        } 
        echo $data;
    }

    //accepting reservation
    if(isset($_POST['accept'])){
        $rid = $_POST['rid'];
        $sql = "UPDATE `reservation_detail` SET `status`='1' WHERE `id`='$rid'";
        $result = $con->query($sql);

        //selecting chairs
        $sql1 = "SELECT `chair_id` FROM `reservation_detail` WHERE id='$rid'";
        $result1=$con->query($sql1);
        foreach ($result1 as $r) {
            $chairs= $r['chair_id'];
            $ex = explode(',',$chairs);
            $i =0;
            $size = sizeof($ex) -1;
            //updating chairs
            for($i;$i<$size;$i++){
                $chid = $ex[$i];
                $sql2 = "UPDATE `chair_detail` SET `booked`='1' WHERE id='$chid'";
                $result2=$con->query($sql2);
            }
        }
        
        
        echo 'Reservation Accepted';
    }

    //Rejecting reservation
    if(isset($_POST['reject'])){
        $rid = $_POST['rid'];
        $sql = "UPDATE `reservation_detail` SET `status`='0' WHERE `id`='$rid'";
        $result = $con->query($sql);

        //selecting chairs
        $sql1 = "SELECT `chair_id` FROM `reservation_detail` WHERE id='$rid'";
        $result1=$con->query($sql1);
        foreach ($result1 as $r) {
            $chairs= $r['chair_id'];
            $ex = explode(',',$chairs);
            $i =0;
            $size = sizeof($ex) -1;
            //updating chairs
            for($i;$i<$size;$i++){
                $chid = $ex[$i];
                $sql2 = "UPDATE `chair_detail` SET `booked`='0' WHERE id='$chid'";
                $result2=$con->query($sql2);
            }
        }
        echo 'Reservation Rejected';
    }

?>