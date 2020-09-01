            <body onload="AutoRefresh(5000);">
            <!-- [ Main Content ] start -->
            <div id="screen" style="padding: 25px; background-color: #F0F2F8">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <!-- visitors  start -->
                            <?php 
                                foreach ($voting as $key => $value) { 
                                    $width = 90 / count($voting);
                            ?>

                            <div class="" style="width: <?=$width?>%">
                                <div class="card text-white widget-visitor-card" style="background-color: <?=$value->color_badge?>">
                                    <div class="card-body text-center">
                                        <h2 class="text-white" id="suara<?=$key?>"><?=$value->vote.' suara'?></h2>
                                        <h6 class="text-white"><?='No Urut '.$value->no_urut_calon.' '.$value->nama_calon?></h6>
                                        <i class="feather icon-users"></i>
                                        <!-- <img class="feather" width="50px" height="50px" src="<?php echo base_url()?>assets/images/calon/<?=$value->image_calon?>"> -->
                                    </div>
                                </div>
                            </div><div><h1>&nbsp;</h1></div>
                            <?php } ?> 
                            <!-- visitors  end -->
                        </div>
                    </div> 

                    <!-- progressbar static data start -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Penghitungan Langusung di Lapangan &nbsp; 
                                    <button type="button" id="toggle_fullscreen" class="btn btn-sm btn-icon btn-outline-info" title="Full Screen">
                                        <i id="ikon" class="feather icon-maximize-2"></i>
                                    </button>
                                </h5>
                            </div>
                            <div class="card-body pl-0 pb-0" id="vote" style="background-color: white">
                                <div id="voting-chart" style="height: 600px; background-color: white"></div>
                            </div>
                        </div>
                    </div>
                    <!-- progressbar static data end -->
                </div>
                <!-- [ Main Content ] end -->
            </div>

            <script>
                var color = [];
                var nama  = [];

                function getData() {
                    $.ajax({
                        url: '<?php echo base_url() ?>menu/grafik',
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(data){
                            color.length = 0;
                            nama.length = 0;
                            floatchart(data);

                            for (var i = 0; i < data.length; i++) {
                                $('#suara' + i).text(data[i].voting + ' suara');
                            }
                            // alert(data[0].nama);
                        },
                        error: function(data) {
                            toastr.error('Upss, sepertinya ada yang salah');
                        }
                    });
                }

                function AutoRefresh(time) {
                    setInterval("getData();", time);
                }

                //random color for chart
                function getRandomColor() {
                    var letters = '0123456789ABCDEF';
                    var color = '#';
                    for (var i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }

                function setRandomColor() {
                    $("#colorpad").css("background-color", getRandomColor());
                }
                
                function floatchart(data) {
                    // var color = [clrs];
                    // alert(clrs);
                    for (var x = 0; x < data.length; x++) { 
                        // clrs = data[x].color_badge + ', ';
                        color.push(
                            data[x].color, 
                        );
                        // nama = 'name:' + data[x].nama + ', data:[' + data[x].voting + ']';
                        nama.push({
                            name: data[x].nama,
                            data: [data[x].voting]
                        });
                    }
                    $(function() {
                        var options = {
                            chart: {
                                height: 550,
                                type: 'bar',
                                toolbar: {
                                    show: true
                                },
                                animations: {
                                    enabled: false,
                                    easing: 'easeinout',
                                    speed: 800,
                                    animateGradually: {
                                        enabled: true,
                                        delay: 150
                                    },
                                    dynamicAnimation: {
                                        enabled: true,
                                        speed: 350
                                    }
                                },
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '30%'
                                },
                            },
                            dataLabels: {
                                enabled: false
                            },
                            

                            colors: color,
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ['transparent']
                            },
                            series: nama,
                            xaxis: {
                                categories: ['Quick Count'],
                            },
                            fill: {
                                opacity: 1
                            },
                            tooltip: {
                                enabled: true,
                                shared: true,
                                followCursor: true,
                                intersect: false,
                                y: {
                                    formatter: function(val) {
                                        return val + " suara"
                                    }
                                }
                            },
                            legend: {
                                labels: {
                                    useSeriesColors: true
                                },
                                markers: {
                                    customHTML: [
                                        function() {
                                            return ''
                                        },
                                        function() {
                                            return ''
                                        }
                                    ]
                                }
                            }
                        }
                        $('#voting-chart').remove(); // this is my <canvas> element
                        $('#vote').append('<div id="voting-chart" style="height: 600px; background-color: white"><div>');
                        var chart = new ApexCharts(document.querySelector("#voting-chart"), options);
                        chart.render();
                    });
                }

                function firstchart() {
                    $(function() {
                        var options = {
                            chart: {
                                height: 550,
                                type: 'bar',
                                toolbar: {
                                    show: true
                                },
                                // animations: {
                                //     enabled: true,
                                //     easing: 'easeinout',
                                //     speed: 800,
                                //     animateGradually: {
                                //         enabled: true,
                                //         delay: 150
                                //     },
                                //     dynamicAnimation: {
                                //         enabled: true,
                                //         speed: 350
                                //     }
                                // },
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '30%'
                                },
                            },
                            dataLabels: {
                                enabled: false
                            },
                            

                            colors: [
                                <?php
                                    foreach ($voting as $v => $ot) {
                                        echo '"'.$ot->color_badge.'", ';
                                    }
                                ?>
                            ],
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ['transparent']
                            },
                            series: [
                                <?php
                                    foreach ($voting as $v => $ot) {
                                        echo '{ 
                                            name: "'.$ot->no_urut_calon.' '.$ot->nama_calon.'", 
                                            data: ['.$ot->vote.'] 
                                        }, ';
                                    }
                                ?>
                            ],
                            xaxis: {
                                categories: ['Quick Count'],
                            },
                            fill: {
                                opacity: 1
                            },
                            tooltip: {
                                enabled: true,
                                shared: true,
                                followCursor: true,
                                intersect: false,
                                y: {
                                    formatter: function(val) {
                                        return val + " suara"
                                    }
                                },
                            },
                            legend: {
                                labels: {
                                    useSeriesColors: true
                                },
                                markers: {
                                    customHTML: [
                                        function() {
                                            return ''
                                        },
                                        function() {
                                            return ''
                                        }
                                    ]
                                }
                            }
                        }
                        $('#voting-chart').remove(); // this is my <canvas> element
                        $('#vote').append('<div id="voting-chart" style="height: 600px"><div>');
                        var chart = new ApexCharts(document.querySelector("#voting-chart"), options);
                        chart.render();
                    });
                }
            </script>