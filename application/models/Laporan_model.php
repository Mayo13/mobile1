<?php
class Laporan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //CREATE
    function insert_tbl_pegawai_laporan_header($data)
    {
        $this->db->insert("tbl_pegawai_laporan_header", $data);
        return $this->db->insert_id();
    }

    function insert_tbl_pegawai_laporan_detail($data)
    {
        $this->db->insert("tbl_pegawai_laporan_detail", $data);
        return $this->db->insert_id();
    }

    //READ
    // Data Laporan
    function get_tbl_pegawai_laporan_header()
    {
        $value = $this->db->get('tbl_pegawai_laporan_header')->result();
        return $value;
    }

    function get_tbl_pegawai_laporan_header_byIdEmp($id)
    {
        $this->db->where('emp_id', $id);
        $value = $this->db->get('tbl_pegawai_laporan_header')->result();
        return $value;
    }

    function get_tbl_pegawai_laporan_header_byIdEmpNowDate($id, $date)
    {
        $this->db->where('emp_id', $id);
        $this->db->where('waktu', $date);
        $this->db->order_by('waktu', 'DESC');
        $value = $this->db->get('tbl_pegawai_laporan_header')->result();
        return $value;
    }

    function get_daftar_header_byperiode($id)
    {
        // $query = $this->db->query("SELECT *
        // FROM `tbl_pegawai_laporan_header`        
        // WHERE emp_id = $id
        // GROUP BY MONTH(waktu)")->result();
        // return $query;

        $query = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, lh.`waktu`, lh.`lap_header_id`,lh.`is_ktu_checked`,lh.`is_ktu_send`,lh.`created_date`
        FROM `tbl_pegawai_laporan_header` AS lh
        JOIN `tbl_pegawai` AS p
        ON lh.emp_id = p.`emp_id`     
        WHERE lh.emp_id = $id AND lh.is_ktu_send = 1
        GROUP BY MONTH(waktu)")->result();
        return $query;
    }

    function get_tbl_pegawai_laporan_header_byDate()
    {
        $query = $this->db->query("SELECT DISTINCT(waktu) FROM tbl_pegawai_laporan_header")->result();
        return $query;
    }

    function get_tbl_pegawai_laporan_detail_byTanggal($th, $bln, $tgl)
    {
        $query = $this->db->query("SELECT * FROM `tbl_pegawai_laporan_detail`
        WHERE MONTH(waktu) = $bln AND YEAR(waktu) = $th AND DAY(waktu) = $tgl")->result();
        return $query;
    }

    function get_tbl_pegawai_laporan_detail_byWaktu($wk)
    {
        $query = $this->db->query("SELECT * FROM `tbl_pegawai_laporan_detail` WHERE waktu = '$wk'")->result();
        return $query;
    }

    function get_tbl_pegawai_laporan_detail_byJarakWaktu($dari, $sampai, $data)
    {
        $this->db->select('t1.waktu, t1.dari, t1.sampai, t2.nama, t1.pelaksanaan_kegiatan, t1.keterangan, t1.surat_dikerjakan, t1.lap_detail_id');
        $this->db->from('tbl_pegawai_laporan_detail as t1');
        $this->db->where_in('lap_header_id', $data);
        $this->db->where('waktu >=', $dari);
        $this->db->where('waktu <=', $sampai);
        $this->db->join('tbl_pegawai_kegiatan as t2', 't1.kegiatan_id = t2.kegiatan_id', 'LEFT');
        $this->db->order_by('t1.waktu');
        $this->db->order_by('t1.dari');
        return $this->db->get()->result();
    }


    function get_tbl_pegawai_laporan_detail_byJarakWaktuKTU($data, $bulan, $tahun)
    {
        $query = $this->db->query("SELECT t1.waktu, t1.dari, t1.sampai, t2.nama, t1.pelaksanaan_kegiatan, t1.keterangan, t1.surat_dikerjakan
        FROM `tbl_pegawai_laporan_detail` AS t1
        JOIN `tbl_pegawai_kegiatan` AS t2
        ON t1.kegiatan_id = t2.kegiatan_id
        WHERE lap_header_id IN ($data) AND MONTH(t1.waktu) = $bulan AND YEAR(t1.waktu) = $tahun")->result();
        return $query;
    }

    function get_tbl_pegawai_laporan_detail_byThisMonth($data, $bulan)
    {
        $this->db->where_in('lap_header_id', $data);
        $this->db->where("MONTH(waktu)", $bulan);
        // $this->db->where("YEAR(waktu)", $tahun);
        return $this->db->get('tbl_pegawai_laporan_detail')->num_rows();
    }

    function get_tbl_pegawai_laporan_detail_byThisYear($data, $tahun)
    {
        $this->db->where_in('lap_header_id', $data);
        // $this->db->where("MONTH(waktu)", $bulan);
        $this->db->where("YEAR(waktu)", $tahun);
        return $this->db->get('tbl_pegawai_laporan_detail')->num_rows();
    }

    function get_tbl_pegawai_chartbyTanggal($data, $bulan, $tahun)
    {
        $query = $this->db->query("SELECT DAY(waktu) AS tanggal, COUNT(*) AS jumlah
        FROM tbl_pegawai_laporan_detail
        WHERE lap_header_id IN ($data) AND MONTH(waktu) = '$bulan' AND YEAR(waktu) = '$tahun'
        GROUP BY DAY(waktu)")->result();
        return $query;
    }

    function get_tbl_pegawai_laporan_header_byOneEmp($emp_id, $bulan, $tahun)
    {
        $query = $this->db->query("SELECT *
        FROM `tbl_pegawai_laporan_header`
        WHERE emp_id = '$emp_id' AND MONTH(waktu)= '$bulan' AND YEAR(waktu)= '$tahun'")->result();
        return $query;
    }

    function get_tbl_pegawai_chartbyBulan($data, $tahun)
    {
        $query = $this->db->query("SELECT MONTH(waktu) AS bulan, COUNT(*) AS jumlah
        FROM tbl_pegawai_laporan_detail
        WHERE lap_header_id IN ($data) AND YEAR(waktu) = '$tahun'
        GROUP BY MONTH(waktu)")->result();
        return $query;
    }

    function get_tbl_pegawai_laporan_header_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_laporan_header where lap_header_id = '$id' LIMIT 1")->result();
        return $query;
    }

    function get_tbl_pegawai_laporan_detail_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_laporan_detail where lap_detail_id = '$id' LIMIT 1")->result();
        return $query;
    }

    function get_tbl_pegawai_laporan_header_byJabatan($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_laporan_header where jabatan_id = $id")->result();
        return $query;
    }


    function get_kegiatan_pegawaiThisMonth($dataIN, $bulan, $tahun)
    {
        $value = $this->db->query("SELECT * FROM `tbl_pegawai_laporan_detail`
        WHERE `lap_header_id` IN ($dataIN) AND MONTH(waktu) = '$bulan' AND YEAR(waktu) = '$tahun'")->result();
        return $value;
    }


    //UPDATE
    function update_tbl_pegawai_laporan_header($data, $id)
    {
        $this->db->where('lap_header_id', $id);
        $this->db->update('tbl_pegawai_laporan_header', $data);
    }

    function update_tbl_pegawai_laporan_header_byListId($data, $listId)
    {
        $this->db->where_in('lap_header_id', $listId);
        if ($this->db->update('tbl_pegawai_laporan_header', $data)) {
            return true;
        } else {
            return $this->db->_error_message();
        }
    }

    function update_tbl_pegawai_laporan_detail($data, $id)
    {
        $this->db->where('lap_detail_id', $id);
        $this->db->update('tbl_pegawai_laporan_detail', $data);
    }

    //DELETE
    function delete_tbl_pegawai_laporan_header($id)
    {
        $this->db->where('lap_header_id', $id);
        $this->db->delete('tbl_pegawai_laporan_header');
    }

    function delete_tbl_pegawai_laporan_detail($id)
    {
        $this->db->where('lap_detail_id', $id);
        $this->db->delete('tbl_pegawai_laporan_detail');
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
