<?php require 'cHeader.php'; ?>

<?php
    //A session is already start in cHeader 
    $id =$_SESSION['cid'];
    require "../EC/dbh.inc.php";

    if (isset($_POST['upload']))
    {

          $file_name = $_FILES['image']['name'];
          $file_size = $_FILES['image']['size'];
          $file_tmp = $_FILES['image']['tmp_name'];
          $file_type = $_FILES['image']['type'];
          $text = $_POST['text'];

          $tmp = explode('.', $file_name);
          $file_ext=strtolower(end($tmp));
          
          $extensions= array("jpeg","jpg","png");
          $errors= array();
          if(in_array($file_ext,$extensions)=== false){
             $errors[]="Extension not allowed, please choose a JPEG or PNG file.";
          }
          
          if($file_size > 2097152) {
             $errors[]='File size must be excately 2 MB or lesser';
          }
          
          if(empty($errors)==true) 
          {
             move_uploaded_file($file_tmp,"CandidateImage/".$file_name);
             echo "Success";

             $sql = "SELECT * FROM candidate_image WHERE id = $id";
             $result = mysqli_query($connection, $sql);

             
             if (mysqli_num_rows($result)>0)
             {
                $sql = "UPDATE candidate_image SET image = '$file_name', text ='$text' WHERE id = $id"; 
                mysqli_query($connection, $sql);
             }
             else
             {
                $sql = "INSERT INTO candidate_image(id, image, text) VALUES ($id, '$file_name', '$text')"; 
                mysqli_query($connection, $sql);              
             }

          }else{
             print_r($errors);
          }
    }

//Update profile sql and run functions..!!!

    $sql = "SELECT* FROM candidate WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    $candidate = mysqli_fetch_assoc($result);
?>


<div class="container">
   <h3 style="text-align: center;">Update your profile</h3><br>
    <div class="row">
      <div class="col-sm-5" style="background-color: antiquewhite; border-radius: 10px; border: 1px solid #cbcbcb;">
          <h4 style="text-align: center;">Update your profile picture</h4>

          <?php 
              $sql = "SELECT * FROM candidate_image WHERE id = $id";
              $result = mysqli_query($connection, $sql);
              $row = mysqli_fetch_array($result);

              if($row != null){
                echo '<div style="width: 80%; padding: 5px; margin: 20px auto; border: 1px solid #cbcbcb;">';
                echo "<img src='CandidateImage/".$row['image']."' hight = 150px; width = 150>";
                echo "<p>".$row['text']."</p>"; 
                echo "</div>";
              }
           ?> 

          <form action="cupdate.php" method="post" enctype="multipart/form-data" style="width:80%; margin: 20px auto; border: 1px solid #cbcbcb;">
              <input type="hidden" name="size" value="1000000">
              <div>
                <input type="file" name="image">
              </div>
              <div>
                <textarea name="text" cols="30" rows="3" placeholder="Say something about this image..!"></textarea>
              </div>
              <div>
                <input type="submit" name="upload" value="Upload">
              </div>

              <?php if (isset($_FILES['image']['name'])) 
              {?>
                  <ul>
                    <br><br><br>
                    <h4>Uploaded file details!</h4><br>
                    <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
                    <li>File size: <?php echo $_FILES['image']['size'];  ?>
                    <li>File type: <?php echo $_FILES['image']['type']; ?>
                 </ul>
                      
              <?php } ?>
          </form> 
      </div>



<!--   We don't let candidate to update post. It's handled by EC when candidate sign up first..!!! -->


      <div class="col-sm-6" style="background-color: antiquewhite; margin-left: auto; border-radius: 10px; border: 1px solid #cbcbcb;">

             <table class="table">
                <form id="design" action="cupdate.inc.php" method="post">
                    <tr>
                        <th class="text-center">Name: </th>
                        <td><input type="text" name="uid" value="<?php echo $candidate['username']; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="text-center">Email: </th>
                        <td><input type="email" name="email" value="<?php echo $candidate['email']; ?>" class="form-control"></td>
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
                        <td><input type="text" name="address" value="<?php echo $candidate['address'];?>" placeholder="Optional" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="text-center">Contact no: </th>
                        <td><input type="text" name="contact" placeholder="Optional" value="<?php echo $candidate['contact'];?>" class="form-control"></td>
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
                      echo '<p><b>Email duplication..! You cannot use the email of another voter..!</b></p>';
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


<?php require 'cFooter.php'; ?>
