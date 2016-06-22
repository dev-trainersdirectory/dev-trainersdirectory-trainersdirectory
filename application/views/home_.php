<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Trainers Direvtory </title>
	<base href="<?=base_url()?>" />
	<meta name="generator" content="Bootply" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="public/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
	<link href="public/css/style.min.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div class="search-page">
		<!-- header -->
		<!--navigation-->
		<!-- Navigation -->
		<nav class="navbar transparent" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="pull-right" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-links navbar-right">
						<li>
							<a href="register/login">LOGIN</a>
						</li>
						<li>
							<a href="register/signup">REGISTER</a>
						</li>
					</ul>
				</div>
				<!--navbar-collapse ends -->
			</div>
			<!-- container ends-->
		</nav>
		<!--navigation ends-->
		<!--header ends -->
		<!-- main -->
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="text-center logo">
						<img src="public/images/trainers-directory-logo.png">
					</div>
					<!-- search box -->
					<div class="col-xs-12 input-group">
						<div class="inner-icon-right col-sm-10 col-xs-10">
							<i class="fa fa-search"></i>
							<input type="search" class="form-control"	placeholder="Your learning needs" />
						</div>
						<button type="button" class="btn btn-green font-white  col-sm-2 col-xs-2"><i class="fa fa-map-marker"></i></button>
					</div>
					<!-- search box end-->
				</div>
			</div>
			<!--search ends-->
			<!--sub menu-->
			<div class="row round-sub-menu">
				<div class="col-sm-6 col-sm-offset-3">
					<!-- for Search Trainers -->
					<div class="col-xs-4 col-sm-4 col-md-4 text-center">
						<button type="button" class="btn btn-default btn-lg btn-circle">
							<i class="fa fa-binoculars"></i>
						</button>
						<h5>Search Trainers</h5>
					</div>
					<!-- for Search Trainers ends -->
					<!-- for Watch Videos -->
					<div class="col-xs-4 col-sm-4 col-md-4 text-center">
						<button type="button" class="btn btn-default btn-lg btn-circle">
							<i class="fa fa-play-circle"></i>
						</button>
						<h5>Watch Videos</h5>
					</div>
					<!-- for Watch Videos ends -->
					<!-- for hire -->
					<div class="col-xs-4 col-sm-4 col-md-4 text-center">
						<button type="button" class="btn btn-default btn-lg btn-circle">
							<i class="fa fa-money"></i>
						</button>
						<h5>Hire Them!</h5>
					</div>
					<!-- for hire -->
				</div>
			</div>
			<!--sub menu ends-->
		</div>
		<!-- main end -->
	</div>
	<!--footer-->
	<footer class="footer navbar-static-bottom">
		<div class="container">
			<!-- footer links -->
			<nav class="pull-left">
				<ul class="nav navbar-links navbar-left">
					<li><a href="#">About Us</a></li>
					<li><a href="#">Sitemap</a></li>
					<li><a href="#">Terms &#38; Conditions</a></li>
					<li><a href="#">Ads</a></li>
				</ul>
			</nav>
			<!-- footer links ends -->
			<p class="text-right">© 2016 Trainers Directory</p>
		</div>
		<button type="button" class="btn btn-information font-white"><i class="fa fa-info-circle"></i></button>
	</footer>

	<!-- script references -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
</body>
</html>
