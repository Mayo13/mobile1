<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>History Penilaian PNASN</h1>
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
                        <div class="card-header">
                            <h3 class="card-title">Daftar Penilaian</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <br>
                            <div class="table-responsive">
                                <table id="example3" class="table responive table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="vertical-align: middle; width: 12%;">Tanggal Isi</th>
                                            <th style="vertical-align: middle; width: 25%;">Nama</th>
                                            <th style="vertical-align: middle; width: 12%;">Periode</th>
                                            <th style="vertical-align: middle; width: 10%;">Penilaian</th>
                                            <th style="vertical-align: middle; width: 40%;">Keterangan</th>

                                        </tr>
                                    </thead>
                                    <tbody id="show_data">

                                        <!-- <?php
                                                foreach ($listPegawai as $data) {
                                                    // $ciphertext = $this->encryption->encrypt($data->emp_id);
                                                    // $urisafe = strtr($ciphertext, '+/=', '-_~');

                                                    echo "<tr>";
                                                    echo "<td style='text-align: center;'>" . $data->created_date . "</td>";
                                                    echo "<td style='text-align: center;'>" . $data->nama_depan . " " . $data->nama_belakang . "</td>";


                                                    $time = strtotime($data->created_date);
                                                    $year = date("Y", $time);

                                                    switch (substr($data->periode, 0, -3)) {
                                                        case 1:
                                                            $bulan = "Januari";
                                                            break;
                                                        case 2:
                                                            $bulan = "Februari";
                                                            break;
                                                        case 3:
                                                            $bulan = "Maret";
                                                            break;
                                                        case 4:
                                                            $bulan = "April";
                                                            break;
                                                        case 5:
                                                            $bulan = "Mei";
                                                            break;
                                                        case 6:
                                                            $bulan = "Juni";
                                                            break;
                                                        case 7:
                                                            $bulan = "Juli";
                                                            break;
                                                        case 8:
                                                            $bulan = "Agustus";
                                                            break;
                                                        case 9:
                                                            $bulan = "September";
                                                            break;
                                                        case 10:
                                                            $bulan = "Oktober";
                                                            break;
                                                        case 11:
                                                            $bulan = "November";
                                                            break;
                                                        case 12:
                                                            $bulan = "Desember";
                                                            break;
                                                    }
                                                    echo "<td style='text-align: center;'>" . $bulan . "</td>";

                                                    switch ($data->penilaian) {
                                                        case 0:
                                                            $score = "Kurang Baik";
                                                            break;
                                                        case 1:
                                                            $score = "Baik";
                                                            break;
                                                        case 2:
                                                            $score = "Sangat Baik";
                                                            break;
                                                        default:
                                                            $score = "Kosong";
                                                    }
                                                    echo "<td style='text-align: center;'>" . $data->penilaian . ' - ' . $score . "</td>";
                                                    echo "<td style='text-align: justify;'>" . $data->keterangan . "</td>";

                                                    echo "</tr>";
                                                }

                                                ?> -->
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
<script src=" <?php echo base_url() ?>asset/js/moment.js"></script>
<script src=" <?php echo base_url() ?>asset/js/moment-with-locales.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>

<!-- AdminLTE App -->
<script src=" <?php echo base_url() ?>asset/js/adminlte.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="<?php echo base_url() ?>asset/dist/js/adminlte.min.js"></script> -->
<!-- Page specific script -->
<script>
    tampil_data_laporan();

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

    function tampil_data_laporan() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>index.php/SVC_GetAjax/daftar_histori_penilaian_pimp_ajax',
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    moment.locale('id');
                    var date1 = new Date(data[i].created_date);

                    var formattedtanggal = moment(date1).format('dddd, DD MMMM YYYY');
                    // var formattedtime1 = moment(time1, 'HH:mm:ss').format('HH:mm');
                    // var formattedtime2 = moment(time2, 'HH:mm:ss').format('HH:mm');

                    var periode = data[i].periode.concat('-', date1.getFullYear());
                    var date2 = new Date(data[i].created_date);
                    var bulan = moment(date2).format('MMMM YYYY');

                    html += '<tr>' +
                        '<td style="text-align: center;">' + formattedtanggal + '</td>' +
                        '<td style="text-align: center;">' + data[i].nama_depan + ' ' + data[i].nama_belakang + '</td>' +
                        '<td style="text-align: center;">' + bulan + '</td>' +
                        '<td style="text-align: justify;">' + data[i].penilaian + '</td>' +
                        '<td style="text-align: center;">' + data[i].keterangan + '</td>' +
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

    $(document).ready(function() {
        // count date between 2 date
        const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        const firstDate = new Date(2008, 1, 12);
        const secondDate = new Date(2009, 1, 22);


        $('#btn_carix').on('click', function() {
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
                        console.log(data);
                        window.location.href = "<?php echo base_url('index.php/Pimpinan/daftarLaporanPegawai') ?>"
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
        $('#btn_cari').on('click', function() {
            var periode = $('#periode').val();
            console.log(periode);
            $.ajax({
                processing: true,
                serverSide: true,
                url: '<?= base_url() ?>index.php/SVC_GetAjax/cari_daftar_penilaian_pimpinan_ajax',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: {
                    periode: periode,
                },
                success: function(data) {
                    console.log(data);
                    var html = '';
                    var score;
                    var keterangan;
                    var i;

                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td style="text-align: center;">' + data[i].nama_depan + ' ' + data[i].nama_belakang + '</td>';
                        switch (parseInt(data[i].penilaian)) {
                            case 0:
                                score = "Kurang Baik";
                                break;
                            case 1:
                                score = "Baik";
                                break;
                            case 2:
                                score = "Sangat Baik";
                                break;
                            default:
                                score = "Kosong";
                        }

                        html +=
                            '<td style="text-align: center;">' + score + '</td>';

                        if (data[i].keterangan == null) {
                            keterangan = "Kosong";
                        } else {
                            keterangan = data[i].keterangan;
                        }
                        html +=
                            '<td style="text-align: center;">' + keterangan + '</td>' +
                            '</tr>';


                        // html += '<tr>' +
                        //     '<td style="text-align: center;">' + data[i].nama_depan + ' ' + data[i].nama_belakang + '</td>' +

                        //     '<td style="text-align: center;">' + data[i].penilaian + '</td>' +
                        //     '<td style="text-align: center;">' + data[i].keterangan + '</td>' +
                        //     '</tr>';
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

    // function tampil_data_laporan() {
    //     $.ajax({
    //         type: 'GET',
    //         url: '<?php echo base_url() ?>index.php/SVC_GetAjax/',
    //         async: false,
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data);
    //             var html = '';
    //             var i;
    //             for (i = 0; i < data.length; i++) {
    //                 html += '<tr>' +
    //                     '<td style="text-align: center;">' + data[i].waktu + '</td>' +
    //                     '<td style="text-align: center;">' + data[i].dari + ' - ' + data[i].sampai + '</td>' +
    //                     '<td style="text-align: center;">' + data[i].pelaksanaan_kegiatan + '</td>' +
    //                     '<td style="text-align: center;">' + data[i].surat_dikerjakan + '</td>' +
    //                     '</tr>';
    //             }
    //             $('#show_data').html(html);


    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             // alert(xhr.status);
    //             // alert(thrownError);
    //             console.log("Data Kosong");
    //         }

    //     });
    // }
</script>
</body>

</html>