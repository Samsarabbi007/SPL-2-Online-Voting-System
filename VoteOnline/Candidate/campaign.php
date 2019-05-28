<?php
require 'cHeader.php'; 
?>

<div class="container">
  <h3>Welcome Mr. <?php echo $candidate; ?></h3>
  <p>This example shows how a candidate can send email</p>
</div>

<div class="container">
    <div class="row">
      <div class="col-sm-5" style="width: 100%; background-color: ; margin: 20px auto; border: 1px solid #cbcbcb; border-radius: 10px">
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




      <div class="col-sm-6" style="width: 100%; background-color: antiquewhite; margin: 20px auto; border: 5px solid #cbcbcb; border-radius: 10px">
           <h3>Election Campaign with voters</h3>
           <p>Upload poster and send to the voters</p>
          <table class="table table-bordered">
             <form method="post" action="campaign.php" enctype="multipart/form-data">
<!--                <tr>
                  <th>To Email</th>
                 <td><input type="email" name="email" class="form-control"></td> 
               </tr> -->
               <tr>
                  <th>Subject</th>
                 <td><input type="text" name="subject" class="form-control" placeholder="Subject may enhance readability"></td> 
               </tr>
               <tr>
                  <th>File</th>
                 <td><input type="file" name="image[]" multiple="multiple"></td> 
               </tr>
               <tr>
                  <th>Messege</th>
                 <td><textarea name="msg" class="form-control" placeholder="Write someting about the poster, though it's optional"></textarea></td> 
               </tr>
               <tr>
                 <td colspan="2"><button type="submit" name="send_email" class="btn btn-info form-control">Send</button></td> 
               </tr>
            </form>
          </table>


          <?php 
          if (isset($_POST['send_email'])) 
          {
                  require 'PHPMailerAutoload.php';
                  require 'credential.php';
                  $mail = new PHPMailer(true);

                  try {
                      $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                      $mail->isSMTP();                                            // Set mailer to use SMTP
                      $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                      $mail->Username   = EMAIL;                     // SMTP username
                      $mail->Password   = PASS;                               // SMTP password
                      $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                      $mail->Port       = 587;                                    // TCP port to connect to

                      $mail->SMTPOptions = array(
                          'ssl' => array(
                              'verify_peer' => false,
                              'verify_peer_name' => false,
                              'allow_self_signed' => true
                          )
                      );
                      //Recipients
                      $mail->setFrom(EMAIL, 'Vote Online');    
                       // Add a recipient   // Name is optional
                      $mail->addReplyTo(EMAIL, 'Online Voting System');
                      // $mail->addCC('cc@example.com');
                      // $mail->addBCC('bcc@example.com');
                      // print_r($_FILES['image']);
                      for ($i=0; $i <count($_FILES['image']['tmp_name']) ; $i++) 
                      { 
                        $mail->addAttachment($_FILES['image']['tmp_name'][$i], $_FILES['image']['name'][$i]);
                      }
          
                      $mail->isHTML(true);                                  // Set email format to HTML
                      $mail->Subject = $_POST['subject'];
                      // style="border: 2px solid red;"
                      $mail->Body    = '<div   ><b>Cast your vote to</b>  </div>'.'<b>'.$_SESSION["candidate"].'</b><br>'.'He says..<br>'.$_POST['msg'];

                      $mail->AltBody = $_POST['msg'];

//------------------------------------ Campaign to Voters--------------------------------------------//

                    require "../EC/dbh.inc.php";
                    $sql = "SELECT * FROM voter WHERE status='approved'";
                    $result= mysqli_query($connection, $sql);

                    while ($row=mysqli_fetch_assoc($result)) {
                      $mail->addAddress($row['email']);
                    }         


                    if ($mail->send()) {
                      echo 'Message has been sent';
                    }
                    else
                    {
                      echo 'Mail not sent';
                      echo 'Mailer Error: '.$mail->ErrorInfo;
                    }
                  }catch (Exception $e) 
                  {
                      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                  }
          }
          ?>
      </div>
    </div>
</div>

<?php require 'cFooter.php'; ?>

<!--        $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $msg = $_POST['msg'];
            // Content-Type helps email client to parse file as HTML 
            // therefore retaining styles
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $message = "<html>
            <head>
              <title>New message from website contact form</title>
            </head>
            <body>
              <h1>" . $subject . "</h1>
              <p>".$msg."</p>
            </body>
            </html>";
            if (mail($email, $subject, $message, $headers)) {
             echo "Email sent";
            }else{
             echo "Failed to send email. Please try again later";
            }
 -->