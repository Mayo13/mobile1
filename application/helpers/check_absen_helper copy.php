<?php
defined('BASEPATH') or die('No direct script access allowed!');

function check_absen_harian()
{
    $CI = &get_instance();
    $id_user = $CI->session->id_user;
    $CI->load->model('Absensi_model', 'absensi');
    $absen_user = $CI->absensi->absen_harian_user($id_user)->num_rows();
    if (!is_weekend()) {
        if ($absen_user < 2) {
            $CI->session->set_userdata('absen_warning', 'true');
        } else {
            $CI->session->set_userdata('absen_warning', 'false');
        }
    }
}

function check_jam($jam, $status, $raw = false)
{
    // var_dump($jam);
    if ($jam) {
        $status = ucfirst($status);
        $CI = &get_instance();
        $CI->load->model('Absensi_model', 'jam');
        $jam_kerja = $CI->jam->db->where('keterangan', $status)->get('tbl_absen_waktu')->row();
        // $jam_kerja2 = $CI->jam->absen_harian_user($status);
        // var_dump($jam);
        // $tgl = date('d-m-Y');
        // return in_array(date('l', strtotime($tgl)), ['Sunday']);
        if (is_friday()) {
            if ($status == 'Masuk' && $jam >= $jam_kerja->finish) {
                if ($raw) {
                    return [
                        'status' => 'telat',
                        'text' => $jam
                    ];
                } else {
                    return '<span class="badge badge-danger">' . $jam . '</span>';
                }
            } elseif ($status == 'Masuk' && $jam <= $jam_kerja->finish) {
                if ($raw) {
                    return [
                        'status' => 'aman',
                        'text' => $jam
                    ];
                } else {
                    return '<span class="badge badge-primary">' . $jam . '</span>';
                }
            } elseif ($status == 'pulang' && ($jam >= $jam_kerja->start) && ($jam <= $jam_kerja->finish)) {
                if ($raw) {
                    return [
                        'status' => 'aman',
                        'text' => $jam
                    ];
                } else {
                    return '<span class="badge badge-primary">' . $jam . '</span>';
                }
            } elseif ($status == 'pulang' && $jam <= $jam_kerja->start && $jam <= $jam_kerja->finish) {
                if ($raw) {
                    return [
                        'status' => 'pas',
                        'text' => $jam
                    ];
                } else {
                    return '<span class="badge badge-danger">' . $jam . '</span>';
                }
            } elseif ($status == 'pulang' && $jam <= $jam_kerja->start && $jam >= $jam_kerja->finish) {
                if ($raw) {
                    return [
                        'status' => 'pas',
                        'text' => $jam
                    ];
                } else {
                    return '<span class="badge badge-danger">' . $jam . '</span>';
                }
            } else {
                if ($raw) {
                    return [
                        'status' => 'normal',
                        'text' => $jam
                    ];
                } else {
                    return '<span class="badge badge-danger">' . $jam . '</span>';
                }
            }
        } else {
            if ($status == 'Masuk' && $jam >= $jam_kerja->finish) {
                if ($raw) {
                    return [
                        'status' => 'telat',
                        'text' => $jam
                    ];
                } else {
                    return '<span class="badge badge-danger">' . $jam . '</span>';
                }
            } else {
                if ($raw) {
                    return [
                        'status' => 'normal',
                        'text' => $jam
                    ];
                } else {
                    return '<span class="badge badge-danger">' . $jam . '</span>';
                }
            }
        }
    } else {
        if ($raw) {
            return [
                'status' => 'normal',
                'text' => 'Tidak Absen'
            ];
        }
        return 'Tidak Absen';
    }
}

function is_weekend($tgl = false)
{
    date_default_timezone_set('Asia/Jakarta');
    $tgl = @$tgl ? $tgl : date('d-m-Y');
    return in_array(date('l', strtotime($tgl)), ['Saturday', 'Sunday']);
}

function is_friday($tgl = false)
{
    date_default_timezone_set('Asia/Jakarta');
    $tgl = @$tgl ? $tgl : date('d-m-Y');
    return in_array(date('l', strtotime($tgl)), ['Friday']);
}
/* End of File: d:\Ampps\www\project\absen-pegawai\application\helpers\check_absen_helper.php */