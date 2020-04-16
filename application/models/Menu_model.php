<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {


	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
				  FROM `user_sub_menu` JOIN `user_menu`
				  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
				  ";

		return $this->db->query($query)->result_array();
	}

	
	public function hapusDataMenu($id)
	{
		
		$this->db->delete('user_menu', ['id' => $id]);
	}
	public function hapusDataSubMenu($id)
	{
		
		$this->db->delete('user_sub_menu', ['id' => $id]);
	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table,$where);
	}
	public function edit_data_sub($where, $table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update_data($where, $data, $table)
	{	
		$this->db->set($data);
		$this->db->where($where);
		$this->db->update($table);
	}
}