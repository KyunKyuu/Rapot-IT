<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	class User_model extends CI_Model {

		public function ambil_data($id)
		{
		  $this->db->where('email', $id);
		  return $this->db->get('user')->row_array();
		}


}