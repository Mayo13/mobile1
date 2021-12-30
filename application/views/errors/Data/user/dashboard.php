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
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Detail Pegawai</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">List Uraian Bulan ini</span>
                            <!-- <span class="info-box-number">760</span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="far fa-folder"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Uraian</span>
                            <!-- <span class="info-box-number">2,000</span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 </strong>
    All rights reserved.

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
            legend: {
                display: false
            }
        }
        // Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // eslint-disable-next-line no-unused-vars
        var pieChart = new Chart(pieChartCanvas, {
            type: 'doughnut',
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