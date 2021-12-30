<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Absensi Harian</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
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
                                            <td><i class="fa fa-3x fa-<?= ($absen < 2) ? "warning text-warning" : "check-circle-o text-success" ?>"></i></td>
                                            <td><?= tgl_hari(date('d-m-Y')) ?></td>
                                            <td>
                                                <a href="<?= base_url('absensi/absen/masuk') ?>" class="btn btn-primary btn-sm btn-fill" <?= ($absen == 1) ? 'disabled style="cursor:not-allowed"' : '' ?>>Absen Masuk</a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('absensi/absen/pulang') ?>" class="btn btn-success btn-sm btn-fill" <?= ($absen !== 1 || $absen == 2) ? 'disabled style="cursor:not-allowed"' : '' ?>>Absen Pulang</a>
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
<!-- Page specific script -->
<script src="<?php echo base_url() ?>asset/plugin/summernote/summernote-bs4.min.js"></script>
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
        // const d = new Date();
        // var month = d.getMonth() + 1;
        // var year = d.getFullYear();
        // var afd = year + '-0' + month + "-01";
        // var dateString = '' + year + '-' + month;
        // var a = new Date(afd);
        // // var dt = new Date();
        // // var date = dt.getMonth() + 1;
        // console.log(a);
    });
    // $(document).ready(function() {
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
    // });

    $(document).ready(function() {
        // var date = $('#aft_date').datepicker('getDate');
        $('#btn_cari').on('click', function() {
            const d = new Date();
            var month = d.getMonth() + 1;
            var year = d.getFullYear();
            var bef = year + '-' + month + "-01";
            var aft = year + '-' + month + "-31";
            var bef_date = new Date(bef);
            var aft_date = new Date(aft);

            if ($.trim(aft_date) == 'Invalid Date') {
                aft = year + '-0' + month + "-30";
                aft_date = new Date(aft);
            }
            // var bef_date = new Date($('#bef_date').val());
            // var aft_date = new Date($('#aft_date').val());
            var id_emp = $('#id_emp').val();
            console.log(bef);
            console.log(aft);
            // console.log($.trim(bef_date));
            console.log(aft_date);

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
            } else {
                var bef_year = bef_date.getFullYear();
                var bef_month = bef_date.getMonth() + 1;
                var bef_day = bef_date.getDate();

                var aft_year = aft_date.getFullYear();
                var aft_month = aft_date.getMonth() + 1;
                var aft_day = aft_date.getDate();
                // alert('isi');
                console.log(bef_year);
                console.log(bef_month);
                console.log(bef_day);
                console.log(aft_year);
                console.log(aft_month);
                console.log(aft_day);


                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/SVC_GetAjax/cari_laporan_pegawaiPimp_ajax') ?>",
                    dataType: "JSON",
                    async: false,
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
                        window.location.href = "<?php echo base_url('index.php/PenilaianKinerja/penilaianKinerja') ?>"

                        // $('#example3').DataTable().ajax.reload();
                        // tampil_data_laporan();

                        // $('#example3').data.reload();
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

    $('#btn_simpan').on('click', function() {
        // var nama = $('input[name="nama"]').val();
        // var periode = $('input[name="periode"]').val();
        var nama = $('#nama').val();
        var periode = $('#periode').val();
        var scoreKinerja = $('#scoreKinerja').val();
        var scoreDisiplin = $('#scoreDisiplin').val();
        var scoreKerjasama = $('#scoreKerjasama').val();
        var keterangan = $('#keterangan').val();

        // var pelakKegiatan = $('#pelakKegiatan').val();
        // var jumlahSurat = $('input[name="jumlahSurat"]').val();
        // var tempatKerja = $('#tempatKerja').val();
        // var tindakLanjut = $('#tindakLanjut').val();
        // var empID = $('#empID').val();
        console.log(scoreKerjasama);
        console.log(scoreDisiplin);
        console.log(scoreKinerja);
        // console.log(keterangan);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/SVC_Submit/submit_kinerjaPegawai') ?>",
            dataType: "JSON",
            data: {
                nama: nama,
                scoreKinerja: scoreKinerja,
                scoreDisiplin: scoreDisiplin,
                scoreKerjasama: scoreKerjasama,
                // score: score,
                periode: periode,
                keterangan: keterangan,
            },
            success: function(data) {
                console.log(data);
                if (data.error) {
                    if (data.nama_error != '') {
                        $('#nama_error').html(data.nama_error);
                    } else {
                        $('#nama_error').html('');
                    }
                    if (data.scoreKinerja_error != '') {
                        $('#scoreKinerja_error').html(data.scoreKinerja_error);
                    } else {
                        $('#scoreKinerja_error').html('');
                    }
                    if (data.scoreDisiplin_error != '') {
                        $('#scoreDisiplin_error').html(data.scoreDisiplin_error);
                    } else {
                        $('#score_error').html('');
                    }
                    if (data.scoreKerjasama_error != '') {
                        $('#scoreKerjasama_error').html(data.scoreKerjasama_error);
                    } else {
                        $('#scoreKerjasama_error').html('');
                    }
                    if (data.periode_error != '') {
                        $('#periode_error').html(data.periode_error);
                    } else {
                        $('#periode_error').html('');
                    }
                    if (data.keterangan_error != '') {
                        $('#keterangan_error').html(data.keterangan_error);
                    } else {
                        $('#keterangan_error').html('');
                    }
                }

                if (data.success) {
                    //  $('#success_message').html(data.success);
                    $('#nama').val("");
                    $('#periode').val("");
                    $('#scoreKinerja').val("");
                    $('#scoreDisiplin').val("");
                    $('#scoreKerjasama').val("");
                    $('#summernote').val("");

                    $('#nama').html('');
                    $('#periode').html('');
                    $('#scoreKinerja').html('');
                    $('#scoreDisiplin').html('');
                    $('#scoreKerjasama').html('');
                    $('#summernote').html('');
                    tampil_data_laporan();
                    window.location.href = "<?php echo base_url('index.php/PenilaianKinerja/daftarKinerjaKtu') ?>"
                }
            },
            error: function(data, jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                console.log(textStatus);
                // $('#btn_simpan').text('save'); //change button text
                $('#btn_simpan').attr('disabled', false); //set button enable 

            },
        });
        return false;
    });

    $('#summernote').summernote({
        height: "300px",
        toolbar: [
            // ['style', ['style']],
            ['font', ['bold', 'italic', 'underline']],
            // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            // ['color', ['color']],
            ['para', ['ol', 'ul', 'paragraph', 'height']],
            // ['table', ['table']],
            // ['insert', ['link']],
            // ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
        ]
    });
</script>
</body>

</html>