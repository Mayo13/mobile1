<?php
class Department_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //CREATE
    function insert_tbl_department($data)
    {
        $this->db->insert("tbl_department", $data);
        return $this->db->insert_id();
    }

    //READ
    // Data Department
    function get_tbl_department()
    {
        // $this->db->where('is_active', 1);
        $value = $this->db->get('tbl_department')->result();
        return $value;
    }

    function get_tbl_Subdepartment()
    {
        $value = $this->db->get('tbl_department_sub')->result();
        return $value;
    }

    function get_tbl_Bagdepartment()
    {
        $value = $this->db->get('tbl_department_sub_bagian')->result();
        return $value;
    }


    function get_tbl_pegawai_departmentbyId($id)
    {
        $this->db->where('emp_id', $id);
        $value = $this->db->get('tbl_pegawai_department')->result();
        return $value;
    }

    function get_tbl_department_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_department where department_id = '$id'")->result();
        return $query;
    }

    function get_tbl_subDepartment_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_department_sub where sub_id = '$id'")->result();
        return $query;
    }

    function get_tbl_bagDepartment_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_department_sub_bagian where bagian_id = '$id'")->result();
        return $query;
    }

    function get_tbl_subDepartment_byIdDep($id)
    {
        $query = $this->db->query("SELECT * from tbl_department_sub where dept_id = '$id'")->result();
        return $query;
    }

    function get_tbl_bagianDepartment_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_department_sub_bagian where sub_id = '$id'")->result();
        return $query;
    }

    function get_tbl_pegDep_byEmpId($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_department where emp_id = '$id'")->result();
        return $query;
    }

    function get_tbl_location_sortByDSB($dep, $sub, $bag)
    {
        $query = "";

        if ($dep !== '1') {
            $query = $this->db->query("SELECT * from tbl_department_sub where sub_id = '$sub'")->result();
        } else {
            $query = $this->db->query("SELECT * from tbl_department_sub_bagian where bagian_id = '$bag'")->result();
        }

        return $query;
    }



    //UPDATE
    function update_tbl_department($data, $id)
    {
        $this->db->where('department_id', $id);
        $this->db->update('tbl_department', $data);
    }

    function update_tbl_pegawaidep($data, $id)
    {
        $this->db->where('pegawaidept_id', $id);
        $this->db->update('tbl_pegawai_department', $data);
    }

    //DELETE
    function delete_tbl_department($id)
    {
        $this->db->where('department_id', $id);
        $this->db->delete('tbl_department');
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
