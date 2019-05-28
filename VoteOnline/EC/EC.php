<?php require 'loginHeader.php'; ?>  

<?php 
    require '../EC/dbh.inc.php'; 
    $sql = "SELECT* FROM voter";
    $result = mysqli_query($connection, $sql); 

    $sql2 = "SELECT* FROM candidate";
    $result2 = mysqli_query($connection, $sql2); 
 ?>
 

<div class="container">
  <?php 
    echo $_SESSION['ec'];
    if (isset($_SESSION['ec'])) 
    {
      echo "<p><b>You are logged in!</b></p>";
    }
  ?> 
  <h3>Election commissioner's page of online voting system</h3>
    <p>This example shows how a candidate will perform his jobs.</p>
  <br>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6 request">
            <?php 
                  $newsql = "SELECT* FROM voter WHERE status = 'pending'";
                  $newResult = mysqli_query($connection, $newsql); 
                  $row = mysqli_num_rows($newResult);
                  if($row > 0){ ?>
                      <h2 align="center">Voter Requests</h2>
                      <table class="table">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Operation</th>
                             </tr>
                         </thead>
                <?php } 
                 else{
                      echo '<h1 style="margin: auto;">Online Voting System</h1><br><br><br>';
                      echo '<br><h2 style="margin-left: auto; margin-right: auto;">Online Voting System is a website that helps us held a smart election</h2><br>';
                      echo '<h2 style="margin-left: auto; margin-right: auto;">It also helps us held a authentic election</h2><br>';
                 } 
            ?>
            <?php
                        while($row = mysqli_fetch_assoc($result)){ 
                            if($row['status'] == 'pending')
                            {?>
                                 <tr>
                                   <td><?php echo $row['id']; ?></td>
                                   <td><?php echo $row['username']; ?></td>
                                   <td><?php echo $row['email']; ?></td>
                                   <td>
                                       <a class="btn btn-primary btn-sm"  href="viewVoter.php?id=<?php echo $row['id'];?>">View</a>
                                       <a class="btn btn-warning btn-sm"  href="approveVoter.php?id=<?php echo $row['id'];?>">Approve</a> 
                                       <a class="btn btn-danger btn-sm"  href="deleteVoter.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete?')">Delete</a>          
                                   </td>
                                </tr>
                            <?php }  
                            ?>
                       <?php }  ?>
              </table>  
        </div>


        <div class="col-sm-6 updates">
              <?php 
                  $newsql = "SELECT* FROM candidate WHERE status = 'pending'";
                  $newResult = mysqli_query($connection, $newsql); 
                  $row = mysqli_num_rows($newResult);
                  if($row > 0){ ?>
                      <h2 align="center">Candidate Requests</h2>
                      <table class="table">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Operation</th>
                             </tr>
                         </thead>
                <?php } 
                 else{
                      echo '<h1 style="margin: auto;">Online Voting System</h1><br><br><br>';
                      echo '<br><h2 style="margin-left: auto; margin-right: auto;">Online Voting System is a website that helps us held a smart election</h2><br>';
                      echo '<h2 style="margin-left: auto; margin-right: auto;">It also helps us held a authentic election</h2><br>';
                 } 
            ?>
            <?php
                        while($row = mysqli_fetch_assoc($result2)){ 
                            if($row['status'] == 'pending')
                            {?>
                                 <tr>
                                   <td><?php echo $row['id']; ?></td>
                                   <td><?php echo $row['username']; ?></td>
                                   <td><?php echo $row['email']; ?></td>
                                   <td>
                                       <a class="btn btn-primary btn-sm"  href="viewCandidate.php?id=<?php echo $row['id'];?>">View</a>
                                       <a class="btn btn-warning btn-sm"  href="approveCandidate.php?id=<?php echo $row['id'];?>">Approve</a> 
                                       <a class="btn btn-danger btn-sm"  href="deleteCandidate.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete?')">Delete</a>          
                                   </td>
                                </tr>
                            <?php }  
                            ?>
                       <?php }  ?>
              </table>
        </div>
    </div>
</div>


<?php 
    require 'ecFooter.php';
 ?>
