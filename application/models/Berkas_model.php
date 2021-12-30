<?php
class Berkas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //CREATE
    function insert_tbl_pegawai_berkas($data)
    {
        $this->db->insert("tbl_pegawai_berkas", $data);
        return $this->db->insert_id();
    }

    //READ
    // Data Department
    function get_tbl_pegawai_berkas()
    {
        $value = $this->db->get('tbl_pegawai_berkas')->result();
        return $value;
    }

    function get_tbl_pegawai_berkas_byKode($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_berkas where berkas_kode = '$id' LIMIT 1")->result();
        return $query;
    }

    //UPDATE
    function update_tbl_pegawai_berkas($data, $id)
    {
        $this->db->where('berkas_id', $id);
        $this->db->update('tbl_pegawai_berkas', $data);
    }

    //DELETE
    function delete_tbl_pegawai_berkas($id)
    {
        $this->db->where('berkas_id', $id);
        $this->db->delete('tbl_pegawai_berkas');
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
