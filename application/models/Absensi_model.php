<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Absensi_model extends CI_Model
{
    // public function get_absenx($id_user, $bulan, $tahun)
    // {
    //     $this->db->select("DATE_FORMAT(a.tgl, '%d-%m-%Y') AS tgl, a.waktu AS jam_masuk, (SELECT waktu FROM tbl_absen al WHERE al.tgl = a.tgl AND emp_id = $id_user AND al.keterangan != a.keterangan) AS jam_pulang");
    //     $this->db->where('emp_id', $id_user);
    //     $this->db->where("DATE_FORMAT(tgl, '%m') = ", $bulan);
    //     $this->db->where("DATE_FORMAT(tgl, '%Y') = ", $tahun);
    //     $this->db->group_by("tgl");
    //     $result = $this->db->get('tbl_absen a');
    //     return $result->result_array();
    // }

    public function get_absen($id_user, $bulan, $tahun)
    {
        $this->db->select("DATE_FORMAT(a.tgl, '%d-%m-%Y') AS tgl, a.waktu_datang AS jam_datang, a.waktu_pulang AS jam_pulang");
        $this->db->where('emp_id', $id_user);
        $this->db->where("DATE_FORMAT(tgl, '%m') = ", $bulan);
        $this->db->where("DATE_FORMAT(tgl, '%Y') = ", $tahun);
        $this->db->group_by("tgl");
        $result = $this->db->get('tbl_absen a');
        return $result->result_array();
    }

    public function get_absenPDF($id_user, $bulan, $tahun)
    {
        $this->db->select("DATE_FORMAT(a.tgl, '%d-%m-%Y') AS tgl, a.waktu_datang AS jam_datang, a.waktu_pulang AS jam_pulang, a.terlambat");
        $this->db->where('emp_id', $id_user);
        $this->db->where("DATE_FORMAT(tgl, '%m') = ", $bulan);
        $this->db->where("DATE_FORMAT(tgl, '%Y') = ", $tahun);
        $this->db->group_by("tgl");
        $result = $this->db->get('tbl_absen a');
        return $result->result_array();
    }

    public function absen_harian_user($id_user)
    {
        $today = date('Y-m-d');
        $this->db->where('tgl', $today);
        $this->db->where('emp_id', $id_user);
        $data = $this->db->get('tbl_absen');
        return $data;
    }

    public function absen_harianRow($id_user)
    {
        $today = date('Y-m-d');
        $this->db->where('tgl', $today);
        $this->db->where('emp_id', $id_user);
        $data = $this->db->get('tbl_absen')->result();
        return $data;
    }

    public function shift_absen($hari)
    {
        $this->db->where('hari', $hari);
        $data = $this->db->get('tbl_absen_waktu')->result();
        return $data;
    }


    public function absen_user_byMasuk_Pulang($id_user)
    {
        $today = date('Y-m-d');
        $this->db->where('tgl', $today);
        $this->db->where('emp_id', $id_user);
        $data = $this->db->get('tbl_absen')->result();
        return $data;
    }

    public function insert_data($data)
    {
        $this->db->insert("tbl_absens", $data);
        return $this->db->insert_id();
    }

    public function insert_data_absen($data)
    {
        $tgl = $data['tgl'];
        $waktu = $data['waktu_datang'];
        $telat = $data['terlambat'];
        $emp = $data['emp_id'];
        $sql = "insert into tbl_absen(tgl, waktu_datang,terlambat, on_time ,emp_id)
        values ('$tgl','$waktu',$telat,'1',$emp)";
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function get_jam_by_time($time)
    {
        $this->db->where('start', $time, '<=');
        $this->db->or_where('finish', $time, '>=');
        $data = $this->db->get('tbl_absen_waktu');
        return $data->row();
    }


    public function get_all()
    {
        $result = $this->db->get('tbl_absen_waktu');
        return $result->result();
    }

    public function find($id)
    {
        $this->db->where('absen_id', $id);
        $result = $this->db->get('tbl_absen_waktu');
        return $result->row();
    }

    public function update_data($id, $data)
    {
        $this->db->where('absen_id', $id);
        $result = $this->db->update('tbl_absen', $data);
        return $result;
    }
}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\models\Absensi_model.php */