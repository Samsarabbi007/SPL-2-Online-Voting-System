<?php 
	session_start();
    $cid = $_SESSION['cid'];	

	require '../EC/dbh.inc.php';	

	require 'pole.php';

 ?>

 <?php 
  	  $voter_sql = "SELECT * FROM candidate WHERE id = $cid";
  	  $voter_result= mysqli_query($connection, $voter_sql);
  	  $voter_row = mysqli_fetch_assoc($voter_result);	

      if(isset($_POST['pname']))
      {
      	  if($voter_row['pcast']=="false")
      	  {
      	  		  $voter_sql2 = "UPDATE candidate SET pcast='true' WHERE id = $cid";
  	  			  $voter_result2= mysqli_query($connection, $voter_sql2);

      	  		  echo $_POST['pname'];	
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
				              echo "<h2 align='center'><a href='../Vote/result.php?results'>View Results</a></h2>";
				          }
		      	  	     
		      	  	}
		      	  }

      	  }
      	  else
      	  {
      	  	echo "<h2 align='center'>Don't try to duplicate vote!</h2>";
      	  	echo "<h2 align='center'>You have already casted your vote...!!!</h2>";
      	  	echo "<h2 align='center'><a href='../Vote/result.php?results'>View Results</a></h2>";
      	  }

      }
      if(isset($_POST['sname']))
      {
	      	if($voter_row['scast']=="false")
	      	{
	      		  $voter_sql2 = "UPDATE candidate SET scast='true' WHERE id = $cid";
  	  			  $voter_result2= mysqli_query($connection, $voter_sql2);

				  echo $_POST['sname'];	
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
					              echo "<h2 align='center'><a href='../Vote/result.php?results'>View Results</a></h2>";
					          }
			      	  	     
			      	  	}
		      	  }

	      	}
	        else
      	    {
      	  	   echo "<h2 align='center'>Don't try to duplicate vote!</h2>";
      	  	   echo "<h2 align='center'>You have already casted your vote...!!!</h2>";
      	  	   echo "<h2 align='center'><a href='../Vote/result.php?results'>View Results</a></h2>";
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

