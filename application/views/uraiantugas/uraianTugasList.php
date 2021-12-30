<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Modal Periode -->
    <div id="modalperiodenull" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-times fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Messages</h2>
                    <p style="text-align: center;">Masukan Tanggal Periode Laporan</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="modalperiodenull" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 style="font-family: Roboto; font-size: 16pt;" class="modal-title" id="exampleModalLabel">Error !!</h5>
                    <?php echo $this->session->flashdata('a203') ?>
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-family: Roboto; font-size: 16pt; color: black;"><?php echo $this->session->userdata('a203'); ?>
                        <hr />
                    </p>
                    <p id="errorBerkas"></p>
                    <p style="text-align: center; font-family: Roboto; font-size: 16pt; color: black;">Masukan Tanggal Periode Laporan</span>
                        <hr />
                    </p>
                </div>
            </div>
        </div>
    </div> -->

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
                    <p style="text-align: center;">Cetak Laporan Berhasil</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="myModal202" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 style="font-family: Roboto; font-size: 16pt;" class="modal-title" id="exampleModalLabel">Berhasil !!</h5>
                    <?php echo $this->session->flashdata('a203') ?>
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-family: Roboto; font-size: 16pt; color: black;"><?php echo $this->session->userdata('a203'); ?>
                        <hr />
                    </p>
                    <p id="errorBerkas"></p>
                    <p style="text-align: center; font-family: Roboto; font-size: 16pt; color: black;">Cetak Laporan Berhasil</span>
                        <hr />
                    </p>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Modal Gagal -->
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
                    <p style="text-align: center;">Pencetakan Laporan Kegiatan Maksimal 2 Bulan (60 hari) dalam sekali transkasi</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="myModal203" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 style="font-family: Roboto; font-size: 16pt;" class="modal-title" id="exampleModalLabel">Error !!</h5>
                    <?php echo $this->session->flashdata('a203') ?>
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-family: Roboto; font-size: 16pt; color: black;"><?php echo $this->session->userdata('a203'); ?>
                        <hr />
                    </p>
                    <p id="errorBerkas"></p>
                    <p style="text-align: center; font-family: Roboto; font-size: 16pt; color: black;">Pencetakan Laporan Kegiatan Maksimal 2 Bulan (60 hari) dalam sekali transkasi</span>
                        <hr />
                    </p>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Content Header (Page header) -->

    <!-- Main content -->

    <!-- /.content -->
    <br>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Card Base -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Jurnal Harian</h3>
                </div>
                <div class="card-body">
                    <!-- form biodata -->
                    <div class="card card-default">

                        <div class="card-body">
                            <div class="form-group">
                                <h3 class="card-title">Masukan Periode Laporan Anda</h3>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-5 col-sm-12 col-lg-5">
                                    <div class="form-group">
                                        <h3 class="card-title">Dari Tanggal :</h3>
                                        <br>
                                    </div>
                                    <div class="form-group">
                                        <input name="bef_date" id="bef_date" type="date" style="width:60%" class="form-control" placeholder="">
                                        <div id="lblbef_date" style="visibility: hidden;">
                                            <label style="color: red;">Tanggal Tidak Boleh Kosong*</label>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-2 col-sm-12 col-lg-2">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <br><label></label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-5 col-sm-12 col-lg-5">
                                    <div class="form-group">
                                        <h3 class="card-title">Sampai Tanggal :</h3>
                                        <br>
                                    </div>
                                    <div class="form-group">
                                        <input name="aft_date" id="aft_date" type="date" class="form-control" style="width:60%" placeholder="">
                                        <div id="lblaft_date" style="visibility: hidden;">
                                            <label style="color: red;">Tanggal Tidak Boleh Kosong*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h4 class="card-title" style="color: red;">Catatan :<br>
                                            <!-- - Menu Pencetakan laporan t berdasarkan pencarian laporan.<br> -->
                                            * Periode laporan yang dapat dipilih maksimal 60 hari.
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-lg-3">
                                    <button style="width: 100%;" class="btn btn-primary" id="btn_cari"><i class="fas fa-search"></i> Cari Laporan</button>
                                </div>
                                <br>
                                <div class="col-md-3 col-sm-12 col-lg-3">
                                    <!-- <a href="<?php echo base_url('index.php/UraianTugas/printPDF') ?>" style="width: 100%;" class="btn btn-info" id="btn_cetak">Cetak Laporan</a> -->
                                    <button onclick="window.location.href='<?php echo base_url('index.php/UraianTugas/printPDF') ?>'" style="width: 100%;" class="btn btn-warning" id="btn_cetak"><i class="fas fa-print"></i> Cetak Laporan</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example3" class="table responive table-bordered table-striped">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="vertical-align: middle; width: 15%;">Tanggal</th>
                                        <th style="vertical-align: middle; width: 20;">Jam Mulai</th>
                                        <th style="vertical-align: middle; width: 20;">Jam selesai</th>
                                        <th style="vertical-align: middle; width: 60%;">Kegiatan</th>
                                        <th style="vertical-align: middle; width: 10%;">jumlah diselesaikan</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.card base -->

        </div><!-- /.container-fluid -->
    </section>
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
<script src=" <?php echo base_url() ?>asset/plugin/jquery/jquery.min.js"></script>
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
<script src=" <?php echo base_url() ?>asset/js/moment.js"></script>
<script src=" <?php echo base_url() ?>asset/js/moment-with-locales.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>
<!-- AdminLTE App -->
<script src=" <?php echo base_url() ?>asset/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
    tampil_data_laporan();

    var $printStatus = "<?php
                        echo $this->session->userdata('print_stats');
                        ?>";

    $(document).ready(function() {
        if ($printStatus == '1') {
            $("#myModal203").modal();
        } else if ($printStatus == '0') {
            $("#myModal202").modal();
        }
    });

    $(document).ready(function() {
        var button = document.getElementById("btn_cetak");
        button.disabled = true;
        <?php
        if (!empty($this->session->userdata('in'))) {
            echo "button.disabled = false";
        } else {
            echo "button.disabled = true";
        }
        ?>
    });

    $(document).ready(function() {

        $.fn.dataTable.moment('dddd, DD MMMM YYYY');

        $("#example3").DataTable({
            columnDefs: [{
                target: 0,
                type: 'datetime-moment'
            }],
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    });

    // $.fn.dataTable.moment('D/M/YYYY');
    // $("#example3").DataTable({
    //     // columnDefs: [{
    //     //     target: 0,
    //     //     type: 'datetime-moment'
    //     // }],
    //     "responsive": true,
    //     "lengthChange": false,
    //     "autoWidth": false,
    // }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

    $(document).ready(function() {
        // var date = $('#aft_date').datepicker('getDate');
        $('#btn_cari').on('click', function() {
            var bef_date = new Date($('#bef_date').val());
            var aft_date = new Date($('#aft_date').val());
            // console.log(aft_date);

            var error = 0;
            if ($.trim(bef_date) == 'Invalid Date') {
                ++error;
            }
            if ($.trim(aft_date) == 'Invalid Date') {
                ++error;
            }

            if (error > 0) {
                // alert('kosong');
                $('#modalperiodenull').modal('show')
                lblbef_date.style.visibility = 'visible';
                lblaft_date.style.visibility = 'visible';
            } else {
                var bef_year = bef_date.getFullYear();
                var bef_month = bef_date.getMonth() + 1;
                var bef_day = bef_date.getDate();

                var aft_year = aft_date.getFullYear();
                var aft_month = aft_date.getMonth() + 1;
                var aft_day = aft_date.getDate();
                // alert('isi');

                $.ajax({
                    async: false,
                    type: "POST",
                    url: "<?php echo base_url('index.php/SVC_GetAjax/cari_laporan_pegawai_ajax') ?>",
                    dataType: "JSON",
                    data: {
                        tanggal: bef_day,
                        bulan: bef_month,
                        tahun: bef_year,
                        stanggal: aft_day,
                        sbulan: aft_month,
                        stahun: aft_year,
                    },
                    success: function(data) {
                        console.log(data);
                        window.location.href = "<?php echo base_url('index.php/UraianTugas/uraianTugasList') ?>"
                    },
                    error: function() {
                        alert('Maaf data tidak tersedia');
                        tampil_data_laporan();
                    }
                });
                return false;
            }
        });
    });

    $(document).ready(function() {
        $("form").submit(function(event) {
            if ($("input").first().val() === "correct") {
                $("span").text("Validated...").show();
                return;
            }

            $("span").text("Not valid!").show().fadeOut(1000);
            event.preventDefault();
        });
    });

    function tampil_data_laporan() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>index.php/SVC_GetAjax/daftar_laporanUser_ajax',
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    var xhari = new Date(data[i].waktu).getDay();
                    var hari = hari[xhari];

                    moment.locale('id');
                    var date1 = new Date(data[i].waktu);
                    var time1 = data[i].dari;
                    var time2 = data[i].sampai;

                    var formattedtanggal = moment(date1).format('dddd, DD MMMM YYYY');
                    var formattedtime1 = moment(time1, 'HH:mm:ss').format('HH:mm');
                    var formattedtime2 = moment(time2, 'HH:mm:ss').format('HH:mm');

                    html += '<tr>' +
                        '<td style="text-align: center;">' + formattedtanggal + '</td>' +
                        '<td style="text-align: center;">' + formattedtime1 + '</td>' +
                        '<td style="text-align: center;">' + formattedtime2 + '</td>' +
                        '<td style="text-align: justify;">' + data[i].pelaksanaan_kegiatan + '</td>' +
                        '<td style="text-align: center;">' + data[i].surat_dikerjakan + '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);


            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status);
                // alert(thrownError);
                console.log("Data Kosong");
            }

        });
    }
</script>
</body>

</html>