<?php
session_start();
if (isset($_POST['update-submit'])) 
{
	require "dbh.inc.php";

    $id = $_SESSION['eid'];	
	$username = $_POST['uid'];
	$email    = $_POST['email'];
	$password = $_POST['pwd'];
	$repeatPwd= $_POST['repeat-pwd'];
	$address  = $_POST['address'];
	$contact  = $_POST['contact'];

	

	if (empty($username) || empty($password) || empty($repeatPwd) || empty($id)) 
	{
		header("Location:update.php?error=emptyfield&uid=".$username."&email=".$email);
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location:update.php?error=InvalidEmail&Username");
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location:update.php?error=InvalidEmail&uid=".$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location:update.php?error=InvalidUsername&email=".$email);
		exit();
	}
	elseif ($password != $repeatPwd) {
		header("Location:update.php?error=passwordNotMatch&uid=".$username."&email=".$email);
		exit();
	}
	else
	{
		//check email duplication, if user place another voter's email changing his own email...!!!

	    $sql="SELECT email FROM ec WHERE id != $id AND email = '$email'";
		$result = mysqli_query($connection,$sql); 
		if ($result) 
		{
			$count = mysqli_num_rows($result);
			if ($count>0) {
				header("Location:update.php?error=emailDuplicate"); //&id=".$id
				exit();
			}
		}	
		else
		{
			header("Location:update.php?error=sqlErrorHere");
			exit();
		}	

		//then if everything is okay
		
		$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
		$sql = "UPDATE ec SET username='$username', email='$email', password='$hashedpwd', address='$address', contact='$contact' WHERE id= $id ";
		$result = mysqli_query($connection,$sql);

		if($result)
		{
			header("Location:update.php?update=success");
			exit();
		}
		else
		{
			header("Location:update.php?error=sqlError");
			exit();	
		}
	
	}
}

else
{
	header("Location:update.php");
	exit();	
 }

?>