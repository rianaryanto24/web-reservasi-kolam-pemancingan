<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kolam_model extends CI_Model
{
	public function get_all()
	{
		return $this->db
			->order_by('id', 'DESC')
			->get('kolam')
			->result();
	}

	public function get_by_id($id)
	{
		return $this->db
			->get_where('kolam', array('id' => $id))
			->row();
	}

	public function get_stok($id_kolam)
	{
		$kolam = $this->db
			->select('stok')
			->get_where('kolam', array('id' => $id_kolam))
			->row();

		if ($kolam) {
			return (int) $kolam->stok;
		}

		return 0;
	}
}
