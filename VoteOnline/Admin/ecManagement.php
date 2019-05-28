<?php 
    require 'adminHeader.php';
    require '../EC/dbh.inc.php'; 
    $sql = "SELECT* FROM ec";
    $result = mysqli_query($connection, $sql); 
 ?>

<body>
    <div class="wrapper">  
        <?php 
            require 'sidebar.php';
         ?>
        <!-- Page Content  -->
        <div id="content">
            <?php 
                require 'navbar.php';
            ?>
            <div class="row">
                <div class="col-sm-11" style="background: skyblue; border-radius: 20px;  margin-left: 5%">
                    <br><h2 align="center">Eelection Commissioners</h2>
                    <table class="table">
                       <thead>
                           <tr>
                               <th>ID</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Operation</th>
                           </tr>
                       </thead>
                       <?php
                        while($row = mysqli_fetch_assoc($result)){ ?>
                           <tr>
                               <td><?php echo $row['id']; ?></td>
                               <td><?php echo $row['username']; ?></td>
                               <td><?php echo $row['email']; ?></td>
                               <td>
                                   <a class="btn btn-primary btn-sm"  href="view.php?id=<?php echo $row['id'];?>">View</a>
                                   <a class="btn btn-warning btn-sm"  href="approve.php?id=<?php echo $row['id'];?>"><?php echo $row['status']?></a>
                                   <a class="btn btn-danger btn-sm"   href="deleteEC.php?id=<?php echo $row['id'];?>" 
                                   onclick="return confirm('Are you sure to delete?')">Delete</a>             
                               </td>
                           </tr>                       
                       <?php }  ?>
                    </table>   
                </div>
            </div>
        </div>
    </div>

 <?php 
    require 'adminFooter.php';
  ?>

</body>

</html>