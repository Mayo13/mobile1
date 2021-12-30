<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="<?= base_url('asset/css/adminlte.min.css') ?>">
    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'> -->
</head>

<body>
    <table style='width: 100%;'>
        <tr>
            <td width=1%>
                <img src="<?php echo base_url('asset/img/logo2.png') ?>" alt="W3Schools.com" width='90' height='90'>
            </td>
            <td style='text-align:center'>
                <h3 style='line-height: 1.6; font-weight: bold;'>
                    Direktorat Jenderal Imigrasi<br>
                    Laporan Absensi Pegawai
                </h3>
            </td>
        </tr>
    </table>

    <hr class='line-title'>

    <table>
        <tr>
            <td style='padding-right: 70px;'>Nama</td>
            <td style='padding-right: 20px;'> : </td>
            <td><?php echo $bio[0]->nama_depan ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td> : </td>
            <td><?php echo $jabatan ?></td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td> : </td>
            <td><?php echo $dep ?></td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td><?php echo $sub ?></td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td><?php echo $bag ?></td>
        </tr>
        <tr>
            <td>Periode</td>
            <td> : </td>
            <td><?php echo $periode ?></td>
        </tr>
    </table>

    <hr class='line-title'>

    <table border='1' cellpadding='10' cellspacing='0'>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>In </th>
            <th>Out</th>
            <th>Late</th>
        </tr>

        <?php $no = 0; ?>

        <?php foreach ($absen as $row) : ?>
            <?php $no++ ?>

            <tr>
                <td style="text-align:justify"><?php echo $no ?></td>
                <td style="text-align:justify"><?= $row['tgl'] ?></td>
                <td style="text-align:justify"><?= $row['jam_datang'] ?></td>
                <td style="text-align:justify"><?= $row['jam_pulang'] ?> </td>
                <td style="text-align:justify"><?= $row['terlambat'] ?> </td>
            </tr>
            <!-- // Page {PAGENO} of {nb} -->
        <?php endforeach; ?>

    </table>

</body>

</html>