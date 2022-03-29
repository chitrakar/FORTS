<?php include('functions/init.php');

        //adding items according to product id
        if(isset($_POST['addToCart'])){
            if(isset($_SESSION['email'])){
            $p_id = $_POST['prodId'];
            $uid = $_SESSION['uid'];
            
            $sel_sql = "SELECT * FROM cart WHERE pid = '$p_id' AND customerId = '$uid';";
            $runQuery = query($sel_sql);
            $count = num_rows($runQuery);
            if($count > 0){// if item already exist in cart
                echo 'Product Already Added To Cart';
            }
            else{// if item doesnot exist in cart then we add it to cart
                
                // $sql = "SELECT * FROM items WHERE pid = '$p_id';";
                // $runQuery = query($sql);
                // $row = fetch_array($runQuery);
                    // $pid = $row['pid'];
                    $i = 1;
                    $sql2 = "INSERT INTO cart(pid, quantity, customerId) VALUES('$p_id', '$i', '$uid');";
                    
                    if(query($sql2)){
                        echo 'Product Added Successfully';
                        // for cart show
                    }
            }
        }
        else{
            echo 'Please Login First.';
        }
    }

    if(isset($_POST['get_cart_product']) || isset($_POST['cart_checkout']) || isset($_POST['location'])){
        $email = $_SESSION['email'];
        $uid = $_SESSION['uid'];
        $sql = "SELECT cart.pid, cart.quantity, items.name, items.price, restaurant.rname FROM cart INNER JOIN items ON cart.pid=items.pid INNER JOIN restaurant ON items.rid=restaurant.id WHERE customerId = '$uid'; ";
        $runQuery = query($sql);
        $dataNumber = num_rows($runQuery);
        if($dataNumber>0){
            $index = 1;
            $total_amt = 0;
            if(isset($_POST['get_cart_product'])){
            echo '
                <thead class="thead-dark">
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Restaurant</th>
                </thead>
            ';}
            while($row = fetch_array($runQuery)){
                $product_id = $row['pid'];
                $prodTitle = $row['name'];
                $price = $row['price'];
                $qty = $row['quantity'];
                $total = $qty * $price;
                $rname = $row['rname'];
                $price_array = array($total);//creates array of every prices on the cart
                $total_sum = array_sum($price_array);//adds every items on cart
                $total_amt = $total_amt + $total_sum;
                
                if(isset($_POST['get_cart_product'])){
                    echo '
                        
                        <tr>
                        <td>'.$prodTitle.'</td>
                        <td>'.$qty.'</td>
                        <td>Rs.'.$price.'</td>
                        <td>'.$rname.'</td>
                        </tr>
                                                
                    ';
                    $index++;
                }
                elseif(isset($_POST['cart_checkout'])){//for cart checkout
                    echo '
					<div class="row">
                        <div class="col-md-2 col-xs-2 col-sm-2">'.$prodTitle.'</div>
                        <div class="col-md-3 col-xs-3 col-sm-3">'.$rname.'</div>
						<div class="col-md-1 col-xs-1 col-sm-1"><input type="text" size="10" class="form-control qty" pid="'.$product_id.'" id="qty-'.$product_id.'" value="'.$qty.'" min=1 max=20 ></div>
						<div class="col-md-2 col-xs-2 col-sm-2"><input type="text" class="form-control price"  size="5" pid="'.$product_id.'" id="price-'.$product_id.'" value="'.$price.'" disabled></div>
						<div class="col-md-2 col-xs-2 col-sm-2"><input type="text" class="form-control total" pid="'.$product_id.'" id="total-'.$product_id.'" value="'.$total.'" disabled></div>
						<div class="col-md-2 col-xs-2 col-sm-2">
							<div class="btn-group">
								<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
								<a href="" update_id="'.$product_id.'" class="btn btn-success update"><span class="glyphicon glyphicon-ok-sign"></span></a>
							</div>
						</div>
					</div><hr/>
					';
                }
                
            }
            // gives the total sum of amount
			if(isset($_POST['cart_checkout'])){
				echo '
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<h4><b id="total" data-id="'.$total_amt.'">Total Rs.'.$total_amt.'</b></h4>
                        
					</div>
                    <div class="col-md-4">
                        <div id="checkout_div"></div>
                        <a class="btn btn-success" name="checkout" id="checkout" href= "confirm_order.php?total='.$total.'"> Check Out</a>
                    </div>
                </div>


				';
            }
            
            // //dine in time
            // if(isset($_POST['checkout'])){
            //     // $lat = $_POST['lat'];
            //     // $long = $_POST['long'];
            //     $total = $_POST['total'];
            //     echo '<a class="btn btn-success" href="confirm_order.php?total='.$total.'"><i class="glyphicon glyphicon-floppy-saved"></i> Checkout</a>';
            // }
        }
    }

    // removing items
	if(isset($_POST['removeFromCart'])){
		$pid = $_POST['removeId'];
		$uid = $_SESSION['uid'];
		$sql = "DELETE FROM cart WHERE customerId = '$uid' AND pid = '$pid'";
		$runQuery = query($sql);
		if($runQuery){
			echo 'Product Removed';
		}
    }
    
    //updating products
	if(isset($_POST['updateProduct'])){
		$uid = $_SESSION['uid'];
		$pid = $_POST['updateId'];
		$qty = $_POST['qty'];
        
		$price = $_POST['price'];
		$total = $_POST['total'];
        
    
        $sql = "UPDATE cart SET quantity='$qty' WHERE customerId='$uid' AND pid='$pid'";
        $runQuery = query($sql);
        if($runQuery){
            echo 'Product Updated';
        }
        
		
    }


    
?>
<?php include("script.php");?>