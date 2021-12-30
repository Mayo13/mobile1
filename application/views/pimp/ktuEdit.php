 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Update Data Pimpinan</h1>
                 </div>
                 <div class="col-sm-6">

                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <!-- Card Base -->
             <div class="card card-primary">
                 <div class="card-header">
                     <h3 class="card-title">Form Update Pimpinan</h3>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-12 col-sm-12 col-lg-12">
                             <div class="card card-default">
                                 <div class="card-header">
                                     <h3 class="card-title">Data Pimpinan</h3>
                                 </div>
                                 <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>index.php/SVC_Submit/submit_updateKtuInput">
                                     <div class="card-body">
                                         <div class=" form-group">
                                             <input type="text" class="form-control" name="emp_id" value="<?php
                                                                                                            $ciphertext = $this->encryption->encrypt($vEmpId);
                                                                                                            $urisafe = strtr($ciphertext, '+/=', '-_~');
                                                                                                            echo $urisafe
                                                                                                            ?>" hidden>
                                         </div>

                                         <div class=" form-group">
                                             <label>Nama Depan</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nama_depan'); ?></label>
                                             <input type="text" class="form-control" name="nama_depan" placeholder="" onkeypress="return (event.charCode > 64 && 
	                                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php echo $dataKTU->nama_depan ?>">
                                         </div>
                                         <div class="form-group">
                                             <label>Nama Belakang</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nama_belakang'); ?></label>
                                             <input type="text" class="form-control" name="nama_belakang" placeholder="" onkeypress="return (event.charCode > 64 && 
	                                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php echo $dataKTU->nama_belakang ?>">
                                         </div>
                                         <div class=" form-group">
                                             <label>NIP</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('nip'); ?></label>
                                             <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" name="nip" placeholder="" value="<?php echo $dataKTU->nip_pegawai ?>">
                                         </div>
                                         <div class="form-group">
                                             <label>Alamat</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('address1'); ?></label>
                                             <input type="text" class="form-control" name="address1" placeholder="" value="<?php echo $dataKTU->address1 ?>">
                                         </div>
                                         <div class="form-group">
                                             <label>Nomor Telp</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('no_telp'); ?></label>
                                             <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" name="no_telp" placeholder="" value="<?php echo $dataKTU->no_telp ?>">
                                         </div>
                                         <div class="form-group">
                                             <label>Email</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('email'); ?></label>
                                             <input type="email" class="form-control" name="email" placeholder="" value="<?php echo $dataKTU->email ?>">
                                         </div>
                                         <div class="form-group">
                                             <label>Gender</label>
                                             <label style="color: red; float: right; font-size: 10pt;"> <?php echo form_error('gender'); ?></label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="gender" value="1" <?php
                                                                                                                        if ($dataKTU->gender == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } else {
                                                                                                                            echo "";
                                                                                                                        }
                                                                                                                        ?> checked required>
                                                 <label class="form-check-label">Laki-laki</label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="gender" value="2" <?php
                                                                                                                        if ($dataKTU->gender == 2) {
                                                                                                                            echo "checked";
                                                                                                                        } else {
                                                                                                                            echo "";
                                                                                                                        }
                                                                                                                        ?> required>
                                                 <label class="form-check-label">Perempuan</label>
                                             </div>
                                         </div>

                                         <div class="form-group">
                                             <label>ES II</label>
                                             <select name="department" id="department" class="form-control custom-select">
                                                 <?php
                                                    foreach ($dep as $key) {
                                                        if ($key->department_id == $dataKTU->department_id)
                                                            echo "<option selected value='" . $key->department_id . "'>" . $key->nama . "</option>";
                                                        else
                                                            echo "<option value='" . $key->department_id . "'>" . $key->nama . "</option>";
                                                    }
                                                    // foreach ($dep as $d) {
                                                    //     if ($d->department_id == $dataKTU->department_id)
                                                    //         echo '<option value="' . $d->department_id . '">' . $d->nama . '</option>';
                                                    // }
                                                    // if ($row->kegiatan_id == $selected->kegiatan) {
                                                    //     echo "<option selected value='" . $row->kegiatan_id . "'>" . $row->nama . "</option>";
                                                    // } else if ($row->jabatan_id == $selected->jabatan) {
                                                    //     echo "<option value='" . $row->kegiatan_id . "'>" . $row->nama . "</option>";
                                                    // }

                                                    ?>
                                             </select>
                                         </div>

                                         <div class="form-group">
                                             <label>ES III</label>
                                             <select name="subdepartment" id="subdepartment" class="form-control custom-select">
                                                 <?php
                                                    foreach ($depSub as $key) {
                                                        if ($dataKTU->sub_id == $key->sub_id) {
                                                            echo '<option value="' . $key->sub_id . '">' . $key->nama . '</option>';
                                                        }
                                                    }
                                                    ?>
                                             </select>
                                         </div>

                                         <div class="form-group">
                                             <label>ES IV</label>
                                             <select name="bagiandepartment" id="bagiandepartment" class="form-control custom-select">
                                                 <?php
                                                    foreach ($depBag as $key) {
                                                        if (!empty($key->bagian_id == $dataKTU->bagian_id)) {
                                                            echo '<option selected value="' . $key->bagian_id . '">' . $key->nama . '</option>';
                                                        }
                                                    }
                                                    ?>
                                             </select>
                                         </div>


                                     </div>
                                     <div class="card-footer">
                                         <button type="submit" class="btn btn-primary">Kirim</button>
                                         <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/Pimpinan/KtuListEdit">Kembali</a>
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