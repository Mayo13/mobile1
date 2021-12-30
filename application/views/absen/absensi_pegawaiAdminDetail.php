<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
                    <div class="col-xs-12 col-sm-6">
                        <div class="card-header">
                            <!-- <?php echo $this->session->flashdata('absen_msg') ?> -->
                            <div class="dropdown d-inline">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="droprop-action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-print"></i>
                                    Export Laporan
                                </button>
                                <div class="dropdown-menu" aria-labelledby="droprop-action">
                                    <a href="<?= base_url('Absensi/printAbsenPDF/' . $this->uri->segment(3) . "?bulan=$detail[bulan]&tahun=$detail[tahun]") ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 ml-auto text-right">
                        <form action="" method="get">
                            <div class="card-body">
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
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <!-- <div class="card-body"> -->

                    <!-- </div> -->
                    <div class="col-12">

                        <div class="card-body table-responsive">
                            <h3><?= $bio[0]->nama_depan . ' ' . $bio[0]->nama_belakang ?></h3>
                            <h3><?= $bagian ?></h3>
                            <!-- <div class="card-body"> -->
                            <!-- <h4 class="card-title mb-4">Absen Bulan : <?= bulan($detail['bulan']) . ' ' . $detail['tahun'] ?></h4> -->
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
        "searching": false
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