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
                     <p style="text-align: center; font-size: 20pt; color: black;"><?php echo $this->session->userdata('a202'); ?></p>
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
                     <!-- <p id="errorBerkas"></p> -->
                     <p style="text-align: center; font-family: Roboto; font-size: 12pt; color: black;">Untuk Files Harap pastikan bahwa file tersebut adalah <span style="color: red;"> gif/jpg/png/pdf</span> , memiliki <span style="color: red;"> Ukuran File Max : 5 MB </span> , serta <span style="color: red;">Lebar dan Tinggi yaitu : 2048 x 1536</span>
                         <hr />
                     </p>
                     <!-- <p><?php
                                if (!empty($pesanError)) {
                                    foreach ($pesanError as $key) {
                                        echo $key['nama_file'] . " Error dengan Keterangan : <hr/> </br>" . $key['error'] . "<hr/> </br>";
                                        // echo $key[0]['error'];
                                        // echo "<br/>";
                                        // echo  $key[0]['error'];
                                        // // print_r($error);
                                        // echo "<hr/>";   # code...
                                        // echo "<br/>";
                                    }
                                }
                                ?></p> -->
                 </div>
                 <!-- <div class="modal-footer bg-danger">
                </div> -->
             </div>
         </div>
     </div>
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Update Data PNASN</h1>
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
                     <h3 class="card-title">Form Input PNASN</h3>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-12 col-sm-12 col-lg-12">
                             <div class="card card-default">
                                 <div class="card-header">
                                     <h3 class="card-title">Data PNASN</h3>
                                 </div>
                                 <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>index.php/SVC_Submit/submit_updatePegawaiInput">
                                     <div class="card-body">
                                         <!-- Form Data -->
                                         <div class="row">
                                             <!-- /.Form Biodata -->
                                             <div class="col-md-4 col-sm-4 col-lg-4">
                                                 <div class="card card-default">
                                                     <div class="card-header">
                                                         <h3 class="card-title">Biodata PNASN</h3>
                                                     </div>
                                                     <div class="card-body" style="height: 750px;">

                                                         <input type="text" value="<?php echo $dataPegawai[0]->emp_id ?>" name="id_pegawai" class="form-control" placeholder="" hidden>
                                                         <input type="text" value="<?php echo $dataBerkas[0]->berkas_kode ?>" name="berkas_kode" class="form-control" placeholder="" hidden>
                                                         <input type="text" value="<?php echo $dataBerkas[0]->berkas_id ?>" name="berkas_id" class="form-control" placeholder="" hidden>

                                                         <div class="form-group">
                                                             <label>Nama Depan</label>
                                                             <label style="color: red; float: right;"> <?php echo form_error('nama_depan'); ?></label>
                                                             <input type="text" value="<?php echo $dataPegawai[0]->nama_depan ?>" class="form-control" name="nama_depan" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Nama Belakang</label>
                                                             <label style="color: red; float: right;"> <?php echo form_error('nama_belakang'); ?></label>
                                                             <input type="text" value="<?php echo $dataPegawai[0]->nama_belakang ?>" class="form-control" name="nama_belakang" placeholder="">

                                                         </div>
                                                         <div class="form-group">
                                                             <label>Nomor KTP</label>
                                                             <label style="color: red; float: right;"> <?php echo form_error('nik_KTP'); ?></label>
                                                             <input type="text" onkeypress="return onlyNumberKey(event)" value="<?php echo $dataPegawai[0]->nik_ktp ?>" class="form-control" name="nik_KTP" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>NIK PNASN</label>
                                                             <label style="color: red; float: right;"> <?php echo form_error('nik_pegawai'); ?></label>
                                                             <input type="text" onkeypress="return onlyNumberKey(event)" value="<?php echo $dataPegawai[0]->nik_pegawai ?>" class="form-control" name="nik_pegawai" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Tanggal Lahir</label>
                                                             <label style="color: red; float: right;"> <?php echo form_error('tanggal_lahir'); ?></label>
                                                             <input type="date" value="<?php echo $dataPegawai[0]->tgl_lahir ?>" class="form-control" name="tanggal_lahir" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Tanggal Masuk</label>
                                                             <label style="color: red; float: right;"> <?php echo form_error('tanggal_masuk'); ?></label>
                                                             <input type="date" class="form-control" value="<?php echo $dataPegawai[0]->join_date ?>" name="tanggal_masuk" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Gender</label>
                                                             <div class="form-check">
                                                                 <input class="form-check-input" type="radio" name="gender" <?php if ($dataPegawai[0]->gender == 1)
                                                                                                                                echo "value ='1' checked required";
                                                                                                                            else {
                                                                                                                                echo "value ='1' required";
                                                                                                                            }
                                                                                                                            ?>>
                                                                 <label class="form-check-label">Laki-laki</label>
                                                             </div>
                                                             <div class="form-check">
                                                                 <input class="form-check-input" type="radio" name="gender" <?php if ($dataPegawai[0]->gender == 2)
                                                                                                                                echo "value ='2' checked required";
                                                                                                                            else {
                                                                                                                                echo "value ='2' required";
                                                                                                                            }
                                                                                                                            ?>>
                                                                 <label class="form-check-label">Perempuan</label>
                                                             </div>
                                                         </div>

                                                         <div class="form-group">
                                                             <label>Penempatan Sebagai</label>
                                                             <label style="color: red; float: right;"> <?php echo form_error('jabatan'); ?></label>
                                                             <select name="jabatan" class="form-control custom-select" id="jabatan">
                                                                 <option value="0">- Select Job Desc -</option>
                                                                 <?php
                                                                    foreach ($dataJabatan as $key) {
                                                                        if ($key->jabatan_id == $dataPegawai[0]->jabatan_id)
                                                                            echo "<option selected value='" . $key->jabatan_id . "'>" . $key->nama . "</option>";
                                                                        else
                                                                            echo "<option value='" . $key->jabatan_id . "'>" . $key->nama . "</option>";
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
                                                     <div class="card-body" style="height: 750px;">
                                                         <div class="form-group">
                                                             <label>Nomor Telp</label>
                                                             <label style="color: red; float: right;"> <?php echo form_error('no_telp'); ?></label>
                                                             <input type="text" value="<?php echo $dataPegawai[0]->no_telp ?>" class="form-control" name="no_telp" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Email</label>
                                                             <label style="color: red; float: right;"> <?php echo form_error('email'); ?></label>
                                                             <input type="text" value="<?php echo $dataPegawai[0]->email ?>" class="form-control" name="email" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Alamat</label>
                                                             <label style="color: red; float: right;"> <?php echo form_error('address1'); ?></label>
                                                             <input type="text" value="<?php echo $dataPegawai[0]->address1 ?>" class="form-control" name="address1" placeholder="">
                                                         </div>

                                                         <div class="row">
                                                             <div class="col-md-6">
                                                                 <div class="form-group">
                                                                     <label>Provinsi</label>
                                                                     <label style="color: red; float: right;"> <?php echo form_error('prov'); ?></label>
                                                                     <select name="prov" class="form-control custom-select" id="provinsi">
                                                                         <?php
                                                                            foreach ($provData as $key) {
                                                                                if ($key->provinsi_id == $dataPegawai[0]->prov_id)
                                                                                    echo "<option selected value='" . $key->provinsi_id . "'>" . $key->nama . "</option>";
                                                                                else
                                                                                    echo "<option value='" . $key->provinsi_id . "'>" . $key->nama . "</option>";
                                                                            }
                                                                            ?>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-6">
                                                                 <div class="form-group">
                                                                     <label>Kabupaten</label>
                                                                     <label style="color: red; float: right;"> <?php echo form_error('kab'); ?></label>
                                                                     <select name="kab" class="form-control custom-select" id="kabupaten">
                                                                         <?php
                                                                            foreach ($kabData as $key) {
                                                                                if ($key->kabupaten_id == $dataPegawai[0]->kab_id)
                                                                                    echo "<option selected value='" . $key->kabupaten_id . "'>" . $key->nama . "</option>";
                                                                            }
                                                                            ?>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-6">
                                                                 <div class="form-group">
                                                                     <label>Kecamatan</label>
                                                                     <label style="color: red; float: right;"> <?php echo form_error('kec'); ?></label>
                                                                     <select name="kec" class="form-control custom-select" id="kecamatan">
                                                                         <?php
                                                                            foreach ($kecData as $key) {
                                                                                if ($key->kecamatan_id == $dataPegawai[0]->kec_id)
                                                                                    echo "<option selected value='" . $key->kecamatan_id . "'>" . $key->nama . "</option>";
                                                                            }
                                                                            ?>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-6">
                                                                 <div class="form-group">
                                                                     <label>Desa / Kota</label>
                                                                     <label style="color: red; float: right;"> <?php echo form_error('des'); ?></label>
                                                                     <select name="des" class="form-control custom-select" id="desa">
                                                                         <?php
                                                                            foreach ($desData as $key) {
                                                                                if ($key->desa_id == $dataPegawai[0]->des_id)
                                                                                    echo "<option selected value='" . $key->desa_id . "'>" . $key->nama . "</option>";
                                                                            }
                                                                            ?>
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
                                                     <div class="card-body" style="height: 750px;">
                                                         <div class="form-group">
                                                             <label>Photo</label>

                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="foto">
                                                                     <?php if (!empty($dataBerkas[0]->url_foto)) {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: orange;'>Update file</label>";
                                                                        } else {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: black;'>Choose file</label>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <?php if (!empty($dataBerkas[0]->url_foto)) {
                                                                            echo "<span class='input-group-text' style='color: green;'>Uploaded</span>";
                                                                        } else {
                                                                            echo "<span class='input-group-text' style='color: red;'>Not Uploaded</span>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>KTP</label>

                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="ktp">
                                                                     <?php if (!empty($dataBerkas[0]->url_ktp)) {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: orange;'>Update file</label>";
                                                                        } else {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: black;'>Choose file</label>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <?php if (!empty($dataBerkas[0]->url_ktp)) {
                                                                            echo "<span class='input-group-text' style='color: green;'>Uploaded</span>";
                                                                        } else {
                                                                            echo "<span class='input-group-text' style='color: red;'>Not Uploaded</span>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>NPWP</label>

                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="npwp">
                                                                     <?php if (!empty($dataBerkas[0]->url_npwp)) {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: orange;'>Update file</label>";
                                                                        } else {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: black;'>Choose file</label>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <?php if (!empty($dataBerkas[0]->url_npwp)) {
                                                                            echo "<span class='input-group-text' style='color: green;'>Uploaded</span>";
                                                                        } else {
                                                                            echo "<span class='input-group-text' style='color: red;'>Not Uploaded</span>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Nomor Rekening</label>

                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="no_rek">
                                                                     <?php if (!empty($dataBerkas[0]->url_no_rek)) {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: orange;'>Update file</label>";
                                                                        } else {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: black;'>Choose file</label>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <?php if (!empty($dataBerkas[0]->url_no_rek)) {
                                                                            echo "<span class='input-group-text' style='color: green;'>Uploaded</span>";
                                                                        } else {
                                                                            echo "<span class='input-group-text' style='color: red;'>Not Uploaded</span>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>CV</label>

                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="cv">
                                                                     <?php if (!empty($dataBerkas[0]->url_cv)) {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: orange;'>Update file</label>";
                                                                        } else {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: black;'>Choose file</label>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <?php if (!empty($dataBerkas[0]->url_cv)) {
                                                                            echo "<span class='input-group-text' style='color: green;'>Uploaded</span>";
                                                                        } else {
                                                                            echo "<span class='input-group-text' style='color: red;'>Not Uploaded</span>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Surat Lamaran</label>

                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="sl">
                                                                     <?php if (!empty($dataBerkas[0]->url_surat_lamaran)) {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: orange;'>Update file</label>";
                                                                        } else {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: black;'>Choose file</label>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <?php if (!empty($dataBerkas[0]->url_surat_lamaran)) {
                                                                            echo "<span class='input-group-text' style='color: green;'>Uploaded</span>";
                                                                        } else {
                                                                            echo "<span class='input-group-text' style='color: red;'>Not Uploaded</span>";
                                                                        }
                                                                        ?>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>Ijasah</label>

                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input type="file" class="custom-file-input" name="ijasah">
                                                                     <?php if (!empty($dataBerkas[0]->url_ijasah)) {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: orange;'>Update file</label>";
                                                                        } else {
                                                                            echo "<label class='custom-file-label' for='exampleInputFile' style='color: black;'>Choose file</label>";
                                                                        }
                                                                        ?>
                                                                     <!-- <label class="custom-file-label" for="exampleInputFile" style="color: orange;">Update file</label> -->
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <!-- <a href="<?= base_url('index.php/admin/viewMinutesFile/' . $info['doc_id']) ?>" target="_blank">Show My Pdf</a> -->
                                                                     <!-- <a href="www.google.com" target="_blank">Show My Pdf</a>
                                                                      -->
                                                                     <?php if (!empty($dataBerkas[0]->url_ijasah)) {
                                                                            echo "<span class='input-group-text' style='color: green;'>Uploaded</span>";
                                                                        } else {
                                                                            echo "<span class='input-group-text' style='color: red;'>Not Uploaded</span>";
                                                                        }
                                                                        ?>
                                                                     <!-- <span class="input-group-text" style="color: blue;">Uploaded</span> -->
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <br>
                                                         <a class="btn btn-info" style=" float: right; font-size: 10pt;" href="<?php echo base_url() ?>index.php/Pnasn/pegawaiLihatBerkas/<?php echo $dataBerkas[0]->berkas_kode ?>">
                                                             Download Berkas
                                                         </a>

                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="card-footer">
                                         <button type="submit" class="btn btn-primary">Kirim</button>
                                         <!-- <button type="submit" class="btn btn-danger">Cancel</button> -->
                                         <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/Pnasn/pegawaiListEdit">Kembali</a>
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