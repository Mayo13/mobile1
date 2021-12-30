<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Modal Sukses -->
    <div class="modal fade" id="myModal202" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-size: 20pt; color: black;"><?php echo $this->session->userdata('a202'); ?></p>
                </div>
                <!-- <div class="modal-footer bg-danger">
                </div> -->
            </div>
        </div>
    </div>

    <!-- Modal Gagal -->
    <div class="modal fade" id="myModal203" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <p style="text-align: center; font-family: Roboto; font-size: 16pt; color: black;">Harap isi semua kolum
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pimpinan</h1>
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
                            <h3 class="card-title">Data Pimpinan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="pull-right"><a href="<?php echo base_url() ?>index.php/Pimpinan/ktuInput" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Tambah Pimpinan</a></div>
                            <?php if (!empty($dataPegawai)) { ?>
                                <table id="example3" class="table responive table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Unit Kerja</th>
                                            <th style="width: 20%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($dataPegawai as $data) {
                                            $ciphertext = $this->encryption->encrypt($data->emp_id);
                                            $urisafe = strtr($ciphertext, '+/=', '-_~');

                                            echo "<tr>";
                                            echo "<td>" . $data->nama_depan . " " . $data->nama_belakang . "</td>";
                                            echo "<td>" . $data->nip_pegawai . "</td>";
                                            echo "<td>" . $data->nama_dep . "</td>";

                                            echo "<td>                                                    
                                                    <a href='" . base_url() . "index.php/pimpinan/ktuEdit/" . $urisafe . "' class='btn btn-info'>Edit / Lengkapi Berkas</a>                                                     
                                                    </td>";
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
<!-- Page specific script -->
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