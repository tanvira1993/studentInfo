<!DOCTYPE html>
<html ng-app="DemoApp">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Demo Project</title>
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>assets/images/faveicon.png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>bower_components/font-awesome/css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
	<link href="<?php echo base_url()?>bower_components/AngularJS-Toaster/toaster.css" rel="stylesheet" />
</head>
<body>

	<section class="header-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="head">
						<div class="row-fluid">
							<div class="col-md-12">
								<div class="col-md-6" style="margin-bottom: 10px;margin-top: 10px;">
									<a href="{{'<?php echo base_url()?>#!/main'}}" ><img src="<?php echo base_url()?>assets/images/logo.png" alt="Logo" /></a>
								</div>
								<div ng-show="showLogOutButton" class="col-md-6" style="margin-top:15px;">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">WebSiteName</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a  href="#!/">Home</a></li>
				<li><a href="#!/users">Users</a></li>
				<li><a href="#!/create_user">Create Users</a></li>
			</ul>
		</div>
	</nav>
	
	<div ng-view></div>

	<section class="footer-section">
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="copyright">Copyright &copy; 2017 MAX Group. Powerd by: <a href="http://www.destreza.io/" target="_blank">Destreza</a></p>
					</div>
				</div>
			</div>
		</footer>
	</section>


	<script src="<?php echo base_url()?>bower_components/jquery/dist/jquery.js"></script>
	<script src="<?php echo base_url()?>bower_components/bootstrap/dist/js/bootstrap.js"></script>

	<script src="<?php echo base_url()?>bower_components/angular/angular.js"></script>
	<script src="<?php echo base_url()?>bower_components/angular-route/angular-route.js"></script>
	<script src="<?php echo base_url()?>bower_components/angular-cookies/angular-cookies.js"></script>
	<script src="<?php echo base_url()?>bower_components/oclazyload/dist/ocLazyLoad.js"></script>
	<script src="<?php echo base_url()?>bower_components/AngularJS-Toaster/toaster.js"></script>

	<script src="<?php echo base_url()?>assets/js/app.js"></script>
	<script src="<?php echo base_url()?>assets/js/directive.js"></script>
	<script src="<?php echo base_url()?>assets/js/ui-bootstrap-tpls-2.5.0.js"></script>

	<!-- For dialog box  -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css">
	<script src="<?php echo base_url()?>assets/js/jquery-1.12.4/jquery-1.12.4.js"></script>
	<script src="<?php echo base_url()?>assets/css/jquery-ui.js"></script>
</body>
</html>
