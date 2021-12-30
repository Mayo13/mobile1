<div class="wrapper">
    <!-- <?php echo $this->session->userdata('role_id');
            echo $this->session->userdata('is_mobile');

            if ($this->session->userdata('is_mobile') == 1 && ($this->session->userdata('role_id') == 3 || $this->session->userdata('role_id') == 4 || $this->session->userdata('role_id') == 2)) {
                echo "masuk";
            } else {
                echo "keluar";
            }
            ?> -->
    <?php if ($this->session->userdata('is_mobile') == 1 && ($this->session->userdata('role_id') == 3 || $this->session->userdata('role_id') == 4 || $this->session->userdata('role_id') == 2)) : ?>
        <!-- <?php if ($this->session->userdata('role_id') == 3 || $this->session->userdata('role_id') == 4 || $this->session->userdata('role_id') == 2 || $this->session->userdata('is_mobile') == 1) : ?> -->
        <nav class="main-header navbar navbar-expand navbar-primary navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!-- <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> -->
                    <br>
                </li>
            </ul>
        </nav>
        <!-- <?php else : ?> -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!-- <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> -->
                    <br>
                </li>
            </ul>
        </nav>
        <!-- <?php endif; ?> -->

    <?php else : ?>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url('index.php/Dashboard') ?>" class="nav-link"></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
    <?php endif; ?>