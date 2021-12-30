<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('index.php/Dashboard') ?>" class="brand-link">
        <img src="<?php echo base_url() ?>asset/img/logo.png" class="brand-image img-circle elevation-3" style="width: 40px; height: 40px;" style="opacity: .8">
        <span class="brand-text font-weight-light">Penilaian PNASN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="<?php echo base_url() ?>asset/img/user.jpg" class=" img-circle elevation-2" style="width: 80px; height: 80px;" alt="User Image"> -->
            </div>
            <br>
            <div class="info">
                <!-- <div><img src="https://i.redd.it/r9ahzy5qr8wz.jpg" alt="user" style="width: 150px; border-radius: 50%;"></div> -->
                <div style="align-self: center;"><img src="<?php echo  base_url($this->session->userdata('profileImage')) ?>" style="width: 130px; height: 130px; border-radius: 50%;"></div>
                <!-- $this->session->userdata('profileImage') -->
                <br>
                <div style="color: blue;" class="d-block">
                    <a style="color: white;" href="<?php echo base_url('index.php/Settings/pegawaisettprofile') ?>"><?php
                                                                                                                    echo $this->session->userdata('full_name');
                                                                                                                    ?>
                </div></a>

                <div style=" color: white;" class="d-block"> <?php
                                                                if ($this->session->userdata('nip_pegawai') == '-1') {
                                                                    echo 'NIK. ' . $this->session->userdata('nik_pegawai');
                                                                } else if ($this->session->userdata('nik_pegawai') == '-1') {
                                                                    echo 'NIP. ' . $this->session->userdata('nip_pegawai');
                                                                }

                                                                ?>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <?php
                $role_id = $this->session->userdata('role_id');

                // Summary Pencarian berdasarkan role id jika role id found maka akan diarahkan
                // Sesuai dengan ketentuan yaitu daftar dari menu 1 (judul) dan menu 2 (sub judul)                

                // dibawah ini query untuk mencari judul berdasarkan role id yang berlaku
                $queryMenu = "SELECT 
                DISTINCT
                uam.`menu_id` AS sub_id1,
                sub1.`title` AS nama_sub1,
                sub1.`icon` AS icon_sub1,
                sub1.`url` AS url_sub1
                FROM `tbl_user_access_menu` AS uam
                JOIN `tbl_user_menu` AS sub1
                   ON uam.`menu_id` = `sub1`.`menu_id`
                WHERE uam.`role_id` = $role_id
                ORDER BY sub1.`no_urut` ASC
                
                ";

                $menu = $this->db->query($queryMenu)->result_array();
                ?>
                <!-- Query untuk membuat judul sidebar dimana jika tidak didalam list maka
                 akan langsung ke url jika ada list maka bernilai 1 -->
                <?php foreach ($menu as $menu1) : ?>
                    <?php
                    $role = $this->session->userdata('role_id');
                    $sub1Id = $menu1['sub_id1'];

                    // dibawah ini query untuk mencari subjudul berdasarkan 
                    // role id serta menu_id (judul) yang dimiliki oleh sang role id
                    $querySubMenu = "SELECT 
                  DISTINCT 
                  uam.`sub_id` AS sub_id2,
                  sub2.`title` AS nama_sub2,
                  sub2.`icon` AS icon_sub2,
                  sub2.`url` AS url_sub2
                  FROM `tbl_user_access_menu` AS uam
                  JOIN `tbl_user_menu_sub` AS sub2
                     ON uam.`sub_id` = sub2.`menu_sub_id`
                  WHERE uam.`menu_id` = $sub1Id and uam.`role_id` = $role
                  ORDER BY sub2.`no_urut` ASC
                  ";

                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>
                    <!-- Jika judul dari sidebar adalah 1 maka list dri judul akan dilakukan 
                    proses pencarian data pada subjudul dimana akan dibuat list judul dengan subjudul -->
                    <?php if ($menu1['url_sub1'] == 1) : ?>
                        <!-- dibawah ini adalah list untuk judul
                            dimana kita hanya akan membuka list tersebut bukan menuju halaman url -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon <?= $menu1['icon_sub1'] ?>"></i>
                                <p><?= $menu1['nama_sub1'] ?>
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <!-- dibawah ini adalah subjudul
                            dimana kita akan membuka memberikan url untuk masuk ke menu tersebut -->
                            <ul class="nav nav-treeview">
                                <?php foreach ($subMenu as $menu2) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url() ?><?= $menu2['url_sub2'] ?>">
                                            <i class="nav-icon <?= $menu2['icon_sub2'] ?>"></i>
                                            <p><?= $menu2['nama_sub2'] ?></p>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php else : ?>
                        <!-- Jika judul dari sidebar adalah !1 maka list dri judul akan menu url 
                        yang telah disediakan oleh menu -->
                        <?php foreach ($subMenu as $menu2) : ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?><?= $menu2['url_sub2'] ?>"><i nav-icon class="<?= $menu1['icon_sub1'] ?>"></i> <?= $menu2['nama_sub2'] ?> </a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>

                <!-- LogOut -->
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>admin/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>