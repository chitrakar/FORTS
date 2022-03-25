<?php 
    define('location','index.php');
    define('navbar_position','');
    include('includes/header.php');

    $search=$_GET['search'];

    if(!$search){
        redirect('index.php');
    }

    echo '
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h3>You searched for : <kbd>'.$search.'</kbd></h3>
                </div>
            </div>
    ';

    if(isset($_GET['sort'])){
            $sql = "SELECT * FROM items WHERE name LIKE '%$search%' ORDER BY price ASC";
            $result = query($sql);
            if(num_rows($result)>0){
                while($row = fetch_array($result)){
                    $rid = $row['rid'];
                    $name = $row['name'];
                    $price=$row['price'];
                    $rname = $row['rname'];
                    $image = $row['image'];

                    echo '
                    <div class="col-lg-3 col-md-4 col-xs-12 col-sm-6">
                        <div class="thumbnail">
                            <img src="'.$image.'" alt="food" class="img-responsive" style="width:100%;height:250px;">
                            <div class="caption">
                                <p><b>'.$name.'</b></p>
                                <p>Rs.'.$price.'<span style="float: right;"><b>Restaurant: </b><a href="restaurant.php?id='.$rid.'" class="btn btn-primary btn-sm">'.$rname.'</a></span></p>
                            </div>
                        </div>
                    </div>
            
                    ';
                }
            }

        }
    echo '</div>';
   
    ?>