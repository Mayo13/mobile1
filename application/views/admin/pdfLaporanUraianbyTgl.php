<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin HRMS Imigrasi</title>
    <!-- Theme style -->
    <link href=" <?php echo FCPATH . 'asset/css/adminlte.min.css' ?>" rel="stylesheet">

</head>

<body>
    <img src="<?php echo define(FCPATH, 'asset/img/logo.jpg') ?>" style="position: absolute; width: 60px; height: 60px;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    Direktorat Jenderal Imigrasi<br>
                    Laporan Kegiatan PNASN
                </span>
            </td>
        </tr>
    </table>

    <hr class="line-title">
    <table>
        <tr>
            <td style="padding-right: 70px;">Nama</td>
            <td style="padding-right: 20px;"> : </td>
            <td><?php echo $nama ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td> : </td>
            <td><?php echo $jabatan ?></td>
        </tr>
        <tr>
            <td>Department</td>
            <td> : </td>
            <td><?php echo $department ?></td>
        </tr>
    </table>
    <br>

    <!-- <table class="table table-bordered"> -->
    <table border="1">
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Pukul</th>
            <th>Pelaksanaan Kegiatan</th>
            <th>Keterangan</th>
            <th>Surat Dikerjakan</th>
            <th>Lokasi Kerja</th>
            <th>Tindak Lanjut</th>
            <th>Status Kegiatan</th>
        </tr>
        <?php $no = 1;
        foreach ($dataDetail as $row) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->waktu ?></td>
                <td><?php echo $row->dari . " - " . $row->sampai ?></td>
                <td><?php echo $row->pelaksanaan_kegiatan ?></td>
                <td><?php echo $row->keterangan ?></td>
                <td><?php echo $row->surat_dikerjakan ?></td>
                <td><?php echo $row->lokasi_kerja ?></td>
                <td><?php echo $row->tindak_lanjut ?></td>
                <td><?php echo $row->status_kegiatan ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <!-- AdminLTE App -->
    <script src=" <?php echo base_url() ?>asset/js/adminlte.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>asset/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
</body>

</html>