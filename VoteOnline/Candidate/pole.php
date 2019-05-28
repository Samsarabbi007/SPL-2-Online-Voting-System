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
   <link rel="stylesheet" href="../Vote/style.css">
</head>
<body>
 
 <div id="heading"><h2>Vote for your favourite president</h2></div>
 
  <div class="container" id="con_id">
  	<table class="table table-bordered">
    	<form action="candidateCast.php" method="post" align="center">

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
				        	<td>Votefor <input type="submit" name="pname" value="<?php echo $row['username'] ?>" onclick="return confirm('Are you sure to vote?')"></td>
			        	</tr>
					<?php
			        }
				}
			?>
    	</form>    
    </table>	         
  </div>


 <div id="heading"> <h2>Vote for your favourite secretary</h2></div>

<div class="container">
	<table class="table table-bordered">
		<form action="candidateCast.php" method="post" align="center">
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
				        	<td>Votefor<input type="submit" name="sname" value="<?php echo $row['username'] ?>" onclick="return confirm('Are you sure to vote?')"></td>
			        	</tr>
					<?php
			        }
				}
			?>
	    </form>    
    </table>	
</div>
