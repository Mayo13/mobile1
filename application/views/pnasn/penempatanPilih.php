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
                </div>
            </div>
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Penempatan PNASN</h1>
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
                        <form method="post" class="form-horizontal" action="<?php echo base_url() ?>index.php/SVC_Submit/submit_department">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Penempatan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>ES II</label>
                                    <input type="text" id="empId" class="form-control" name="emp_id" hidden>
                                    <select name="department" class="form-control custom-select" id="department">
                                        <option value="0">- Select Unit Kerja -</option>
                                        <?php
                                        foreach ($dataDepart as $dep) {
                                            echo '<option value="' . $dep->department_id . '">' . $dep->nama . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <!-- <select name="department" class="form-control custom-select" id="dataDepart">
                                        <option value="0">- Select Lokasi -</option>
                                        <?php
                                        foreach ($dataDepart as $data) {
                                            echo '<option value="' . $data->department_id . '">' . $data->nama . '</option>';
                                        }
                                        ?>
                                    </select> -->
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>ES III</label>
                                    <input type="text" id="empId" class="form-control" name="emp_id" hidden>
                                    <select name="subdepartment" class="form-control custom-select" id="subdepartment">
                                        <option value="0">- Select Sub Direktorat -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>ES IV</label>
                                    <input type="text" id="empId" class="form-control" name="emp_id" hidden>
                                    <select name="bagiandepartment" class="form-control custom-select" id="bagiandepartment">
                                        <option value="0">- Select Sub Bagian -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Jabatan</th>
                                        <th>Unit Kerja</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($dataPegawai as $data) {
                                        $ciphertext = $this->encryption->encrypt($data->emp_id);
                                        $urisafe = strtr($ciphertext, '+/=', '-_~');

                                        echo "<tr>";
                                        echo "<td>" . $data->nama_depan . " " . $data->nama_belakang . "</td>";
                                        echo "<td>" . $data->nik_pegawai . "</td>";
                                        echo "<td>" . $data->jabatan . "</td>";
                                        echo "<td>" . $data->lokasi . "</td>";
                                        // <td><button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Pilih Penempatan </button></td>
                                        echo "<td>                                                    
                                                    <button data-toggle='modal' data-id='$data->emp_id' data-target='#exampleModal' class='dataPegawai btn btn-info'>Pilih Penempatan</button>                                                     
                                                    </td>";
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

    $(document).on("click", ".dataPegawai", function() {
        var empId = $(this).data('id');
        $(".modal-body #empId").val(empId);
        // As pointed out in comments, 
        // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });

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

    $(document).ready(function() {
        $("#department").change(function() {
            var url = "<?php echo site_url('index.php/SVC_GetAjax/subDep_ajax'); ?>/" + $(this).val();
            $('#subdepartment').load(url);
            return false;
        })

        $("#subdepartment").change(function() {
            var url = "<?php echo site_url('index.php/SVC_GetAjax/bagianDep_ajax'); ?>/" + $(this).val();
            $('#bagiandepartment').load(url);
            return false;
        })
    });
</script>
</body>

</html>