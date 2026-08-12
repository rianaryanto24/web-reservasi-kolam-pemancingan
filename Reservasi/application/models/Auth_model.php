<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function getuser($email)
	{
		return $this->db
			->where('email', $email)
			->get('pelanggan')
			->row();
	}

	public function register_user()
	{
		$data = array(
			'nama'     => $this->input->post('nama', TRUE),
			'email'    => $this->input->post('mail', TRUE),
			'password' => $this->input->post('password', TRUE),
			'no'       => $this->input->post('telp', TRUE),
			'akses'    => 'User',
			'gambar'   => 'default.png'
		);

		return $this->db->insert('pelanggan', $data);
	}
}
