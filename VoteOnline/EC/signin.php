<?php 
  require 'ecHeader.php';
?>

<div class="container">
  <h3>EC sign in page of online voting system</h3><br><br> 
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-5" style="background-color: #B54B49FF; border-radius: 5px;">
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
        <div class="col-sm-6" style="background-color: #B54B49FF; margin-left: auto; border-radius: 10px">
             <table class="table">
                 <h3 align="center">Sign in</h3>
                  <form id="design" action="signin.inc.php" method="post">
                      <div><input type="text" name="uid" placeholder="Enter Username" class="form-control"></div>
                      <div><br><input type="password" name="pwd" placeholder="Enter Password" class="form-control"></div>
                      <div><br><button type="submit" class="btn btn-info form-control" name="signin-submit">Submit</button></div><br>                  
                </form>
            </table>
            <?php
                  if (isset($_GET['error']))
                  {
                    if ($_GET['error'] == "emptyfields")
                    {
                      echo '<p><b>Fill up all the input fields</b></p>';
                    }
                    elseif ($_GET['error'] == "noUser")
                    {
                      echo '<p><b>There are no user by this name</b></p>';
                    }
                    elseif ($_GET['error'] == "WrongPassword")
                    {
                      echo '<p><b>Invalid username or password</b></p>';
                    }  
                    elseif ($_GET['error'] == "notApproved")
                    {
                      echo '<p><b>Your request is in processing</b></p>';
                    }  
                          
                  }
                  // elseif (isset($_GET['signin']) == "success")
                  // {
                  //   echo '<p><b>Signin successful</b></p>';
                  // }
             ?>  
        </div>
    </div>
</div>


<?php
  echo '<br><br>';
  require '../Home/footer.php';
?>

