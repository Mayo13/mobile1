 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Input Izin</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Input Izin</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <!-- general form elements -->
             <div class="card card-primary">
                 <div class="card-header">
                     <h3 class="card-title">Input Izin</h3>
                 </div>
                 <!-- /.card-header -->
                 <!-- form start -->
                 <form>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label>Pilih Pegawai</label><br>
                                     <select class="selectpicker form-control" data-live-search="true">
                                         <option data-tokens="1">Brian Ocornor</option>
                                         <option data-tokens="2">Jhonny Deep</option>
                                         <option data-tokens="3">Sugar</option>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label>Mulai dari</label>
                                     <input type="date" class="form-control" id="" placeholder="">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label>Alasan Izin</label>
                                     <select class="custom-select">
                                         <option>Izin Sakit</option>
                                         <option>Izin Tidak Masuk</option>
                                         <option>Izin Masuk Siang</option>
                                         <option>Izin Masuk 1/2 Hari</option>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label>Sampai dengan</label>
                                     <input type="date" class="form-control" id="" placeholder="">
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <label>Total Izin (Hari)</label>
                             <input type="text" class="form-control" id="" placeholder="" disabled>
                         </div>
                         <div class="form-group">
                             <label>Keterangan</label>
                             <textarea id="summernote" style="height: 300px;">
                                Tuliskan <em>Keterangan</em> <u>disini</u>                               
                            </textarea>
                         </div>
                         <div class="form-group">
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
                         </div>
                     </div>
                     <!-- /.card-body -->

                     <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Submit</button>
                         <button type="submit" class="btn btn-danger">Cancel</button>
                     </div>
                 </form>
             </div>
             <!-- /.card -->
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
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

 <!-- Popper Js -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

 <!-- Bootstrap JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>

 <!-- jQuery -->
 <!-- <script src=" <?php echo base_url() ?>asset/plugin/jquery/jquery.min.js"></script> -->
 <!-- Bootstrap 4 -->
 <!-- <script src=" <?php echo base_url() ?>asset/plugin/bootstrap/js/bootstrap.bundle.min.js"></script> -->
 <!-- bs-custom-file-input -->
 <script src=" <?php echo base_url() ?>asset/plugin/bs-custom-file-input/bs-custom-file-input.min.js"></script>
 <!-- AdminLTE App -->
 <script src=" <?php echo base_url() ?>asset/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src=" <?php echo base_url() ?>asset/js/demo.js"></script>
 <!-- Page specific script -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous"></script>
 <!-- Summernote -->
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
 </script>

 </body>

 </html>