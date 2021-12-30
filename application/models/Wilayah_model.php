<?php
class Wilayah_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //CREATE
    function insert_desa_kelurahan($data)
    {
        $this->db->insert("tbl_wil_desa", $data);
        return $this->db->insert_id();
    }
    function insert_kabupaten($data)
    {
        $this->db->insert("tbl_wil_kabupaten", $data);
        return $this->db->insert_id();
    }
    function insert_kecamatan($data)
    {
        $this->db->insert("tbl_wil_kecamatan", $data);
        return $this->db->insert_id();
    }
    function insert_provinsi($data)
    {
        $this->db->insert("tbl_wil_provinsi", $data);
        return $this->db->insert_id();
    }

    //READ
    // Kelurahan/Desa
    function get_desa_kelurahan()
    {
        $value = $this->db->get('tbl_wil_desa')->result();
        return $value;
    }
    function get_desa_kelurahan_byId($id = null)
    {
        $query = $this->db->query("SELECT * from tbl_wil_desa where desa_id = '$id' ")->result();
        return $query;
    }
    function get_desa_kelurahan_byKecamatanId($id)
    {
        $query = $this->db->query("SELECT * from tbl_wil_desa where kecamatan_id = '$id'")->result();
        return $query;
    }

    // Kabupaten
    function get_kabupaten()
    {
        $value = $this->db->get('tbl_wil_kabupaten')->result();
        return $value;
    }
    function get_kabupaten_byId($id = null)
    {
        $query = $this->db->query("SELECT * from tbl_wil_kabupaten where kabupaten_id = '$id'")->result();
        return $query;
    }
    function get_kabupaten_byProvinsiId($id)
    {
        $query = $this->db->query("SELECT * from tbl_wil_kabupaten where provinsi_id = '$id'")->result();
        return $query;
    }

    // Kecamatan
    function get_kecamatan()
    {
        $value = $this->db->get('tbl_wil_kecamatan')->result();
        return $value;
    }
    function get_kecamatan_byId($id = null)
    {
        $query = $this->db->query("SELECT * from tbl_wil_kecamatan where kecamatan_id = '$id' ")->result();
        return $query;
    }
    function get_kecamatan_byKabupatenId($id = null)
    {
        $query = $this->db->query("SELECT * from tbl_wil_kecamatan where kabupaten_id = '$id'")->result();
        return $query;
    }

    // Provinsi
    function get_provinsi()
    {
        $value = $this->db->get('tbl_wil_provinsi')->result();
        return $value;
    }
    function get_provinsi_byId($id = null)
    {
        $query = $this->db->query("SELECT * from tbl_wil_provinsi where provinsi_id = '$id' ")->result();
        return $query;
    }

    //UPDATE
    function update_desa_kelurahan($data, $id)
    {
        $this->db->where('desa_id', $id);
        $this->db->update('tbl_pegawai', $data);
    }
    function update_kabupaten($data, $id)
    {
        $this->db->where('kabupaten_id', $id);
        $this->db->update('tbl_wil_kabupaten', $data);
    }
    function update_kecamatan($data, $id)
    {
        $this->db->where('kecamatan_id', $id);
        $this->db->update('tbl_wil_kecamatan', $data);
    }
    function update_provinsi($data, $id)
    {
        $this->db->where('provinsi_id', $id);
        $this->db->update('tbl_wil_provinsi', $data);
    }


    function lastVisit($data, $id)
    {
        $this->db->where('emp_id', $id);
        $this->db->update('tbl_pegawai', $data);
    }

    //DELETE
    function delete_tbl_pegawai($id)
    {
        $this->db->where('emp_id', $id);
        $this->db->delete('tbl_pegawai');
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
