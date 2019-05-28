<?php
    $id =$_GET['id'];
    require '../EC/dbh.inc.php'; 

    $sql = "UPDATE voter SET status='approved' WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    header('Location: EC.php');
?>