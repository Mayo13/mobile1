<?php
class Dashboard extends CI_Controller
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
        // mGa9Dh5cfLtfjZX
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
        $this->dashboard();
        // $data['judul'] = 'Halaman Utama';
        // $detect = new Mobile_Detect;
        // // $this->load->view('v_home', $data);
        // if ($detect->isMobile()) {
        //     redirect('http://gooogle.com');
        // }
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

    public function daftarPegawai()
    {
        $empId = $this->session->userdata('emp_id');
        $roleId = $this->session->userdata('role_id');
        $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
        $dataPegawai = $this->MPegawai->get_daftarPegawai_eachKTU($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id);
        $dataPegawaiPimp = $this->MPegawai->get_daftarPegawai_Kabag();


        if ($roleId == 1) {
            $kirim['dataPegawai'] = $dataPegawaiPimp;

            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('admin/daftarPegawai', $kirim);
        } else {
            $kirim['dataPegawai'] = $dataPegawai;

            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('admin/daftarPegawai', $kirim);
        }

        $this->session->unset_userdata('a404');
        $this->session->unset_userdata('a203');
        $this->session->unset_userdata('a202');
    }

    public function dashboard()
    {
        $roleId = $this->session->userdata('role_id');
        $empId = $this->session->userdata('emp_id');
        $now = strtotime(date('Y-m-d H:i:s'));
        $thn = date("Y", $now);
        $bln = date("m", $now);
        $lm = (int)$bln - 1;
        $nm = (int)$bln;
        $periodeBulanini = $nm . "-01";
        $periodeBulanlalu = $lm . "-01";

        if ($roleId == 2) { //Kabag
            $berkas = $this->MPegawai->get_tbl_pegawai_with_berkas();
            $totalPegawai =  $this->MPegawai->get_tbl_pegawai_Counttotal();
            $totalPimp =  $this->MPegawai->get_tbl_pimp_total();
            $Department =  $this->Mdep->get_tbl_department();
            $pegawaiOnDept =  $this->MPegawai->get_tbl_pegawai_byDepartment();
            $ktuOnDept =  $this->MPegawai->get_tbl_ktu_byDepartment();
            $pegawaiOnJbt =  $this->MPegawai->get_tbl_pegawai_byJabatan_total();

            $now = strtotime(date('Y-m-d H:i:s'));
            $thn = date("Y", $now);
            $bln = date("m", $now);
            // $periode = substr($bln, 1, 5) . "-01";
            $nm = (int)$bln;
            $periode = $nm . "-01";

            $totalKinerjaBulanini =  $this->Mkinerja->get_tbl_pegawai_countBulanIni($periode, $thn);

            $sudahKinerja = $totalPegawai[0]->total - $totalKinerjaBulanini[0]->total;
            $belumKinerja = $totalKinerjaBulanini[0]->total;

            // var_dump($totalPegawai);
            if (empty($totalPegawai)) {
                $kirim['total_pegawai'] = 0;
            } else {
                $kirim['total_pegawai'] = $totalPegawai[0]->total;
            }

            if (empty($totalPimp[0]->total)) {
                $kirim['total_pimpinan'] = 0;
            } else {
                $kirim['total_pimpinan'] = $totalPimp[0]->total;
            }


            // $kirim['total_pegawai'] = $totalPegawai[0]->total;
            // $kirim['total_pimpinan'] = $totalPimp[0]->total;
            $kirim['dataDep'] = $Department;
            $kirim['pegawaiOnDept'] = $pegawaiOnDept;
            $kirim['ktuOnDept'] = $ktuOnDept;
            $kirim['pegawaiOnJbt'] = $pegawaiOnJbt;
            $kirim['berkas'] = $berkas;
            $kirim['belumKinerja'] = $belumKinerja;
            $kirim['sudahKinerja'] = $sudahKinerja;

            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('dashboard/dashboardAdmin', $kirim);
        } elseif ($roleId == 5) { // Admin
            $berkas = $this->MPegawai->get_tbl_pegawai_with_berkas();
            $totalPegawai =  $this->MPegawai->get_tbl_pegawai_Counttotal();
            $totalPimp =  $this->MPegawai->get_tbl_pimp_total();
            $Department =  $this->Mdep->get_tbl_department();
            $pegawaiOnDept =  $this->MPegawai->get_tbl_pegawai_byDepartment();
            $ktuOnDept =  $this->MPegawai->get_tbl_ktu_byDepartment();
            $pegawaiOnJbt =  $this->MPegawai->get_tbl_pegawai_byJabatan_total();

            // if (empty($totalPegawai[0]->total)) {
            //     $kirim['total_pegawai'] = 0;
            // } else {
            //     $kirim['total_pegawai'] = $totalPegawai[0]->total;
            // }

            // if (empty($totalPimp[0]->total)) {
            //     $kirim['total_pimpinan'] = 0;
            // } else {
            //     $kirim['total_pimpinan'] = $totalPimp[0]->total;
            // }

            $now = strtotime(date('Y-m-d H:i:s'));
            $thn = date("Y", $now);
            $bln = date("m", $now);
            // $periode = substr($bln, 1, 5) . "-01";
            $nm = (int)$bln;
            $periode = $nm . "-01";

            $totalKinerjaBulanini =  $this->Mkinerja->get_tbl_pegawai_countBulanIni($periode, $thn);

            $sudahKinerja = $totalPegawai[0]->total - $totalKinerjaBulanini[0]->total;
            $belumKinerja = $totalKinerjaBulanini[0]->total;

            // var_dump($totalPegawai);
            if (empty($totalPegawai)) {
                $kirim['total_pegawai'] = 0;
            } else {
                $kirim['total_pegawai'] = $totalPegawai[0]->total;
            }

            if (empty($totalPimp[0]->total)) {
                $kirim['total_pimpinan'] = 0;
            } else {
                $kirim['total_pimpinan'] = $totalPimp[0]->total;
            }


            // $kirim['total_pegawai'] = $totalPegawai[0]->total;
            // $kirim['total_pimpinan'] = $totalPimp[0]->total;
            $kirim['dataDep'] = $Department;
            $kirim['pegawaiOnDept'] = $pegawaiOnDept;
            $kirim['ktuOnDept'] = $ktuOnDept;
            $kirim['pegawaiOnJbt'] = $pegawaiOnJbt;
            $kirim['berkas'] = $berkas;
            $kirim['belumKinerja'] = $belumKinerja;
            $kirim['sudahKinerja'] = $sudahKinerja;

            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('dashboard/dashboardAdmin', $kirim);
        } elseif ($roleId == 3) { // Kasubag / KTU
            $cekDep = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
            $totalPegSes = $this->MPegawai->get_totalPegawai_byDepSesdit($cekDep[0]->department_id, $cekDep[0]->sub_id, $cekDep[0]->bagian_id);
            $totalPegDir = $this->MPegawai->get_totalPegawai_byDepDir($cekDep[0]->department_id, $cekDep[0]->sub_id);
            $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
            $dataPegawai = $this->MPegawai->get_daftarPegawai_eachKTU($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id);
            $dataPegawaiPimp = $this->MPegawai->get_daftarPegawai_Kabag();

            // $now = strtotime(date('Y-m-d H:i:s'));
            // $thn = date("Y", $now);
            // $bln = date("m", $now);
            // $bln = "07";
            // $data = "123_String_213";
            // $whatIWant = substr($data, strpos($data, "_") + 1);
            // $arr = explode("-", $bln, 2);
            // $first = $arr[0];

            $empId = $this->session->userdata('emp_id');
            $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
            $totalP = $this->MPegawai->get_totalDaftarPegawai_eachKTU($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id);


            $penilaianBulanini = $this->Mkinerja->get_totalPenilaian_Bulanini($thn, $periodeBulanini, $empId);
            $sudahPenilaian = $penilaianBulanini[0]->total;

            // var_dump($periodeBulanini);
            // var_dump($thn);
            // var_dump($empId);
            // var_dump($penilaianBulanini);


            if ($roleId == 1) {
                $kirim['dataPegawai'] = $dataPegawaiPimp;
            } else {
                $kirim['dataPegawai'] = $dataPegawai;
            }

            if ($cekDep[0]->department_id == 1) {
                $listPegawai = $this->MPegawai->get_dataPegawaibyPimpsesdit($cekDep[0]->department_id, $cekDep[0]->sub_id, $cekDep[0]->bagian_id);
                $berkas = $this->MPegawai->get_tbl_pegawaiBerkas_byDepSesdit($cekDep[0]->department_id, $cekDep[0]->sub_id, $cekDep[0]->bagian_id);
                $dataJabatan = $this->MPegawai->get_JabatanPegawai_byDepSesdit($cekDep[0]->department_id, $cekDep[0]->sub_id, $cekDep[0]->bagian_id);

                $listEmp = "";
                $empId = $this->session->userdata('emp_id');
                $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
                $dataPegawai = $this->MPegawai->get_daftarPegawai_eachKTU($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id);

                foreach ($dataPegawai as $key) {
                    $listEmp .= "'$key->emp_id',";
                };

                $time = strtotime(date('Y-m-d'));
                $month = date("m", $time);
                $year = date("Y", $time);

                if (empty($listEmp)) {
                    $listEmp = "9999";
                } else {
                    $listEmp = substr($listEmp, 0, -1);
                }

                // $lapPegTotal = $this->Mkinerja->get_tbl_pegawai_kinerja_byTotal($listEmp);
                $lapPegBulan = $this->Mkinerja->get_tbl_pegawai_kinerja_bythisMounth($year, $month, $listEmp);
                $belumPenilaian = $totalPegSes[0]->total - $sudahPenilaian;

                // $belumPenilaian = 
                $kirim['listPegawai'] = $listPegawai;
                $kirim['totalPeg'] =  $totalPegSes;
                $kirim['berkas'] =  $berkas;
                $kirim['pegawaiOnJbt'] = $dataJabatan;
                // $kirim['lapPegTotal'] = $lapPegTotal;
                $kirim['lapPegBulan'] = $lapPegBulan;
                $kirim['belumPenilaian'] = $belumPenilaian;

                $this->load->view('admin/template/1header');
                $this->load->view('admin/template/2navbar');
                $this->load->view('admin/template/3sidebar');
                $this->load->view('dashboard/dashboardKtu', $kirim);
            } else if ($cekDep[0]->department_id != 1) {
                $listPegawai = $this->MPegawai->get_dataPegawaibyPimpDir($cekDep[0]->department_id, $cekDep[0]->sub_id);
                $berkas = $this->MPegawai->get_tbl_pegawaiBerkas_byDepDir($cekDep[0]->department_id, $cekDep[0]->sub_id);
                $dataJabatan = $this->MPegawai->get_JabatanPegawai_byDepDir($cekDep[0]->department_id, $cekDep[0]->sub_id);

                $listEmp = "";
                $empId = $this->session->userdata('emp_id');
                $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
                $dataPegawai = $this->MPegawai->get_daftarPegawai_eachKTU($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id);

                foreach ($dataPegawai as $key) {
                    $listEmp .= "'$key->emp_id',";
                };

                $time = strtotime(date('Y-m-d'));
                $month = date("m", $time);
                $year = date("Y", $time);

                if (empty($listEmp)) {
                    $listEmp = "9999";
                } else {
                    $listEmp = substr($listEmp, 0, -1);
                }

                $lapPegTotal = $this->Mkinerja->get_tbl_pegawai_kinerja_byTotal($listEmp);
                $lapPegBulan = $this->Mkinerja->get_tbl_pegawai_kinerja_bythisMounth($year, $month, $listEmp);
                $belumPenilaian = $totalPegDir[0]->total - $sudahPenilaian;

                $kirim['listPegawai'] = $listPegawai;
                $kirim['totalPeg'] =  $totalPegDir;
                $kirim['berkas'] =  $berkas;
                $kirim['pegawaiOnJbt'] = $dataJabatan;
                $kirim['lapPegTotal'] = $lapPegTotal;
                $kirim['lapPegBulan'] = $lapPegBulan;
                $kirim['belumPenilaian'] = $belumPenilaian;

                $this->load->view('admin/template/1header');
                $this->load->view('admin/template/2navbar');
                $this->load->view('admin/template/3sidebar');
                $this->load->view('dashboard/dashboardKtu', $kirim);
            }
        } elseif ($roleId == 4) { // PPNPN
            $id = $this->session->userdata('emp_id');
            $dataUraianHeader = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmp($id);

            $region = 'Asia/Bangkok';
            $dt = new DateTime("now", new DateTimeZone($region));
            $date = $dt->format('Y-m-d');
            $pecah_tgl = explode("-", $date);
            $thn = $pecah_tgl[0];
            $bln = $pecah_tgl[1];
            $tgl = $pecah_tgl[2];

            $dataTotal = array();
            $dataChart = "";

            if (empty($dataUraianHeader)) {
                $kirim['chartTanggal'] = "kosong";
                $kirim['chartBulan'] = "kosong";
                $kirim['totalBulan'] = 0;
                $kirim['totalTahun'] = 0;
            } else {
                foreach ($dataUraianHeader as $key) {
                    array_push($dataTotal, $key->lap_header_id);
                }

                foreach ($dataUraianHeader as $key) {
                    $dataChart .= "'$key->lap_header_id',";
                }

                $dataChart = substr($dataChart, 0, -1);
                $chartTanggal = $this->Mlap->get_tbl_pegawai_chartbyTanggal($dataChart, $bln, $thn);
                $chartBulan = $this->Mlap->get_tbl_pegawai_chartbyBulan($dataChart, $thn);

                foreach ($chartBulan as $key) {
                    $key->bulan = $this->nama_bulanIndo($key->bulan);
                }

                $totalBulan = $this->Mlap->get_tbl_pegawai_laporan_detail_byThisMonth($dataTotal, $bln);
                $totalTahun = $this->Mlap->get_tbl_pegawai_laporan_detail_byThisYear($dataTotal, $thn);
                $kirim['totalBulan'] = $totalBulan;
                $kirim['totalTahun'] = $totalTahun;
                $kirim['chartTanggal'] = $chartTanggal;
                $kirim['chartBulan'] = $chartBulan;
            }
            $kirim['absen'] = $this->MAbsen->absen_harian_user($id)->num_rows();
            $sekarang = date('Y-m-d');
            $dataLaporan = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmpNowDate($id, $sekarang);
            // date_format($sekarang, "Y-m-d ");
            if (!empty($dataLaporan)) {
                if ($dataLaporan[0]->waktu == $sekarang) {
                    $is_absen = 1;
                } else {
                    $is_absen = 0;
                }
            } else {
                $is_absen = 0;
            }

            // var_dump($dataLaporan[0]->waktu);

            $kirim['is_input_tugas'] = $is_absen;

            $blnlalu = $bln - 1;
            $evaluasi = $this->Mkinerja->get_tbl_pegawai_kinerja_byMonth($periodeBulanlalu, $thn, $id);
            // var_dump($periodeBulanlalu);

            if (empty($evaluasi[0]->penilaian)) {
                $object = new stdClass();
                $object->nilai = 'Null';
                $object->nama = 'kosong';

                $eva = array($object);
            } else {
                $eva = $this->Mkinerja->get_tbl_penilaian_byId($evaluasi[0]->penilaian);
            }

            $kirim['bulanlalu'] = $this->nama_bulanIndo($blnlalu);
            $kirim['evaluasi'] = $eva[0];

            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('dashboard/dashboardPegawai', $kirim);
        }

        $this->session->unset_userdata('a404');
        $this->session->unset_userdata('a203');
        $this->session->unset_userdata('a202');
    }
}
