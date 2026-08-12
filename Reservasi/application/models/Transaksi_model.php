<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	public function read()
	{
		$this->db->select('transaksi.*, kolam.jenis_kolam, kolam.harga');
		$this->db->from('transaksi');
		$this->db->join('kolam', 'kolam.id = transaksi.id_kolam', 'left');
		$this->db->order_by('transaksi.id', 'DESC');

		return $this->db->get()->result();
	}

	public function read_by($id)
	{
		$this->db->select('transaksi.*, kolam.jenis_kolam, kolam.harga');
		$this->db->from('transaksi');
		$this->db->join('kolam', 'kolam.id = transaksi.id_kolam', 'left');
		$this->db->where('transaksi.id', $id);

		return $this->db->get()->row();
	}

	public function input_data($data, $table = 'transaksi')
	{
		return $this->db->insert($table, $data);
	}

	public function getAllTrans()
	{
		$this->db->select('transaksi.*, kolam.jenis_kolam, kolam.harga');
		$this->db->from('transaksi');
		$this->db->join('kolam', 'kolam.id = transaksi.id_kolam', 'left');
		$this->db->order_by('transaksi.id', 'DESC');

		return $this->db->get()->result();
	}
}
