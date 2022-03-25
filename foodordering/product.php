<style>
    .container .post{
  display: none;
}
.container .text{
  font-size: 25px;
  color: #666;
  font-weight: 500;
}
.container .edit{
  position: absolute;
  right: 10px;
  top: 5px;
  font-size: 16px;
  color: #666;
  font-weight: 500;
  cursor: pointer;
}
.container .edit:hover{
  text-decoration: underline;
}
.container .star-widget form input{
  display: none;
}
.star-widget form label{
  font-size: 40px;
  color: #444;
  padding: 10px;
  float: right;
  transition: all 0.2s ease;
}
input:not(:checked) ~ label:hover,
input:not(:checked) ~ label:hover ~ label{
  color: #fd4;
}
input:checked ~ label{
  color: #fd4;
}
input#rate-5:checked ~ label{
  color: #fe7;
  text-shadow: 0 0 20px #952;
}
#rate-1:checked ~ form header:before{
  content: "I just hate it ";
}
#rate-2:checked ~ form header:before{
  content: "I don't like it ";
}
#rate-3:checked ~ form header:before{
  content: "It is awesome ";
}
#rate-4:checked ~ form header:before{
  content: "I just like it ";
}
#rate-5:checked ~ form header:before{
  content: "I just love it ";
}
/* .container form{
  display: none;
} */
input:checked ~ form{
  display: block;
}
.star-widget form header{
  width: 100%;
  font-size: 25px;
  color: orange;
  font-weight: 500;
  margin: 5px 0 20px 0;
  text-align: center;
  transition: all 0.2s ease;
  float: right;
}
form .textarea{
  height: 100px;
  width: 100%;
  overflow: hidden;
}
form .textarea textarea{
  height: 100%;
  width: 100%;
  outline: none;
  color: #eee;
  border: 1px solid #333;
  background: #222;
  padding: 10px;
  font-size: 17px;
  resize: none;
}
.textarea textarea:focus{
  border-color: #444;
}
form .btn{
  height: 45px;
  width: 100%;
  margin: 15px 0;
}
form .btn button{
  height: 100%;
  width: 100%;
  border: 1px solid #444;
  outline: none;
  background: #222;
  color: #999;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  cursor: pointer;
  transition: all 0.3s ease;
}
form .btn button:hover{
  background: #1b1b1b;
}
</style>

<?php 
    define('location','index.php');
    define('navbar_position','');
    include('includes/header.php');
    if(!isset($_SESSION['email'])){
        redirect('index.php');
    }
    $uid = $_SESSION['uid'];
    $id = $_GET['id'];
    $rname = $_GET['rname'];

    $sql = "SELECT * FROM items WHERE pid='$id'";
    $result = query($sql);

    if(num_rows($result)>0){
        while($row = fetch_array($result)){
            $image=$row['image'];
            $price=$row['price'];
            $name = $row['name'];
        }
    }
    echo '
        <div class ="container">
        <div class="col-md-4 col-sm-6 col-xs-6" >
            <div class="thumbnail">
                <img src="'.$image.'" alt="food" class="img-responsive" style="width:100%;height:250px;">
                <div class="caption">
                    <p><b>'.$name.'</b></p>
                    <p>Rs.'.$price.' </p>
                    <p>Restaurant:'.$rname.' </p>        
                </div>
            </div>
        '; ?>
        <?php 
            $sql = "SELECT * FROM reviews WHERE customerId= '$uid' AND itemId = '$id';";
            $result = query($sql);

            if(num_rows($result)>0){

                    while($row = fetch_array($result)){
                        $msg = $row['msg'];
                        $rating = $row['rating'];
                        echo '
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-info">
                                        <div class="panel-heading"> Your review:</div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <p><b>Rating: </b>
                                                    '.$rating.'   
                                                </p>
                                                <p><b>Message: </b>
                                                    '.$msg.'   
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        ';
                    }
                }
            
            
            

            else {

            echo '
            <div class="star-widget">
                <form action="review_submit.php?id='.$id.'" method="POST">
                    <input type="radio" name="rate" value= "5" id="rate-5">
                    <label for="rate-5" class="fas fa-star"></label>
                    <input type="radio" value="4" name="rate" id="rate-4">
                    <label for="rate-4" class="fas fa-star"></label>
                    <input type="radio" value="3" name="rate" id="rate-3">
                    <label for="rate-3" class="fas fa-star"></label>
                    <input type="radio" value="2" name="rate" id="rate-2">
                    <label for="rate-2" class="fas fa-star"></label>
                    <input type="radio" value="1" name="rate" id="rate-1">
                    <label for="rate-1" class="fas fa-star"></label>
                    <header></header>
                    <div class="textarea">
                        <textarea cols="30" name= "msg" placeholder="Describe your experience.."></textarea>
                    </div>
                    <div class="btn">
                        <button type="submit">POST</button>
                    </div>
                </form>
            </div>
        </div>
        ';
        }
        ?>
        

    


<!-- <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe> -->
        <!-- <script>
            const btn = document.querySelector("button");
            const post = document.querySelector(".post");
            const widget = document.querySelector(".star-widget");
            const editBtn = document.querySelector(".edit");
            btn.onclick = ()=>{
                widget.style.display = "none";
                post.style.display = "block";
                editBtn.onclick = ()=>{
                widget.style.display = "block";
                post.style.display = "none";
                }
                return false;
            }
        </script> -->