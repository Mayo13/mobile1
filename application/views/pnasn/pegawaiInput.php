 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Modal Sukses -->
     <div class="modal fade" id="myModal202" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header bg-primary">
                     <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                 </div>
                 <div class="modal-body">
                     <p style="text-align: center; font-size: 20pt; color: black;">Input Data Berhasil</p>
                 </div>
                 <!-- <div class="modal-footer bg-danger">
                </div> -->
             </div>
         </div>
     </div>

     <!-- Modal Gagal -->
     <div class="modal fade" id="myModal203" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header bg-danger">
                     <h5 style="font-family: Roboto; font-size: 16pt;" class="modal-title" id="exampleModalLabel">Error !!</h5>
                     <!-- <?php echo $this->session->flashdata('a203') ?> -->
                 </div>
                 <div class="modal-body">
                     <p style="text-align: center; font-family: Roboto; font-size: 16pt; color: black;"><?php echo $this->session->userdata('a203'); ?>
                         <hr />
                     </p>
                     <p style="text-align: center; font-family: Roboto; font-size: 12pt; color: black;">Harap pastikan bahwa file tersebut adalah <span style="color: red;"> gif/jpg/png/pdf</span> , memiliki <span style="color: red;"> Ukuran File Max : 5 MB </span> , serta <span style="color: red;">Lebar dan Tinggi yaitu : 2048 x 1536</span>
                         <hr />
                     </p>
                 </div>
             </div>
         </div>
     </div>

     <br> <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <!-- Card Base -->
             <div class="card card-primary">
                 <div class="card-header">
                     <h3 class="card-title">Form Input PNASN</h3>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-12 col-sm-12 col-lg-12">
                             <div class="card card-default">
                                 <div class="card-header">
                                     <h3 class="card-title">Data PNASN</h3>
                                 </div>
                                 <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>index.php/SVC_Submit/submit_pegawaiInput">
                                     <div class="card-body">
                                         <!-- Form Data -->
                                         <div class="row">
                                             <!-- /.Form Biodata -->
                                             <div class="col-md-4 col-sm-4 col-lg-4">
                                                 <div class="card card-default">
                                                     <div class="card-header">
                                                         <h3 class="card-title">Biodata PNASN</h3>
                                                     </div>
                                                     <div class="card-body" style="height: 850px;">
                                                         <div class=" form-group">
                                                             <label>Nama Depan</label>
                                                             <label style="color: red; float: right; font-size: 10pt; font-size: 10pt;"> <?php echo form_error('nama_depan'); ?></label>
                                                             <input type="text" class="form-control" name="nama_depan" placeholder="" onkeypress="return (event.charCode > 64 && 
	                                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Nama Belakang</label>
                                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nama_belakang'); ?></label>
                                                             <input type="text" class="form-control" name="nama_belakang" placeholder="" onkeypress="return (event.charCode > 64 && 
	                                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Nomor KTP</label>
                                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nik_KTP'); ?></label>
                                                             <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" name="nik_KTP" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>NIK PNASN</label>
                                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nik_pegawai'); ?></label>
                                                             <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" name="nik_pegawai" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Tanggal Lahir</label>
                                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('tanggal_lahir'); ?></label>
                                                             <input type="date" class="form-control" name="tanggal_lahir" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Tanggal Masuk</label>
                                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('tanggal_masuk'); ?></label>
                                                             <input type="date" class="form-control" name="tanggal_masuk" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Gender</label>
                                                             <div class="form-check">
                                                                 <input class="form-check-input" type="radio" name="gender" value="1" checked required>
                                                                 <label class="form-check-label">Laki-laki</label>
                                                             </div>
                                                             <div class="form-check">
                                                                 <input class="form-check-input" type="radio" name="gender" value="2" required>
                                                                 <label class="form-check-label">Perempuan</label>
                                                             </div>
                                                         </div>

                                                         <div class="form-group">
                                                             <label>Penempatan Sebagai</label>
                                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('jabatan'); ?></label>
                                                             <select name="jabatan" class="form-control custom-select" id="jabatan">
                                                                 <option value="0">- Select Job Desc -</option>
                                                                 <?php
                                                                    foreach ($jabatan as $jab) {
                                                                        echo '<option value="' . $jab->jabatan_id . '">' . $jab->nama . '</option>';
                                                                    }
                                                                    ?>
                                                             </select>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- /.Form Alamat -->
                                             <div class="col-md-4 col-sm-4 col-lg-4">
                                                 <div class="card card-default">
                                                     <div class="card-header">
                                                         <h3 class="card-title">Alamat PNASN</h3>
                                                     </div>
                                                     <div class="card-body" style="height: 850px;">
                                                         <div class="form-group">
                                                             <label>Nomor Telp</label>
                                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('no_telp'); ?></label>
                                                             <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" name="no_telp" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Email</label>
                                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('email'); ?></label>
                                                             <input type="text" class="form-control" name="email" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Alamat</label>
                                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('address1'); ?></label>
                                                             <input type="text" class="form-control" name="address1" placeholder="">
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-md-6">
                                                                 <div class="form-group">
                                                                     <label>Provinsi</label>
                                                                     <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('prov'); ?></label>
                                                                     <select name="prov" class="form-control custom-select" id="provinsi">
                                                                         <option value="0">- Select Provinsi -</option>
                                                                         <?php
                                                                            foreach ($provinsi as $prov) {
                                                                                echo '<option value="' . $prov->provinsi_id . '">' . $prov->nama . '</option>';
                                                                            }
                                                                            ?>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-6">
                                                                 <div class="form-group">
                                                                     <label>Kabupaten</label>
                                                                     <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('kab'); ?></label>
                                                                     <select name="kab" class="form-control custom-select" id="kabupaten">
                                                                         <option value="0">- Select Kabupaten -</option>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-6">
                                                                 <div class="form-group">
                                                                     <label>Kecamatan</label>
                                                                     <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('kec'); ?></label>
                                                                     <select name="kec" class="form-control custom-select" id="kecamatan">
                                                                         <option value="0">- Select Kecamatan -</option>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-6">
                                                                 <div class="form-group">
                                                                     <label>Desa / Kota</label>
                                                                     <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('des'); ?></label>
                                                                     <select name="des" class="form-control custom-select" id="desa">
                                                                         <option value="0">- Select Desa / Kelurahan -</option>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- /. Form Berkas -->
                                             <div class="col-md-4 col-sm-4 col-lg-4">
                                                 <!-- form biodata -->
                                                 <div class="card card-default">
                                                     <div class="card-header">
                                                         <h3 class="card-title">Berkas PNASN</h3>
                                                     </div>
                                                     <div class="card-body" style="height: 850px;">
                                                         <div class="form-group">
                                                             <label>Photo</label>
                                                             <label style="color: red; float: right; font-size: 10pt; font-size: 10pt;"> * Required</label>
                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="foto">
                                                                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <span class="input-group-text">Upload</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>KTP</label>
                                                             <label style="color: red; float: right; font-size: 10pt; font-size: 10pt;"> * Required</label>
                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="ktp">
                                                                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <span class="input-group-text">Upload</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>NPWP</label>
                                                             <label style="color: red; float: right; font-size: 10pt; font-size: 10pt;"> * Required</label>
                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="npwp">
                                                                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <span class="input-group-text">Upload</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Nomor Rekening</label>
                                                             <label style="color: red; float: right; font-size: 10pt; font-size: 10pt;"> * Required</label>
                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="no_rek">
                                                                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <span class="input-group-text">Upload</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>CV</label>
                                                             <label style="color: red; float: right; font-size: 10pt; font-size: 10pt;"> * Required</label>
                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="cv">
                                                                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <span class="input-group-text">Upload</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Surat Lamaran</label>
                                                             <label style="color: red; float: right; font-size: 10pt; font-size: 10pt;"> * Required</label>
                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="sl">
                                                                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <span class="input-group-text">Upload</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Ijasah</label>
                                                             <label style="color: red; float: right; font-size: 10pt; font-size: 10pt;"> * Required</label>
                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="ijasah">
                                                                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <span class="input-group-text">Upload</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="card-footer">
                                         <button type="submit" class="btn btn-primary">Kirim</button>
                                         <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/Dashboard/">Kembali</a>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="card-footer">
                 </div>
             </div><!-- /.card base -->
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

 <script>
     $(function() {
         bsCustomFileInput.init();
     });

     function onlyNumberKey(evt) {
         var ASCIICode = (evt.which) ? evt.which : evt.keyCode
         if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
             return false;
         return true;
     }

     var $sukses = "<?php echo $this->session->userdata('a202') ?>";
     var $gagal = "<?php echo $this->session->userdata('a203'); ?>";

     $(document).ready(function() {

         if ($gagal !== "") {
             $("#myModal203").modal();
         }
         if ($sukses !== "") {
             $("#myModal202").modal();
         }
     });

     $(document).ready(function() {
         $("#provinsi").change(function() {
             var url = "<?php echo site_url('index.php/SVC_GetAjax/wilayah_ajax_kab'); ?>/" + $(this).val();
             $('#kabupaten').load(url);
             return false;
         })

         $("#kabupaten").change(function() {
             var url = "<?php echo site_url('index.php/SVC_GetAjax/wilayah_ajax_kec'); ?>/" + $(this).val();
             $('#kecamatan').load(url);
             return false;
         })

         $("#kecamatan").change(function() {
             var url = "<?php echo site_url('index.php/SVC_GetAjax/wilayah_ajax_des'); ?>/" + $(this).val();
             $('#desa').load(url);
             return false;
         })
     });
 </script>
 </body>

 </html>