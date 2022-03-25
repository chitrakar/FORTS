<div class="container">
            <h2>Our Menu</h2>
            <div class="row">
                <?php 
                    $sql = "SELECT * FROM items WHERE rid = '$id';";
                    $result = query($sql);
                    if(num_rows($result)>0){
                        while($row = fetch_array($result)){
                            $name = $row['name'];
                            $price= $row['price'];
                            $pid = $row['pid'];
                            $image = $row['image'];
                        echo '
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="thumbnail">
                                <img src="'.$image.'" alt="food" class="img-responsive" style="width:100%;height:250px;">
                                <div class="caption">
                                    <p><b>'.$name.'</b></p>
                                    <p>Rs.'.$price.'
                                <button class="btn btn-success btn" id="product" pid="'.$pid.'" style="float:right;"><i class="glyphicon glyphicon-plus"></i> Add to Cart</button>
                        
                                </p>        
                                </div>
                            </div>
                        </div>
                        
                        ';
                          
                    }
                }
                
                ?>

                
            </div>
            <h2>Recommendations</h2>
            <div class="row">
                <?php
                    $uid = $_SESSION['uid'];
                    $url = "http://localhost:8000/recommend/food?user_id=".$uid;
                    $ch=curl_init();
                    curl_setopt($ch, CURLOPT_URL,$url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    

                    $res=curl_exec($ch);

                    // echo $res;
                    if($e = curl_error($ch)){
                        echo $e;
                    }
                    else{
                        
                        $res =json_decode($res);
                        // print_r($res->result);
                        foreach($res->result as $food_id)
                        {
                            

                            $sql = "SELECT DISTINCT items.pid, items.name, items.price, items.image, restaurant.rname FROM items LEFT JOIN restaurant ON items.rid=restaurant.id  WHERE pid = '$food_id';";
                            $result = query($sql);
                
                                while($row = fetch_array($result)){
                                    $name = $row['name'];
                                    $price = $row['price'];
                                    $pid = $row['pid'];
                                    $image = $row['image'];
                                    $rname = $row['rname'];
                    
                                echo '
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <div class="thumbnail">
                                        <img src="'.$image.'" alt="food" class="img-responsive" style="width:100%;height:250px;">
                                        <div class="caption">
                                            <p><b>'.$name.'</b></p>
                                            <p><b>'.$rname.'</b></p>
                                            <p>Rs.'.$price.'
                                        <button class="btn btn-success btn" id="product" pid="'.$pid.'" style="float:right;"><i class="glyphicon glyphicon-plus"></i> Add to Cart</button>
                                
                                        </p>        
                                        </div>
                                    </div>
                                </div>
                                
                                ';
                                  
                                }
                            
                        }
                    }    
                    
                    curl_close($ch);

                    
                
                ?>
                    
            </div>
            
</div>

<?php include("script.php");?>