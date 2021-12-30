<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Modal Sukses -->
    <div id="myModal202" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box bg-success">
                        <i class="fas fa-check fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Messages</h2>
                    <p style="text-align: center;">Absensi Berhasil</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Error -->
    <div id="myModal203" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-times fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Messages</h2>
                    <p style="text-align: center;">Absensi Gagal harap coba lagi !!!</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Absen Harian</h4>
                    <?php echo $this->session->flashdata('absen_msg') ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-body table-responsive">
                            <table class="table w-100">
                                <thead>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Absen Masuk</th>
                                    <th>Absen Pulang</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php if (is_weekend()) : ?>
                                            <td class="bg-light text-danger" colspan="4">Hari ini libur. Tidak Perlu absen</td>
                                        <?php else : ?>
                                            <td><i class="fa fa-3x fa-<?= ($absen < 2) ? "exclamation-triangle text-warning" : "check-circle text-success" ?>"></i></td>
                                            <td><?= tgl_hari(date('d-m-Y')) ?></td>
                                            <td>
                                                <?php if ($waktu_datang == 1) : ?>
                                                    <a href="#" class="btn btn-secondary btn-sm btn-fill" disabled style="cursor:not-allowed">Absen Masuk</a>
                                                <?php else : ?>
                                                    <a href="<?= base_url('SVC_Submit/submit_absen/masuk') ?>" class="btn btn-primary btn-sm btn-fill">Absen Masuk</a>
                                                    <!-- <a href="<?= base_url('SVC_Submit/submit_absen_masuk/masuk') ?>" class="btn btn-primary btn-sm btn-fill" <?= ($absen == 0) ? 'disabled style="cursor:not-allowed"' : '' ?>>Absen Masuk</a> -->
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($waktu_pulang == 1) : ?>
                                                    <a href="#" class="btn btn-secondary btn-sm btn-fill" disabled style="cursor:not-allowed">Absen Pulang</a>
                                                <?php else : ?>
                                                    <a href="<?= base_url('SVC_Submit/submit_absen/pulang') ?>" class="btn btn-success btn-sm btn-fill">Absen Pulang</a>
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <br><br>
                <div class="row mb-2">
                    <div class="col-xs-12 col-sm-6 mt-0"></div>
                    <div class="col-xs-12 col-sm-6 ml-auto text-right">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-sm-4">
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="" disabled selected>-- Pilih Bulan --</option>
                                        <?php foreach ($detail['all_bulan'] as $bn => $bt) : ?>
                                            <option value="<?= $bn ?>" <?= ($bn == $detail['bulan']) ? 'selected' : '' ?>><?= $bt ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option value="" disabled selected>-- Pilih Tahun</option>
                                        <?php for ($i = date('Y'); $i >= (date('Y') - 5); $i--) : ?>
                                            <option value="<?= $i ?>" <?= ($i == $detail['tahun']) ? 'selected' : '' ?>><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary btn-fill btn-block">Tampilkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card-body table-responsive">
                            <!-- <div class="card-body"> -->
                            <h4 class="card-title mb-4">Absen Bulan : <?= bulan($detail['bulan']) . ' ' . $detail['tahun'] ?></h4>
                            <br>
                            <table id="example3" class="table responive table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                </thead>
                                <tbody>
                                    <?php if ($detail['absen']) : ?>
                                        <?php foreach ($detail['hari'] as $i => $h) : ?>
                                            <?php
                                            $absen_harian = array_search($h['tgl'], array_column($detail['absen'], 'tgl')) !== false ? $detail['absen'][array_search($h['tgl'], array_column($detail['absen'], 'tgl'))] : '';
                                            ?>
                                            <tr <?= (in_array($h['hari'], ['Sabtu', 'Minggu'])) ? 'class="bg-dark text-white"' : '' ?> <?= ($absen_harian == '') ? 'class="bg-danger text-white"' : '' ?>>
                                                <td><?= ($i + 1) ?></td>
                                                <td><?= $h['hari'] . ', ' . $h['tgl'] ?></td>
                                                <td><?= is_weekend($h['tgl']) ? 'Libur Akhir Pekan' : check_jam(@$absen_harian['jam_datang'], 'masuk') ?></td>
                                                <td><?= is_weekend($h['tgl']) ? 'Libur Akhir Pekan' : check_jam(@$absen_harian['jam_pulang'], 'pulang') ?></td>

                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td class="bg-light" colspan="4">Tidak ada data absen</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
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
    <?php if (!empty($this->session->flashdata('absen_msg'))) : ?>
        <?php if ($this->session->flashdata('absen_msg') == 'berhasil') : ?>
            $('#myModal202').modal('show');
        <?php else : ?>
            $('#myModal203').modal('show');
        <?php endif; ?>
    <?php endif; ?>
</script>
</body>

</html>