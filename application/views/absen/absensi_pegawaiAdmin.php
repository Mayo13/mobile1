<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Absen PNASN</h4>
                    <?php echo $this->session->flashdata('absen_msg') ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Unit Kerja</label>
                                <select name="department" class="form-control custom-select" id="department">
                                    <option value="0">- Select Unit Kerja -</option>
                                    <?php
                                    foreach ($department as $dep) {
                                        echo '<option value="' . $dep->department_id . '">' . $dep->nama . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Direktorat</label>
                                <select name="subdepartment" class="form-control custom-select" id="subdepartment">
                                    <option value="0">- Select Sub Direktorat -</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Bagian</label>
                                <select name="bagiandepartment" class="form-control custom-select" id="bagiandepartment">
                                    <option value="0">- Select Sub Bagian -</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body table-responsive">
                                <table id="example3" class="table responive table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="vertical-align: middle; width: 25%;">Nama</th>
                                            <th style="vertical-align: middle; width: 25%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" id="btn_cari">Cari PNASN</button>
                    <!-- <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/Dashboard">Kembali</a> -->
                </div>
            </div>

        </div>
</div>
</section>
</div>

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

<script>
    $("#example3").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        "paging": false,
        "ordering": false,
        "info": false,
        // "searching": false
        // 
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    // !empty($this->session->flashdata('msg'))
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

    $(document).ready(function() {
        $('#btn_cari').on('click', function() {
            var department = $('#department').val();
            var subdept = $('#subdepartment').val();
            var bagian = $('#bagiandepartment').val();

            $.ajax({
                processing: true,
                serverSide: true,
                url: '<?= base_url() ?>index.php/SVC_GetAjax/cari_pnasn_base_bagian',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: {
                    dept: department,
                    subdept: subdept,
                    bagian: bagian,
                },
                success: function(data) {
                    // console.log(data);
                    var id;
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        id = data[i].emp_id;
                        html += '<tr>' +
                            '<td style="text-align:center;">' + data[i].nama_depan + ' ' + data[i].nama_belakang + '</td>' +
                            '<td style="text-align:center;">' +
                            '<a href="<?= base_url('absensi/check_absen_pnasn_detail/') ?>' + data[i].emp_id + '" class="btn btn-info btn-xs" style="text-align: center; width: 80%">lihat absen</a>' + ' ' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    console.log("Data Kosong");
                }
            });
        });

        return false;
    });
</script>
</body>

</html>