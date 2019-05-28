<?php
session_start();
if (isset($_POST['signin-submit'])) 
{
	require "../EC/dbh.inc.php";
	$username = $_POST['uid'];
	$password = $_POST['pwd'];

	if (empty($username)||empty($password)){
		header("Location: vsignin.php?error=emptyfields");
		exit();			# code...
	}

	else{
		$sql = "SELECT* FROM voter WHERE username = ?";
		$stmt= mysqli_stmt_init($connection);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: vsignin.php?error=sqlError");
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
					header("Location: vsignin.php?error=WrongPassword");
					exit();	
				}
				elseif ($row['status'] != 'approved') {
					header("Location: vsignin.php?error=notApproved");
					exit();	
				}	
				elseif ($pwdCheck==true) 
				{	
					$_SESSION['vid'] = $row['id'];
					$_SESSION['voter'] = $row['username'];
					$_SESSION['email'] = $row['email'];

					header("Location: Voter.php?signin=success");
					exit();	
				}
				else
				{
					header("Location: vsignin.php?error=WrongPassword");
					exit();					
				}
			}
			else
			{
				header("Location: vsignin.php?error=noUser");
				exit();	
			}
		}

	}
}
else
{
	header("Location: vsignin.php");
	exit();	
}

?>