<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quick Count</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!--     
	<meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" /> 
	-->

    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo base_url()?>assets/images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugins/dataTables.bootstrap4.min.css">
    <!-- font css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/fonts/font-awsome-pro/css/pro.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/fonts/feather.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/fonts/fontawesome.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/customizer.css">

</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->


	<!-- [ Mobile header ] start -->
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo">
			<img src="<?php echo base_url()?>assets/images/logo.svg" alt="" class="logo logo-lg">
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
				<!-- <i data-feather="menu"></i> -->
			</a>
			<!-- <a href="#!" class="pc-head-link" id="headerdrp-collapse">
				<i data-feather="align-right"></i>
			</a> -->
			<a href="#!" class="pc-head-link" id="header-collapse">
				<i data-feather="more-vertical"></i>
			</a>
		</div>
	</div>
	<!-- [ Mobile header ] End -->

	<!-- [ navigation menu ] start -->
	<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="<?php echo base_url()?>" class="b-brand">
					<!-- ========   change your logo hear   ============ -->
					<img src="<?php echo base_url()?>assets/images/logo.svg" alt="" class="logo logo-lg">
					<img src="<?php echo base_url()?>assets/images/logo-sm.svg" alt="" class="logo logo-sm">
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					<li class="pc-item pc-caption">
						<label>MENU</label>

					</li>
					<li class="pc-item pc-hasmenu">
						<a href="<?php echo base_url()?>" class="pc-link ">
							<span class="pc-micon"><i data-feather="home"></i></span>
							<span class="pc-mtext">
								Dashboard
							</span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link">
							<span class="pc-micon"><i class="fa fa-user-tie"></i></span>
							<span class="pc-mtext">
								Calon
							</span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i class="fa fa-user-clock"></i></span>
							<span class="pc-mtext">
								Relawan
							</span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="clipboard"></i></span>
							<span class="pc-mtext">
								Laporan TPS
							</span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="clipboard"></i></span>
							<span class="pc-mtext">
								Laporan Real
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->

	<!-- [ Header ] start -->
	<header class="pc-header ">
		<div class="header-wrapper">
			<div class="mr-auto pc-mob-drp">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<h4 class="m-b-10">Dashboard</h4>
					</li>
				</ul>
			</div>
			<div class="ml-auto">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="<?php echo base_url()?>assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
							<span>
								<span class="user-name">Admin</span>
								<span class="user-desc">Administrator</span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
							<div class=" dropdown-header">
								<h6 class="text-overflow m-0">Welcome !</h6>
							</div>
							<a href="#!" class="dropdown-item">
								<i data-feather="user"></i>
								<span>Profile</span>
							</a>
							<a href="#!" class="dropdown-item">
								<i data-feather="power"></i>
								<span>Logout</span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</header>
	<!-- [ Header ] end -->

	<!-- [ Main Content ] start -->
	<div class="pc-container">
	    <div class="pcoded-content">

	        <!-- [ breadcrumb ] start -->
	        <!-- <div class="page-header">
	            <div class="page-block">
	                <div class="row align-items-center">
	                    <div class="col-md-12">
	                        <div class="page-header-title">
	                            <h5 class="m-b-10">Dashboard</h5>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div> -->
	        <!-- [ breadcrumb ] end -->