<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
                        <div class="col-md-4 col-lg-4 col-sm-12 text-center">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline" style="height: 300px;">
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
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                        <div class="col-md-8 col-lg-8 col-sm-12">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>index.php/SVC_Submit/submit_updatePassPegawai">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="emp_id" value="<?php echo $emp_id ?>" hidden>
                                            </div>
                                            <label class="col-sm-3 col-form-label">Sandi Lama</label>
                                            <div class="col-sm-12">
                                                <input type="password" class="form-control" name="pass_lama" id="old_password" placeholder="" required>
                                                <span toggle="#old_password" style="float: right;                                                                                        
                                                                                        margin-top: -28px;
                                                                                        position: relative;
                                                                                        z-index: 2;" class="fa fa-fw fa-eye toggle-password-old"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Buat Sandi Baru</label>
                                            <div class="col-sm-12">
                                                <input type="password" class="form-control" name="pass_baru1" id="password" placeholder="" required>
                                                <span toggle="#password" style="float: right;                                                                                        
                                                                                        margin-top: -28px;
                                                                                        position: relative;
                                                                                        z-index: 2;" class="fa fa-fw fa-eye toggle-password-new"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Ulangi Sandi Baru</label>
                                            <div class="col-sm-12">
                                                <input type="password" class="form-control" name="pass_baru2" id="confirm_password" placeholder="" required>
                                                <span toggle="#confirm_password" style="float: right;                                                                                        
                                                                                        margin-top: -28px;
                                                                                        position: relative;
                                                                                        z-index: 2;" class="fa fa-fw fa-eye toggle-password-rep"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Kirim</button>
                                        <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/Dashboard/"><i class="fas fa-ban"></i> Kembali</a>
                                    </div>
                                </div>
                            </form>
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
    $(".toggle-password-old").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $(".toggle-password-new").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $(".toggle-password-rep").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Sandi tidak sama, harap masukan kembali sandi");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

</body>

</html>