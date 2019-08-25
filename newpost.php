<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<?php
	session_start();
	include_once 'classes/class.user.php';
	$user = new User();
	//var_dump($_SESSION);
	$login = $user->check_login();
	$regErr = "";
	
	$allPost = $user->get_allPosts();

	if (isset($_POST['post'])) {
		$postTitle = !empty($_POST['postTitle']) ? trim($_POST['postTitle']) : null;
		$service = !empty($_POST['service']) ? trim($_POST['service']) : null;
		$skill = !empty($_POST['skill']) ? trim($_POST['skill']) : null;
		$post_content = !empty($_POST['post_content']) ? trim($_POST['post_content']) : null;
		$location = !empty($_POST['location']) ? trim($_POST['location']) : null;
		$credit = !empty($_POST['credit']) ? trim($_POST['credit']) : null;
		$dateTime = date("Y-m-d H:i:s");


		// $product->image = $image;
		// $image_name = $_FILES['image'] ['name'];
  //   	$image_type = $_FILES['image'] ['type'];
  //   	$image_size = $_FILES['image'] ['size'];
  //   	$image_tmp = $_FILES['image'] ['tmp_name'];

  //   	if($image_name==''){
  //           echo "<script>alert('Please Select a file')</script>";
  //           exit();
  //       }

		$post_data = $user->new_post($postTitle, $post_content, $_SESSION['uid'], $service, $skill, $location, $credit, $dateTime);
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
							<li class="dropdown-holder"><a href="#login-section">My Account</a>
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
							<li>/</li>
							<li>New Post</li>
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
						<h1 class="my-4">New post
							<small>Secondary Text</small>
						</h1>
						<div class="card my-4">
				        	<h5 class="card-header">Create a post</h5>
				            <div class="card-body">
				              <form method="post">
					              <div class="form-group">
					                <input type="text" class="form-control form-control-lg" id="postTitle" placeholder="Post title" name="postTitle">
					              </div>
					              <div class="form-group">
					              	<input type="text" class="form-control form-control-lg" id="service" name="service" placeholder="Service Type (e.g. plumbing, accounting, baby-sitting, etc.)">
					              </div>
					              <div class="form-group">
					              	<input type="text" class="form-control form-control-lg" id="skill" name="skill" placeholder="Skill Required (e.g. none, programming, math, etc.)">
					              </div>
					              <div class="form-group">
								    <textarea class="form-control form-control-lg" id="post_content" name="post_content" rows="3" placeholder="Job details"></textarea>
								  </div>
					              <div class="form-group">
					              	<div class="single-input">
										<select class="form-control form-control-lg" id="location" name="location">
										    <option>Location...</option>
										    <option value="Abbey wood">Abbey wood</option>
										    <option value="Blackheath">Blackheath</option>
										    <option value="Charlton">Charlton</option>
										    <option value="Coldharbour">Coldharbour</option>
										    <option value="Deptford">Deptford</option>
										    <option value="Eltham">Eltham</option>
										    <option value="Horn Park">Horn Park</option>
										    <option value="Greenwich">Greenwich</option>
										    <option value="Greenwich Peninsula">Greenwich Peninsula</option>
										    <option value="Kidbrooke">Kidbrooke</option>
										    <option value="Lee">Lee </option>
										    <option value="Mottingham">Mottingham</option>
										    <option value="New Charlton">New Charlton</option>
										    <option value="New Eltham">New Eltham</option>
										    <option value="Plumstead">Plumstead</option>
										    <option value="Shooters Hill">Shooters Hill</option>
										    <option value="Thamesmead">Thamesmead</option>
										    <option value="Well Hall">Well Hall</option>
										    <option value="Westcombe Park">Westcombe Park</option>
										    <option value="Woolwich">Woolwich</option>
										</select>
									</div><!-- /.single-input -->
					              </div>
					              <div class="form-group">
					              	<input type="text" class="form-control form-control-lg" id="credit" name="credit" placeholder="Credit">
					              </div>
					              <div class="form-group">
					              	<input type="file" name="image">
					              </div>
					              <div class="single-input">
									<br><br>
								    <button type="submit" class="btn btn-outline-primary btn-lg" name="post">Register</button>
								  </div>
				              </form>
				            </div>
				        </div>
					</div>	
					<!-- Side bar -->
					<div class="col-md-4">
						
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