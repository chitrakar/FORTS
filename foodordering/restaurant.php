<?php 
    define('location','index.php');
    define('navbar_position','');
    include('includes/header.php'); 

    $id = $_GET['id'];
   
    $query = "SELECT * FROM restaurant WHERE id = $id";
    $result = query($query);
    if(num_rows($result)>0){
        while($row = fetch_array($result)){
            $image = $row['image'];
            $rname = $row['rname'];
            $address = $row['address'];
            echo'
                <div class="restaurant_banner">
                    <div class="container this">
                        <div class="row">
                            <div class="col-md-2">
                                <img class="responsive" width="150px" src="'.$image.'" alt="">
                            </div>
                            <div class="col-md-3">
                                 <h3>'.$rname.'</h3>
                                 <span class="glyphicon glyphicon-map-marker"></span>&nbsp;'.$address.'
                            </div>
                            <div class="col-md-6">
                            <a href="table_reservation.php?id='.$id.'" class="btn btn-primary">Reserve a Table <span class="glyphicon glyphicon glyphicon-cutlery"></span></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                Delivery Hours:<br> 
                                10:00 AM - 9:00 PM
                            </div>
                        </div>
                    </div>
                </div>
';}} ?>
<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#menu">Menu</a></li>
        <li><a data-toggle="tab" href="#special">Special Today</a></li>
        <li><a data-toggle="tab" href="#aboutus">About Us</a></li>
    </ul>
    <div class="tab-content">
        <div id="menu" class="tab-pane fade in active">
            <?php include('menu.php'); ?>
        </div>
        <div id="special" class="tab-pane fade">
            <?php include('menu.php'); ?>
        </div>
        <div id="aboutus" class="tab-pane fade">
            <div class="container">
                <h3>About us</h3>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <?php 
                            $id = $_GET['id'];//restaurant id
            
                            $query = "SELECT * FROM restaurant WHERE id = $id";
                            $result = query($query);
                            if(num_rows($result)>0){
                                while($row = fetch_array($result)){
                                    $image = $row['image'];
                                    echo '<img src="'.$image.'" width="80%" alt="">';
                                }
                            }
                        ?>
                        
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <h3>DELIVERY HOURS</h3>
                        <table class="table table-hover del-time">
                            <?php 
                                $days = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
                                foreach($days as $day){
                                    echo '
                                    <tr>
                                        <td style="border-top: none;">'.$day.'</td>
                                        <td style="border-top: none;">10:00AM : 09:00PM</td>
                                    </tr>
                                    ';
                                }
                            
                            ?>
                        </table>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-12"><h3><u>Comments</u></h3></div>
                    <?php  

                        // $sql = "SELECT * FROM reviews WHERE rid = '$id'";
                        // $result = query($sql);
                        // if(num_rows($result)>0){
                        //     while($row = fetch_array($result)){

                        //         $email = $row['email'];
                        //         $msg = $row['msg'];
                        //         echo '
                        //             <div class="row">
                        //                 <div class="col-md-6">
                        //                     <div class="panel panel-info">
                        //                         <div class="panel-heading">'.$email.' says:</div>
                        //                         <div class="panel-body">
                        //                             <div class="form-group">
                        //                                 <p><b>Message: </b>
                        //                                     '.$msg.'   
                        //                                 </p>
                        //                             </div>
                        //                         </div>
                        //                     </div>
                        //                 </div>
                        //             </div>
                        //         ';

                        //     }
                        // }
                    
                    ?>
                    
                </div> -->
                    <?php 
                    // if(isset($_SESSION['email'])){echo'
                    // <div class="row">
                    //     <div class="col-md-5">
                    //         <div class="panel panel-default">
                    //             <div class="panel-heading">Enter Your Review:</div>
                    //             <div class="panel-body">
                    //                 <form action="review_submit.php?id='.$id.'" method="POST">
                    //                     <div class="form-group">
                    //                         <textarea cols="57" name="msg"></textarea>
                    //                     </div>
                    //                     <button type="submit" class="btn btn-success" style="float:right;">Send Review</button>
                    //                 </form>
                    //             </div>
                    //         </div>
                    //     </div>
                    // </div>
                    // ';}
                    ?>
            </div>
        </div>
    </div>

</div>





<?php include("script.php");?>
<?php include('includes/footer.php'); ?>