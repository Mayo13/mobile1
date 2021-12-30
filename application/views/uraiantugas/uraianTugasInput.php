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
                     <p style="text-align: center;">Input Kegiatan Berhasil</p>
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
                     <p style="text-align: center;">Input Kegiatan Gagal, Harap Cek Kembali form isian anda !!!</p>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                 </div>
             </div>
         </div>
     </div>

     <div id="ModalErrorFormSave" class="modal fade">
         <div class="modal-dialog modal-confirm">
             <div class="modal-content">
                 <div class="modal-header">
                     <div class="icon-box">
                         <i class="fas fa-times fa-3x"></i>
                     </div>
                 </div>
                 <div class="modal-body">
                     <h2 class="text-center">Messages</h2>
                     <p style="text-align: center;">Simpan Kegiatan Gagal, Harap Cek Waktu kegiatan anda !!!</p>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                 </div>
             </div>
         </div>
     </div>


     <!-- Modal Error -->
     <div id="ModalErrorForm" class="modal fade">
         <div class="modal-dialog modal-confirm">
             <div class="modal-content">
                 <div class="modal-header">
                     <div class="icon-box">
                         <i class="fas fa-times fa-3x"></i>
                     </div>
                 </div>
                 <div class="modal-body">
                     <h2 class="text-center">Messages</h2>
                     <p style="text-align: center;">Input Kegiatan Gagal, Harap Cek Kembali form isian anda !!!</p>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
                 </div>
             </div>
         </div>
     </div>

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
                     <p style="text-align: center;">Apakah anda yakin ingin menghapus kegiatan ini dari daftar?</p>
                 </div>
                 <div class="modal-footer">
                     <button class="btn bg-info btn-block" id="btn_hapus">Hapus</button>
                     <button class="btn bg-danger btn-block" data-dismiss="modal">Tutup</button>
                 </div>
             </div>
         </div>
     </div>

     <!-- MODAL ADD -->
     <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <label>Tambah Jurnal</label>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 </div>
                 <form action="#" id="form" class="form-horizontal">
                     <div class="modal-body">
                         <div class="form-group">
                             <label>Pilih Waktu Kegiatan</label>
                             <input name="waktu" id="waktu" type="date" class="form-control" placeholder="">
                             <span id="waktu_error" class="text-danger"></span>
                             <input type="text" name="empID" id="empID" value="<?php echo $this->session->userdata('emp_id') ?>" hidden />
                         </div>

                         <div class="row">
                             <div class="col-md-6 col-sm-6 col-lg-6">
                                 <div class="form-group">
                                     <label>Jam Mulai</label>
                                     <input name="dari" id="dari" type="time" class="form-control" placeholder="">
                                     <span id="dari_error" class="text-danger"></span>
                                 </div>
                             </div>
                             <div class="col-md-6 col-sm-6 col-lg-6">
                                 <div class="form-group">
                                     <label>Jam selesai</label>
                                     <input name="sampai" id="sampai" type="time" class="form-control" placeholder="">
                                     <span id="sampai_error" class="text-danger"></span>
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Sasaran Kinerja</label>
                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nama'); ?></label>
                             <select name="namaKegiatan" class="form-control custom-select" id="namaKegiatan">
                                 <?php
                                    foreach ($dataKegiatan as $data) {
                                        echo '<option value="' . $data->kegiatan_id . '" >' . $data->nama .  '</option>';
                                    }
                                    ?>
                             </select>
                             <span id="namaKegiatan_error" class="text-danger"></span>
                         </div>

                         <div class="form-group">
                             <label>Pelaksanaan Kegiatan</label>
                             <textarea name="pelakKegiatan" class="pelakKegiatan" id="pelakKegiatan" style="width: 100%;  padding: 10px;margin: 5px 0;"></textarea>
                             <span id="pelakKegiatan_error" class="text-danger"></span>
                         </div>

                         <div class="suratDikerjakan">
                             <div class=" form-group">
                                 <label>Jumlah diselesaikan</label>
                                 <input style="width: 20%;" type="number" name="jumlahSurat" id="jumlahSurat" class="form-control" placeholder="" value="1">
                                 <span id="jumlahSurat_error" class="text-danger"></span>
                             </div>
                         </div>

                         <div class=" form-group">
                             <label>Satuan</label>
                             <input style="width: 60%;" type="text" name="satuanKegiatan" id="satuanKegiatan" class="form-control" placeholder="dokumen/laporan/kegiatan" value="">
                             <span id="satuanKegiatan_error" class="text-danger"></span>
                         </div>

                         <br>
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
     <!--END MODAL ADD-->

     <!-- MODAL EDIT -->
     <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <label>Ubah Jurnal</label>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 </div>
                 <form class="form-horizontal">
                     <div class="modal-body">
                         <input type="text" name="empID_edit" id="empID_edit" value="<?php echo $this->session->userdata('emp_id') ?>" hidden />
                         <input type="text" name="iddetail_edit" id="iddetail_edit" hidden />

                         <div class="form-group">
                             <label>Pilih Waktu Kegiatan</label>
                             <input name="waktu_edit" id="waktu_edit" type="date" class="form-control" placeholder="">
                             <span id="waktuEdit_error" class="text-danger"></span>
                             <!-- <input type="text" name="empID" id="empID" value="<?php echo $this->session->userdata('emp_id') ?>" hidden /> -->
                         </div>

                         <div class="row">
                             <div class="col-md-6 col-sm-6 col-lg-6">
                                 <div class="form-group">
                                     <label>Jam Mulai</label>
                                     <input name="dari_edit" id="dari_edit" type="time" class="form-control" placeholder="">
                                     <span id="dariEdit_error" class="text-danger"></span>
                                 </div>
                             </div>
                             <div class="col-md-6 col-sm-6 col-lg-6">
                                 <div class="form-group">
                                     <label>Jam selesai</label>
                                     <input name="sampai_edit" id="sampai_edit" type="time" class="form-control" placeholder="">
                                     <span id="sampaiEdit_error" class="text-danger"></span>
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Sasaran Kinerja</label>
                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nama'); ?></label>
                             <select name="namaKegiatan_edit" class="form-control custom-select" id="namaKegiatan_edit">
                                 <?php
                                    foreach ($dataKegiatan as $data) {
                                        echo '<option value="' . $data->kegiatan_id . '" >' . $data->nama .  '</option>';
                                    }
                                    ?>
                             </select>
                             <span id="namaKegiatanEdit_error" class="text-danger"></span>
                         </div>

                         <div class="form-group">
                             <label>Pelaksanaan Kegiatan</label>
                             <textarea name="pelakKegiatan_edit" class="pelakKegiatan" id="pelakKegiatan_edit" style="width: 100%;  padding: 20px;margin: 15px 0;"></textarea>
                             <span id="pelakKegiatanEdit_error" class="text-danger"></span>
                         </div>

                         <div class="suratDikerjakan">
                             <div class=" form-group">
                                 <label>Jumlah yang diselesaikan</label>
                                 <input type="number" name="jumlahSurat_edit" id="jumlahSurat_edit" class="form-control" placeholder="" value="">
                                 <span id="jumlahSuratEdit_error" class="text-danger"></span>
                             </div>
                         </div>


                         <div class=" form-group">
                             <label>Satuan</label>
                             <input style="width: 60%;" type="text" name="satuanKegiatan_edit" id="satuanKegiatan_edit" class="form-control" placeholder="dokumen/laporan/kegiatan" value="">
                             <span id="satuanKegiatan_error" class="text-danger"></span>
                         </div>

                         <br>
                     </div>

                     <div class="modal-footer">
                         <button type="button" id="btn_update" class="btn btn-primary">Simpan</button>
                         <button class="btn" id="btn_tutup" data-dismiss="modal" aria-hidden="true">Tutup</button>
                         <!-- <button class="btn btn-info" id="btn_simpan">Simpan</button> -->
                     </div>
                 </form>
             </div>
         </div>
     </div>


     <!-- Content Header (Page header) -->
     <br>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <form>
                 <!-- Card Base -->
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title">Tambah Jurnal Harian</h3>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-12 col-sm-12 col-lg-12">
                                 <div class="card card-default">
                                     <div class="card-header">
                                         <h3 class="card-title">Daftar Jurnal Harian</h3>
                                     </div>
                                     <!-- <div class="card-body"> -->
                                     <div style="margin-left: 1%; margin-top: 1%;">
                                         <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah Kegiatan</a>
                                     </div>

                                     <div class="card-body table-responsive" style=>
                                         <table id="example3" class="table responive table-bordered table-striped">
                                             <thead>
                                                 <tr style="text-align: center; width: 25%;">
                                                     <th>No.</th>
                                                     <th>Aksi</th>
                                                     <th>Tanggal</th>
                                                     <th>Jam Mulai</th>
                                                     <th>Jam selesai</th>
                                                     <th>Uraian Kegiatan</th>
                                                     <th>Jumlah selesai</th>
                                                     <th>Tanggal Isi</th>
                                                 </tr>
                                             </thead>
                                             <tbody id="show_data">

                                             </tbody>
                                         </table>
                                     </div>
                                     <!-- </div> -->
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div><!-- /.card base -->
             </form>
         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
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
 <script src=" <?php echo base_url() ?>asset/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- bs-custom-file-input -->
 <script src=" <?php echo base_url() ?>asset/plugin/bs-custom-file-input/bs-custom-file-input.min.js"></script>
 <!-- AdminLTE App -->
 <script src=" <?php echo base_url() ?>asset/js/adminlte.min.js"></script>

 <!-- AdminLTE for demo purposes -->
 <script src=" <?php echo base_url() ?>asset/js/demo.js"></script>
 <!-- Page specific script -->
 <script src="<?php echo base_url() ?>asset/plugin/summernote/summernote-bs4.min.js"></script>
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

 <script>
     //  Run Method
     tampil_data_kegiatan();

     // All Method
     $(function() {
         bsCustomFileInput.init();
     });

     $(function() {
         $('#summernote').summernote({
             toolbar: [
                 // [groupName, [list of button]]
                 ['style', ['bold', 'italic', 'underline', 'clear']],
                 ['fontsize', ['fontsize']],
                 ['color', ['color']],
                 ['para', ['ul', 'ol', 'paragraph']],
                 ['height', ['height']]
             ],
             height: 150
         });

     })

     $(document).ready(function() {
         $.fn.dataTable.moment('DD MMMM YYYY');
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


     function tampil_data_kegiatan() {
         $.ajax({
             type: 'GET',
             url: '<?php echo base_url() ?>index.php/SVC_GetAjax/daftar_kegiatan_pegawai',
             async: false,
             dataType: 'json',
             success: function(data) {
                 var html = '';
                 var i;
                 var x = 1;
                 moment.locale('id');

                 for (i = 0; i < data.length; i++) {
                     var date1 = new Date(data[i].waktu);
                     var date2 = new Date(data[i].created_date);
                     var time1 = data[i].dari;
                     var time2 = data[i].sampai;

                     //  var formattedtanggal = moment(date1).format('DD-MM-YYYY');

                     var formattedtanggal = moment(date1).format('DD MMMM YYYY');
                     var formattedtanggalisi = moment(date2).format('DD MMMM YYYY');
                     var formattedtime1 = moment(time1, 'HH:mm:ss').format('HH:mm');
                     var formattedtime2 = moment(time2, 'HH:mm:ss').format('HH:mm');
                     //  console.log(moment());

                     html += '<tr>' +
                         '<td  style="text-align: center;">' + x++ + '</td>' +
                         '<td style="text-align:center;">' +
                         '<a href="javascript:;" class="btn btn-info btn-xs item_edit" style="text-align: center; width: 80%" data="' + data[i].lap_detail_id + '">Edit</a>' + ' ' +
                         //  '<a style="width: 100%;" href="javascript:;" class="btn btn-danger btn-xs data_hapus" data="' + i + '">'
                         '<a href="javascript:;" class="btn btn-danger btn-xs item_delete data_hapus" style="text-align: center; width: 80%" data="' + data[i].lap_detail_id + '">Hapus</a>' +
                         '</td>' +
                         '<td style="text-align: center;">' + formattedtanggal + '</td>' +
                         //  '<td style="text-align: center;">' + day + '/' + month + '/' + year + '</td>' +
                         '<td style="text-align: center;">' + formattedtime1 + '</td>' +
                         '<td style="text-align: center;">' + formattedtime2 + '</td>' +
                         '<td style=" text-align: justify; text-justify: inter-word;">' + data[i].pelaksanaan_kegiatan + '</td>' +
                         '<td style="text-align: center; width: 10%">' + data[i].surat_dikerjakan + '</td>' +
                         '<td style="text-align: center; width: 10%">' + formattedtanggalisi + '</td>' +
                         '</tr>';
                 }
                 $('#show_data').html(html);
             }

         });
     }
     //  Tutup Modal
     $('#btn_tutup').on('click', function() {
         $('#waktu').val("");
         $('#dari').val("");
         $('#sampai').val("");
         $('#namaKegiatan').val("");
         $('#pelakKegiatan').val("");
         $('#jumlahSurat').val("");
         $('#tempatKerja').val("");
         $('#tindakLanjut').val("");

         $('#waktu_error').html('');
         $('#dari_error').html('');
         $('#sampai_error').html('');
         $('#namaKegiatan_error').html('');
         $('#pelakKegiatan_error').html('');
         $('#jumlahSurat_error').html('');
         $('#tempatKerja_error').html('');
         $('#tindakLanjut_error').html('');
     });

     //Simpan Data
     $('#btn_simpan').on('click', function() {
         var waktu = $('input[name="waktu"]').val();
         var dari = $('input[name="dari"]').val();
         var sampai = $('input[name="sampai"]').val();
         var namaKegiatan = $('#namaKegiatan').val();
         var pelakKegiatan = $('#pelakKegiatan').val();
         var jumlahSurat = $('input[name="jumlahSurat"]').val();
         var tempatKerja = $('#tempatKerja').val();
         var tindakLanjut = $('#tindakLanjut').val();
         var satuanKegiatan = $('#satuanKegiatan').val();
         var empID = $('#empID').val();
         //  console.log(waktu);
         $.ajax({
             type: "POST",
             url: "<?php echo base_url('index.php/SVC_Submit/submit_uraianTugas') ?>",
             dataType: "JSON",
             data: {
                 empID: empID,
                 waktu: waktu,
                 dari: dari,
                 sampai: sampai,
                 namaKegiatan: namaKegiatan,
                 pelakKegiatan: pelakKegiatan,
                 jumlahSurat: jumlahSurat,
                 satuanKegiatan: satuanKegiatan,
                 //  tempatKerja: tempatKerja,
                 //  tindakLanjut: tindakLanjut
             },
             success: function(data) {
                 console.log(data);
                 if (data.error) {
                     if (data.waktu_error != '') {
                         $('#waktu_error').html(data.waktu_error);
                     } else {
                         $('#waktu_error').html('');
                     }
                     if (data.dari_error != '') {
                         $('#dari_error').html(data.dari_error);
                     } else {
                         $('#dari_error').html('');
                     }
                     if (data.sampai_error != '') {
                         $('#sampai_error').html(data.sampai_error);
                     } else {
                         $('#sampai_error').html('');
                     }
                     if (data.namaKegiatan_error != '') {
                         $('#namaKegiatan_error').html(data.namaKegiatan_error);
                     } else {
                         $('#namaKegiatan_error').html('');
                     }
                     if (data.pelakKegiatan_error != '') {
                         $('#pelakKegiatan_error').html(data.pelakKegiatan_error);
                     } else {
                         $('#pelakKegiatan_error').html('');
                     }
                     if (data.jumlahSurat_error != '') {
                         $('#jumlahSurat_error').html(data.jumlahSurat_error);
                     } else {
                         $('#jumlahSurat_error').html('');
                     }
                     if (data.tempatKerja_error != '') {
                         $('#tempatKerja_error').html(data.tempatKerja_error);
                     } else {
                         $('#tempatKerja_error').html('');
                     }
                     if (data.tindakLanjut_error != '') {
                         $('#tindakLanjut_error').html(data.tindakLanjut_error);
                     } else {
                         $('#tindakLanjut_error').html('');
                     }
                     if (data.satuanKegiatan_error != '') {
                         $('#satuanKegiatan_error').html(data.satuanKegiatan_error);
                     } else {
                         $('#satuanKegiatan_error').html('');
                     }
                 }

                 if (data.success) {
                     //  $('#success_message').html(data.success);
                     $('#waktu').val("");
                     $('#dari').val("");
                     $('#sampai').val("");
                     $('#namaKegiatan').val("");
                     $('#pelakKegiatan').val("");
                     $('#jumlahSurat').val("");
                     $('#tempatKerja').val("");
                     $('#tindakLanjut').val("");
                     $('#satuanKegiatan').val("");

                     $('#waktu_error').html('');
                     $('#dari_error').html('');
                     $('#sampai_error').html('');
                     $('#namaKegiatan_error').html('');
                     $('#pelakKegiatan_error').html('');
                     $('#jumlahSurat_error').html('');
                     $('#tempatKerja_error').html('');
                     $('#tindakLanjut_error').html('');
                     $('#satuanKegiatan_error').html('');

                     tampil_data_kegiatan();
                     //  window.location.href = "<?php echo base_url('index.php/UraianTugas/uraianTugasInput') ?>"
                     $('#ModalaAdd').modal('hide');
                     $('#myModal202').modal('show');

                     //  tampil_data_kegiatan();
                 }
             },
             error: function(data, jqXHR, textStatus, errorThrown) {
                 alert('Error adding / update data');
                 console.log(textStatus);
                 console.log(data);
                 console.log(jqXHR);
                 console.log(errorThrown);
                 $('#btn_simpan').text('save'); //change button text
                 $('#btn_simpan').attr('disabled', false); //set button enable 

             },
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
             url: "<?php echo base_url('index.php/SVC_Submit/submit_hapusUraianTugas') ?>",
             dataType: "JSON",
             data: {
                 kode: kode
             },
             success: function(data) {
                 $('#ModalHapus').modal('hide');
                 tampil_data_kegiatan();
             }
         });
         return false;
     });

     //  //delete record to database
     //  $('#btn_delete').on('click', function() {
     //      var product_code = $('#product_code_delete').val();
     //      $.ajax({
     //          type: "POST",
     //          url: "<?php echo site_url('product/delete') ?>",
     //          dataType: "JSON",
     //          data: {
     //              product_code: product_code
     //          },
     //          success: function(data) {
     //              $('[name="product_code_delete"]').val("");
     //              $('#Modal_Delete').modal('hide');
     //              show_product();
     //          }
     //      });
     //      return false;
     //  });
 </script>

 </body>

 </html>