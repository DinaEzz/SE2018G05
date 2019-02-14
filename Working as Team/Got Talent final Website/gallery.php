<?php
    session_start();
    define("PATH", dirname(__FILE__) . "/includes/");
    require_once (PATH .'db_connection.php');
    $db     = db_connect();
    $talents = get_telents();
    $works = get_works();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Gallery</title>
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
							<li><a href="#">Gallery</a></li>
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
				<span>Gallery</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- search section -->
	<section class="search-section ss-other-page">
		<div class="container">
			<div class="search-warp">
				<div class="section-title text-white">
					<h2><span>Search for talented people works</span></h2>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<!-- search form -->
						<form class="course-search-form" action="search_work.php" method="get"> 
							<input type="text" placeholder="talent name" name="name" class="col-md-9" required>
							<input type="submit" name="submit" class="site-btn btn-dark" value="Search work">
						</form>
					
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- search section end -->


	<!-- Page  -->
	<section class="blog-page spad pb-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<!-- blog post -->
                    <?php while($row = mysqli_fetch_assoc($works)){ ?>
                    <div class="blog-post">
						<img src="<?=$row['w_path']?>" alt="">
						<h3><?=$row['w_name']?></h3>
						<div class="blog-metas">
							<div class="blog-meta author">
								<div class="post-author set-bg" data-setbg="img/authors/1.jpg"></div>
								<a href="#"><?=$row['name']?></a>
							</div>
							<div class="blog-meta">
								<a href="#"><?=$row['talent']?></a>
							</div>
							<div class="blog-meta">
								<a href="#"><?=$row['w_date']?></a>
							</div>
							
						</div>
						<p><?=$row['w_description']?></p>
						<!--<a href="#" class="site-btn readmore">Works of Abdallah</a>-->
					</div>
                    <?php } ?>
					<div class="site-pagination">
						<span class="active">01.</span>
						<a href="#">02.</a>
						<a href="#">03</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-5 col-sm-9 sidebar">
					<!--<div class="sb-widget-item">
						<form class="search-widget" action="search.php" method="get">
							<input type="text" placeholder="Course or talent name" name="name">
							<button><i class="fa fa-search"></i></button>
						</form>
					</div>-->
					<div class="sb-widget-item">
						<h4 class="sb-w-title">Categories</h4>
						<ul>
                            <?php while($row = mysqli_fetch_assoc($talents)){?>
                                <li><a href="search_work.php?name=<?=$row['t_name']?>"><?=$row['t_name']?></li>
                            <?php } ?>
						</ul>
					</div>
					
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- Page end -->

	<!-- footer section -->
	<footer>
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
</html>