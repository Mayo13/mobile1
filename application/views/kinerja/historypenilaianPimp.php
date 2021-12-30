<!-- Modal Hapus -->
<div id="ModalHapus" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box bg-warning">
                    <i class="fas fa-question fa-3x"></i>
                    <!-- <i class="fas fa-times "></i> -->
                </div>
            </div>
            <div class="modal-body">
                <input type="text" name="kode" id="kode" value="" hidden>
                <h2 class="text-center">Messages</h2>
                <p style="text-align: center;">Apakah anda yakin ingin menghapus penilaian ini dari daftar?</p>
            </div>
            <div class="modal-footer">
                <button class="btn bg-info btn-block" id="btn_hapus">Hapus</button>
                <button class="btn bg-danger btn-block" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label>Ubah Penilaian</label>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="form-horizontal">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Nama PNASN</label><br>
                                <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nama'); ?></label>
                                <select name="nama" id="nama" class="form-control custom-select">
                                    <option value="">- Select Nama -</option>
                                    <?php
                                    foreach ($dataPegawai as $data) {
                                        echo '<option value="' . $data->emp_id . '" >' . $data->nama_depan . " " . $data->nama_belakang . '</option>';
                                    }
                                    ?>
                                </select>
                                <span id="nama_error" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Periode Penilaian</label><br>
                                <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('periode'); ?></label>
                                <select name="periode" id="periode" class="form-control custom-select" id="periode">
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
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Penilaian Kinerja </label><br>
                                <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('scoreKinerja'); ?></label>
                                <select name="scoreKinerja" id="scoreKinerja" class="form-control custom-select">
                                    <option value="1">Baik</option>
                                    <option value="0">Kurang Baik</option>
                                    <option value="2">Sangat Baik</option>
                                </select>
                                <span id="scoreKinerja_error" class="text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label>Penilaian Disiplin </label><br>
                                <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('scoreDisiplin'); ?></label>
                                <select name="scoreDisiplin" id="scoreDisiplin" class="form-control custom-select">
                                    <option value="1">Baik</option>
                                    <option value="0">Kurang Baik</option>
                                    <option value="2">Sangat Baik</option>
                                </select>
                                <span id="scoreDisiplin_error" class="text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label>Penilaian Kerja Sama </label><br>
                                <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('scoreKerjasama'); ?></label>
                                <select name="scoreKerjasama" id="scoreKerjasama" class="form-control custom-select">
                                    <option value="1">Baik</option>
                                    <option value="0">Kurang Baik</option>
                                    <option value="2">Sangat Baik</option>
                                </select>
                                <span id="scoreKerjasama_error" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="pelakKegiatan" id="keterangan" style="width: 100%; height: 200px;  padding: 20px;margin: 15px 0;"></textarea>
                                <!-- <textarea name="keterangan" class="keterangan" id="keterangan" style="height: 300px;">
                                                                Tuliskan <em>keterangan</em> <u>disini</u>                               
                                                                </textarea> -->
                                <span id="keterangan_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="btn_simpan" class="btn btn-primary">Simpan</button>
                    <button class="btn" id="btn_tutup" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <!-- <button class="btn btn-info" id="btn_simpan">Simpan</button> -->
                </div>
            </form>
        </div>
    </div>
