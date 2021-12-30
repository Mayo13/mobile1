<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="modal fade" id="myModal404" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content Akses">
                <!-- <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                </div> -->
                <div class="modal-body">
                    <img src="<?php echo base_url() ?>asset/img/stop.png" style="width: 20%;">
                    <p style="text-align: center; font-size: 20pt; color: red;">Error 403: Acess Denied !!!</p>
                    <!-- <?php echo $this->session->userdata('a404'); ?> -->
                </div>
                <!-- <div class="modal-footer bg-danger">
                </div> -->
            </div>
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total PNASN</span>
                            <span class="info-box-number">
                                <?php
                                echo $total_pegawai;
                                ?>
                                <small>Orang</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Pimpinan</span>
                            <span class="info-box-number">
                                <?php
                                echo $total_pimpinan;
                                ?>
                                <small>Orang</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List PNASN</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="users-list clearfix">
                                <?php
                                $no = 1;
                                foreach ($berkas as $row) {
                                ?>
                                    <li>
                                        <!-- <img src="data:<?php echo $row->tipe_foto; ?>;base64,<?php echo $row->foto; ?>" width="50" height="100" alt="User Image"> -->
                                        <img src="<?php echo base_url() ?>file/berkas/<?php echo $row->berkas_kode; ?>/<?php echo $row->nama_foto; ?>" style="width: 80px; height: 80px; " alt=" User Image">
                                        <a class="users-list-name" href="#"><?php echo $row->nama_depan; ?></a>
                                        <span class="users-list-date"><?php echo $row->join_date; ?></span>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href=" <?php echo base_url() ?>index.php/Admin/daftarPegawai">Lihat Semua PNASN</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!--/.card -->
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chart PNASN</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="chart-responsive">
                                <canvas id="pieChart" height="205"></canvas>
                            </div>
                            <!-- ./chart-responsive -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chart Pimpinan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="chart-responsive">
                                <canvas id="pieChartPimp" height="205"></canvas>
                            </div>
                            <!-- ./chart-responsive -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Total PNASN</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <?php
                                foreach ($pegawaiOnJbt as $key) {
                                    echo '<li class="item">';
                                    echo '<div class="product-info" style="margin-left: 0%;">';
                                    echo '<div class="product-title" style="font-weight: normal;">';
                                    echo  $key->nama;
                                    echo '<span class="float-right">' . $key->jabatanDep . ' Orang</span></div>';
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- <div class="card-body">
                            <ul class="nav nav-pills flex-column responsive">
                                <?php
                                foreach ($pegawaiOnJbt as $key) {
                                    echo '<li class="nav-item">';
                                    echo '<a href="#" class="nav-link">';
                                    echo  $key->nama;
                                    echo  '<span class="float-right text-danger">' . $key->jabatanDep . ' Orang</span>';
                                }
                                ?>
                            </ul>
                        </div> -->
                        <!-- /.card-body -->
                        <div class="card-footer bg-light p-0">

                        </div>
                        <!-- /.footer -->
                    </div>

                </div>
                <!-- /.card -->
            </div>

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
<script src="<?php echo base_url() ?>asset/plugin/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>asset/plugin/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>asset/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>asset/plugin/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>asset/plugin/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>asset/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url() ?>asset/plugin/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugin/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>asset/plugin/chart.js/Chart.min.js"></script>

<?php
// $ok = $this->session->userdata('404');
$ok =  $this->session->userdata('a404');
if ($ok == "Akses Ditolak !!") : ?>
    <script>
        $(document).ready(function() {
            $("#myModal404").modal();
        });
    </script>
<?php endif; ?>


<script>
    $(function() {
        //-------------
        // - PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = {
            labels: <?php
                    echo "[";
                    foreach ($pegawaiOnDept as $key) {
                        echo "'" . $key->nama . "',";
                    }
                    echo "]";
                    ?>,
            // [
            // 'Direktorat Sistik',
            // 'Direktorat Wasdak',
            // 'Direktorat Intel',
            // 'Direktorat Intal',
            // 'Direktorat Lantaskim',
            // 'Direktorat Kermakim'
            // ],

            datasets: [{
                data: <?php
                        echo "[";
                        foreach ($pegawaiOnDept as $key) {
                            echo "'" . $key->pegawaiDep . "',";
                        }
                        echo "],";
                        ?>
                // [7, 5, 4, 6, 3, 1, 2, 4, 3, 4, 5],
                backgroundColor: <?php
                                    echo "[";
                                    foreach ($dataDep as $key) {
                                        echo "'" . $key->icon . "',";
                                    }
                                    echo "]";
                                    ?>
                // ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
            }]
        }

        var pieOptions = {
            responsive: true,
            legend: {
                position: 'right',
                labels: {
                    fontColor: "black",
                    boxWidth: 50,
                    padding: 10
                }
            }
            // legend: {
            //     display: true,
            //     Position: 'right'
            // }
        }
        // Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // eslint-disable-next-line no-unused-vars
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

        //-----------------
        // - END PIE CHART -
        //-----------------
    })

    $(function() {
        //-------------
        // - PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChartPimp').get(0).getContext('2d')
        var pieData = {
            labels: <?php
                    echo "[";
                    foreach ($ktuOnDept as $key) {
                        echo "'" . $key->nama . "',";
                    }
                    echo "]";
                    ?>,
            // [
            // 'Direktorat Sistik',
            // 'Direktorat Wasdak',
            // 'Direktorat Intel',
            // 'Direktorat Intal',
            // 'Direktorat Lantaskim',
            // 'Direktorat Kermakim'
            // ],

            datasets: [{
                data: <?php
                        echo "[";
                        foreach ($ktuOnDept as $key) {
                            echo "'" . $key->pegawaiDep . "',";
                        }
                        echo "],";
                        ?>
                // [7, 5, 4, 6, 3, 1, 2, 4, 3, 4, 5],
                backgroundColor: <?php
                                    echo "[";
                                    foreach ($dataDep as $key) {
                                        echo "'" . $key->icon . "',";
                                    }
                                    echo "]";
                                    ?>
                // ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
            }]
        }

        var pieOptions = {
            responsive: true,
            legend: {
                position: 'right',
                labels: {
                    fontColor: "black",
                    boxWidth: 50,
                    padding: 10
                }
            }
            // legend: {
            //     display: true,
            //     Position: 'right'
            // }
        }
        // Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // eslint-disable-next-line no-unused-vars
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

        //-----------------
        // - END PIE CHART -
        //-----------------
    })
</script>

</body>

</html>