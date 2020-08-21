            <!-- [ Main Content ] start -->
            <div class="row justify-content-center">
        
                <div class="col-sm-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h5>Data </h5>
                        </div> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <h5>Data Pasangan Calon</h5>    
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah-calon" data-backdrop="static" data-keyboard="false"><i class="feather icon-plus"></i>Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- progressbar static data end -->

                <?php  
                    foreach ($calon as $c => $a) {
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card user-card user-card-1 mt-4">
                            <div class="card-header border-0 p-2 pb-0">
                                <div class="cover-img-block" style="position: center; background-repeat: no-repeat; background-size: cover; width: 500px; height: 250px">
                                    <img src="<?=base_url()?>assets/images/calon/<?=$a->image_calon?>" alt="" class="img-responsive" style="position: block; background-repeat: no-repeat; background-size: cover; width: 490px; height: 250px;">
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="user-about-block text-center">
                                    <div class="row align-items-end">
                                        <div class="col text-left pb-3">
                                            <span class="badge badge-success"></span>
                                        </div>
                                        <div class="col">
                                            <div class="">
                                                <img class="img-radius img-fluid wid-80" src="<?=base_url()?>assets/images/calon/<?=$a->image_calon?>" alt="User image" style="position: block; background-repeat: no-repeat; background-size: cover; width: 80px; height: 80px;">
                                            </div>
                                        </div>
                                        <div class="col text-right pb-3">
                                            <div class="dropdown">
                                                <a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="edit_calon()">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="hapus_calon()">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="#!" data-toggle="modal" data-target="#modal-report">
                                        <h4 class="mb-1 mt-3"><?=$a->nama_calon?></h4>
                                    </a>
                                    <p class="mb-3 text-muted"><i class="feather icon-map-pin"> </i> <?=$a->alamat_calon?></p>
                                    <p class="mb-1"><b>Email : </b><a href="mailto:<?=$a->email_calon?>"><?=$a->email_calon?></a></p>
                                    <p class="mb-0"><b>No Urut : </b><?=$a->no_urut_calon?> <span class="badge badge-warning"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                

                <!-- [ modal-calon-add ] start -->
                <div id="tambah-calon" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambah-calon" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Input Data Calon</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form id="form-tambah-calon" method="post" action="<?=base_url()?>simpan-calon/<?=encrypt_url($admin->id_admin)?>" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="form-group row">
                                        <label for="no_urut" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="no_urut" name="no_urut" placeholder="No Urut" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <!-- <input type="email" class="form-control" id="email" name="email" placeholder="Email"> -->
                                            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Gambar Profile</label>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
                                                <label class="custom-file-label" for="inputGroupFile01">Pilih gambar (JPG, JPEG, PNG, maks. 1 Mb)</label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> 
                                    <button type="submit" class="btn  btn-primary" onclick="hello()">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- [ modal-calon-add ] end -->


            </div>
            <!-- [ Main Content ] end -->

            <script>
                function edit_calon() {
                    alert('wait');
                }

                function hapus_calon() {
                    alert('wait');
                }
            </script>