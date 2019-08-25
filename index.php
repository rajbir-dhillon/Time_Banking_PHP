<?php
	ini_set('display_errors', true);
	session_start();
	include_once 'classes/class.user.php';
	
	$user = new User();
	$regErr = "";

	$allPost = $user->get_allPosts();
	//var_dump($_SESSION);
	if (isset($_POST['loginBtn'])) {
		$uName = !empty($_POST['uName']) ? trim($_POST['uName']) : null;
		$pWord = !empty($_POST['pWord']) ? trim($_POST['pWord']) : null;

		$login = $user->user_login($uName, $pWord, $regErr);

		if (!$login) {
			echo $regErr;
		}
	}

	if (isset($_POST['regBtn'])) {
		$uName = !empty($_POST['uName']) ? trim($_POST['uName']) : null;
		$eMail = !empty($_POST['eMail']) ? trim($_POST['eMail']) : null;
		$pWord = !empty($_POST['pWord']) ? trim($_POST['pWord']) : null;
		$cPword = !empty($_POST['cPword']) ? trim($_POST['cPword']) : null;
		$skill = !empty($_POST['skill']) ? trim($_POST['skill']) : null;

		if($_POST['captcha'] != $_SESSION['digit']) die("Sorry, the CAPTCHA code entered was incorrect!");
		
		$register = $user->user_register($uName, $eMail, $pWord, $cPword, $skill, $regErr);
			if ($register) {
				//if register sucess log in
				echo "register success";
			} else {
				echo $regErr;
			}

		
	}

	$login = $user->check_login();

	if ($login) {
		$menu = "<a href='useraccount.php'>MY ACCOUNT</a>";
		$dropdown = "<a href='logout.php' class='tran3s'>Logout</a></li>";
	} else {
		$menu = "<a href='#login-section'>LOGIN | REGISTER</a>";
		$dropdown = "";
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

		<title>Greenwich Time Banking || Time Banking Management</title>

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
					<a href="index.php" class="logo"><img src="images/logo/logo.png" alt="Logo"></a>
					<!-- <a href="index.php" class="logo float-left tran4s">Greenwich Time Banking</a> -->
					
					<!-- ========================= Theme Feature Page Menu ======================= -->
					<nav class="navbar float-right theme-main-menu one-page-menu">
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
					       	<li class="active"><a href="#home">HOME</a></li>
							<li><a href="#featured">FEATURED</a></li>
							<li><a href="#category-section">CATEGORIES</a></li>
							<li><a href="#project-section">LATEST POSTS</a></li>
							<li><a href="posts.php">VIEW POSTS</a></li>
							<li class="dropdown-holder"><?php echo $menu;?>
								<ul class="sub-menu">
					       			<li><?php echo $dropdown; ?></li>
					       		</ul>
							</li>
					     </ul>
					   </div><!-- /.navbar-collapse -->
					</nav> <!-- /.theme-feature-menu -->
				</div>
			</header> <!-- /.theme-main-header -->


			<!--
			=====================================================
				Theme Main SLider
			=====================================================
			-->
			<div id="home" class="banner">
	        	<div class="rev_slider_wrapper">
					<!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
						<div id="main-banner-slider" class="rev_slider video-slider" data-version="5.0.7">
							<ul>
								<!-- SLIDE1  -->
								<li data-index="rs-280" data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default"  data-title="Title Goes Here" data-description="">
									<!-- MAIN IMAGE -->
									<img src="images/home/slide2.jpeg"  alt="image" class="rev-slidebg" data-bgparallax="3" data-bgposition="center center" data-duration="20000" data-ease="Linear.easeNone" data-kenburns="on" data-no-retina="" data-offsetend="0 0" data-offsetstart="0 0" data-rotateend="0" data-rotatestart="0" data-scaleend="100" data-scalestart="140">
									<!-- LAYERS -->

									<!-- LAYER NR. 1 -->
									<div class="tp-caption" 
										data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
										data-y="['middle','middle','middle','middle']" data-voffset="['-58','-58','0','-50']" 
										data-width="none"
										data-height="none"
										data-whitespace="nowrap"
										data-transform_idle="o:1;"
							 
										data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
										data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
										data-mask_in="x:0px;y:[100%];" 
										data-mask_out="x:inherit;y:inherit;" 
										data-start="1000" 
										data-splitin="none" 
										data-splitout="none" 
										data-responsive_offset="on" 
										style="z-index: 6; white-space: nowrap;">
										<h1>Greenwich Time Banking</h1>
									</div>

									<!-- LAYER NR. 2 -->
									<div class="tp-caption" 
										data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
										data-y="['middle','middle','middle','middle']" data-voffset="['-05','-05','63','0']"
										data-width="none"
										data-height="none"
										data-whitespace="nowrap"
										data-transform_idle="o:1;"
							 
										data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
										data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
										data-mask_in="x:0px;y:[100%];" 
										data-mask_out="x:inherit;y:inherit;" 
										data-start="2000" 
										data-splitin="none" 
										data-splitout="none" 
										data-responsive_offset="on" 
										style="z-index: 6; white-space: nowrap;">
										<h6>Sub Head, Motto or Mission subtitle 1</h6>
									</div>


									<!-- LAYER NR. 3 -->
									<div class="tp-caption"
										data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
										data-y="['middle','middle','middle','middle']" data-voffset="['52','52','125','80']"
										data-transform_idle="o:1;"
							 
										data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
										data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
										data-mask_in="x:0px;y:[100%];" 
										data-mask_out="x:inherit;y:inherit;" 
										data-start="3000" 
										data-splitin="none" 
										data-splitout="none" 
										data-responsive_offset="on">
										<a href="#login-section" class="project-button hvr-bounce-to-right">Login!</a>
									</div>
								</li>
							</ul>	
						</div>
					</div><!-- END REVOLUTION SLIDER -->
	        </div> <!--  /#banner -->



	        <!--
			=====================================================
				Featured Section
			=====================================================
			-->
			<section id="featured">
				<div class="container">
					<div class="theme-title">
						<h2>Featured </h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
					</div> <!-- /.theme-title -->

					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="single-about-content">
								<div class="icon round-border tran3s">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								</div>
								<h5><a href="#" class="tran3s">Web Development</a></h5>
								<p>Lorem ipsum dolor sit amet, consect et adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
								<a href="#" class="more tran3s hvr-bounce-to-right">More Details</a>
							</div> <!-- /.single-about-content -->
						</div> <!-- /.col -->

						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="single-about-content">
								<div class="icon round-border tran3s">
									<i class="fa fa-camera" aria-hidden="true"></i>
								</div>
								<h5><a href="#" class="tran3s">PHOTOGRAPHY</a></h5>
								<p>Lorem ipsum dolor sit amet, consect et adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
								<a href="#" class="more tran3s hvr-bounce-to-right">More Details</a>
							</div> <!-- /.single-about-content -->
						</div> <!-- /.col -->

						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="single-about-content">
								<div class="icon round-border tran3s">
									<i class="fa fa-life-ring" aria-hidden="true"></i>
								</div>
								<h5><a href="#" class="tran3s">Digital Media</a></h5>
								<p>Lorem ipsum dolor sit amet, consect et adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
								<a href="#" class="more tran3s hvr-bounce-to-right">More Details</a>
							</div> <!-- /.single-about-content -->
						</div> <!-- /.col -->

						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="single-about-content">
								<div class="icon round-border tran3s">
									<i class="fa fa-line-chart" aria-hidden="true"></i>
								</div>
								<h5><a href="#" class="tran3s">Online Marketing</a></h5>
								<p>Lorem ipsum dolor sit amet, consect et adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
								<a href="#" class="more tran3s hvr-bounce-to-right">More Details</a>
							</div> <!-- /.single-about-content -->
						</div> <!-- /.col -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</section> <!-- /#about-us -->


			<!--
			=====================================================
				Category Section
			=====================================================
			-->
			<div id="category-section">
				<div class="container">
					<div class="theme-title">
						<h2>CATEGORIES</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
					</div> <!-- /.theme-title -->

					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-category-content">
								<div class="icon-heading tran3s">
									<div class="icon tran3s"><i class="fa fa-paint-brush" aria-hidden="true"></i></div>
									<h6><a href="#" class="tran3s">Design</a></h6>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. </p>
							</div> <!-- /.single-category-content -->
						</div> <!-- /.col-lg -->

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-category-content">
								<div class="icon-heading tran3s">
									<div class="icon tran3s"><i class="fa fa-camera" aria-hidden="true"></i></div>
									<h6><a href="#" class="tran3s">Media</a></h6>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. </p>
							</div> <!-- /.single-category-content -->
						</div> <!-- /.col-lg -->

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-category-content">
								<div class="icon-heading tran3s">
									<div class="icon tran3s"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
									<h6><a href="#" class="tran3s">Web Development</a></h6>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. </p>
							</div> <!-- /.single-category-content -->
						</div> <!-- /.col-lg -->

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-category-content">
								<div class="icon-heading tran3s">
									<div class="icon tran3s"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
									<h6><a href="#" class="tran3s">Marketing</a></h6>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. </p>
							</div> <!-- /.single-category-content -->
						</div> <!-- /.col-lg -->

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-category-content">
								<div class="icon-heading tran3s">
									<div class="icon tran3s"><i class="fa fa-life-ring" aria-hidden="true"></i></div>
									<h6><a href="#" class="tran3s">Driving</a></h6>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. </p>
							</div> <!-- /.single-category-content -->
						</div> <!-- /.col-lg -->

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-category-content">
								<div class="icon-heading tran3s">
									<div class="icon tran3s"><i class="fa fa-anchor" aria-hidden="true"></i></div>
									<h6><a href="#" class="tran3s">Support</a></h6>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. </p>
							</div> <!-- /.single-category-content -->
						</div> <!-- /.col-lg -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /#category-section -->



			<!--
			=====================================================
				Latest Posts Section
			=====================================================
			-->
			<div id="project-section">
				<div class="container">
					<div class="theme-title">
						<h2>LATEST POSTS</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
					</div> <!-- /.theme-title -->

					<br>
					<div id="search-section">
				<div class="container">
					<div class="clear-fix login-content">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="left-side">
								<div class="login-form">
										<form action="" class="form-validation" autocomplete="on" method="post">
											<div class="row">
												<div class="single-input">
													<input type="text" placeholder="search" name="search">
												</div> <!-- /.single-input -->
											</div>
											<button type="submit" name="loginBtn" class="tran3s p-color-bg">Search</button>
										</form>
								</div>
							</div> <!-- /.left-side -->
						</div> <!-- /.col- -->
					</div>
				</div>
			</div>
		</br></br></br></br>

			<article class="blog-details-page">
				<div class="container">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-fix">
						<div class="blog-details-post-wrapper">
							<div class="comment-area">
								<div class="comment-wrapper">
									<?php
										foreach ($allPost as $all_posts) {
											echo "<div class='single-comment clear-fix'>";
											echo "<div class='single-comment clear-fix'>";
											echo "<img src='images/blog/14.jpg' alt='Image' class='float-left'>";
											echo "<div class='comment float-left'>";
											echo "<h6>";
											echo $all_posts['user'];;
											echo "</h6>";
											echo "<i>";
											echo $all_posts['date'];;
											echo"</i>";
											echo "<p>";
											echo $all_posts['content'];
											echo "</p>";
											echo "<a  href='index.php#login-section'><button class='tran3s'>View</button></a>";
											echo "</div>"; // /.comment
											echo "</div>"; //  /.single-commen
										}
									?>
									
										
										
											
										
									



								</div> <!-- /.comment-wrapper -->
							</div> <!-- /.comment-area -->
						</aside>
					</div> <!-- /.col- -->
				</div> <!-- /.container -->
			</article>


					

					</div> <!-- /.project-gallery -->
				</div> <!-- /.container -->
			</div> <!-- /#project-section -->

			<!--
			=====================================================
				Page middle banner
			=====================================================
			-->

			<div class="page-middle-banner">
				<div class="opacity">
					<h3>We Create Creative <span class="p-color">&amp;</span> Best Unique Design</h3>
					<a href="#" class="hvr-bounce-to-right">Let's Work Together</a>
				</div> <!-- /.opacity -->
			</div> <!-- /.page-middle-banner -->

			<!--
			=====================================================
				Login Section
			=====================================================
			-->
			<div id="login-section">
				<div class="container">
					<div class="clear-fix login-content">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="left-side">
								<div class="login-form">
									<h2>LOGIN</h2>
										<form action="" class="form-validation" autocomplete="on" method="post">
											<div class="row">
												<div class="single-input">
													<input type="text" placeholder="Username" name="uName">
												</div> <!-- /.single-input -->
											</div>
											<div class="row">
												<div class="single-input">
													<input type="password" placeholder="Password" name="pWord">
												</div> <!-- /.single-input -->
											</div> 
											<button type="submit" name="loginBtn" class="tran3s p-color-bg">Login</button>
										</form>
								</div>
							</div> <!-- /.left-side -->
						</div> <!-- /.col- -->

						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="login-form">
									<h2>REGISTER</h2>
										<form action="" class="form-validation" autocomplete="off" method="post" id="regForm">
											<div class="row">
												<div class="control-group">
													<div class="single-input controls">
														<input type="text" placeholder="Username" name="uName" id="reguName" onfocusout="validateuName()" required>
														<p id="reguNameT"></p>
													</div> <!-- /.single-input -->	
												</div>
											</div>
											<div class="row">
												<div class="single-input">
													<input type="text" placeholder="E-mail" name="eMail" id="regEmail" onfocusout="validateEmail()" required>
													<p id="regEmailT"></p>
												</div> <!-- /.single-input -->
											</div>
											<div class="row">
												<div class="single-input">
													<input type="password" placeholder="Password" name="pWord" id="regPword" onfocusout="validatePword()" required>
													<p id="regPwordT"></p>
												</div> <!-- /.single-input -->
											</div>
											<div class="row">
												<div class="single-input">
													<input type="password" placeholder="Confirm Password" name="cPword" id="regcPword" onfocusout="validatecPword()" required>
													<p id="regcPwordT"></p>
												</div> <!-- /.single-input -->
											</div>
											<div class="row">
												<div class="single-input">
													<select class="form-control form-control-lg" id="regSkill" name="skill">
												      <option>Skill set...</option>
												      <option value="Design">Design</option>
												      <option value="Media">Media</option>
												      <option value="Web development">Web development</option>
												      <option value="Marketing">Marketing</option>
												      <option value="Driving">Driving</option>
												      <option value="Support">Support</option>
												    </select>
												    <p id="regSkillT"></p>
												</div><!-- /.single-input -->
											</div><!-- /.row -->
											<div class="row">
												<div class="single-input">
													<img src="classes/captcha.php" width="120" height="30" border="1" alt="CAPTCHA">
												</div>
											</div>
											<div class="row">
												<div class="single-input">
													<span>Enter captcha text below</span>
													<input type="text" size="6" maxlength="5" name="captcha" value="" id="regCap" onfocusout="validateCap()">
													<p id="capText"></p>
												</div>
											</div>
											<div class="row">
												<div class="single-input">
													<br><br>
												<button type="submit" name="regBtn" class="tran3s p-color-bg" >Register</button>
												</div>
											</div>
										</form>
								</div>
						</div> <!-- /.col- -->
					</div> <!-- /.login-content -->
				</div> <!-- /.container -->
			</div> <!-- /#login-section -->


			<!--
			=====================================================
				Footer
			=====================================================
			-->
			<footer>
				<div class="container">
					<a href="index.php" class="logo"><img src="images/logo/logo.png" alt="Logo"></a>
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
					<p>Copyright @2018 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
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
		
		<!-- revolution -->
		<script src="vendor/revolution/jquery.themepunch.tools.min.js"></script>
		<script src="vendor/revolution/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.kenburn.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.actions.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.video.min.js"></script>

		<!-- Google map js -->
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ8VrXgGZ3QSC-0XubNhuB2uKKCwqVaD0&callback=goMap" type="text/javascript"></script> <!-- Gmap Helper -->
		<script src="vendor/gmaps.min.js"></script>
		<!-- owl.carousel -->
		<script type="text/javascript" src="vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- mixitUp -->
		<script type="text/javascript" src="vendor/jquery.mixitup.min.js"></script>
		<!-- Progress Bar js -->
		<script type="text/javascript" src="vendor/skills-master/jquery.skills.js"></script>
		<!-- Validation -->
		
		<script>
			var uNameB = false;
			var emailB = false;
			var pWordB = false;
			var cPwordB = false;
			var CapB = false;


			function validateuName() {
			    var reguName;
			    var reguNameT;

			    // Get the value of the input field
			    reguName = document.getElementById("reguName").value;

			    //username validation
			    if (reguName == ""){
			    	reguNameT = "Please enter a valid Username";
			    	uNameB = false;
			    } else {
			    	reguNameT = "";
			    	uNameB = true;   
			    }

			    document.getElementById("reguNameT").innerHTML = reguNameT;
			}

			function emailValidate(email) 
			{
			  var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
			  return re.test(email);
			}

			function validateEmail() {
			    var regEmail;
			    var regEmailT;

			    // Get the value of the input field
			    regEmail = document.getElementById("regEmail").value;

			    
			    //email validation
			    if (regEmail == ""){
			    	regEmailT = "Please enter a valid Email address";
			    	emailB = false;
			    	toggleBtn();
			    } else if (!emailValidate(regEmail)) {
			    	regEmailT = "Email address is not valid";
			    	emailB = false;
			    	toggleBtn();
			    } else {
			    	regEmailT = "";
			    	emailB = true;
			    	toggleBtn();
			    }


			    document.getElementById("regEmailT").innerHTML = regEmailT;
			}

			function validatePword() {
			    var regPword;
			    var regPwordT;

			    // Get the value of the input field
			    regPword = document.getElementById("regPword").value;

			    //pword validation
			    if (regPword == ""){
			    	regPwordT = "Please enter Password";
			    	pWordB = false;
			    	toggleBtn();
			    } else {
			    	regPwordT = "";
			    	pWordB = true;
			    	toggleBtn();
			    }

			    document.getElementById("regPwordT").innerHTML = regPwordT;
			}

			function validatecPword() {
			    var regcPword;
			    var regcPwordT;

			    // Get the value of the input field
			    regPword = document.getElementById("regPword").value;
			    regcPword = document.getElementById("regcPword").value;

			    //cpword validation
			    if (regcPword == "") {
			    	regcPwordT = "Please enter Password";
			    	cPwordB =false;
			    	toggleBtn();
			    } else if (regPword != regcPword) {
			    	regcPwordT = "Password does not match";
			    	cPwordB = false;
			    	toggleBtn();
			    } else {
			    	regcPwordT = "";
			    	cPwordB = true;
			    	toggleBtn();
			    }
			    document.getElementById("regcPwordT").innerHTML = regcPwordT;
			}

			function validateCap() {
			    var cap;
			    var capText;

			    // Get the value of the input field
			    cap = document.getElementById("regCap").value;

			    // If cap is Not a Number or empty
			    if (cap == "") {
			    	capText = "Please enter captcha";
			    	CapB = false;
			    	toggleBtn();
			    } else if (isNaN(cap)) {
			    	capText = "C aptcha is not valid";
			    	CapB = false;
			    	toggleBtn();
			    } else {
			    	capText = "";
			    	CapB = true;
			    	toggleBtn();
			    }
			    document.getElementById("capText").innerHTML = capText;
			}

			function toggleBtn() {

				
			}

		</script>

		<!-- Theme js -->
		<script type="text/javascript" src="js/theme.js"></script>
		<script type="text/javascript" src="js/map-script.js"></script>

		</div> <!-- /.main-page-wrapper -->
	</body>
</html>