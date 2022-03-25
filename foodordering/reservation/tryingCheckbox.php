<?php
  include('../functions/init.php');
  $resid = $_GET['id'];
  $tid;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Reservation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
  input[type=checkbox].parent
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(4); /* IE */
  -moz-transform: scale(4); /* FF */
  -webkit-transform: scale(4); /* Safari and Chrome */
  -o-transform: scale(4); /* Opera */
  transform: scale(4);
  padding: 20px;
  margin-left: 95px;
  margin-top: 60px;
  margin-bottom: 20px;
  outline: 1px dotted red;
} 
input[type=checkbox].child
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(3); /* IE */
  -moz-transform: scale(3); /* FF */
  -webkit-transform: scale(3); /* Safari and Chrome */
  -o-transform: scale(3); /* Opera */
  transform: scale(3);
  padding: 20px;
  margin-left: 30px;
  margin-top: 20px;
}
.def{
  /* background-color: blue; */
}
.reserve{
  margin-top: 50px;
}
/* new style for table */

/* style off */
</style>
<body>

<div id="tables" class="container">
  <form action="action.php" method="POST">
  <?php
      $sql = "SELECT * FROM `table_detail` WHERE res_id ='$resid' ;";
      $result = $con->query($sql);
      $i=0;
      foreach ($result as $r) { 
          $tid = $r['id'];
          $i++;
          
  ?>
  <div class="col-lg-3 def">
    <h5>Table No. <?php
      echo $i;
    ?></h5>
    
    <input type="checkbox" id="check" class="parent _checkbox" name="table[]" value=<?php echo "'".$tid."'"?>>
    <label for="check">
      <div class="tick_mark"></div>
    </label>
    <div class="childselect">
      <?php
          $sql2 = "SELECT * FROM `chair_detail` WHERE table_id ='$tid' ;";
          $result2 = $con->query($sql2);
          foreach ($result2 as $r) { 
            $cid = $r['id'];
  ?>
  <input type="checkbox" name="chair[]" class="child" value=<?php echo "'".$cid."'"?>>
  <?php
          }echo '</div></div>';
  }
  ?>
  <div class="row">
  <div class="col-lg-4"></div><div class="col-lg-4"><input type="submit" class="btn btn-success reserve" name="reserve" value="Reserve"></div><div class="col-lg-4"></div>
  </div>
  </form>
</div>

<script src="scripts/script.js"></script>
</body>
</html>
