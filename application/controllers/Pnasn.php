<?php
class PNASN extends CI_Controller
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
        $this->load->helper('download');
        $this->load->library('zip');
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

    function index()
    {
        // $this->load->view('admin/login');
    }

    public function pegawaiInput($pesanError = null)
    {

        $get_prov = $this->Mwil->get_provinsi();
        $get_jabatan = $this->MPegawai->get_tbl_jabatan();
        $data['provinsi'] = $get_prov;
        $data['jabatan'] = $get_jabatan;
        $data['path'] = base_url('assets');

        if ($pesanError !== null) {
            $data['pesanError'] = $pesanError;
        }
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('pnasn/pegawaiInput', $data);

        $this->session->unset_userdata('a203');
        $this->session->unset_userdata('a202');
    }

    public function pegawaiListEdit()
    {
        $dataPegawai = $this->MPegawai->get_tbl_pegawai_byJabatanMasaKerja();
        $kirim['dataPegawai'] = $dataPegawai;
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('pnasn/pegawaiListEdit', $kirim);
        // var_dump($kirim);
    }

    public function pegawaiEdit($id = null)
    {
        $urisafe = strtr($id, '-_~', '+/=');
        $deId = $this->encryption->decrypt($urisafe);
        $dataPegawai = $this->MPegawai->get_tbl_pegawai_byId($deId);
        $dataLogin = $this->MLogin->get_loginByPegawaiId($deId);
        $dataJabatan = $this->Mjabatan->get_tbl_pegawai_jabatan();
        $dataBerkas = $this->Mberkas->get_tbl_pegawai_berkas_byKode($dataLogin[0]->berkas_kode);
        $provData = $this->Mwil->get_provinsi();
        $kabData = $this->Mwil->get_kabupaten();
        $kecData = $this->Mwil->get_kecamatan();
        $desData = $this->Mwil->get_desa_kelurahan();
        // var_dump($dataPegawai);  

        $kirim['dataPegawai'] = $dataPegawai;
        $kirim['provData'] = $provData;
        $kirim['kabData'] = $kabData;
        $kirim['kecData'] = $kecData;
        $kirim['desData'] = $desData;
        $kirim['dataJabatan'] = $dataJabatan;
        $kirim['dataBerkas'] = $dataBerkas;


        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('pnasn/pegawaiEdit', $kirim);

        $this->session->unset_userdata('a202');
        $this->session->unset_userdata('a203');
    }

    public function pegawaiLihatBerkas()
    {
        $berkas_kode =  $this->uri->segment(3);
        // $jenis_berkas =  $this->uri->segment(4);

        $berkas = $this->Mberkas->get_tbl_pegawai_berkas_byKode($berkas_kode);
        // Open Directiory if avaible then give true
        if ($handle = opendir('./file/berkas/' . $berkas[0]->berkas_kode)) {
            //add file with loop
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $this->zip->read_file("./file/berkas/" . $berkas[0]->berkas_kode . '/' . $entry);
                }
            }
            closedir($handle);
        }
        $this->zip->archive(FCPATH . "/file/berkas/" . $berkas[0]->berkas_kode . ".zip");

        force_download(FCPATH . "/file/berkas/" . $berkas[0]->berkas_kode . ".zip", NULL);
        unlink(FCPATH . "/file/berkas/" . $berkas[0]->berkas_kode  . ".zip");
    }

    public function penempatanPilih()
    {
        $dataPegawai = $this->MPegawai->get_tbl_pegawai_byJabatan();
        $dataDepart = $this->Mdep->get_tbl_department();

        $kirim['dataPegawai'] = $dataPegawai;
        $kirim['dataDepart'] = $dataDepart;
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('pnasn/penempatanPilih', $kirim);

        $this->session->unset_userdata('a202');
        $this->session->unset_userdata('a203');
    }

    public function penempatanEdit()
    {
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('pnasn/penempatanEdit');
    }

    public function pegawaiDownloadBerkas()
    {
        $empId = $this->session->userdata('emp_id');
        $berkas_kode =  $this->MLogin->get_loginByPegawaiId($empId);
        // $jenis_berkas =  $this->uri->segment(4);

        $berkas = $this->Mberkas->get_tbl_pegawai_berkas_byKode($berkas_kode[0]->berkas_kode);

        // var_dump($berkas);
        // Open Directiory if avaible then give true
        if ($handle = opendir('./file/berkas/' . $berkas[0]->berkas_kode)) {
            //add file with loop
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $this->zip->read_file("./file/berkas/" . $berkas[0]->berkas_kode . '/' . $entry);
                }
            }
            closedir($handle);
        }
        $this->zip->archive(FCPATH . "/file/berkas/" . $berkas[0]->berkas_kode . ".zip");

        force_download(FCPATH . "/file/berkas/" . $berkas[0]->berkas_kode . ".zip", NULL);
        unlink(FCPATH . "/file/berkas/" . $berkas[0]->berkas_kode  . ".zip");
    }
}