</div>

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
                            <div style="margin-left: 1%; margin-top: 1%;">
                                <a href="<?php echo base_url('index.php/PenilaianKinerja/penilaianKinerja') ?>" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Tambah Penilaian</a>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="example3" class="table responive table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="vertical-align: middle; width: 12%;">Aksi</th>
                                            <th style="vertical-align: middle; width: 12%;">Tanggal Isi</th>
                                            <th style="vertical-align: middle; width: 25%;">Nama</th>
                                            <th style="vertical-align: middle; width: 12%;">Periode</th>
                                            <th style="vertical-align: middle; width: 10%;">Penilaian</th>
                                            <th style="vertical-align: middle; width: 40%;">Komentar</th>

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

        // $.fn.dataTable.moment('dddd, DD MMMM YYYY', 'MMMM YYYY');
        $.fn.dataTable.moment([
            "MMMM YYYY",
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

                    // var periode = new Date(data[i].periode.concat('-', date1.getFullYear()));
                    var periode = new Date(date1.getFullYear() + '-' + data[i].periode);
                    var date2 = new Date(data[i].created_date);
                    var formattedbulan = moment(periode).format('MMMM YYYY');
                    // console.log(periode);

                    html += '<tr>' +
                        '<td style="text-align:center;">' +
                        // '<a href="javascript:;" class="btn btn-info btn-xs item_edit" style="text-align: center; width: 80%" data="' + data[i].kinerja_id + '">Edit</a>' + ' ' +
                        '<a href="javascript:;" class="btn btn-danger btn-xs item_delete data_hapus" style="text-align: center; width: 80%" data="' + data[i].kinerja_id + '">Hapus</a>' +
                        '</td>' +
                        '<td style="text-align: center;">' + formattedtanggal + '</td>' +
                        '<td style="text-align: center;">' + data[i].nama_depan + ' ' + data[i].nama_belakang + '</td>' +
                        '<td style="text-align: center;">' + formattedbulan + '</td>' +
                        '<td style="text-align: center;">' + data[i].penilaian + '</td>' +
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

    $('#show_data').on('click', '.data_hapus', function() {
        var id = $(this).attr('data');
        $('#ModalHapus').modal('show');
        $('[name="kode"]').val(id);
    });

    $('#btn_hapus').on('click', function() {
        var kode = $('#kode').val();
        //  console.log(kode);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/SVC_Submit/submit_hapusKinerja') ?>",
            dataType: "JSON",
            data: {
                kode: kode
            },
            success: function(data) {
                $('#ModalHapus').modal('hide');
                tampil_data_laporan();
            }
        });
        return false;
    });

    //GET UPDATE
    $('#show_data').on('click', '.item_edit', function() {
        var id = $(this).attr('data');
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/SVC_Submit/pegawai_updateKegiatan') ?>",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    $('#ModalaEdit').modal('show');
                    $('#waktu_edit').val(data[i].waktu);
                    $('#iddetail_edit').val(data[i].lap_detail_id);
                    $('#waktu_edit').val(data[i].waktu);
                    $('#dari_edit').val(data[i].dari);
                    $('#sampai_edit').val(data[i].sampai);
                    $('#namaKegiatan_edit').val(data[i].kegiatan_id);
                    $('#pelakKegiatan_edit').val(data[i].pelaksanaan_kegiatan);
                    $('#jumlahSurat_edit').val(data[i].surat_dikerjakan);
                    $('#satuanKegiatan_edit').val(data[i].satuan_kegiatan);
                    //  $('#tempatKerja_edit').val(data[i].lokasi_kerja);
                    //  $('#tindakLanjut_edit').val(data[i].tindak_lanjut);
                }
            }
        });
        return false;
    });

    //Update Kegiatan
    $('#btn_update').on('click', function() {
        var iddetail_edit = $('input[name="iddetail_edit"]').val();
        var dari_edit = $('input[name="dari_edit"]').val();
        var sampai_edit = $('input[name="sampai_edit"]').val();
        var namaKegiatan_edit = $('#namaKegiatan_edit').val();
        var pelakKegiatan_edit = $('#pelakKegiatan_edit').val();
        var jumlahSurat_edit = $('input[name="jumlahSurat_edit"]').val();
        var waktu = $('input[name="waktu_edit"]').val();
        var satuanKegiatan = $('#satuanKegiatan_edit').val();
        //  var tempatKerja_edit = $('#tempatKerja_edit').val();
        //  var tindakLanjut_edit = $('#tindakLanjut_edit').val();
        var empID_edit = $('#empID_edit').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/SVC_Submit/submit_updateUraianTugas') ?>",
            dataType: "JSON",
            data: {
                iddetail: iddetail_edit,
                dari: dari_edit,
                sampai: sampai_edit,
                namaKegiatan: namaKegiatan_edit,
                pelakKegiatan: pelakKegiatan_edit,
                jumlahSurat: jumlahSurat_edit,
                waktu: waktu,
                satuanKegiatan: satuanKegiatan,
                //  tempatKerja: tempatKerja_edit,
                //  tindakLanjut: tindakLanjut_edit,
                empID: empID_edit,
            },
            success: function(data) {
                //  console.log(data);
                if (data.error) {
                    if (data.waktuEdit_error != '') {
                        $('#waktuEdit_error').html(data.dari_error);
                    } else {
                        $('#waktuEdit_error').html('');
                    }
                    if (data.dari_error != '') {
                        $('#dariEdit_error').html(data.dari_error);
                    } else {
                        $('#dariEdit_error').html('');
                    }
                    if (data.sampai_error != '') {
                        $('#sampaiEdit_error').html(data.sampai_error);
                    } else {
                        $('#sampaiEdit_error').html('');
                    }
                    if (data.namaKegiatan_error != '') {
                        $('#namaKegiatanEdit_error').html(data.namaKegiatan_error);
                    } else {
                        $('#namaKegiatanEdit_error').html('');
                    }
                    if (data.pelakKegiatan_error != '') {
                        $('#pelakKegiatanEdit_error').html(data.pelakKegiatan_error);
                    } else {
                        $('#pelakKegiatanEdit_error').html('');
                    }
                    if (data.jumlahSurat_error != '') {
                        $('#jumlahSuratEdit_error').html(data.jumlahSurat_error);
                    } else {
                        $('#jumlahSuratEdit_error').html('');
                    }
                    if (data.tempatKerja_error != '') {
                        $('#tempatKerjaEdit_error').html(data.tempatKerja_error);
                    } else {
                        $('#tempatKerjaEdit_error').html('');
                    }
                    if (data.tindakLanjut_error != '') {
                        $('#tindakLanjutEdit_error').html(data.tindakLanjut_error);
                    } else {
                        $('#tindakLanjutEdit_error').html('');
                    }
                    if (data.satuanKegiatan_error != '') {
                        $('#satuanKegiatan_error').html(data.satuanKegiatan_error);
                    } else {
                        $('#satuanKegiatan_error').html('');
                    }
                }

                if (data.success) {
                    console.log(data);
                    //  $('#success_message').html(data.success);
                    $('#waktu').val("");
                    $('#dari').val("");
                    $('#sampai').val("");
                    $('#namaKegiatan').val("");
                    $('#pelakKegiatan').val("");
                    $('#jumlahSurat').val("");
                    $('#tempatKerja').val("");
                    $('#tindakLanjut').val("");
                    $('#satuanKegiatan_error').val("");

                    $('#waktu_error').html('');
                    $('#dari_error').html('');
                    $('#sampai_error').html('');
                    $('#namaKegiatan_error').html('');
                    $('#pelakKegiatan_error').html('');
                    $('#jumlahSurat_error').html('');
                    $('#tempatKerja_error').html('');
                    $('#tindakLanjut_error').html('');
                    $('#satuanKegiatan_error').html('');

                    //  $('#jenis').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_kegiatan();
                }

            },
            //  success: function(data) {
            //      //  $('[name="waktu_edit"]').val("");
            //      //  $('[name="dari_edit"]').val("");
            //      //  $('[name="sampai_edit"]').val("");
            //      $('#waktu').val("");
            //      $('#dari').val("");
            //      $('#sampai').val("");
            //      $('#namaKegiatan').val("");
            //      $('#pelakKegiatan').val("");
            //      $('#jumlahSurat').val("");
            //      $('#tempatKerja').val("");
            //      $('#tindakLanjut').val("");
            //      $('#ModalaEdit').modal('hide');
            //      tampil_data_barang();
            //  },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                //  console.log(data);
                //  $('#btn_simpan').text('save'); //change button text
                //  $('#btn_simpan').attr('disabled', false); //set button enable 

            },
        });
        return false;
    });

    $('#btn_simpan').on('click', function() {
        var nama = $('#nama').val();
        var periode = $('#periode').val();
        var scoreKinerja = $('#scoreKinerja').val();
        var scoreDisiplin = $('#scoreDisiplin').val();
        var scoreKerjasama = $('#scoreKerjasama').val();
        var keterangan = $('#keterangan').val();

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
</script>
</body>

</html>