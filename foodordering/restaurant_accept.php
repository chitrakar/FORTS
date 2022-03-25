<?php 
    include('functions/init.php');

    $id = $_GET['id'];

    $request_query = "SELECT * FROM request WHERE id = $id";
    $result = query($request_query);
    if(num_rows($result)>0){
        while($row = fetch_array($result)){
            $id = $row['id'];
            $rname = $row['rname'];
            $address = $row['address'];
            $email = $row['email'];
            $password = $row['password'];
            $image = $row['image'];      
            
            $sql = "INSERT INTO restaurant(rname,password,address,image,email)";
			$sql.="VALUES('$rname','$password','$address','$image','$email')";
			$result = query($sql);


            // the message
            $msg = "Your restaurant request is accepted. Thank you for joining us.";

            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

            //header
            $headers = "From: bayungpradip@gmail.com" . "\r\n" .
            "CC: ".$email;

            // send email
            mail($email,"Restaurant Accepted",$msg,$headers);


            $delete_query = "DELETE FROM request WHERE id = $id";
            $result2 = query($delete_query);

            redirect('admin/restaurant_requests.php');
			
        }   
        
    }   
    
    
    
?>