<?php require 'loginHeader.php'; ?> 

<?php 
    require '../EC/dbh.inc.php'; 
    $sql = "SELECT* FROM voter";
    $result = mysqli_query($connection, $sql); 
 ?>

<div class="container">
  <h3>Election commissioner's page of online voting system</h3>
    <p>This example shows how a candidate will perform his jobs.</p>
  <br>
</div>
<div class="container">
    <div class="row">
      <div class="col-sm-11" style="background: ; border-radius: 20px;  margin-left: 5%">
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
                         <a class="btn btn-primary btn-sm"  href="viewVoter.php?id=<?php echo $row['id'];?>">View</a>
                         <a class="btn btn-warning btn-sm"  href="approveVoter.php?id=<?php echo $row['id'];?>"><?php echo $row['status']?></a>
                         <a class="btn btn-danger btn-sm"   href="deleteVoter.php?id=<?php echo $row['id'];?>" 
                         onclick="return confirm('Are you sure to delete?')">Delete</a>             
                     </td>
                 </tr>                       
             <?php }  ?>
          </table>   
      </div>
  </div>
</div>

<?php 
    require 'ecFooter.php';
 ?>
