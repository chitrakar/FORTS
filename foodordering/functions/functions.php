<?php
	/************* Helper Functions *************/
	//clear unnecessary entity from form inputs
	function clean($string){
		return htmlentities($string);
	}

	//
	function redirect($location){
		return header("Location: {$location}"); //{}inside this it is variable
	}

	//to use session messages
	function set_message($message){
		if(!empty($message)){
			$_SESSION['message'] = $message;
		}
		else{
			$message = "";
		}
	}

	function display_message(){
		if(isset($_SESSION['message'])){
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
	}

	//securing form
	function token_generator(){
		$token = $_SESSION['message'] = sha1(uniqid(mt_rand(),true));
		return $token;
	}

	//display validation error
	function validation_errors($message){
		echo '<div id="custom_alert" class="alert alert-warning alert-dismissible role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
						<strong>Warning! </strong>'.$message.'
					</div>';
	}

	//customer email check
	function email_exist($email){
		$sql = "SELECT id FROM customer WHERE email='$email'";
		$result = query($sql);
		if(num_rows($result) == 1){
			return true;
		}
		else{
			return false;
		}
	}
	//restaurant email check
	function remail_exist($email){
		$sql = "SELECT id FROM request WHERE email='$email'";
		$result = query($sql);
		if(num_rows($result) == 1){
			return true;
		}
		else{
			return false;
		}
	}

	//user check
	function username_exist($username){
		$sql = "SELECT id FROM customer WHERE username='$username'";
		$result = query($sql);
		if(num_rows($result) == 1){
			return true;
		}
		else{
			return false;
		}
	}

	//restaurant check
	function rname_exist($rname){
		$sql = "SELECT id FROM restaurant WHERE rname='$rname'";
		$result = query($sql);
		if(num_rows($result) == 1){
			return true;
		}
		else{
			return false;
		}
	}



	/************* Helper Functions End*************/





	/************* Validation Functions *************/
	//validation user
	function validate_user_registration(){

		//this will see if the form was submitted
		// 	if(isset($_POST['signup']))
		// }

		//we can create a function that can check whether there was post request

		if($_SERVER['REQUEST_METHOD']=="POST"){

			$errors = [];
			$min = 3;
			$max = 20;

			$username = clean($_POST['username']);
			$email = clean($_POST['email']);
			$password = clean($_POST['password']);
			$confirm_password = clean($_POST['confirm_password']);

			if(username_exist($username)){
				$errors[] = "Sorry that username is already taken";
			}

			if(email_exist($email)){
				$errors[] = "Sorry that email is already registered";
			}

			if($password !== $confirm_password){
				$errors[] = "Your passwords do not match";
			}

			//error display

			if(!empty($errors)){
				foreach($errors as $error) {
					validation_errors($error);
				}
			}
			else{
				if(register_user($username,$email,$password)){
					set_message('<div class="alert alert-success alert-dismissible role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
							<strong>Congratulation! </strong>You have successfully registered. Please check your email for activation link.
						</div>');
					$_SESSION['email']=$email;
					$_SESSION['username']=$username;
					redirect("index.php");
					echo '';
				}
			}
		}
	}

	function register_user($username,$email,$password){
		$username = escape($username);
		$email = escape($email);
		$password = escape($password);

		if(email_exist($email)){
			return false;
		}
		else if(username_exist($username)){
			return false;
		}
		else{
			$password = sha1($password);

			$validation = sha1($username);

			$sql = "INSERT INTO customer(username,password,email)";
			$sql.="VALUES('$username','$password','$email')";
			$result = query($sql);
			confirm($result);
			return true;

		}
	}

	//validation restaurant
	function validate_restaurant_registration(){

		//this will see if the form was submitted
		// 	if(isset($_POST['signup']))
		// }

		//we can create a function that can check whether there was post request

		if($_SERVER['REQUEST_METHOD']=="POST"){

			$errors = [];
			$min = 3;
			$max = 20;

			$rname = clean($_POST['rname']);
			$email = clean($_POST['email']);
			$address = $_POST['address'];
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["imagefile"]["name"]);


			
			$password = clean($_POST['password']);
			$confirm_password = clean($_POST['confirm_password']);

			if(username_exist($rname)){
				$errors[] = "Sorry that username is already taken";
			}
			if(remail_exist($email)){
				$errors[] = "Sorry that email is already registered";
			}
			if($password !== $confirm_password){
				$errors[] = "Your passwords do not match";
			}

			//error display

			if(!empty($errors)){
				foreach($errors as $error) {
					validation_errors($error);
				}
			}
			else{
				if(register_restaurant($rname,$password,$address,$target_file,$email)){
					set_message('<div class="alert alert-success alert-dismissible role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
							<strong>Congratulation! </strong>You have successfully registered. Please check your email When Accepted.
						</div>');
					redirect("index.php");
					echo '';
				}
			}
		}
	}

	function register_restaurant($rname,$password,$address,$target_file,$email){
		$username = escape($rname);
		$password = escape($password);
		$email = escape($email);

		move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
		if(rname_exist($username)){
			return false;
		}
		if(remail_exist($email)){
			return false;
		}
		else{
			$password = sha1($password);

			move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
			$sql = "INSERT INTO request(rname,address,image,email,password)";
			$sql.="VALUES('$rname','$address','$target_file','$email','$password')";
			$result = query($sql);
			confirm($result);
			
			return true;

		}
	}

	//Validate user login function

	function validate_user_login(){
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$email = clean($_POST['email']);
			$password = clean($_POST['password']);

			if(empty($password)){
				$errors[] = "Password field cannot be empty";
			}

			if(!empty($errors)){
				foreach($errors as $error) {
					validation_errors($error);
				}
			}
			else{
				if(login_user($email,$password)){
					redirect("index.php");
				}
				else{
					echo validation_errors("Your credentials are not correct");
				}
			}

		}
	}

	//User login function

	function login_user($email,$password){
		$sql ="SELECT password,id,username FROM customer WHERE email='".escape($email)."'";
		$result = query($sql);
		if($email=='admin@gmail.com' && $password=="admin"){
			$_SESSION['admin']="admin";
			redirect('./admin/');
		}
		if(num_rows($result)==1){
			$row = fetch_array($result);
			$db_password = $row['password'];
			$uid=$row['id'];
			if(sha1($password) == $db_password){
				$_SESSION['email']=$email;
				$_SESSION['username']=$row['username'];
				$_SESSION['uid']=$uid;
				return true;
			}
			else{
				return false;
			}

			return true;

		}
		else{
			return false;
		}
	}

	// validating restaurant login
	
	function validate_restaurant_login(){
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$rname = clean($_POST['rname']);
			$password = clean($_POST['password']);

			if(empty($password)){
				$errors[] = "Password field cannot be empty";
			}

			if(!empty($errors)){
				foreach($errors as $error) {
					validation_errors($error);
				}
			}
			else{
				if(login_restaurant($rname,$password)){
					redirect("./restaurant/restaurant_admin.php");
				}
				else{
					echo validation_errors("Your credentials are not correct");
				}
			}

		}
	}

	//User login function

	function login_restaurant($rname,$password){
		$sql ="SELECT id,rname,address,image,password FROM restaurant WHERE rname='".escape($rname)."'";
		$result = query($sql);
		if(num_rows($result)==1){
			$row = fetch_array($result);
			$db_password = $row['password'];
			if(sha1($password) == $db_password){
				$_SESSION['rname']=$row['rname'];
				$_SESSION['id'] = $row['id'];
				return true;
			}
			else{
				return false;
			}

			return true;

		}
		else{
			return false;
		}
	}

	/************* User Logged Functions*************/

	function logged_in(){
		if(isset($_SESSION['email'])){
			return true;
		}
		else{
			return false;
		}
	}

	/************* User Logged Functions End*************/

	/************* User profile change *************/
	// function edit_validate(){

	// 	if($_SERVER['REQUEST_METHOD']=="POST"){
			
	// 		$oemail = $_SESSION['email'];
	// 		$email = $_POST['email'];
	// 		$uname = $_POST['uname'];
	// 		$opassword = $_POST['opassword'];
	// 		$sopassword = sha1($opassword);
	// 		$npassword = $_POST['npassword'];
	// 		$snpassword = sha1($npassword);

	// 		$sql = "SELECT * FROM customer WHERE password = '$sopassword'";
	// 		$result = query($sql);
	// 		if(num_rows($result)<0){
	// 			$errors[] = "Sorry password doesnot match";
	// 		}

	// 		if(email_exist($email)){
	// 			$errors[] = "Sorry that email is already taken";
	// 		}
	// 		if(username_exist($uname)){
	// 			$errors[] = "Sorry that username is already taken";
	// 		}
	// 		if(!empty($errors)){
	// 			foreach($errors as $error) {
	// 				validation_errors($error);
	// 			}
	// 		}
	// 		else{
	// 			if(update_user($oemail,$email,$snpassword)){
	// 				redirect("customer_profile.php");
	// 			}
	// 			else{
	// 				echo validation_errors("Your credentials are not correct");
	// 			}
	// 		}

	// 	}

	// }

	// function update_user($oemail,$email,$password){
	// 	$sql = "UPDATE customer SET email = '$email', password='$password' WHERE email = '$oemail'";
	// }
	/************* User profile change End*************/

	/************* Helper Functions End*************/
?>
