<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Penilaian Pimpinan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 col-sm-12 col-lg-5">
                                    <div class="form-group">
                                        <h3 class="card-title">Periode : </h3><br>
                                        <input type="month" id="periode" name="periode">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-lg-3">
                                    <button style="width: 100%;" class="btn btn-primary" id="btn_cari"><i class="fas fa-search"></i> Cari Laporan</button>
                                </div>
                            </div>
                            <br>

                            <div class="table-responsive">
                                <table id="example3" class="table responive table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th rowspan="2" scope="col" style="vertical-align: middle; width: 25%;">Nama</th>
                                            <th colspan="3" scope="colgroup" style="vertical-align: middle; width: 25%;">Penilaian</th>
                                            <th rowspan="2" scope="col" style="vertical-align: middle; width: 25%;">Komentar</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" style="text-align: center; width: 8%;">Kinerja</th>
                                            <th scope="col" style="text-align: center; width: 8%;">Disiplin</th>
                                            <th scope="col" style="text-align: center; width: 8%;">Kerja Sama</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
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
<!-- AdminLTE App -->
<!-- <script src="<?php echo base_url() ?>asset/dist/js/adminlte.min.js"></script> -->
<!-- Page specific script -->
<script>
    $(document).ready(function() {
        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    });

    tampil_data_laporan();


    // $(function() {
    //     $("#example3").DataTable({
    //         "responsive": true,
    //         "lengthChange": false,
    //         "autoWidth": false,
    //     }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    // });

    $(document).ready(function() {
        // count date between 2 date
        const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        const firstDate = new Date(2008, 1, 12);
        const secondDate = new Date(2009, 1, 22);


        // $('#btn_carix').on('click', function() {
        //     var bef_date = new Date($('#bef_date').val());
        //     var aft_date = new Date($('#aft_date').val());
        //     var id_emp = $('#nama_pegawai').val();

        //     const diffDays = Math.round(Math.abs((bef_date - aft_date) / oneDay));
        //     // console.log(aft_date);

        //     var error = 0;
        //     var limitDay = 0;
        //     console.log(limitDay);
        //     if (diffDays > 60) {
        //         // ++error;
        //         limitDay = 1;
        //     }
        //     if ($.trim(bef_date) == 'Invalid Date') {
        //         ++error;
        //     }
        //     if ($.trim(aft_date) == 'Invalid Date') {
        //         ++error;
        //     }

        //     console.log(limitDay);

        //     if (error > 0) {
        //         // alert('kosong');
        //         $('#modalperiodenull').modal('show')
        //         lblbef_date.style.visibility = 'visible';
        //         lblaft_date.style.visibility = 'visible';
        //     } else if (limitDay > 0) {
        //         $('#modallimitday').modal('show')
        //     } else {
        //         var bef_year = bef_date.getFullYear();
        //         var bef_month = bef_date.getMonth() + 1;
        //         var bef_day = bef_date.getDate();

        //         var aft_year = aft_date.getFullYear();
        //         var aft_month = aft_date.getMonth() + 1;
        //         var aft_day = aft_date.getDate();
        //         // alert('isi');

        //         $.ajax({
        //             type: "POST",
        //             url: "<?php echo base_url('index.php/SVC_GetAjax/cari_laporan_pegawaiPimp_ajax') ?>",
        //             dataType: "JSON",
        //             data: {
        //                 id_emp: id_emp,
        //                 tanggal: bef_day,
        //                 bulan: bef_month,
        //                 tahun: bef_year,
        //                 stanggal: aft_day,
        //                 sbulan: aft_month,
        //                 stahun: aft_year,
        //             },
        //             success: function(data) {
        //                 console.log(data);
        //                 window.location.href = "<?php echo base_url('index.php/Pimpinan/daftarLaporanPegawai') ?>"
        //                 tampil_data_laporan();
        //             },
        //             error: function() {
        //                 alert('Maaf data tidak tersedia');

        //             }
        //         });
        //         return false;
        //     }
        // });
    });

    $(document).ready(function() {
        // function initResultDataTable() {
        //     $("#example3").DataTable({
        //         "responsive": true,
        //         "lengthChange": false,
        //         "autoWidth": false,
        //     }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
        // }

        $('#btn_cari').on('click', function() {
            var periode = $('#periode').val();
            console.log(periode);
            $.ajax({
                processing: false,
                serverSide: false,
                async: false,
                url: '<?= base_url() ?>index.php/SVC_GetAjax/save_periode_daftar_penilaian_pimpinan_ajax',
                type: "post",
                dataType: 'json',
                delay: 250,
                async: false,
                data: {
                    periode: periode,
                },
                success: function(data) {
                    tampil_data_laporan();
                    window.location.href = "<?php echo base_url('index.php/PenilaianKinerja/daftarkinerja') ?>"
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

    function tampil_data_laporan() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>index.php/SVC_GetAjax/cari_daftar_penilaian_pimpinan_ajax',
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var score1;
                var score2;
                var score3;
                var keterangan;
                var i;
                var customStyle;

                for (i = 0; i < data.length; i++) {

                    if (data[i].keterangan == null) {
                        customStyle = "color:red;";
                    } else {
                        customStyle = "color:green;";
                    }

                    html += '<tr>' +
                        '<td style="text-align: center;' + customStyle + '"> ' + data[i].nama_depan + ' ' + data[i].nama_belakang + '</td>';

                    switch (parseInt(data[i].kinerja)) {
                        case 0:
                            score1 = "Kurang Baik";
                            break;
                        case 1:
                            score1 = "Baik";
                            break;
                        case 2:
                            score1 = "Sangat Baik";
                            break;
                        default:
                            score1 = "Kosong";
                    }

                    html +=
                        '<td style="text-align: center;' + customStyle + '">' + data[i].kinerja + '</td>';

                    switch (parseInt(data[i].disiplin)) {
                        case 0:
                            score2 = "Kurang Baik";
                            break;
                        case 1:
                            score2 = "Baik";
                            break;
                        case 2:
                            score2 = "Sangat Baik";
                            break;
                        default:
                            score2 = "Kosong";
                    }

                    html +=
                        '<td style="text-align: center;' + customStyle + '">' + data[i].kinerja + '</td>';

                    switch (parseInt(data[i].kerja_sama)) {
                        case 0:
                            score3 = "Kurang Baik";
                            break;
                        case 1:
                            score3 = "Baik";
                            break;
                        case 2:
                            score3 = "Sangat Baik";
                            break;
                        default:
                            score3 = "Kosong";
                    }

                    html +=
                        '<td style="text-align: center;' + customStyle + '">' + data[i].kinerja + '</td>';

                    if (data[i].keterangan == null) {
                        keterangan = "Kosong";
                    } else {
                        keterangan = data[i].keterangan;
                    }
                    html +=
                        '<td style=" text-align: justify; text-justify: inter-word;' + customStyle + '">' + keterangan + '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);

                // $('#show_data').html(html);
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