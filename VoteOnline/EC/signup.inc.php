<?php

if (isset($_POST['signup-submit'])) 
{
	require "dbh.inc.php";

	$username = $_POST['uid'];
	$email    = $_POST['email'];
	$password = $_POST['pwd'];
	$repeatPwd= $_POST['repeat-pwd'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];

	if (empty($username) || empty($password) || empty($repeatPwd)) 
	{
		header("Location:signup.php?error=emptyfield&uid=".$username."&email=".$email);
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location:signup.php?error=InvalidEmail&Username");
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location:signup.php?error=InvalidEmail&uid=".$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location:signup.php?error=InvalidUsername&email=".$email);
		exit();
	}
	elseif ($password != $repeatPwd) {
		header("Location:signup.php?error=passwordNotMatch&uid=".$username."&email=".$email);
		exit();
	}
	else
	{
		$sql = "SELECT email FROM ec WHERE email=?";
		$stmt= mysqli_stmt_init($connection);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location:signup.php?error=sqlErrorHere");
			exit();			
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$result = mysqli_stmt_num_rows($stmt);
			if ($result > 0) {
				header("Location:signup.php?error=emailExists&username=".$username);
				exit();	
			}
			else
			{
				$sql = "INSERT INTO ec (id, username, email, password, address, contact) VALUES (null, ?, ?, ?, ?, ?)";

				$stmt= mysqli_stmt_init($connection);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location:signup.php?error=sqlError");
					exit();			
				}
				else
				{
					$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $hashedpwd, $address, $contact);
					mysqli_stmt_execute($stmt);
					header("Location:signup.php?signup=success");
					exit();	
				}
			}

		}
	}

mysqli_stmt_close($stmt);
mysqli_close($connection);
}

else
{
	header("Location:signup.php");
	exit();	
}

?>