<!DOCTYPE html>
<html lang="en">

<head>

	<title>User / Relawan</title>
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
	<!-- <meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" /> -->

	<!-- Favicon icon -->
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/clock.svg" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/animate.min.css">

	<!-- font css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awsome-pro/css/pro.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/feather.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fontawesome.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/customizer.css">

    <style type="text/css">
        .aut-bg-img2 {
            background-image: url("<?php echo base_url(); ?>assets/images/img-auth-big.jpg");
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
    </style>

</head>

<!-- [ signin-img ] start -->
<div class="auth-wrapper align-items-stretch aut-bg-img2">
	<div class="flex-grow-1">
		<div class="h-100 d-md-flex align-items-end auth-side-img">
			<div class="col-sm-10 auth-content w-auto">
				<img src="<?php echo base_url(); ?>assets/images/clock.svg" alt="" class="img-fluid">
				<h1 class="text-white my-4">Welcome Back!</h1>
				<h4 class="text-white font-weight-normal">Signin to your account and let's start live voting.<br />Do not forget to carefully.</h4>
			</div>
		</div>
		<div class="auth-side-form">
			<div class=" auth-content">
				<img src="<?php echo base_url(); ?>assets/images/auth-logo-dark.svg" alt="" class="img-fluid mb-4 d-block d-xl-none d-lg-none">
				<h3 class="mb-4 f-w-400">Signin User</h3>
                <form action="<?php echo base_url(); ?>auth-user" method="post">
    				<div class="input-group mb-3">
    					<div class="input-group-prepend">
    						<span class="input-group-text"><i data-feather="user"></i></span>
    					</div>
    					<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
    				</div>
    				<div class="input-group mb-4">
    					<div class="input-group-prepend">
    						<span class="input-group-text"><i data-feather="lock"></i></span>
    					</div>
    					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    				</div>
    				
    				<button class="btn btn-block btn-primary mb-0">Signin</button>
                </form>
			</div>
		</div>
	</div>
</div>
<!-- [ signin-img ] end -->

<!-- Required Js -->
<script src="<?php echo base_url(); ?>assets/js/vendor-all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/feather.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pcoded.min.js"></script>

<!-- notification Js -->
<script src="<?php echo base_url()?>assets/js/plugins/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url()?>assets/js/pages/ac-notification.js"></script>

<!-- sweet alert Js -->
<script src="<?php echo base_url()?>assets/js/plugins/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/pages/ac-alert.js"></script>

<div class="pct-customizer">
    <div href="#!" class="pct-c-btn">
        <button class="btn btn-light-danger" id="pct-toggler">
            <i data-feather="settings"></i>
        </button>
        <button class="btn btn-light-primary" data-toggle="tooltip" title="Document" data-placement="left">
            <i data-feather="book"></i>
        </button>
        <button class="btn btn-light-success" data-toggle="tooltip" title="Buy Now" data-placement="left">
            <i data-feather="shopping-bag"></i>
        </button>
        <button class="btn btn-light-info" data-toggle="tooltip" title="Support" data-placement="left">
            <i data-feather="headphones"></i>
        </button>
    </div>
    <div class="pct-c-content ">
        <div class="pct-header bg-primary">
            <h5 class="mb-0 text-white f-w-500">Nextro Customizer</h5>
        </div>
        <div class="pct-body">
            <h6 class="mt-2"><i data-feather="credit-card" class="mr-2"></i>Header settings</h6>
            <hr class="my-2">
            <div class="theme-color header-color">
                <a href="#!" class="" data-value="bg-default"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-primary"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-danger"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-warning"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-info"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-success"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-dark"><span></span><span></span></a>
            </div>
            <h6 class="mt-4"><i data-feather="layout" class="mr-2"></i>Sidebar settings</h6>
            <hr class="my-2">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="cust-sidebar">
                <label class="custom-control-label f-w-600 pl-1" for="cust-sidebar">Light Sidebar</label>
            </div>
            <div class="custom-control custom-switch mt-2">
                <input type="checkbox" class="custom-control-input" id="cust-sidebrand">
                <label class="custom-control-label f-w-600 pl-1" for="cust-sidebrand">Color Brand</label>
            </div>
            <div class="theme-color brand-color d-none">
                <a href="#!" class="active" data-value="bg-primary"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-danger"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-warning"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-info"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-success"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-dark"><span></span><span></span></a>
            </div>
        </div>
    </div>
</div>
<script>
    // header option
    $('#pct-toggler').on('click', function() {
        $('.pct-customizer').toggleClass('active');

    });
    // header option
    $('#cust-sidebrand').change(function() {
        if ($(this).is(":checked")) {
            $('.theme-color.brand-color').removeClass('d-none');
            $('.m-header').addClass('bg-dark');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
            $('.theme-color.brand-color').addClass('d-none');
        }
    });
    // Header Color
    $('.brand-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        // $('.header-color > a').removeClass('active');
        // $('.pcoded-header').removeClassPrefix('brand-');
        // $(this).addClass('active');
        if (temp == "bg-default") {
            $('.m-header').removeClassPrefix('bg-');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
            $('.m-header').addClass(temp);
        }
    });
    // Header Color
    $('.header-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        // $('.header-color > a').removeClass('active');
        // $('.pcoded-header').removeClassPrefix('brand-');
        // $(this).addClass('active');
        if (temp == "bg-default") {
            $('.pc-header').removeClassPrefix('bg-');
        } else {
            $('.pc-header').removeClassPrefix('bg-');
            $('.pc-header').addClass(temp);
        }
    });
    // sidebar option
    $('#cust-sidebar').change(function() {
        if ($(this).is(":checked")) {
            $('.pc-sidebar').addClass('light-sidebar');
            $('.pc-horizontal .topbar').addClass('light-sidebar');
            // $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
        } else {
            $('.pc-sidebar').removeClass('light-sidebar');
            $('.pc-horizontal .topbar').removeClass('light-sidebar');
            // $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
        }
    });
    $.fn.removeClassPrefix = function(prefix) {
        this.each(function(i, it) {
            var classes = it.className.split(" ").map(function(item) {
                return item.indexOf(prefix) === 0 ? "" : item;
            });
            it.className = classes.join(" ");
        });
        return this;
    };
</script>


</body>

</html>
