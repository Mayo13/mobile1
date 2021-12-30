<?php

class SVC_Submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('zip');
        $this->load->library('encryption');
        $this->load->model('Pegawai_model', 'MPegawai');
        $this->load->model('Absensi_model', 'MAbsen');
        $this->load->model('Login_model', 'MLogin');
        $this->load->model('Wilayah_model', 'Mwil');
        $this->load->model('Department_model', 'Mdep');
        $this->load->model('Jabatan_model', 'Mjabatan');
        $this->load->model('Kegiatan_model', 'MKegiatan');
        $this->load->model('Berkas_model', 'Mberkas');
        $this->load->model('Laporan_model', 'Mlap');
        $this->load->model('Kinerja_model', 'Mkinerja');
        $this->load->helper('my_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // $this->load->library('myDompdf');
        $this->load->helper('file');
        $this->load->helper('string');
        // $this->load->library('Mobile_Detect');

        // $this->is_right();
        // $this->validasiUser();
    }


    public function is_mobile() //Not Used
    {
        $detect = new Mobile_Detect;
        if ($detect->isMobile()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function is_m() //Not Used
    {
        $detect = $this->is_mobile();
        // var_dump($detect);
        if ($detect == 1) {
            echo "this is mobile";
        } else {
            echo "this is pc";
        }
    }

    public function index() //Not Used
    {
        // $this->dashboard();
    }

    public function is_right() //Done
    {
        // $menu1 = $this->uri->segment(1);
        // $menu2 = $this->uri->segment(2);
        // $validasi = 'index.php/' . $menu1 . '/' . $menu2;

        if ($this->session->userdata('is_on') != TRUE) {
            $url = base_url() . 'index.php/auth';
            redirect($url);
        }
    }

    public function validasiUser() //Done
    {
        $menu1 = $this->uri->segment(1);
        $menu2 = $this->uri->segment(2);
        $validasi = 'index.php/' . $menu1 . '/' . $menu2;
        $role_id = $this->session->userdata('role_id');
        $menu =  $this->MLogin->get_is_menu($role_id, $validasi);


        $subMenu =  $this->MLogin->get_is_subMenu($role_id, $validasi);
        $checku = null;
        if (empty($menu)) {
            $checku = $subMenu;
        } else {
            $checku = $menu;
        }
        $checkRun = $this->MLogin->get_rightFunRun($validasi);

        if (!empty($checkRun)) {
            if (empty($checku)) {
                $this->session->set_userdata('a404', "Akses Ditolak !!");
                redirect('index.php/dashboard/dashboard');
            }
        }
    }

    public function ada()
    {
        $tgl = date('d-m-Y');
        $is_friday = in_array(date('l', strtotime($tgl)), ['Friday']);;
        if ($is_friday == 1) {
            $hari = 'jumat';
        } else {
            $hari = 'week_day';
        }

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('H:i');
        $shift_in = $this->MAbsen->shift_absen($hari);

        if ($waktu > $shift_in[0]->finish) {
            $kocak = 'telat';
        } else {
            $kocak = 'oth';
        }
        $info = ucfirst($this->uri->segment(3));
        $absen_masuk = array(
            'tgl' => date('Y-m-d'),
            "waktu_datang" => date('H:i'),
            "terlambat" => "SELECT TIME_TO_SEC(TIMEDIFF('" . date('H:i:') . "','" . $shift_in[0]->finish . "'))/60)",
        );

        $ok = "SELECT TIME_TO_SEC(TIMEDIFF(" . date('H:i:') . "," . $shift_in[0]->finish . "))/60)";
        // var_dump($absen_masuk);


        echo "Peter is " . $absen_masuk['tgl'];


        $string =  str_replace("'\'", "", $ok);
        // if ($info == "masuk") {
        //     echo "masuk";
        // } else {
        //     echo "kluar";
        // }
    }

    public function submit_absen()
    {
        $info = ucfirst($this->uri->segment(3));
        date_default_timezone_set('Asia/Jakarta');

        $empId = $this->session->userdata('emp_id');

        $tgl = date('d-m-Y');
        $is_friday = in_array(date('l', strtotime($tgl)), ['Friday']);;
        if ($is_friday == 1) {
            $hari = 'jumat';
        } else {
            $hari = 'week_day';
        }

        $waktu = date('H:i');
        $shift_in = $this->MAbsen->shift_absen($hari);

        if ($waktu > $shift_in[0]->finish) {
            $string = "";
        } else {
            $string = "0";
        }

        $string = "(SELECT TIME_TO_SEC(TIMEDIFF('" . $waktu . "', '" . substr($shift_in[0]->finish, 0, -3) . "'))/60)";

        $absen_masuk = array(
            'tgl' => date('Y-m-d'),
            'waktu_datang' => date('H:i'),
            'terlambat' => $string,
            'emp_id' => $empId
        );

        $idAbsen = $this->MAbsen->absen_user_byMasuk_Pulang($this->session->userdata('emp_id'));

        $absen_pulang = array(
            'tgl' => date('Y-m-d'),
            'waktu_pulang' => date('H:i'),
            'emp_id' => $empId
        );

        if ($info == "Masuk") {
            $result = $this->MAbsen->insert_data_absen($absen_masuk);
            if (!empty($result)) {
                $this->session->set_flashdata('absen_msg', 'berhasil');
            } else {
                $this->session->set_flashdata('absen_msg', 'gagal');
            }
        } else {
            $result2 = $this->MAbsen->update_data($idAbsen[0]->absen_id, $absen_pulang);
            if (!empty($result2)) {
                $this->session->set_flashdata('absen_msg', 'berhasil');
            } else {
                $this->session->set_flashdata('absen_msg', 'gagal');
            }
        }



        redirect('Absensi/check_absen');
    }

    public function submit_pegawaiInput()
    {
        $this->form_validation->set_rules('nik_KTP', 'Column', 'required');
        $this->form_validation->set_rules('nik_pegawai', 'Column', 'required');
        $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Column', 'required');
        $this->form_validation->set_rules('gender', 'Column', 'required');
        $this->form_validation->set_rules('address1', 'Column', 'required');
        $this->form_validation->set_rules('prov', 'Column', 'required');
        $this->form_validation->set_rules('kab', 'Column', 'required');
        $this->form_validation->set_rules('kec', 'Column', 'required');
        $this->form_validation->set_rules('des', 'Column', 'required');
        $this->form_validation->set_rules('no_telp', 'Column', 'required');
        $this->form_validation->set_rules('email', 'Column', 'required|valid_email');
        $this->form_validation->set_rules('jabatan', 'Column', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Column', 'required');

        $berkas_kode = random_string('alnum', 20);
        $login_id = $this->session->userdata('emp_login_id');
        $datab['berkas_kode'] = $berkas_kode;
        $datab['created_by'] = $login_id;

        //validasi file
        // 001 is file restriction
        // 002 is empty

        $error = array();

        if ($this->form_validation->run() != false) {
            // if (1 + 1 == 2) {
            $namaBelakang = null;

            if (!empty($_POST['nama_belakang'])) {
                $namaBelakang = $_POST['nama_belakang'];
            } else {
                $namaBelakang = " ";
            }

            $data = array(
                'nik_ktp' => $_POST['nik_KTP'],
                'nik_pegawai' => $_POST['nik_pegawai'],
                'nip_pegawai' => -1,
                'nama_depan' => ucwords($_POST['nama_depan']),
                'nama_belakang' => ucwords($namaBelakang),
                'tgl_lahir' => $_POST['tanggal_lahir'],
                'gender' => $_POST['gender'],
                'address1' => $_POST['address1'],
                'address2' => $_POST['address2'],
                'address3' => $_POST['address3'],
                'prov_id' => $_POST['prov'],
                'kab_id' => $_POST['kab'],
                'kec_id' => $_POST['kec'],
                'des_id' => $_POST['des'],
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'jabatan_id' => $_POST['jabatan'],
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
                'join_date'  => $_POST['tanggal_masuk'],
            );


            $files_path = './file/berkas/' . $berkas_kode . '/';
            if (!file_exists($files_path)) {
                mkdir($files_path, 0777, true);
            }

            $config['upload_path']          = $files_path;
            $config['allowed_types']        = 'gif|jpeg|jpg|png|pdf';
            $config['max_size']             = 5000;
            $this->load->library('upload', $config);

            if (!empty($_FILES['foto']['name'])) {
                $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                $_FILES['foto']['name'] = "foto." . $ext;
                if ($this->upload->do_upload('foto')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_foto'] = $uploadData['file_name'];
                    $datab['tipe_foto'] = $uploadData['file_ext'];
                    $datab['size_foto'] = $uploadData['file_size'];
                    $datab['url_foto'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Foto'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'foto is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Foto'
                );
            }

            if (!empty($_FILES['ktp']['name'])) {
                $ext = strtolower(pathinfo($_FILES['ktp']['name'], PATHINFO_EXTENSION));
                $_FILES['ktp']['name'] = "ktp." . $ext;
                if ($this->upload->do_upload('ktp')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_ktp'] = $uploadData['file_name'];
                    $datab['tipe_ktp'] = $uploadData['file_ext'];
                    $datab['size_ktp'] = $uploadData['file_size'];
                    $datab['url_ktp'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File KTP'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'KTP is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File KTP'
                );
            }

            if (!empty($_FILES['npwp']['name'])) {
                $ext = strtolower(pathinfo($_FILES['npwp']['name'], PATHINFO_EXTENSION));
                $_FILES['npwp']['name'] = "npwp." . $ext;
                if ($this->upload->do_upload('npwp')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_npwp'] = $uploadData['file_name'];
                    $datab['tipe_npwp'] = $uploadData['file_ext'];
                    $datab['size_npwp'] = $uploadData['file_size'];
                    $datab['url_npwp'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File NPWP'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'NPWP is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File NPWP'
                );
            }

            if (!empty($_FILES['no_rek']['name'])) {
                $ext = strtolower(pathinfo($_FILES['no_rek']['name'], PATHINFO_EXTENSION));
                $_FILES['no_rek']['name'] = "nomor_rekening." . $ext;
                if ($this->upload->do_upload('no_rek')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_no_rek'] = $uploadData['file_name'];
                    $datab['tipe_no_rek'] = $uploadData['file_ext'];
                    $datab['size_no_rek'] = $uploadData['file_size'];
                    $datab['url_no_rek'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File No_Rekening'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Nomor Rekening is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File No_Rekening'
                );
            }

            if (!empty($_FILES['cv']['name'])) {
                $ext = strtolower(pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION));
                $_FILES['cv']['name'] = "cv." . $ext;
                if ($this->upload->do_upload('cv')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_cv'] = $uploadData['file_name'];
                    $datab['tipe_cv'] = $uploadData['file_ext'];
                    $datab['size_cv'] = $uploadData['file_size'];
                    $datab['url_cv'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File CV'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'CV is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File CV'
                );
            }


            if (!empty($_FILES['sl']['name'])) {
                $ext = strtolower(pathinfo($_FILES['sl']['name'], PATHINFO_EXTENSION));
                $_FILES['sl']['name'] = "surat_lamaran." . $ext;
                if ($this->upload->do_upload('sl')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_surat_lamaran'] = $uploadData['file_name'];
                    $datab['tipe_surat_lamaran'] = $uploadData['file_ext'];
                    $datab['size_surat_lamaran'] = $uploadData['file_size'];
                    $datab['url_surat_lamaran'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Surat Lamaran'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Surat Lamaran is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Surat Lamaran'
                );
            }

            if (!empty($_FILES['ijasah']['name'])) {
                $ext = strtolower(pathinfo($_FILES['ijasah']['name'], PATHINFO_EXTENSION));
                $_FILES['ijasah']['name'] = "ijasah." . $ext;
                if ($this->upload->do_upload('ijasah')) {
                    $datab['nama_ijasah'] = $uploadData['file_name'];
                    $datab['tipe_ijasah'] = $uploadData['file_ext'];
                    $datab['size_ijasah'] = $uploadData['file_size'];
                    $datab['url_ijasah'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Ijasah'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Ijasah is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Ijasah'
                );
            }

            $errCount = count($error);
            $berkasKosong = false;
            $idP = null;

            if (!empty($errCount)) {
                $berkasKosong = true;
            } else {
                $id_pegawai = $this->MPegawai->insert_tbl_pegawai($data);
                $this->Mberkas->insert_tbl_pegawai_berkas($datab);
                $idP = $id_pegawai;
            }

            if (!empty($idP)) {
                $datalogin = array(
                    'emp_jabatan_id' => $_POST['jabatan'],
                    'emp_id' => $idP,
                    'berkas_kode' => $berkas_kode,
                    'no_telp' => $_POST['no_telp'],
                    'department_id' => 99,
                    'email' => $_POST['email'],
                    'passwords' => '12345678',
                    'created_by' => $login_id,
                    'created_date'  => date('Y-m-d H:i:s'),
                    'is_active' => '1',
                    'role_id' => '4',
                    'is_sys' => '0'
                );
                $this->MPegawai->insert_tbl_pegawai_login($datalogin);

                $dataDep = array(
                    'emp_id' => $id_pegawai,
                    'created_date' => date('Y-m-d H:i:s'),
                    'ket' => 'PNASN',
                );

                $this->MPegawai->insert_tbl_pegawai_department($dataDep);
                $this->session->set_userdata('a202', "Input Data Berhasil");
                redirect('pnasn/pegawaiInput');
                // $this->$pegawaiInput();
            } else if ($berkasKosong) {
                $this->session->set_userdata('a203', "Input Data Gagal </br> Berkas tidak lengkap");
                // var_dump($error);
                // $this->pegawaiInput($error);
                redirect('pnasn/pegawaiInput');
            }
        } else {
            $this->session->set_userdata('a203', "Input Data gagal </br> Form tidak lengkap");
            redirect('pnasn/pegawaiInput');
        }
    }

    public function submit_updatePegawaiInput()
    {
        $this->form_validation->set_rules('nik_KTP', 'Column', 'required');
        $this->form_validation->set_rules('nik_pegawai', 'Column', 'required');
        $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Column', 'required');
        $this->form_validation->set_rules('gender', 'Column', 'required');
        $this->form_validation->set_rules('address1', 'Column', 'required');
        $this->form_validation->set_rules('prov', 'Column', 'required');
        $this->form_validation->set_rules('kab', 'Column', 'required');
        $this->form_validation->set_rules('kec', 'Column', 'required');
        $this->form_validation->set_rules('des', 'Column', 'required');
        $this->form_validation->set_rules('no_telp', 'Column', 'required');
        $this->form_validation->set_rules('email', 'Column', 'required|valid_email');
        $this->form_validation->set_rules('jabatan', 'Column', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Column', 'required');

        if ($this->form_validation->run() != false) {
            $berkas_kode = $_POST['berkas_kode'];
            $id_pegawai = $_POST['id_pegawai'];
            $id_berkas = $_POST['berkas_id'];
            $login_id = $this->session->userdata('emp_login_id');
            $error = array();
            $namaBelakang = null;

            //validasi file
            // 001 is file restriction
            // 002 is empty

            if (!empty($_POST['nama_belakang'])) {
                $namaBelakang = $_POST['nama_belakang'];
            } else {
                $namaBelakang = " ";
            }

            $data = array(
                'nik_ktp' => $_POST['nik_KTP'],
                'nik_pegawai' => $_POST['nik_pegawai'],
                'nama_depan' => ucwords($_POST['nama_depan']),
                'nama_belakang' => ucwords($namaBelakang),
                'tgl_lahir' => $_POST['tanggal_lahir'],
                'gender' => $_POST['gender'],
                'address1' => $_POST['address1'],
                'address2' => $_POST['address2'],
                'address3' => $_POST['address3'],
                'prov_id' => $_POST['prov'],
                'kab_id' => $_POST['kab'],
                'kec_id' => $_POST['kec'],
                'des_id' => $_POST['des'],
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'jabatan_id' => $_POST['jabatan'],
                'modified_by' => $login_id,
                'modified_date'  => date('Y-m-d H:i:s'),
                'join_date'  => $_POST['tanggal_masuk'],
            );

            $dataLogin = array(
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'modified_by' => $login_id,
                'modified_date'  => date('Y-m-d H:i:s'),
            );


            $files_path = './file/berkas/' . $berkas_kode . '/';
            if (!file_exists($files_path)) {
                mkdir($files_path, 0777, true);
            }

            $config['upload_path']          = $files_path;
            $config['allowed_types']        = 'jpg|png|pdf';
            $config['max_size']             = 5000;
            $config['max_width']            = 2048;
            $config['max_height']           = 1536;
            $config['overwrite']            = TRUE;
            $this->load->library('upload', $config);

            if (!empty($_FILES['foto']['name'])) {
                $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                $_FILES['foto']['name'] = "foto." . $ext;
                if ($this->upload->do_upload('foto')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_foto'] = $uploadData['file_name'];
                    $datab['tipe_foto'] = $uploadData['file_ext'];
                    $datab['size_foto'] = $uploadData['file_size'];
                    $datab['url_foto'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Foto'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'foto is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Foto'
                );
            }

            if (!empty($_FILES['ktp']['name'])) {
                $ext = strtolower(pathinfo($_FILES['ktp']['name'], PATHINFO_EXTENSION));
                $_FILES['ktp']['name'] = "ktp." . $ext;
                if ($this->upload->do_upload('ktp')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_ktp'] = $uploadData['file_name'];
                    $datab['tipe_ktp'] = $uploadData['file_ext'];
                    $datab['size_ktp'] = $uploadData['file_size'];
                    $datab['url_ktp'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File KTP'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'KTP is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File KTP'
                );
            }

            if (!empty($_FILES['npwp']['name'])) {
                $ext = strtolower(pathinfo($_FILES['npwp']['name'], PATHINFO_EXTENSION));
                $_FILES['npwp']['name'] = "npwp." . $ext;
                if ($this->upload->do_upload('npwp')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_npwp'] = $uploadData['file_name'];
                    $datab['tipe_npwp'] = $uploadData['file_ext'];
                    $datab['size_npwp'] = $uploadData['file_size'];
                    $datab['url_npwp'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File NPWP'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'NPWP is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File NPWP'
                );
            }
            // sadsa
            if (!empty($_FILES['no_rek']['name'])) {
                $ext = strtolower(pathinfo($_FILES['no_rek']['name'], PATHINFO_EXTENSION));
                $_FILES['no_rek']['name'] = "nomor_rekening." . $ext;
                if ($this->upload->do_upload('no_rek')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_no_rek'] = $uploadData['file_name'];
                    $datab['tipe_no_rek'] = $uploadData['file_ext'];
                    $datab['size_no_rek'] = $uploadData['file_size'];
                    $datab['url_no_rek'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File No_Rekening'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Nomor Rekening is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File No_Rekening'
                );
            }

            if (!empty($_FILES['cv']['name'])) {
                $ext = strtolower(pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION));
                $_FILES['cv']['name'] = "cv." . $ext;
                if ($this->upload->do_upload('cv')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_cv'] = $uploadData['file_name'];
                    $datab['tipe_cv'] = $uploadData['file_ext'];
                    $datab['size_cv'] = $uploadData['file_size'];
                    $datab['url_cv'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File CV'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'CV is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File CV'
                );
            }


            if (!empty($_FILES['sl']['name'])) {
                $ext = strtolower(pathinfo($_FILES['sl']['name'], PATHINFO_EXTENSION));
                $_FILES['sl']['name'] = "surat_lamaran." . $ext;
                if ($this->upload->do_upload('sl')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_surat_lamaran'] = $uploadData['file_name'];
                    $datab['tipe_surat_lamaran'] = $uploadData['file_ext'];
                    $datab['size_surat_lamaran'] = $uploadData['file_size'];
                    $datab['url_surat_lamaran'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Surat Lamaran'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Surat Lamaran is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Surat Lamaran'
                );
            }

            if (!empty($_FILES['ijasah']['name'])) {
                $ext = strtolower(pathinfo($_FILES['ijasah']['name'], PATHINFO_EXTENSION));
                $_FILES['ijasah']['name'] = "ijasah." . $ext;
                if ($this->upload->do_upload('ijasah')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_ijasah'] = $uploadData['file_name'];
                    $datab['tipe_ijasah'] = $uploadData['file_ext'];
                    $datab['size_ijasah'] = $uploadData['file_size'];
                    $datab['url_ijasah'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Ijasah'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Ijasah is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Ijasah'
                );
            }
            $datab['berkas_kode'] = $berkas_kode;
            $datab['modified_by'] = $login_id;
            $datab['modified_date'] = date('Y-m-d H:i:s');

            $errCount = count($error);
            $berkasKosong = false;

            if (!empty($errCount)) {
                $berkasKosong = true;
            } else {
                $berkasKosong = false;
            }

            if ($berkasKosong) {
                $this->Mberkas->update_tbl_pegawai_berkas($datab, $id_berkas);
                $this->MPegawai->update_tbl_pegawai($data, $id_pegawai);
                $this->MLogin->update_login($dataLogin, $id_pegawai);
                $this->session->set_userdata('a202', "Update Data Berhasil");

                $ciphertext = $this->encryption->encrypt($id_pegawai);
                $urisafe = strtr($ciphertext, '+/=', '-_~');

                redirect('pnasn/pegawaiEdit/' . $urisafe);
                // $this->pegawaiEdit($urisafe);
            } else {
                $this->session->set_userdata('a203', "Update Data Gagal");
                $ciphertext = $this->encryption->encrypt($id_pegawai);
                $urisafe = strtr($ciphertext, '+/=', '-_~');
                redirect('pnasn/pegawaiEdit/' . $urisafe);
                // $this->pegawaiEdit($urisafe);
            }

            // }else{
            //     $this->session->set_userdata('a203', "Update Data Gagal");
            //     $ciphertext = $this->encryption->encrypt($id_pegawai);
            //     $urisafe = strtr($ciphertext, '+/=', '-_~');

            //     $this->pegawaiEdit($urisafe);
            // }
        } else {
            $id_pegawai = $_POST['id_pegawai'];
            $this->session->set_userdata('a203', "Update Data Gagal Form tidak boleh Kosong");
            $ciphertext = $this->encryption->encrypt($id_pegawai);
            $urisafe = strtr($ciphertext, '+/=', '-_~');
            redirect('pnasn/pegawaiEdit/' . $urisafe);
            // $this->pegawaiEdit($urisafe);
        }
    }

    public function submit_ktuInput()
    {
        $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('nama_belakang', 'Column', 'required');
        $this->form_validation->set_rules('nip', 'Column', 'required');
        $this->form_validation->set_rules('address1', 'Column', 'required');
        $this->form_validation->set_rules('no_telp', 'Column', 'required');
        $this->form_validation->set_rules('email', 'Column', 'required');
        $this->form_validation->set_rules('gender', 'Column', 'required');
        $this->form_validation->set_rules('department', 'Column', 'required');
        $this->form_validation->set_rules('subdepartment', 'Column', 'required');
        $this->form_validation->set_rules('bagiandepartment', 'Column', 'required');
        $this->form_validation->set_rules('akun', 'Column', 'required');

        $berkas_kode = random_string('alnum', 20);
        $login_id = $this->session->userdata('emp_login_id');
        $datab['berkas_kode'] = $berkas_kode;
        $datab['created_by'] = $login_id;

        if ($this->form_validation->run() != false) {
            // if (1 + 1 == 2) {
            $namaBelakang = null;

            if (!empty($_POST['nama_belakang'])) {
                $namaBelakang = $_POST['nama_belakang'];
            } else {
                $namaBelakang = " ";
            }

            $data = array(
                'nik_ktp' => -1,
                'nik_pegawai' => -1,
                'nip_pegawai' => $_POST['nip'],
                'nama_depan' => ucwords($_POST['nama_depan']),
                'nama_belakang' => ucwords($namaBelakang),
                'tgl_lahir' => date('Y-m-d H:i:s'),
                'gender' => $_POST['gender'],
                'address1' => $_POST['address1'],
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'jabatan_id' => 6,
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
            );

            $id_pegawai = $this->MPegawai->insert_tbl_pegawai($data);
            $this->Mberkas->insert_tbl_pegawai_berkas($datab);
            $idP = $id_pegawai;

            $datalogin = array(
                'emp_jabatan_id' => 6,
                'department_id' => $_POST['department'],
                'emp_id' => $idP,
                'berkas_kode' => $berkas_kode,
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'passwords' => '12345678',
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
                'is_active' => '1',
                'role_id' => $_POST['akun'],
            );

            $this->MPegawai->insert_tbl_pegawai_login($datalogin);

            $dataDep = array(
                'emp_id' => $id_pegawai,
                'department_id' => $_POST['department'],
                'sub_id' => $_POST['subdepartment'],
                'bagian_id' => $_POST['bagiandepartment'],
                'created_date' => date('Y-m-d H:i:s'),
                'ket' => 'kosong',
            );

            $this->MPegawai->insert_tbl_pegawai_department($dataDep);
            $this->session->set_userdata('a202', "Input Data Berhasil");
            redirect('pimpinan/ktuInput');
            // $this->ktuInput();
        } else {
            $this->session->set_userdata('a203', "Input Data gagal </br> Form tidak lengkap");
            redirect('pimpinan/ktuInput');
        }
    }

    public function submit_updateKtuInput()
    {
        // $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('nama_belakang', 'Column', 'required');
        $this->form_validation->set_rules('nip', 'Column', 'required');
        $this->form_validation->set_rules('address1', 'Column', 'required');
        $this->form_validation->set_rules('no_telp', 'Column', 'required');
        $this->form_validation->set_rules('email', 'Column', 'required');
        $this->form_validation->set_rules('gender', 'Column', 'required');
        $this->form_validation->set_rules('department', 'Column', 'required');
        $this->form_validation->set_rules('subdepartment', 'Column', 'required');
        $this->form_validation->set_rules('bagiandepartment', 'Column', 'required');

        // $berkas_kode = random_string('alnum', 20);
        $login_id = $this->session->userdata('emp_login_id');
        $urisafe = strtr($_POST['emp_id'], '-_~', '+/=');
        $empId = $this->encryption->decrypt($urisafe);

        $dataKtu = $this->MPegawai->get_tbl_pegawai_byId($empId);

        if ($this->form_validation->run() != false) {
            $namaBelakang = null;

            if (!empty($_POST['nama_belakang'])) {
                $namaBelakang = $_POST['nama_belakang'];
            } else {
                $namaBelakang = " ";
            }

            $data = array(
                'nik_ktp' => -1,
                'nik_pegawai' => -1,
                'nip_pegawai' => $_POST['nip'],
                'nama_depan' => ucwords($_POST['nama_depan']),
                'nama_belakang' => ucwords($namaBelakang),
                'tgl_lahir' => date('Y-m-d H:i:s'),
                'gender' => $_POST['gender'],
                'address1' => $_POST['address1'],
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'jabatan_id' => 6,
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
                'join_date'  => date('Y-m-d H:i:s'),
            );


            $datalogin = array(
                'emp_jabatan_id' => 6,
                'department_id' => $_POST['department'],
                'emp_id' =>  $empId,
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'passwords' => '12345678',
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
                'is_active' => '1',
                'role_id' => '3'
            );


            $dataDep = array(
                'emp_id' => $empId,
                'department_id' => $_POST['department'],
                'sub_id' => $_POST['subdepartment'],
                'bagian_id' => $_POST['bagiandepartment'],
                'created_date' => date('Y-m-d H:i:s'),
                'ket' => '(null)',
            );

            $pegId = $empId;
            $logId = $this->MLogin->get_loginByPegawaiId($empId);
            $depId = $this->Mdep->get_tbl_pegDep_byEmpId($empId);

            // $this->db->trans_begin();

            $this->MPegawai->update_tbl_pegawai($data, $pegId);
            $this->MLogin->update_login($datalogin, $logId[0]->emp_login_id);
            $this->Mdep->update_tbl_pegawaidep($dataDep, $depId[0]->pegawaidept_id);

            // var_dump($dataDep);
            // var_dump($depId[0]->pegawaidept_id);

            $this->session->set_userdata('a202', "Input Data Berhasil");
            redirect('pimpinan/KtuListEdit');
            // $this->KtuListEdit();
        } else {
            $this->session->set_userdata('a203', "Input Data gagal");
            redirect('pimpinan/KtuListEdit');
            // $this->KtuListEdit();
        }
    }

    public function submit_department()
    {
        $idP = $_POST['emp_id'];

        $dataLog = $this->MLogin->get_loginByPegawaiId($idP);

        $idL = $dataLog[0]->emp_login_id;
        // echo $idL;

        if ($_POST['department'] == 0) {
            $this->session->set_userdata('a203', "Update Data Gagal");
            redirect('pnasn/penempatanPilih');
            // $this->penempatanPilih();
        } else {
            $dataL = array(
                'department_id' => $_POST['department'],
            );

            $val1 = $this->MLogin->update_login_withReturn($dataL, $idL);

            if ($val1 == 200) {
                $dataDep = array(
                    'emp_id' => $idP,
                    'department_id' => $_POST['department'],
                    'sub_id' => $_POST['subdepartment'],
                    'bagian_id' => $_POST['bagiandepartment'],
                    'created_date' => date('Y-m-d H:i:s'),
                    'ket' => 'PNASN',
                );

                $idPD = $this->Mdep->get_tbl_pegawai_departmentbyId($idP);
                $this->Mdep->update_tbl_pegawaidep($dataDep, $idPD[0]->pegawaidept_id);

                $this->session->set_userdata('a202', "Update Data Berhasil");
                redirect('pnasn/penempatanPilih');
            } else {
                $this->session->set_userdata('a203', "Update Data Gagal");
                redirect('pnasn/penempatanPilih');
            }
        }
    }

    public function submit_updateUraianTugas() //Input Uraian Tugas, Done
    {
        $this->form_validation->set_rules('iddetail', 'idd', 'required');
        $this->form_validation->set_rules('empID', 'ide', 'required');
        $this->form_validation->set_rules('dari', 'dari jam', 'required');
        $this->form_validation->set_rules('sampai', 'sampai jam', 'required');
        $this->form_validation->set_rules('namaKegiatan', 'nama kegiatan', 'required');
        $this->form_validation->set_rules('pelakKegiatan', 'pelaksanaan kegiatan', 'required');
        $this->form_validation->set_rules('jumlahSurat', 'jumlah surat', 'required');
        $this->form_validation->set_rules('waktu', 'waktu', 'required');
        // $this->form_validation->set_rules('tempatKerja', 'tempat kerja', 'required');
        // $this->form_validation->set_rules('tindakLanjut', 'tindak lanjut', 'required');

        if ($this->form_validation->run()) {
            $array = array(
                'success' => '<div class="alert alert-success">Data Valid</div>',
                'iddetail' => $this->input->post('iddetail'),
                'waktu' =>  $this->input->post('waktu'),
                'dari' =>  $this->input->post('dari'),
                'sampai' =>  $this->input->post('sampai'),
                'namaKegiatan' =>  $this->input->post('namaKegiatan'),
                'pelakKegiatan' =>  $this->input->post('pelakKegiatan'),
                'jumlahSurat' =>  $this->input->post('jumlahSurat'),
                'satuanKegiatan' =>  $this->input->post('satuanKegiatan'),
                // 'tempatKerja' =>  $this->input->post('tempatKerja'),
                // 'tindakLanjut' =>  $this->input->post('tindakLanjut'),
            );

            $new =  $this->session->userdata('listKegiatan');

            $new[] = (object) [
                "kegiatan" => $this->input->post('namaKegiatan'),
                "waktu" => $this->input->post('waktu'),
                "dari" => $this->input->post('dari'),
                "sampai" =>  $this->input->post('sampai'),
                "pelakKegiatan" =>  $this->input->post('pelakKegiatan'),
                "keterangan" =>  "Null",
                "jumlahSurat" =>  $this->input->post('jumlahSurat'),
                "satuanKegiatan" =>  $this->input->post('satuanKegiatan'),
                // "tempatKerja" =>  $this->input->post('tempatKerja'),
                // "statusKegiatan" =>  "Null",
                // "tindakLanjut" =>  $this->input->post('tindakLanjut')
            ];

            $this->session->set_userdata('listKegiatan', $new);

            $data = $this->session->userdata('listKegiatan');
            $idDetail = $this->input->post('iddetail');
            $getData = $this->Mlap->get_tbl_pegawai_laporan_detail_byId($idDetail);
            $idHeader = $getData[0]->lap_header_id;
            $idUser =  $this->input->post('empID');
            $loginId =  $this->MLogin->get_loginByPegawaiId($idUser);
            $waktu =  $getData[0]->waktu;
            $dataPegawai = $this->MPegawai->get_tbl_pegawai_byId($idUser);

            usort($data, function ($a, $b) {
                return $a->dari > $b->dari ? 1 : -1;
            });

            $now = strtotime(date('Y-m-d H:i:s'));
            $thn = date("Y", $now);

            $time = strtotime($waktu);
            $tahun = date("Y", $time);
            $bulan = date("m", $time);

            $deptId = $this->Mdep->get_tbl_pegawai_departmentbyId($idUser);
            $ktuId = $this->MPegawai->get_ktu_ofpegawai($deptId[0]->department_id, $deptId[0]->sub_id, $deptId[0]->bagian_id);
            $isSend = $this->MPegawai->get_pegawaiPenilaian_byPeriode($ktuId[0]->emp_id, $bulan, $thn);
            $dataHeader = array();

            if (!empty($isSend)) {
                $dataHeader = array(
                    'jabatan_id' => $dataPegawai[0]->jabatan_id,
                    'emp_id' => $idUser,
                    // 'waktu' => $waktu,
                    "waktu" => $this->input->post('waktu'),
                    'is_ktu_checked' => 0,
                    'is_ktu_send' => 1,
                    'is_admin_checked' => 0,
                    'is_pimp_checked' => 0,
                    'created_date' => date('Y-m-d H:i:s')
                );
            } else {
                $dataHeader = array(
                    'jabatan_id' => $dataPegawai[0]->jabatan_id,
                    'emp_id' => $idUser,
                    // 'waktu' => $waktu,
                    "waktu" => $this->input->post('waktu'),
                    'is_ktu_checked' => 0,
                    'is_ktu_send' => 0,
                    'is_admin_checked' => 0,
                    'is_pimp_checked' => 0,
                    'created_date' => date('Y-m-d H:i:s')
                );
            }

            // $idHeader = $this->Mlap->insert_tbl_pegawai_laporan_header($dataHeader);
            $this->Mlap->update_tbl_pegawai_laporan_header($dataHeader, $idHeader);

            foreach ($data as $row) {
                $dataDetail = array(
                    // "lap_header_id" =>  $idHeader,
                    "kegiatan_id" => $row->kegiatan,
                    // "waktu" => $waktu,
                    "waktu" => $this->input->post('waktu'),
                    "dari" => $row->dari,
                    "sampai" =>  $row->sampai,
                    "pelaksanaan_kegiatan" =>  $row->pelakKegiatan,
                    "keterangan" =>  $row->keterangan,
                    "surat_dikerjakan" => $row->jumlahSurat,
                    "satuan_kegiatan" => $row->satuanKegiatan,

                    // "lokasi_kerja" => $row->tempatKerja,
                    // "status_kegiatan" =>  $row->statusKegiatan,
                    // "tindak_lanjut" =>  $row->tindakLanjut,
                    'is_temp' => 1,
                    'is_ktu_checked' => 0,
                    'is_ktu_send' => 0,
                    'created_by' => $loginId[0]->emp_login_id,
                    'created_date' => date('Y-m-d H:i:s')
                );
                // $detailHeader = $this->Mlap->insert_tbl_pegawai_laporan_detail($dataDetail);
                $this->Mlap->update_tbl_pegawai_laporan_detail($dataDetail, $idDetail);
            }
            $this->session->unset_userdata('listKegiatan');
        } else {
            $array = array(
                'error'   => true,
                'waktu_error' => form_error('waktu'),
                'dari_error' => form_error('dari'),
                'sampai_error' => form_error('sampai'),
                'namaKegiatan_error' => form_error('namaKegiatan'),
                'pelakKegiatan_error' => form_error('pelakKegiatan'),
                'jumlahSurat_error' => form_error('jumlahSurat'),
                'tempatKerja_error' => form_error('tempatKerja'),
                'tindakLanjut_error' => form_error('tindakLanjut'),
                'satuanKegiatan_error' => form_error('satuanKegiatan')
            );
        }
        echo json_encode($array);
    }

    public function submit_hapusUraianTugas() //Input Uraian Tugas, Done
    {
        $idUraian = $this->input->post('kode');
        $this->Mlap->delete_tbl_pegawai_laporan_detail($idUraian);
        echo json_encode($idUraian);
    }

    public function pegawai_updateKegiatan() //Input Uraian Tugas, Done
    {
        $idDetail = $this->input->get('id');
        $dataJabatan = $this->Mjabatan->get_tbl_pegawai_jabatan();
        $dataLaporan = $this->Mlap->get_tbl_pegawai_laporan_detail_byId($idDetail);
        $dataKegiatan = $this->MKegiatan->get_tbl_pegawai_kegiatan();

        echo json_encode($dataLaporan);
    }

    public function submit_uraianTugas() //Input Uraian Tugas, Done
    {
        $this->form_validation->set_rules('empID', 'id', 'required');
        $this->form_validation->set_rules('waktu', 'waktu', 'required');
        $this->form_validation->set_rules('dari', 'dari jam', 'required');
        $this->form_validation->set_rules('sampai', 'sampai jam', 'required');
        $this->form_validation->set_rules('namaKegiatan', 'nama kegiatan', 'required');
        $this->form_validation->set_rules('pelakKegiatan', 'pelaksanaan kegiatan', 'required');
        $this->form_validation->set_rules('jumlahSurat', 'jumlah surat', 'required');
        // $this->form_validation->set_rules('tempatKerja', 'tempat kerja', 'required');
        // $this->form_validation->set_rules('tindakLanjut', 'tindak lanjut', 'required');

        if ($this->form_validation->run()) {
            $array = array(
                'success' => '<div class="alert alert-success">Data Valid</div>',
                'waktu' =>  $this->input->post('waktu'),
                'dari' =>  $this->input->post('dari'),
                'sampai' =>  $this->input->post('sampai'),
                'namaKegiatan' =>  $this->input->post('namaKegiatan'),
                'pelakKegiatan' =>  $this->input->post('pelakKegiatan'),
                'jumlahSurat' =>  $this->input->post('jumlahSurat'),
                'satuanKegiatan' =>  $this->input->post('satuanKegiatan'),
                // 'tempatKerja' =>  $this->input->post('tempatKerja'),
                // 'tindakLanjut' =>  $this->input->post('tindakLanjut'),
            );

            // echo json_encode($array);
            $new =  $this->session->userdata('listKegiatan');

            $new[] = (object) [
                "kegiatan" => $this->input->post('namaKegiatan'),
                "waktu" => $this->input->post('waktu'),
                "dari" => $this->input->post('dari'),
                "sampai" =>  $this->input->post('sampai'),
                "pelakKegiatan" =>  $this->input->post('pelakKegiatan'),
                "keterangan" =>  "Null",
                "jumlahSurat" =>  $this->input->post('jumlahSurat'),
                "satuanKegiatan" =>  $this->input->post('satuanKegiatan'),
                // "tempatKerja" =>  $this->input->post('tempatKerja'),
                // "statusKegiatan" =>  "Null",
                // "tindakLanjut" =>  $this->input->post('tindakLanjut')
            ];

            $this->session->set_userdata('listKegiatan', $new);

            $data = $this->session->userdata('listKegiatan');

            $idUser =  $this->input->post('empID');
            $loginId =  $this->MLogin->get_loginByPegawaiId($idUser);
            $waktu =  $this->input->post('waktu');
            $dataPegawai = $this->MPegawai->get_tbl_pegawai_byId($idUser);

            usort($data, function ($a, $b) {
                return $a->dari > $b->dari ? 1 : -1;
            });

            $now = strtotime(date('Y-m-d H:i:s'));
            $thn = date("Y", $now);

            $time = strtotime($waktu);
            $tahun = date("Y", $time);
            $bulan = date("m", $time);

            $deptId = $this->Mdep->get_tbl_pegawai_departmentbyId($idUser);
            $ktuId = $this->MPegawai->get_ktu_ofpegawai($deptId[0]->department_id, $deptId[0]->sub_id, $deptId[0]->bagian_id);
            $isSend = $this->MPegawai->get_pegawaiPenilaian_byPeriode($ktuId[0]->emp_id, $bulan, $thn);
            $dataHeader = array();

            if (!empty($isSend)) {
                $dataHeader = array(
                    'jabatan_id' => $dataPegawai[0]->jabatan_id,
                    'emp_id' => $idUser,
                    'waktu' => $waktu,
                    'is_ktu_checked' => 1,
                    'is_ktu_send' => 1,
                    'is_admin_checked' => 0,
                    'is_pimp_checked' => 0,
                    'created_date' => date('Y-m-d H:i:s')
                );
            } else {
                $dataHeader = array(
                    'jabatan_id' => $dataPegawai[0]->jabatan_id,
                    'emp_id' => $idUser,
                    'waktu' => $waktu,
                    'is_ktu_checked' => 1,
                    'is_ktu_send' => 1,
                    'is_admin_checked' => 0,
                    'is_pimp_checked' => 0,
                    'created_date' => date('Y-m-d H:i:s')
                );
            }

            $idHeader = $this->Mlap->insert_tbl_pegawai_laporan_header($dataHeader);

            foreach ($data as $row) {
                $dataDetail = array(
                    "lap_header_id" =>  $idHeader,
                    "kegiatan_id" => $row->kegiatan,
                    "waktu" => $waktu,
                    "dari" => $row->dari,
                    "sampai" =>  $row->sampai,
                    "pelaksanaan_kegiatan" =>  $row->pelakKegiatan,
                    "keterangan" =>  $row->keterangan,
                    "surat_dikerjakan" => $row->jumlahSurat,
                    "satuan_kegiatan" => $row->satuanKegiatan,
                    // "lokasi_kerja" => $row->tempatKerja,
                    // "status_kegiatan" =>  $row->statusKegiatan,
                    // "tindak_lanjut" =>  $row->tindakLanjut,
                    'is_temp' => 1,
                    'is_ktu_checked' => 0,
                    'is_ktu_send' => 0,
                    'created_by' => $loginId[0]->emp_login_id,
                    'created_date' => date('Y-m-d H:i:s')
                );
                $detailHeader = $this->Mlap->insert_tbl_pegawai_laporan_detail($dataDetail);
            }
            $this->session->unset_userdata('listKegiatan');
        } else {
            $array = array(
                'error'   => true,
                'waktu_error' => form_error('waktu'),
                'dari_error' => form_error('dari'),
                'sampai_error' => form_error('sampai'),
                'namaKegiatan_error' => form_error('namaKegiatan'),
                'pelakKegiatan_error' => form_error('pelakKegiatan'),
                'jumlahSurat_error' => form_error('jumlahSurat'),
                'tempatKerja_error' => form_error('tempatKerja'),
                'tindakLanjut_error' => form_error('tindakLanjut'),
                'satuanKegiatan_error' => form_error('satuanKegiatan'),
            );
        }
        echo json_encode($array);
    }


    public function testData()
    {
        $scoreAlreadyInputed = $this->Mkinerja->get_checK_Kinerja_isOn(17, 11);
        $offisSend = 0;

        if (empty($scoreAlreadyInputed)) {
            $offisSend = 1;
        } else {
            $offisSend = 0;
        }

        $listEmp = "";
        foreach ($scoreAlreadyInputed as $key) {
            $listEmp .= $key->kinerja_id . ",";
        }

        $listEmp = substr($listEmp, 0, -1);

        var_dump($listEmp);
    }

    public function submit_kinerjaPegawai()
    {
        $this->form_validation->set_rules('nama', 'Column', 'required');
        $this->form_validation->set_rules('periode', 'Column', 'required');
        $this->form_validation->set_rules('keterangan', 'Column', 'required');

        $this->form_validation->set_rules('integritas', 'Column', 'required');
        $this->form_validation->set_rules('komitmen', 'Column', 'required');
        $this->form_validation->set_rules('kualitas', 'Column', 'required');
        $this->form_validation->set_rules('kuantitas', 'Column', 'required');
        $this->form_validation->set_rules('kerjasama', 'Column', 'required');
        $this->form_validation->set_rules('inisiatif', 'Column', 'required');
        $this->form_validation->set_rules('tanggungjwb', 'Column', 'required');
        $this->form_validation->set_rules('disiplin', 'Column', 'required');
        $this->form_validation->set_rules('penyesuaian', 'Column', 'required');
        $this->form_validation->set_rules('penampilan', 'Column', 'required');


        $cekPeriodePenilaian = $this->Mkinerja->get_tbl_penilaian_ifExsist($this->session->userdata('emp_id'), $_POST['nama'], $_POST['periode'] . '-01');

        if ($this->form_validation->run()) {

            if (empty($cekPeriodePenilaian)) {
                $array = array(
                    'success' => '<div class="alert alert-success">Data Berhasil di Masukan</div>',
                    'nama' =>  $this->input->post('nama'),
                    'periode' =>  $this->input->post('periode'),
                    'integritas' => $this->input->post('integritas'),
                    'komitmen' => $this->input->post('komitmen'),
                    'kualitas' => $this->input->post('kualitas'),
                    'kuantitas' => $this->input->post('kuantitas'),
                    'inisiatif' => $this->input->post('inisiatif'),
                    'kerjasama' => $this->input->post('kerjasama'),
                    'tanggungjwb' => $this->input->post('tanggungjwb'),
                    'disiplin' => $this->input->post('disiplin'),
                    'penyesuaian' => $this->input->post('penyesuaian'),
                    'penampilan' => $this->input->post('penampilan'),
                    // 'scoreKinerja' =>  $this->input->post('scoreKinerja'),
                    // 'scoreDisiplin' =>  $this->input->post('scoreDisiplin'),
                    // 'scoreKerjasama' =>  $this->input->post('scoreKerjasama'),
                    'keterangan' =>  $this->input->post('keterangan'),
                );

                $login_id = $this->session->userdata('emp_login_id');

                $calculate = $this->input->post('scoreKinerja') + $this->input->post('scoreDisiplin') + $this->input->post('scoreKerjasama');
                $penilaian = null;

                if ($calculate = 3) {
                    $penilaian = 1;
                } elseif ($calculate > 3) {
                    $penilaian = 2;
                } elseif ($calculate < 3) {
                    $penilaian = 0;
                }

                $data = array(
                    'emp_id_pimp' => $this->session->userdata('emp_id'),
                    'emp_id' => $_POST['nama'],
                    'periode' => $_POST['periode'] . '-01',

                    'integritas' => $_POST('integritas'),
                    'komitmen' => $_POST('komitmen'),
                    'kualitas' => $_POST('kualitas'),
                    'kuantitas' => $_POST('kuantitas'),
                    'inisiatif' => $_POST('inisiatif'),
                    'kerjasama' => $_POST('kerjasama'),
                    'tanggungjwb' => $_POST('tanggungjwb'),
                    'disiplin' => $_POST('disiplin'),
                    'penyesuaian' => $_POST('penyesuaian'),
                    'penampilan' => $_POST('penampilan'),

                    'kinerja' => $_POST['scoreKinerja'],
                    'disiplin' => $_POST['scoreDisiplin'],
                    'kerja_sama' => $_POST['scoreKerjasama'],
                    'penilaian' => $penilaian,
                    'keterangan' => $_POST['keterangan'],
                    'created_by' => $login_id,
                    'is_send' => 1,
                    'created_date'  => date('Y-m-d H:i:s'),
                );

                $Kinid = $this->Mkinerja->insert_tbl_pegawai_kinerja($data);

                $data = array(
                    'is_send' => 1,
                    'send_date'  => date('Y-m-d H:i:s'),
                );

                $data2 = array(
                    'is_ktu_send' => 1,
                    'is_ktu_checked'  => 1,
                );

                $periode = $this->Mkinerja->get_tbl_pegawai_kinerja_byId($Kinid);

                $time = strtotime($periode[0]->created_date);
                $tahun = date("Y", $time);

                $employee = $this->Mlap->get_tbl_pegawai_laporan_header_byOneEmp($periode[0]->emp_id, substr($periode[0]->periode, 0, -3), $tahun);

                if (!empty($employee)) {
                    $listEmp = array();
                    foreach ($employee as $key) {
                        array_push($listEmp, $key->lap_header_id);
                    }
                    $this->Mlap->update_tbl_pegawai_laporan_header_byListId($data2, $listEmp);
                    $this->Mkinerja->update_tbl_pegawai_kinerja($data, $Kinid);
                }

                $this->session->set_userdata('a202', "Input Data Berhasil");
            } else {
                $array = array(
                    'error'   => true,
                    'nama_error' => 'Error Penilaian pada periode ini sudah dilakukan',
                );
            }
        } else {
            $array = array(
                'error'   => true,
                'nama_error' => form_error('nama'),
                'integritas_error' => form_error('integritas'),
                'komitmen_error' => form_error('komitmen'),
                'kualitas_error' => form_error('kualitas'),
                'kuantitas_error' => form_error('kuantitas'),
                'inisiatif_error' => form_error('inisiatif'),
                'kerjasama_error' => form_error('kerjasama'),
                'tanggungjwb_error' => form_error('tanggungjwb'),
                'disiplin_error' => form_error('disiplin'),
                'penyesuaian_error' => form_error('penyesuaian'),
                'penampilan_error' => form_error('penampilan'),
                'periode_error' => form_error('periode'),
                'keterangan_error' => form_error('keterangan'),
            );
            $this->session->set_userdata('a203', "Input Data Gagal </br> Coba lagi");
        }
        echo json_encode($array);
    }

    public function submit_hapusKinerja()
    {
        $idKinerja = $this->input->post('kode');
        $this->Mkinerja->delete_tbl_pegawai_kinerja($idKinerja);
        echo json_encode($idKinerja);
    }

    public function submit_updatePassPegawai()
    {
        $id = $_POST['emp_id'];
        $urisafe = strtr($id, '-_~', '+/=');
        $deId = $this->encryption->decrypt($urisafe);

        $this->form_validation->set_rules('pass_lama', 'Column', 'required');
        $this->form_validation->set_rules('pass_baru1', 'Column', 'required');
        $this->form_validation->set_rules('pass_baru2', 'Column', 'required');
        $this->form_validation->set_rules('emp_id', 'Column', 'required');

        if ($this->form_validation->run() != false) {
            $auths = $this->MLogin->get_loginByPass($deId, $_POST['pass_lama']);
            if (empty($auths)) {
                $this->session->set_userdata('a203', "Update Data Akun Gagal </br> Sandi anda Salah !!");
                redirect('Settings/pegawaiSettProfile');
                // $this->pegawaiSettProfile();
            } else {
                $data = array(
                    'passwords' => $_POST['pass_baru2'],
                );

                $this->MLogin->update_loginbyEmp_id($data, $deId);

                $this->session->set_userdata('a202', "Update Data Akun Berhasil, Silahkan Login Kembali");
                // $this->pegawaiSettProfile();
                redirect('Settings/pegawaiSettProfile');

                // $url = base_url('');
                // redirect($url);
            }
        } else {
            $this->session->set_userdata('a203', "Update Data Akun Gagal </br> Form tidak lengkap");
            // $this->pegawaiSettProfile();
            redirect('Settings/pegawaiSettProfile');
        }

        $this->session->unset_userdata('a202');
        $this->session->unset_userdata('a203');
    }
}
