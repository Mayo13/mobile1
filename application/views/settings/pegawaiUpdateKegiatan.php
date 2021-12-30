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
                         <p style="text-align: center; font-size: 20pt; color: black;">Input Kegiatan Berhasil</p>
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
                     </div>
                     <div class="modal-body">
                         <p style="text-align: center; font-size: 16pt; color: black;">Update Kegiatan Gagal</p>
                         <p style="text-align: center; font-size: 12pt; color: black;">Periksa kembali form anda</p>
                     </div>
                     <!-- <div class="modal-footer bg-danger">
                </div> -->
                 </div>
             </div>
         </div>
         <section class="content">
             <div class="container-fluid">
                 <form enctype="multipart/form-data" method="post">
                     <!-- Card Base -->
                     <div class="card card-primary">
                         <div class="card-header">
                             <h3 class="card-title">Update Uraian Tugas</h3>
                         </div>
                         <div class="card-body">

                             <!-- form biodata -->
                             <div class="card card-default">
                                 <div class="card-header">
                                     <h3 class="card-title">Form</h3>
                                 </div>
                                 <div class="card-body">
                                     <div class="form-group">
                                         <div class="row">
                                             <div class="col-md-2 col-sm-2 col-lg-2">
                                                 <label>Pilih Jabatan Anda</label>
                                             </div>
                                             <div class="col-md-1 col-sm-1 col-lg-1">
                                                 <div id="vjabatan" style="visibility: hidden;">
                                                     <label style="color: red;">*</label>
                                                 </div>
                                             </div>
                                         </div>
                                         <div id="jabatanSelect">
                                             <?php
                                                foreach ($dataJabatan as $row) {
                                                    if ($selected->jabatan == $row->jabatan_id) {
                                                        echo "
                                                <div class='form-check'>
                                                    <input class='form-check-input' type='radio' name='jabatan' id='jabatan' value='$row->jabatan_id' checked>
                                                    <label class='form-check-label'> $row->nama </label>
                                                </div>";
                                                    } else {
                                                        echo "
                                                            <div class='form-check'>
                                                                <input class='form-check-input' type='radio' name='jabatan' id='jabatan' value='$row->jabatan_id'>
                                                                <label class='form-check-label'> $row->nama </label>
                                                            </div>";
                                                    }
                                                }
                                                ?>
                                         </div>
                                     </div>

                                     <div class="form-group" style="text-align: center;">
                                         <label>----- Kegiatan ------</label>
                                     </div>

                                     <div class="form-group">
                                         <div class="row">
                                             <div class="col-md-2 col-sm-2 col-lg-2">
                                                 <label>Nama Kegiatan</label>
                                             </div>
                                             <div class="col-md-1 col-sm-1 col-lg-1">
                                                 <div id="vkegiatan" style="visibility: hidden;">
                                                     <label style="color: red;">*</label>
                                                 </div>
                                             </div>
                                         </div>
                                         <select name="kegiatan" id="kegiatan" class="form-control custom-select" id="kegiatan">
                                             <?php
                                                foreach ($dataKegiatan as $row) {
                                                    if ($row->kegiatan_id == $selected->kegiatan) {
                                                        echo "<option selected value='" . $row->kegiatan_id . "'>" . $row->nama . "</option>";
                                                    } else if ($row->jabatan_id == $selected->jabatan) {
                                                        echo "<option value='" . $row->kegiatan_id . "'>" . $row->nama . "</option>";
                                                    }
                                                }
                                                ?>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <div class="row">
                                             <div class="col-md-2 col-sm-2 col-lg-2">
                                                 <label>Dari</label>
                                             </div>
                                             <div class="col-md-1 col-sm-1 col-lg-1">
                                                 <div id="vdari" style="visibility: hidden;">
                                                     <label style="color: red;">*</label>
                                                 </div>
                                             </div>
                                         </div>
                                         <input name="dari" id="dari" type="time" class="form-control" placeholder="" value="<?php echo $selected->dari ?>">
                                     </div>
                                     <div class="form-group">
                                         <div class="row">
                                             <div class="col-md-2 col-sm-2 col-lg-2">
                                                 <label>Sampai dengan</label>
                                             </div>
                                             <div class="col-md-1 col-sm-1 col-lg-1">
                                                 <div id="vsampai" style="visibility: hidden;">
                                                     <label style="color: red;">*</label>
                                                 </div>
                                             </div>
                                         </div>
                                         <input name="sampai" id="sampai" type="time" class="form-control" placeholder="" value="<?php echo $selected->sampai ?>">
                                     </div>

                                     <div class="form-group">
                                         <div class="row">
                                             <div class="col-md-2 col-sm-2 col-lg-2">
                                                 <label>Pelaksanaan Kegiatan</label>
                                             </div>
                                             <div class="col-md-1 col-sm-1 col-lg-1">
                                                 <div id="vpelakKegiatan" style="visibility: hidden;">
                                                     <label style="color: red;">*</label>
                                                 </div>
                                             </div>
                                         </div>
                                         <textarea name="pelakKegiatan" class="pelakKegiatan" id="summernote" style="height: 300px;">
                                    <?php echo $selected->pelakKegiatan ?>
                                    </textarea>
                                     </div>

                                     <div class="form-group">
                                         <div class="row">
                                             <div class="col-md-2 col-sm-2 col-lg-2">
                                                 <label>Keterangan</label>
                                             </div>
                                             <div class="col-md-1 col-sm-1 col-lg-1">
                                                 <div id="vketerangan" style="visibility: hidden;">
                                                     <label style="color: red;">*</label>
                                                 </div>
                                             </div>
                                         </div>
                                         <input name="keterangan" id="keterangan" type="text" class="form-control" placeholder="" value="<?php echo $selected->keterangan ?>">
                                     </div>

                                     <div class="suratDikerjakan" style="display: none;">
                                         <div class="form-group">
                                             <div class="row">
                                                 <div class="col-md-2 col-sm-2 col-lg-2">
                                                     <label>Surat yang telah dikerjakan</label>
                                                 </div>
                                                 <div class="col-md-1 col-sm-1 col-lg-1">
                                                     <div id="vjumlahSurat" style="visibility: hidden;">
                                                         <label style="color: red;">*</label>
                                                     </div>
                                                 </div>
                                             </div>
                                             <input type="number" name="jumlahSurat" id="jumlahSurat" class="form-control" placeholder="" value="<?php echo $selected->jumlahSurat ?>">
                                         </div>
                                     </div>

                                     <br>
                                     <div class="form-group" style="text-align: center;">
                                         <label>----- Status Kegiatan ------</label>
                                     </div>

                                     <div class="form-group">
                                         <div class="row">
                                             <div class="col-md-2 col-sm-2 col-lg-2">
                                                 <label>Tempat Kerja</label>
                                             </div>
                                             <div class="col-md-1 col-sm-1 col-lg-1">
                                                 <div id="vtempatKerja" style="visibility: hidden;">
                                                     <label style="color: red;">*</label>
                                                 </div>
                                             </div>
                                         </div>
                                         <select name="tempatKerja" id="tempatKerja" class="custom-select">
                                             <?php
                                                if ($selected->tempatKerja == "Kantor") {
                                                    echo "<option selected value='$selected->tempatKerja'>$selected->tempatKerja</option>";
                                                    echo "<option value='Rumah'>Rumah</option>";
                                                } else {
                                                    echo "<option selected value='$selected->tempatKerja'>$selected->tempatKerja</option>";
                                                    echo "<option value='Kantor'>Kantor</option>";
                                                }
                                                ?>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <div class="row">
                                             <div class="col-md-2 col-sm-2 col-lg-2">
                                                 <label>Status Kegiatan</label>
                                             </div>
                                             <div class="col-md-1 col-sm-1 col-lg-1">
                                                 <div id="vstatusKegiatan" style="visibility: hidden;">
                                                     <label style="color: red;">*</label>
                                                 </div>
                                             </div>
                                         </div>
                                         <select name="statusKegiatan" id="statusKegiatan" class="custom-select">
                                             <?php
                                                if ($selected->statusKegiatan == "Belum Selesai") {
                                                    echo "<option selected value='$selected->statusKegiatan'>$selected->statusKegiatan</option>";
                                                    echo "<option value='Selesai'>Selesai</option>";
                                                } else {
                                                    echo "<option selected value='$selected->statusKegiatan'>$selected->statusKegiatan</option>";
                                                    echo "<option value='Belum Selesai'>Belum Selesai</option>";
                                                }
                                                ?>
                                         </select>
                                     </div>

                                     <div class="form-group">
                                         <div class="row">
                                             <div class="col-md-2 col-sm-2 col-lg-2">
                                                 <label>Tindak Lanjut</label>
                                             </div>
                                             <div class="col-md-1 col-sm-1 col-lg-1">
                                                 <div id="vtindakLanjut" style="visibility: hidden;">
                                                     <label style="color: red;">*</label>
                                                 </div>
                                             </div>
                                         </div>
                                         <select name="tindakLanjut" id="tindakLanjut" class="custom-select">
                                             <?php
                                                if ($selected->tindakLanjut == "Belum dikerjakan") {
                                                    echo "<option selected value='$selected->tindakLanjut'>$selected->tindakLanjut</option>";
                                                    echo "<option value='Sudah dikerjakan'>Sudah dikerjakan</option>";
                                                } else {
                                                    echo "<option selected value='$selected->tindakLanjut'>$selected->tindakLanjut</option>";
                                                    echo "<option value='Belum dikerjakan'>Belum dikerjakan</option>";
                                                }
                                                ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="card-footer">
                                     <button class="btn btn-primary" id="btn_save">Simpan Perubahan</button>
                                     <button class="btn btn-danger" id="btn_cancel">Cancel</button>
                                 </div>
                             </div>
                         </div>
                         <div class="card-footer">
                         </div>
                     </div><!-- /.card base -->
                 </form>
             </div><!-- /.container-fluid -->
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

     <!-- ./wrapper -->
     </div>
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
     <script>
         if (!<?php echo $selected->jumlahSurat ?> == " ") {
             $(".suratDikerjakan").show();
         } else {
             $(".suratDikerjakan").hide();
         }

         $(function() {
             bsCustomFileInput.init();
         });

         $(function() {
             // Summernote
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
             $('#kegiatan').change(function() {
                 console.log($('#kegiatan').val())
                 if ($(this).val() == '2') {
                     $(".suratDikerjakan").show();
                 } else {
                     $(".suratDikerjakan").hide();
                 }
             });
         });

         $('#btn_cancel').on('click', function() {
             window.location = "<?php echo base_url('index.php/Admin/uraianTugasInput') ?>";
             return false;
         });

         $('#btn_save').on('click', function() {
             var jabatan = $("input[name='jabatan']:checked").val();
             var kegiatan = $('#kegiatan').val();
             //  var waktu1 = $('#waktu1').val();
             //  var waktu = $("input[name='waktu']:checked").val();
             var dari = $('#dari').val();
             var sampai = $('#sampai').val();
             var pelakKegiatan = $('#summernote').val();
             var keterangan = $('#keterangan').val();
             var surat = $('#jumlahSurat').val();
             var tempatKerja = $('#tempatKerja').val();
             var statusKegiatan = $('#statusKegiatan').val();
             var tindakLanjut = $('#tindakLanjut').val();
             var jumlahSurat = "";

             if (surat = 1) {
                 jumlahSurat = 0
             } else {
                 jumlahSurat = Surat
             }

             var error = 0;
             var vjabatan = document.getElementById("vjabatan");
             var vkegiatan = document.getElementById("vkegiatan");
             var vdari = document.getElementById("vdari");
             var vsampai = document.getElementById("vsampai");
             var vpelakKegiatan = document.getElementById("vpelakKegiatan");
             var vketerangan = document.getElementById("vketerangan");
             var vsurat = document.getElementById("vsurat");
             var vtempatKerja = document.getElementById("vtempatKerja");
             var vstatusKegiatan = document.getElementById("vstatusKegiatan");
             var vtindakLanjut = document.getElementById("vtindakLanjut");

             if ($.trim(jabatan) == '') {
                 // alert(vdtgl);
                 ++error;
                 vjabatan.style.visibility = 'visible';
             }
             if ($.trim(kegiatan) == '') {
                 ++error;
                 vkegiatan.style.visibility = 'visible';
             }
             if ($.trim(dari) == '') {
                 ++error;
                 vdari.style.visibility = 'visible';
             }
             if ($.trim(sampai) == '') {
                 ++error;
                 vsampai.style.visibility = 'visible';
             }
             if ($.trim(pelakKegiatan) == '') {
                 ++error;
                 vpelakKegiatan.style.visibility = 'visible';
             }
             if ($.trim(keterangan) == '') {
                 ++error;
                 vketerangan.style.visibility = 'visible';
             }
             if ($.trim(surat) == '') {
                 ++error;
                 vsurat.style.visibility = 'visible';
             }
             if ($.trim(tempatKerja) == '') {
                 ++error;
                 vtempatKerja.style.visibility = 'visible';
             }
             if ($.trim(statusKegiatan) == '') {
                 ++error;
                 vstatusKegiatan.style.visibility = 'visible';
             }
             if ($.trim(tindakLanjut) == '') {
                 ++error;
                 vtindakLanjut.style.visibility = 'visible';
             }


             if (error > 0) {
                 $('#myModal203').modal('show');
             } else {
                 $.ajax({
                     async: false,
                     type: "POST",
                     url: "<?php echo base_url('index.php/Admin/submit_updateUraianTugas/') ?>",
                     dataType: "JSON",
                     data: {
                         jabatan: jabatan,
                         kegiatan: kegiatan,
                         dari: dari,
                         sampai: sampai,
                         pelakKegiatan: pelakKegiatan,
                         keterangan: keterangan,
                         tempatKerja: tempatKerja,
                         statusKegiatan: statusKegiatan,
                         tindakLanjut: tindakLanjut,
                     },
                     success: function(data) {
                         console.log(data);
                         $('#myModal202').modal('show');
                         //  window.location = "<?php echo base_url('index.php/Admin/uraianTugasInput') ?>";

                         //  $('#ModalAdd').modal('hide');
                         //  tampil_data_kegiatan();
                     },
                     error: function() {
                         $('#myModal203').modal('show');
                         //  alert('Maaf harap isi kolom yang tersedia');
                     }
                 });
             }
             //  console.log(kegiatan);
             //  console.log(jabatan);
             //  console.log(dari);
             //  console.log(sampai);
             //  console.log(pelakKegiatan);
             //  console.log(keterangan);
             //  console.log(tempatKerja);
             //  console.log(statusKegiatan);
             //  console.log(tindakLanjut);
             //  console.log(jumlahSurat);




             return false;
         });
     </script>

     </body>

     </html>