<?php
class UraianTugas extends CI_Controller
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
        // $this->uraianTugasInput();
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

    public function uraianTugasInput()
    {
        $empId = $this->session->userdata('emp_id');
        $emp = $this->MPegawai->get_tbl_pegawai_byId($empId);
        $dataKegiatan = $this->MKegiatan->get_tbl_pegawai_kegiatan_byJabatan($emp[0]->jabatan_id);
        // var_dump($dataKegiatan);
        $kirim['dataKegiatan'] = $dataKegiatan;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('uraiantugas/uraianTugasInput', $kirim);

        $this->session->unset_userdata('a203');
        $this->session->unset_userdata('a202');
    }

    public function uraianTugasList()
    {
        $dataUraianH = $this->Mlap->get_tbl_pegawai_laporan_header_byDate();
        $kirim['dataHeader'] = $dataUraianH;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('uraiantugas/uraianTugasList', $kirim);
        $this->session->unset_userdata('print_stats');
    }

    public function LaporanPegawai($data = null)
    {
        $id = $data;
        $getLap = $this->Mlap->get_tbl_pegawai_laporan_detail_byId($id);
        $getempId = $this->Mlap->get_tbl_pegawai_laporan_header_byId($getLap[0]->lap_header_id);
        $getPegawai = $this->MPegawai->get_tbl_pegawai_byId($getempId[0]->emp_id);

        $kirim['laporan'] = $getLap;
        $kirim['pegawai'] = $getPegawai;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('uraiantugas/laporanPegawai', $kirim);
    }


    public function printPDF()
    {
        $dari = $this->session->userdata('lapdari');
        $sampai = $this->session->userdata('lapsampai');
        $data = $this->session->userdata('in');
        $datetime1 = new DateTime($dari);
        $datetime2 = new DateTime($sampai);

        $interval = $datetime1->diff($datetime2);
        $interval = $interval->format('%a');

        if ($interval <= 60) {
            $id = $this->session->userdata('emp_id');
            $laporan = $this->Mlap->get_tbl_pegawai_laporan_detail_byJarakWaktu($dari, $sampai, $data);
            $pegDep = $this->Mdep->get_tbl_pegDep_byEmpId($id);
            $dataP = $this->MPegawai->get_tbl_pegawai_Jabatan_byEmpId($id);
            $deptId = $this->MLogin->get_loginByPegawaiId($id);
            $subDeptId = $this->Mdep->get_tbl_subDepartment_byId($pegDep[0]->sub_id);
            $bagDeptId = $this->Mdep->get_tbl_bagDepartment_byId($pegDep[0]->bagian_id);
            $subName = $subDeptId[0]->nama;
            $bagName = $bagDeptId[0]->nama;
            $nama = $dataP[0]->nama_depan . " " . $dataP[0]->nama_belakang;
            $department = $this->Mdep->get_tbl_department_byId($deptId[0]->department_id);
            $jabatan = $dataP[0]->jabatan;
            $dep = $department[0]->nama;
            $is_dir = 0;

            if ($bagName == "Subbagian Tata Usaha") {
                $is_dir = 1;
            } else {
                $is_dir = 0;
            }

            $urlImg = base_url('asset/img/logo2.png');
            $urlCss = base_url('asset/plugin/bbootstrap-4.0.0/dist/css/bootstrap.css');
            $urlJs = base_url('asset/plugin/bbootstrap-4.0.0/dist/js/bootstrap.bundle.js');

            $mpdf = new \Mpdf\Mpdf([
                'default_font_size' => 9,
                'default_font' => 'ArialCE'
            ]);
            $html = "
        <!DOCTYPE html>
        <html lang='en'>

        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <title>Admin HRMS Imigrasi</title>
            <!-- Theme style -->
            
        
        </head>

        <body>            
            <table style='width: 100%;'>
                <tr>
                    <td width=15%>
                        <img src='$urlImg' width='90' height='90'>
                    </td>                       
                    <td style='text-align:center;'>
                        <table>
                            <tr>
                                <td>
                                    <h2 class='line-title'>
                                    KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA RI<br>                                    
                                    DIREKTORAT JENDERAL IMIGRASI<br>                                                                        
                                    </h2>
                                    <h4 class='line-title'>
                                    Jalan H.R. Rasuna Said Kav. X-6 No. 8 Kuningan, Jakarta Selatan<br>
                                    Telepon (021) 5224658 , Faksimile (021) 5225035<br>
                                    Laman : www.imigrasi.go.id<br>
                                    </h4>
                                </td>   
                            </tr>
                        </table>
                    </td>     
                </tr>
            </table>

            <hr class='line-title'>
            <table>
                <tr>
                    <td style='padding-right: 70px;'>Nama</td>
                    <td style='padding-right: 20px;'> : </td>
                    <td>$nama</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td> : </td>
                    <td>$jabatan</td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td> : </td>
                    <td>$dep</td>                    
                </tr>
                <tr>
                    <td>  </td>
                    <td>  </td>
                    <td>$subName </td>                    
                </tr>
                ";

            if ($is_dir == 1) {
                $html .= "";
            } else {
                $html .= "
                <tr>
                    <td>  </td>
                    <td>  </td>
                    <td>$bagName</td>                    
                </tr>";
            }

            $html .= "    
                <tr>
                    <td>Periode</td>
                    <td> : </td>
                    <td>$dari / $sampai</td>
                </tr>
            </table>
            <hr class='line-title'>
            <br>

            <table border='1' cellpadding='10' cellspacing='0'>        
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>                    
                    <th>Jam Mulai</th>                    
                    <th>Jam Selesai</th>
                    <th>Nama Kegiatan</th>
                    <th>Pelaksanaan Kegiatan</th>
                    <th>Jumlah yang diselesaikan</th>
                </tr>
                ";

            $no = 0;
            foreach ($laporan as $row) {
                $no++;
                // echo "<td>$row->status_kegiatan<td>";
                $html .= '
                    <tr>
                        <td style="text-align:justify">' . $no . '</td>   
                        <td style="text-align:justify">' . $row->waktu . '</td>                       
                        <td style="text-align:justify">' . $row->dari . ' </td>
                        <td style="text-align:justify">' . $row->sampai . ' </td>
                        <td style="text-align:justify">' . $row->nama  . ' </td>
                        <td style="text-align:justify">' . $row->pelaksanaan_kegiatan . '</td>                        
                        <td style="text-align:center">' . $row->surat_dikerjakan . ' </td>                                                
                    </tr>                                    
                    Page {PAGENO} of {nb}
                    ';
            }


            $html .= "
                </table>
                </body>
                </html>
                ";
            // $this->load->view('admin/htmm');
            $mpdf->setFooter('{PAGENO}');
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            $this->session->set_userdata('print_stats', 0);
            $this->uraianTugasList();
        } else {
            $this->session->set_userdata('print_stats', 1);
            $this->uraianTugasList();
        }
    }

    public function printPDFPegawaiKTU($emp_pegawai = null, $waktu = null)
    {
        $id = $emp_pegawai;

        $time = strtotime($waktu);
        $bln = date("m", $time);
        $tahun = date("Y", $time);

        $dataUraianHeader = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmp($id);

        $bulan = $this->nama_bulanIndo($bln);
        $dataku = "";
        foreach ($dataUraianHeader as $key) {
            $dataku .= $key->lap_header_id . ",";
        }

        $laporan = $this->Mlap->get_tbl_pegawai_laporan_detail_byJarakWaktuKTU(substr($dataku, 0, -1), $bln, $tahun);
        $pegDep = $this->Mdep->get_tbl_pegDep_byEmpId($id);
        $dataP = $this->MPegawai->get_tbl_pegawai_Jabatan_byEmpId($id);
        $deptId = $this->MLogin->get_loginByPegawaiId($id);
        $subDeptId = $this->Mdep->get_tbl_subDepartment_byId($pegDep[0]->sub_id);
        $bagDeptId = $this->Mdep->get_tbl_bagDepartment_byId($pegDep[0]->bagian_id);
        $subName = $subDeptId[0]->nama;
        $bagName = $bagDeptId[0]->nama;
        $nama = $dataP[0]->nama_depan . " " . $dataP[0]->nama_belakang;
        $department = $this->Mdep->get_tbl_department_byId($deptId[0]->department_id);
        $jabatan = $dataP[0]->jabatan;
        $dep = $department[0]->nama;

        $urlImg = base_url('asset/img/logo2.png');
        $urlCss = base_url('asset/plugin/bbootstrap-4.0.0/dist/css/bootstrap.css');
        $urlJs = base_url('asset/plugin/bbootstrap-4.0.0/dist/js/bootstrap.bundle.js');

        $mpdf = new \Mpdf\Mpdf();
        $html = "
            <!DOCTYPE html>
            <html lang='en'>

            <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <title>Admin HRMS Imigrasi</title>
                <!-- Theme style -->
                <link href='$urlCss' rel='stylesheet'>

            </head>

            <body>            
                <table style='width: 100%;'>
                    <tr>
                        <td width=1%>
                            <img src='$urlImg' width='90' height='90'>
                        </td>                       
                        <td style='text-align:center'>
                            <h3 style='line-height: 1.6; font-weight: bold;'>
                                Direktorat Jenderal Imigrasi<br>
                                Laporan Kegiatan Pegawai
                            </h3>
                        </td>     
                    </tr>
                </table>

                <hr class='line-title'>
                <table>
                    <tr>
                        <td style='padding-right: 70px;'>Nama</td>
                        <td style='padding-right: 20px;'> : </td>
                        <td>$nama</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td> : </td>
                        <td>$jabatan</td>
                    </tr>
                    <tr>
                        <td>Unit Kerja</td>
                        <td> : </td>
                        <td>$dep</td>                    
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>$subName </td>                    
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>$bagName</td>                    
                    </tr>
                    <tr>
                        <td>Periode</td>
                        <td> : </td>
                        <td>$bulan " . "$tahun</td>
                    </tr>
                </table>
                <hr class='line-title'>
                <br>

                <table border='1' cellpadding='10' cellspacing='0'>        
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>                    
                        <th>Nama Kegiatan</th>
                        <th>Pelaksanaan Kegiatan</th>
                        <th>Keterangan</th>
                        <th>Surat Dikerjakan</th>
                        <th>Lokasi Kerja</th>
                        <th>Tindak Lanjut</th>
                        <th>Status Kegiatan</th>
                    </tr>
                    ";

        $no = 0;
        foreach ($laporan as $row) {
            $no++;
            // echo "<td>$row->status_kegiatan<td>";
            $html .= '
                        <tr>
                            <td>' . $no . '</td>                        
                            <td>' . $row->waktu . ' </td>
                            <td>' . $row->nama  . ' </td>
                            <td>' . $row->pelaksanaan_kegiatan . '</td>
                            <td>' . $row->keterangan . ' </td>
                            <td>' . $row->surat_dikerjakan . ' </td>
                            <td>' . $row->lokasi_kerja . ' </td>
                            <td>' . $row->tindak_lanjut . ' </td>
                            <td>' . $row->status_kegiatan . '</td>
                        </tr>                                    
                        Page {PAGENO} of {nb}
                        ';
        }


        $html .= "
                    </table>
                    </body>
                    </html>
                    ";
        // $this->load->view('admin/htmm');
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        $this->session->set_userdata('print_stats', 0);
        $this->uraianTugasList();
        // var_dump($bln);
        // var_dump($tahun);
        // var_dump($dataku);
        // var_dump($laporan);
    }
}
