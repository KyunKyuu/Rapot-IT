<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {




	public function index(){

		if ($this->session->userdata('email', 'nisnip')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Emai', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			
		$data['title'] = 'User Login';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
		}else {
			$this->_login();
		}
	}

	

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		// jika usernya ada
		if ($user) {
			// jika user aktif
			if ($user['is_active']==1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'nisnip' => $user['nisnip'],
						'name' => $user['name']
					];

					$this->session->set_userdata($data);
					if ($user['role_id']==1) {
						redirect('admin');
					}elseif($user['role_id']==2){
						redirect('user');
					}else{
						redirect('user');
					}
					

				}else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert">Password Salah.</div>');
			redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Diaktifkan.</div>');
			redirect('auth');
			}
			
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar.</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email', 'nisnip')) {
			redirect('user');
		}
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nisnip', 'Nis', 'required|trim|is_natural|is_unique[user.nisnip]',[
			'is_unique' => 'This Nis hash arledy extited']);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'Email sudah digunakan'
		]);
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
				'matches' => 'Password tidak sama!',
				'min_length' => 'Password minimal 3 karakter'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
	
		$data['title'] = 'User Registration';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/registration');
		$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'nisnip' => htmlspecialchars($this->input->post('nisnip', true)),
				'kelas' => htmlspecialchars($this->input->post('kelas', true)),
				'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];

			// siapkan toket
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $this->input->post('email'),
				'token' => $token,
				'date_created' => time()

			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');


			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! Your account has been created!
				 please activate your account.</div>');
			redirect('auth');
		}
	}


	public function registrationguru()
	{
		if ($this->session->userdata('email', 'nisnip')) {
			redirect('user');
		}
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nisnip', 'Nis', 'required|trim|is_natural|is_unique[user.nisnip]',[
			'is_unique' => 'This Nis hash arledy extited']);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'This Email hash arledy extited'
		]);
		$this->form_validation->set_rules('mapel', 'mapel', 'required');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
				'matches' => 'Password dont match!',
				'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
	
		$data['title'] = 'User Registration';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/registration_guru');
		$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'nisnip' => htmlspecialchars($this->input->post('nisnip', true)),
				'kelas' => htmlspecialchars($this->input->post('kelas', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'is_active' => 0,
				'date_created' => time()
			];

			// siapkan toket
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $this->input->post('email'),
				'token' => $token,
				'date_created' => time()

			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');


			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! Your account has been created!
				 please activate your account.</div>');
			redirect('auth');
		}
	}



	private function _sendEmail($token, $type)
	{
		$config = [
			'mailtype' 	  => 'html',
            'charset'  	  => 'utf-8',
            'protocol'    => 'smtp',
            'smtp_host'   => 'ssl://smtp.googlemail.com',
            'smtp_user'   => 'teguh.iqbal69@gmail.com',  // Email gmail
            'smtp_pass'   => 'nusaya79',  // Password gmai
            'smtp_port'   =>  465,
            'newline' 	  => "\r\n"

				 ];


		$this->load->library('email', $config); 
		$this->email->initialize($config);

		$this->email->from('teguh.iqbal69@gmail.com', 'Tengok sini lur');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			
		$this->email->subject('Account Verification');
		$this->email->message('Click this link to verify your account <a href="'. base_url() .'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) .' ">Activate</a>');
		} else if($type == 'forgot'){
			$this->email->subject('Reset Password');
		$this->email->message('Click this link to reset your password <a href="'. base_url() .'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) .' ">Reset password</a>');
		}

	
		
		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array(); 

			if ($user_token) {
				if(time() - $user_token['date_created'] < (60*60*42) ) {
 					
 					$this->db->set('is_active', 1);
 					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email] );

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email .'has ben activeted! please login</div>');
					redirect('auth');

				}else {

					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation Fail! Token expired.</div>');
					redirect('auth');
				}


			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation Fail! Token invalid.</div>');
		redirect('auth');
			}

		} else {

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation Fail! Wrong email.</div>');
		redirect('auth');

		}
	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have ben logout.</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}

	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {

		$data['title'] = 'Forgot Password';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/forgot_password');
		$this->load->view('templates/auth_footer');

		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];
				
				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your Email to reset your password.</div>');
				redirect('auth/forgotpassword');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email is not registered or activeted.</div>');
				redirect('auth/forgotpassword');
			}
		}
		
	}

	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password failed! Wrong token.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password failed! Wrong email.</div>');
				redirect('auth');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password2]|min_length[6]');
		$this->form_validation->set_rules('password2', 'Repeat password', 'trim|required|matches[password1]|min_length[6]');

		if ($this->form_validation->run()==FALSE) {
			$data['title'] = 'Change Password';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/change_password');
		$this->load->view('templates/auth_footer');
		}else{
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has ben change! Please login.</div>');
				redirect('auth');

		}
		
	}
}