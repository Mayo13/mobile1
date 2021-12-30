<?php
class Settings extends CI_Controller
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
        $this->pegawaiSettProfile();
    }

    public function pegawaiSettProfile()
    {
        // $dataJabatan = array();
        $data = $this->MPegawai->get_tbl_pegawai_byId($this->session->userdata('emp_id'));
        // $deptId = $this->MLogin->get_loginByPegawaiId($this->session->userdata('emp_id'));
        $datadep = $this->Mdep->get_tbl_pegawai_departmentbyId($this->session->userdata('emp_id'));

        $dataDepartment =  $this->Mdep->get_tbl_department_byId($datadep[0]->department_id);

        $dataDepartmentsub =  $this->Mdep->get_tbl_subDepartment_byId($datadep[0]->sub_id);

        $dataDepartmentbag =  $this->Mdep->get_tbl_bagDepartment_byId($datadep[0]->bagian_id);

        $jabatan = $this->Mjabatan->get_tbl_pegawai_jabatan_pegawai($data[0]->jabatan_id);

        if ($data[0]->jabatan_id == 6) {
            $dataJabatan = "";
        } else {
            $dataJabatan = $jabatan[0]->nama;
        }

        $kirim['data'] = $data;
        $kirim['dataJabatan'] = $dataJabatan;
        $kirim['dataDepartment'] = $dataDepartment;
        $kirim['datasubDepartment'] = $dataDepartmentsub;
        $kirim['databagDepartment'] = $dataDepartmentbag;
        $kirim['footer'] = 'admin/template/4footer';

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('settings/pegawaiSettProfile', $kirim);
    }

    public function pegawaiSettUpdateProfile($id = null)
    {
        $data = $this->MPegawai->get_tbl_pegawai_byId($this->session->userdata('emp_id'));

        $jabatan = $this->Mjabatan->get_tbl_pegawai_jabatan_pegawai($data[0]->jabatan_id);

        if ($data[0]->jabatan_id == 6) {
            $dataJabatan = "";
        } else {
            $dataJabatan = $jabatan[0]->nama;
        }

        $kirim['data'] = $data;
        $kirim['dataJabatan'] = $dataJabatan;
        $kirim['emp_id'] = $id;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('settings/pegawaiSettUpdateProfile', $kirim);
    }
}
