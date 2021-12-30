<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Penilaian PNASN</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Daftar laporan Pimpinan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2 style="text-align: left;"> Laporan Kinerja Pimpinan</h2>
                                        <h4 style="text-align: left;"> Bulan : <?php echo $bulanini ?> <?php echo $thn ?></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-right">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-sm-4">
                                        <button onclick="window.location.href='<?php echo base_url('index.php/PenilaianKinerja/daftarkinerja') ?>'" style="width: 100%;" class="btn btn-info" id="btn_cetak"><i class="fas fa-bars"></i> Lihat History Penilaian</button>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                </div>
                                <h2 style="text-align: center;"><i class="img-circle elevation-3 far fa-clipboard fa-2x"></i>Penilaian Pegawai</h2>
                                <label>Input Penilaian Pegawai</label> -->
                            </div>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama PNASN</th>
                                        <!-- <th>Nama Pimpinan</th> -->
                                        <th>Penilaian</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <!-- <a style="width: 100%;" href="javascript:;" class="btn btn-danger btn-xs data_hapus" data="' + i + '">Hapus</a> -->
                                <tbody>
                                    <?php
                                    foreach ($penilaianPegawai as $data) {
                                        // $ciphertext = $this->encryption->encrypt($data->emp_id_pimp);
                                        // $urisafe = strtr($ciphertext, '+/=', '-_~');
                                        if ($data->kinerja_id == null) {
                                            echo "<tr>";
                                            echo "<td style='color:red'>" . $data->nama_depan . " " . $data->nama_belakang . "</td>";
                                            // echo "<td style='color:red'>" . $data->fullname . "</td>";
                                            echo "<td style='color:red'>" . 'Kosong' .  "</td>";
                                            // echo "<td>" . 'Kosong' .  "</td>";
                                            echo "<td style='color:red'>" . 'Kosong' .  "</td>";
                                            echo "</tr>";
                                        } else {

                                            echo "<tr>";
                                            echo "<td>" . $data->nama_depan . " " . $data->nama_belakang . "</td>";
                                            // echo "<td>" . $data->fullname . "</td>";
                                            // switch ($data->periode) {
                                            //     case 1:
                                            //         $bulan = "Januari";
                                            //         break;
                                            //     case 2:
                                            //         $bulan = "Februari";
                                            //         break;
                                            //     case 3:
                                            //         $bulan = "Maret";
                                            //         break;
                                            //     case 4:
                                            //         $bulan = "April";
                                            //         break;
                                            //     case 5:
                                            //         $bulan = "Mei";
                                            //         break;
                                            //     case 6:
                                            //         $bulan = "Juni";
                                            //         break;
                                            //     case 7:
                                            //         $bulan = "Juli";
                                            //         break;
                                            //     case 8:
                                            //         $bulan = "Agustus";
                                            //         break;
                                            //     case 9:
                                            //         $bulan = "September";
                                            //         break;
                                            //     case 10:
                                            //         $bulan = "Oktober";
                                            //         break;
                                            //     case 11:
                                            //         $bulan = "November";
                                            //         break;
                                            //     case 12:
                                            //         $bulan = "Desember";
                                            //         break;
                                            // }
                                            // echo "<td>" . $bulan .  "</td>";
                                            switch ($data->penilaian) {
                                                case 0:
                                                    $score = "Kurang Baik";
                                                    break;
                                                case 1:
                                                    $score = "Baik";
                                                    break;
                                                case 2:
                                                    $score = "Sangat Baik";
                                                    break;
                                            }
                                            echo "<td>" . $score .  "</td>";
                                            echo "<td>" . $data->keterangan . "</td>";
                                            echo "</tr>";
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
<!-- AdminLTE App -->
<script src=" <?php echo base_url() ?>asset/js/adminlte.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>asset/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    function hapusPenilaian(val) {
        var id = val;
        $('#ModalHapus').modal('show');
        $('[name="kode"]').val(id);
    }

    function kirimPenilaian(val) {
        var id = val;
        $('#Modalkirim').modal('show');
        $('[name="kode"]').val(id);
    }

    var sukses = "<?php echo $this->session->userdata('a202') ?>";
    var gagal = "<?php echo $this->session->userdata('a203'); ?>";

    $(document).ready(function() {

        if (gagal !== "") {
            $("#myModal203").modal();
        }
        if (sukses !== "") {
            $("#myModal202").modal();
        }
    });
</script>
</body>

</html>