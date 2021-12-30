<?php
class Pimpinan extends CI_Controller
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

    public function ktuInput($pesanError = null)
    {
        $get_dep = $this->Mdep->get_tbl_department();
        // $get_jabatan = $this->MPegawai->get_tbl_jabatan();
        $data['department'] = $get_dep;
        // $data['sub_dep'] = $get_sub;
        $data['path'] = base_url('assets');

        if ($pesanError !== null) {
            $data['pesanError'] = $pesanError;
        }
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('pimp/ktuInput', $data);

        $this->session->unset_userdata('a203');
        $this->session->unset_userdata('a202');
    }

    public function ktuListEdit()
    {
        $dataKTU = $this->MPegawai->get_tbl_pegawai_byIsKTU();

        $listEmp = "";
        foreach ($dataKTU as $key) {
            $listEmp .= $key->emp_id . ",";
        }

        if (empty($listEmp)) {
            $listEmp = "9999";
        } else {
            $listEmp = substr($listEmp, 0, -1);
        }

        $dataPegawai = $this->MPegawai->get_daftarKTUbyEmpList($listEmp);
        $kirim['dataPegawai'] = $dataPegawai;
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('pimp/ktuListEdit', $kirim);
        // var_dump($dataPegawai);
        $this->session->unset_userdata('a203');
        $this->session->unset_userdata('a202');
    }

    public function ktuEdit($id = null)
    {
        $urisafe = strtr($id, '-_~', '+/=');
        $deId = $this->encryption->decrypt($urisafe);
        // $empId = $this->session->userdata('emp_id');
        $dataKTU = $this->MPegawai->get_tbl_dataKTUJabatan($deId);
        $dep = $this->Mdep->get_tbl_department();
        $depSub = $this->Mdep->get_tbl_Subdepartment();
        $depBag = $this->Mdep->get_tbl_Bagdepartment();
        $kirim['dataKTU'] = $dataKTU[0];
        $kirim['dep'] = $dep;
        $kirim['vEmpId'] = $deId;
        $kirim['depSub'] = $depSub;
        $kirim['depBag'] = $depBag;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('pimp/ktuEdit', $kirim);

        $this->session->unset_userdata('a202');
        $this->session->unset_userdata('a203');
    }

    public function laporanPimp()
    {
        $empId =  $this->session->userdata('emp_id');

        $now = strtotime(date('Y-m-d H:i:s'));
        $thn = date("Y", $now);
        $bln = date("m", $now);
        // $periode = substr($bln, 1, 5) . "-01";
        $nm = (int)$bln;
        $periode = $nm . "-01";

        $bulanini = $this->nama_bulanIndo($bln);

        $penilaianPegawai = $this->Mkinerja->get_admin_penilaianUser($periode, $thn);

        $kirim['penilaianPegawai'] = $penilaianPegawai;
        $kirim['bulanini'] = $bulanini;
        $kirim['thn'] = $thn;
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('laporanpimp/inboxLaporan', $kirim);
    }

    public function adminLaporanPegawai()
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

    public function daftarLaporanPegawai()
    {

        // $empId = $this->session->userdata('emp_id');

        // $dataPegawai = $this->MPegawai->get_pnasnAdmin();
        // $kirim['dataPegawai'] = $dataPegawai;

        $searchTerm = $this->input->post('searchTerm');

        // Get users
        $response = $this->MPegawai->get_pnasnAdmin($searchTerm);
        // var_dump($response);

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('pimp/daftarLaporanPegawai');
    }

    public function daftarPnasn()
    {

        // $empId = $this->session->useyrdata('emp_id');

        $dataPegawai = $this->MPegawai->get_daftarPegawai_Kabag();
        $kirim['dataPegawai'] = $dataPegawai;

        // $searchTerm = $this->input->post('searchTerm');

        // // Get users
        // $response = $this->MPegawai->get_pnasnAdmin($searchTerm);
        // var_dump($response);

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('laporanpimp/daftarPegawai', $kirim);
    }
}
