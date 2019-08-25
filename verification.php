<?php
	ini_set('display_errors', true); 
	session_start();
	include_once 'classes/class.user.php';
	//var_dump($_SESSION);
	$user = new User();

	if (isset($_POST['verifyBtn'])) {
		$input = $_POST['codeInput'];
		$user->update_verify($input);

	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>BizPro || Responsive html5 template</title>

		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">


		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css">


		<!-- Fix Internet Explorer ______________________________________-->

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
			
	</head>

	<body>
		<div class="main-page-wrapper">



			<!-- 
			=============================================
				Theme Header
			============================================== 
			-->
			<header class="theme-main-header">
				<div class="container">
					<a href="index.html" class="logo float-left tran4s"><img src="images/logo/logo.png" alt="Logo"></a>
					
					<!-- ========================= Theme Feature Page Menu ======================= -->
					<nav class="navbar float-right theme-main-menu">
					   <!-- Brand and toggle get grouped for better mobile display -->
					   <div class="navbar-header">
					     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
					       <span class="sr-only">Toggle navigation</span>
					       Menu
					       <i class="fa fa-bars" aria-hidden="true"></i>
					     </button>
					   </div>
					   <!-- Collect the nav links, forms, and other content for toggling -->
					   <div class="collapse navbar-collapse" id="navbar-collapse-1">
					     <ul class="nav navbar-nav">
					       	<li><a href="index.php#home">HOME</a></li>
							<li><a href="index.php#about-us">ABOUT</a></li>
							<li><a href="index.php#service-section">SERVICES</a></li>
							<li><a href="index.html#project-section">PORTFOLIO</a></li>
							<li><a href="index.html#team-section">TEAM</a></li>
							<li><a href="index.html#skill-section">Skill</a></li>
							<li><a href="index.html#our-client">CLIENTS</a></li>
							<li><a href="index.html#pricing-section">Pricing</a></li>
							<li class="dropdown-holder active"><a href="index.html#blog-section">BLOG</a>
								<ul class="sub-menu">
					       			<li><a href="#" class="tran3s">Blog Details</a></li>
					       		</ul>
							</li>
							<li><a href="index.html#contact-section">CONTACT</a></li>
					     </ul>
					   </div><!-- /.navbar-collapse -->
					</nav> <!-- /.theme-feature-menu -->
				</div>
			</header> <!-- /.theme-main-header -->


			<!--
			=====================================================
				Theme Inner page Banner
			=====================================================
			-->
			<section class="inner-page-banner">
				<div class="opacity">
					<div class="container">
						<h2>Verification</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>/</li>
							<li>Verification</li>
						</ul>
					</div> <!-- /.container -->
				</div> <!-- /.opacity -->
			</section> <!-- /.inner-page-banner -->
			

			
			<!--
			=====================================================
				Blog Page Details
			=====================================================
			-->
			<article class="blog-details-page">
				<div class="container">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-fix">
						<div class="blog-details-post-wrapper">
							


							<div class="post-comment">
								<h4>Verifcation code</h4>

								<form action="#" method="post">
									<div class="row">
										<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
											<span>A verifcation code has been sent to your email address</span>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="single-input">
													<input type="text" name="codeInput">
												</div> <!-- /.single-input -->
												<span>didnt get code? <a href="">Resend email</a></span><br>
											</div>
										</div> <!-- /.col- -->
									</div> <!-- /.row -->
									<button type="submit" name="verifyBtn" class="tran3s p-color-bg">Verify</button>
								</form>
							</div> <!-- /.post-comment -->
						</div> <!-- /.blog-details-post-wrapper -->
					</div> <!-- /.col- -->
				</div> <!-- /.container -->
			</article>
	        



			<!--
			=====================================================
				Footer
			=====================================================
			-->
			<footer>
				<div class="container">
					<a href="index.html" class="logo"><img src="images/logo/logo.png" alt="Logo"></a>

					<ul>
						<li><a href="#" class="tran3s round-border"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="tran3s round-border"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="tran3s round-border"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						<li><a href="#" class="tran3s round-border"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li><a href="#" class="tran3s round-border"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
						<li><a href="#" class="tran3s round-border"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
						<li><a href="#" class="tran3s round-border"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="tran3s round-border"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
					</ul>
					<p>Copyright 2016-2017 <a href="https://themeforest.net/user/srthemes/portfolio" class="tran3s p-color" target="_blank">SRThemes</a> All rights reserved.</p>
				</div>
			</footer>




			<!-- =============================================
				Loading Transition
			============================================== -->
			<div id="loader-wrapper">
				<div id="preloader_1">
	                <span></span>
	                <span></span>
	                <span></span>
	                <span></span>
	                <span></span>
	            </div>
			</div>

			

	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s p-color-bg">
				<i class="fa fa-long-arrow-up" aria-hidden="true"></i>
			</button>




		<!-- Js File_________________________________ -->

		<!-- j Query -->
		<script type="text/javascript" src="vendor/jquery.2.2.3.min.js"></script>

		<!-- Bootstrap JS -->
		<script type="text/javascript" src="vendor/bootstrap/bootstrap.min.js"></script>

		<!-- Vendor js _________ -->
		
		<!-- owl.carousel -->
		<script type="text/javascript" src="vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- mixitUp -->
		<script type="text/javascript" src="vendor/jquery.mixitup.min.js"></script>
		<!-- Progress Bar js -->
		<script type="text/javascript" src="vendor/skills-master/jquery.skills.js"></script>
		<!-- Validation -->
		<script type="text/javascript" src="vendor/contact-form/validate.js"></script>
		<script type="text/javascript" src="vendor/contact-form/jquery.form.js"></script>
		<!-- Calendar js -->
		<script type="text/javascript" src="vendor/monthly-master/js/monthly.js"></script>


		<!-- Theme js -->
		<script type="text/javascript" src="js/theme.js"></script>
		<script type="text/javascript" src="js/map-script.js"></script>

		</div> <!-- /.main-page-wrapper -->
	</body>
</html>