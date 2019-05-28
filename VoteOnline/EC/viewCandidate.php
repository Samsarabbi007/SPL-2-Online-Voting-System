<?php require 'loginHeader.php'; ?> 

<?php 
    $id =$_GET['id'];
    require '../EC/dbh.inc.php'; 
    $sql = "SELECT* FROM candidate WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    $candidate = mysqli_fetch_assoc($result); 
 ?> 

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
             <br><h2 align="center">Candidate Information</h2><br>
              <table class="table">
                  <tr>
                      <th class="text-center">ID num: </th>
                      <td><?php echo $candidate['id']; ?></td>
                  </tr>
                  <tr>
                      <th class="text-center">Name: </th>
                      <td><?php echo $candidate['username']; ?></td>
                  </tr>
                  <tr>
                      <th class="text-center">Post: </th>
                      <td><?php echo $candidate['post']; ?></td>
                  </tr>
                  <tr>
                      <th class="text-center">Email: </th>
                      <td><?php echo $candidate['email']; ?></td>
                  </tr>
                  <tr>
                      <th class="text-center">Address: </th>
                      <td><?php echo $candidate['address']; ?></td>
                  </tr>
                  <tr>
                      <th class="text-center">Contact no: </th>
                      <td><?php echo $candidate['contact']; ?></td>
                  </tr>
              </table>
        </div>
    </div>
</div>


<?php 
    require 'ecFooter.php';
 ?>
