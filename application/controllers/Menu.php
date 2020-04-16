<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

 
		public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}


	public function index()
	{
		$data['title']= "Menu Management";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		
		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == FALSE) {	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer');
		}else{
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added.</div>');
			redirect('menu');
		}
	}


	public function submenu()
	{
		$data['title']= "Sub Menu Management";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['subMenu'] = $this->Menu_model->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();


		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		

		if ($this->form_validation->run()== FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		}else{
			$data = [
				'title' =>		$this->input->post('title'),
			 	'menu_id' =>	$this->input->post('menu_id'),
				'url' =>		$this->input->post('url'),
				'icon' =>		$this->input->post('icon'),
			 	'is_active' =>	$this->input->post('is_active')
			 	];
			 $this->db->insert('user_sub_menu', $data);
			 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu berhasil ditambahkan</div>');
			redirect('menu/submenu');
		}

		
	}

	public function hapussub($id)
	{$this->Menu_model->hapusDataSubMenu($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu berhasil dihapus</div>');
			redirect('menu/submenu');
	}


	public function hapus($id)
	{
		$this->Menu_model->hapusDataMenu($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil dihapus</div>');
			redirect('menu');
	}

	public function edit($id)
	{
		$data['title']= "Edit Menu";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = ['id' => $id];
		$data['menu'] = $this->Menu_model->edit_data($where, 'user_menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/edit', $data);
		$this->load->view('templates/footer');
	}

	public function editsub($id)
	{
		$data['title'] = "Edit Sub Menu";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = ['id' => $id];
		$data['menusub'] = $this->Menu_model->edit_data_sub($where, 'user_sub_menu')->result_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/editsub', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id   = $this->input->post('id');
		$menu = $this->input->post('menu');
		$data = ['menu' => $menu];
		$where = ['id' => $id];

		$this->Menu_model->update_data($where, $data, 'user_menu');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil diedit</div>');
			redirect('menu');
	}

	public function updatesub()
	{
		$id   = $this->input->post('id');
		$menuid = $this->input->post('menu_id');
		$title = $this->input->post('title');
		$url = $this->input->post('url');
		$icon = $this->input->post('icon');
		$is_active = $this->input->post('is_active');

		$data = ['menu_id' => $menuid,
				 'title' => $title,
				 'url' => $url,
				 'icon' => $icon,
				 'is_active' => $is_active
				];

		$where = ['id' => $id];

		$this->Menu_model->update_data($where, $data, 'user_sub_menu');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu berhasil diedit</div>');
			redirect('menu/submenu');
	}

}