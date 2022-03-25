
<nav class="navbar navbar-default ">
  <div class="container-fluid" style="background-color:orange;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="color:white;" href="<?php echo location; ?>">FoodOrdering</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">

      <?php if(isset($_SESSION['email'])){
          echo '<li><a href="reservation_list.php" style="color:white;"><span class="glyphicon glyphicon-th-list"></span> My Reservation</a></li>';
        }  ?>
      <?php if(isset($_SESSION['email'])){
          echo '<li><a href="order_history.php" style="color:white;"><span class="glyphicon glyphicon-th-list"></span> My History</a></li>';
        }  ?>
        
        <?php if(isset($_SESSION['email'])){
          echo '
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="cart_container" style="color:white;" ><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a>
            <ul class="dropdown-menu">
              <div class="container" style="width:600px;">
                <table class="table table-dark" id="cart_product">
                  
                  
                </table>
              </div>
              <div class="container" style="width:450px;">
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4"><a class="btn btn-success" href="cart.php">Edit Cart</a></div>
                  <div class="col-md-4"></div>
                </div>
                
              </div>
            </ul>
          </li>

          ';
        }  ?>
        <?php
        if(!isset($_SESSION['admin']) && !isset($_SESSION['email']) && !isset($_SESSION['rname'])){
        // echo '
        
        // <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        
        // ';
        ?>
          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-default " data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</button>

          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" >Login</h4>
                </div>
                <div class="modal-body">
                
                  <!-- tabs -->
                    <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#customer">Customer Login</a></li>
                    <li><a data-toggle="tab" href="#restaurant">Restaurant Login</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="customer" class="tab-pane fade in active">
                            <!-- customer login -->
                            <div class="panel panel-default b-top">
                                <div class="panel-body">
                                    <form method="post">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                                        </div><br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                                        </div><br>
                                        
                                        No account?<a href="customer_signup.php" class="btn btn-link" >Sign up</a><br><br>
                                        <input type="submit" class="btn btn-primary btn-block" name="signup" value="Customer Login">
                                    </form>
                                </div>
                            </div>
                            <!-- /login -->
                        </div>
                        <div id="restaurant" class="tab-pane fade">
                            <!-- restaurant login -->
                            <div class="panel panel-default b-top">
                                <div class="panel-body">
                                    <form method="post">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="text" name="rname" id="rid" class="form-control" placeholder="Enter Restaurant Name" required>
                                        </div><br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                                        </div><br>
                                        
                                        No account?<a href="restaurant_signup.php" class="btn btn-link" >Sign up</a><br><br>
                                        <input type="submit" class="btn btn-success btn-block" name="signup" value="Restaurant Login">
                                    </form>
                                </div>
                            </div>
                            <!-- /login -->
                        </div>
                    </div>
                    <!-- tabs -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
        <?php
        }?>
        <?php
        if(isset($_SESSION['admin']) || isset($_SESSION['rname'])){
          echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
        }?>
        <?php 
        if(isset($_SESSION['email'])){echo'
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" style="color:white;" href="#">Hi, '.$_SESSION["username"].'
            <span class="caret"></span></a>
            <ul class="dropdown-menu">';
          
              echo'
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </li>';}?>
      </ul>
    </div>
  </div>
</nav>


