<?php
class Absensi extends CI_Controller
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
        $this->daftarAbsensi();
    }

    public function check_absen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('H:i:s');
        $absen = $this->MAbsen->absen_user_byMasuk_Pulang($this->session->userdata('emp_id'));

        if (empty($absen[0]->waktu_pulang)) {
            $data['waktu_pulang'] = 0;
        } else {
            $data['waktu_pulang'] = 1;
        }

        if (empty($absen[0]->waktu_datang)) {
            $data['waktu_datang'] = 0;
        } else {
            $data['waktu_datang'] = 1;
        }

        $dataAbsen =  $this->MAbsen->absen_harianRow($this->session->userdata('emp_id'));
        if (!empty($dataAbsen)) {
            if ($dataAbsen[0]->waktu_datang && $dataAbsen[0]->waktu_pulang) {
                $data['absen'] = 2;
            } else {
                $data['absen'] = 1;
            }
        } else {
            $data['absen'] = 0;
        }

        $data['data'] = $this->MAbsen->absen_user_byMasuk_Pulang($this->session->userdata('emp_id'));
        $data['detail'] = $this->detaiDataAbsen();

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('absen/absensi_pegawai', $data);
    }

    public function check_absen_pnasn()
    {
        $get_dep = $this->Mdep->get_tbl_department();
        // $get_jabatan = $this->MPegawai->get_tbl_jabatan();
        $data['department'] = $get_dep;
        // $data['sub_dep'] = $get_sub;
        $data['path'] = base_url('assets');

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('absen/absensi_pegawaiAdmin', $data);
    }

    public function check_absen_pnasn_detail()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('H:i:s');
        $absen = $this->MAbsen->absen_user_byMasuk_Pulang(@$this->uri->segment(3) ? $this->uri->segment(3) : $this->session->userdata('emp_id'));

        if (empty($absen[0]->waktu_pulang)) {
            $data['waktu_pulang'] = 0;
        } else {
            $data['waktu_pulang'] = 1;
        }

        if (empty($absen[0]->waktu_datang)) {
            $data['waktu_datang'] = 0;
        } else {
            $data['waktu_datang'] = 1;
        }

        $dataAbsen =  $this->MAbsen->absen_harianRow($this->session->userdata('emp_id'));
        if (!empty($dataAbsen)) {
            if ($dataAbsen[0]->waktu_datang && $dataAbsen[0]->waktu_pulang) {
                $data['absen'] = 2;
            } else {
                $data['absen'] = 1;
            }
        } else {
            $data['absen'] = 0;
        }

        $pegDep = $this->Mdep->get_tbl_pegDep_byEmpId(@$this->uri->segment(3));
        $dataP = $this->MPegawai->get_tbl_pegawai_Jabatan_byEmpId(@$this->uri->segment(3));
        $deptId = $this->MLogin->get_loginByPegawaiId(@$this->uri->segment(3));
        $subDeptId = $this->Mdep->get_tbl_subDepartment_byId($pegDep[0]->sub_id);
        $subName = $subDeptId[0]->nama;
        // $bagDeptId = $this->Mdep->get_tbl_bagDepartment_byId($pegDep[0]->bagian_id);

        $data['bio'] = $this->MPegawai->get_tbl_pegawai_byId(@$this->uri->segment(3) ? $this->uri->segment(3) : $this->session->userdata('emp_id'));
        $data['bagian'] = $subName;
        $data['data'] = $this->MAbsen->absen_user_byMasuk_Pulang($this->session->userdata('emp_id'));
        $data['detail'] = $this->detaiDataAbsen();

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('absen/absensi_pegawaiAdminDetail', $data);
    }



    public function absen()
    {
        if ($this->uri->segment(3)) {
            $keterangan = ucfirst($this->uri->segment(3));
        } else {
            $absen_harian = $this->absensi->absen_harian_user($this->session->id_user)->num_rows();
            $keterangan = ($absen_harian < 2 && $absen_harian < 1) ? 'Masuk' : 'Pulang';
        }

        echo $keterangan;
        // $keterangan =  "masuk";

        // $empId = $this->session->userdata('emp_id');

        // $data = [
        //     'tgl' => date('Y-m-d'),
        //     'waktu' => date('H:i:s'),
        //     'keterangan' => $keterangan,
        //     'emp_id' => $empId
        // ];
        // $result = $this->MAbsen->insert_data($data);
        // if ($result) {
        //     $this->session->set_flashdata('response', [
        //         'status' => 'success',
        //         'message' => 'Absensi berhasil dicatat'
        //     ]);
        // } else {
        //     $this->session->set_flashdata('response', [
        //         'status' => 'error',
        //         'message' => 'Absensi gagal dicatat'
        //     ]);
        // }
        // redirect('dashboard');
    }

    public function printAbsenPDFx()
    {
        // $dari = $this->session->userdata('lapdari');
        // $sampai = $this->session->userdata('lapsampai');
        // $data = $this->session->userdata('in');
        // $datetime1 = new DateTime($dari);
        // $datetime2 = new DateTime($sampai);

        // $interval = $datetime1->diff($datetime2);
        // $interval = $interval->format('%a');

        // if ($interval <= 60) {
        $id = $this->session->userdata('emp_id');
        // $laporan = $this->Mlap->get_tbl_pegawai_laporan_detail_byJarakWaktu($dari, $sampai, $data);
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

        // $html .= "    
        //         <tr>
        //             <td>Periode</td>
        //             <td> : </td>
        //             <td>$dari / $sampai</td>
        //         </tr>
        //     </table>
        //     <hr class='line-title'>
        //     <br>

        //     <table border='1' cellpadding='10' cellspacing='0'>        
        //         <tr>
        //             <th>No</th>
        //             <th>Tanggal</th>                    
        //             <th>Jam Mulai</th>                    
        //             <th>Jam Selesai</th>
        //             <th>Nama Kegiatan</th>
        //             <th>Pelaksanaan Kegiatan</th>
        //             <th>Terselesaikan</th>
        //         </tr>
        //         ";

        // $no = 0;
        // foreach ($laporan as $row) {
        //     $no++;
        //     // echo "<td>$row->status_kegiatan<td>";
        //     $html .= '
        //             <tr>
        //                 <td style="text-align:justify">' . $no . '</td>   
        //                 <td style="text-align:justify">' . $row->waktu . '</td>                       
        //                 <td style="text-align:justify">' . $row->dari . ' </td>
        //                 <td style="text-align:justify">' . $row->sampai . ' </td>
        //                 <td style="text-align:justify">' . $row->nama  . ' </td>
        //                 <td style="text-align:justify">' . $row->pelaksanaan_kegiatan . '</td>                        
        //                 <td style="text-align:center">' . $row->surat_dikerjakan . ' </td>                                                
        //             </tr>                                    
        //             Page {PAGENO} of {nb}
        //             ';
        // }


        $html .= "
                </table>
                </body>
                </html>
                ";
        // $this->load->view('admin/htmm');
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        //     $this->session->set_userdata('print_stats', 0);
        //     $this->uraianTugasList();
        // } else {
        //     $this->session->set_userdata('print_stats', 1);
        //     $this->uraianTugasList();
        // }
    }

    public function printAbsenPDF()
    {
        $this->load->library('pdf');
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 9,
            'default_font' => 'ArialCE'
        ]);
        $id = $this->uri->segment(3);
        $bulan = @$this->input->get('bulan') ? $this->input->get('bulan') : date('m');
        $tahun = @$this->input->get('tahun') ? $this->input->get('tahun') : date('Y');

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

        $dataAbsen = $this->MAbsen->get_absenPDF($id, $bulan, $tahun);
        $bio = $this->MPegawai->get_tbl_pegawai_byId($id);

        $kirim['jabatan'] = $jabatan;
        $kirim['sub'] = $subName;
        $kirim['bag'] = $bagName;
        $kirim['dep'] = $dep;
        $kirim['is_dir'] = $is_dir;
        $kirim['absen'] = $dataAbsen;
        $kirim['bio'] = $bio;
        $kirim['periode'] = bulan($bulan) . ' ' . $tahun;

        // ob_start();  // start output buffering
        // include $this->load->view('absen/absen_print_pdf');;
        // $content = ob_get_clean();
        // $html_content = $this->load->view('absen/absen_print_pdf');
        $filename = 'Absensi ' . $bio[0]->nama_depan . ' ' . $bio[0]->nama_belakang . ' - ' . $bulan . '-' . $tahun . '.pdf';

        // $this->pdf->loadHtml($html_content);
        // $this->pdf->render();
        // $this->pdf->stream($filename, ['Attachment' => 1]);

        // $mpdf->WriteHTML($content);
        // $mpdf->Output();
        // $this->pdf->WriteHTML($html_content);
        // $this->pdf->Output();

        // $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('absen/absen_print_pdf', $kirim, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function daftarAbsensi()
    {
        $kirim = $this->detaiDataAbsen();

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('absen/daftarAbsensi', $kirim);
    }

    private function detaiDataAbsen()
    {
        $id_user = @$this->uri->segment(3) ? $this->uri->segment(3) : $this->session->userdata('emp_id');
        // $id_user = $this->session->userdata('emp_id');
        $bulan = @$this->input->get('bulan') ? $this->input->get('bulan') : date('m');
        $tahun = @$this->input->get('tahun') ? $this->input->get('tahun') : date('Y');

        $data['karyawan'] = $this->MPegawai->get_tbl_pegawai_byId($id_user);
        $data['absen'] = $this->MAbsen->get_absen($id_user, $bulan, $tahun);
        $data['jam_kerja'] = (array) $this->MAbsen->get_all();
        $data['all_bulan'] = bulan();
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['hari'] = hari_bulan($bulan, $tahun);

        return $data;
    }
}
