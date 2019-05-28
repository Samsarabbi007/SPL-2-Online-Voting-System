<?php require 'loginHeader.php'; ?>

<div class="container">
  <h3>Welcome to send notification</h3>
  <p>This example shows how an election commissioner can send email to voters and candidates</p>
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
           <h3>Notification to voters and candidates</h3>
           <p>Ec will send the rules and regulations of an election</p>
          <table class="table table-bordered">
             <form method="post" action="notification.php">
               <tr>
                  <th>Subject</th>
                 <td><input type="text" name="subject" class="form-control" placeholder="Subject may enhance readability"></td> 
               </tr>
               <tr>
                  <th>Messege</th>
                 <td><textarea name="msg" class="form-control" placeholder="Hello, dear voters. Welcome to you all from Online Voting System..! "></textarea></td> 
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
                  require '../Candidate/credential.php';
                  $mail = new PHPMailer(true);

                  try 
                  {
                      $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                      $mail->isSMTP();                                            // Set mailer to use SMTP
                      $mail->Host       = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
                      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                      $mail->Username   = EMAIL;                     			  // SMTP username
                      $mail->Password   = PASS;  
                      $mail->SMTPKeepAlive = true;                                  // SMTP password
                      $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                      $mail->Port       = 587;                                    // TCP port to connect to

                      $mail->SMTPOptions = array(
						    'ssl' => array(
						        'verify_peer' => false,
						        'verify_peer_name' => false,
						        'allow_self_signed' => true
						    )
						);

                      $mail->setFrom(EMAIL, 'Vote Online');    
                      $mail->addReplyTo(EMAIL, 'Online Voting System');

                      $mail->isHTML(true);                                  	  // Set email format to HTML
                      $mail->Subject = $_POST['subject'];
                     
                      $mail->Body    = "<b>"."Notification from ec panel, They have told that ".$_POST['msg']."</b>";

                      $mail->AltBody = $_POST['msg'];

//------------------------------------ Notification to Voters--------------------------------------------//

                    require "../EC/dbh.inc.php";
                    $sql = "SELECT * FROM voter WHERE status='approved'";
                    $result= mysqli_query($connection, $sql);

                    while ($row=mysqli_fetch_assoc($result)) {
                      $mail->addAddress($row['email']);
                    }  

                    $sql = "SELECT * FROM candidate WHERE status='approved'";
                    $result= mysqli_query($connection, $sql);

                    while ($row=mysqli_fetch_assoc($result)) {
                      $mail->addAddress($row['email']);
                    }         


                    if ($mail->send()) {
                      echo 'Yes, notification has been sent..!';
                    }
                    else
                    {
                      echo 'Mail not sent';
                      echo 'Mailer Error: '.$mail->ErrorInfo;
                    }
                  }
                  catch (Exception $e) 
                  {
                      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                  }
          }
          ?>
      </div>
    </div>
</div>

<?php require '../Candidate/cFooter.php'; ?>
