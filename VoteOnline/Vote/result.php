<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Election Result</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><!--Load the AJAX API-->
</head>
<body>

<?php
    if(isset($_SESSION['publish'])) 
    {
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

    }
?>


               


<div id="heading"> <h2>President result of Online Election</h2></div>

 <!--Div that will hold the pie chart-->
<div id="president_div" style="border: 1px red; width: 50%; margin: 10px auto; text-align: center;"></div>   

     
 <div>  
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});// Load the Visualization API and the corechart package.     
        google.charts.setOnLoadCallback(drawChart);  //Set a callback to run when the Google Visualization API is loaded.

          function drawChart()
          {
            var data = new google.visualization.DataTable(); // Create the data table.
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');

            var result_array = <?php echo $js_array; ?>;

            var i = 0;
            while (i<result_array.length) 
            {
                var count = Number(result_array[i+1]);

                data.addRows([
                [result_array[i], count]
                ]);

                 i++;
            }
            var options = {'title':'The result of online voting system given below', 'width':600, 'height':400, is3D: true}; // Set chart options

            var chart = new google.visualization.PieChart(document.getElementById('president_div'));
            chart.draw(data, options);  // Instantiate and draw our chart, passing in some options.
          }
    </script>
 </div>    


 <?php
    if(isset($_SESSION['publish'])) 
    {
         require '../EC/dbh.inc.php';
         $sql = "SELECT* FROM secretary";
         $result = mysqli_query($connection, $sql);

         $row_count  = mysqli_num_rows($result);
         
         $my_array = [];
         while($row = mysqli_fetch_assoc($result))
         {
                $my_array[] = $row['username'];
                $my_array[] = $row['count'];
         }
        $js_array = json_encode($my_array);

    }
?>


<div id="heading"> <h2>General Secretary result of Online Election</h2></div>
<div id="secretary_div" style="border: 1px red; width: 50%; margin: 10px auto; text-align: center;"></div>

 <div style="padding: 20px;">  
     <!--Load the AJAX API-->
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});// Load the Visualization API and the corechart package.     
        google.charts.setOnLoadCallback(drawChart);  //Set a callback to run when the Google Visualization API is loaded.

          function drawChart()
          {
            var data = new google.visualization.DataTable(); // Create the data table.
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');

            var result_array = <?php echo $js_array; ?>;

            var i = 0;
            while (i<result_array.length) 
            {
                var count = Number(result_array[i+1]);

                data.addRows([
                [result_array[i], count]
                ]);

                 i++;
            }
            var options = {'title':'The result of online voting system given below', 'width': 600, 'height':400, is3D: true}; // Set chart options

            var chart = new google.visualization.PieChart(document.getElementById('secretary_div'));
            chart.draw(data, options);  // Instantiate and draw our chart, passing in some options.
          }
    </script>

 </div>  
    

</body>
</html>




             <!-- //echo "&nbsp;&nbsp;&nbsp;&nbsp;Ramesh is learning PHP"."<br/>";
             // echo "
             //    <div style='background:orange; text-align:center; padding: 10px;'>
             //        <center>
             //            <h2>Updated result</h2>   
             //            <p style='background: black; color:white; padding: 10px; width:50%;'>
             //                <b>Lionel Messi: </b>$messi($per_messi)
             //            </p>
             //            <p style='background: black; color:white; padding: 10px; width:50%;'>
             //                <b>Cristiano Ronaldo: </b>$ronaldo($per_ronaldo)
             //            </p>
             //            <p style='background: black; color:white; padding: 10px; width:50%;'>
             //                <b>Neymar: </b>$neymar($per_neymar)
             //            </p>
             //        </center>
             //    </div>
             // ";   -->

<!--              <?php 


                    // require '../EC/dbh.inc.php';

                    //  $sql = "SELECT* FROM president";
                    //  $result = mysqli_query($connection, $sql);

                    //  $totalCount = 0;
                    //  while($row = mysqli_fetch_assoc($result))
                    //  {
                    //         $totalCount += $row['count'];
                    //  }

                    //  $sql = "SELECT* FROM president";
                    //  $result = mysqli_query($connection, $sql);

                    //  while($row = mysqli_fetch_assoc($result))
                    //  {?>
                    //     <div style='background: white; width: 30%; margin: auto; color: chocolate; padding: 10px;'>
                    //         <table class="table">
                    //             <tr>
                    //                 <th><h2><?php echo $row['id'].".&nbsp;&nbsp;&nbsp;&nbsp;"; ?></h2></th>
                    //                 <th><h2><?php echo $row['username']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></h2></th>
                    //                 <td><h2><?php echo $row['count']."(".round($row['count']*100/$totalCount)."%)"; ?></h2></td>
                    //             </tr>
                    //         </table>
                    //     </div>  
                    // <?php     
                    //  }

              ?> -->


<!-- <?php
    //Operation for "View results..!"    
     // if(isset($_SESSION['publish']))  
     // {
     //    //  require '../EC/dbh.inc.php';

        //  $sql = "SELECT* FROM secretary";
        //  $result = mysqli_query($connection, $sql);

        //  $totalCount = 0;
        //  while($row = mysqli_fetch_assoc($result))
        //  {
        //         $totalCount += $row['count'];
        //  }

        //  $sql = "SELECT* FROM secretary";
        //  $result = mysqli_query($connection, $sql);

        //  while($row = mysqli_fetch_assoc($result))
        //  {?>
        //     <div style='background: white; width: 30%; margin: auto; color: chocolate; padding: 10px;'>
        //         <table class="table">
        //             <tr>
        //                 <th><h2><?php echo $row['id'].".&nbsp;&nbsp;&nbsp;&nbsp;"; ?></h2></th>
        //                 <th><h2><?php echo $row['username']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></h2></th>
        //                 <td><h2><?php echo $row['count']."(".round($row['count']*100/$totalCount)."%)"; ?></h2></td>
        //             </tr>
        //         </table>
        //     </div>  
        // <?php     
        //  }

     
?> 
 -->
     