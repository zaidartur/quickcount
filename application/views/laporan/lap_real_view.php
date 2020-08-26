            <!-- [ Main Content ] start -->
            <div class="row">
        
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Akhir</h5>
                        </div>
                        <div class="card-body">
                            <?php 
                                $terhitung = count($tps) - count($data_akhir);
                                foreach ($tps as $t => $p) {
                                    $dpt[$t]    = intval($p->dpt_tps);
                                }

                                if (!empty($data_akhir)) {
                                    foreach ($data_akhir as $d => $a) {
                                        $sah2[$d]    = intval($a->suara_sah);
                                        $rusak2[$d]  = intval($a->suara_tidak_sah);
                                        $kosong2[$d] = intval($a->suara_golput);
                                        $dpt2[$d]    = intval($a->dpt_tps);
                                    }
                                    $sah    = array_sum($sah2);
                                    $rusak  = array_sum($rusak2);
                                    $kosong = array_sum($kosong2);
                                    $dpts    = array_sum($dpt2);
                                    $suara_masuk     = $sah + $rusak + $kosong;    
                                } else {
                                    $sah    = 0;
                                    $rusak  = 0;
                                    $kosong = 0;
                                    $dpts    = 0;
                                    $suara_masuk = 0;
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-2 col-sm-2" style="text-align: center;">
                                    <p class="text-muted">TPS Selesai</p>
                                    <h3 class="f-w-400"><?php echo count($data_akhir).' dari '.count($tps); ?></h3>
                                </div>
                                <div class="col-md-8 col-sm-8" style="text-align: center;">
                                    <h5>
                                        Total Suara Masuk 
                                        <span class="badge badge-success"><?=$suara_masuk?></span> 
                                        dari 
                                        <span class="badge badge-success"><?=array_sum($dpt)?></span> 
                                        Jumlah DPT
                                    </h5>
                                    <hr class="wid-80 b-wid-3 my-4" style="width: 100%">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <p class="text-muted">Suara Sah</p>
                                            <h3 class="f-w-400"><?=$sah?></h3>      
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <p class="text-muted">Suara Tidak Sah / Rusak</p>
                                            <h3 class="f-w-400"><?=$rusak?></h3>      
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <p class="text-muted">Suara Kosong / Golput</p>
                                            <h3 class="f-w-400"><?=$kosong?></h3>      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2" style="text-align: center;">
                                    <p class="text-muted">Tidak Ikut Memilih</p>
                                    <h3 class="f-w-400"><?php echo $dpts - $suara_masuk; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header -->

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Detail TPS</h5>
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <table id="data-akhir" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th width="3">#</th>
                                            <th width="10">No TPS</th>
                                            <th>Alamat</th>
                                            <th>Relawan</th>
                                            <th width="10">Jumlah DPT</th>
                                            <th width="10">Suara Masuk</th>
                                            <th class="bg-info" width="10">Suara Sah</th>
                                            <th class="bg-info" width="10">Suara Rusak</th>
                                            <th class="bg-info" width="10">Suara Kosong</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($data_akhir as $x => $y) { 
                                                $masuk = intval($y->suara_sah) + intval($y->suara_tidak_sah) + intval($y->suara_golput);
                                        ?>
                                        <tr>
                                            <td><?=$x+1?></td>
                                            <td><?=$y->no_tps?></td>
                                            <td><?=$y->alamat_tps?></td>
                                            <td><?=$y->nama_user?></td>
                                            <td><?=$y->dpt_tps?></td>
                                            <td><?=$masuk?></td>
                                            <td class="bg-info"><?=$y->suara_sah?></td>
                                            <td class="bg-info"><?=$y->suara_tidak_sah?></td>
                                            <td class="bg-info"><?=$y->suara_golput?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th colspan="3">Jumlah</th>
                                            <th><?=$dpts?></th>
                                            <th><?php echo $suara_masuk; ?></th>
                                            <th class="bg-info"><?=$sah?></th>
                                            <th class="bg-info"><?=$rusak?></th>
                                            <th class="bg-info"><?=$kosong?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <label>&nbsp;</label>
                            <div class="alert alert-info" role="alert">
                                Suara Masuk adalah akumulasi dari Suara Sah, Suara Rusak, dan Suara Kosong.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- [ Main Content ] end -->