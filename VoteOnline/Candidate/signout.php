<?php
session_start();
unset($_SESSION['cid']);
header("Location: ../Home/index.php");
?>