<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plant extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function get_data()
	{
		return $this->db->get('users')->result();
	}
	function users($id)
	{
		if (empty($id)) {
			return false;
		}
		$this->db->where('id', $id);
		return $this->db->get('users')->row();
	}
}
