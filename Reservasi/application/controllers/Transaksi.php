<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('email')) {
			redirect('Auth/login');
		}

		$this->load->model('Kolam_model');
		$this->load->model('Transaksi_model');
	}

	// =========================
	// DATA PESANAN PENDING
	// =========================
	public function read()
	{
		if ($this->session->userdata('akses') != 'Admin') {
			redirect('Welcome/index');
			return;
		}

		$this->db->select('
            transaksi.*,
            kolam.jenis_kolam,
            kolam.harga,
            kolam.stok
        ');
		$this->db->from('transaksi');
		$this->db->join('kolam', 'kolam.id = transaksi.id_kolam', 'left');
		$this->db->where('transaksi.status', 'Pending');
		$this->db->order_by('transaksi.id', 'DESC');

		$data['result'] = $this->db->get()->result();

		$this->load->view('admin/transaksi/data1', $data);
	}

	// =========================
	// DATA PESANAN CONFIRM
	// =========================
	public function data()
	{
		if ($this->session->userdata('akses') != 'Admin') {
			redirect('Welcome/index');
			return;
		}

		$this->db->select('
            transaksi.*,
            kolam.jenis_kolam,
            kolam.harga,
            kolam.stok
        ');
		$this->db->from('transaksi');
		$this->db->join('kolam', 'kolam.id = transaksi.id_kolam', 'left');
		$this->db->where('transaksi.status', 'Confirm');
		$this->db->order_by('transaksi.id', 'DESC');

		$data['result'] = $this->db->get()->result();

		$this->load->view('admin/transaksi/data2', $data);
	}

	// =========================
	// FORM TAMBAH TRANSAKSI ADMIN
	// =========================
	public function add()
	{
		if ($this->session->userdata('akses') != 'Admin') {
			redirect('Welcome/index');
			return;
		}

		$data['result'] = $this->db
			->order_by('id', 'ASC')
			->get('kolam')
			->result();

		$this->load->view('admin/transaksi/tambah', $data);
	}

	// =========================
	// SIMPAN TRANSAKSI ADMIN
	// =========================
	public function tambah()
	{
		if ($this->session->userdata('akses') != 'Admin') {
			redirect('Welcome/index');
			return;
		}

		$id_kolam = (int) $this->input->post('id_kolam');
		$jumlah_lapak = (int) $this->input->post('jumlah_lapak');

		if ($id_kolam <= 0 || $jumlah_lapak <= 0) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Kolam dan jumlah lapak wajib diisi dengan benar.</p>'
			);

			redirect('Transaksi/add');
			return;
		}

		$kolam = $this->db
			->get_where('kolam', ['id' => $id_kolam])
			->row();

		if (!$kolam) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Data kolam tidak ditemukan.</p>'
			);

			redirect('Transaksi/add');
			return;
		}

		// Cek menggunakan kolom stok
		if ((int) $kolam->stok < $jumlah_lapak) {
			$$this->session->set_flashdata(
				'error',
				'Stok lapak tidak mencukupi.'
			);

			redirect('Transaksi/add');
			return;
		}

		$data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no' => $this->input->post('no'),
			'tgl_in' => $this->input->post('tglin'),
			'tgl_out' => $this->input->post('tglout'),
			'id_kolam' => $id_kolam,
			'jumlah_lapak' => $jumlah_lapak,
			'hari_pemancingan' => $this->input->post('hari_pemancingan'),
			'jam_pemancingan' => $this->input->post('jam_pemancingan'),
			'gambar' => '',
			'status' => 'Pending'
		];

		$this->db->insert('transaksi', $data);

		$this->session->set_flashdata(
			'success',
			'Pesanan berhasil ditambahkan dan menunggu konfirmasi.'
		);

		redirect('Transaksi/read');
	}

	// =========================
	// KONFIRMASI PESANAN
	// =========================
	public function edit($id)
	{
		if ($this->session->userdata('akses') != 'Admin') {
			redirect('Welcome/index');
			return;
		}

		// Hanya transaksi Pending yang dapat dikonfirmasi
		$transaksi = $this->db
			->get_where('transaksi', [
				'id' => (int) $id,
				'status' => 'Pending'
			])
			->row();



		$kolam = $this->db
			->get_where('kolam', [
				'id' => (int) $transaksi->id_kolam
			])
			->row();

		if (!$kolam) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Data kolam tidak ditemukan.</p>'
			);

			redirect('Transaksi/read');
			return;
		}

		$jumlah_dipesan = (int) $transaksi->jumlah_lapak;
		$stok_sekarang = (int) $kolam->stok;

		// Pastikan stok cukup sebelum Confirm
		if ($stok_sekarang < $jumlah_dipesan) {
			$this->session->set_flashdata(
				'error',
				'Konfirmasi gagal. Stok lapak tidak mencukupi.'
			);

			redirect('Transaksi/read');
			return;
		}

		$this->db->trans_start();

		// Kurangi stok lapak pada tabel kolam
		$this->db->set(
			'stok',
			'stok - ' . $jumlah_dipesan,
			false
		);
		$this->db->where('id', $transaksi->id_kolam);
		$this->db->update('kolam');

		// Ubah status transaksi
		$this->db->where('id', $transaksi->id);
		$this->db->update('transaksi', [
			'status' => 'Confirm'
		]);

		$this->db->trans_complete();

		if ($this->db->trans_status() === false) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Konfirmasi gagal. Silakan coba lagi.</p>'
			);

			redirect('Transaksi/read');
			return;
		}

		$this->session->set_flashdata(
			'success',
			'Pesanan berhasil dikonfirmasi.'
		);

		redirect('Transaksi/data');
	}

	// =========================
	// HAPUS TRANSAKSI
	// =========================
	public function delete($id)
	{
		if ($this->session->userdata('akses') != 'Admin') {
			redirect('Welcome/index');
			return;
		}

		$transaksi = $this->db
			->get_where('transaksi', [
				'id' => (int) $id
			])
			->row();

		if (!$transaksi) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Data transaksi tidak ditemukan.</p>'
			);

			redirect('Transaksi/data');
			return;
		}

		$this->db->trans_start();

		// Jika transaksi sudah Confirm, stok dikembalikan
		if ($transaksi->status == 'Confirm') {
			$this->db->set(
				'stok',
				'stok + ' . (int) $transaksi->jumlah_lapak,
				false
			);
			$this->db->where('id', $transaksi->id_kolam);
			$this->db->update('kolam');
		}

		// Hapus gambar bukti pembayaran jika ada
		if (
			!empty($transaksi->gambar) &&
			file_exists('./uploads/' . $transaksi->gambar)
		) {
			unlink('./uploads/' . $transaksi->gambar);
		}

		// Hapus transaksi
		$this->db->where('id', $transaksi->id);
		$this->db->delete('transaksi');

		$this->db->trans_complete();

		if ($this->db->trans_status() === false) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Transaksi gagal dihapus.</p>'
			);

			redirect('Transaksi/data');
			return;
		}

		$this->session->set_flashdata(
			'success',
			'Transaksi berhasil dihapus.'
		);

		redirect('Transaksi/data');
	}

	// =========================
	// HALAMAN GAMBAR BUKTI
	// =========================
	public function gambar()
	{
		if (!$this->session->userdata('email')) {
			redirect('Auth/login');
			return;
		}

		if (strtolower($this->session->userdata('akses')) != 'admin') {
			redirect('Welcome/index');
			return;
		}

		$this->db->select('
        transaksi.*,
        kolam.jenis_kolam
    ');

		$this->db->from('transaksi');

		$this->db->join(
			'kolam',
			'kolam.id = transaksi.id_kolam',
			'left'
		);

		$this->db->order_by('transaksi.id', 'DESC');

		$data['transaksi'] = $this->db->get()->result();

		$this->load->view('admin/gambar', $data);
	}
}
