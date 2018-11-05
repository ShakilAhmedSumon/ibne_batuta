<?php


	function emailExist(){
		require_once('config.php');

		global $email;
		global $connection;

		$emailCheck = mysqli_query($connection,"SELECT email FROM user WHERE email='$email'");

		if(mysqli_num_rows($emailCheck)==1){
			return true;
		}
	}


?>