<?php 
    require 'adminHeader.php';
 ?>

<body>
    <div class="wrapper">
        <?php 
            require 'sidebar.php';
         ?>
        <!-- Page Content  -->
        <div id="content">
            <?php 
                require 'navbar.php';
             ?>
 
            <h1 align="center">Online Voting System<br>
               A website providing services for a smart election</h1>

            <div class="line"></div>

 			<h1 align="center"> Objective</h1>
 			<ul class="list-unstyled text-center" >
 				<li class="lol">Election automation</li>
				<li class="lol">Time-saving</li>
				<li class="lol">No location dependency</li>
                <li class="lol">No wheather dependency</li>
				<li class="lol">Purified and authentic election</li>
				<li class="lol">Securities</li>
				<li class="lol">Analyzing the preferences</li>
 			</ul>
			

            <div class="line"></div>

          	<h1 align="center"> Description</h1>
			<p>
				At first, we will have an admin panel who control everything of the system. The first important task of the panel is to add the candidates, respective symbols and voters related to the election.<br> Before that, they will select candidates and collect the data from the user that means voter. Candidates can send file for publicity and all the voter will get the notification of it. <br>
				Then they create a poll and fix a range time for casting vote. Afterward, the system will publish the result. After that, we determine the acceptance of the selected candidate according to the factors age, gender, area, occupation etc.
			</p>
           
        </div>
    </div>

 <?php 
    require 'adminFooter.php';
  ?>
</body>

</html>