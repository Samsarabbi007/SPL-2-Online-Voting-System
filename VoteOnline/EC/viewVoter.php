<?php 
    session_start();

    $id =$_GET['id'];
    require '../EC/dbh.inc.php'; 
    $sql = "SELECT* FROM voter WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    $voter = mysqli_fetch_assoc($result); 
 ?>

<?php require 'loginHeader.php'; ?>  
 

<div class="container">
  <h3>Election commissioner's page of online voting system</h3>
    <p>This example shows how a candidate will perform his jobs.</p>
  <br>
</div>
<div class="container">
    <div class="row clearfix">
        <div class="col-sm-2">
            <a href="EC.php" class="btn btn-primary">Back</a>
        </div>
        <div class="col-sm-8">
             <br><h2 align="center">Voter Information</h2><br>
              <table class="table">
                  <tr>
                      <th class="text-center">ID num: </th>
                      <td><?php echo $voter['id']; ?></td>
                  </tr>
                  <tr>
                      <th class="text-center">Name: </th>
                      <td><?php echo $voter['username']; ?></td>
                  </tr>
                  <tr>
                      <th class="text-center">Email: </th>
                      <td><?php echo $voter['email']; ?></td>
                  </tr>
                  <tr>
                      <th class="text-center">Address: </th>
                      <td><?php echo $voter['address']; ?></td>
                  </tr>
                  <tr>
                      <th class="text-center">Contact no: </th>
                      <td><?php echo $voter['contact']; ?></td>
                  </tr>
              </table>
        </div>
    </div>
</div>


<?php 
    require 'ecFooter.php';
 ?>
