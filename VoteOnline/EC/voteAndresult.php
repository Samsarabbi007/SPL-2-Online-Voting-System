<?php require 'loginHeader.php'; ?>  

<?php 

$date = null;

if (isset($_POST['date'])) 
{
	$date = $_POST['date'];
	$time = $_POST['time'];

	$_SESSION['date'] = $date; 
	$_SESSION['time'] = $time; 
	$date = $_SESSION['date']." ".$_SESSION['time'];# code...

}
else 
	echo '<b>Time is required to submit..!</b>'; 

if (isset($_POST['publish'])) 
{
	$_SESSION['publish'] = $_POST['publish'];
	// echo 'submitted';
}

?>



 <?php
		
		require '../EC/dbh.inc.php';
	     $sql = "SELECT* FROM president";
	     $result = mysqli_query($connection, $sql);

	     $row_count  = mysqli_num_rows($result);
	     
	     $my_array = [];
	     while($row = mysqli_fetch_assoc($result))
	     {
	            $my_array[] = $row['username'];
	            $my_array[] = $row['count'];
	     }
     	$js_array = json_encode($my_array);
 ?>

 <script>

 </script>




<div class="container">

	<?php echo "<h2 align=center>Election will end at time: $date</h2><br>";  ?>

	<div class="row">
		<div class="col-sm-5">
			<h2>Enter election time from now....!!!</h2><br>
			<form action="voteAndresult.php" method="post">
				<div><h3>Date</h3><input type="date" name="date" value="2019-05-29" class="form-control" required></div>
				<div><h3>Time</h3><input type="time" name="time" value="12:00" class="form-control" required></div>	
				<div style="text-align: center;"><br><input type="submit" class="btn btn-primary form-control"></div>
			</form>		
		</div>

		<div class="col-sm-6" style="margin-left: auto;">
				
				<h2>Election Result...</h2><br>
						    
			    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!--Load the AJAX API-->

			    <script type="text/javascript">
			      google.charts.load('current', {'packages':['corechart']});// Load the Visualization API and the corechart package.     
			      google.charts.setOnLoadCallback(drawChart);  //Set a callback to run when the Google Visualization API is loaded.

				      function drawChart()
				      {
				        var data = new google.visualization.DataTable(); // Create the data table.
				        data.addColumn('string', 'Topping');
				        data.addColumn('number', 'Slices');

				        var result_array = <?php echo $js_array; ?>;
				        // var row_count  = "<?php echo $row_count; ?>";

				        // document.write(result_array);
				       	// var username = result_array[i];
			  		   // var count =(int)result_array[i+1];

			  		     	// var username ='Kabir';
			  		     	// var count   = 5;

					    //     data.addRows(['username', 5]);
					    //     i++;

				        var i = 0;
			  		    while (i<result_array.length) 
			  		    {
			  		    	var count = Number(result_array[i+1]);

			  		    	data.addRows([
				        	[result_array[i], count]
				        	]);

			  		    	 i++;
					    }


				        // data.addRows([
				        // 	['Pepperoni', 2]
				        // ]);	
   				     //data.addRows([
				        // 	['Kabir', 2]
				        // ]);	

				        var options = {'title':'Online Voting System Result', 'width':500, 'height':300, is3D: true}; // Set chart options

				        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
				        chart.draw(data, options);  // Instantiate and draw our chart, passing in some options.
				      }
   				 </script>

			    <!--Div that will hold the pie chart-->
    			<div id="chart_div" style="border: 1px red solid; width: 100%; margin: auto;"></div>
					
    			<form action="voteAndresult.php" method="post">
    				<br><input type="submit" name="publish" value="Publish" class="btn btn-primary form-control" onclick="return confirm('Are you sure to publish?')"> 
    			</form>

		</div>

	</div>
	
</div>


<!--  <?php
     $my_array = [];
     while($myvar=mysqli_fetch_array($sql_result)) {
         $my_array[] = $myvar;
     }
     $js_array = json_encode($my_array);
 ?>
 <script>
 var javascript_array = <?php echo $js_array; ?>;
 </script> -->
