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

            <h2>Lists</h2>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Visitor
                    <span class="badge badge-primary badge-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Organizing Elections
                    <span class="badge badge-primary badge-pill">2</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Developer
                    <span class="badge badge-primary badge-pill">1</span>
                </li>
            </ul>

            <div class="line"></div>

            <h2>Progresses</h2>
            <div class="progress mt-2 md-12">
                <div class="progress-bar bg-success  " role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress mt-2 md-12" >
                  <div class="progress-bar bg-info  " role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress mt-2 md-12" >
                  <div class="progress-bar bg-warning  " role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress mt-2 md-12">
                  <div class="progress-bar bg-danger  " role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="line"></div>

            <div>
                <div class="card text-white bg-primary mb-3" style="max-width: 20rem; float: left;">
                <div class="card-header"><a href="Home.html">Home</a></div>
                    <div class="card-body">
                        <h4 class="card-title">Introduction</h4>
                        <p class="card-text " style="color: black;">The online voting system will be a website which can do the all the tasks related to a fruitful election......</p>
                    </div>
                </div>
                <div class="card text-white bg-danger mb-3 mx-3" style="max-width: 20rem;  float: left; ">
                    <div class="card-header"><a href="About.html">Description</a></div>
                    <div class="card-body">
                        <h4 class="card-title">Objective</h4>
                        <p class="card-text" style="color: black;">
                            At first, we will have an admin panel who control everything of the system.The first important task of the panel is to add the ......
                              
                        </p>
                    </div>
                </div>
                <div class="card text-white bg-warning mb-3" style="max-width: 20rem; float: left;">
                    <div class="card-header"><a href="Contact.html">Contact</a> </div>
                    <div class="card-body">
                        <h4 class="card-title">Address</h4>
                        <p class="card-text" style="color: black;">
                            <big><b>Md. Samsarabbi Suborno </b></big><br/>
                                R-14,Noorjahan Road<br/>Mohammadpur Dhaka-1207<br/>
                                Email:BSSE0916@.........<br/>
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

 <?php 
    require 'adminFooter.php';
 ?>

</body>

</html>