<?php
    $id =$_GET['id'];
    require '../EC/dbh.inc.php'; 

    $sql = "DELETE FROM voter WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    header('Location: EC.php');
?>