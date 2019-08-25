<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<?php
	session_start();
	include_once 'classes/class.user.php';
	$user = new User();

	$login = $user->check_login();

	if (!$login) {
		header('Location: index.php');
	}

	$regErr = "";
	
	$allPost = $user->get_allPosts();
	//var_dump($_SESSION);

	if(isset($_GET['aid'])){
	  $post_id = $_GET['aid'];
	  
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
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
							<li class="dropdown-holder"><a href="useraccount.php">My Account</a>
								<ul class="sub-menu">
					       			<li><a href="logout.php" class="tran3s">Logout</a></li>
					       		</ul>
							</li>
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
						<h2>WELCOME <?php echo $_SESSION['uName'];?></h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>/</li>
							<li>Posts</li>
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
					<div class="col-md-8"><!--posts body left col-->
						<h1 class="my-4">Heading
							<small>Secondary Text</small>
						</h1>
						<?php
						foreach ($allPost as $all_posts) {
							
							echo "<div class='card'>";
								echo "<div class='card-header'>";
									echo "Featured";
								echo "</div>";
								echo "<div class='card-body'>";
									echo "<h5 class='card-title'>";
										echo $all_posts['title'];
									echo "</h5>";
									echo "<p class='card-text'>";
										echo $all_posts['content'];
									echo "</p>";
									echo "<p> Reward:"; 
									echo $all_posts['credit'];
									echo "</p>";
									echo "<a href='posts.php?aid=";
									echo $all_posts['id'];
									echo "' class='btn btn-primary'>Accept job</a>";
								echo "</div>";
							echo "</div>";
							echo "<br>";
						}

						?>
 			
					</div>			
					<div class="col-md-4">
						<div class="card my-4">
			            <div class="card-body">
			              <div class="input-group">
			              	<a href="newpost.php" class="btn btn-primary btn-lg btn-block">New Post!</a>
			              </div>
			            </div>
			          </div>
			          	<div class="card my-4">
			          		<h5 class="card-header">Credit</h5>
			          		<div class="card-body">
			          			<div>
			          				<h6>You have <?php echo $_SESSION['balance']?> credits</h6>
			          			</div>
			          		</div>			          		
			          	</div>
						<!-- Search Widget -->
			          	<div class="card my-4">
				        	<h5 class="card-header">Search</h5>
				            <div class="card-body">
				              <div class="input-group">
				                <input type="text" class="form-control" placeholder="Search for...">
				                <span class="input-group-btn">
				                  <button class="btn btn-secondary" type="button">Go!</button>
				                </span>
				              </div>
				            </div>
				        </div>

			          <!-- Categories Widget -->
			          <div class="card my-4">
			            <h5 class="card-header">Categories</h5>
			            <div class="card-body">
			              <div class="row">
			                <div class="col-lg-6">
			                  <ul class="list-unstyled mb-0">
			                    <li>
			                      <a href="#">Web Design</a>
			                    </li>
			                    <li>
			                      <a href="#">HTML</a>
			                    </li>
			                    <li>
			                      <a href="#">Freebies</a>
			                    </li>
			                  </ul>
			                </div>
			                <div class="col-lg-6">
			                  <ul class="list-unstyled mb-0">
			                    <li>
			                      <a href="#">JavaScript</a>
			                    </li>
			                    <li>
			                      <a href="#">CSS</a>
			                    </li>
			                    <li>
			                      <a href="#">Tutorials</a>
			                    </li>
			                  </ul>
			                </div>
			              </div>
			            </div>
			          </div>
					</div>
				</div> <!-- /.container -->
			</article>
	        



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