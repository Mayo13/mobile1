<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function is_logged_in()
{
	$ci = get_instance();
	// if there is no session
	if (!$ci->session->userdata('email')) {
		redirect('auth');
	} else {
		$role_id = $ci->session->userdata('role_id');

		// get the controller/menu
		$menu = $ci->uri->segment(1);

		// QUERY menu
		$queryMenu = $ci->db->get_where('tbl_user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];

		// query user access
		$userAccess = $ci->db->get_where('tbl_user_menu', [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		]);

		if ($userAccess->num_rows() < 1) {
			redirect('auth/blocked');
		}
	}
}

if (!function_exists('xml_dom')) {
	function is_logged_ins()
	{
		$ci = get_instance();
		echo $ci->session->userdata('username');
		if (empty($ci->session->userdata('username'))) {
			$ci->load->view('admin/login');
		} else {
			$menu1 = $ci->uri->segment(1);
			$menu2 = $ci->uri->segment(2);
			$validasi = 'index.php/' . $menu1 . '/' . $menu2;
			echo $validasi;

			$role_id = $ci->session->userdata('role_id');
			$valid = $ci->User_login_model->get_right_access($role_id, $validasi);
			echo $valid;
			if ($valid->num_rows() < 1) {
				$ci->load->view('admin/login');
			}
		}
	}
}

function message($message, $class, $url = null)
{
	$ci = get_instance();

	if (!is_null($url)) {
		$ci->session->set_flashdata('message', '<div class="alert alert-' . $class . '" role="alert">
			' . $message . '
		</div>');
		redirect($url);
	} else {
		$ci->session->set_flashdata('message', '<div class="alert alert-' . $class . '" role="alert">
			' . $message . '
		</div>');
	}
}

function check_access($role_id, $menu_id)
{
	$ci = get_instance();

	$result = $ci->db->get_where('tbl_user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id])->num_rows();
	if ($result > 0) return "checked";
}
