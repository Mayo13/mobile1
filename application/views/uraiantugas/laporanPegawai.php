<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan PNASN</h1>
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
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>index.php/admin/submit_updateKinerjaPegawai">
                            <div class="card-header">
                                <h3 class="card-title">Form Uraian Tugas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <h2 style="text-align: left;">Data PNASN</h2>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 class="card-title"><b>Nama</b></h2>
                                                        <p class="card-text"><?php echo $pegawai[0]->nama_depan . ' ' . $pegawai[0]->nama_belakang ?></p>
                                                        <!-- <a class="btn btn-primary" href="<?= base_url('post/daftarPost'); ?>">Kembali</a> -->
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 class="card-title"><b>NIK</b></h2>
                                                        <p class="card-text"><?php echo $pegawai[0]->nik_pegawai ?></p>
                                                        <!-- <a class="btn btn-primary" href="<?= base_url('post/daftarPost'); ?>">Kembali</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2 class="card-title"><b>Waktu Kegiatan</b></h2>
                                                    <p class="card-text"><?php echo $laporan[0]->waktu ?></p>
                                                    <!-- <a class="btn btn-primary" href="<?= base_url('post/daftarPost'); ?>">Kembali</a> -->
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2 class="card-title"><b>Lokasi Kerja</b></h2>
                                                    <p class="card-text"><?php echo $laporan[0]->lokasi_kerja ?></p>
                                                    <!-- <a class="btn btn-primary" href="<?= base_url('post/daftarPost'); ?>">Kembali</a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 class="card-title"><b>Status Pekerjaan</b></h2>
                                                        <p class="card-text"><?php echo $laporan[0]->tindak_lanjut ?></p>
                                                        <!-- <a class="btn btn-primary" href="<?= base_url('post/daftarPost'); ?>">Kembali</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 class="card-title"><b>Jumlah Terselesaikan</b></h2>
                                                        <p class="card-text"><?php echo $laporan[0]->surat_dikerjakan ?></p>
                                                        <!-- <a class="btn btn-primary" href="<?= base_url('post/daftarPost'); ?>">Kembali</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 class="card-title"><b>Kegiatan PNASN</b></h2>
                                                        <p class="card-text"><?php echo $laporan[0]->pelaksanaan_kegiatan ?></p>
                                                        <!-- <a class="btn btn-primary" href="<?= base_url('post/daftarPost'); ?>">Kembali</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Kembali</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
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
<script src="<?php echo base_url() ?>asset/plugin/summernote/summernote-bs4.min.js"></script>
<script>
    function goBack() {
        window.history.back();
    }

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

    var sukses = "<?php echo $this->session->userdata('a202') ?>";
    var gagal = "<?php echo $this->session->userdata('a203') ?>";
    // var is_send = "<?php echo $dataPegawai[0]->is_send ?>";
    // var elem = document.getElementById('btnkirim');

    // if (is_send == 1) {
    //     // elem.style.display = 'none';
    // }

    $(document).ready(function() {

        if (gagal !== "") {
            $("#myModal203").modal();
        }
        if (sukses !== "") {
            $("#myModal202").modal();
        }

        var data = "<?php echo $dataPegawai[0]->keterangan ?>";
        $('#summernote').summernote('code', data);
        // $('#summernote').summernote({
        //     height: 150,
        // });

        $('#summernote').summernote({
            height: "300px",
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        function uploadImageSummerNote(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?php echo site_url('post/upload_image') ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
                    $('#summernote').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImageSummerNote(src) {
            $.ajax({
                data: {
                    src: src
                },
                type: "POST",
                url: "<?php echo site_url('post/delete_image') ?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }



    });
</script>
</body>

</html>