<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->model('Login_model', 'MLogin');
        $this->load->model('Pegawai_model', 'MPegawai');
        $this->load->model('Berkas_model', 'MBerkas');
    }


    // Example Method
    // Method Function HashPass
    function Hash($string)
    {
        return hash('sha512', $string . config_item('koko'));
    }

    public function is_mobile()
    {
        $detect = new Mobile_Detect;
        if ($detect->isMobile()) {
            $this->session->set_userdata('is_mobile', 1);
            return 1;
        } else {
            $this->session->set_userdata('is_mobile', 0);
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
    // Runing Method
    // Method View Index Login
    function index()
    {
        $this->load->view('login/login');
    }

    // Method Function timeZone
    function timezone()
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

    // Method Function register account
    function register()
    {
        //Create Password
        $password = $this->input->post('password');
        $hashPass = $this->hash($password);
    }

    public function enHashPass($data)
    {
        $password = $data;
        // $this->encryption->initialize(
        //     array(
        //         'cipher' => 'aes-256',
        //         'mode' => 'ctr',
        //         // 'key' => '<> ditjenim-imigrasi p4ssw0rd'
        //         // <a 32-character random string>'
        //     )
        // );

        // $this->encryption->initialize(array('driver' => 'mcrypt'));

        $ciphertext = $this->encryption->encrypt($password);
        // $base64 = $this->encrypt->encode($variable);
        $urisafe = strtr($ciphertext, '+/=', '-_~');

        // // or
        // $urisafe = strtr($ciphertext, '+/=', '-_,');
        // return $ciphertext;
        echo $urisafe;

        // Example
        // $plain_text = 'This is a plain-text message!';
        // $ciphertext = $this->encryption->encrypt($plain_text);
        // echo $ciphertext;
    }

    public function deHashPass($data)
    {
        $hassPass = $data;
        // $this->encryption->initialize(
        //     array(
        //         'cipher' => 'aes-256',
        //         'mode' => 'ctr',
        //         // 'key' => '<> ditjenim-imigrasi p4ssw0rd'
        //     )
        // );
        // $this->encryption->initialize(array('driver' => 'mcrypt'));
        $urisafe = strtr($hassPass, '-_~', '+/=');
        $ciphertext = $this->encryption->decrypt($urisafe);

        // return $ciphertext;
        echo $ciphertext;

        // Example
        // $plain_text = 'b7ab6648990b33e643b49a5d1d9d29fd0cf13875b7953cdede1574c0685d480808b11e69d4b7609a39d8fc431359189ad5a5eb0053f183633e7a3d34c72d274bhgOnvhEZ8ijN5tWK0kUhyA+TDr/eEIIU7rp5XpuNVDg2kKzUSXH7Ya209l61';
        // $ciphertext = $this->encryption->decrypt($plain_text);
        // echo $ciphertext;
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $users = $this->MLogin->get_auth($username, $password);
        // var_dump($users);
        if (!empty($username) && !empty($password)) {
            if (!empty($users)) {
                foreach ($users as $key) {
                    $pegawai = $this->MPegawai->get_tbl_pegawai_byId($key->emp_id);
                    $fullName = $pegawai[0]->nama_depan . ' ' . $pegawai[0]->nama_belakang;
                    $nikPegawai = $pegawai[0]->nik_pegawai;
                    $nipPegawai = $pegawai[0]->nip_pegawai;
                    $kode = $key->berkas_kode;
                    $this->session->set_userdata('is_on', TRUE);
                    $this->session->set_userdata('username', $key->email);
                    $this->session->set_userdata('emp_login_id', $key->emp_login_id);
                    $this->session->set_userdata('emp_id', $key->emp_id);
                    $this->session->set_userdata('role_id', $key->role_id);
                    $this->session->set_userdata('nik_pegawai', $nikPegawai);
                    $this->session->set_userdata('nip_pegawai', $nipPegawai);
                    $this->session->set_userdata('full_name', $fullName);

                    $berkas = $this->MBerkas->get_tbl_pegawai_berkas_byKode($kode);
                    var_dump($berkas[0]->url_foto);
                    $url = 'file/berkas/' . $kode . '/' . $berkas[0]->nama_foto;
                    $this->session->set_userdata('profileImage', $url);


                    $dataMasuk = array('last_login' => date('Y-m-d H:i:s'));
                    $this->MLogin->lastVisit($dataMasuk, $this->session->userdata('id_login'));

                    $this->is_mobile();
                    redirect('index.php/dashboard/');
                    $this->load->view('login/login');
                }
            } else {
                $this->session->set_flashdata('wrong', 'Username Atau Password Salah');
                $this->load->view('login/login');
            }
        } else {
            $this->session->set_flashdata('empty', 'Username Atau Password tidak boleh kosong');
            $this->load->view('login/login');
        }
    }

    public function logout()
    {
        $data = array('last_logout' => date('Y-m-d H:i:s'));
        $this->Admin_model->lastVisit($data, $this->session->userdata('id_login'));
        $kirim["error"] = "";
        $this->session->sess_destroy();
        $this->load->view("admin/login", $kirim);
    }
}
