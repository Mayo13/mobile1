<?php
class Zero extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->library('session');
        $this->load->helper('text');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('zip');
        $this->load->library('encryption');
        $this->load->model('Pegawai_model', 'MPegawai');
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
    }


    function index()
    {
        $this->gen_admin();
    }

    function timezone()
    {
        $tz1 = 'Asia/Jakarta';
        $dt1 = new DateTime("now", new DateTimeZone($tz1));
        $timestamp1 = $dt1->format('Y-m-d H:i:s');
        // $tz2 = 'Asia/Makassar';
        // $dt2 = new DateTime("now", new DateTimeZone($tz2));
        // $timestamp2 = $dt2->format('Y-m-d H:i:s');

        // $tz3 = 'Asia/Jayapura';
        // $dt3 = new DateTime("now", new DateTimeZone($tz3));
        // $timestamp3 = $dt3->format('Y-m-d H:i:s');

        return $timestamp1;
    }

    public function gen_admin()
    {
        $berkas_kode = random_string('alnum', 20);
        $login_id = $this->session->userdata('emp_login_id');
        $datab['berkas_kode'] = $berkas_kode;
        $datab['created_by'] = $login_id;

        //validasi file
        // 001 is file restriction
        // 002 is empty

        $data = array(
            'nik_ktp' => '10101010101010',
            'nik_pegawai' => '10101010101010',
            'nip_pegawai' => -1,
            'nama_depan' => ucwords('System'),
            'nama_belakang' => ucwords('Zero'),
            'tgl_lahir' => date('Y-m-d H:i:s'),
            'gender' => '1',
            'address1' => 'Gen10101010',
            'prov_id' => '35',
            'kab_id' => '3514',
            'kec_id' => '3514120',
            'des_id' => '3514120013',
            'no_telp' => '0808080808',
            'email' => 'SystemZero@sti.us',
            'jabatan_id' => '1',
            'created_by' => '1',
            'created_date'  => date('Y-m-d H:i:s'),
            'join_date'  => date('Y-m-d H:i:s'),
        );

        $files_path = './file/berkas/' . $berkas_kode . '/';
        if (!file_exists($files_path)) {
            mkdir($files_path, 0777, true);
        }

        $id_pegawai = $this->MPegawai->insert_tbl_pegawai($data);
        $this->Mberkas->insert_tbl_pegawai_berkas($datab);
        $idP = $id_pegawai;

        $datalogin = array(
            'emp_jabatan_id' => '1',
            'emp_id' => $idP,
            'berkas_kode' => $berkas_kode,
            'no_telp' => '0808080808',
            'email' => 'zero@sys.io',
            'passwords' => '12345678',
            'created_by' => '1',
            'created_date'  => date('Y-m-d H:i:s'),
            'is_active' => '1',
            'role_id' => '2'
        );

        $this->MPegawai->insert_tbl_pegawai_login($datalogin);

        $dataDep = array(
            'emp_id' => $id_pegawai,
            'created_date' => date('Y-m-d H:i:s'),
            'ket' => 'PNASN',
        );

        $this->MPegawai->insert_tbl_pegawai_department($dataDep);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }
}
