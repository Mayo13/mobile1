<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penilaian PNASN Imigrasi</title>
    <link rel="shortcut icon" href=" <?php echo base_url() ?>asset/img/logo.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>asset/plugin/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link href="<?php echo base_url() ?>asset/plugin/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href=" <?php echo base_url() ?>asset/plugin/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href=" <?php echo base_url() ?>asset/plugin/jqvmap/jqvmap.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link href=" <?php echo base_url() ?>asset/css/adminlte.min.css" rel="stylesheet">
    <!-- overlayScrollbars -->
    <link href="<?php echo base_url() ?>asset/plugin/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet">
    <!-- Daterange picker -->
    <link href="<?php echo base_url() ?>asset/plugin/daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- summernote -->
    <!-- Select2 CSS -->
    <link href="<?= base_url() ?>asset/plugin/select2/dist/css/select2.css" rel="stylesheet" />

    <link href="<?php echo base_url() ?>asset/plugin/summernote/summernote-bs4.min.css" rel="stylesheet">
    <!-- DataTables -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/plugin/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <style>
        .select2-selection__rendered {
            line-height: 25px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }

        .bigdrop.select2-container .select2-results {
            max-height: 200px;
        }

        .bigdrop .select2-results {
            max-height: 200px;
        }

        .bigdrop .select2-choices {
            min-height: 150px;
            max-height: 150px;
            overflow-y: auto;
        }

        .note-group-select-from-files {
            display: none;
        }

        .Akses {
            /* border: 4px solid red; */
            padding: 20px;
            overflow: hidden;
            /* background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1); */
            /* background-image: linear-gradient(to left top, #bf485e, #e76752, #ff913d, #ffc227, #f2f62e); */
            /* background-image: url("<?php echo base_url() ?>asset/img/bc_denied.jpg"); */
        }

        .Akses img {
            float: left;
            width: 200%;
            height: 100%;
        }

        .canvasku {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }

        .Akses p {
            display: block;
            margin: 10px 0 0 0;
        }

        .iconListDep:before {
            content: "\25C9";
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        /* ==== */

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
    </style>

</head>