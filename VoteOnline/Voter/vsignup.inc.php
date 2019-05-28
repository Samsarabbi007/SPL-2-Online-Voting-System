<?php

if (isset($_POST['signup-submit'])) 
{
	require "../EC/dbh.inc.php";

	$username = $_POST['uid'];
	$gender = $_POST['gender'];
	$email  = $_POST['email'];
	$password = $_POST['pwd'];
	$repeatPwd= $_POST['repeat-pwd'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];

	if (empty($username) || empty($password) || empty($repeatPwd)) 
	{
		header("Location:vsignup.php?error=emptyfield&uid=".$username."&email=".$email);
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location:vsignup.php?error=InvalidEmail&Username");
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location:vsignup.php?error=InvalidEmail&uid=".$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location:vsignup.php?error=InvalidUsername&email=".$email);
		exit();
	}
	elseif ($password != $repeatPwd) {
		header("Location:vsignup.php?error=passwordNotMatch&uid=".$username."&email=".$email);
		exit();
	}
	else
	{
		$sql = "SELECT email FROM voter WHERE email=?";
		$stmt= mysqli_stmt_init($connection);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location:vsignup.php?error=sqlErrorHere");
			exit();			
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$result = mysqli_stmt_num_rows($stmt);
			if ($result > 0) {
				header("Location:vsignup.php?error=emailExists&username=".$username);
				exit();	
			}
			else
			{
				$sql = "INSERT INTO voter (id, username, gender, email, password, address, contact) VALUES (null, ?, ?, ?, ?, ?, ?)";

				$stmt= mysqli_stmt_init($connection);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location:vsignup.php?error=sqlError");
					exit();			
				}
				else
				{
					$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssssss", $username, $gender, $email, $hashedpwd, $address, $contact);
					mysqli_stmt_execute($stmt);
					header("Location:Vsignup.php?signup=success");
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
	header("Location:vsignup.php");
	exit();	
}

?>