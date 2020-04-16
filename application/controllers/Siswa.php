<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {




	public function index()
	{
		$data['title'] = "Lihat Nilai";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('akademik/lihat_nilai/pilihan_nilai', $data);
		$this->load->view('templates/footer');
	}

	public function kelas10()
	{
		$data['title'] = "Lihat Nilai Kelas 10";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['siswa'] = $this->db->get_where('nilai_kelas10', ['nis' => $data['user']['nisnip']])->result_array();

		
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('akademik/lihat_nilai/kelas10/nilai_kelas10', $data);
		$this->load->view('templates/footer');
	}

	public function detail10($id)
	{
		$data['title'] = "Detail Nilai";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['siswa'] = $this->db->get_where('nilai_kelas10', ['id' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('akademik/lihat_nilai/kelas10/detail', $data);
		$this->load->view('templates/footer');
	}
}