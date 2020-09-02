            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <h5>Data Relawan</h5>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah-user" data-backdrop="static" data-keyboard="false"><i class="feather icon-plus"></i>Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-12">
                    <div class="card user-profile-list">
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <table id="user-list-table" class="table nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Username</th>
                                            <th>No TPS</th>
                                            <th>Alamat TPS</th>
                                            <th>DPT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($user as $u => $s) {
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="<?=base_url()?>assets/images/user/user.jpg" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                                    <div class="d-inline-block">
                                                        <h6 class="m-b-0"><?=$s->nama_user?></h6>
                                                        <p class="m-b-0"><?=$s->email_user?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?=$s->alamat_user?></td>
                                            <td data-toggle="tooltip" data-placement="left" data-original-title="Pass : <?=$s->password?>"><?=$s->username?></td>
                                            <td><?=$s->no_tps?></td>
                                            <td><?=$s->alamat_tps?></td>
                                            <td>
                                                <?=$s->dpt_tps?>
                                                <!-- <span class="badge badge-light-success">Active</span> -->
                                                <div class="overlay-edit">
                                                    <button type="button" class="btn btn-icon btn-success" title="Edit" onclick="edituser('<?=$s->id_user?>')"><i class="feather icon-edit"></i></button>
                                                    <button type="button" class="btn btn-icon btn-danger" title="Hapus" onclick="hapususer('<?=$s->id_user?>')"><i class="feather icon-trash-2"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Username</th>
                                            <th>No TPS</th>
                                            <th>Alamat TPS</th>
                                            <th>DPT</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- [ modal-user-add ] start -->
                <div id="tambah-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambah-user" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Input Data User / Relawan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form id="form-tambah-user" method="post" action="<?=base_url()?>simpan-user/<?=encrypt_url($admin->id_admin)?>" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="bt-wizard" id="progresswizard">
                                        <ul class="nav nav-pills nav-fill mb-3">
                                            <li class="nav-item"><a href="#progress-t-tab1" class="nav-link active" data-toggle="tab">Profile</a></li>
                                            <li class="nav-item"><a href="#progress-t-tab2" class="nav-link" data-toggle="tab">TPS</a></li>
                                            <li class="nav-item"><a href="#progress-t-tab3" class="nav-link" data-toggle="tab">Final</a></li>
                                        </ul>
                                        <div id="bar" class="bt-wizard progress mb-3" style="height:6px">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 33.3333%;"></div>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="progress-t-tab1">
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
                                                    <label for="user" class="col-sm-3 col-form-label">Username</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="user" name="user" placeholder="Username"  onchange="cek(this.value)" required><p id="checking"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="pass" class="col-sm-3 col-form-label">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="progress-t-tab2">
                                                <div class="form-group row">
                                                    <label for="tps" class="col-sm-3 col-form-label">No TPS</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="tps" name="tps" placeholder="No TPS" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="alamat_tps" class="col-sm-3 col-form-label">Alamat TPS</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" id="alamat_tps" name="alamat_tps" rows="3" spellcheck="false"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dpt" class="col-sm-3 col-form-label">Jumlah DPT</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" id="dpt" name="dpt" placeholder="Jumlah DPT" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="progress-t-tab3">
                                                <div class="text-center">
                                                    <i class="feather icon-check-circle display-3 text-success"></i>
                                                    <h5 class="mt-3">Registration Done! . .</h5>
                                                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="setuju" name="setuju" onclick="valid()">
                                                        <label class="custom-control-label" for="setuju">Saya menyetujui</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between btn-page">
                                                <div class="col-sm-6">
                                                    <a href="#!" class="btn btn-primary button-previous disabled">Previous</a>
                                                </div>
                                                <div class="col-sm-6 text-md-right">
                                                    <a href="#!" class="btn btn-primary button-next">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> 
                                    <button type="submit" class="btn  btn-primary" id="simpan" disabled>Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- [ modal-user-add ] end -->


                <!-- [ modal-user-edit ] start -->
                <div id="edit-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="edit-user" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Data User / Relawan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form id="form-edit-user" method="post" action="<?=base_url()?>update-user/<?=encrypt_url($admin->id_admin)?>" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="bt-wizard" id="progresswizard2">
                                        <ul class="nav nav-pills nav-fill mb-3">
                                            <li class="nav-item"><a href="#progress-t-tab4" class="nav-link active" data-toggle="tab">Profile</a></li>
                                            <li class="nav-item"><a href="#progress-t-tab5" class="nav-link" data-toggle="tab">TPS</a></li>
                                        </ul>
                                        <div id="bar" class="bt-wizard progress mb-3" style="height:6px">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="progress-t-tab4">
                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                    <div class="col-sm-9">
                                                        <input type="hidden" name="user-id" id="user-id">
                                                        <input type="text" class="form-control" id="nama2" name="nama2" placeholder="Nama Lengkap" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control" id="email2" name="email2" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="email" class="form-control" id="email" name="email" placeholder="Email"> -->
                                                        <textarea class="form-control" id="alamat2" name="alamat2" required></textarea>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group row">
                                                    <label for="user" class="col-sm-3 col-form-label">Username</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="user" name="user" placeholder="Username" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="pass" class="col-sm-3 col-form-label">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="tab-pane" id="progress-t-tab5">
                                                <div class="form-group row">
                                                    <label for="tps" class="col-sm-3 col-form-label">No TPS</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="tps2" name="tps2" placeholder="No TPS" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="alamat_tps" class="col-sm-3 col-form-label">Alamat TPS</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" id="alamat_tps2" name="alamat_tps2" rows="3" spellcheck="false"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dpt" class="col-sm-3 col-form-label">Jumlah DPT</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" id="dpt2" name="dpt2" placeholder="Jumlah DPT" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between btn-page">
                                                <div class="col-sm-6">
                                                    <a href="#!" class="btn btn-primary button-previous disabled">Previous</a>
                                                </div>
                                                <div class="col-sm-6 text-md-right">
                                                    <a href="#!" class="btn btn-primary button-next">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> 
                                    <button type="submit" class="btn  btn-primary" onclick="updateuser()">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- [ modal-user-edit ] end -->

            </div>
            <!-- [ Main Content ] end -->

            <script>
                function cek(user) {
                    var cek = $('#checking');
                    $.ajax({
                        url: '<?php echo base_url() ?>user/validateUser/' + user,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function(data){
                            if (data.response == 'kosong') {
                                // $('#checking').addClass('feather icon-check-circle');
                                cek.attr('style', 'color: green');
                                cek.html('<i class="feather icon-check-circle"></i> username aman');
                                $('#user').removeAttr('style');
                                $('#user').attr('style', 'border-color: green; color: green');
                            } else if (data.response == 'exist') {
                                // $('#checking').addClass('feather icon-x-circle');
                                cek.attr('style', 'color: red');
                                cek.html('<i class="feather icon-x-circle"></i> username sudah ada, mohon ganti yang lain');
                                $('#user').removeAttr('style');
                                $('#user').attr('style', 'border-color: red; color: red');
                            }
                        },
                        error: function(data) {
                            toastr.error('Upss, sepertinya ada yang salah');
                        }
                    });
                }

                function valid() {
                    var cek = $('#setuju');

                    if (cek.is(':checked')) {
                        $('#simpan').removeAttr('disabled');
                    } else {
                        $('#simpan').attr('disabled', '');
                    }
                }

                function hapususer(user) {
                    swal({
                        title: "Apakah Anda yakin?",
                        text: "Sekali dihapus, data tidak akan bisa dikembalikan lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '<?php echo base_url() ?>user/delete/' + user,
                                type: 'POST',
                                dataType: 'JSON',
                                success: function(data) {
                                    if(data.response == 'sukses') {
                                        localStorage.setItem('Status', 'sukses');
                                        location.reload();
                                    }
                                }
                            });
                        } else {
                            swal("Data Anda aman!", {
                                icon: "error",
                            });
                        }
                    });
                    
                }

                function edituser(user) {
                    $.ajax({
                        url: '<?php echo base_url() ?>user/detail/' + user,
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(data){
                            $('#form-edit-user')[0].reset();
                            $('#user-id').val(data.id_user);
                            $('#nama2').val(data.nama_user);
                            $('#email2').val(data.email_user);
                            $('#alamat2').val(data.alamat_user);
                            $('#tps2').val(data.no_tps);
                            $('#alamat_tps2').val(data.alamat_tps);
                            $('#dpt2').val(data.dpt_tps);
                        
                            $('#edit-user').modal({
                                backdrop: 'static',
                                keyboard: false,
                            });
                            $('#edit-user').modal('show');
                        },
                        error: function(data) {
                            toastr.error('Upss, sepertinya ada yang salah');
                        }
                    });
                }
            </script>
