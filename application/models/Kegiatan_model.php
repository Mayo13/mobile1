<?php
class Kegiatan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //CREATE
    function insert_tbl_pegawai_kegiatan($data)
    {
        $this->db->insert("tbl_pegawai_kegiatan", $data);
        return $this->db->insert_id();
    }

    //READ
    // Data Department
    function get_tbl_pegawai_kegiatan()
    {
        $value = $this->db->get('tbl_pegawai_kegiatan')->result();
        return $value;
    }
    function get_tbl_pegawai_kegiatan_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_kegiatan where kegiatan_id = '$id' LIMIT 1")->result();
        return $query;
    }
    function get_tbl_pegawai_kegiatan_byJabatan($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_kegiatan where jabatan_id = '$id'")->result();
        return $query;
    }


    //UPDATE
    function update_tbl_pegawai_kegiatan($data, $id)
    {
        $this->db->where('kegiatan_id', $id);
        $this->db->update('tbl_pegawai_kegiatan', $data);
    }

    //DELETE
    function delete_tbl_pegawai_kegiatan($id)
    {
        $this->db->where('kegiatan_id', $id);
        $this->db->delete('tbl_pegawai_kegiatan');
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
