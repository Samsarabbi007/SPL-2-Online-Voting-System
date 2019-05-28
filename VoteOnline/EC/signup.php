<?php 
  require 'ecHeader.php';
?>

<div class="container">
  
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-5" style="background-color: ; border-radius: 10px;">
          <h3>EC sign up page of online voting system</h3>
            <div id="demo" class="carousel slide" data-ride="carousel">
               <br><br><br>
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
        <div class="col-sm-6" style="background-color:skyblue; margin-left: auto; border-radius: 10px">
             <h3>If you want to arrange an election, please sign up as Election commissioner</h3>

             <table class="table">
                <form id="design" action="signup.inc.php" method="post">
                    <tr>
                        <th class="text-center">Name: </th>
                        <td><input type="text" name="uid" placeholder="Enter username" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="text-center">Email: </th>
                        <td><input type="email" name="email" placeholder="Enter email" class="form-control"></td>
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
                        <td><input type="text" name="address" value="Bangladesh" placeholder="Optional" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="text-center">Contact no: </th>
                        <td><input type="text" name="contact" placeholder="Optional" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" class="btn btn-info form-control" name="signup-submit">Submit</button></td>
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
                    elseif ($_GET['error'] == "emailExists")
                    {
                      echo '<p><b>This email is already exist</b></p>';
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
                  }
                  elseif (isset($_GET['signup']) == "success")
                  {
                    echo '<p><b>Signup successful</b></p>';
                  }
             ?>  
        </div>
    </div>
</div>


<?php
  require '../Home/footer.php';
?>

