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

    <!-- Modal Periode -->
    <div id="modallimitday" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-times fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Messages</h2>
                    <p style="text-align: center;">Jumlah hari dari laporan lebih dari yang ditetapkan !!</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


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
    <br>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Card Base -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Jurnal PNASN</h3>
                </div>
                <div class="card-body">
                    <!-- form biodata -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">

                            <div class="form-group">
                                <!-- <label>Pilih Nama Pegawai</label><br> -->
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-lg-4">
                                        <h3 class="card-title">Pilih Nama Pegawai :</h3>
                                        <br>
                                        <select id="nama_pegawai">
                                        </select>
                                    </div>
                                </div>
                                <!-- <div style="line-height: 15px;">
                                                <option value='0' style="text-align: center;">-- Select --</option>
                                            </div> -->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-5 col-sm-12 col-lg-5">
                            <div class="form-group">
                                <h3 class="card-title">Dari Tanggal :</h3>
                                <br>
                            </div>
                            <div class="form-group">
                                <div id="lblbef_date" style="visibility: hidden;">
                                    <label style="color: red;">Tanggal Tidak Boleh Kosong*</label>
                                </div>
                                <input name="bef_date" id="bef_date" type="date" class="form-control" placeholder="">
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
                                <div id="lblaft_date" style="visibility: hidden;">
                                    <label style="color: red;">Tanggal Tidak Boleh Kosong*</label>
                                </div>
                                <input name="aft_date" id="aft_date" type="date" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <h4 class="card-title" style="color: red;">Catatan :<br>
                                    - Pencetakan laporan dilakukan berdasarkan pencarian laporan.<br>
                                    - Periode untuk pencetakan laporan yang dapat dicetak yaitu 60 hari dalam satu kali pencarian.
                                </h4>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3 col-sm-2 col-lg-3">
                            <button style="width: 100%;" class="btn btn-primary" id="btn_cari"><i class="fas fa-search"></i> Cari Laporan</button>
                        </div>
                        <br>
                        <div class="col-md-3 col-sm-2 col-lg-3">
                            <!-- <a href="<?php echo base_url('index.php/UraianTugas/printPDF') ?>" style="width: 100%;" class="btn btn-info" id="btn_cetak">Cetak Laporan</a> -->
                            <!-- <button onclick="window.location.href='<?php echo base_url('index.php/UraianTugas/printPDF') ?>'" style="width: 100%;" class="btn btn-warning" id="btn_cetak"><i class="fas fa-print"></i> Cetak Laporan</button> -->
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table id="example3" class="table responive table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="vertical-align: middle; width: 10%;">Hari/Tanggal</th>
                                <th style="vertical-align: middle; width: 12%;">Jam Mulai</th>
                                <th style="vertical-align: middle; width: 12%;">Jam Selesai</th>
                                <th style="vertical-align: middle;">Uraian Tugas</th>
                                <th style="vertical-align: middle; width: 8%;">Jumlah Terselesaikan</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                    </table>
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

<!-- Select2 JS -->
<!-- <script src="<?= base_url() ?>asset/plugin/select2/dist/js/select2.min.js"></script> -->

<!-- Page specific script -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_pegawai").select2({
            width: '100%',
            lineheight: '15px',
            dropdownCssClass: "bigdrop",
            tags: true,
            // multiple: true,
            // tokenSeparators: [',', ' '],
            // minimumInputLength: 3,
            // minimumResultsForSearch: 10,
            ajax: {
                url: '<?= base_url() ?>index.php/SVC_GetAjax/daftar_pnasn_ajax',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });
