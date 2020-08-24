            <!-- [ Main Content ] start -->
            <div class="row">
        
                <?php foreach ($tps as $t => $p) { ?>
                <div class="col-md-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>TPS <?=$p->no_tps?> ( <i class="feather icon-user-check"></i> <?=$p->nama_user?> )</h5>
                            <i class="feather icon-map-pin"></i> <?=$p->alamat_tps?>
                            <div class="card-header-left">
                            </div>
                            <div class="card-header-right">
                                <i class="icofont icofont-spinner-alt-5"></i>
                            </div>
                        </div>
                        <div class="card-body w-100">
                            <?php
                                $dpt   = intval($p->dpt_tps);
                                $this->db->join('calon b', 'a.calon_id = b.id_calon', 'left');
                                $this->db->where('a.user_id', $p->id_user);
                                $suara = $this->db->get('hasil_tps a')->result(); 

                                if (count($suara) > 0) {
                                    foreach ($suara as $s => $u) {
                                        $vote[$s] = intval($u->jumlah_suara);
                                    }
                                    $hitung = (array_sum($vote) / $dpt) * 100;     
                                } else {
                                    $hitung = 0;
                                }
                                
                                $persen = number_format((float)$hitung, 2, '.', '');
                                // print_r($suara); 

                                // echo array_sum($vote).'/'.$dpt.'-'.$p->id_user;
                            ?>
                            <span>Suara Masuk</span>
                            <h2 class="f-40 m-b-20"><?=$persen?>% </h2>

                            <?php 
                                foreach ($suara as $a => $b) { 
                                    if (array_sum($vote) == 0) {
                                        $jml_suara = 0;
                                    } else {
                                        if (!empty($b->jumlah_suara) || $b->jumlah_suara != 0 || $b->jumlah_suara != '0') {
                                            $jml_suara = intval($b->jumlah_suara) / array_sum($vote) * 100;    
                                        } else {
                                            $jml_suara = 0;
                                        }    
                                    }
                                    
                                    
                                    $pr_calon  = number_format((float)$jml_suara, 2, '.', '');
                                    // echo $b->jumlah_suara.'/'.array_sum($vote);
                            ?>

                            <div class="card-progress p-t-10">
                                <div class="row ">
                                    <div class="col-sm-2 text-right ">
                                        <label class="text-muted "><?=$b->nama_calon?></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="progress">
                                            <div class="progress-bar" style="width:<?=$pr_calon?>%; background-color: <?=$b->color_badge?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <label class="text-muted "><?=$pr_calon?>%</label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
                }
                    // print_r($suara); 
                ?>

            </div>
            <!-- [ Main Content ] end -->