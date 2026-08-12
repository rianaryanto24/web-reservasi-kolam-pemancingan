<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Auth_model');
		$this->load->model('Kolam_model');
		$this->load->model('Transaksi_model');

		$this->load->library('session');
		$this->load->helper(array('url', 'form'));
	}

	// =========================
	// HALAMAN LOGIN
	// =========================
	public function index()
	{
		// Jika sudah login, langsung arahkan ke Home
		if ($this->session->userdata('email')) {
			redirect('Welcome/index');
			return;
		}

		$this->load->view('login');
	}

	// URL: Auth/login
	public function login()
	{
		$this->index();
	}

	// =========================
	// PROSES LOGIN
	// =========================
	public function proses_login()
	{
		$email    = $this->input->post('email', true);
		$password = $this->input->post('password', true);

		if (empty($email) || empty($password)) {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-danger">Email dan password wajib diisi.</div>'
			);

			redirect('Auth/login');
			return;
		}

		// Database kamu memakai tabel pelanggan
		$pelanggan = $this->db
			->get_where('pelanggan', array(
				'email' => $email
			))
			->row();

		if (!$pelanggan) {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-danger">Email tidak ditemukan.</div>'
			);

			redirect('Auth/login');
			return;
		}

		/*
		Jika tabel pelanggan sudah memiliki kolom password,
		aktifkan pengecekan password di bawah ini.
		*/
		if (isset($pelanggan->password)) {
			if ($password != $pelanggan->password) {
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-danger">Password salah.</div>'
				);

				redirect('Auth/login');
				return;
			}
		}

		// Simpan data login ke session
		$data_session = array(
			'id'    => $pelanggan->id,
			'nama'  => $pelanggan->nama,
			'email' => $pelanggan->email,
			'no'    => $pelanggan->no,
			'password' => $pelanggan->password,
			'akses' => $pelanggan->akses
		);

		$this->session->set_userdata($data_session);

		// Semua akun masuk ke Welcome/index.
		// Controller Welcome yang menentukan halaman Admin atau Pelanggan.
		redirect('Welcome/index');
	}

	// =========================
	// DAFTAR
	// =========================
	public function daftar()
	{
		if ($this->input->post('daftar')) {

			$this->Auth_model->register_user();   // <-- BENAR

			if ($this->db->affected_rows() > 0) {

				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-success">
                    Registrasi berhasil.
                </div>'
				);
			} else {

				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-danger">
                    Registrasi gagal.
                </div>'
				);
			}

			redirect('Auth/login');
		}

		$this->load->view('login');
	}

	// =========================
	// LOGOUT
	// =========================
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('no');
		$this->session->unset_userdata('akses');
		$this->session->unset_userdata('id_transaksi_terakhir');

		$this->session->sess_destroy();

		redirect('Auth/login');
	}


	// =========================
	// HALAMAN BOOKING
	// =========================
	public function booking($id)
	{
		if (!$this->session->userdata('email')) {
			redirect('Auth/login');
			return;
		}

		// Admin tidak boleh booking sebagai pelanggan
		if (strtolower(trim($this->session->userdata('akses'))) === 'admin') {
			redirect('Welcome/index');
			return;
		}

		$data['detail'] = $this->db
			->get_where('kolam', array('id' => (int) $id))
			->row();

		if (!$data['detail']) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Data kolam tidak ditemukan.</p>'
			);

			redirect('Welcome/index');
			return;
		}

		$data['jadwal'] = $this->db
			->order_by('id', 'DESC')
			->get('jadwal_pemancingan')
			->row();

		$this->load->view('user/booking', $data);
	}

	// =========================
	// PROSES BOOKING
	// =========================
	public function proses_booking()
	{
		if (!$this->session->userdata('email')) {
			redirect('Auth/login');
			return;
		}

		if (strtolower(trim($this->session->userdata('akses'))) === 'admin') {
			redirect('Welcome/index');
			return;
		}

		$id_kolam         = (int) $this->input->post('id_kolam');
		$tgl_in           = $this->input->post('tgl_in', true);
		$tgl_out          = $this->input->post('tgl_out', true);
		$jumlah_lapak     = (int) $this->input->post('jumlah_lapak');
		$hari_pemancingan = $this->input->post('hari_pemancingan', true);
		$jam_pemancingan  = $this->input->post('jam_pemancingan', true);

		$nama  = $this->session->userdata('nama');
		$email = $this->session->userdata('email');
		$no    = $this->session->userdata('no');

		if (
			$id_kolam <= 0 ||
			empty($tgl_in) ||
			empty($tgl_out) ||
			$jumlah_lapak <= 0 ||
			empty($hari_pemancingan) ||
			empty($jam_pemancingan)
		) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Data pemesanan belum lengkap.</p>'
			);

			redirect('Auth/booking/' . $id_kolam);
			return;
		}

		$kolam = $this->db
			->get_where('kolam', array('id' => $id_kolam))
			->row();

		if (!$kolam) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Data kolam tidak ditemukan.</p>'
			);

			redirect('Welcome/index');
			return;
		}

		if ((int) $kolam->stok < $jumlah_lapak) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Stok lapak tidak mencukupi.</p>'
			);

			redirect('Auth/booking/' . $id_kolam);
			return;
		}

		if (empty($_FILES['gambar']['name'])) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Bukti pembayaran wajib diupload.</p>'
			);

			redirect('Auth/booking/' . $id_kolam);
			return;
		}

		$config['upload_path']   = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']      = 2048;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Upload bukti pembayaran gagal: ' .
					$this->upload->display_errors('', '') .
					'</p>'
			);

			redirect('Auth/booking/' . $id_kolam);
			return;
		}

		$upload = $this->upload->data();

		$data = array(
			'nama'             => $nama,
			'email'            => $email,
			'no'               => $no,
			'tgl_in'           => $tgl_in,
			'tgl_out'          => $tgl_out,
			'id_kolam'         => $id_kolam,
			'jumlah_lapak'     => $jumlah_lapak,
			'hari_pemancingan' => $hari_pemancingan,
			'jam_pemancingan'  => $jam_pemancingan,
			'gambar'           => $upload['file_name'],
			'status'           => 'Pending'
		);

		$this->db->insert('transaksi', $data);

		$this->session->set_userdata(
			'id_transaksi_terakhir',
			$this->db->insert_id()
		);

		redirect('Auth/konfirmasi');
	}

	// =========================
	// KONFIRMASI PEMESANAN
	// =========================
	public function konfirmasi()
	{
		if (!$this->session->userdata('email')) {
			redirect('Auth/login');
			return;
		}

		if (strtolower(trim($this->session->userdata('akses'))) === 'admin') {
			redirect('Welcome/index');
			return;
		}

		$id_transaksi = $this->session->userdata('id_transaksi_terakhir');

		$this->db->select('
			transaksi.*,
			kolam.jenis_kolam,
			kolam.harga,
			kolam.gambar AS gambar_kolam
		');

		$this->db->from('transaksi');
		$this->db->join('kolam', 'kolam.id = transaksi.id_kolam', 'left');

		if (!empty($id_transaksi)) {
			$this->db->where('transaksi.id', $id_transaksi);
		} else {
			$this->db->where(
				'transaksi.email',
				$this->session->userdata('email')
			);

			$this->db->order_by('transaksi.id', 'DESC');
		}

		$data['trans'] = $this->db
			->limit(1)
			->get()
			->row();

		$this->load->view('user/konfirmasi', $data);
	}
}
