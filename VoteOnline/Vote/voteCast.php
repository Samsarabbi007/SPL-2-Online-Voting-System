<?php 
	session_start();
    $voterid = $_SESSION['vid'];	

	require '../EC/dbh.inc.php';	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Election Pole</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>

<h2 align="center">Election Ending Time</h2>
<h2 align="center"><?php echo 'Date: '.$_SESSION['date']." Time: ".$_SESSION['time']; ?></h2>

<script>

var date = "<?php echo $_SESSION['date']." ".$_SESSION['time']; ?>";   
var countDownDate = new Date(date).getTime();

// var countDownDate = new Date("27-May-2019 9:40 PM").getTime(); 

var x = setInterval(function() 
{   

  var now = new Date().getTime(); 
    
  var distance = countDownDate - now; 
    
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="clock"
  document.getElementById("clock").innerHTML ="Cast vote before the time is over..!"+"<br>"+days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  if (distance < 0)
  {
    clearInterval(x);
    document.getElementById("clock").innerHTML = "ELECTION IS OVER";
  }
}, 1000);
</script>



<div class="container" id="clock" style="width:50%; color: yellow; margin:auto; text-align: center; font-size: 60px; margin-top: 0px; font-family: comic sans ms; background-color: black">
	
	


</div>





<br>
 
 <div style="background: black; color: yellow;width: 100%; padding: 5px; font-family: comic sans ms;"><h2>Vote for your favourite president</h2></div>
 
  <div class="container">
  	<table class="table table-bordered">
    	<form action="voteCast.php" method="post" align="center">

    		<?php
    			$sql = "SELECT * FROM candidate";
				$result= mysqli_query($connection, $sql);

			    while($row = mysqli_fetch_assoc($result))
			    { 
			        if($row['status']=='approved' && $row['post']=='president')
			        {
			        	$id = $row['id'];
			        	$username= $row['username'];

			        	$sql2 = "INSERT INTO president (id, username) VALUES('$id', '$username')";	
			        	mysqli_query($connection, $sql2);
			        	?>

			        	<tr>
				        	<th class="text-center"><h2><?php echo $row['username'] ?></h2></th>
				        	<td>..........</td>
				        	<td>Votefor<input type="submit" name="pname" value="<?php echo $row['username']; ?>" onclick="return confirm('Are you sure to vote?')"></td>
			        	</tr>
					<?php
			        }
				}
			?>
    	</form>    
    </table>	         
  </div>


 <div style="background: black; color: yellow;width: 100%; padding: 5px; font-family: comic sans ms;"> <h2>Vote for your favourite secretary</h2></div>

<div class="container">
	<table class="table table-bordered">
		<form action="voteCast.php" method="post" align="center">
    		<?php
    			$sql = "SELECT * FROM candidate";
				$result= mysqli_query($connection, $sql);

			    while($row = mysqli_fetch_assoc($result))
			    { 
			        if($row['status']=='approved' && $row['post']=='secretary')
			        {
			        	$id = $row['id'];
			        	$username= $row['username'];

			        	$sql2 = "INSERT INTO secretary (id, username) VALUES('$id', '$username')";	
			        	mysqli_query($connection, $sql2);

			        	?>
			        	<tr>
				        	<th class="text-center"><h2><?php echo $row['username'] ?></h2>  </th>
				        	<td>..........</td>
				        	<td>Votefor<input type="submit" name="sname" value="<?php echo $row['username']; ?>" onclick="return confirm('Are you sure to vote?')"></td>
			        	</tr>
					<?php
			        }
				}
			?>
	    </form>    
    </table>	
</div>

 <?php 

  	  $voter_sql = "SELECT * FROM voter WHERE id = $voterid";
  	  $voter_result= mysqli_query($connection, $voter_sql);
  	  $voter_row = mysqli_fetch_assoc($voter_result);	

      if(isset($_POST['pname']))
      {
      	  if($voter_row['pcast']=="false")
      	  {
      	  		  $voter_sql2 = "UPDATE voter SET pcast='true' WHERE id = $voterid";
  	  			  $voter_result2= mysqli_query($connection, $voter_sql2);

      	  		  //echo $_POST['pname'];	
		      	  $name = $_POST['pname'];


		      	  $sql = "SELECT * FROM president";
		      	  $result= mysqli_query($connection, $sql);

		      	  while ($row = mysqli_fetch_assoc($result)) 
		      	  {
		      	  	if ($name == $row['username']) 
		      	  	{
		      	  		  $vote = "UPDATE president SET count=count+1 WHERE username = '$name' ";
				          $run = mysqli_query($connection, $vote);
				          
				          if($run)
				          {
				              echo "<h2 align='center'>Your vote has been casted for $name</h2>";
				              echo "<h2 align='center'><a href='result.php?results'>View Results</a></h2>";
				          }
		      	  	     
		      	  	}
		      	  }

      	  }
      	  else
      	  {
      	  	echo "<h2 align='center'>Don't try to duplicate vote!</h2>";
      	  	echo "<h2 align='center'>You have already casted your vote...!!!</h2>";
      	  	echo "<h2 align='center'><a href='result.php?results'>View Results</a></h2>";
      	  }



      }
      if(isset($_POST['sname']))
      {
	      	if($voter_row['scast']=="false")
	      	{
	      		  $voter_sql2 = "UPDATE voter SET scast='true' WHERE id = $voterid";
  	  			  $voter_result2= mysqli_query($connection, $voter_sql2);

				  //echo $_POST['sname'];	
		      	  $name = $_POST['sname'];

		      	  $sql = "SELECT * FROM secretary";
		      	  $result= mysqli_query($connection, $sql);

		      	  while ($row = mysqli_fetch_assoc($result)) 
		      	  {
			      	  	if ($name == $row['username']) 
			      	  	{
			      	  		  $vote = "UPDATE secretary SET count=count+1 WHERE username = '$name' ";
					          $run = mysqli_query($connection, $vote);
					          
					          if($run)
					          {
					              echo "<h2 align='center'>Your vote has been casted for $name</h2>";
					              echo "<h2 align='center'><a href='result.php?results'>View Results</a></h2>";
					          }
			      	  	     
			      	  	}
		      	  }

	      	}
	        else
      	    {
      	  	   echo "<h2 align='center'>Don't try to duplicate vote!</h2>";
      	  	   echo "<h2 align='center'>You have already casted your vote...!!!</h2>";
      	  	   echo "<h2 align='center'><a href='result.php?results'>View Results</a></h2>";
      	    }
       }
   ?>

</body>
</html>



<!-- <div>
   <img src="../images/messi.jpg" width="280" height="250" alt="Messi"><br>
   <input type="submit" name="messi" value="Vote for Messi">
</div>

<div>
   <img src="../images/Cristiano-Ronaldo.jpg" width="280" height="250" alt="Ronaldo"><br>
   <input type="submit" name="ronaldo" value="Vote for Ronaldo">   
</div>

<div>
   <img src="../images/Neymar_Junior_the_Future_of_Brazil.jpg" width="280" height="250" alt="Neymar"><br>    
   <input type="submit" name="neymar" value="Vote for Neymar">
</div>   -->  

