<?php
class Jabatan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //CREATE
    function insert_tbl_pegawai_jabatan($data)
    {
        $this->db->insert("tbl_pegawai_jabatan", $data);
        return $this->db->insert_id();
    }

    //READ
    // Data Department
    function get_tbl_pegawai_jabatan()
    {
        $this->db->where('is_active', 1);
        $value = $this->db->get('tbl_pegawai_jabatan')->result();
        return $value;
    }

    function get_tbl_pegawai_jabatan_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_jabatan where jabatan_id = '$id' LIMIT 1")->result();
        return $query;
    }

    function get_tbl_pegawai_jabatan_pegawai($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_jabatan where jabatan_id = '$id' LIMIT 1")->result();
        return $query;
    }

    function get_tbl_pegawai_jabatan_TU($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_jabatan where jabatan_id = '$id' LIMIT 1")->result();
        return $query;
    }


    //UPDATE
    function update_tbl_pegawai_jabatan($data, $id)
    {
        $this->db->where('jabatan_id', $id);
        $this->db->update('tbl_pegawai_jabatan', $data);
    }

    //DELETE
    function delete_tbl_pegawai_jabatan($id)
    {
        $this->db->where('jabatan_id', $id);
        $this->db->delete('tbl_pegawai_jabatan');
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
