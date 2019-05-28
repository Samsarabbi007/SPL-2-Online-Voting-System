<?php
session_start();
if (isset($_POST['signin-submit'])) 
{
	require "dbh.inc.php";
	$username = $_POST['uid'];
	$password = $_POST['pwd'];

	if (empty($username)||empty($password)){
		header("Location: signin.php?error=emptyfields");
		exit();			# code...
	}

	else{
		$sql = "SELECT* FROM ec WHERE username = ?";
		$stmt= mysqli_stmt_init($connection);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: signin.php?error=sqlError");
			exit();	
		}
		else
		{

			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if ($row = mysqli_fetch_assoc($result)) 
			{
				$pwdCheck = password_verify($password, $row['password']);
				if ($pwdCheck == false) {
					header("Location: signin.php?error=WrongPassword");
					exit();	
				}
				elseif ($row['status'] != 'approved') {
					header("Location: signin.php?error=notApproved");
					exit();	
				}	
				elseif ($pwdCheck==true) {
					$_SESSION['eid'] = $row['id'];
					$_SESSION['ec'] = $row['username'];
					$_SESSION['email'] = $row['email'];

					header("Location: EC.php?signin=success");
					exit();	
				}
				else
				{
					header("Location: signin.php?error=WrongPassword");
					exit();					
				}
			}
			else
			{
				header("Location: signin.php?error=noUser");
				exit();	
			}
		}

	}
}
else
{
	header("Location: signin.php");
	exit();	
}

?>