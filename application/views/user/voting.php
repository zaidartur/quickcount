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
    <link rel="icon" href="<?=base_url()?>assets/images/icon.png" type="image/x-icon">

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
				<img width="50px" src="<?=base_url()?>assets/images/icon.png" alt="" class="logo logo-lg">
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
							<img width="50px" src="<?=base_url()?>assets/images/icon.png" alt="" class="logo logo-lg">
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
									<!-- <a href="#!" class="dropdown-item">
										<i data-feather="user"></i>
										<span>My Account</span>
									</a> -->
									<a href="javascript:void(0)" class="dropdown-item" onclick="logout()">
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
								$terhitung[$c]= $angka;
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

				<hr class="wid-80 b-wid-3 my-4" style="width: 100%">

				<div class="col-md-12 col-xl-12">
	                <div class="card app-design">
	                    <div class="card-body">
	                        <!-- <button class="btn btn-primary float-right">Completed</button> -->
	                        <h3 class="f-w-400 text-muted">Data Akhir TPS</h3>
	                        <div class="alert alert-info" role="alert">
	                        	Diisi setelah penghitungan hasil suara selesai.
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-4">
	                        		<p class="text-muted"><i class="feather icon-info"></i> No TPS : <?=$user->no_tps?></p>	
	                        	</div>
	                        	<div class="col-sm-8">
	                        		<p class="text-muted"><i class="feather icon-user-check"></i> Relawan : <?=$user->nama_user?></p>	
	                        	</div>
	                        </div>
	                        <p class="text-muted"><i class="feather icon-map-pin"></i> Alamat TPS : <?=$user->alamat_tps?></p>
	                        <div class="design-description d-inline-block m-r-40">
	                            <h3 class="f-w-400" style="text-align: center;"><?=$user->dpt_tps?></h3>
	                            <p class="text-muted" style="text-align: center;">DPT</p>
	                        </div>
	                        <div class="design-description d-inline-block">
	                            <h3 class="f-w-400" style="text-align: center;"><?php echo array_sum($terhitung); ?></h3>
	                            <p class="text-muted" style="text-align: center;">Terhitung</p>
	                        </div>
	                        <div class="team-box p-b-20">
	                           
	                        </div>
	                        <div class="card text-white bg-success">
	                        	<div class="card-header">
	                        		<i class="fas fa-vote-yea"></i> Suara Masuk
	                        	</div>	           
	                        	<div class="card-body">
	                        		<div class="col-sm-12">
	                        			<?php
	                        				$suara2 = $this->db->get_where($tps, array('user_id' => $user->id_user))->result();
	                        				foreach ($suara2 as $key => $value) {
	                        					# code...
	                        				}

	                        				//get-data-akhir
	                        				if($user->suara_sah == null || empty($user->suara_sah) || $user->suara_sah == '0') {
	                        					$sah = 0;
	                        				} else {
	                        					$sah = $user->suara_sah;
	                        				}

	                        				if($user->suara_tidak_sah == null || empty($user->suara_tidak_sah) || $user->suara_tidak_sah == '0') {
	                        					$rusak = 0;
	                        				} else {
	                        					$rusak = $user->suara_tidak_sah;
	                        				}

	                        				if($user->suara_golput == null || empty($user->suara_golput) || $user->suara_golput == '0') {
	                        					$kosong = 0;
	                        				} else {
	                        					$kosong = $user->suara_golput;
	                        				}
	                        			?>
	                        			<form action="<?=base_url()?>voting/data-akhir/<?=encrypt_url($user->id_user)?>" method="post">
		                        			<div class="row">
				                        		<div class="col-sm-3">
				                        			<label for="sah"><i class="fas fa-check-circle"></i> Suara Sah</label>
				                                    <input type="number" class="form-control" id="sah" name="sah" placeholder="Suara Sah" value="<?=$sah?>">
				                                    &nbsp;
				                                </div>
				                                <div class="col-sm-3">
				                                	<label for="rusak"><i class="fas fa-times-circle"></i> Suara Rusak</label>
				                                    <input type="number" class="form-control" id="rusak" name="rusak" placeholder="Suara Rusak" value="<?=$rusak?>">
				                                    &nbsp;
				                                </div>
				                                <div class="col-sm-3">
				                                	<label for="kosong"><i class="fas fa-times-circle"></i> Suara Kosong</label>
				                                    <input type="number" class="form-control" id="kosong" name="kosong" placeholder="Suara Kosong" value="<?=$kosong?>">
				                                    &nbsp;
				                                </div>
				                                
				                                <div class="col-sm-3" style="vertical-align: middle;">
				                                	<h4>&nbsp;</h4>
				                                	<button type="submit" class="btn btn-md btn-primary col-sm-3" title="Simpan">
				                                		<i class="feather icon-save"></i>
				                                	</button>
				                                </div>
			                            	</div>
			                            </form>
			                        </div>
	                        	</div>                 
	                        </div>
	                    </div>
	                </div>
	            </div>
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
    <!-- notification Js -->
    <script src="<?php echo base_url()?>assets/js/plugins/bootstrap-notify.min.js"></script>


    <script>

    	function notify(message, title, icon, type) {
            $.notify({
                icon: icon,
                title: title,
                message: message
            }, {
                element: 'body',
                type: type,
                allow_dismiss: true,
                placement: {
                    from: 'top',
                    align: 'right'
                },
                delay: 2500,
                timer: 1000,
                spacing: 10,
                z_index: 999999,
                mouse_over: false,
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated bounceOut'
                },
                offset: {
                    x: 30,
                    y: 30
                },
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                            '<span data-notify="icon"></span> ' +
                            '<b><span data-notify="title">{1}</span></b> <br>' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            '</div>' +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
            });
        };



        <?php if($this->session->flashdata('sukses')) { ?>

            $(window).on('load', function() {
                notify('Data berhasil disimpan', 'Sukses', 'feather icon-check-circle', 'success');
            });

        <?php } else if($this->session->flashdata('update')) { ?>

            $(window).on('load', function() {
                notify('Data berhasil diupdate', 'Sukses', 'feather icon-check-circle', 'success');
            });

        <?php } else if($this->session->flashdata('error')) { ?>

            $(window).on('load', function() {
                notify('Terjadi kesalahan', 'Error', 'feather icon-x-circle', 'danger');
            });

        <?php } ?>

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

    	function logout() {
            window.location.href = '<?php echo base_url() ?>user-login';
        }
    </script>

</body>

</html>
