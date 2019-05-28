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
			<div class="container">
                <div class="row">
                    <div class="col-sm-5" style="background: skyblue;  margin-left: 5%">
                        <div class="card" style="width: 100%; border-radius: 50px">
                            <img class="card-img-top" src="ak2.jpg" alt="Card image" style="width:100%; height: 400px;border-radius: 50px">
                            <div class="card-body">
                              <h4 class="card-title">Md. Alamgir Kabir</h4>
                              <p class="card-text">He is a singer and software engineer</p>
                              <a href="#" class="btn btn-primary stretched-link">See Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5" style="background: skyblue;  margin-left: 5%">
                        <div class="card" style="width: 100%; border-radius: 50px">
                            <img class="card-img-top" src="myphoto.jpg" alt="Card image" style="width:100%; height: 400px;border-radius: 50px">
                            <div class="card-body">
                              <h4 class="card-title">Samsarabbi Suborno</h4>
                              <p class="card-text">He is a cricketer and web developer</p>
                              <a href="#" class="btn btn-primary stretched-link">See Profile</a>
                            </div>
                        </div>
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