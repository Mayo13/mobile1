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
                     <h3 class="card-title">Form Input Pimpinan</h3>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-12 col-sm-12 col-lg-12">
                             <div class="card card-default">
                                 <div class="card-header">
                                     <h3 class="card-title">Data Pimpinan</h3>
                                 </div>
                                 <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>index.php/SVC_Submit/submit_ktuInput">
                                     <div class="card-body">
                                         <div class="form-group">
                                             <label>Akun Pimpinan</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('akun'); ?></label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="akun" value="2" required>
                                                 <label class="form-check-label">Kabag BMN</label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="akun" value="3" checked required>
                                                 <label class="form-check-label">Atasan Langsung</label>
                                             </div>
                                         </div>
                                         <div class=" form-group">
                                             <label>Nama Depan</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nama_depan'); ?></label>
                                             <input type="text" class="form-control" name="nama_depan" placeholder="">
                                             <!-- onkeypress="return (event.charCode > 64 && 
	                                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" -->
                                         </div>
                                         <div class="form-group">
                                             <label>Nama Belakang</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nama_belakang'); ?></label>
                                             <input type="text" class="form-control" name="nama_belakang" placeholder="">
                                         </div>
                                         <div class="form-group">
                                             <label>NIP</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nip'); ?></label>
                                             <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" name="nip" placeholder="">
                                         </div>
                                         <div class="form-group">
                                             <label>Alamat</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('address1'); ?></label>
                                             <input type="text" class="form-control" name="address1" placeholder="">
                                         </div>
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
                                             <label>Gender</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('gender'); ?></label>
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
                                             <label>ES II</label>
                                             <select name="department" class="form-control custom-select" id="department">
                                                 <option value="0">- Select Unit Kerja -</option>
                                                 <?php
                                                    foreach ($department as $dep) {
                                                        echo '<option value="' . $dep->department_id . '">' . $dep->nama . '</option>';
                                                    }
                                                    ?>
                                             </select>
                                         </div>

                                         <div class="form-group">
                                             <label>ES III</label>
                                             <select name="subdepartment" class="form-control custom-select" id="subdepartment">
                                                 <option value="0">- Select Sub Direktorat -</option>
                                             </select>
                                         </div>

                                         <div class="form-group">
                                             <label>ES IV</label>
                                             <select name="bagiandepartment" class="form-control custom-select" id="bagiandepartment">
                                                 <option value="0">- Select Sub Bagian -</option>
                                             </select>
                                         </div>


                                     </div>
                                     <div class="card-footer">
                                         <button type="submit" class="btn btn-primary">Kirim</button>
                                         <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/Dashboard">Kembali</a>
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
         $("#department").change(function() {
             var url = "<?php echo site_url('index.php/SVC_GetAjax/subDep_ajax'); ?>/" + $(this).val();
             $('#subdepartment').load(url);
             return false;
         })

         $("#subdepartment").change(function() {
             var url = "<?php echo site_url('index.php/SVC_GetAjax/bagianDep_ajax'); ?>/" + $(this).val();
             $('#bagiandepartment').load(url);
             return false;
         })
     });
 </script>
 </body>

 </html>