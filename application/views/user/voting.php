<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quickcount | Live</title>
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

    <!-- Favicon icon -->
    <link rel="icon" href="<?=base_url()?>assets/images/clock.svg" type="image/x-icon">

    <!-- font css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/fonts/font-awsome-pro/css/pro.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/fonts/feather.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/fonts/fontawesome.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/customizer.css">

</head>

<?php 
	//greeting
	$hour      = date('H');
	if ($hour >= 20 && $hour <= 3) {
	    $greetings = "Selamat Malam";
	} elseif ($hour > 17) {
	   $greetings = "Selamat Sore";
	} elseif ($hour >= 12) {
	    $greetings = "Selamat Siang";
	} elseif ($hour > 3 && $hour < 12) {
	   $greetings = "Selamat Pagi";
	}
	// echo $greetings;
?>
<body class="pc-horizontal">
	<div class="container">
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
				<img src="<?=base_url()?>assets/images/clock.svg" alt="" class="logo logo-lg">
			</div>
			<div class="pcm-toolbar">
				<!-- <a href="#!" class="pc-head-link" id="headerdrp-collapse">
					<i data-feather="align-right"></i>
				</a> -->
				<a href="#!" class="pc-head-link" id="header-collapse">
					<i data-feather="more-vertical"></i>
				</a>
			</div>
		</div>
		<!-- [ Mobile header ] End -->
		<!-- [ Header ] start -->
		<header class="pc-header bg-dark ">
			<div class="container">
				<div class="header-wrapper">
					<div class="m-header">
						<a href="#" class="b-brand">
							<!-- ========   change your logo hear   ============ -->
							<img src="<?=base_url()?>assets/images/clock.svg" alt="" class="logo logo-lg">
						</a>
					</div>
					<div class="mr-auto pc-mob-drp">
						<ul class="list-unstyled">
							<li class="dropdown pc-h-item">
								<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
									Quick Count
								</a>
							</li>
						</ul>
					</div>
					<div class="ml-auto">
						<ul class="list-unstyled">							
							<li class="dropdown pc-h-item">
								<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
									<img src="<?=base_url()?>assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
									<span>
										<span class="user-name"><?=$greetings.', '.$user->nama_user?></span>
										<span class="user-desc"><?=$user->email_user?></span>
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
									<div class=" dropdown-header">
										<h6 class="text-overflow m-0"><?=$greetings?></h6>
									</div>
									<a href="#!" class="dropdown-item">
										<i data-feather="user"></i>
										<span>My Account</span>
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
			</div>
		</header>
		<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="page-header-title">
                                <h4>Live Voting</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><h5>TPS <?=$user->no_tps?></h5></li>
                                <li class="breadcrumb-item"><?=$user->alamat_tps?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <?php 
            	// print_r($calon); 
            	$usr = encrypt_url($user->id_user);
            ?>

            <!-- [ Main Content ] start -->
            <div class="row">
                
                <?php foreach ($calon as $c => $l) { ?>
                <div class="col-xl-4 col-md-6">
	            	<div class="card user-card user-card-1">
						<div class="card-header border-0 p-2 pb-0">
							<div class="cover-img-block">
								<img src="<?=base_url()?>assets/images/img-auth-big.jpg" alt="" class="img-fluid">
							</div>
						</div>
						<div class="card-body pt-0">
							<div class="user-about-block text-center">
								<div class="row align-items-end">
									<div class="col text-left pb-3"></div>
									<div class="col">
										<div class="position-relative d-inline-block">
											<img class="img-radius img-fluid wid-80" src="<?=base_url()?>assets/images/calon/<?=$l->image_calon?>" alt="User image">
										</div>
									</div>
									<div class="col text-right pb-3"></div>
								</div>
							</div>
							<div class="text-center">
								<h4 class="mb-1 mt-3">
									<span class="badge" style="color: white; background-color: <?=$l->color_badge?>">
										<?=$l->no_urut_calon.'</span> '.$l->nama_calon?>
								</h4>
								<p class="mb-3 text-muted"><i class="feather icon-mail"> <?=$l->email_calon?></i></p>
							</div>
							<hr class="wid-80 b-wid-3 my-4" style="width: 100%">
							<?php 
								$suara = $this->db->get_where($tps, array('user_id' => $user->id_user, 'calon_id' => $l->id_calon))->row();
								if(empty($suara)) { 
									$angka = '0'; 
									$dis = 'disabled'; 
								} else { 
									$angka = $suara->jumlah_suara; 
									if($angka == '0') {
										$dis = 'disabled'; 
									} else {
										$dis = ''; 	
									}
								}
							?>
							<div class="row text-center">
								<div class="col">
									<button type="button" class="btn btn-lg btn-danger" <?=$dis?> onclick="kurang('<?=encrypt_url($l->id_calon)?>')"><i class="feather icon-minus"></i></button>
								</div>
								<div class="col">
									<h4 class="mb-1"><?=$angka?></h4>
									<p class="mb-0">Suara</p>
								</div>
								<div class="col">
									<button type="button" class="btn btn-lg btn-success" onclick="tambah('<?=encrypt_url($l->id_calon)?>')"><i class="feather icon-plus"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>

            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
</div>
  
    <!-- Required Js -->
    <script src="<?=base_url()?>assets/js/vendor-all.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/feather.min.js"></script>
    <script src="<?=base_url()?>assets/js/pcoded.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/clipboard.min.js"></script>
    <script src="<?=base_url()?>assets/js/uikit.min.js"></script>


    <script>
    	function kurang(id) {
    		$.ajax({
                url: '<?php echo base_url() ?>user/kurang/<?=$usr?>',
                type: 'POST',
                data: { calon: id},
                dataType: 'JSON',
                success: function(data){
                    if(data.response == 'sukses') {
                        // localStorage.setItem('Status', 'sukses');
                        location.reload();
                    }
                },
                error: function(data) {
                    toastr.error('Upss, sepertinya ada yang salah');
                }
            });
    	}

    	function tambah(id) {
    		$.ajax({
                url: '<?php echo base_url() ?>user/tambah/<?=$usr?>',
                type: 'POST',
                data: { calon: id},
                dataType: 'JSON',
                success: function(data){
                    if(data.response == 'sukses') {
                        // localStorage.setItem('Status', 'sukses');
                        location.reload();
                    }
                },
                error: function(data) {
                    toastr.error('Upss, sepertinya ada yang salah');
                }
            });		
    	}	
    </script>

</body>

</html>
