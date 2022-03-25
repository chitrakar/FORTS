<?php 
    define('location','#');
    define('navbar_position','');
    include('includes/header.php');
    if(!isset($_SESSION['rname'])){
        redirect('index.php');
    }
?>

<!-- $_SESSION['rname']$_SESSION['id'] -->

<!-- show restaurant items here -->
<?php
    $rname = $_SESSION['rname'];
echo'
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Restaurant Name: '.$rname.' </h3>
            </div>
            
            <div class="col-md-12"></div>
            <div class="col-md-12">
                <!-- Centered Pills -->
                <ul class="nav nav-pills nav-justified">
                <li class="active"><a href="restaurant_admin.php">Our Menu</a></li>
                <li><a href="request_order.php">Request Orders</a></li>
                
                </ul>
            </div>
        </div>
        
    </div>
        
        ';
    
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th>Sno.</th>
                        <th>Items</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $rname = $_SESSION['rname'];
                            $item_query = "SELECT * FROM items WHERE rname = '$rname'";
                            $result = query($item_query);
                            $i = 1;
                            if(num_rows($result)>0){
                                while($row = fetch_array($result)){
                                    $itemId = $row['pid'];
                                    $iname= $row['name'];
                                    $price=$row['price'];
                                    $image = $row['image'];
                                    echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td>'.$iname.'</td>
                                        <td><img src="'.$image.'" class="img-responsive" style="width:200px;height:150px;"></td>
                                        <td>Rs.'.$price.'</td>
                                        <td>
                                            <a class="btn btn-danger" href="delete_item.php?id='.$itemId.'">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <a type="button" class="btn btn-success" data-toggle="modal" data-target="#edititem"><span class="glyphicon glyphicon-edit"></span></a>
                                        
                                        <!-- Modal -->
                                        <div id="edititem" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Update Item</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="edit_item.php?id='.$itemId.'" method="POST"  enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="name">Item:</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="pname" id="name" placeholder="Enter item name" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="price">Price:</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="price" id="price" placeholder="Enter price" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="fileToUpload">Select image:</label>
                                                        <div class="col-sm-10">
                                                        <input type="file" name="image" id="fileToUpload" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" class="btn btn-default">Update Item</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                            </div>

                                        </div>
                                        </div>
                                        <!-- modal -->

                                        </td>
                                    </tr>
                                    ';
                                    $i++;
                                }
                            }
                        ?>
                    
                    </tbody>
                </table>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <!-- Add item Modal -->
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#additem"><span class="glyphicon glyphicon-plus-sign"></span> Add Item</button>

                <!-- Modal -->
                <div id="additem" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Item</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="add_item.php" method="POST"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Item:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="pname" id="name" placeholder="Enter item name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="price">Price:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="price" id="price" placeholder="Enter price" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="fileToUpload">Select image:</label>
                                <div class="col-sm-10">
                                <input type="file" name="file" id="fileToUpload" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Add Item</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    </div>

                </div>
                </div>
                <!-- modal -->

            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    


<?php include("./script.php");?>
<?php include('includes/footer.php'); ?>
