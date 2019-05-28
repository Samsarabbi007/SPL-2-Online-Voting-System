<?php require 'loginHeader.php'; ?>

<?php
    $id =$_SESSION['eid'];
    require "dbh.inc.php";

    $sql = "SELECT* FROM ec WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    $ec = mysqli_fetch_assoc($result);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-5" style="background-color: skyblue; border-radius: 15px">
            <div id="demo" class="carousel slide" data-ride="carousel">
              <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ul>

              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="votingVoting11.jpg" >
                </div>
                <div class="carousel-item">
                  <img src="voting22.jpg" >
                </div>
                <div class="carousel-item">
                  <img src="voting.jpg" >
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>             
        </div>
        <div class="col-sm-6" style="background-color: darkgrey; margin-left: auto; border-radius: 10px;">
             <h3>Update your profile</h3><br>
             <table class="table">
                <form id="design" action="update.inc.php" method="post">
                    <tr>
                        <th class="text-center">Name: </th>
                        <td><input type="text" name="uid" value="<?php echo $ec['username']; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="text-center">Email: </th>
                        <td><input type="email" name="email" value="<?php echo $ec['email']; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="text-center">Password: </th>
                        <td><input type="password" name="pwd" placeholder="Enter Password" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="text-center">Confirm: </th>
                        <td><input type="password" name="repeat-pwd" placeholder="Repeat Password" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="text-center">Address: </th>
                        <td><input type="text" name="address" value="<?php echo $ec['address'];?>" placeholder="Optional" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="text-center">Contact no: </th>
                        <td><input type="text" name="contact" placeholder="Optional" value="<?php echo $ec['contact'];?>" class="form-control"></td>
                    </tr> 
                    <tr>
                        <th></th>
                        <td class="text-right"><button type="submit" class="btn btn-primary" name="update-submit">Update</button></td>
                    </tr>              
                </form>
            </table>

            <?php
                  if (isset($_GET['error']))
                  {
                    if ($_GET['error'] == "emptyfield")
                    {
                      echo '<p><b>Fill up all the input fields</b></p>';
                    }
                    elseif ($_GET['error'] == "UserAlreadyExists")
                    {
                      echo '<p><b>This id is already exists</b></p>';
                    }
                    elseif ($_GET['error'] == "InvalidEmail&Username")
                    {
                      echo '<p><b>Invalid email and username</b></p>';
                    }     
                    elseif ($_GET['error'] == "InvalidEmail")
                    {
                      echo '<p><b>Email is invalid</b></p>';
                    }
                    elseif ($_GET['error'] == "InvalidUsername")
                    {
                      echo '<p><b>Username is invalid</b></p>';
                    }
                    elseif ($_GET['error'] == "passwordNotMatch")
                    {
                      echo '<p><b>Password not matched to the previous one</b></p>';
                    }    
                    elseif ($_GET['error'] == "emailDuplicate")
                    {
                      echo '<p><b>Email duplication..! You cannot use the email of another ec..!</b></p>';
                    }
                  }
                  elseif (isset($_GET['update']) == "success")
                  {
                    echo '<p><b>Your profile is updated now..!!!</b></p>';
                  }
             ?>  
        </div>
    </div>
</div>



<div style="text-align:; padding: 20px; background: ;">
<?php 
    require 'ecFooter.php';
 ?>   
</div>
