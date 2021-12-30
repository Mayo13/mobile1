 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Input Uraian Tugas</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Input Uraian Tugas</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <form>
                 <!-- Card Base -->
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title">Input Uraian Tugas</h3>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <!-- Form Isisan -->
                             <div class="col-md-6 col-sm-6 col-lg-6">
                                 <!-- form biodata -->
                                 <div class="card card-default">
                                     <div class="card-header">
                                         <h3 class="card-title">Biodata Pegawai</h3>
                                     </div>
                                     <div class="card-body">

                                         <div class="form-group">
                                             <label for="namaDepan">Pilih Jabatan Anda</label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" onclick="javascript:selectionJabatan();" name="yesno" id="noCheck" checked>
                                                 <label class="form-check-label">Pramubakti</label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" onclick="javascript:selectionJabatan();" name="yesno" id="ckpramusaji">
                                                 <label class="form-check-label">Pramusaji</label>
                                             </div>
                                         </div>

                                         <div class="form-group" style="text-align: center;">
                                             <label for="namaDepan">----- Kegiatan ------</label>
                                         </div>


                                         <div class="form-group" id="pramusaji" style="display:none">
                                             <label>Nama Kegiatan</label>
                                             <select class="custom-select" name="pramusaji">
                                                 <option>Membersihkan Ruangan Kerja Pegawai dan Ruangan Pejabat
                                                 </option>
                                                 <option>Menyiapkan serta membersihkan Peralatan Minum dan Makan untuk Pegawai
                                                 </option>
                                                 <option>Membantu mobilisasi kebutuhan pegawai
                                                 </option>
                                                 <option>lain - lain
                                                 </option>
                                             </select>
                                         </div>

                                         <div class="form-group" id="pramubakti">
                                             <label>Nama Kegiatan</label>
                                             <select class="custom-select" name="pramubakti">
                                                 <option>Membantu pegawai dalam melaksanakan tugas administrasi persuratan
                                                 </option>
                                                 <option>Membantu menyusun laporan kegiatan di bagian tersebut
                                                 </option>
                                                 <option>Membantu pengarsipan dokumen
                                                 </option>
                                                 <option> Membantu kegiatan pegawai baik berada diruangan maupun diluar ruangan dalam melaksankan tusi
                                                 </option>
                                                 <option>lain - lain
                                                 </option>
                                             </select>
                                         </div>
                                         <!-- <div class="form-group">
                                             <label for="namaDepan">Nama Kegiatan</label>
                                             <input type="text" class="form-control" id="" placeholder="">
                                         </div> -->
                                         <!-- <div class="form-group">
                                             <label for="namaDepan">Pelaksanaan Kegiatan</label>
                                             <input type="text" class="form-control" id="" placeholder="">
                                         </div> -->

                                         <!-- Waktu -->
                                         <div class="form-group">
                                             <label>Hari / Tanggal</label>
                                             <input type="date" class="form-control" id="" placeholder="">
                                         </div>

                                         <div class="form-group">
                                             <label>Dari</label>
                                             <input type="time" class="form-control" id="" placeholder="">
                                         </div>
                                         <div class="form-group">
                                             <label>Sampai dengan</label>
                                             <input type="time" class="form-control" id="" placeholder="">
                                         </div>

                                         <div class="form-group">
                                             <label>Pelaksanaan Kegiatan</label>
                                             <textarea id="summernote" style="height: 300px;">
                                                Tuliskan <em>Pelaksanaan Kegiatan</em> <u>disini</u>                               
                                            </textarea>
                                         </div>

                                         <div class="form-group">
                                             <label for="namaDepan">Keterangan</label>
                                             <input type="text" class="form-control" id="" placeholder="">
                                         </div>

                                         <br>
                                         <div class="form-group" style="text-align: center;">
                                             <label for="namaDepan">----- Status Kegiatan ------</label>
                                         </div>

                                         <div class="form-group">
                                             <label>Tempat Kerja</label>
                                             <select class="custom-select">
                                                 <option>Kantor</option>
                                                 <option>Rumah</option>
                                             </select>
                                         </div>


                                         <div class="form-group">
                                             <label>Status Kegiatan</label>
                                             <select class="custom-select">
                                                 <option>Selesai</option>
                                                 <option>Belum Selesai</option>
                                             </select>
                                         </div>

                                         <div class="form-group">
                                             <label>Tindak Lanjut</label>
                                             <select class="custom-select">
                                                 <option>Sudah dikerjakan</option>
                                                 <option>Belum dikerjakan</option>
                                             </select>
                                         </div>

                                     </div>
                                     <!-- <div class="form-group">
                                         <label for="exampleInputFile">Photo File</label>
                                         <div class="input-group">
                                             <div class="custom-file">
                                                 <input type="file" class="custom-file-input" id="exampleInputFile">
                                                 <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                             </div>
                                             <div class="input-group-append">
                                                 <span class="input-group-text">Upload</span>
                                             </div>
                                         </div>
                                     </div> -->
                                 </div>
                             </div>

                             <!-- /.Data List -->
                             <div class="col-md-6 col-sm-6 col-lg-6">
                                 <div class="card card-default">
                                     <div class="card-header">
                                         <h3 class="card-title">Daftar Kegiatan Hari ini</h3>
                                     </div>
                                     <div class="card-body">
                                         <table id="example1" class="table table-bordered table-striped">
                                             <thead>
                                                 <tr style="text-align: center;">
                                                     <th style="vertical-align: middle;">Nama Kegiatan</th>
                                                     <th style="vertical-align: middle;">Pelaksanaan Kegiatan</th>
                                                     <th style="vertical-align: middle;">Keterangan</th>
                                                     <th style="vertical-align: middle;">Status Kegiatan</th>
                                                     <th style="vertical-align: middle;">Aksi</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <tr>
                                                     <td>Membantu pegawai dalam melaksanakan tugas administrasi persuratan
                                                     </td>
                                                     <td>Entery Surat Sesditjenim Up. Kabag Humas dan Umum Surat Diteruskan Kasubbag Ratdokpus
                                                     </td>
                                                     <td> -- </td>
                                                     <td> Selesai </td>
                                                     <td><button class="btn btn-info" style="width: 70px;">Lihat </button>
                                                         <button class="btn btn-warning" style="width: 70px;">Edit</button></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Membantu pengarsipan dokumen
                                                     </td>
                                                     <td>Scan Surat Sesditjenim
                                                     </td>
                                                     <td>--</td>
                                                     <td>Selesai</td>
                                                     <td><button class="btn btn-info" style="width: 70px;">Lihat </button>
                                                         <button class="btn btn-warning" style="width: 70px;">Edit</button></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Membantu pegawai dalam melaksanakan tugas administrasi persuratan</td>
                                                     <td>Penomoran Surat Dirjenim
                                                     </td>
                                                     <td>--</td>
                                                     <td>Selesai</td>
                                                     <td><button class="btn btn-info" style="width: 70px;">Lihat </button>
                                                         <button class="btn btn-warning" style="width: 70px;">Edit</button></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Membantu pegawai dalam melaksanakan tugas administrasi persuratan</td>
                                                     <td>Penomoran Surat Dirjenim
                                                     </td>
                                                     <td>--</td>
                                                     <td>Selesai</td>
                                                     <td><button class="btn btn-info" style="width: 70px;">Lihat </button>
                                                         <button class="btn btn-warning" style="width: 70px;">Edit</button></td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Submit</button>
                         <button type="submit" class="btn btn-danger">Cancel</button>
                     </div>
                 </div><!-- /.card base -->
             </form>
         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <footer class="main-footer">
     <div class="float-right d-none d-sm-block">
         <b>Version</b> 3.1.0-pre
     </div>
     <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
 <script>
     $(function() {
         bsCustomFileInput.init();
     });

     $(function() {
         // Summernote
         $('#summernote').summernote({
             height: 150
         });

     })

     function selectionJabatan() {
         if (document.getElementById('ckpramusaji').checked) {
             document.getElementById('pramusaji').style.display = 'block';
             document.getElementById('pramubakti').style.display = 'none';
         } else {
             document.getElementById('pramusaji').style.display = 'none';
             document.getElementById('pramubakti').style.display = 'block';
         }
     }
 </script>

 <script>
     $(function() {
         bsCustomFileInput.init();
     });
 </script>
 </body>

 </html>