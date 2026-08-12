<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function read()
	{
		$query = $this->db->get('pelanggan');
		return $query->result();
	}
	
	public function read_by($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('pelanggan');
		return $query->row() ;
	}
}
