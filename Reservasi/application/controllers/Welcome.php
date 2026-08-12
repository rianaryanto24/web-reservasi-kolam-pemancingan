<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Jika belum login, kembali ke halaman login
		if (!$this->session->userdata('email')) {
			redirect('Auth/login');
		}

		$this->load->model('Kolam_model');
	}

	public function index()
	{
		if (!$this->session->userdata('email')) {
			redirect('Auth/login');
			return;
		}

		$akses = strtolower(trim($this->session->userdata('akses')));

		// =========================
		// HOME ADMIN
		// =========================
		if ($akses === 'admin') {

			$data['jumlah_pelanggan'] = $this->db
				->count_all('pelanggan');

			$data['jumlah_kolam'] = $this->db
				->count_all('kolam');

			$data['transaksi_confirm'] = $this->db
				->where('status', 'Confirm')
				->count_all_results('transaksi');

			$data['transaksi_pending'] = $this->db
				->where('status', 'Pending')
				->count_all_results('transaksi');

			$this->load->view('admin/index', $data);
			return;
		}

		// =========================
		// HOME PELANGGAN
		// =========================
		$data['kolam'] = $this->db
			->order_by('id', 'DESC')
			->get('kolam')
			->result();

		$data['trans'] = $this->db
			->where('email', $this->session->userdata('email'))
			->get('transaksi')
			->result();

		$data['info'] = $this->db
			->order_by('id', 'DESC')
			->get('info_kolam')
			->row();

		$this->load->view('user/index', $data);
	}
}
