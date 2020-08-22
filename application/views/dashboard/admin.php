            <!-- [ Main Content ] start -->
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
                                    <h2 class="text-white"><?=$value->vote.' suara'?></h2>
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
                            <h5>Penghitungan Langusung di Lapangan</h5>
                        </div>
                        <div class="card-body pl-0 pb-0">
                            <div id="voting-chart" style="height: 600px"></div>
                        </div>
                    </div>
                </div>
                <!-- progressbar static data end -->
            </div>
            <!-- [ Main Content ] end -->

            <script>
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

                
                function floatchart() {
                    $(function() {
                        var options = {
                            chart: {
                                height: 550,
                                type: 'bar',
                                toolbar: {
                                    show: true
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
                            // colors: ["#c7d9ff","#7267EF"],
                            colors: [
                                <?php foreach ($voting as $o => $t) {
                                    echo '"'.$t->color_badge.'", ';
                                } ?>
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
                                shared: true,
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
                        var chart = new ApexCharts(document.querySelector("#voting-chart"), options);
                        chart.render();
                    });
                }
            </script>