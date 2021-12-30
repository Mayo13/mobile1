<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penilaian PNASN</title>
    <link rel="shortcut icon" href=" <?php echo base_url() ?>asset/img/logo.png">
    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>asset/plugin/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link href="<?php echo base_url() ?>asset/css/adminlteLogin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style>
        body {
            background-image: url('<?php echo base_url() ?>asset/img/bc_login.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .modal-confirm {
            color: #636363;
            width: 325px;
            margin: 80px auto 0;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }

        .modal-confirm .form-control,
        .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
        }

        .modal-confirm .icon-box {
            color: #fff;
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #ef513a;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .modal-confirm .icon-box i {
            font-size: 56px;
            position: relative;
            top: 4px;
        }

        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #ef513a;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }

        .modal-confirm .btn:hover,
        .modal-confirm .btn:focus {
            background: #da2c12;
            outline: none;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }

        .lockscreen-image .img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body class="hold-transition lockscreen">
    <div id="myModalEmpty" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-times fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Error!</h2>
                    <p style="text-align: center;"><?php echo $this->session->flashdata('empty') ?></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div id="myModalWrong" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-times fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Error!</h2>
                    <p style="text-align: center;"><?php echo $this->session->flashdata('wrong') ?></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal404" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-times fa-3x"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Error!</h2>
                    <p style="text-align: center;"><?php echo $this->session->flashdata('404') ?></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">

        <div class="lockscreen-logo" style="color: white; font-size: 23pt;">
            <b>Aplikasi PNASN </b> <br>
            <b>Direktorat Jenderal Imigrasi </b>
        </div>
        <br><br>


        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="<?php echo base_url() ?>asset/img/logo.png" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->



            <!-- lockscreen credentials (contains the form) -->
            <form method="post" class="lockscreen-credentials" action="<?php echo base_url() ?>auth/login" style="padding-top: 30px;">
                <!-- <form class="lockscreen-credentials"> -->
                <div class="input-group">
                    <input style="height: 80px;" type="text" name="username" class="form-control" placeholder="Email">
                </div>
                <div class="input-group">
                    <input style="height: 80px;" type="password" name="password" class="form-control" placeholder="Password">

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

        <div class="lockscreen-footer text-center" style="color: white; font-size: 15pt;">
            <?php
            $this->load->view('admin/template/4footerLogin');
            ?>
        </div>

    </div>
    <!-- /.center -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>asset/plugin/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>asset/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <?php if ($this->session->flashdata('wrong')  == "Username Atau Password Salah") : ?>
        <script>
            $(document).ready(function() {
                $("#myModalWrong").modal();
            });
        </script>
    <?php elseif ($this->session->flashdata('404')  == "Url Tidak Ditemukan") : ?>

        <script>
            $(document).ready(function() {
                $("#myModal404").modal();
            });
        </script>
    <?php elseif ($this->session->flashdata('empty')  == "Username Atau Password tidak boleh kosong") : ?>

        <script>
            $(document).ready(function() {
                $("#myModalEmpty").modal();
            });
        </script>

    <?php endif; ?>

</body>

</html>