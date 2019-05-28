<?php 
    require 'adminHeader.php';
    require '../EC/dbh.inc.php'; 
    $sql = "SELECT* FROM ec";
    $result = mysqli_query($connection, $sql); 
 ?>

<body>
    <div class="wrapper">  
      
        <?php require 'sidebar.php'; ?>
        <!-- Page Content  -->
        <div id="content">

            <?php  require 'navbar.php'; ?>

            <div class="row">
                    <?php 
                        $newsql = "SELECT* FROM ec WHERE status = 'pending'";
                        $newResult = mysqli_query($connection, $newsql); 
                        $row = mysqli_num_rows($newResult);
                        if($row > 0){ ?>
                            <div class="col-sm-11" style="background: ; border-radius: 10px;  margin-left: 5%">
                            <br><h2 align="center">EC Requests</h2>
                            <table class="table">
                               <thead>
                                   <tr>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Operation</th>
                                   </tr>
                               </thead>
                      <?php } 
                       else{
                            echo '<h1 style="margin: auto;">Online Voting System</h1><br><br><br>';
                            echo '<br><h2 style="margin-left: auto; margin-right: auto;">Online Voting System is a website that helps us held a smart election</h2><br>';
                            echo '<h2 style="margin-left: auto; margin-right: auto;">It also helps us held a authentic election</h2><br>';
                       } 
                       ?>

                       <?php
                        while($row = mysqli_fetch_assoc($result)){ 
                            if($row['status'] == 'pending')
                            {?>
                                 <tr>
                                   <td><?php echo $row['id']; ?></td>
                                   <td><?php echo $row['username']; ?></td>
                                   <td><?php echo $row['email']; ?></td>
                                   <td>
                                       <a class="btn btn-primary btn-sm"  href="view.php?id=<?php echo $row['id'];?>">View</a>
                                       <a class="btn btn-warning btn-sm"  href="approve.php?id=<?php echo $row['id'];?>">Approve</a> 
                                       <a class="btn btn-danger btn-sm"  href="deleteEC.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete?')">Delete</a>          
                                   </td>
                                </tr>
                            <?php }  
                            ?>
                       <?php }  ?>
                    </table>  
                </div>
            </div>
        </div>
    </div>

 <?php 
    require 'adminFooter.php';
  ?>

</body>

</html>

<!--             <div style="background-color: skyblue; border-radius: 20px; margin-left: 5%" >
                <h2 align="center">INTRODUCTION</h2>
                <p>The online voting system will be a website which can do the all the tasks related to a fruitful election. This web application contains the services for both of the voters and candidates. It also helps to determine the preference of the candidates. </p>
                <h3 align="center">Domain</h3>
                    <p align="center">
                        <ul class="list-unstyled text-center" >
                            <li class="lol"> Group of people(IIT_Alumni)</li>
                            <li class="lol"> An organization (DUITS)</li>
                            <li class="lol"> One parliamentary seat.</li>
                            <li class="lol"> Any single area election.</li>
                        </ul>
                    </p>    
                <p align="center"><b>Out of scope:</b> National Election and Multiple Area</p>
            </div> -->
