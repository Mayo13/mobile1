<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div id="modal_info" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-times fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Messages</h2>
                    <p style="text-align: center;">Data Kosong</p>
                    <!-- <p style="text-align: center;">Data Kosong, Harap Cek Kembali form isian anda !!!</p> -->
                    <label>Keterangan :</label></br>
                    <label>- PNASN belum atau tidak mengisi uraian tugas. </label></br>
                    <label>- Atasan Langsung PNASN salah dalam mengisi periode uraian tugas. </label>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Kegiatan PNASN</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" id="insert_form">
                        <label>Waktu Kegiatan</label>
                        <input type="date" name="waktu" id="waktu" class="form-control" disabled />
                        <br />
                        <label>Lokasi Kerja</label>
                        <input type="text" name="lokasi_kerja" id="lokasi_kerja" class="form-control" disabled />
                        <br />
                        <hr>
                        <label>Deskripsi Pekerjaan</label>
                        <p>
                        <div name="pelaksanaan_kegiatan" id="pelaksanaan_kegiatan" class="form-control"></div>
                        </p>
                        <br />
                        <label>Surat yang Dikerjakan (Jika Ada)</label>
                        <input type="text" name="surat_dikerjakan" id="surat_dikerjakan" class="form-control" disabled />
                        <br />
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" disabled />
                        <br />
                        <label>Status Pekerjaan</label>
                        <input type="text" name="tindak_lanjut" id="tindak_lanjut" class="form-control" disabled />
                        <br />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Kegiatan PNASN</h1>
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
                            <div>
                                <div class="form-group">
                                    <label>Data Kosong</label></br>
                                </div>
                            </div>
                            <table id="example1" class="table table-bordered table-striped responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th>Hari</th>
                                        <th>Tanggal </th>
                                        <th>Pelaksanaan Kegiatan</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

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

<script src="<?php echo base_url() ?>asset/plugin/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE App -->
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "ordering": false,
            "columnDefs": [{
                width: '10%',
                targets: 0
            }, {
                width: '14%',
                targets: 1
            }, {
                width: '18%',
                targets: 3
            }],
            "fixedColumns": false
            // 
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script>
    $(document).ready(function() {
        // $(function() {
        //     // $('#pelaksanaan_kegiatan').summernote('disable');
        //     // Summernote
        //     $('#pelaksanaan_kegiatan').summernote({
        //         height: 150
        //     });

        //     $('#pelaksanaan_kegiatan').summernote('code', "sdjiasodsaj");

        // });
        $('#modal_info').modal('show');
        $(document).on('click', '.lihat-detail', function() {
            var ids = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url('index.php/admin/viewLap_ajax/') ?>",
                method: "POST",
                data: {
                    id: ids
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    console.log(data[0].waktu);
                    $('#waktu').val(data[0].waktu);
                    // $('#pelaksanaan_kegiatan').summernote('code', data[0].pelaksanaan_kegiatan);
                    // $('#pelaksanaan_kegiatan').summernote('disable');
                    $('#pelaksanaan_kegiatan').val(data[0].pelaksanaan_kegiatan);
                    $('#keterangan').val(data[0].keterangan);
                    $('#surat_dikerjakan').val(data[0].surat_dikerjakan);
                    $('#lokasi_kerja').val(data[0].lokasi_kerja);
                    $('#tindak_lanjut').val(data[0].tindak_lanjut);
                    $('#status_kegiatan').val(data[0].status_kegiatan);
                    $('#add_data_Modal').modal('show');
                }
            });
        });
    });
</script>
</body>

</html>