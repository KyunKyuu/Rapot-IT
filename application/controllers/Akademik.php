<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index()
	{	
		$data['title']= "Data Akademik";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('akademik/index', $data);
		$this->load->view('templates/footer');

	} 

	public function jurusan()
	{
		$data['title']= "Daftar Jurusan";
		$data['user'] =  $this->user_model->ambil_data($this->session->userdata['email']);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('akademik/jurusan', $data);
		$this->load->view('templates/footer');
	}

	public function data_siswa()
	{
		$data['title']= "Data Siswa";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['siswa'] = $this->db->get_where('user', ['role_id' => 2])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('akademik/data_siswa', $data);
		$this->load->view('templates/footer');
	}

	public function data_guru()
	{
		$data['title']= "Data Guru";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['guru'] = $this->db->get_where('user', ['role_id' => 3])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('akademik/data_guru', $data);
		$this->load->view('templates/footer');
	}


	public function dpib()
	{
		$data['title']= "Jurusan DPIB";
		$data['user'] =  $this->user_model->ambil_data($this->session->userdata['email']);
		$data['jurusan'] = $this->jurusan_model->tampil_data()->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('akademik/keahlian/dpib', $data);
		$this->load->view('templates/footer');
	}

}
