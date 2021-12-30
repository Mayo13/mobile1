<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berkas</title>
    <style>
        .internal {
            width: 100%;
            height: 100%;
        }

        .container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if ($jenis_berkas == 'foto') : ?>
            <?php if ($berkas[0]->tipe_foto == '.pdf') : ?>
                <object class='internal' type='application/pdf' data="<?php base_url("file/berkas/" . $berkas[0]->berkas_kode . '/' . $berkas[0]->nama_foto)  ?>" + new Date().getTime()></object>
            <?php elseif ($berkas[0]->tipe_foto == '.png' || $berkas[0]->tipe_foto == '.jpg') : ?>
                <img height='100%' width='100%' src="<?php echo base_url() ?>file/berkas/<?php echo $berkas[0]->berkas_kode  . "/" . $berkas[0]->nama_foto  ?>" + new Date().getTime()>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($jenis_berkas == 'ktp') : ?>
            <?php if ($berkas[0]->tipe_ktp == '.pdf') : ?>
                <object class='internal' type='application/pdf' data="<?php base_url("file/berkas/" . $berkas[0]->berkas_kode . '/' . $berkas[0]->nama_ktp)  ?>" + new Date().getTime()></object>
            <?php elseif ($berkas[0]->tipe_ktp == '.png' || $berkas[0]->tipe_foto == '.jpg') : ?>
                <img height='100%' width='100%' src="<?php echo base_url() ?>file/berkas/<?php echo $berkas[0]->berkas_kode  . "/" . $berkas[0]->nama_ktp  ?>" + new Date().getTime()>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($jenis_berkas == 'npwp') : ?>
            <?php if ($berkas[0]->tipe_npwp == '.pdf') : ?>
                <object class='internal' type='application/pdf' data="<?php base_url("file/berkas/" . $berkas[0]->berkas_kode . '/' . $berkas[0]->nama_npwp)  ?>" + new Date().getTime()></object>
            <?php elseif ($berkas[0]->tipe_npwp == '.png' || $berkas[0]->tipe_foto == '.jpg') : ?>
                <img height='100%' width='100%' src="<?php echo base_url() ?>file/berkas/<?php echo $berkas[0]->berkas_kode  . "/" . $berkas[0]->nama_npwp  ?>" + new Date().getTime()>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($jenis_berkas == 'no_rek') : ?>
            <?php if ($berkas[0]->tipe_no_rek == '.pdf') : ?>
                <object class='internal' type='application/pdf' data="<?php base_url("file/berkas/" . $berkas[0]->berkas_kode . '/' . $berkas[0]->nama_no_rek)  ?>" + new Date().getTime()></object>
            <?php elseif ($berkas[0]->tipe_no_rek == '.png' || $berkas[0]->tipe_foto == '.jpg') : ?>
                <img height='100%' width='100%' src="<?php echo base_url() ?>file/berkas/<?php echo $berkas[0]->berkas_kode  . "/" . $berkas[0]->nama_no_rek  ?>" + new Date().getTime()>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($jenis_berkas == 'cv') : ?>
            <?php if ($berkas[0]->tipe_cv == '.pdf') : ?>
                <object class='internal' type='application/pdf' data="<?php base_url("file/berkas/" . $berkas[0]->berkas_kode . '/' . $berkas[0]->nama_cv)  ?>" + new Date().getTime()></object>
            <?php elseif ($berkas[0]->tipe_cv == '.png' || $berkas[0]->tipe_foto == '.jpg') : ?>
                <img height='100%' width='100%' src="<?php echo base_url() ?>file/berkas/<?php echo $berkas[0]->berkas_kode  . "/" . $berkas[0]->nama_cv  ?>" + new Date().getTime()>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($jenis_berkas == 'surat_lamaran') : ?>
            <?php if ($berkas[0]->tipe_surat_lamaran == '.pdf') : ?>
                <object class='internal' type='application/pdf' data="<?php base_url("file/berkas/" . $berkas[0]->berkas_kode . '/' . $berkas[0]->nama_surat_lamaran)  ?>" + new Date().getTime()></object>
            <?php elseif ($berkas[0]->tipe_surat_lamaran == '.png' || $berkas[0]->tipe_foto == '.jpg') : ?>
                <img height='100%' width='100%' src="<?php echo base_url() ?>file/berkas/<?php echo $berkas[0]->berkas_kode  . "/" . $berkas[0]->nama_surat_lamaran  ?>" + new Date().getTime()>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($jenis_berkas == 'ijasah') : ?>
            <?php if ($berkas[0]->tipe_ijasah == '.pdf') : ?>
                <object class='internal' type='application/pdf' data="<?php base_url("file/berkas/" . $berkas[0]->berkas_kode . '/' . $berkas[0]->nama_ijasah)  ?>" + new Date().getTime()></object>
            <?php elseif ($berkas[0]->tipe_ijasah == '.png' || $berkas[0]->tipe_foto == '.jpg') : ?>
                <img height='100%' width='100%' src="<?php echo base_url() ?>file/berkas/<?php echo $berkas[0]->berkas_kode  . "/" . $berkas[0]->nama_ijasah  ?>" + new Date().getTime()>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>