<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<!-- <body>
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
    </table> -->

<body>
    <table style='width: 100%;'>
        <tr>
            <td width=15%>
                <img src="<?php echo base_url('asset/img/logo2.png') ?>" alt="W3Schools.com" width='90' height='90'>
            </td>
            <td style='text-align:center;'>
                <table>
                    <tr>
                        <td>
                            <h2 class='line-title'>
                                KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA RI<br>
                                DIREKTORAT JENDERAL IMIGRASI<br>
                            </h2>
                            <h4 class='line-title'>
                                Jalan H.R. Rasuna Said Kav. X-6 No. 8 Kuningan, Jakarta Selatan<br>
                                Telepon (021) 5224658 , Faksimile (021) 5225035<br>
                                Laman : www.imigrasi.go.id<br>
                            </h4>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <hr class='line-title'>

    <table>
        <tr>
            <td style='padding-right: 70px;'>Nama</td>
            <td style='padding-right: 20px;'> : </td>
            <td><?php echo $bio[0]->nama_depan . ' ' . $bio[0]->nama_belakang ?></td>
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
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Tanggal</th>
            <th>Datang </th>
            <th>Pulang</th>
            <th>Terlambat (menit)</th>
        </tr>

        <?php $no = 0; ?>

        <?php foreach ($absen as $row) : ?>
            <?php $no++ ?>

            <tr>
                <td style="text-align:justify; width: 5%; text-align: center;"><?php echo $no ?></td>
                <td style="text-align:justify; text-align: center;"><?= $bio[0]->nama_depan . ' ' . $bio[0]->nama_belakang ?></td>
                <td style="text-align:justify; text-align: center;"><?= $sub ?></td>
                <td style=" text-align:justify;text-align: center;"><?= $row['tgl'] ?></td>
                <td style="text-align:justify; width: 15%; text-align: center;"><?= substr($row['jam_datang'], 0, -3) ?></td>
                <!-- <td style=" text-align:justify; width: 15%; text-align: center;"><?= substr($row['jam_pulang'], 0, -3) ?> </td> -->
                <!-- <td style=" text-align:justify; width: 15%; text-align: center;"><?= empty($row['jam_pulang']) ? 0 : $row['terlambat']
                                                                                        ?> </td> -->
                <td style="text-align:justify; width: 15%; text-align: center;"><?= substr($row['jam_pulang'], 0, -3) ?></td>
                <td style="text-align:justify; width: 15%; text-align: center;"><?= $row['terlambat'] < 0 ? 0 : $row['terlambat']
                                                                                ?> </td>
            </tr>
            <!-- // Page {PAGENO} of {nb} -->
        <?php endforeach; ?>

    </table>

</body>

</html>