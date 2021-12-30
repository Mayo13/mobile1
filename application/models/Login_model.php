<?php
class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //CREATE
    function insert_login($data)
    {
        $this->db->insert("tbl_pegawai_login", $data);
        return $this->db->insert_id();
    }
    //READ

    function get_is_menu($role_id, $url)
    {

        $this->db->select('menu_id');
        $this->db->from('tbl_user_menu');
        $this->db->where('url', $url);
        $sub_query = $this->db->get_compiled_select();

        $this->db->from('tbl_user_access_menu');
        $this->db->where('role_id', $role_id);
        $this->db->where("menu_id = ($sub_query)");
        $query = $this->db->get()->result();
        return $query;
    }

    function get_is_subMenu($role_id, $url)
    {
        $this->db->select('menu_sub_id');
        $this->db->from('tbl_user_menu_sub');
        $this->db->where('url', $url);
        $sub_query = $this->db->get_compiled_select();

        $this->db->from('tbl_user_access_menu');
        $this->db->where('role_id', $role_id);
        $this->db->where("sub_id = ($sub_query)");
        $query = $this->db->get()->result();
        return $query;
    }

    function get_rightFunRun($url)
    {
        $this->db->from('tbl_user_menu_sub');
        $this->db->where('url', $url);
        $query = $this->db->get()->result();
        return $query;
    }

    function get_login()
    {
        $value = $this->db->get('tbl_pegawai_login')->result();
        return $value;
    }
    function get_loginByEmail($username = null, $passwords = null)
    {
        // $value = $this->db->query("SELECT * from tbl_pegawai_login where username = '$username' and pass = '$password' LIMIT 1")->result();
        // return $value;
        $query = $this->db->query("SELECT * from tbl_pegawai_login where email = '$username' and pass = '$passwords' and is_active = '1' LIMIT 1");
        return $query;
    }
    function get_loginByPhone($username = null, $passwords = null)
    {
        // $value = $this->db->query("SELECT * from tbl_pegawai_login where username = '$username' and pass = '$password' LIMIT 1")->result();
        // return $value;
        $query = $this->db->query("SELECT * from tbl_pegawai_login where email = '$username' and pass = '$passwords' and is_active = '1' LIMIT 1");
        return $query;
    }

    function get_auth($username, $passwords)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_login where email = '$username' and passwords = '$passwords' and is_active = 1 LIMIT 1")->result();
        return $query;
    }

    function get_loginByPass($emp_id, $passwords)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_login where emp_id = '$emp_id' and passwords = '$passwords' and is_active = 1 LIMIT 1")->result();
        return $query;
    }

    function get_loginById($emp_login_id)
    {
        $this->db->where('emp_login_id', $emp_login_id);
        $this->db->where('is_active', '1');
        $value = $this->db->get('tbl_pegawai_login')->result();
        return $value;
    }

    function get_loginByPegawaiId($emp_id)
    {
        $this->db->where('emp_id', $emp_id);
        $this->db->where('is_active', '1');
        $value = $this->db->get('tbl_pegawai_login')->result();
        return $value;
    }

    //UPDATE
    function update_login_withReturn($data, $id)
    {
        $this->db->where('emp_login_id', $id);
        $this->db->update('tbl_pegawai_login', $data);
        return 200;
    }

    function update_login($data, $id)
    {
        $this->db->where('emp_login_id', $id);
        $this->db->update('tbl_pegawai_login', $data);
        return 200;
    }

    function update_loginbyEmp_id($data, $id)
    {
        $this->db->where('emp_id', $id);
        $this->db->update('tbl_pegawai_login', $data);
        return 200;
    }

    function lastVisit($data, $id)
    {
        $this->db->where('emp_login_id', $id);
        $this->db->update('tbl_pegawai_login', $data);
    }

    //DELETE
    function delete_login($id)
    {
        $this->db->where('emp_login_id', $id);
        $this->db->delete('tbl_pegawai_login');
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
