<?php
  include('functions/init.php');
  // $id = $_GET['id'];
  //table data
//   if(isset($_POST['table'])){
//     $rid = $_POST['rid'];
//     $data;
//     $sql = "SELECT * FROM `table_detail` WHERE res_id ='$rid' ;";
//     $result = $con->query($sql);
//     foreach ($result as $r) { 
//         $tid = $r['table_id'];
//         $data .= '<input type="checkbox" name="" id="">';

//         $sql2 = "SELECT * FROM `chair_detail` WHERE table_id ='$tid' ;";
//         $result2 = $con->query($sql2);
//         foreach ($result2 as $r) { 
//             $data .= '<input type="checkbox" name="" id="">';

//     }
// }
// echo $data;
// }
  //table data close

  if(isset($_POST['reserve'])){
    
    $i =0;
    foreach($_POST['table'] as $table){
      $i++;
      $tid= $table;
    }
    if($i == 0){
      echo '<script>
        alert("Please select a table");
        window.location.replace("table_reservation.php?id='.$id.'");
        </script>';
    }
    elseif($i>1){
      echo '<script>
        alert("Please select only 1 table");
        window.location.replace("table_reservation.php?id='.$id.'");
        </script>';
    }
    else{
      $j =0;
      foreach($_POST['chair'] as $chair){
        $j++;
      }
      if($j>=1){
        ?>
        <form action="reservation.php?id=<?php echo $id;?>">
          <input type="hidden" value="<?php echo $tid;?>" name="table">
        <?php
        foreach($_POST['chair'] as $chair){
          echo '<input type="checkbox" name="chair" id="" value="'.$chair.'">';
        }
        echo '<form>';
      }
      else{
        echo '<script>
        alert("Please select at least one chair");
        window.location.replace("table_reservation.php?id='.$id.'");
        </script>';

      }
      
    }
  }
?>