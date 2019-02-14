<?php
    session_start();
    define("PATH", dirname(__FILE__) . "/includes/");
    require_once (PATH .'db_connection.php');
    $db = db_connect(); 
    $user_works = get_works_id($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Author Meta -->
	<meta name="author" content="colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>My Profile</title>
    <link href="img/logo.png" rel="shortcut icon"/>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700,900" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="css/cssprofile/linearicons.css">
	<link rel="stylesheet" href="css/cssprofile/font-awesome.min.css">
	<link rel="stylesheet" href="css/cssprofile/bootstrap.css">
	<link rel="stylesheet" href="css/cssprofile/magnific-popup.css">
	<link rel="stylesheet" href="css/cssprofile/nice-select.css">
	<link rel="stylesheet" href="css/cssprofile/animate.min.css">
	<link rel="stylesheet" href="css/cssprofile/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/mainprofile.css">
    <style>
        div.section-title{
            text-align: left;
            padding: 0;
        }
        .pers-info p{
            display: inline-block; 
            width: 40%; 
        }
        .pers-info .info{ 
            font-weight: 700; 
        }
        .pers-info ul.info{
            display: inline-block;
            width: 40%;   
        }
        .prev-exp {
            list-style: circle; 
        }
        .prev-exp li {
            padding: 10px 0 ; 
        }
    </style>
</head>

<body>

	<!-- Start Preloader Area -->
	<div class="preloader-area">
		<div class="loader-box">
			<div class="loader"></div>
		</div>
	</div>
	<!-- End Preloader Area -->

	<!-- start banner Area -->
	<section class="home-banner-area">
		<div class="container">
			<div class="row fullscreen d-flex align-items-center" >
				<div class="banner-content col-lg-6 col-md-12 justify-content-center ">
					<div class="me wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.2s">It's me</div>
					<h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s"><?=$_SESSION['name']?></h1>
					<div class="designation mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.1s">
						LOVE
						<span class="designer"><?=$_SESSION['talent']?></span>
						
					</div>
					<a href="myworks.html" class="primary-btn" data-text="My Works">
						<span>M</span>
						<span>y</span>
						<span> </span>
						<span>W</span>
						<span>o</span>
						<span>r</span>
						<span>k</span>
                        <span>s</span>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start About Area -->
	<section class="about-area section-gap">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6 about-left">
					<img class="img-fluid" src="img/about-img.jpg" alt="">
				</div>
				<div class="col-lg-5 col-md-12 about-right">
					<div class="section-title">
						<h2>About Me</h2>
					</div>
					<div class="mb-50 wow fadeIn" data-wow-duration=".8s">
						<p>
							inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the
							workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior
							is often laughed. inappropriate behavior is often laughed off as “boys will be boys,” women face higher.
						</p>
						<p>That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often
							laughed.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Area -->


	<!-- Start Work Area Area -->
	<section class="work-area section-gap-top section-gap-bottom-90" id="work">
		<div class="container">
			<div class="row d-flex justify-content-between align-items-end mb-80">
				<div class="col-lg-6">
					<div class="section-title">
						<h2>My Works</h2>
						<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see
							some for as low as $.17 each.</p>
					</div>
				</div>
			</div>

			<div class="filters-content">
				<div class="row grid">
                    <?php while($row = mysqli_fetch_assoc($user_works)){ ?>
					<div class="single-work col-lg-4 col-md-6 col-sm-12 all creative wow fadeInUp" data-wow-duration="2s">
						<div class="relative">
							<div class="thumb">
								<div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="<?=$row['w_path']?>" alt="<?=$row['w_name']?>" />
							</div>
							<div class="middle">
								<h4><?=$row['w_name']?></h4>
								<div class="cat"><?=$row['w_description']?></div>
							</div>
							<a class="overlay"></a>
						</div>
					</div>
                    <?php } ?>
				</div>
                <a href="myworks.html" class="primary-btn" data-text="Add Works">
                    <span>A</span>
                    <span>d</span>
                    <span>d</span>
                    <span> </span>
                    <span>W</span>
                    <span>o</span>
                    <span>r</span>
                    <span>k</span>
                    <span>s</span>
				</a>
			</div>
		</div>
	</section>
	<!-- End Work Area Area -->


	<!-- Start Job History Area Area -->
	<section class="job-area section-gap-top section-gap-bottom-90">
		<div class="container">
			<div class="row d-flex">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>Personal Info</h2>
						<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. </p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="single-job">
						<div class="top-sec d-flex justify-content-between">
							<div class="top-left">
								<h4>Electrical Engineer</h4>
								<p>Faculty of Engineering, Ain Shams University</p>
							</div>
						</div>
                        <div class="pers-info">
                            <p>Email :</p>
                            <p class="info"><?=$_SESSION['email']?></p>
                            <p>Mobile No. :</p>
                            <p class="info"><?=$_SESSION['mobile']?></p>
                            <p>BirthDay :</p>
                            <p class="info"><?=$_SESSION['birthday']?></p>
                            <p>Gender :</p>
                            <p class="info"><?=$_SESSION['gender']?></p>
                            <p>Interests :</p>
                            <p class="info"><?=$_SESSION['talent']?></p>
                    
                        </div>
					</div>
				</div>
				<!--<div class="col-lg-6">
					<div class="single-job">
						<div class="top-sec d-flex justify-content-between">
							<div class="top-left">
								<h4>Previous Experience related to my Hobies</h4>
								
							</div>
						</div>
                        <ul class="prev-exp">
                            <li class="bottom-sec wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                                All users on MySpace will know that there are millions of people out there. Every day besides. 
                            </li>
                            <li class="bottom-sec wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                                All users on MySpace will know that there are millions of people out there. 
                            </li>
                        </ul>
					</div>
				</div>-->
                <!--<a href="#" class="primary-btn" data-text="Edit Info">
                    <span>E</span>
                    <span>d</span>
                    <span>i</span>
                    <span>t</span>
				</a>-->
			</div>
		</div>
	</section>
	<!-- End Job Historyt Area Area -->

	<!-- Start Contact Area -->
	<section class="contact-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="contact-title">
						<h2>Contact Me</h2>
                        <p style="color: #fff">If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
					</div>
				</div>
			</div>

			<div class="row mt-80">
				<div class="col-lg-4 col-md-4">
					<div class="contact-box">
						<h4><?=$_SESSION['mobile']?></h4>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="contact-box">
						<h4><?=$_SESSION['email']?></h4>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="contact-box">
						<h4>facebook.com/username</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Contact Area -->
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
	

	

	<!-- ####################### Start Scroll to Top Area ####################### -->
<!--
	<div id="back-top">
		<a title="Go to Top" href="#">
			<i class="lnr lnr-arrow-up"></i>
		</a>
	</div>
-->
	<!-- ####################### End Scroll to Top Area ####################### -->

	<script src="js/jsprofile/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="js/jsprofile/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/jsprofile/easing.min.js"></script>
	<script src="js/jsprofile/hoverIntent.js"></script>
	<script src="js/jsprofile/superfish.min.js"></script>
	<script src="js/jsprofile/mn-accordion.js"></script>
	<script src="js/jsprofile/jquery.ajaxchimp.min.js"></script>
	<script src="js/jsprofile/jquery.magnific-popup.min.js"></script>
	<script src="js/jsprofile/owl.carousel.min.js"></script>
	<script src="js/jsprofile/jquery.nice-select.min.js"></script>
	<script src="js/jsprofile/isotope.pkgd.min.js"></script>
	<script src="js/jsprofile/jquery.circlechart.js"></script>
	<script src="js/jsprofile/mail-script.js"></script>
	<script src="js/jsprofile/wow.min.js"></script>
	<script src="js/jsprofile/main.js"></script>
</body>

</html>