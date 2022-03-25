<?php 
    define('location','#');
    define('navbar_position','navbar-fixed-top');
    include('includes/header.php');
    if(isset($_SESSION['admin'])){
        redirect('admin/');
    }
    if(isset($_SESSION['rname'])){
        redirect('restaurant/restaurant_admin.php');
    }
    ?>
    
<div class="banner">
    <form method="POST" action="search.php">
        <h2>Order food from the widest range of restaurants.</h2>
        <div class="input-group col-md-6 col-sm-6 col-xs-6 banner-text">
            <input type="text" size="30" class="form-control" placeholder="Restaurant, Food, location" name="q">
            <div class="input-group-btn">
            <button class="btn btn-default btn-success" name="search">
                Search
            </button>
            </div>
        </div>
    </form>
</div>
<div class="container">
    <div class="row">
        <h2 style="color: #F79420;font-size: 400%;font-weight:bold;letter-spacing:3px;text-align:center;padding:70px;">Restaurants</h2>
        <!--  -->
        <?php 
            $query = "SELECT * FROM restaurant";
            $result = query($query);
            if(num_rows($result)>0){
                while($row = fetch_array($result)){
                    $id =$row['id'];
                    $name = $row['rname'];
                    $address = $row['address'];
                    $email = $row['email'];
                    $image = $row['image'];

                    echo '
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="thumbnail noborder trans">
                            <a href="restaurant.php?id='.$id.'">
                                <img src="'.$image.'" alt="" style="" class="res-img">
                                <div class="caption">
                                    <center><p class="rest-cap">'.$name.'</p></center>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    ';
                }
                }
        ?>
        <!--  -->
    </div>
</div>
<div class="container-fluid" style="margin-top:70px;">
    <div class="row about">
            <div class="col-md-12">
                <div class="about_us">
                    <p>
                        <h2>About Us</h2>
                        <span class="banner-text text-center">
                        FoodOrdering is the fastest, easiest and most convenient way to enjoy the best food of your favourite restaurants at home, at the office or wherever you want to.<br>We know that your time is valuable and sometimes every minute in the day counts. That’s why we deliver!</span>
                    </p>	
                </div>
                
            </div>
        </div>
    </div>
</div>



<?php include("./script.php");?>
<?php include('includes/footer.php'); ?>