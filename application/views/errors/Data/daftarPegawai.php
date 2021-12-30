<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Pegawai Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Pegawai Pegawai</li>
                    </ol>
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
                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="" placeholder="">
                            <label>NIK</label>
                            <input type="text" class="form-control" id="" placeholder="">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" id="" placeholder="">
                            <label> Etc</label>
                            <input type="text" class="form-control" id="" placeholder="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Pegawai</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Mira Stout</td>
                                        <td>48124817371207012
                                        </td>
                                        <td>Pramubakti</td>
                                        <td><button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Detail Pegawai </button></td>
                                    </tr>
                                    <tr>
                                        <td>Rhea Tate</td>
                                        <td>48124817371207012
                                        </td>
                                        <td>Pramubakti</td>
                                        <td><button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Detail Pegawai </button></td>
                                    </tr>
                                    <tr>
                                        <td>Heena York</td>
                                        <td>48124817371207012
                                        </td>
                                        <td>Pramusaji</td>
                                        <td><button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Detail Pegawai </button></td>
                                    </tr>
                                    <tr>
                                        <td>Ariyan Pugh</td>
                                        <td>48124817371207012
                                        </td>
                                        <td>Pramusaji</td>
                                        <td><button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Detail Pegawai </button></td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>48124817371207012
                                        </td>
                                        <td>Pramusaji</td>
                                        <td><button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Detail Pegawai </button></td>
                                    </tr>
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
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0-pre
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
</script>
</body>

</html>