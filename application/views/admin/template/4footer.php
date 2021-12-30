<?php if ($this->session->userdata('is_mobile') == 1 && ($this->session->userdata('role_id') == 3 || $this->session->userdata('role_id') == 4 || $this->session->userdata('role_id') == 2)) : ?>
    <!-- <?php if ($this->session->userdata('role_id') == 3 || $this->session->userdata('role_id') == 4 || $this->session->userdata('role_id') == 2 || $this->session->userdata('is_mobile') == 1) : ?> -->
    <br>
    <nav class="navbar navbar-dark bg-primary navbar-expand fixed-bottom d-md-none d-lg-none d-xl-none">
        <ul class="navbar-nav nav-justified w-100">

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
                  sub2.`title_mobile` AS namaShort_sub2,
                  sub2.`icon` AS icon_sub2,
                  sub2.`icon_svg` AS iconSvg_sub2,
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
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon <?= $menu1['icon_sub1'] ?>"></i>
                            <p><?= $menu1['nama_sub1'] ?>
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        dibawah ini adalah subjudul
                        dimana kita akan membuka memberikan url untuk masuk ke menu tersebut
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
                    </li> -->
                <?php else : ?>
                    <!-- Jika judul dari sidebar adalah !1 maka list dri judul akan menu url 
                        yang telah disediakan oleh menu -->


                <?php endif; ?>
                <?php foreach ($subMenu as $menu2) : ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url() ?><?= $menu2['url_sub2'] ?>" class="nav-link text-center">
                            <?= $menu2['iconSvg_sub2'] ?>
                            <span class="small d-block"><?= $menu2['namaShort_sub2'] ?></span>
                        </a>
                    </li>
                    <!-- <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?><?= $menu2['url_sub2'] ?>"><i nav-icon class="<?= $menu1['icon_sub1'] ?>"></i> <?= $menu2['nama_sub2'] ?> </a></li> -->
                <?php endforeach; ?>
            <?php endforeach; ?>

            <!-- LogOut -->
            <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/logout" class="nav-link text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg>
                    <span class="small d-block">LogOut</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- <?php else : ?> -->
    <div class="float-right d-none d-sm-block" style="font-size: 12pt;">
        <b>Version</b> 1.0
    </div>
    <strong style="font-size: 12pt;">Copyright &copy; 2020 HRMS PNASN IMIGRASI <br></strong>
    <!-- <?php endif; ?> -->
<?php else : ?>
    <div class="float-right d-none d-sm-block" style="font-size: 12pt;">
        <b>Version</b> 1.0
    </div>
    <strong style="font-size: 12pt;">Copyright &copy; 2020 HRMS PNASN IMIGRASI <br></strong>
<?php endif; ?>