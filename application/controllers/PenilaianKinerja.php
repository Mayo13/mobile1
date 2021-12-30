<?php
class PenilaianKinerja extends CI_Controller
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

    public function is_right()
    {
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
        // $this->DaftarLaporanPegawai();
    }

    public function daftarLaporanPegawai()
    {

        $empId = $this->session->userdata('emp_id');
        $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
        $dataPegawai = $this->MPegawai->get_daftarPegawai_eachKTU($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id);
        $kirim['dataPegawai'] = $dataPegawai;


        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('kinerja/daftarLaporanPegawai', $kirim);
    }

    public function penilaianKinerja()
    {
        $dataChart = "";
        $empId = $this->session->userdata('emp_id');
        $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
        $dataPegawai = $this->MPegawai->get_daftarPegawai_eachKTU($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id);

        foreach ($dataPegawai as $key) {
            $dataChart .= "'$key->emp_id',";
        }

        if (empty($dataChart)) {
            $dataChart = "9999";
        } else {
            $dataChart = $dataChart;
        }

        $dataChart = substr($dataChart, 0, -1);
        $dataKinerja = $this->Mkinerja->daftar_laporankinerja_ktu($dataChart);
        $kirim['dataKinerja'] = $dataKinerja;


        $empId = $this->session->userdata('emp_id');
        $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
        $dataPegawai = $this->MPegawai->get_daftarPegawai_eachKTU($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id);
        $kirim['dataPegawai'] = $dataPegawai;


        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('kinerja/ktuPenilaian', $kirim);
        $this->session->unset_userdata('a2031');
    }

    public function daftarkinerja()
    {
        $listPegawai = $this->MPegawai->get_tbl_pegawai_pnasn();
        $kirim['listPegawai'] = $listPegawai;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('kinerja/historypenilaian', $kirim);
    }

    public function daftarkinerjaKtu()
    {

        $empId = $this->session->userdata('emp_id');
        $listPegawai = $this->MPegawai->get_tbl_pegawai_pnasnKtu($empId);
        $kirim['listPegawai'] = $listPegawai;

        // $listEmp = "";
        // foreach ($isSend as $key) {
        //     $listEmp .= $key->emp_id . ",";
        // }

        // if (empty($listEmp)) {
        //     $listEmp = "9999";
        // } else {
        //     $listEmp = substr($listEmp, 0, -1);
        // }

        // $dataKtu = $this->MPegawai->get_tbl_pegawai_byId_IN($listEmp);
        // get_tbl_pegawai_pnasnKtu

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('kinerja/historypenilaianPimp', $kirim);
    }

    public function daftarPenilaianKinerja()
    {
        // $dataUraianH = $this->Mlap->get_tbl_pegawai_laporan_header_byDate();
        // $kirim['dataHeader'] = $dataUraianH;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('laporanpimp/his');
        // $this->session->unset_userdata('print_stats');
    }
}
