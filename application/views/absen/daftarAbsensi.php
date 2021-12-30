<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Absen</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <h4 class="col-xs-12 col-sm-6 mt-0"></h4>
                <div class="col-xs-12 col-sm-6 ml-auto text-right">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col">
                                <select name="bulan" id="bulan" class="form-control">
                                    <option value="" disabled selected>-- Pilih Bulan --</option>
                                    <?php foreach ($all_bulan as $bn => $bt) : ?>
                                        <option value="<?= $bn ?>" <?= ($bn == $bulan) ? 'selected' : '' ?>><?= $bt ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col ">
                                <select name="tahun" id="tahun" class="form-control">
                                    <option value="" disabled selected>-- Pilih Tahun</option>
                                    <?php for ($i = date('Y'); $i >= (date('Y') - 5); $i--) : ?>
                                        <option value="<?= $i ?>" <?= ($i == $tahun) ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col ">
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
                        <h4 class="card-title mb-4">Absen Bulan : <?= bulan($bulan) . ' ' . $tahun ?></h4>
                        <br>
                        <table id="example3" class="table responive table-bordered table-striped">
                            <thead>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <!-- <th>Jam Keluar</th> -->
                            </thead>
                            <tbody>
                                <?php if ($absen) : ?>
                                    <?php foreach ($hari as $i => $h) : ?>
                                        <?php
                                        $absen_harian = array_search($h['tgl'], array_column($absen, 'tgl')) !== false ? $absen[array_search($h['tgl'], array_column($absen, 'tgl'))] : '';
                                        ?>
                                        <tr <?= (in_array($h['hari'], ['Sabtu', 'Minggu'])) ? 'class="bg-dark text-white"' : '' ?> <?= ($absen_harian == '') ? 'class="bg-danger text-white"' : '' ?>>
                                            <td><?= ($i + 1) ?></td>
                                            <td><?= $h['hari'] . ', ' . $h['tgl'] ?></td>
                                            <td><?= is_weekend($h['tgl']) ? 'Libur Akhir Pekan' : check_jam(@$absen_harian['jam_masuk'], 'masuk') ?></td>

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
</script>
</body>

</html>