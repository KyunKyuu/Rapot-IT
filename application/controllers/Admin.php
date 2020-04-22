<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index()
	{	
		$data['title']= "Dashboard";
		$data['user'] = $this->user_model->ambil_data($this->session->userdata['email']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	} 

	public function role()
	{
		$data['title']= "Role";
		$data['user'] = $this->user_model->ambil_data($this->session->userdata['email']);
		$data['role'] = $this->db->get('user_role')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}

	public function roleAccess($role_id)
	{
		$data['title']= "Role Access";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=',1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role_access', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
				'role_id' => $role_id,
				'menu_id' => $menu_id
				];
		$result = $this->db->get_where('user_access_menu', $data);
		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Change.</div>');
		redirect('admin/role');
	}

	public function data()
	{
		$data['title']= "Edit Data";
		$data['user'] = $this->user_model->ambil_data($this->session->userdata['email']);
		$data['role'] = $this->db->get('user_role')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('templates/footer');
	}

	public function tabeldata($role_id)
	{
		$data['title']= "Data Profile";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		$data['profile'] = $this->db->get_where('user', ['role_id' => $role_id])->result_array();	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/tabelprofile', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title']= "Detail Profile";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $id])->result_array();
		$data['data'] = $this->db->get_where('user', ['id' => $id])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/detail', $data);
		$this->load->view('templates/footer');
	}

	public function hapus($id)
	{
		$this->db->delete('user', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus.</div>');
			redirect('admin/data');
	}

	

}