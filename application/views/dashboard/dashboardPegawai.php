<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div id="myModal404" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-times fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Messages</h2>
                    <p style="text-align: center;">Error 403: Acess Denied !!!</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="myModal404" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-times fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Error!</h2>
                    <p style="text-align: center; font-size: 20pt; color: red;">Error 403: Acess Denied !!!</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div> -->

    <div id="myModalinfox" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box bg-success">
                        <i class="fas fa-info fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <!-- <h2 class="text-center">Error!</h2> -->
                    <p style="text-align: center; font-size: 20pt; color: blue;">Jangan lupa untuk mengisi absen harian anda !!</p>
                </div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-warning btn-block" data-dismiss="modal">OK</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Gagal -->
    <div class="modal fade" id="listTglUraian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 style="font-family: Roboto; font-size: 16pt;" class="modal-title" id="exampleModalLabel">Error !!</h5>
                    <!-- <?php echo $this->session->flashdata('a203') ?> -->
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-family: Roboto; font-size: 16pt; color: black;"><?php echo $this->session->userdata('a203'); ?>
                        <hr />
                    </p>
                    <p style="text-align: center; font-family: Roboto; font-size: 12pt; color: black;">Harap pastikan bahwa file tersebut adalah <span style="color: red;"> gif/jpg/png/pdf</span> , memiliki <span style="color: red;"> Ukuran File Max : 5 MB </span> , serta <span style="color: red;">Lebar dan Tinggi yaitu : 2048 x 1536</span>
                        <hr />
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="listTglUraian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 style="font-family: Roboto; font-size: 16pt;" class="modal-title" id="exampleModalLabel">Error !!</h5>
                    <!-- <?php echo $this->session->flashdata('a203') ?> -->
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-family: Roboto; font-size: 16pt; color: black;"><?php echo $this->session->userdata('a203'); ?>
                        <hr />
                    </p>
                    <p style="text-align: center; font-family: Roboto; font-size: 12pt; color: black;">Harap pastikan bahwa file tersebut adalah <span style="color: red;"> gif/jpg/png/pdf</span> , memiliki <span style="color: red;"> Ukuran File Max : 5 MB </span> , serta <span style="color: red;">Lebar dan Tinggi yaitu : 2048 x 1536</span>
                        <hr />
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <a href="<?php echo base_url() ?>index.php/Settings/pegawaisettprofile">
                        <div class=" info-box">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="color: black;">Profile PNASN</span>
                                <span class="info-box-number">
                                    Lihat
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>

                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-desktop"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Hasil Evaluasi Kinerja bulan <?php echo $bulanlalu ?></span>
                            <span class="info-box-number"><?php echo $evaluasi->nilai ?> - <?php echo $evaluasi->nama ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-sticky-note"></i></span>
                        <div class="info-box-content">
                            <?php if ($is_input_tugas > 0) : ?>
                                <span class="info-box-text" style="color: green;">Jurnal Har ini : Sudah Ada</span>
                            <?php else : ?>
                                <span class="info-box-text" style="color: red;">Jurnal Har ini : Belum Ada</span>
                            <?php endif; ?>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-info-circle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text" style="color: red;">Jangan Lupa untuk mengisi absensi<br>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Absensi</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example1" class="table responive table-bordered table-striped">
                                <thead>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Absensi</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php if (is_weekend()) : ?>
                                            <td class="bg-light text-danger" colspan="4">Hari ini libur. Tidak Perlu absen</td>
                                        <?php else : ?>
                                            <?php if ($absen >= 1) : ?>
                                                <td><i style="color: red"></i>Sudah Absen</td>
                                            <?php elseif ($absen < 1) : ?>
                                                <td><i style="color: red">Belum Absen</i></td>
                                            <?php endif; ?>
                                            <td><?= tgl_hari(date('d-m-Y')) ?></td>
                                            <?php if ($absen >= 1) : ?>
                                                <td><button href="#" class="btn btn-primary btn-sm" style="background-color: grey;" disabled>Absen</button></td>
                                            <?php elseif ($absen < 1) : ?>
                                                <td><a href="<?= base_url('index.php/Absensi/absen') ?>" class="btn btn-primary btn-sm" style="background-color: blue;">Absen</a></td>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
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
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>asset/plugin/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge(' uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>asset/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>asset/plugin/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>asset/plugin/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>asset/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url() ?>asset/plugin/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>asset/plugin/chart.js/Chart.min.js"></script>

<?php
// $ok = $this->session->userdata('404');
$ok =  $this->session->userdata('a404');
if ($ok == "Akses Ditolak !!") : ?>
    <script>
        $(document).ready(function() {
            $("#myModal404").modal();
        });
    </script>
<?php endif; ?>

<script>
    $(document).ready(function() {
        if ($is_input_tugas !== "") {
            $("#listTglUraian").modal();
        }
    });

    $(document).ready(function() {
        $("#myModalinfo").modal();

    });
</script>
</body>

</html>