<?php
session_start();
unset($_SESSION['vid']);
header("Location: ../Home/index.php");
?>