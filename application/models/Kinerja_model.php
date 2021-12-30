<?php
class Kinerja_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //CREATE
    function insert_tbl_pegawai_kinerja($data)
    {
        $this->db->insert("tbl_pegawai_kinerja", $data);
        return $this->db->insert_id();
    }

    //READ
    // Data Department

    function get_tbl_penilaian_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_penilaian where nilai = '$id'")->result();
        return $query;
    }

    function get_tbl_penilaian_ifExsist($idPimp, $idEmp, $periode)
    {
        $query = $this->db->query("SELECT * FROM tbl_pegawai_kinerja WHERE emp_id_pimp = '$idPimp' AND emp_id = '$idEmp' AND periode = '$periode'")->result();
        return $query;
    }

    function get_tbl_pegawai_kinerja()
    {
        $value = $this->db->get('tbl_pegawai_kinerja')->result();
        return $value;
    }

    function get_tbl_pegawai_kinerja_historyadmin($periode)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_kinerja where periode = '$periode'")->result();
        return $query;
    }

    function get_tbl_pegawai_kinerja_bySend()
    {
        $this->db->from('tbl_pegawai_kinerja');
        $this->db->where('is_send', 1);
        $query = $this->db->get()->result();
        return $query;
    }

    function get_tbl_pegawai_kinerja_bySendKtu($id)
    {
        $this->db->from('tbl_pegawai_kinerja');
        $this->db->where('is_send', 1);
        $this->db->where('emp_id_pimp', $id);
        $query = $this->db->get()->result();
        return $query;
    }

    function get_tbl_pegawai_kinerja_byMonth($bln, $year, $idemp)
    {
        $this->db->from('tbl_pegawai_kinerja');
        $this->db->where('emp_id', $idemp);
        $this->db->where('periode', $bln);
        $this->db->where("YEAR(created_date)", $year);

        $query = $this->db->get()->result();
        return $query;
    }

    function get_tbl_pegawai_countBulanIni($bulan, $tahun)
    {
        $query = $this->db->query(
            "SELECT COUNT(kinerja_id) as total FROM `tbl_pegawai_kinerja` AS k
            WHERE
            k.periode = '$bulan' AND YEAR(k.`created_date`) = '$tahun'"
        )->result();
        return $query;
    }

    // function get_tbl_pegawai_kinerja_byMonthPimp($bln, $idpimp)
    // {
    //     $this->db->from('tbl_pegawai_kinerja');
    //     $this->db->where('emp_id_pimp', $idpimp);
    //     $this->db->where('periode', $bln);
    //     $query = $this->db->get()->result();
    //     return $query;
    // }

    public function get_admin_penilaianUser($periode, $tahun)
    {
        $query = $this->db->query(
            "SELECT p.`nama_depan`, p.`nama_belakang`, k.kinerja_id,
            TRIM('-01' FROM k.`periode`) AS periode, k.`penilaian`, k.`kinerja`, k.`disiplin`, k.`kerja_sama`, k.`keterangan`
            FROM `tbl_pegawai` AS p
           
           LEFT OUTER JOIN `tbl_pegawai_kinerja` AS k
           ON p.`emp_id` = k.`emp_id`
           AND k.periode = '$periode' AND YEAR(k.`created_date`) = '$tahun'
           
           JOIN `tbl_pegawai_login` AS l
           ON p.`emp_id` = l.`emp_id` and l.`role_id`= 4

           WHERE is_active = 1
           "
        )->result();
        return $query;
    }

    public function get_admin_penilaianUserKabag($periode, $tahun)
    {
        $query = $this->db->query(
            "SELECT p.`nama_depan`, p.`nama_belakang`, k.kinerja_id,
            TRIM('-01' FROM k.`periode`) AS periode, k.`penilaian`, k.`kinerja`, k.`disiplin`, k.`kerja_sama`, k.`keterangan`, k.`created_date`
            FROM `tbl_pegawai` AS p  

           LEFT OUTER JOIN `tbl_pegawai_kinerja` AS k
           ON p.`emp_id` = k.`emp_id`
           AND k.periode = '$periode' AND YEAR(k.`created_date`) = '$tahun'          
           
           JOIN `tbl_pegawai_login` AS l
           ON p.`emp_id` = l.`emp_id` AND l.`role_id`= 4           
           WHERE is_active = 1   
           GROUP BY p.`nama_depan`, p.`nama_belakang`                                  
           "
        )->result();
        return $query;
    }

    function get_checK_Kinerja_isOn($pimp_id, $emp_id)
    {
        $query = $this->db->query(
            "SELECT * FROM `tbl_pegawai_kinerja` WHERE `emp_id_pimp` = '$pimp_id' AND `emp_id`= '$emp_id'
            "
        )->result();
        return $query;
    }

    function get_totalPenilaian_Bulanini($year, $month, $empid)
    {
        $query = $this->db->query("SELECT COUNT(`kinerja_id`) as total FROM tbl_pegawai_kinerja WHERE emp_id_pimp = '$empid' AND periode = '$month' AND YEAR(created_date) = '$year'")->result();
        return $query;
    }

    function get_tbl_pegawai_kinerja_bythisMounth($year, $month, $empid)
    {
        $query = $this->db->query("SELECT COUNT(`kinerja_id`) as total FROM tbl_pegawai_kinerja WHERE emp_id IN($empid) AND MONTH(created_date) = $month AND YEAR(created_date) = $year")->result();
        return $query;
    }

    function get_tbl_pegawai_kinerja_byTotal($empid)
    {
        $query = $this->db->query("SELECT COUNT(`kinerja_id`) as total FROM tbl_pegawai_kinerja WHERE emp_id IN($empid)")->result();
        return $query;
    }

    function get_tbl_pegawai_kinerja_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_kinerja where kinerja_id = '$id'")->result();
        return $query;
    }

    function daftar_laporankinerja_ktu($id)
    {
        $query = $this->db->query("SELECT CASE periode
        WHEN 1 THEN 'Januari'
        WHEN 2 THEN 'Februari'
        WHEN 3 THEN 'Maret'
        WHEN 4 THEN 'April'
        WHEN 5 THEN 'Mei'
        WHEN 6 THEN 'Juni'
        WHEN 7 THEN 'July'
        WHEN 8 THEN 'Agustus'
        WHEN 9 THEN 'September'
        WHEN 10 THEN 'Oktober'
        WHEN 11 THEN 'November'
        WHEN 12 THEN 'Desember'
        END AS periode, p.nama_depan, p.nama_belakang, j.nama AS jabatan, k.penilaian, k.created_date,  p.nik_pegawai, p.emp_id, k.is_send, k.kinerja_id, k.keterangan
        FROM `tbl_pegawai` AS p
          JOIN `tbl_pegawai_kinerja` AS k
            ON p.`emp_id` = k.`emp_id`
          JOIN `tbl_pegawai_jabatan` AS j
            ON j.`jabatan_id` = p.`jabatan_id`
            WHERE p.emp_id IN ($id)
            ORDER BY SUBSTRING(periode, 1, 1) desc
            ")->result();
        return $query;
    }



    function get_tbl_pegawai_kinerja_byJabatan($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_kinerja where jabatan_id = '$id'")->result();
        return $query;
    }


    //UPDATE
    function update_tbl_pegawai_kinerja($data, $id)
    {
        $this->db->where('kinerja_id', $id);
        $this->db->update('tbl_pegawai_kinerja', $data);
    }

    function update_tbl_pegawai_kinerja_isSendIN($data, $id)
    {
        $query = $this->db->query(
            "UPDATE `tbl_pegawai_kinerja`
          SET            
            `is_send` = '$data',            
          WHERE `kinerja_id` IN($id);
          
            "
        )->result();
        return $query;
    }

    //DELETE
    function delete_tbl_pegawai_kinerja($id)
    {
        $this->db->where('kinerja_id', $id);
        $this->db->delete('tbl_pegawai_kinerja');
    }

    function Custom_Query()
    {
        $value = $this->db->query("SELECT * from `table` where 1")->result();
        return $value;
    }
    function CQ_update_Row_config()
    {
        $query = "UPDATE config SET is_active = 0";
        $this->db->query($query);
    }
}
