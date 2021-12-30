<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Lockscreen</title>

    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>asset/plugin/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link href="<?php echo base_url() ?>asset/css/adminlte.min.css" rel="stylesheet">
</head>

<body class="hold-transition lockscreen">


    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="../../index2.html"><b>Admin</b>HRMS</a>
        </div>
        <br>


        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="<?php echo base_url() ?>asset/img/boxed-bg.jpg" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form method="post" class="lockscreen-credentials" action="<?php echo base_url() ?>login/login">
                <!-- <form class="lockscreen-credentials"> -->
                <div class="input-group">
                    <input type="text" name="username" class="form-control" placeholder="email / phone number">
                </div>
                <div class="input-group">
                    <input type="text" name="password" class="form-control" placeholder="password">

                    <div class="input-group-append">
                        <!-- <button type="button" class="btn"> -->
                        <button type="submit" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->

        <div class="lockscreen-footer text-center">
            Copyright &copy; 2014-2020 <b><a href="https://adminlte.io" class="text-black"></a></b><br>
            All rights reserved
        </div>
    </div>
    <!-- /.center -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>asset/plugin/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>asset/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>