</script>

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

    // $("#example3").DataTable({
    //     "responsive": true,
    //     "lengthChange": false,
    //     "autoWidth": false,
    // }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

    $(document).ready(function() {

        // $.fn.dataTable.moment('dddd, DD MMMM YYYY', 'MMMM YYYY');
        $.fn.dataTable.moment([
            "dddd, DD MMMM YYYY",
            "MMMM YYYY",
        ]);
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

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });


    $(document).ready(function() {
        // count date between 2 date
        const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        const firstDate = new Date(2008, 1, 12);
        const secondDate = new Date(2009, 1, 22);


        $('#btn_cari').on('click', function() {
            var bef_date = new Date($('#bef_date').val());
            var aft_date = new Date($('#aft_date').val());
            var id_emp = $('#nama_pegawai').val();

            const diffDays = Math.round(Math.abs((bef_date - aft_date) / oneDay));
            // console.log(aft_date);

            var error = 0;
            var limitDay = 0;
            console.log(limitDay);
            if (diffDays > 60) {
                // ++error;
                limitDay = 1;
            }
            if ($.trim(bef_date) == 'Invalid Date') {
                ++error;
            }
            if ($.trim(aft_date) == 'Invalid Date') {
                ++error;
            }

            console.log(limitDay);

            if (error > 0) {
                // alert('kosong');
                $('#modalperiodenull').modal('show')
                lblbef_date.style.visibility = 'visible';
                lblaft_date.style.visibility = 'visible';
            } else if (limitDay > 0) {
                $('#modallimitday').modal('show')
            } else {
                var bef_year = bef_date.getFullYear();
                var bef_month = bef_date.getMonth() + 1;
                var bef_day = bef_date.getDate();

                var aft_year = aft_date.getFullYear();
                var aft_month = aft_date.getMonth() + 1;
                var aft_day = aft_date.getDate();
                // alert('isi');

                $.ajax({
                    processing: false,
                    serverSide: false,
                    async: false,
                    type: "POST",
                    url: "<?php echo base_url('index.php/SVC_GetAjax/cari_laporan_pegawaiPimp_ajax') ?>",
                    dataType: "JSON",
                    data: {
                        id_emp: id_emp,
                        tanggal: bef_day,
                        bulan: bef_month,
                        tahun: bef_year,
                        stanggal: aft_day,
                        sbulan: aft_month,
                        stahun: aft_year,
                    },
                    success: function(data) {
                        // console.log(data);
                        // window.location.href = "<?php echo base_url('index.php/Pimpinan/daftarLaporanPegawai') ?>"
                        tampil_data_laporan();
                    },
                    error: function() {
                        alert('Maaf data tidak tersedia');

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
                // console.log(data);
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    moment.locale('id');
                    var date1 = new Date(data[i].waktu);

                    var formattedtanggal = moment(date1).format('dddd, DD MMMM YYYY');

                    var time1 = data[i].dari;
                    var time2 = data[i].sampai;

                    var formattedtime1 = moment(time1, 'HH:mm:ss').format('HH:mm');
                    var formattedtime2 = moment(time2, 'HH:mm:ss').format('HH:mm');

                    html += '<tr>' +
                        '<td style="text-align: center;">' + formattedtanggal + '</td>' +
                        '<td style="text-align: center;">' + formattedtime1 + '</td>' +
                        '<td style="text-align: center;">' + formattedtime2 + '</td>' +
                        '<td style="text-align: left;">' + data[i].pelaksanaan_kegiatan + '</td>' +
                        '<td style="text-align: center;">' + data[i].surat_dikerjakan + '</td>' +
                        // '<td style="text-align: center;">' + data[i].tindak_lanjut + '</td>' +
                        //     '<td style="text-align: justify;"> <a href ='
                        // <?php base_url() ?> + 'LaporanPegawai/' + data[i].lap_detail_id + 'class="btn btn-info"><i class="fas fa-edit"></i><span> Lihat Laporan</span></a > </td>' +
                        //     '<td style="text-align: justify;"> <a href ='
                        // <?php base_url() ?> + 'LaporanPegawai/' + data[i].lap_detail_id + ' class="btn btn-info"><i class="fas fa-edit"></i><span> Lihat Laporan</span></a > </td>' +
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