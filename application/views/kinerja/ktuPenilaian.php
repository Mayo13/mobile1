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
                    <p style="text-align: center;">Error On Time Periode</p>
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

    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">

    </section> -->

    <!-- Main content -->

    <!-- /.content -->

    <!-- Main content -->
    <br>

    <div class="container-fluid">
        <!-- Card Base -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Penilaian Kinerja</h3>
            </div>

            <!-- <div class="card-body table-responsive">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-lg-3">
                        <div class="form-group">
                            <select name="id_emp" class="form-control custom-select" id="id_emp">
                                <option value="" disabled selected>Pilih Nama Pegawai</option>
                                <?php
                                foreach ($dataPegawai as $data) {
                                    echo '<option value="' . $data->emp_id . '" >' . $data->nama_depan . " " . $nama_belakang . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 col-lg-9">
                        <button class="btn btn-primary" id="btn_cari"><i class="fas fa-search"></i> Lihat Laporan bulan ini</button>
                    </div>
                    <br>
                </div>

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
            </div> -->

            <div class="card-body">
                <!-- form biodata -->
                <!-- <div class="card card-default">
                        <div class="card-body"> -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <!-- <div class="card-header">
                                    <h3 class="card-title">Form Input Penilaian</h3>
                                </div> -->

                            <!-- <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>index.php/xxx/submit_kinerjaPegawai"> -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Informasi</h3>
                                                </div>
                                                <div class="card-body">
                                                    <p>Catatan</p>
                                                    <p>Penilaian kinerja PNASN akan menghasilkan kesimpulan sebagai berikut:</p>
                                                    <ul>
                                                        <li>
                                                            Sangat Baik, apabila PNASN memiliki nilai dengan angka 90 ≤ x ≤ 100;
                                                        </li>
                                                        <li>
                                                            Baik, apabila PNASN memiliki nilai dengan angka 75 ≤ x < 90; </li>
                                                        <li>
                                                            Cukup, apabila PNASN memiliki nilai dengan angka 50 ≤ x < 75; </li>
                                                        <li>
                                                            Kurang, apabila PNASN memiliki nilai dengan angka < 50. </li>

                                                    </ul>

                                                </div>
                                            </div>

                                            <div class="card card-primary">
                                                <!-- <div class="card-header">
                                                    <h3 class="card-title">Informasi</h3>
                                                </div> -->
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Nama PNASN</label><br>
                                                        <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nama'); ?></label>
                                                        <select name="nama" id="nama" class="form-control custom-select" style="width:50%">
                                                            <option value="">- Select Nama -</option>
                                                            <?php
                                                            foreach ($dataPegawai as $data) {
                                                                echo '<option value="' . $data->emp_id . '" >' . $data->nama_depan . " " . $data->nama_belakang . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                        <span id="nama_error" class="text-danger"></span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Periode Penilaian</label><br>
                                                        <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('periode'); ?></label>
                                                        <select name="periode" id="periode" class="form-control custom-select" id="periode" style="width:50%">
                                                            <option value="">- Select Periode -</option>
                                                            <option value="1">Januari</option>
                                                            <option value="2">Februari</option>
                                                            <option value="3">Maret</option>
                                                            <option value="4">April</option>
                                                            <option value="5">Mai</option>
                                                            <option value="6">Juni</option>
                                                            <option value="7">Juli</option>
                                                            <option value="8">Agustus</option>
                                                            <option value="9">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                        <span id="periode_error" class="text-danger"></span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Komentar</label>
                                                        <textarea name="keterangan" class="pelakKegiatan" id="keterangan" style="width: 100%; height: 200px;  padding: 20px;margin: 15px 0;"></textarea>
                                                        <span id="keterangan_error" class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-6 col-sm-12">
                                            <table id="tender" class="table table-bordered">
                                                <thead style="text-align: center;">
                                                    <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">Informasi Penilaian</th>
                                                        <th scope="col">Point Penilaian</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <h4>Integritas</h4>
                                                            <p>Kemampuan PNASN dalam menjunjung tinggi kode etik dan prinsip-prinsip moral secara
                                                                jujur dan konsisten.</p>
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" name="integritas" id="integritas" placeholder="">
                                                                <span id="integritas_error" class="text-danger"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>
                                                            <h4>Komitmen</h4>
                                                            <p> Kemampuan PNASN untuk menyelaraskan sikap dan tindakan dalam mewujudkan
                                                                tujuan organisasi dengan mengutamakan kepentingan organisasi.</p>
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" name="komitmen" id="komitmen" placeholder="">
                                                                <span id="komitmen_error" class="text-danger"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>
                                                            <h4>Kualitas pekerjaan</h4>
                                                            <p> Kemampuan PNASN dalam melaksanakan tugas dan tanggung jawab dengan hasil
                                                                yang sesuai dengan pencapaian tujuan dan sasaran organisasi dengan efektif dan
                                                                efisien.</p>
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" name="kualitas" id="kualitas" placeholder="">
                                                                <span id="kualitas_error" class="text-danger"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td>
                                                            <h4>Kuantitas Pekerjaan</h4>
                                                            <p> kemampuan PNASN dalam menyelesaikan tugasnya dengan memperhatikan target
                                                                volume pekerjaan yang telah ditentukan.</p>
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" name="kuantitas" id="kuantitas" placeholder="">
                                                                <span id="kuantitas_error" class="text-danger"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">5</th>
                                                        <td>
                                                            <h4>Inisiatif</h4>
                                                            <p> Kemauan PNASN untuk memutuskan dan memulai sesuatu tindakan yang selaras
                                                                dengan tujuan organisasi.</p>
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" name="inisiatif" id="inisiatif" placeholder="">
                                                                <span id="inisiatif_error" class="text-danger"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">6</th>
                                                        <td>
                                                            <h4>Kerjasama</h4>
                                                            <p> Kemampuan PNASN untuk bekerjasama dengan pejabat/ pegawai maupun rekan kerja
                                                                dalam menyelesaikan tugas dan tanggung jawab yang ditentukan.</p>
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" name="kerjasama" id="kerjasama" placeholder="">
                                                                <span id="kerjasama_error" class="text-danger"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">7</th>
                                                        <td>
                                                            <h4>Tanggung Jawab</h4>
                                                            <p> Kemampuan PNASN dalam melaksanakan dan menyelesaikan tugas dengan sebaik-
                                                                baiknya dan berani mengambil resiko atas keputusan yang diambil dan tindakan yang
                                                                dilakukan.</p>
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" name="tanggungjwb" id="tanggungjwb" placeholder="">
                                                                <span id="tanggungjwb_error" class="text-danger"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">8</th>
                                                        <td>
                                                            <h4>Disiplin</h4>
                                                            <p>Sikap dan Tindakan PNASN untuk menaati kewajiban dan menghindari larangan yang
                                                                ditentukan dalam peraturan yang berlaku.</p>
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" name="disiplin" id="disiplin" placeholder="">
                                                                <span id="disiplin_error" class="text-danger"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">9</th>
                                                        <td>
                                                            <h4>Penyesuaian Diri</h4>
                                                            <p> Kemampuan PNASN dalam beradaptasi dan berkomunikasi dengan baik terhadap
                                                                pejabat/ pegawai maupun rekan kerja.</p>
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" name="penyesuaian" id="penyesuaian" placeholder="">
                                                                <span id="penyesuaian_error" class="text-danger"></span>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">10</th>
                                                        <td>
                                                            <h4>Penampilan</h4>
                                                            <p> Kemauan PNASN dalam merepresentasikan citra diri dan kepribadian melalui cara
                                                                berpakaian.</p>
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <div class="custom-file">
                                                                <input type="text" class="form-control" name="penampilan" id="penampilan" placeholder="">
                                                                <span id="penampilan_error" class="text-danger"></span>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <!-- <div class="form-group">
                                                <label>Penilaian Kinerja </label><br>
                                                <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('scoreKinerja'); ?></label>
                                                <select name="scoreKinerja" id="scoreKinerja" class="form-control custom-select" style="width:50%">
                                                    <option value="1">Baik</option>
                                                    <option value="0">Kurang Baik</option>
                                                    <option value="2">Sangat Baik</option>
                                                </select>
                                                <span id="scoreKinerja_error" class="text-danger"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Penilaian Disiplin </label><br>
                                                <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('scoreDisiplin'); ?></label>
                                                <select name="scoreDisiplin" id="scoreDisiplin" class="form-control custom-select" style="width:50%">
                                                    <option value="1">Baik</option>
                                                    <option value="0">Kurang Baik</option>
                                                    <option value="2">Sangat Baik</option>
                                                </select>
                                                <span id="scoreDisiplin_error" class="text-danger"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Penilaian Kerja Sama </label><br>
                                                <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('scoreKerjasama'); ?></label>
                                                <select name="scoreKerjasama" id="scoreKerjasama" class="form-control custom-select" style="width:50%">
                                                    <option value="1">Baik</option>
                                                    <option value="0">Kurang Baik</option>
                                                    <option value="2">Sangat Baik</option>
                                                </select>
                                                <span id="scoreKerjasama_error" class="text-danger"></span>
                                            </div> -->
                                        </div>



                                    </div>
                                </div>

                                <div class="card-footer">
                                    <!-- <div class="modal-footer">-->
                                    <button type="button" id="btn_simpan" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/PenilaianKinerja/daftarkinerjaKtu">History Penilaian</a>
                                    <!-- <button class="btn" id="btn_tutup" data-dismiss="modal" aria-hidden="true">Tutup</button> -->
                                    <!-- <button class="btn btn-info" id="btn_simpan">Simpan</button> -->
                                    <!-- </div>-->
                                    <!-- <button type="submit" class="btn btn-primary">Kirim</button>
                                        <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/PenilaianKinerja/PenilaianKinerja">Kembali</a> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>




        </div><!-- /.card base -->

    </div><!-- /.container-fluid -->
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
        // var scoreKinerja = $('#scoreKinerja').val();
        // var scoreDisiplin = $('#scoreDisiplin').val();
        // var scoreKerjasama = $('#scoreKerjasama').val();

        var integritas = $('#integritas').val();
        var komitmen = $('#komitmen').val();
        var kualitas = $('#kualitas').val();
        var kuantitas = $('#kuantitas').val();
        var inisiatif = $('#inisiatif').val();
        var kerjasama = $('#kerjasama').val();
        var tanggungjwb = $('#tanggungjwb').val();
        var disiplin = $('#disiplin').val();
        var penyesuaian = $('#penyesuaian').val();
        var penampilan = $('#penampilan').val();

        var keterangan = $('#keterangan').val();

        // var pelakKegiatan = $('#pelakKegiatan').val();
        // var jumlahSurat = $('input[name="jumlahSurat"]').val();
        // var tempatKerja = $('#tempatKerja').val();
        // var tindakLanjut = $('#tindakLanjut').val();
        // var empID = $('#empID').val();
        // console.log(scoreKerjasama);
        // console.log(scoreDisiplin);
        // console.log(scoreKinerja);
        // console.log(keterangan);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/SVC_Submit/submit_kinerjaPegawai') ?>",
            dataType: "JSON",
            data: {
                nama: nama,
                integritas: integritas,
                komitmen: komitmen,
                kualitas: kualitas,
                kuantitas: kuantitas,
                inisiatif: inisiatif,
                kerjasama: kerjasama,
                tanggungjwb: tanggungjwb,
                disiplin: disiplin,
                penyesuaian: penyesuaian,
                penampilan: penampilan,
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
                    // if (data.scoreKinerja_error != '') {
                    //     $('#scoreKinerja_error').html(data.scoreKinerja_error);
                    // } else {
                    //     $('#scoreKinerja_error').html('');
                    // }
                    // if (data.scoreDisiplin_error != '') {
                    //     $('#scoreDisiplin_error').html(data.scoreDisiplin_error);
                    // } else {
                    //     $('#score_error').html('');
                    // }
                    // if (data.scoreKerjasama_error != '') {
                    //     $('#scoreKerjasama_error').html(data.scoreKerjasama_error);
                    // } else {
                    //     $('#scoreKerjasama_error').html('');
                    // }
                    if (data.periode_error != '') {
                        $('#periode_error').html(data.periode_error);
                    } else {
                        $('#periode_error').html('');
                    }
                    if (data.integritas_error != '') {
                        $('#integritas_error').html(data.integritas_error);
                    } else {
                        $('#integritas_error').html('');
                    }
                    if (data.komitmen_error != '') {
                        $('#komitmen_error').html(data.komitmen_error);
                    } else {
                        $('#komitmen_error').html('');
                    }
                    if (data.kualitas_error != '') {
                        $('#kualitas_error').html(data.kualitas_error);
                    } else {
                        $('#kualitas_error').html('');
                    }
                    if (data.kuantitas_error != '') {
                        $('#kuantitas_error').html(data.kuantitas_error);
                    } else {
                        $('#kuantitas_error').html('');
                    }
                    if (data.inisiatif_error != '') {
                        $('#inisiatif_error').html(data.inisiatif_error);
                    } else {
                        $('#inisiatif_error').html('');
                    }
                    if (data.kerjasama_error != '') {
                        $('#kerjasama_error').html(data.kerjasama_error);
                    } else {
                        $('#kerjasama_error').html('');
                    }
                    if (data.tanggungjwb_error != '') {
                        $('#tanggungjwb_error').html(data.tanggungjwb_error);
                    } else {
                        $('#tanggungjwb_error').html('');
                    }
                    if (data.disiplin_error != '') {
                        $('#disiplin_error').html(data.disiplin_error);
                    } else {
                        $('#disiplin_error').html('');
                    }
                    if (data.penyesuaian_error != '') {
                        $('#penyesuaian_error').html(data.penyesuaian_error);
                    } else {
                        $('#penyesuaian_error').html('');
                    }
                    if (data.penampilan_error != '') {
                        $('#penampilan_error').html(data.penampilan_error);
                    } else {
                        $('#penampilan_error').html('');
                    }
                    if (data.keterangan_error != '') {
                        $('#keterangan_error').html(data.keterangan_error);
                    } else {
                        $('#keterangan_error').html('');
                    }
                    if (data.nama_error != '') {
                        alert(data.nama_error);
                    }

                }

                if (data.success) {
                    //  $('#success_message').html(data.success);
                    $('#nama').val("");
                    $('#periode').val("");
                    $('#summernote').val("");

                    $('#integritas').val("");
                    $('#komitmen').val("");
                    $('#kualitas').val("");
                    $('#kuantitas').val("");
                    $('#inisiatif').val("");
                    $('#kerjasama').val("");
                    $('#tanggungjwb').val("");
                    $('#disiplin').val("");
                    $('#penyesuaian').val("");
                    $('#penampilan').val("");

                    $('#nama').html('');
                    $('#periode').html('');
                    // $('#scoreKinerja').html('');
                    // $('#scoreDisiplin').html('');
                    // $('#scoreKerjasama').html('');
                    $('#summernote').html('');

                    $('#integritas').html('');
                    $('#komitmen').html('');
                    $('#kualitas').html('');
                    $('#kuantitas').html('');
                    $('#inisiatif').html('');
                    $('#kerjasama').html('');
                    $('#tanggungjwb').html('');
                    $('#disiplin').html('');
                    $('#penyesuaian').html('');
                    $('#penampilan').html('');
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