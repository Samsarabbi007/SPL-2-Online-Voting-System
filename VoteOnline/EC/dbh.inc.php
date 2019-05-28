<?php
	$connection = mysqli_connect("localhost", "root", "", "election");

	if (!$connection) 
	{
		die("Connection failed".mysqli_connect_error());
	}
?>
