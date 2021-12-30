<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data PNASN</h1>
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
                            <h3 class="card-title">Data PNASN</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="pull-right"><a href="<?php echo base_url() ?>index.php/Pnasn/pegawaiInput" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Tambah PNASN</a></div>
                            <?php if (!empty($dataPegawai)) { ?>
                                <table id="example3" class="table responive table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%;">Aksi</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Jabatan</th>
                                            <th>Unit Kerja</th>
                                            <th>Masa Kerja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($dataPegawai as $data) {
                                            $ciphertext = $this->encryption->encrypt($data->emp_id);
                                            $urisafe = strtr($ciphertext, '+/=', '-_~');

                                            echo "<tr>";
                                            echo "<td>                                                    
                                                    <a href='" . base_url() . "index.php/pnasn/pegawaiEdit/" . $urisafe . "' class='btn btn-info'>Edit / Lengkapi Berkas</a>                                                     
                                                    </td>";
                                            echo "<td>" . $data->nama_depan . " " . $data->nama_belakang . "</td>";
                                            echo "<td>" . $data->nik_pegawai . "</td>";
                                            echo "<td>" . $data->jabatan . "</td>";
                                            echo "<td>" . $data->lokasi . "</td>";
                                            echo "<td>" . $data->masakerja . " Tahun" . "</td>";

                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php } ?>
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
        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            "responsive": true,

        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    });

    $(document).on("click", ".passingID", function() {
        var ids = $(this).attr('data-id');
        $(".modal-body #idkl").val(ids);
        $('#myModal').modal('show');
    });
</script>

</script>
</body>

</html>