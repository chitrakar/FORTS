<?php

	$con = mysqli_connect('localhost','root','','foodordering1');

	//to escape any unnecessary strings
	function escape($string){
		global $con;
		return mysqli_real_escape_string($con,$string);
	}

	//to check the query
	function query($query){
		global $con;
		return mysqli_query($con,$query);
	}

	// confirming the query
	function confirm($result){
		global $con;
		if(!$result){
			die("Query Failed".mysqli_error($con));
		}
	}

	//to check no. of rows
	function num_rows($result){
		global $con;
		return mysqli_num_rows($result);
	}

	//to create array of the selection
	function fetch_array($result){
		global $con;
		return mysqli_fetch_array($result);
	}




?>
