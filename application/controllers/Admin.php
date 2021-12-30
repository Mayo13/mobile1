<?php

class Admin extends CI_Controller
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

        $this->is_right();
        $this->validasiUser();
    }

    //Method Function Support
    public function is_mobile()
    {
        $detect = new Mobile_Detect;
        if ($detect->isMobile()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function is_m()
    {
        $detect = $this->is_mobile();
        // var_dump($detect);
        if ($detect == 1) {
            echo "this is mobile";
        } else {
            echo "this is pc";
        }
    }

    public function index()
    {
        $this->dashboard();
    }

    public function is_right()
    {
        // $menu1 = $this->uri->segment(1);
        // $menu2 = $this->uri->segment(2);
        // $validasi = 'index.php/' . $menu1 . '/' . $menu2;

        if ($this->session->userdata('is_on') != TRUE) {
            $url = base_url() . 'index.php/auth';
            redirect($url);
        }
    }

    public function validasiUser()
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

    public function nama_bulanIndo($string)
    {
        $bln = $string;
        switch ($bln) {
            case "01";
                $bln = "Januari";
                break;
            case "02";
                $bln = "Februari";
                break;
            case "03";
                $bln = "Maret";
                break;
            case "04";
                $bln = "April";
                break;
            case "05";
                $bln = "Mei";
                break;
            case "06";
                $bln = "Juni";
                break;
            case "07";
                $bln = "Juli";
                break;
            case "08";
                $bln = "Agustus";
                break;
            case "09";
                $bln = "September";
                break;
            case "10";
                $bln = "Oktober";
                break;
            case "11";
                $bln = "November";
                break;
            case "12";
                $bln = "Desember";
                break;
        }

        return $bln;
    }

    public function timezone()
    {
        $tz1 = 'Asia/Jakarta';
        $dt1 = new DateTime("now", new DateTimeZone($tz1));
        $timestamp1 = $dt1->format('Y-m-d H:i:s');

        $tz2 = 'Asia/Makassar';
        $dt2 = new DateTime("now", new DateTimeZone($tz2));
        $timestamp2 = $dt2->format('Y-m-d H:i:s');

        $tz3 = 'Asia/Jayapura';
        $dt3 = new DateTime("now", new DateTimeZone($tz3));
        $timestamp3 = $dt3->format('Y-m-d H:i:s');

        return $timestamp1;
    }

    public function tgl_inputUraian($code)
    {
        if ($code == "time1") {
            $waktu1 = date("Y-m-d");
            echo $waktu1;
        } elseif ($code == "time2") {
            $waktu2 = date("Y-m-d", strtotime("-1 days"));
            echo $waktu2;
        } else {
            echo "wromng";
        }
    }

    function hapus_kinerja() //Not Used
    {
        $id = $this->input->post('kode');
        $this->Mkinerja->delete_tbl_pegawai_kinerja($id);
        $this->PenilaianKinerja();
    }

    public function select_validate($post_string)
    {
        if ($post_string == "") {
            $this->form_validation->set_message('select_validate', 'The {field} field can not be the word "test"');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // Upload image summernote
    function upload_imageSummerNote() //Not Used
    {
        if (isset($_FILES["image"]["name"])) {
            $files_path = './file/image_summernote/';
            if (!file_exists($files_path)) {
                mkdir($files_path, 0777, true);
            }
            $config['upload_path']          = $files_path;
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);

            // $config['upload_path'] = './file/image_summernote/';
            // $config['allowed_types'] = 'jpg|jpeg|png|gif';
            // $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './file/image_summernote/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = './assets/images/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'file/image_summernote/' . $data['file_name'];
            }
        }
        // if (isset($_FILES["image"]["name"])) {
        //     $config['upload_path'] = './file/images_summernote/';
        //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
        //     $this->upload->initialize($config);
        //     if (!$this->upload->do_upload('image')) {
        //         $this->upload->display_errors();
        //         return FALSE;
        //     } else {
        //         $data = $this->upload->data();
        //         //Compress Image
        //         $config['image_library'] = 'gd2';
        //         $config['source_image'] = './file/images_summernote/' . $data['file_name'];
        //         $config['create_thumb'] = FALSE;
        //         $config['maintain_ratio'] = TRUE;
        //         $config['quality'] = '60%';
        //         $config['width'] = 800;
        //         $config['height'] = 800;
        //         $config['new_image'] = './file/images_summernote/' . $data['file_name'];
        //         $this->load->library('image_lib', $config);
        //         $this->image_lib->resize();
        //         echo base_url() . 'file/images_summernote/' . $data['file_name'];
        //     }
        // }
    }

    // Delete image Summernote
    function delete_imageSummerNote() //Not Used
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }

    public function liat() // Not Used
    {
        // $data = $this->session->userdata('xxx');
        // $data1 = $this->session->userdata('xxxs');
        // $data2 = $this->session->userdata('dataLaporan');
        $data2 = $this->session->userdata('in');
        // var_dump($in);
        // var_dump($data1);
        // var_dump($data2);
        $this->session->unset_userdata('lapsampai');
        $this->session->unset_userdata('lapdari');
        $this->session->unset_userdata('dataLaporan');
        $this->session->unset_userdata('in');
    }

    public function cron_update() // Not Used
    {
    }

    //Method View Admin
    public function daftarLaporan() // Not Used
    {
        $listKtu = $this->MPegawai->get_tbl_pegawai_byIsKTU();
        $listEmp = "";
        foreach ($listKtu as $key) {
            $listEmp .= $key->emp_id . ",";
        }

        if (empty($listEmp)) {
            $listEmp = "9999";
        } else {
            $listEmp = substr($listEmp, 0, -1);
        }

        $dataKtu = $this->MPegawai->get_daftarKTUbyEmpList($listEmp);
        $kirim['dataKtu'] = $dataKtu;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/daftarLaporan', $kirim);
    }

    public function daftarLaporanDetail($emp_id = null) // Not Used
    {
        $urisafe = strtr($emp_id, '-_~', '+/=');
        $ktuId = $this->encryption->decrypt($urisafe);

        $peg_dep = $this->Mdep->get_tbl_pegDep_byEmpId($ktuId);
        $listEmp = $this->MPegawai->get_daftarPegawai_eachKTU($peg_dep[0]->department_id, $peg_dep[0]->sub_id, $peg_dep[0]->bagian_id);
        $kirim['dataKtu'] = $listEmp;


        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/daftarLaporanDetail', $kirim);
    }

    public function daftarLaporanDetailPegawai($emp_id = null) // Not Used
    {
        $urisafe = strtr($emp_id, '-_~', '+/=');
        $empId = $this->encryption->decrypt($urisafe);

        $header = $this->Mlap->get_daftar_header_byperiode($empId);

        // DaftarLaporanPegawaiDetail

        $kirim['dataKtu'] = $header;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/daftarLaporanDetailPegawai', $kirim);
    }

    public function inboxLaporanDetail($emp_id_pimp = null) // Not Used
    {
        $urisafe = strtr($emp_id_pimp, '-_~', '+/=');
        $ktuId = $this->encryption->decrypt($urisafe);

        $isSend = $this->Mkinerja->get_tbl_pegawai_kinerja_bySendKtu($ktuId);

        $listEmp = "";
        foreach ($isSend as $key) {
            $listEmp .= $key->emp_id . ",";
        }

        if (empty($listEmp)) {
            $listEmp = "9999";
        } else {
            $listEmp = substr($listEmp, 0, -1);
        }

        $dataKtu = $this->MPegawai->get_tbl_pegawai_byId_IN($listEmp);
        // $laporan = $this->MPegawai->get_laporanPegawai($dataDept[0]->department_id, $dataDept[0]->sub_id, $dataDept[0]->bagian_id, $bulan, $tahun);
        $kirim['dataKtu'] = $dataKtu;
        // var_dump($kirim);


        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/inboxLaporanDetail', $kirim);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }

    // public function serverDown()
    // {
    //     $this->load->view('errors/404notreach');
    // }
}
