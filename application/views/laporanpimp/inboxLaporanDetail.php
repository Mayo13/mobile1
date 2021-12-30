<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar PNASN</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Penilaian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label>Masukan Penilaian</label>
                            <input type="text" class="form-control" id="" placeholder="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data PNASN</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">

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
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Periode</th>
                                        <th>Penilaian</th>
                                        <th>Tanggal Kirim</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <!-- <a style="width: 100%;" href="javascript:;" class="btn btn-danger btn-xs data_hapus" data="' + i + '">Hapus</a> -->
                                <tbody>
                                    <?php
                                    foreach ($dataKtu as $data) {
                                        $ciphertext = $this->encryption->encrypt($data->kinerja_id);
                                        $urisafe = strtr($ciphertext, '+/=', '-_~');

                                        echo "<tr>";
                                        echo "<td>" . $data->nama_depan . " " . $data->nama_belakang . "</td>";
                                        echo "<td>" . $data->nik_pegawai . "</td>";
                                        switch (substr($data->periode, 0, -3)) {
                                            case 1:
                                                $bulan = "Januari";
                                                break;
                                            case 2:
                                                $bulan = "Februari";
                                                break;
                                            case 3:
                                                $bulan = "Maret";
                                                break;
                                            case 4:
                                                $bulan = "April";
                                                break;
                                            case 5:
                                                $bulan = "Mei";
                                                break;
                                            case 6:
                                                $bulan = "Juni";
                                                break;
                                            case 7:
                                                $bulan = "Juli";
                                                break;
                                            case 8:
                                                $bulan = "Agustus";
                                                break;
                                            case 9:
                                                $bulan = "September";
                                                break;
                                            case 10:
                                                $bulan = "Oktober";
                                                break;
                                            case 11:
                                                $bulan = "November";
                                                break;
                                            case 12:
                                                $bulan = "Desember";
                                                break;
                                        }
                                        echo "<td>" . $bulan . "</td>";
                                        // echo "<td>" . $data->penilaian . "</td>";
                                        // echo "<td>" . $data->keterangan . "</td>";
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
                                        echo "<td>" . $data->send_date . "</td>";
                                        $time = strtotime($data->created_date);
                                        $tahun = date("Y", $time);
                                        $waktu = $tahun . "-";
                                        $waktu .= substr($data->periode, 0, -3) . "-1";
                                        $ciphertext = $this->encryption->encrypt($data->emp_id);
                                        $urisafe2 = strtr($ciphertext, '+/=', '-_~');

                                        if ($data->is_read_byAdmin == 1) {
                                            echo "<td>                                                                                                         
                                                    <button class='icon-block btn btn-secondary'>
                                                    <i class='far fa-eye'></i>
                                                        <span>Detail Kinerja</span>
                                                    </button>                                                  
                                                   <button class='icon-block btn btn-secondary'>
                                                    <i class='fas fa-paper-plane'></i>
                                                        <span>Laporan Pegawai</span>
                                                    </button>                                                                                                                                                                                         
                                                    </td>";
                                        } else {
                                            echo "<td>  
                                                    <a href= '" . base_url() . "index.php/admin/lihatKinerja/" . $urisafe . "' class='icon-block btn btn-primary'>
                                                    <i class='far fa-eye'></i>
                                                    <span>Detail Kinerja</span>
                                                    </a>
                                                    <a href='" . base_url('index.php/admin/DaftarLaporanPegawaiDetail/') . $urisafe2 . "/" . $waktu . "'
                                                    class='btn btn-info'>Lihat Laporan Pegawai</a>                                                                                                                                                                                                                           
                                                    </td>";
                                        }

                                        echo "</tr>";
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