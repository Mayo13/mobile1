<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url() ?>asset/img/logo.png" class="brand-image img-circle elevation-3" style="width: 40px; height: 40px;" style="opacity: .8">
        <span class="brand-text font-weight-light">HRMS</span>
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
                <a href="#" class="d-block"> Rhea Tate</a>
                <a href="#" class="d-block"> NIP. 1278321U38719831287</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <!-- <li class="nav-header"> Setting</li> -->
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>user/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url() ?>user/daftarPegawai" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Daftar Pegawai
                        </p>
                    </a>
                </li>

                <!-- Pegawai -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pegawai
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiInput" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiEdit" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lihat dan Edit Pegawai</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-check-square"></i>
                        <p>
                        Penempatan Tugas
                        </p>
                    </a>
                </li> -->

                <!-- Penempatan -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-check-square"></i>
                        <p>
                            Penempatan Tugas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/penempatanPilih" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pilih Penempatan Tugas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/penempatanEdit" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lihat dan Edit <br> Penempatan</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <!-- Izin -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Izin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiIzinInput" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Permohonan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiIzinEdit" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Permohonan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiIzinApprove" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Approval</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <!-- Cuty -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Cuty
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiCutyInput" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Permohonan Cuty</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiCutyEdit" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Permohonan Cuty</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiCutyApprove" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Approval</p>
                            </a>
                        </li>
                    </ul>
                </li> -->


                <!-- Uraian Tugas -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Uraian Tugas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/uraianTugasInput" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Uraian Tugas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/uraianTugasEdits" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Uraian Tugas</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>
                            Penilaian Kinerja
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/uraianTugasEdit" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penilaian KTU</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/uraianTugasEdit" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penilaian Bagian BMN</p>
                            </a>
                        </li> -->
                    </ul>
                </li>

                <!-- Setting -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiSettProfile" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiSettJabatan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jabatan PNASN</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiSettUserAdd" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiSettUserEdit" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiSettSalaryEdit" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Salary</p>
                            </a>
                        </li> -->
                    </ul>
                </li>

                <!-- LogOut -->
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>user/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Lihat atau Ubah Salary
                        </p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Salary
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiSalaryInput" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Salary</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>user/pegawaiSalaryEdit" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lihat dan Edit Salary</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>