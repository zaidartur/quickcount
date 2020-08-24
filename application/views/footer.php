        </div>
    </div>
    <!-- [ Main Content ] end -->


    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->


    <!-- Required Js -->
    <script src="<?php echo base_url()?>assets/js/vendor-all.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/feather.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/pcoded.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/clipboard.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/uikit.min.js"></script>

    <script src="<?php echo base_url()?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/dataTables.bootstrap4.min.js"></script>

    <!-- chartjs js -->
    <script src="<?php echo base_url()?>assets/js/plugins/Chart.min.js"></script>
    <!-- <script src="<?php echo base_url()?>assets/js/pages/chart-chart-custom.js"></script> -->

    <!-- notification Js -->
    <script src="<?php echo base_url()?>assets/js/plugins/bootstrap-notify.min.js"></script>

    <!-- Apex Chart -->
    <script src="<?php echo base_url()?>assets/js/plugins/apexcharts.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/pages/todo.js"></script>

    <script src="<?php echo base_url()?>assets/js/plugins/jquery.bootstrap.wizard.min.js"></script>

    <!-- sweet alert Js -->
    <script src="<?php echo base_url()?>assets/js/plugins/sweetalert.min.js"></script>

    <script>

        $(document).ready(function() {

            if(localStorage.getItem('Status') == 'sukses') {
                // notify('Data berhasil dihapus', 'Sukses');
                swal("Poof! Data berhasil dihapus!", {icon: "success"});
                localStorage.clear();
            } else if(localStorage.getItem('Status') == 'verified') {
                notify('Data berhasil disimpan', 'Sukses');
            }

            //input wizard for user
            $('#progresswizard').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last',
                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $percent = ($current / $total) * 100;
                    $('#progresswizard .progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            //edit wizard for user
            $('#progresswizard2').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last',
                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $percent = ($current / $total) * 100;
                    $('#progresswizard2 .progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            //chart-dashboard
            floatchart();

        });

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


        $('#user-list-table').DataTable();

        function logout() {
            window.location.href = '<?php echo base_url() ?>';
        }
        
    </script>

    <!-- floating button -->
    <div class="pct-customizer">
        <div href="#!" class="pct-c-btn">
            <button class="btn btn-light-danger" id="pct-toggler" data-toggle="tooltip" title="Setting" data-placement="left">
                <i data-feather="settings"></i>
            </button>
            <button class="btn btn-light-primary" data-toggle="tooltip" title="Info" data-placement="left">
                <i data-feather="info"></i>
            </button>
        </div>
        <div class="pct-c-content ">
            <div class="pct-header bg-primary">
                <h5 class="mb-0 text-white f-w-500">Tampilan Sidebar & Header</h5>
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
    <!-- end of floating button -->

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

    <!-- custom-chart js -->
    <!-- <script src="<?php echo base_url()?>assets/js/pages/dashboard-main.js"></script> -->

</body>

</html>
