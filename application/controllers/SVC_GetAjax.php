<?php

class SVC_GetAjax extends CI_Controller
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
        // $this->dashboard();
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

    public function viewLap_ajax()
    {
        $id = $_POST["id"];
        $get_lap = $this->Mlap->get_tbl_pegawai_laporan_detail_byId($id);
        // $data = "";
        // foreach ($get_dep as $value) {
        //     $data .= "<option value='" . $value->sub_id . "'>" . $value->nama . "</option>";
        // }
        // echo $get_lap;
        echo json_encode($get_lap);
    }

    public function Dep_ajax()
    {
        $get_dep = $this->Mdep->get_tbl_department();
        $data = "";
        foreach ($get_dep as $value) {
            $data .= "<option value='" . $value->sub_id . "'>" . $value->nama . "</option>";
        }
        echo $data;
        // echo json_encode($get_kab);
    }

    public function subDep_ajax($id_dep)
    {
        $get_sub = $this->Mdep->get_tbl_subDepartment_byIdDep($id_dep);
        $data = "<option value='0'>- Select Sub Direktorat -</option>";
        foreach ($get_sub as $value) {
            $data .= "<option value='" . $value->sub_id . "'>" . $value->nama . "</option>";
        }
        echo $data;
        // echo json_encode($get_kab);
    }

    public function bagianDep_ajax($id_sub)
    {
        $get_bagian = $this->Mdep->get_tbl_bagianDepartment_byId($id_sub);
        $data = "<option value='0'>- Select Bagian -</option>";
        foreach ($get_bagian as $value) {
            $data .= "<option value='" . $value->bagian_id . "'>" . $value->nama . "</option>";
        }
        echo $data;
        // echo json_encode($get_kab);
    }

    public function wilayah_ajax_kab($id_prov)
    {
        $get_kab = $this->Mwil->get_kabupaten_byProvinsiId($id_prov);
        $data = "<option value='0'>- Select Kabupaten -</option>";
        foreach ($get_kab as $value) {
            $data .= "<option value='" . $value->kabupaten_id . "'>" . $value->nama . "</option>";
        }
        echo $data;
        // echo json_encode($get_kab);
    }

    public function wilayah_ajax_kec($id_kab)
    {
        $get_kec = $this->Mwil->get_kecamatan_byKabupatenId($id_kab);
        $data = "<option value='0'> - Pilih Kecamatan - </option>";
        foreach ($get_kec as $value) {
            $data .= "<option value='" . $value->kecamatan_id . "'>" . $value->nama . "</option>";
        }
        echo $data;
        // echo json_encode($data);
    }

    public function wilayah_ajax_des($id_kec)
    {
        $get_des = $this->Mwil->get_desa_kelurahan_byKecamatanId($id_kec);
        $data = "<option value='0'> - Pilih Desa / Kelurahan - </option>";
        foreach ($get_des as $value) {
            $data .= "<option value='" . $value->desa_id . "'>" . $value->nama . "</option>";
        }
        echo $data;
        // echo json_encode($data);
    }

    public function kegiatan_ajax_pegawai($id_jabatan)
    {
        $get_kegiatan = $this->MKegiatan->get_tbl_pegawai_kegiatan_byJabatan($id_jabatan);
        $data = "<option value='0'> - Pilih Kegiatan - </option>";
        foreach ($get_kegiatan as $value) {
            $data .= "<option value='" . $value->kegiatan_id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }

    public function tambah_kegiatan_ajax()
    {
        $this->form_validation->set_rules('empID', 'id', 'required');
        $this->form_validation->set_rules('waktu', 'waktu', 'required');
        $this->form_validation->set_rules('dari', 'dari jam', 'required');
        $this->form_validation->set_rules('sampai', 'sampai jam', 'required');
        $this->form_validation->set_rules('namaKegiatan', 'nama kegiatan', 'required');
        $this->form_validation->set_rules('pelakKegiatan', 'pelaksanaan kegiatan', 'required');
        $this->form_validation->set_rules('jumlahSurat', 'jumlah surat', 'required');
        $this->form_validation->set_rules('tempatKerja', 'tempat kerja', 'required');
        $this->form_validation->set_rules('tindakLanjut', 'tindak lanjut', 'required');

        if ($this->form_validation->run()) {
            // $array = array(
            //     'success' => '<div class="alert alert-success">Thank you for Contact Us</div>'
            // );

            $array = array(
                'success' => '<div class="alert alert-success">Data Valid</div>',
                'waktu' =>  $this->input->post('waktu'),
                'dari' =>  $this->input->post('dari'),
                'sampai' =>  $this->input->post('sampai'),
                'namaKegiatan' =>  $this->input->post('namaKegiatan'),
                'pelakKegiatan' =>  $this->input->post('pelakKegiatan'),
                'jumlahSurat' =>  $this->input->post('jumlahSurat'),
                'tempatKerja' =>  $this->input->post('tempatKerja'),
                'tindakLanjut' =>  $this->input->post('tindakLanjut'),
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
                "tempatKerja" =>  $this->input->post('tempatKerja'),
                "statusKegiatan" =>  "Null",
                "tindakLanjut" =>  $this->input->post('tindakLanjut')
            ];

            $this->session->set_userdata('listKegiatan', $new);

            // $data = $this->session->userdata('listKegiatan');
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
                'tindakLanjut_error' => form_error('tindakLanjut')
            );
        }

        echo json_encode($array);
    }

    function hapus_kegiatan_ajax()
    {
        $index = $this->input->post('index');
        $data = $this->session->userdata('listKegiatan');
        unset($data[$index]);
        $new = array_values($data);
        $this->session->set_userdata('listKegiatan', $new);
        echo json_encode($data);
    }

    function lihat_kegiatan_ajax()
    {
        $data = $this->session->userdata('SelectKegiatan');
        echo json_encode($data);
    }

    public function daftar_kegiatan_ajax()
    {
        $data = $this->session->userdata('listKegiatan');
        if (!empty($data)) {
            echo json_encode($data);
        }
    }

    public function cari_laporan_pegawai_ajax()
    {
        $tgl = $this->input->post('tanggal');
        $bln =  $this->input->post('bulan');
        $thn =  $this->input->post('tahun');
        $sTgl = $this->input->post('stanggal');
        $sBln = $this->input->post('sbulan');
        $sThn = $this->input->post('stahun');

        $dari = $thn . '-' . $bln . '-' . $tgl;
        $sampai = $sThn . '-' . $sBln . '-' . $sTgl;

        $id = $this->session->userdata('emp_id');
        if (empty($id)) {
            $id = $this->input->post('id_emp');
        }

        $dataUraianHeader = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmp($id);

        // var_dump($dari);
        $dataku = array();
        foreach ($dataUraianHeader as $key) {
            array_push($dataku, $key->lap_header_id);
        }
        $this->session->set_userdata('lapsampai', $sampai);
        $this->session->set_userdata('lapdari', $dari);
        $this->session->set_userdata('in', $dataku);
        echo json_encode($id);
    }

    public function FunctionName()
    {
        $id = $this->session->userdata('in');
        var_dump($id);
    }

    public function cari_laporan_pegawaiPimp_ajax()
    {
        $tgl = $this->input->post('tanggal');
        $bln =  $this->input->post('bulan');
        $thn =  $this->input->post('tahun');
        $sTgl = $this->input->post('stanggal');
        $sBln = $this->input->post('sbulan');
        $sThn = $this->input->post('stahun');

        $dari = $thn . '-' . $bln . '-' . $tgl;
        $sampai = $sThn . '-' . $sBln . '-' . $sTgl;


        $id = $this->input->post('id_emp');


        $dataUraianHeader = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmp($id);

        // var_dump($dari);
        $dataku = array();
        foreach ($dataUraianHeader as $key) {
            array_push($dataku, $key->lap_header_id);
        }
        $this->session->set_userdata('lapsampai', $sampai);
        $this->session->set_userdata('lapdari', $dari);
        $this->session->set_userdata('in', $dataku);
        echo json_encode($id);
    }


    public function daftar_laporanUser_ajax()
    {

        $dari = $this->session->userdata('lapdari');
        $sampai = $this->session->userdata('lapsampai');
        $data = $this->session->userdata('in');


        if (empty($dari) && empty($sampai) && empty($data)) {
            $region = 'Asia/Bangkok';
            $dt = new DateTime("now", new DateTimeZone($region));
            $date = $dt->format('Y-m-d');
            $pecah_tgl = explode("-", $date);
            $thn = $pecah_tgl[0];
            $bln = $pecah_tgl[1];
            // $tgl = $pecah_tgl[2];

            $emp_id = $this->session->userdata('emp_id');
            $headLap = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmp($emp_id);

            $dataIn = array();
            foreach ($headLap as $key) {
                array_push($dataIn, $key->lap_header_id);
            }

            $dataKosong = $this->Mlap->get_tbl_pegawai_laporan_detail_byThisMonth($dataIn, $bln, $thn);
            echo json_encode($dataKosong);
            // var_dump($dataKosong);
        } else {
            $dataUraianDetail = $this->Mlap->get_tbl_pegawai_laporan_detail_byJarakWaktu($dari, $sampai, $data);

            // var_dump($dataUraianDetail);
            echo json_encode($dataUraianDetail);
        }
    }

    function daftar_kegiatan_pegawai()
    {
        $region = 'Asia/Bangkok';
        $dt = new DateTime("now", new DateTimeZone($region));
        $date = $dt->format('Y-m-d');
        $pecah_tgl = explode("-", $date);
        $thn = $pecah_tgl[0];
        $bln = $pecah_tgl[1];
        $tgl = $pecah_tgl[2];

        $id = $this->session->userdata('emp_id');
        $dataUraianHeader = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmp($id);

        $dataku = "";
        foreach ($dataUraianHeader as $key) {
            $dataku .= $key->lap_header_id . ",";
        }

        $data = $this->Mlap->get_kegiatan_pegawaiThisMonth(substr($dataku, 0, -1), $bln, $thn);
        // $data = $this->m_barang->barang_list();
        echo json_encode($data);
        // var_dump($id);
    }

    public function daftar_pnasn_ajax()
    {
        // $dataPegawai = $this->MPegawai->get_pnasnAdmin();
        // // var_dump($dataPegawai);
        // echo json_encode($dataPegawai);

        // Search term
        $searchTerm = $this->input->post('searchTerm');

        // Get users
        $response = $this->MPegawai->get_pnasnAdmin($searchTerm);

        echo json_encode($response);
    }


    public function save_periode_daftar_penilaian_pimpinan_ajax()
    {
        $this->session->unset_userdata('dataPeriode');

        $periodex = $this->input->post('periode');
        $this->session->set_userdata('dataPeriode', $periodex);

        echo json_encode($periodex);
    }

    public function cari_daftar_penilaian_pimpinan_ajax()
    {
        $periode = $this->session->userdata('dataPeriode');

        if (empty($periode)) {
            $now = strtotime(date('Y-m-d H:i:s'));
            $tahun = date("Y", $now);
            $bulan = date("m", $now) . "-01";
            $PenilaianPegawai = $this->Mkinerja->get_admin_penilaianUserKabag($bulan, $tahun);
        } else {
            $pecah_tgl = explode("-", $periode);
            $thn = $pecah_tgl[0];
            $bln = $pecah_tgl[1];

            $nm = (int)$bln;
            $periode = $nm . "-01";
            $PenilaianPegawai = $this->Mkinerja->get_admin_penilaianUserKabag($periode, $thn);
        }

        echo json_encode($PenilaianPegawai);
        // var_dump($PenilaianPegawai);
    }

    public function daftar_histori_penilaian_pimp_ajax()
    {
        $empId = $this->session->userdata('emp_id');
        $listPegawai = $this->MPegawai->get_tbl_pegawai_pnasnKtu($empId);
        echo json_encode($listPegawai);
    }

    public function cari_pnasn_base_bagian()
    {
        $dept = $this->input->post('dept');
        $subDep = $this->input->post('subdept');
        $bagian = $this->input->post('bagian');

        $department = $this->MPegawai->get_daftarPegawai_eachKTU($dept, $subDep, $bagian);
        // var_dump($department);

        echo json_encode($department);
    }
    // public function daftar_hisotry_penilaian_ajax()
    // {

    //     $dari = $this->session->userdata('lapdari');
    //     $sampai = $this->session->userdata('lapsampai');
    //     $data = $this->session->userdata('in');


    //     if (empty($dari) && empty($sampai) && empty($data)) {
    //         $region = 'Asia/Bangkok';
    //         $dt = new DateTime("now", new DateTimeZone($region));
    //         $date = $dt->format('Y-m-d');
    //         $pecah_tgl = explode("-", $date);
    //         $thn = $pecah_tgl[0];
    //         $bln = $pecah_tgl[1];
    //         // $tgl = $pecah_tgl[2];

    //         $emp_id = $this->session->userdata('emp_id');
    //         $headLap = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmp($emp_id);

    //         $dataIn = array();
    //         foreach ($headLap as $key) {
    //             array_push($dataIn, $key->lap_header_id);
    //         }

    //         $dataKosong = $this->Mlap->get_tbl_pegawai_laporan_detail_byThisMonth($dataIn, $bln, $thn);
    //         echo json_encode($dataKosong);
    //         // var_dump($dataKosong);
    //     } else {
    //         $dataUraianDetail = $this->Mlap->get_tbl_pegawai_laporan_detail_byJarakWaktu($dari, $sampai, $data);

    //         // var_dump($dataUraianDetail);
    //         echo json_encode($dataUraianDetail);
    //     }
    // }
}
