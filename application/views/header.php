<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quick Count | <?=$header?></title>
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
    <link rel="icon" href="<?php echo base_url()?>assets/images/icon.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
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
			<img width="50px" src="<?php echo base_url()?>assets/images/icon.png" alt="" class="logo logo-lg">
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

	<?php 
		$uri  = $this->uri->segment('1');
		$user = encrypt_url($admin->id_admin); 
		if ($admin->level == 1) { $level = 'Administrator'; } else { $level = 'Calon'; }
		// print_r($admin);

		//greeting
		$hour      = date('H');
		if ($hour >= 20 || $hour >= 00 && $hour < 03) {
		    $greetings = "Selamat Malam";
		} elseif ($hour >= 17 && $hour < 20) {
		   $greetings = "Selamat Sore";
		} elseif ($hour >= 12 && $hour < 17) {
		    $greetings = "Selamat Siang";
		} elseif ($hour >= 03 && $hour < 12) {
		   $greetings = "Selamat Pagi";
		}
		// echo $greetings;
	?>
	<!-- [ navigation menu ] start -->
	<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="<?php echo base_url()?>dashboard/<?php echo md5('home').'_'.$user?>" class="b-brand">
					<!-- ========   change your logo hear   ============ -->
					<img width="140px" src="<?php echo base_url()?>assets/images/display.png" alt="" class="logo logo-lg">
					<!-- <img src="<?php echo base_url()?>assets/images/logo-sm.svg" alt="" class="logo logo-sm"> -->
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					<li class="pc-item pc-caption">
						<label>MENU</label>

					</li>
					<li class="pc-item pc-hasmenu <?php if($uri == 'dashboard') { echo 'active'; } ?>">
						<a href="<?php echo base_url()?>dashboard/<?php echo md5('home').'_'.$user?>" class="pc-link">
							<span class="pc-micon"><i data-feather="home"></i></span>
							<span class="pc-mtext">
								Dashboard
							</span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu <?php if($uri == 'paslon') { echo 'active'; } ?>">
						<a href="<?php echo base_url()?>paslon/<?php echo md5('paslon').'_'.$user?>" class="pc-link">
							<span class="pc-micon"><i data-feather="users"></i></span>
							<span class="pc-mtext">
								Calon
							</span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu <?php if($uri == 'relawan') { echo 'active'; } ?>">
						<a href="<?php echo base_url()?>relawan/<?php echo md5('relawan').'_'.$user?>" class="pc-link "><span class="pc-micon"><i data-feather="user-check"></i></span>
							<span class="pc-mtext">
								Relawan
							</span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu <?php if($uri == 'laporan-tps') { echo 'active'; } ?>">
						<a href="<?php echo base_url()?>laporan-tps/<?php echo md5('tps').'_'.$user?>" class="pc-link "><span class="pc-micon"><i data-feather="clipboard"></i></span>
							<span class="pc-mtext">
								Laporan TPS
							</span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu <?php if($uri == 'laporan-real') { echo 'active'; } ?>">
						<a href="<?php echo base_url()?>laporan-real/<?php echo md5('laporan').'_'.$user?>" class="pc-link "><span class="pc-micon"><i data-feather="clipboard"></i></span>
							<span class="pc-mtext">
								Laporan Real
							</span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu <?php if($uri == 'laporan-akhir') { echo 'active'; } ?>">
						<a href="<?php echo base_url()?>laporan-akhir/<?php echo md5('akhir').'_'.$user?>" class="pc-link "><span class="pc-micon"><i data-feather="clipboard"></i></span>
							<span class="pc-mtext">
								Laporan Akhir
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
						<h4 class="pc-head-link m-b-10"><?=$header?></h4>
					</li>
				</ul>
			</div>
			<div class="ml-auto">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="<?php echo base_url()?>assets/images/admin/<?=$admin->admin_foto?>" alt="user-image" class="user-avtar">
							<span>
								<span class="user-name"><?=$admin->nama_admin?></span>
								<span class="user-desc"><?=$level?></span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
							<div class=" dropdown-header">
								<h6 class="text-overflow m-0"><?=$greetings?>, <?=$admin->nama_admin?></h6>
							</div>
							<a href="#!" class="dropdown-item">
								<i data-feather="user"></i>
								<span>Profile</span>
							</a>
							<a href="javascript:void(0)" class="dropdown-item" onclick="logout()">
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