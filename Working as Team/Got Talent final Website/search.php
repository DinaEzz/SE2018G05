<?php
    $name = $_GET['name'];
    define("PATH", dirname(__FILE__) . "/includes/");
    require_once (PATH .'db_connection.php');
    $db     = db_connect();
    $talent_courses = search($name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Courses</title>
	<meta charset="UTF-8">
	<meta name="description" content="WebUni Education Template">
	<meta name="keywords" content="webuni, education, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/logo.png" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="site-logo">
						<img src="img/logo.png" alt="">
					</div>
					<div class="nav-switch">
						<i class="fa fa-bars"></i>
					</div>
				</div>
				<div class="col-lg-9 col-md-9">
					<a href="login.php" class="site-btn header-btn">Login</a>
					<nav class="main-menu">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="#">About us</a></li>
							<li><a href="courses.php">Courses</a></li>
							<li><a href="gallery.php">Gallery</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="profile.php">Profile</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->
    <!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/3.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a>
				<span>Search Results</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->
	<!-- search section -->
	<section class="search-section ss-other-page">
		<div class="container">
			<div class="search-warp">
				<div class="section-title text-white">
					<h2><span>Search your course</span></h2>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<!-- search form -->
						<form class="course-search-form" action="search.php" method="get"> 
							<input type="text" placeholder="Course or talent name" name="name" class="col-md-9" required>
							<input type="submit" name="submit" class="site-btn btn-dark" value="Search Course">
						</form>
					
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- search section end -->

    <!-- categories section -->
    <section class="categories-section spad">
        <div class="container">
            <div class="section-title">
                <h2>Search Results</h2>
            </div>
            <div class="row">
                <!-- categorie -->
                <?php while($row = mysqli_fetch_assoc($talent_courses)){?>
                <!-- course -->
                <div class="mix col-lg-3 col-md-4 col-sm-6 web">
                    <a href="<?=$row['c_link']?>" target="_blank">
                    <div class="course-item">
                        <div class="course-thumb set-bg" data-setbg="<?=$row['t_image']?>"></div>
                        <div class="course-info">
                            <div class="course-text">
                                <h5><?=$row['c_name']?></h5>
                                <p><?=$row['c_desc']?></p>
                            </div>
                            <div class="course-author">
                                <p><span><?=$row['t_name']?></span> </p>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- course -->
                <?php } ?>
                <!--<!--<!-- categorie -->
            </div>
        </div>
    </section>
    <!-- categories section end --> 
    <div class="footer-bottom">
			<div class="footer-warp">
				<ul class="footer-menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="register.php">Register</a></li>
					<li><a href="#">Privacy</a></li>
				</ul>
				<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved SE2018G05 <i class="fa fa-heart-o" aria-hidden="true"></i> 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
			</div>
		</div>
	</footer> 
	<!-- footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>