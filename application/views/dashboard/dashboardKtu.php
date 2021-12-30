<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- <div class="modal fade" id="myModal404" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content Akses">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                </div>
                <div class="modal-body">
                    <img src="<?php echo base_url() ?>asset/img/stop.png" style="width: 20%;">
                    <p style="text-align: center; font-size: 20pt; color: red;">Error 403: Acess Denied !!!</p>
                    <?php echo $this->session->userdata('a404'); ?>
                </div>
                <div class="modal-footer bg-danger">
                </div>
            </div>
        </div>
    </div> -->

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
                <div class="col-12 col-sm-6 col-md-6">
                    <a href="<?php echo base_url() ?>index.php/Settings/pegawaisettprofile">
                        <div class=" info-box">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user-circle"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="color: black;">Profile</span>
                                <span class="info-box-number">
                                    Lihat
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total PNASN</span>
                            <span class="info-box-number">
                                <?php
                                echo $totalPeg[0]->total;
                                ?>
                                <small>Orang</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- fix for small devices only -->
                <!-- <div class="clearfix hidden-md-up"></div> -->

                <div class="col-12 col-sm-6 col-md-6">
                    <a href="<?php echo base_url() ?>index.php/PenilaianKinerja/daftarkinerjaKtu">
                        <div class=" info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-star-half-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="color: black;">History Penilaian</span>
                                <span class="info-box-number">
                                    Lihat
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>

                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="far fa-folder"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Penilaian Bulan ini : </span>
                            <span class="info-box-number" style="color: crimson;"><?php echo $belumPenilaian ?> <small>Orang belum dinilai</small></span>
                            <!-- <span class="info-box-text">Penilaian Bulan ini : Penilaian </span>
                            <?php
                            echo $lapPegTotal[0]->total;
                            ?> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="card-body table-responsive">
                        <table id="example3" class="table responive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <?php if (!empty($dataPegawai)) { ?>
                                <tbody>
                                    <?php
                                    foreach ($dataPegawai as $data) {
                                        $ciphertext = $this->encryption->encrypt($data->emp_id);
                                        $urisafe = strtr($ciphertext, '+/=', '-_~');

                                        echo "<tr>";
                                        echo "<td>" . $data->nama_depan . " " . $data->nama_belakang . "</td>";
                                        echo "<td>" . $data->nik_pegawai . "</td>";
                                        echo "<td>" . $data->jabatan . "</td>";
                                    }
                                    ?>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
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
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>asset/plugin/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
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
<!-- DataTables  & plugin -->
<script src="<?php echo base_url() ?>asset/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/datatables-buttons/js/buttons.colVis.min.js"></script>

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
    $("#example3").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        // 
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
</script>

</body>

</html>