<?php

class Admin extends CI_Controller
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
        $this->dashboard();
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
                redirect('index.php/admin/dashboard');
            }
        }
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

    public function timezone()
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

    public function tgl_inputUraian($code)
    {
        if ($code == "time1") {
            $waktu1 = date("Y-m-d");
            echo $waktu1;
        } elseif ($code == "time2") {
            $waktu2 = date("Y-m-d", strtotime("-1 days"));
            echo $waktu2;
        } else {
            echo "wromng";
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
        // $myArray[][] = array();
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('kegiatan', 'kegiatan', 'required');
        // $this->form_validation->set_rules('waktu', 'waktu', 'required');
        $this->form_validation->set_rules('dari', 'dari', 'required');
        $this->form_validation->set_rules('sampai', 'sampai', 'required');
        $this->form_validation->set_rules('pelakKegiatan', 'Kegiatan', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_rules('tempatKerja', 'tempatKerja', 'required');
        $this->form_validation->set_rules('statusKegiatan', 'statusKegiatan', 'required');
        $this->form_validation->set_rules('tindakLanjut', 'tindakLanjut', 'required');

        if ($this->form_validation->run() != false) {
            $new =  $this->session->userdata('listKegiatan');
            $new[] = (object) [
                "jabatan" =>  $this->input->post('jabatan'),
                "kegiatan" => $this->input->post('kegiatan'),
                "waktu" => $this->input->post('waktu'),
                "dari" => $this->input->post('dari'),
                "sampai" =>  $this->input->post('sampai'),
                "pelakKegiatan" =>  $this->input->post('pelakKegiatan'),
                "keterangan" =>  $this->input->post('keterangan'),
                "jumlahSurat" =>  $this->input->post('jumlahSurat'),
                "tempatKerja" =>  $this->input->post('tempatKerja'),
                "statusKegiatan" =>  $this->input->post('statusKegiatan'),
                "tindakLanjut" =>  $this->input->post('tindakLanjut')
            ];

            $this->session->set_userdata('listKegiatan', $new);

            $data = $this->session->userdata('listKegiatan');
            echo json_encode($data);
        }
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

    function hapus_kinerja()
    {
        $id = $this->input->post('kode');
        $this->Mkinerja->delete_tbl_pegawai_kinerja($id);
        $this->PenilaianKinerja();
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

    public function select_validate($post_string)
    {
        if ($post_string == "") {
            $this->form_validation->set_message('select_validate', 'The {field} field can not be the word "test"');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // Upload image summernote
    function upload_imageSummerNote()
    {
        if (isset($_FILES["image"]["name"])) {
            $files_path = './file/image_summernote/';
            if (!file_exists($files_path)) {
                mkdir($files_path, 0777, true);
            }
            $config['upload_path']          = $files_path;
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);

            // $config['upload_path'] = './file/image_summernote/';
            // $config['allowed_types'] = 'jpg|jpeg|png|gif';
            // $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './file/image_summernote/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = './assets/images/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'file/image_summernote/' . $data['file_name'];
            }
        }
        // if (isset($_FILES["image"]["name"])) {
        //     $config['upload_path'] = './file/images_summernote/';
        //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
        //     $this->upload->initialize($config);
        //     if (!$this->upload->do_upload('image')) {
        //         $this->upload->display_errors();
        //         return FALSE;
        //     } else {
        //         $data = $this->upload->data();
        //         //Compress Image
        //         $config['image_library'] = 'gd2';
        //         $config['source_image'] = './file/images_summernote/' . $data['file_name'];
        //         $config['create_thumb'] = FALSE;
        //         $config['maintain_ratio'] = TRUE;
        //         $config['quality'] = '60%';
        //         $config['width'] = 800;
        //         $config['height'] = 800;
        //         $config['new_image'] = './file/images_summernote/' . $data['file_name'];
        //         $this->load->library('image_lib', $config);
        //         $this->image_lib->resize();
        //         echo base_url() . 'file/images_summernote/' . $data['file_name'];
        //     }
        // }
    }

    // Delete image Summernote
    function delete_imageSummerNote()
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
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
        $dataUraianHeader = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmp($id);

        // var_dump($dari);
        $dataku = array();
        foreach ($dataUraianHeader as $key) {
            array_push($dataku, $key->lap_header_id);
        }
        $this->session->set_userdata('lapsampai', $sampai);
        $this->session->set_userdata('lapdari', $dari);
        $this->session->set_userdata('in', $dataku);
        // $this->daftar_kegiatan_ajax($dataUraianDetail);
        echo json_encode($dataku);
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
                    <td> Sub Unit Kerja</td>
                    <td> : </td>
                    <td>$subName </td>                    
                </tr>
                <tr>
                    <td> Sub Sub Unit Kerja</td>
                    <td> : </td>
                    <td>$bagName</td>                    
                </tr>
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
                        <td>' . $row->dari . " " . $row->sampai . ' </td>
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
                        <td> Sub Unit Kerja</td>
                        <td> : </td>
                        <td>$subName </td>                    
                    </tr>
                    <tr>
                        <td> Sub Sub Unit Kerja</td>
                        <td> : </td>
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

    public function liat()
    {
        // $data = $this->session->userdata('xxx');
        // $data1 = $this->session->userdata('xxxs');
        // $data2 = $this->session->userdata('dataLaporan');
        $data2 = $this->session->userdata('in');
        // var_dump($in);
        // var_dump($data1);
        // var_dump($data2);
        $this->session->unset_userdata('lapsampai');
        $this->session->unset_userdata('lapdari');
        $this->session->unset_userdata('dataLaporan');
        $this->session->unset_userdata('in');
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

    // Method Submit
    public function submit_pegawaiInput()
    {
        $this->form_validation->set_rules('nik_KTP', 'Column', 'required');
        $this->form_validation->set_rules('nik_pegawai', 'Column', 'required');
        $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Column', 'required');
        $this->form_validation->set_rules('gender', 'Column', 'required');
        $this->form_validation->set_rules('address1', 'Column', 'required');
        $this->form_validation->set_rules('prov', 'Column', 'required');
        $this->form_validation->set_rules('kab', 'Column', 'required');
        $this->form_validation->set_rules('kec', 'Column', 'required');
        $this->form_validation->set_rules('des', 'Column', 'required');
        $this->form_validation->set_rules('no_telp', 'Column', 'required');
        $this->form_validation->set_rules('email', 'Column', 'required|valid_email');
        $this->form_validation->set_rules('jabatan', 'Column', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Column', 'required');

        $berkas_kode = random_string('alnum', 20);
        $login_id = $this->session->userdata('emp_login_id');
        $datab['berkas_kode'] = $berkas_kode;
        $datab['created_by'] = $login_id;

        //validasi file
        // 001 is file restriction
        // 002 is empty

        $error = array();

        if ($this->form_validation->run() != false) {
            // if (1 + 1 == 2) {
            $namaBelakang = null;

            if (!empty($_POST['nama_belakang'])) {
                $namaBelakang = $_POST['nama_belakang'];
            } else {
                $namaBelakang = " ";
            }

            $data = array(
                'nik_ktp' => $_POST['nik_KTP'],
                'nik_pegawai' => $_POST['nik_pegawai'],
                'nip_pegawai' => -1,
                'nama_depan' => ucwords($_POST['nama_depan']),
                'nama_belakang' => ucwords($namaBelakang),
                'tgl_lahir' => $_POST['tanggal_lahir'],
                'gender' => $_POST['gender'],
                'address1' => $_POST['address1'],
                'address2' => $_POST['address2'],
                'address3' => $_POST['address3'],
                'prov_id' => $_POST['prov'],
                'kab_id' => $_POST['kab'],
                'kec_id' => $_POST['kec'],
                'des_id' => $_POST['des'],
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'jabatan_id' => $_POST['jabatan'],
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
                'join_date'  => $_POST['tanggal_masuk'],
            );


            $files_path = './file/berkas/' . $berkas_kode . '/';
            if (!file_exists($files_path)) {
                mkdir($files_path, 0777, true);
            }

            $config['upload_path']          = $files_path;
            $config['allowed_types']        = 'gif|jpeg|jpg|png|pdf';
            $config['max_size']             = 5000;
            // $config['max_width']            = 2048;
            // $config['max_height']           = 1536;
            $this->load->library('upload', $config);

            if (!empty($_FILES['foto']['name'])) {
                $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                $_FILES['foto']['name'] = "foto." . $ext;
                if ($this->upload->do_upload('foto')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_foto'] = $uploadData['file_name'];
                    $datab['tipe_foto'] = $uploadData['file_ext'];
                    $datab['size_foto'] = $uploadData['file_size'];
                    $datab['url_foto'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Foto'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'foto is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Foto'
                );
            }

            if (!empty($_FILES['ktp']['name'])) {
                $ext = strtolower(pathinfo($_FILES['ktp']['name'], PATHINFO_EXTENSION));
                $_FILES['ktp']['name'] = "ktp." . $ext;
                if ($this->upload->do_upload('ktp')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_ktp'] = $uploadData['file_name'];
                    $datab['tipe_ktp'] = $uploadData['file_ext'];
                    $datab['size_ktp'] = $uploadData['file_size'];
                    $datab['url_ktp'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File KTP'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'KTP is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File KTP'
                );
            }

            if (!empty($_FILES['npwp']['name'])) {
                $ext = strtolower(pathinfo($_FILES['npwp']['name'], PATHINFO_EXTENSION));
                $_FILES['npwp']['name'] = "npwp." . $ext;
                if ($this->upload->do_upload('npwp')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_npwp'] = $uploadData['file_name'];
                    $datab['tipe_npwp'] = $uploadData['file_ext'];
                    $datab['size_npwp'] = $uploadData['file_size'];
                    $datab['url_npwp'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File NPWP'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'NPWP is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File NPWP'
                );
            }

            if (!empty($_FILES['no_rek']['name'])) {
                $ext = strtolower(pathinfo($_FILES['no_rek']['name'], PATHINFO_EXTENSION));
                $_FILES['no_rek']['name'] = "nomor_rekening." . $ext;
                if ($this->upload->do_upload('no_rek')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_no_rek'] = $uploadData['file_name'];
                    $datab['tipe_no_rek'] = $uploadData['file_ext'];
                    $datab['size_no_rek'] = $uploadData['file_size'];
                    $datab['url_no_rek'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File No_Rekening'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Nomor Rekening is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File No_Rekening'
                );
            }

            if (!empty($_FILES['cv']['name'])) {
                $ext = strtolower(pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION));
                $_FILES['cv']['name'] = "cv." . $ext;
                if ($this->upload->do_upload('cv')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_cv'] = $uploadData['file_name'];
                    $datab['tipe_cv'] = $uploadData['file_ext'];
                    $datab['size_cv'] = $uploadData['file_size'];
                    $datab['url_cv'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File CV'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'CV is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File CV'
                );
            }


            if (!empty($_FILES['sl']['name'])) {
                $ext = strtolower(pathinfo($_FILES['sl']['name'], PATHINFO_EXTENSION));
                $_FILES['sl']['name'] = "surat_lamaran." . $ext;
                if ($this->upload->do_upload('sl')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_surat_lamaran'] = $uploadData['file_name'];
                    $datab['tipe_surat_lamaran'] = $uploadData['file_ext'];
                    $datab['size_surat_lamaran'] = $uploadData['file_size'];
                    $datab['url_surat_lamaran'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Surat Lamaran'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Surat Lamaran is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Surat Lamaran'
                );
            }

            if (!empty($_FILES['ijasah']['name'])) {
                $ext = strtolower(pathinfo($_FILES['ijasah']['name'], PATHINFO_EXTENSION));
                $_FILES['ijasah']['name'] = "ijasah." . $ext;
                if ($this->upload->do_upload('ijasah')) {
                    $datab['nama_ijasah'] = $uploadData['file_name'];
                    $datab['tipe_ijasah'] = $uploadData['file_ext'];
                    $datab['size_ijasah'] = $uploadData['file_size'];
                    $datab['url_ijasah'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Ijasah'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Ijasah is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Ijasah'
                );
            }

            $errCount = count($error);
            $berkasKosong = false;
            $idP = null;

            if (!empty($errCount)) {
                $berkasKosong = true;
            } else {
                $id_pegawai = $this->MPegawai->insert_tbl_pegawai($data);
                $this->Mberkas->insert_tbl_pegawai_berkas($datab);
                $idP = $id_pegawai;
            }

            if (!empty($idP)) {
                $datalogin = array(
                    'emp_jabatan_id' => $_POST['jabatan'],
                    'emp_id' => $idP,
                    'berkas_kode' => $berkas_kode,
                    'no_telp' => $_POST['no_telp'],
                    'department_id' => 99,
                    'email' => $_POST['email'],
                    'passwords' => '12345678',
                    'created_by' => $login_id,
                    'created_date'  => date('Y-m-d H:i:s'),
                    'is_active' => '1',
                    'role_id' => '4',
                    'is_sys' => '0'
                );
                $this->MPegawai->insert_tbl_pegawai_login($datalogin);

                $dataDep = array(
                    'emp_id' => $id_pegawai,
                    'created_date' => date('Y-m-d H:i:s'),
                    'ket' => 'PNASN',
                );

                $this->MPegawai->insert_tbl_pegawai_department($dataDep);
                $this->session->set_userdata('a202', "Input Data Berhasil");
                $this->pegawaiInput();
            } else if ($berkasKosong) {
                $this->session->set_userdata('a203', "Input Data Gagal </br> Berkas tidak lengkap");
                // var_dump($error);
                $this->pegawaiInput($error);
            }
        } else {
            $this->session->set_userdata('a203', "Input Data gagal </br> Form tidak lengkap");
            $this->pegawaiInput();
        }
    }

    public function submit_updatePegawaiInput()
    {
        $this->form_validation->set_rules('nik_KTP', 'Column', 'required');
        $this->form_validation->set_rules('nik_pegawai', 'Column', 'required');
        $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Column', 'required');
        $this->form_validation->set_rules('gender', 'Column', 'required');
        $this->form_validation->set_rules('address1', 'Column', 'required');
        $this->form_validation->set_rules('prov', 'Column', 'required');
        $this->form_validation->set_rules('kab', 'Column', 'required');
        $this->form_validation->set_rules('kec', 'Column', 'required');
        $this->form_validation->set_rules('des', 'Column', 'required');
        $this->form_validation->set_rules('no_telp', 'Column', 'required');
        $this->form_validation->set_rules('email', 'Column', 'required|valid_email');
        $this->form_validation->set_rules('jabatan', 'Column', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Column', 'required');

        if ($this->form_validation->run() != false) {
            $berkas_kode = $_POST['berkas_kode'];
            $id_pegawai = $_POST['id_pegawai'];
            $id_berkas = $_POST['berkas_id'];
            $login_id = $this->session->userdata('emp_login_id');
            $error = array();
            $namaBelakang = null;

            //validasi file
            // 001 is file restriction
            // 002 is empty

            if (!empty($_POST['nama_belakang'])) {
                $namaBelakang = $_POST['nama_belakang'];
            } else {
                $namaBelakang = " ";
            }

            $data = array(
                'nik_ktp' => $_POST['nik_KTP'],
                'nik_pegawai' => $_POST['nik_pegawai'],
                'nama_depan' => ucwords($_POST['nama_depan']),
                'nama_belakang' => ucwords($namaBelakang),
                'tgl_lahir' => $_POST['tanggal_lahir'],
                'gender' => $_POST['gender'],
                'address1' => $_POST['address1'],
                'address2' => $_POST['address2'],
                'address3' => $_POST['address3'],
                'prov_id' => $_POST['prov'],
                'kab_id' => $_POST['kab'],
                'kec_id' => $_POST['kec'],
                'des_id' => $_POST['des'],
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'jabatan_id' => $_POST['jabatan'],
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
                'join_date'  => $_POST['tanggal_masuk'],
            );


            $files_path = './file/berkas/' . $berkas_kode . '/';
            if (!file_exists($files_path)) {
                mkdir($files_path, 0777, true);
            }

            $config['upload_path']          = $files_path;
            $config['allowed_types']        = 'jpg|png|pdf';
            $config['max_size']             = 5000;
            $config['max_width']            = 2048;
            $config['max_height']           = 1536;
            $config['overwrite']            = TRUE;
            $this->load->library('upload', $config);

            if (!empty($_FILES['foto']['name'])) {
                $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                $_FILES['foto']['name'] = "foto." . $ext;
                if ($this->upload->do_upload('foto')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_foto'] = $uploadData['file_name'];
                    $datab['tipe_foto'] = $uploadData['file_ext'];
                    $datab['size_foto'] = $uploadData['file_size'];
                    $datab['url_foto'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Foto'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'foto is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Foto'
                );
            }

            if (!empty($_FILES['ktp']['name'])) {
                $ext = strtolower(pathinfo($_FILES['ktp']['name'], PATHINFO_EXTENSION));
                $_FILES['ktp']['name'] = "ktp." . $ext;
                if ($this->upload->do_upload('ktp')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_ktp'] = $uploadData['file_name'];
                    $datab['tipe_ktp'] = $uploadData['file_ext'];
                    $datab['size_ktp'] = $uploadData['file_size'];
                    $datab['url_ktp'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File KTP'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'KTP is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File KTP'
                );
            }

            if (!empty($_FILES['npwp']['name'])) {
                $ext = strtolower(pathinfo($_FILES['npwp']['name'], PATHINFO_EXTENSION));
                $_FILES['npwp']['name'] = "npwp." . $ext;
                if ($this->upload->do_upload('npwp')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_npwp'] = $uploadData['file_name'];
                    $datab['tipe_npwp'] = $uploadData['file_ext'];
                    $datab['size_npwp'] = $uploadData['file_size'];
                    $datab['url_npwp'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File NPWP'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'NPWP is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File NPWP'
                );
            }
            // sadsa
            if (!empty($_FILES['no_rek']['name'])) {
                $ext = strtolower(pathinfo($_FILES['no_rek']['name'], PATHINFO_EXTENSION));
                $_FILES['no_rek']['name'] = "nomor_rekening." . $ext;
                if ($this->upload->do_upload('no_rek')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_no_rek'] = $uploadData['file_name'];
                    $datab['tipe_no_rek'] = $uploadData['file_ext'];
                    $datab['size_no_rek'] = $uploadData['file_size'];
                    $datab['url_no_rek'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File No_Rekening'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Nomor Rekening is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File No_Rekening'
                );
            }

            if (!empty($_FILES['cv']['name'])) {
                $ext = strtolower(pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION));
                $_FILES['cv']['name'] = "cv." . $ext;
                if ($this->upload->do_upload('cv')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_cv'] = $uploadData['file_name'];
                    $datab['tipe_cv'] = $uploadData['file_ext'];
                    $datab['size_cv'] = $uploadData['file_size'];
                    $datab['url_cv'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File CV'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'CV is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File CV'
                );
            }


            if (!empty($_FILES['sl']['name'])) {
                $ext = strtolower(pathinfo($_FILES['sl']['name'], PATHINFO_EXTENSION));
                $_FILES['sl']['name'] = "surat_lamaran." . $ext;
                if ($this->upload->do_upload('sl')) {
                    $uploadData = $this->upload->data();
                    $datab['nama_surat_lamaran'] = $uploadData['file_name'];
                    $datab['tipe_surat_lamaran'] = $uploadData['file_ext'];
                    $datab['size_surat_lamaran'] = $uploadData['file_size'];
                    $datab['url_surat_lamaran'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Surat Lamaran'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Surat Lamaran is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Surat Lamaran'
                );
            }

            if (!empty($_FILES['ijasah']['name'])) {
                $ext = strtolower(pathinfo($_FILES['ijasah']['name'], PATHINFO_EXTENSION));
                $_FILES['ijasah']['name'] = "ijasah." . $ext;
                if ($this->upload->do_upload('ijasah')) {
                    $datab['nama_ijasah'] = $uploadData['file_name'];
                    $datab['tipe_ijasah'] = $uploadData['file_ext'];
                    $datab['size_ijasah'] = $uploadData['file_size'];
                    $datab['url_ijasah'] = $uploadData['full_path'];
                } else {
                    $error[] = array(
                        'error' => $this->upload->display_errors(),
                        'error_kode' => '001',
                        'nama_file' => 'File Ijasah'
                    );
                }
            } else {
                $error[] = array(
                    'error' => 'Ijasah is empty',
                    'error_kode' => '002',
                    'nama_file' => 'File Ijasah'
                );
            }
            $datab['berkas_kode'] = $berkas_kode;
            $datab['modified_by'] = $login_id;
            $datab['modified_date'] = date('Y-m-d H:i:s');

            $errCount = count($error);
            $berkasKosong = false;

            if (!empty($errCount)) {
                $berkasKosong = true;
            } else {
                $berkasKosong = false;
            }

            if ($berkasKosong) {
                $this->Mberkas->update_tbl_pegawai_berkas($datab, $id_berkas);
                $this->MPegawai->update_tbl_pegawai($data, $id_pegawai);
                $this->session->set_userdata('a202', "Update Data Berhasil");

                $ciphertext = $this->encryption->encrypt($id_pegawai);
                $urisafe = strtr($ciphertext, '+/=', '-_~');

                $this->pegawaiEdit($urisafe);
            } else {
                $this->session->set_userdata('a203', "Update Data Gagal");
                $ciphertext = $this->encryption->encrypt($id_pegawai);
                $urisafe = strtr($ciphertext, '+/=', '-_~');

                $this->pegawaiEdit($urisafe);
            }

            // }else{
            //     $this->session->set_userdata('a203', "Update Data Gagal");
            //     $ciphertext = $this->encryption->encrypt($id_pegawai);
            //     $urisafe = strtr($ciphertext, '+/=', '-_~');

            //     $this->pegawaiEdit($urisafe);
            // }
        } else {
            $id_pegawai = $_POST['id_pegawai'];
            $this->session->set_userdata('a203', "Update Data Gagal Form tidak boleh Kosong");
            $ciphertext = $this->encryption->encrypt($id_pegawai);
            $urisafe = strtr($ciphertext, '+/=', '-_~');

            $this->pegawaiEdit($urisafe);
        }
    }

    public function submit_ktuInput()
    {
        $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('nama_belakang', 'Column', 'required');
        $this->form_validation->set_rules('nip', 'Column', 'required');
        $this->form_validation->set_rules('address1', 'Column', 'required');
        $this->form_validation->set_rules('no_telp', 'Column', 'required');
        $this->form_validation->set_rules('email', 'Column', 'required');
        $this->form_validation->set_rules('gender', 'Column', 'required');
        $this->form_validation->set_rules('department', 'Column', 'required');
        $this->form_validation->set_rules('subdepartment', 'Column', 'required');
        $this->form_validation->set_rules('bagiandepartment', 'Column', 'required');

        $berkas_kode = random_string('alnum', 20);
        $login_id = $this->session->userdata('emp_login_id');
        $datab['berkas_kode'] = $berkas_kode;
        $datab['created_by'] = $login_id;

        if ($this->form_validation->run() != false) {
            // if (1 + 1 == 2) {
            $namaBelakang = null;

            if (!empty($_POST['nama_belakang'])) {
                $namaBelakang = $_POST['nama_belakang'];
            } else {
                $namaBelakang = " ";
            }

            $data = array(
                'nik_ktp' => -1,
                'nik_pegawai' => -1,
                'nip_pegawai' => $_POST['nip'],
                'nama_depan' => ucwords($_POST['nama_depan']),
                'nama_belakang' => ucwords($namaBelakang),
                'tgl_lahir' => date('Y-m-d H:i:s'),
                'gender' => $_POST['gender'],
                'address1' => $_POST['address1'],
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'jabatan_id' => 6,
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
            );

            $id_pegawai = $this->MPegawai->insert_tbl_pegawai($data);
            $this->Mberkas->insert_tbl_pegawai_berkas($datab);
            $idP = $id_pegawai;

            $datalogin = array(
                'emp_jabatan_id' => 6,
                'department_id' => $_POST['department'],
                'emp_id' => $idP,
                'berkas_kode' => $berkas_kode,
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'passwords' => '12345678',
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
                'is_active' => '1',
                'role_id' => '3'
            );

            $this->MPegawai->insert_tbl_pegawai_login($datalogin);

            $dataDep = array(
                'emp_id' => $id_pegawai,
                'department_id' => $_POST['department'],
                'sub_id' => $_POST['subdepartment'],
                'bagian_id' => $_POST['bagiandepartment'],
                'created_date' => date('Y-m-d H:i:s'),
                'ket' => 'kosong',
            );

            $this->MPegawai->insert_tbl_pegawai_department($dataDep);
            $this->session->set_userdata('a202', "Input Data Berhasil");
            $this->ktuInput();
        } else {
            $this->session->set_userdata('a203', "Input Data gagal </br> Form tidak lengkap");
            $this->ktuInput();
        }
    }

    public function submit_updateKtuInput()
    {
        $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('nama_depan', 'Column', 'required');
        $this->form_validation->set_rules('nama_belakang', 'Column', 'required');
        $this->form_validation->set_rules('nip', 'Column', 'required');
        $this->form_validation->set_rules('address1', 'Column', 'required');
        $this->form_validation->set_rules('no_telp', 'Column', 'required');
        $this->form_validation->set_rules('email', 'Column', 'required');
        $this->form_validation->set_rules('gender', 'Column', 'required');
        $this->form_validation->set_rules('department', 'Column', 'required');
        $this->form_validation->set_rules('subdepartment', 'Column', 'required');
        $this->form_validation->set_rules('bagiandepartment', 'Column', 'required');

        // $berkas_kode = random_string('alnum', 20);
        $login_id = $this->session->userdata('emp_login_id');
        $urisafe = strtr($_POST['emp_id'], '-_~', '+/=');
        $empId = $this->encryption->decrypt($urisafe);

        $dataKtu = $this->MPegawai->get_tbl_pegawai_byId($empId);

        if ($this->form_validation->run() != false) {
            $namaBelakang = null;

            if (!empty($_POST['nama_belakang'])) {
                $namaBelakang = $_POST['nama_belakang'];
            } else {
                $namaBelakang = " ";
            }

            $data = array(
                'nik_ktp' => -1,
                'nik_pegawai' => -1,
                'nip_pegawai' => $_POST['nip'],
                'nama_depan' => ucwords($_POST['nama_depan']),
                'nama_belakang' => ucwords($namaBelakang),
                'tgl_lahir' => date('Y-m-d H:i:s'),
                'gender' => $_POST['gender'],
                'address1' => $_POST['address1'],
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'jabatan_id' => 6,
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
                'join_date'  => date('Y-m-d H:i:s'),
            );


            $datalogin = array(
                'emp_jabatan_id' => 6,
                'department_id' => $_POST['department'],
                'emp_id' =>  $empId,
                'no_telp' => $_POST['no_telp'],
                'email' => $_POST['email'],
                'passwords' => '12345678',
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
                'is_active' => '1',
                'role_id' => '3'
            );


            $dataDep = array(
                'emp_id' => $empId,
                'department_id' => $_POST['department'],
                'sub_id' => $_POST['subdepartment'],
                'bagian_id' => $_POST['bagiandepartment'],
                'created_date' => date('Y-m-d H:i:s'),
                'ket' => '(null)',
            );

            $pegId = $empId;
            $logId = $this->MLogin->get_loginByPegawaiId($empId);
            $depId = $this->Mdep->get_tbl_pegDep_byEmpId($empId);

            $this->db->trans_begin();

            $this->MPegawai->update_tbl_pegawai($data, $pegId);
            $this->MLogin->update_login($datalogin, $logId[0]->emp_login_id);
            $this->Mdep->update_tbl_pegawaidep($dataDep, $depId[0]->pegawaidept_id);

            $this->session->set_userdata('a202', "Input Data Berhasil");
            $this->KtuListEdit();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }
        } else {
            $this->session->set_userdata('a203', "Input Data gagal");
            $this->KtuListEdit();
        }
    }

    public function submit_department()
    {
        $idP = $_POST['emp_id'];

        $dataLog = $this->MLogin->get_loginByPegawaiId($idP);

        $idL = $dataLog[0]->emp_login_id;
        // echo $idL;

        if ($_POST['department'] == 0) {
            $this->session->set_userdata('a203', "Update Data Gagal");
            $this->penempatanPilih();
        } else {
            $dataL = array(
                'department_id' => $_POST['department'],
            );

            $val1 = $this->MLogin->update_login_withReturn($dataL, $idL);

            if ($val1 == 200) {
                $dataDep = array(
                    'emp_id' => $idP,
                    'department_id' => $_POST['department'],
                    'sub_id' => $_POST['subdepartment'],
                    'bagian_id' => $_POST['bagiandepartment'],
                    'created_date' => date('Y-m-d H:i:s'),
                    'ket' => 'PNASN',
                );

                $idPD = $this->Mdep->get_tbl_pegawai_departmentbyId($idP);
                $this->Mdep->update_tbl_pegawaidep($dataDep, $idPD[0]->pegawaidept_id);

                $this->session->set_userdata('a202', "Update Data Berhasil");
                $this->penempatanPilih();
            } else {
                $this->session->set_userdata('a203', "Update Data Gagal");
                $this->penempatanPilih();
            }
        }
    }

    public function submit_uraianTugas()
    {
        // $this->form_validation->set_rules('empID', 'id', 'required');
        // $this->form_validation->set_rules('waktu', 'waktu', 'required');
        $data = $this->session->userdata('listKegiatan');
        // if ($this->form_validation->run() != false) {
        if (!empty($data)) {

            $idUser =  $this->input->post('empID');
            $loginId =  $this->MLogin->get_loginByPegawaiId($idUser);
            $waktu =  $this->input->post('waktu');
            $dataPegawai = $this->MPegawai->get_tbl_pegawai_byId($idUser);

            usort($data, function ($a, $b) {
                return $a->dari > $b->dari ? 1 : -1;
            });

            $now = strtotime(date('Y-m-d H:i:s'));
            $thn = date("Y", $now);

            $time = strtotime($waktu);
            $tahun = date("Y", $time);
            $bulan = date("m", $time);

            $deptId = $this->Mdep->get_tbl_pegawai_departmentbyId($idUser);
            $ktuId = $this->MPegawai->get_ktu_ofpegawai($deptId[0]->department_id, $deptId[0]->sub_id, $deptId[0]->bagian_id);
            $isSend = $this->MPegawai->get_pegawaiPenilaian_byPeriode($ktuId[0]->emp_id, $bulan, $thn);

            $dataHeader = array();

            // $dataHeader = array(
            //     'jabatan_id' => $dataPegawai[0]->jabatan_id,
            //     'emp_id' => $idUser,
            //     'waktu' => $waktu,
            //     'is_ktu_checked' => 0,
            //     'is_ktu_send' => 0,
            //     'is_admin_checked' => 0,
            //     'is_pimp_checked' => 0,
            //     'created_date' => date('Y-m-d H:i:s')
            // );

            if (!empty($isSend)) {
                $dataHeader = array(
                    'jabatan_id' => $dataPegawai[0]->jabatan_id,
                    'emp_id' => $idUser,
                    'waktu' => $waktu,
                    'is_ktu_checked' => 0,
                    'is_ktu_send' => 1,
                    'is_admin_checked' => 0,
                    'is_pimp_checked' => 0,
                    'created_date' => date('Y-m-d H:i:s')
                );
            } else {
                $dataHeader = array(
                    'jabatan_id' => $dataPegawai[0]->jabatan_id,
                    'emp_id' => $idUser,
                    'waktu' => $waktu,
                    'is_ktu_checked' => 0,
                    'is_ktu_send' => 0,
                    'is_admin_checked' => 0,
                    'is_pimp_checked' => 0,
                    'created_date' => date('Y-m-d H:i:s')
                );
            }

            $idHeader = $this->Mlap->insert_tbl_pegawai_laporan_header($dataHeader);

            foreach ($data as $row) {
                $dataDetail = array(
                    "lap_header_id" =>  $idHeader,
                    "jabatan_id" =>  $row->jabatan,
                    "kegiatan_id" => $row->kegiatan,
                    "waktu" => $waktu,
                    "dari" => $row->dari,
                    "sampai" =>  $row->sampai,
                    "pelaksanaan_kegiatan" =>  $row->pelakKegiatan,
                    "keterangan" =>  $row->keterangan,
                    "surat_dikerjakan" => $row->jumlahSurat,
                    "lokasi_kerja" => $row->tempatKerja,
                    "status_kegiatan" =>  $row->statusKegiatan,
                    "tindak_lanjut" =>  $row->tindakLanjut,
                    'is_temp' => 1,
                    'is_ktu_checked' => 0,
                    'is_ktu_send' => 0,
                    'created_by' => $loginId[0]->emp_login_id,
                    'created_date' => date('Y-m-d H:i:s')
                );
                $detailHeader = $this->Mlap->insert_tbl_pegawai_laporan_detail($dataDetail);
            }

            $this->session->unset_userdata('listKegiatan');

            $return = $this->input->post('empID');

            echo json_encode($isSend);
        }
    }

    public function submit_updateUraianTugas()
    {
        $num = $this->session->userdata('uriIndex');
        $data = $this->session->userdata('listKegiatan');
        $data[$num]->jabatan = $this->input->post('jabatan');
        $data[$num]->kegiatan = $this->input->post('kegiatan');
        $data[$num]->dari = $this->input->post('dari');
        $data[$num]->sampai = $this->input->post('sampai');
        $data[$num]->pelakKegiatan = $this->input->post('pelakKegiatan');
        $data[$num]->keterangan = $this->input->post('keterangan');
        $data[$num]->tempatKerja = $this->input->post('tempatKerja');
        $data[$num]->statusKegiatan = $this->input->post('statusKegiatan');
        $data[$num]->tindakLanjut = $this->input->post('tindakLanjut');

        echo json_encode($data);
    }

    public function submit_kinerjaPegawai()
    {
        $this->form_validation->set_rules('nama', 'Column', 'required');
        $this->form_validation->set_rules('periode', 'Column', 'required');
        $this->form_validation->set_rules('score', 'Column', 'required');
        $this->form_validation->set_rules('keterangan', 'Column', 'required');

        $login_id = $this->session->userdata('emp_login_id');
        if ($this->form_validation->run() != false) {

            $data = array(
                'emp_id_pimp' => $this->session->userdata('emp_id'),
                'emp_id' => $_POST['nama'],
                'periode' => $_POST['periode'] . '-01',
                'penilaian' => $_POST['score'],
                'keterangan' => $_POST['keterangan'],
                'created_by' => $login_id,
                'created_date'  => date('Y-m-d H:i:s'),
            );

            $this->Mkinerja->insert_tbl_pegawai_kinerja($data);

            $this->session->set_userdata('a202', "Input Data Kinerja Berhasil");
            $this->ktuInputKinerja();
        } else {
            $this->session->set_userdata('a203', "Input Data Kinerja Gagal </br> Form tidak lengkap");
            $this->ktuInputKinerja();
        }
    }

    public function submit_updateKinerjaPegawai()
    {
        $this->form_validation->set_rules('nama', 'Column', 'required');
        $this->form_validation->set_rules('periode', 'Column', 'required');
        $this->form_validation->set_rules('score', 'Column', 'required');
        $this->form_validation->set_rules('keterangan', 'Column', 'required');

        $kinid  = $_POST['kinid'];
        $login_id = $this->session->userdata('emp_login_id');
        $data = array(
            'emp_id' => $_POST['nama'],
            'periode' => $_POST['periode'] . '-01',
            'penilaian' => $_POST['score'],
            'keterangan' => $_POST['keterangan'],
            'created_by' => $login_id,
            'modified_date'  => date('Y-m-d H:i:s'),
        );
        // var_dump($data);
        if ($this->form_validation->run() != false) {

            $data = array(
                'emp_id' => $_POST['nama'],
                'periode' => $_POST['periode'] . '-01',
                'penilaian' => $_POST['score'],
                'keterangan' => $_POST['keterangan'],
                'created_by' => $login_id,
                'modified_date'  => date('Y-m-d H:i:s'),
            );

            $this->Mkinerja->update_tbl_pegawai_kinerja($data, $kinid);

            $this->session->set_userdata('a202', "Update Data Kinerja Berhasil");
            $this->PenilaianKinerja();
        } else {
            $this->session->set_userdata('a203', "Input Data Kinerja Gagal </br> Form tidak lengkap");
            $this->PenilaianKinerja();
        }
    }

    public function cron_update()
    {
    }

    public function submit_kirimPenilaian()
    {
        $id = $this->input->post('kode');

        $data = array(
            'is_send' => 1,
            'send_date'  => date('Y-m-d H:i:s'),
        );

        $data2 = array(
            'is_ktu_send' => 1,
            'is_ktu_checked'  => 1,
        );

        $periode = $this->Mkinerja->get_tbl_pegawai_kinerja_byId($id);

        $time = strtotime($periode[0]->created_date);
        $tahun = date("Y", $time);

        $employee = $this->Mlap->get_tbl_pegawai_laporan_header_byOneEmp($periode[0]->emp_id, substr($periode[0]->periode, 0, -3), $tahun);

        if (empty($employee)) {
            $this->session->set_userdata('a2031', "Periode Laporan yang anda masukan tidak ditemukan");
            $this->PenilaianKinerja();
        } else {
            $listEmp = array();
            foreach ($employee as $key) {
                array_push($listEmp, $key->lap_header_id);
            }

            $this->Mlap->update_tbl_pegawai_laporan_header_byListId($data2, $listEmp);
            $this->Mkinerja->update_tbl_pegawai_kinerja($data, $id);

            $this->PenilaianKinerja();
        }

        $this->session->unset_userdata('a2031');
    }

    public function submit_updatePassPegawai()
    {
        $id = $_POST['emp_id'];
        $urisafe = strtr($id, '-_~', '+/=');
        $deId = $this->encryption->decrypt($urisafe);

        $this->form_validation->set_rules('pass_lama', 'Column', 'required');
        $this->form_validation->set_rules('pass_baru1', 'Column', 'required');
        $this->form_validation->set_rules('pass_baru2', 'Column', 'required');
        $this->form_validation->set_rules('emp_id', 'Column', 'required');

        if ($this->form_validation->run() != false) {
            $auths = $this->MLogin->get_loginByPass($deId, $_POST['pass_lama']);
            if (empty($auths)) {
                $this->session->set_userdata('a203', "Update Data Akun Gagal </br> Sandi anda Salah !!");
                $this->pegawaiSettProfile();
            } else {
                $data = array(
                    'passwords' => $_POST['pass_baru2'],
                );

                $this->MLogin->update_loginbyEmp_id($data, $deId);

                $this->session->set_userdata('a202', "Update Data Akun Berhasil, Silahkan Login Kembali");
                $this->pegawaiSettProfile();

                // $url = base_url('');
                // redirect($url);
            }
        } else {
            $this->session->set_userdata('a203', "Update Data Akun Gagal </br> Form tidak lengkap");
            $this->pegawaiSettProfile();
        }

        $this->session->unset_userdata('a202');
        $this->session->unset_userdata('a203');
    }

    // Method View Multiple 
    //Method View Pimpinan, KTU, Admin, User 
    public function dashboard()
    {
        $roleId = $this->session->userdata('role_id');
        $empId = $this->session->userdata('emp_id');

        if ($roleId == 1) {
            $berkas = $this->MPegawai->get_tbl_pegawai_with_berkas();
            $totalPegawai =  $this->MPegawai->get_tbl_pegawai_total();
            $totalPimp =  $this->MPegawai->get_tbl_pimp_total();
            $Department =  $this->Mdep->get_tbl_department();
            $pegawaiOnDept =  $this->MPegawai->get_tbl_pegawai_byDepartment();
            $ktuOnDept =  $this->MPegawai->get_tbl_ktu_byDepartment();
            $pegawaiOnJbt =  $this->MPegawai->get_tbl_pegawai_byJabatan_total();

            $kirim['total_pegawai'] = $totalPegawai[0]->total;
            $kirim['total_pimpinan'] = $totalPimp[0]->total;
            $kirim['dataDep'] = $Department;
            $kirim['pegawaiOnDept'] = $pegawaiOnDept;
            $kirim['ktuOnDept'] = $ktuOnDept;
            $kirim['pegawaiOnJbt'] = $pegawaiOnJbt;
            $kirim['berkas'] = $berkas;

            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('admin/dashboardPimp', $kirim);
        } elseif ($roleId == 2) { // Done Admin
            $berkas = $this->MPegawai->get_tbl_pegawai_with_berkas();
            $totalPegawai =  $this->MPegawai->get_tbl_pegawai_total();
            $totalPimp =  $this->MPegawai->get_tbl_pimp_total();
            $Department =  $this->Mdep->get_tbl_department();
            $pegawaiOnDept =  $this->MPegawai->get_tbl_pegawai_byDepartment();
            $ktuOnDept =  $this->MPegawai->get_tbl_ktu_byDepartment();
            $pegawaiOnJbt =  $this->MPegawai->get_tbl_pegawai_byJabatan_total();

            $kirim['total_pegawai'] = $totalPegawai[0]->total;
            $kirim['total_pimpinan'] = $totalPimp[0]->total;
            $kirim['dataDep'] = $Department;
            $kirim['pegawaiOnDept'] = $pegawaiOnDept;
            $kirim['ktuOnDept'] = $ktuOnDept;
            $kirim['pegawaiOnJbt'] = $pegawaiOnJbt;
            $kirim['berkas'] = $berkas;

            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('admin/dashboardAdmin', $kirim);
        } elseif ($roleId == 3) { //KTU progress
            $cekDep = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
            $totalPegSes = $this->MPegawai->get_totalPegawai_byDepSesdit($cekDep[0]->department_id, $cekDep[0]->sub_id, $cekDep[0]->bagian_id);
            $totalPegDir = $this->MPegawai->get_totalPegawai_byDepDir($cekDep[0]->department_id, $cekDep[0]->sub_id);

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

                $lapPegTotal = $this->Mkinerja->get_tbl_pegawai_kinerja_byTotal($listEmp);
                $lapPegBulan = $this->Mkinerja->get_tbl_pegawai_kinerja_bythisMounth($year, $month, $listEmp);

                $kirim['listPegawai'] = $listPegawai;
                $kirim['totalPeg'] =  $totalPegSes;
                $kirim['berkas'] =  $berkas;
                $kirim['pegawaiOnJbt'] = $dataJabatan;
                $kirim['lapPegTotal'] = $lapPegTotal;
                $kirim['lapPegBulan'] = $lapPegBulan;

                $this->load->view('admin/template/1header');
                $this->load->view('admin/template/2navbar');
                $this->load->view('admin/template/3sidebar');
                $this->load->view('admin/dashboardKtu', $kirim);
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


                $kirim['listPegawai'] = $listPegawai;
                $kirim['totalPeg'] =  $totalPegDir;
                $kirim['berkas'] =  $berkas;
                $kirim['pegawaiOnJbt'] = $dataJabatan;
                $kirim['lapPegTotal'] = $lapPegTotal;
                $kirim['lapPegBulan'] = $lapPegBulan;

                // var_dump($totalPegDir);
                $this->load->view('admin/template/1header');
                $this->load->view('admin/template/2navbar');
                $this->load->view('admin/template/3sidebar');
                $this->load->view('admin/dashboardKtu', $kirim);
            }
        } elseif ($roleId == 4) { //Done User
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
            // $now = date('H:i:s');
            $kirim['absen'] = $this->MAbsen->absen_harian_user($this->session->userdata('emp_id'))->num_rows();
            $kirim['is_input_tugas'] = 1;

            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('admin/dashboardPegawai', $kirim);
        }

        $this->session->unset_userdata('a404');
        $this->session->unset_userdata('a203');
        $this->session->unset_userdata('a202');
    }

    //Method View Pimpinan, KTU
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

        // var_dump($data);


        $this->session->unset_userdata('a404');
        $this->session->unset_userdata('a203');
        $this->session->unset_userdata('a202');
    }

    //Method View Pimpinan, KTU, Admin, User
    public function uraianTugasInput()
    {
        $empId = $this->session->userdata('emp_id');
        $dataJabatan = $this->Mjabatan->get_tbl_pegawai_jabatan();
        $userJabatan = $this->MPegawai->get_tbl_pegawai_byId($empId);
        $dataKegiatan = $this->MKegiatan->get_tbl_pegawai_kegiatan();
        // echo $userJabatan[0]->jabatan_id;
        $kirim['userJabatan'] = $userJabatan;
        $kirim['dataJabatan'] = $dataJabatan;
        $kirim['dataKegiatan'] = $dataKegiatan;



        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/uraianTugasInput', $kirim);

        $this->session->unset_userdata('a203');
        $this->session->unset_userdata('a202');
    }

    //Method View Pimpinan, KTU, Admin, User
    public function uraianTugasList()
    {
        $dataUraianH = $this->Mlap->get_tbl_pegawai_laporan_header_byDate();
        $kirim['dataHeader'] = $dataUraianH;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/uraianTugasList', $kirim);
        $this->session->unset_userdata('print_stats');
    }

    public function uraianTugasListDetail()
    {
        $thn =  $this->uri->segment(3);
        $bln =  $this->uri->segment(4);
        $tgl =  $this->uri->segment(5);

        $uriThn = strtr($thn, '-_~', '+/=');
        $uriBln = strtr($bln, '-_~', '+/=');
        $uriTgl = strtr($tgl, '-_~', '+/=');

        $decThn = $this->encryption->decrypt($uriThn);
        $decBln = $this->encryption->decrypt($uriBln);
        $decTgl = $this->encryption->decrypt($uriTgl);

        $dataUraianDetail = $this->Mlap->get_tbl_pegawai_laporan_detail_byTanggal($decThn, $decBln, $decTgl);
        $kirim['dataDetail'] = $dataUraianDetail;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/uraianTugasListDetail', $kirim);
    }

    //Method View Pimpinan, KTU, Admin, User
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

        // $desa = $this->Mwil->get_desa_kelurahan_byId($data[0]->des_id);
        // $kec =  $this->Mwil->get_kecamatan_byId($data[0]->kec_id);
        // $provinsi = $this->Mwil->get_provinsi_byId($data[0]->prov_id);
        // $kabupaten = $this->Mwil->get_kabupaten_byId($data[0]->kab_id);
        // get_tbl_pegawai_jabatan_TU
        // echo $data[0]->jabatan_id;
        if ($data[0]->jabatan_id == 6) {
            $dataJabatan = "";
        } else {
            $dataJabatan = $jabatan[0]->nama;
        }

        // var_dump($dataDepartment);
        // $kirim['des'] = $desa;
        // $kirim['kec'] = $kec;
        // $kirim['prov'] = $provinsi;
        // $kirim['kab'] = $kabupaten;
        $kirim['data'] = $data;
        $kirim['dataJabatan'] = $dataJabatan;
        $kirim['dataDepartment'] = $dataDepartment;
        $kirim['datasubDepartment'] = $dataDepartmentsub;
        $kirim['databagDepartment'] = $dataDepartmentbag;
        $kirim['footer'] = 'admin/template/4footer';

        var_dump($kirim);
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/pegawaiSettProfile', $kirim);
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
        $this->load->view('admin/pegawaiSettUpdateProfile', $kirim);
    }

    //Method View Admin
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
        $this->load->view('admin/pegawaiInput', $data);

        $this->session->unset_userdata('a203');
        $this->session->unset_userdata('a202');
    }

    public function pegawaiListEdit()
    {
        $dataPegawai = $this->MPegawai->get_tbl_pegawai_byJabatan();
        $kirim['dataPegawai'] = $dataPegawai;
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/pegawaiListEdit', $kirim);
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
        $this->load->view('admin/pegawaiEdit', $kirim);

        $this->session->unset_userdata('a202');
        $this->session->unset_userdata('a203');
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
        $this->load->view('admin/ktuInput', $data);

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
        $this->load->view('admin/ktuListEdit', $kirim);
        // var_dump($dataPegawai);
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
        // var_dump($dataKTU);
        // var_dump($depBag[0]);
        // var_dump($dataKTU[0]);
        $kirim['depSub'] = $depSub;
        $kirim['depBag'] = $depBag;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/ktuEdit', $kirim);

        $this->session->unset_userdata('a202');
        $this->session->unset_userdata('a203');
    }

    public function pegawaiLihatBerkas()
    {
        $berkas_kode =  $this->uri->segment(3);
        $jenis_berkas =  $this->uri->segment(4);

        $berkas = $this->Mberkas->get_tbl_pegawai_berkas_byKode($berkas_kode);
        // var_dump($berkas);
        $kirim['berkas'] = $berkas;
        $kirim['jenis_berkas'] = $jenis_berkas;
        $this->load->view('admin/pegawaiLihatBerkas', $kirim);
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
        $this->load->view('admin/penempatanPilih', $kirim);

        $this->session->unset_userdata('a202');
        $this->session->unset_userdata('a203');
    }

    public function penempatanEdit()
    {
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/penempatanEdit');
    }

    public function pegawai_UpdateKegiatan()
    {
        $index =  $this->uri->segment(3);
        $dataJabatan = $this->Mjabatan->get_tbl_pegawai_jabatan();
        $dataKegiatan = $this->MKegiatan->get_tbl_pegawai_kegiatan();
        $data = $this->session->userdata('listKegiatan');
        $this->session->set_userdata('uriIndex', $index);
        $selected = $data[$index];
        $kirim['dataJabatan'] = $dataJabatan;
        $kirim['dataKegiatan'] = $dataKegiatan;
        $kirim['selected'] = $selected;
        // var_dump($selected);
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/pegawai_UpdateKegiatan', $kirim);


        // $data[$index]->jabatan = $this->input->post('jabatan');
        // $data[$index]->kegiatan = $this->input->post('kegiatan');
        // $data[$index]->waktu = $this->input->post('waktu');
        // $data[$index]->dari = $this->input->post('dari');
        // $data[$index]->sampai = $this->input->post('sampai');
        // $data[$index]->pelakKegiatan = $this->input->post('pelakKegiatan');
        // $data[$index]->keterangan = $this->input->post('keterangan');
        // $data[$index]->jumlahSurat = $this->input->post('jumlahSurat');
        // $data[$index]->tempatKerja = $this->input->post('tempatKerja');
        // $data[$index]->statusKegiatan = $this->input->post('statusKegiatan');
        // $data[$index]->tindakLanjut = $this->input->post('tindakLanjut');        
    }

    public function daftarLaporan()
    {
        $listKtu = $this->MPegawai->get_tbl_pegawai_byIsKTU();
        $listEmp = "";
        foreach ($listKtu as $key) {
            $listEmp .= $key->emp_id . ",";
        }

        if (empty($listEmp)) {
            $listEmp = "9999";
        } else {
            $listEmp = substr($listEmp, 0, -1);
        }

        $dataKtu = $this->MPegawai->get_daftarKTUbyEmpList($listEmp);
        $kirim['dataKtu'] = $dataKtu;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/daftarLaporan', $kirim);
    }

    public function daftarLaporanDetail($emp_id = null)
    {
        $urisafe = strtr($emp_id, '-_~', '+/=');
        $ktuId = $this->encryption->decrypt($urisafe);

        $peg_dep = $this->Mdep->get_tbl_pegDep_byEmpId($ktuId);
        $listEmp = $this->MPegawai->get_daftarPegawai_eachKTU($peg_dep[0]->department_id, $peg_dep[0]->sub_id, $peg_dep[0]->bagian_id);
        $kirim['dataKtu'] = $listEmp;


        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/daftarLaporanDetail', $kirim);
    }

    public function daftarLaporanDetailPegawai($emp_id = null)
    {
        $urisafe = strtr($emp_id, '-_~', '+/=');
        $empId = $this->encryption->decrypt($urisafe);

        $header = $this->Mlap->get_daftar_header_byperiode($empId);

        // DaftarLaporanPegawaiDetail

        $kirim['dataKtu'] = $header;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/daftarLaporanDetailPegawai', $kirim);
    }

    public function inboxLaporan()
    {
        $isSend = $this->Mkinerja->get_tbl_pegawai_kinerja_bySend();
        $listEmp = "";
        foreach ($isSend as $key) {
            $listEmp .= $key->emp_id_pimp . ",";
        }

        if (empty($listEmp)) {
            $listEmp = "9999";
        } else {
            $listEmp = substr($listEmp, 0, -1);
        }

        $dataKtu = $this->MPegawai->get_tbl_pegawai_pimp_bykinerja_isSend($listEmp);
        // $laporan = $this->MPegawai->get_laporanPegawai($dataDept[0]->department_id, $dataDept[0]->sub_id, $dataDept[0]->bagian_id, $bulan, $tahun);

        if (!empty($dataKtu)) {
            $kirim['dataKtu'] = $dataKtu;

            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('admin/inboxLaporan', $kirim);
        } else {
            $kirim['dataKtu'] = $dataKtu;

            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('admin/inboxLaporannull', $kirim);
        }
    }

    public function inboxLaporanDetail($emp_id_pimp = null)
    {
        $urisafe = strtr($emp_id_pimp, '-_~', '+/=');
        $ktuId = $this->encryption->decrypt($urisafe);

        $isSend = $this->Mkinerja->get_tbl_pegawai_kinerja_bySendKtu($ktuId);

        $listEmp = "";
        foreach ($isSend as $key) {
            $listEmp .= $key->emp_id . ",";
        }

        if (empty($listEmp)) {
            $listEmp = "9999";
        } else {
            $listEmp = substr($listEmp, 0, -1);
        }

        $dataKtu = $this->MPegawai->get_tbl_pegawai_byId_IN($listEmp);
        // $laporan = $this->MPegawai->get_laporanPegawai($dataDept[0]->department_id, $dataDept[0]->sub_id, $dataDept[0]->bagian_id, $bulan, $tahun);
        $kirim['dataKtu'] = $dataKtu;
        // var_dump($kirim);


        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/inboxLaporanDetail', $kirim);
    }

    public function pegawaiSettUserAdd()
    {
        $kirim['footer'] = 'admin/template/4footer';
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/pegawaiSettUserAdd', $kirim);
    }

    public function pegawaiSettUserEdit()
    {
        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/pegawaiSettUserEdit');
    }

    //Method View KTU
    public function PenilaianKinerja()
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

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/ktuPenilaian', $kirim);
        $this->session->unset_userdata('a2031');
    }

    public function lihatKinerja($id = null)
    {
        $urisafe = strtr($id, '-_~', '+/=');
        $kinId = $this->encryption->decrypt($urisafe);

        // $empId = $this->session->userdata('emp_id');
        $dataBulan = array(
            '1' => "Januari",
            '2' => "Februari",
            '3' => "Maret",
            '4' => "April",
            '5' => "Mei",
            '6' => "Juni",
            '7' => "Juli",
            '8' => "Agustus",
            '9' => "September",
            '10' => "Oktober",
            '11' => "November",
            '12' => "Desember",
        );

        $score = array(
            '0' => "Kurang Baik",
            '1' => "Baik",
            '2' => "Sangat Baik"
        );

        $dataPegawai = $this->Mkinerja->get_tbl_pegawai_kinerja_byId($kinId);
        $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($dataPegawai[0]->emp_id_pimp);
        $listDataPegawai = $this->MPegawai->get_daftarPegawai_eachKTU($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id);

        // var_dump($listDataPegawai);
        $kirim['dataPegawai'] = $dataPegawai;
        $kirim['listPegawai'] = $listDataPegawai;
        $kirim['dataBulan'] = $dataBulan;
        $kirim['dataScore'] = $score;
        $kirim['kinId'] = $kinId;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/ktuEditKinerja', $kirim);

        $this->session->unset_userdata('a202');
        $this->session->unset_userdata('a203');
    }

    public function DaftarLaporanPegawai()
    {
        $empId = $this->session->userdata('emp_id');
        $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
        $dataPegawai = $this->MPegawai->get_daftarPegawai_byLaporan($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id);
        $kirim['dataPegawai'] = $dataPegawai;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/daftarLaporanPegawai', $kirim);
    }

    public function DaftarLaporanPegawaiDetail($id = null, $waktu)
    {
        $urisafe = strtr($id, '-_~', '+/=');
        $empId = $this->encryption->decrypt($urisafe);
        $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);

        // $headLap = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmp($empId);

        $time = strtotime($waktu);
        $bulan = date("m", $time);
        $tahun = date("Y", $time);

        $dataPegawai = $this->MPegawai->get_laporanPegawai($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id, $bulan, $tahun, $empId);
        $kirim['dataPegawai'] = $dataPegawai;


        if (empty($dataPegawai)) {
            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('admin/daftarLaporanPegawaiDetailnull', $kirim);
        } else {
            $this->load->view('admin/template/1header');
            $this->load->view('admin/template/2navbar');
            $this->load->view('admin/template/3sidebar');
            $this->load->view('admin/daftarLaporanPegawaiDetail', $kirim);
        }
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
        $this->load->view('admin/laporanPegawai', $kirim);
    }

    public function ktuInputKinerja()
    {
        $empId = $this->session->userdata('emp_id');
        $dataKTU = $this->Mdep->get_tbl_pegawai_departmentbyId($empId);
        $dataPegawai = $this->MPegawai->get_daftarPegawai_eachKTU($dataKTU[0]->department_id, $dataKTU[0]->sub_id, $dataKTU[0]->bagian_id);
        $kirim['dataPegawai'] = $dataPegawai;

        $this->load->view('admin/template/1header');
        $this->load->view('admin/template/2navbar');
        $this->load->view('admin/template/3sidebar');
        $this->load->view('admin/ktuInputKinerja', $kirim);

        $this->session->unset_userdata('a202');
        $this->session->unset_userdata('a203');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }

    public function serverDown()
    {
        $this->load->view('errors/404notreach');
    }

    // coba Start
    public function inboxLaporan2()
    {
        $isSend = $this->Mkinerja->get_tbl_pegawai_kinerja_bySend();
        $listEmp = "";
        foreach ($isSend as $key) {
            $listEmp .= $key->emp_id_pimp . ",";
        }

        $dataKtu = $this->MPegawai->get_tbl_pegawai_pimp_bykinerja_isSend(substr($listEmp, 0, -1));
        // $laporan = $this->MPegawai->get_laporanPegawai($dataDept[0]->department_id, $dataDept[0]->sub_id, $dataDept[0]->bagian_id, $bulan, $tahun);
        $kirim['dataKtu'] = $dataKtu;


        $this->load->view('admin/template/test/1testHeader');
        $this->load->view('admin/template/test/2testNavbar');
        // $this->load->view('admin/template/test/3testSidebar');
        $this->load->view('admin/inboxLaporan', $kirim);
    }

    public function cari_laporan_pegawaixx()
    {
        $dari = $this->input->post('dari_date');
        $sampai =  $this->input->post('sampai_date');

        // $dari = $thn . '-' . $bln . '-' . $tgl;
        // $sampai = $sThn . '-' . $sBln . '-' . $sTgl;

        $id = $this->session->userdata('emp_id');
        $dataUraianHeader = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmp($id);

        $dataku = array();
        foreach ($dataUraianHeader as $key) {
            array_push($dataku, $key->lap_header_id);
        }

        // var_dump($sampai);
        $this->session->set_userdata('lapsampai', $sampai);
        $this->session->set_userdata('lapdari', $dari);
        $this->session->set_userdata('in', $dataku);
        // $this->daftar_kegiatan_ajax($dataUraianDetail);
        echo json_encode($sampai);
    }

    public function ca()
    {
        $id = $this->session->userdata('emp_id');
        $dataUraianHeader = $this->Mlap->get_tbl_pegawai_laporan_header_byIdEmp($id);

        $data = "";
        foreach ($dataUraianHeader as $key) {
            $data .= "'$key->lap_header_id',";
        }
        $data = substr($data, 0, -1);

        $region = 'Asia/Bangkok';
        $dt = new DateTime("now", new DateTimeZone($region));
        $date = $dt->format('Y-m-d');
        $pecah_tgl = explode("-", $date);
        $thn = $pecah_tgl[0];
        $bln = $pecah_tgl[1];

        $totalBulan = $this->Mlap->get_tbl_pegawai_chartbyTanggal($data, $bln, $thn);
        // var_dump($totalBulan);
    }


    public function xx()
    {
        $dt = "2021/04/01";
        // $date = $dt->format('Y-m-d');
        $time = strtotime($dt);
        $newformat = date('Y-m-d', $time);
        echo $newformat;

        setlocale(LC_ALL, 'id-ID', 'id_ID');
        // echo strftime("%A, %d %B %Y");
        // Hasil: Selasa, 04 April 2020
        echo strftime("%A, %d %B %Y", strtotime($dt)) . "\n";
        // Hasil: Senin, 05 Oktober 2020

        // $this->load->view('admin/template/1header');
        // $this->load->view('admin/template/2navbar');
        // $this->load->view('admin/template/3sidebar');
        // $this->load->view('admin/contoh');
    }

    public function tr()
    {
        // $date = "2021-04-19";
        // $date = $date->format('Y-m-d H:i:s');

        $input = '2021-04-10';
        $tgl = strtotime($input);
        $tlg2 = date('Y-m-d', $tgl);
        // echo $tlg2;

        $idUser =  '189';
        $waktu =  $tlg2;

        $now = strtotime(date('Y-m-d H:i:s'));
        $thn = date("Y", $now);

        $time = strtotime($waktu);
        $tahun = date("Y", $time);
        $bulan = date("m", $time);

        $deptId = $this->Mdep->get_tbl_pegawai_departmentbyId($idUser);
        $ktuId = $this->MPegawai->get_ktu_ofpegawai($deptId[0]->department_id, $deptId[0]->sub_id, $deptId[0]->bagian_id);
        $isSend = $this->MPegawai->get_pegawaiPenilaian_byPeriode($ktuId[0]->emp_id, $bulan, $thn);

        // var_dump($isSend);

        // echo 'bij';
    }

    // public function cetak_uraianTugasbyTgl($data)
    // {
    //     $id = $this->session->userdata('emp_id');
    //     $dataUraianDetail = $this->Mlap->get_tbl_pegawai_laporan_detail_byWaktu($data);
    //     $dataP = $this->MPegawai->get_tbl_pegawai_Jabatan_byEmpId($id);
    //     $nama = $dataP[0]->nama_depan . " " . $dataP[0]->nama_belakang;
    //     $department = $this->Mdep->get_tbl_department_byId($dataP[0]->department_id);
    //     $jabatan = $dataP[0]->jabatan;
    //     $kirim['dataDetail'] = $dataUraianDetail;
    //     $kirim['nama'] = $nama;
    //     $kirim['department'] = $department[0]->nama;
    //     $kirim['jabatan'] = $jabatan;

    //     // var_dump($kirim);

    //     // $data['data'] = array(
    //     //     ['nim' => '123456789', 'name' => 'example name 1', 'jurusan' => 'Teknik Informatika'],
    //     //     ['nim' => '123456789', 'name' => 'example name 2', 'jurusan' => 'Jaringan']
    //     // );
    //     // $this->load->library('myDompdf');
    //     // $this->myDompdf->generate('Laporan/dompdf', $kirim, 'pdfLaporanUraianbyTgl', 'A4', 'landscape');
    //     // generate('Laporan/dompdf', $kirim, 'pdfLaporanUraianbyTgl', 'A4', 'landscape');

    //     $this->load->library('pdf');
    //     $this->pdf->generate('admin/pdfLaporanUraianbyTgl', $kirim, 'Laporan', 'A4', 'landscape');
    //     // $this->pdf->setPaper('A4', 'landscape');
    //     // $this->pdf->filename = "laporan-data-siswa.pdf";
    //     // $this->pdf->load_view('admin/pdfLaporanUraianbyTgl', $kirim);
    // }

    // public function lihat2($id)
    // {
    //     $data = $this->MPegawai->get_tbl_pegawai_foto_byId($id);

    //     header('Content-Type:' . $data[0]->tipe_foto);
    //     echo $data[0]->data;
    // }

    // public function addcreate()
    // {
    //     $data = $this->MPegawai->get_tbl_pegawai_foto_byId('13');
    //     $base64   = base64_encode($data[0]->foto);
    //     $kirim['data'] = $data;
    //     $kirim['foto'] = $base64;
    //     var_dump($data);
    //     // echo $data['foto_id'];
    //     $this->load->view('admin/upload', $kirim);
    // }

    // public function zip()
    // {
    //     // File path
    //     // $filepath1 = FCPATH . '/file/berkas/Doc1.pdf';
    //     // $filepath2 = FCPATH . '/file/berkas/32.jpg';
    //     // $data = $this->MPegawai->get_tbl_pegawai_foto_byId('14');
    //     // $base64   = base64_encode($data[0]->foto);
    //     // $imgdata = file_get_contents($base64);
    //     // var_dump($imgdata);
    //     // $result = $this->MPegawai->get_tbl_pegawai_foto_byId('13');
    //     $mysqli = new mysqli("localhost", "root", "", "hrku");
    //     $result = mysqli_query($mysqli, "SELECT * FROM tbl_pegawai_foto WHERE foto_id = '14'");
    //     var_dump($result);
    //     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    //         $filename = rand(1, 100) . '.txt';
    //         file_put_contents('./' . $filename, $row['foto']);
    //     }
    // }

    // public function uploadfoto()
    // {
    //     $berkas_kode = random_string('alnum', 20);

    //     $files_path = './files_sip/' . $berkas_kode . '/';
    //     if (!file_exists($files_path)) {
    //         mkdir($files_path, 0777, true);
    //     }

    //     $config['upload_path']          = './file/berkas/';
    //     $config['allowed_types']        = 'gif|jpg|png|pdf';
    //     $config['max_size']             = 5000;
    //     $config['max_width']            = 2024;
    //     $config['max_height']           = 1568;
    //     $this->load->library('upload', $config);
    //     $data['kode_berkas'] = $berkas_kode;

    //     if (!empty($_FILES['foto_pegawai']['name'])) {
    //         $ext = strtolower(pathinfo($_FILES['foto_pegawai']['name'], PATHINFO_EXTENSION));
    //         $_FILES['foto_pegawai']['name'] = "foto." . $ext;
    //         if ($this->upload->do_upload('foto_pegawai')) {
    //             $uploadData = $this->upload->data();
    //             $data['nama_foto'] = $uploadData['file_name'];
    //             $data['tipe_foto'] = $uploadData['file_ext'];
    //             $data['size_foto'] = $uploadData['file_size'];
    //             $data['url_foto'] = $uploadData['full_path'];
    //             // $this->upload->do_upload('foto_pegawai');
    //             // $data['keterangan_foto'] = $this->input->post('keterangan');
    //             // $data['tipe_foto'] = $this->upload->data('file_type');
    //             // $data['ukuran_foto'] = $this->upload->data('file_size');
    //             // $data['nama_foto'] =  $this->upload->data('file_name');                
    //         } else {
    //             $error = array('error' => $this->upload->display_errors());
    //             $this->load->view('admin/upload', $error);
    //         }
    //     }

    //     if (!empty($_FILES['foto_pegawai1']['name'])) {
    //         $ext = strtolower(pathinfo($_FILES['foto_pegawai1']['name'], PATHINFO_EXTENSION));
    //         $_FILES['foto_pegawai1']['name'] = "foto1." . $ext;
    //         if ($this->upload->do_upload('foto_pegawai1')) {
    //             $uploadData = $this->upload->data();
    //             $data['nama_ktp'] = $uploadData['file_name'];
    //             $data['tipe_ktp'] = $uploadData['file_ext'];
    //             $data['size_ktp'] = $uploadData['file_size'];
    //             $data['url_ktp'] = $uploadData['full_path'];
    //             // $this->upload->do_upload('foto_pegawai');
    //             // $data['keterangan_foto'] = $this->input->post('keterangan');
    //             // $data['tipe_foto'] = $this->upload->data('file_type');
    //             // $data['ukuran_foto'] = $this->upload->data('file_size');
    //             // $data['nama_foto'] =  $this->upload->data('file_name');

    //         } else {
    //             $error = array('error' => $this->upload->display_errors());
    //             $this->load->view('admin/upload', $error);
    //         }
    //     }

    //     if (!empty($_FILES['foto_pegawai2']['name'])) {
    //         $ext = strtolower(pathinfo($_FILES['foto_pegawai2']['name'], PATHINFO_EXTENSION));
    //         $_FILES['foto_pegawai2']['name'] = "foto2." . $ext;
    //         if ($this->upload->do_upload('foto_pegawai2')) {
    //             $uploadData = $this->upload->data();
    //             $data['nama_npwp'] = $uploadData['file_name'];
    //             $data['tipe_npwp'] = $uploadData['file_ext'];
    //             $data['size_npwp'] = $uploadData['file_size'];
    //             $data['url_npwp'] = $uploadData['full_path'];
    //             // $this->upload->do_upload('foto_pegawai');
    //             // $data['keterangan_foto'] = $this->input->post('keterangan');
    //             // $data['tipe_foto'] = $this->upload->data('file_type');
    //             // $data['ukuran_foto'] = $this->upload->data('file_size');
    //             // $data['nama_foto'] =  $this->upload->data('file_name');
    //         } else {
    //             $error = array('error' => $this->upload->display_errors());
    //             $this->load->view('admin/upload', $error);
    //         }
    //     }
    //     // if (!$this->upload->do_upload('foto_pegawai')) {
    //     //     $error = array('error' => $this->upload->display_errors());
    //     //     $this->load->view('admin/upload', $error);
    //     // } else {
    //     //     // $image_data = $this->upload->data();
    //     //     // $imgdata = file_get_contents($image_data['full_path']);
    //     //     $gambar = file_get_contents($_FILES['foto_pegawai']['data1']);
    //     //     $gambar1 = file_get_contents($_FILES['foto_pegawai1']['data2']);
    //     //     $gambar2 = file_get_contents($_FILES['foto_pegawai2']['data3']);

    //     //     // $file_encode = base64_encode($imgdata);
    //     //     // $file_encode2 = base64_decode($file_encode);
    //     //     $data['keterangan_foto'] = $this->input->post('keterangan');
    //     //     $data['tipe_foto'] = $this->upload->data('file_type');
    //     //     $data['ukuran_foto'] = $this->upload->data('file_size');
    //     //     $data['foto'] = $gambar;
    //     //     $data['nama_foto'] =  $this->upload->data('file_name');
    //     //     $this->db->insert('tbl_pegawai_foto', $data);
    //     //     // unlink($image_data['full_path']);
    //     //     var_dump($data);
    //     //     // var_dump($file_encode);
    //     //     // var_dump($file_encode2);
    //     //     // redirect('admin/addcreate');
    //     //     $this->load->view('admin/upload');
    //     // }
    //     var_dump($data);
    // }

    // public function lihat()
    // {
    //     $a = $this->MPegawai->getpdf();
    //     $data['berkas'] = $a;
    //     var_dump($a);
    //     $this->load->view('admin/lihat', $data);
    // }

    // public function cetak_laporan_pegawai()
    // {
    //     $dari = $this->session->userdata('lapdari');
    //     $sampai = $this->session->userdata('lapsampai');
    //     $data = $this->session->userdata('in');

    //     $id = $this->session->userdata('emp_id');
    //     $laporan = $this->Mlap->get_tbl_pegawai_laporan_detail_byJarakWaktu($dari, $sampai, $data);
    //     $dataP = $this->MPegawai->get_tbl_pegawai_Jabatan_byEmpId($id);
    //     $nama = $dataP[0]->nama_depan . " " . $dataP[0]->nama_belakang;
    //     $department = $this->Mdep->get_tbl_department_byId($dataP[0]->department_id);
    //     $jabatan = $dataP[0]->jabatan;

    //     $kirim['dataDetail'] = $laporan;
    //     $kirim['nama'] = $nama;
    //     $kirim['department'] = $department[0]->nama;
    //     $kirim['jabatan'] = $jabatan;

    //     // $this->load->library('pdf');
    //     $this->load->library('mpdf');
    //     $this->mpdf->generate('admin/pdfLaporanUraianbyTgl', $kirim, 'A4', 'landscape');

    //     // $this->pdf->loadView('admin/pdfLaporanUraianbyTgl', $kirim);
    //     // echo json_encode($laporan);

    //     // $this->load->view('admin/pdfLaporanUraianbyTgl', $kirim);
    // }
    // coba End


    // public function pegawaiIzinInput()
    // {
    //     $this->load->view('admin/template/1header');
    //     $this->load->view('admin/template/2navbar');
    //     $this->load->view('admin/template/3sidebar');
    //     $this->load->view('admin/izinInput');
    // }
    // public function pegawaiIzinEdit()
    // {
    //     $this->load->view('admin/template/1header');
    //     $this->load->view('admin/template/2navbar');
    //     $this->load->view('admin/template/3sidebar');
    //     $this->load->view('admin/izinEdit');
    // }
    // public function pegawaiIzinApprove()
    // {
    //     $this->load->view('admin/template/1header');
    //     $this->load->view('admin/template/2navbar');
    //     $this->load->view('admin/template/3sidebar');
    //     $this->load->view('admin/izinApprove');
    // }
    // public function pegawaiCutyInput()
    // {
    //     $this->load->view('admin/template/1header');
    //     $this->load->view('admin/template/2navbar');
    //     $this->load->view('admin/template/3sidebar');
    //     $this->load->view('admin/cutyInput');
    // }
    // public function pegawaiCutyEdit()
    // {
    //     $this->load->view('admin/template/1header');
    //     $this->load->view('admin/template/2navbar');
    //     $this->load->view('admin/template/3sidebar');
    //     $this->load->view('admin/cutyEdit');
    // }
    // public function pegawaiCutyApprove()
    // {
    //     $this->load->view('admin/template/1header');
    //     $this->load->view('admin/template/2navbar');
    //     $this->load->view('admin/template/3sidebar');
    //     $this->load->view('admin/cutyApprove');
    // }
}
