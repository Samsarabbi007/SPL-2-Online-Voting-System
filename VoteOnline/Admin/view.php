<?php
    $id =$_GET['id'];
    require '../EC/dbh.inc.php'; 

    $sql = "SELECT* FROM ec WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    $ec = mysqli_fetch_assoc($result);
?>


<?php 
    require 'adminHeader.php';
 ?>

<body>

    <div class="wrapper">  

        <?php require 'sidebar.php'; ?>
        <!-- Page Content  -->
        <div id="content">

            <?php require 'navbar.php'; ?>

           <div class="container"> 
                <div class="row clearfix">
                    <div class="col-md-2">
                        <a href="Home.php" class="btn btn-primary">Back</a>
                    </div>
                    <div class="col-md-8">
                        <br><h2 align="center">EC Information</h2><br>
                        <table class="table">
                            <tr>
                                <th class="text-center">ID num: </th>
                                <td><?php echo $ec['id']; ?></td>
                            </tr>
                            <tr>
                                <th class="text-center">Name: </th>
                                <td><?php echo $ec['username']; ?></td>
                            </tr>
                            <tr>
                                <th class="text-center">Email: </th>
                                <td><?php echo $ec['email']; ?></td>
                            </tr>
                            <tr>
                                <th class="text-center">Address: </th>
                                <td><?php echo $ec['address']; ?></td>
                            </tr>
                            <tr>
                                <th class="text-center">Contact no: </th>
                                <td><?php echo $ec['contact']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div> 
            <div class="line"></div>
        </div>
    </div>

 <?php 
    require 'adminFooter.php';
  ?>

</body>

</html>
