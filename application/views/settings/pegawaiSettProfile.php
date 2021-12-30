<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Modal Sukses -->
    <div id="myModal202" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box bg-success">
                        <i class="fas fa-check fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Messages</h2>
                    <p style="text-align: center;"><?php echo $this->session->userdata('a202'); ?></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Gagal -->
    <div id="myModal203" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-times fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Messages</h2>
                    <p style="text-align: center;"><?php echo $this->session->userdata('a203'); ?></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-12 text-center">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline" style="height: 400px;">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() ?>asset/img/logo.png" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">
                                        <?php echo $this->session->userdata('full_name'); ?></h3>
                                    <h5 class="profile-username text-center" style="font-size: 12pt;"> NIK. <?php
                                                                                                            if ($this->session->userdata('nik_pegawai') == "-1") {
                                                                                                                echo $this->session->userdata('nip_pegawai');
                                                                                                            } else {
                                                                                                                echo $this->session->userdata('nik_pegawai');
                                                                                                            }
                                                                                                            ?></h5>
                                    <hr>
                                    <p class="text-muted text-center"><?php echo $dataJabatan ?></p>

                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <?php $ciphertext = $this->encryption->encrypt($this->session->userdata('emp_id'));
                                            $urisafe = strtr($ciphertext, '+/=', '-_~');
                                            echo "<a href='" . base_url() . "index.php/Settings/pegawaiSettUpdateProfile/" . $urisafe . "' class='icon-block btn btn-info'>                                                
                                                <i class='fas fa-pencil-alt'></i>
                                                <span>Update Password </span>
                                            </a>";
                                            echo "<hr>";
                                            if ($this->session->userdata('role_id') == 4) {
                                                echo "<a href='" . base_url() . "index.php/Pnasn/pegawaiDownloadBerkas/' class='icon-block btn btn-info'>                                                
                                                <i class='fas fa-download'></i>
                                                <span>Download Berkas </span>
                                            </a>";
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                        <div class="col-md-8 col-lg-8 col-sm-12">
                            <div class="card card-primary card-outline" style="height: 300px;">
                                <div class="card-body box-profile">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <!-- <label class="col-sm-3 col-form-label">Nama Depan</label> -->
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="nama_depan" placeholder="" value="<?php echo $data[0]->nama_depan ?> <?php echo $data[0]->nama_belakang ?> " disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="department" placeholder="" value="<?php echo $dataDepartment[0]->nama ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="subdepartment" placeholder="" value="<?php echo $datasubDepartment[0]->nama ?>" disabled>
                                            </div>
                                        </div>

                                        <?php if ($databagDepartment[0]->nama == $datasubDepartment[0]->nama) : ?>

                                        <?php else : ?>
                                            <div class='form-group row'>
                                                <div class='col-sm-12'>
                                                    <input type='text' class='form-control' name='bagiandeparment' placeholder='' value='<?php echo $databagDepartment[0]->nama ?>' disabled>
                                                </div>
                                            </div>
                                        <?php endif; ?>



                                        <div class="form-group row">
                                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="email" placeholder="" value="<?php echo $data[0]->email ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <!-- <button style="width: 150px;" type="submit" class="btn btn-success">Ubah</button> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <?php
    $this->load->view('admin/template/4footer');
    ?>
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>asset/plugin/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>asset/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src=" <?php echo base_url() ?>asset/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=" <?php echo base_url() ?>asset/js/demo.js"></script>
<script>
    var $sukses = "<?php echo $this->session->userdata('a202') ?>";
    var $gagal = "<?php echo $this->session->userdata('a203'); ?>";

    $(document).ready(function() {

        if ($gagal !== "") {
            $("#myModal203").modal();
        }
        if ($sukses !== "") {
            $("#myModal202").modal();
        }
    });
</script>
</body>

</html>