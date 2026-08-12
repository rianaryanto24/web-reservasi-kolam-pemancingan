<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kolam extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('email')) {
			redirect('Auth/login');
		}

		if ($this->session->userdata('akses') != 'Admin') {
			redirect('Welcome/index');
		}

		$this->load->model('Kolam_model');
	}

	public function home()
	{
		if (!$this->session->userdata('email')) {
			redirect('Auth/login');
			return;
		}

		if (strtolower($this->session->userdata('akses')) != 'admin') {
			redirect('Welcome/index');
			return;
		}

		$data['jumlah_kolam'] = $this->db->count_all('kolam');

		$data['transaksi_pending'] = $this->db
			->where('status', 'Pending')
			->count_all_results('transaksi');

		$data['transaksi_confirm'] = $this->db
			->where('status', 'Confirm')
			->count_all_results('transaksi');

		$data['pending'] = $this->db
			->where('status', 'Pending')
			->count_all_results('transaksi');

		$this->load->view('admin/index', $data);
	}

	public function read()
	{
		$data['result'] = $this->db
			->order_by('id', 'DESC')
			->get('kolam')
			->result();

		$this->load->view('admin/kolam/data', $data);
	}

	public function add()
	{
		$this->load->view('admin/kolam/tambah');
	}

	public function do_upload()
	{
		$config['upload_path']   = './images/kolam/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']      = 2048;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Gagal upload gambar: ' .
					$this->upload->display_errors('', '') .
					'</p>'
			);

			redirect('Kolam/read');
			return;
		}

		$upload = $this->upload->data();

		$jumlah_lapak = (int) $this->input->post('jumlah_lapak');

		$data = array(
			'jenis_kolam'  => $this->input->post('jenis_kolam'),
			'harga'         => $this->input->post('harga'),
			'jumlah_lapak'  => $jumlah_lapak,
			'stok'          => $jumlah_lapak,
			'gambar'        => $upload['file_name']
		);

		$this->db->insert('kolam', $data);

		$this->session->set_flashdata(
			'success',
			'Data kolam berhasil ditambahkan.'
		);

		redirect('Kolam/read');
	}

	public function edit($id)
	{
		$data['detail'] = $this->db
			->get_where('kolam', array('id' => $id))
			->row();

		if (!$data['detail']) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Data kolam tidak ditemukan.</p>'
			);

			$this->session->set_flashdata('success', 'Data kolam berhasil diperbarui.');

			redirect('Kolam/read');
			return;
		}

		$this->load->view('admin/kolam/ubah', $data);
	}

	public function update()
	{
		$id = $this->input->post('id');

		$kolam_lama = $this->db
			->get_where('kolam', array('id' => $id))
			->row();

		if (!$kolam_lama) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Data kolam tidak ditemukan.</p>'
			);



			redirect('Kolam/read');
			return;
		}

		$jumlah_lapak_baru = (int) $this->input->post('jumlah_lapak');

		// Hitung jumlah lapak yang sudah dipakai
		$lapak_terpakai = (int) $kolam_lama->jumlah_lapak - (int) $kolam_lama->stok;

		// Stok baru = kapasitas baru - lapak yang sedang dipakai
		$stok_baru = $jumlah_lapak_baru - $lapak_terpakai;

		// Tidak boleh lebih kecil dari lapak yang sudah dipakai
		if ($stok_baru < 0) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Jumlah lapak tidak boleh lebih kecil dari lapak yang sedang digunakan.</p>'
			);

			redirect('Kolam/edit/' . $id);
			return;
		}

		$data = array(
			'jenis_kolam' => $this->input->post('jenis_kolam'),
			'harga'        => $this->input->post('harga'),
			'jumlah_lapak' => $jumlah_lapak_baru,
			'stok'         => $stok_baru
		);

		if (!empty($_FILES['gambar']['name'])) {
			$config['upload_path']   = './images/kolam/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']      = 2048;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$upload = $this->upload->data();

				$data['gambar'] = $upload['file_name'];

				if (
					!empty($kolam_lama->gambar) &&
					file_exists('./images/kolam/' . $kolam_lama->gambar)
				) {
					unlink('./images/kolam/' . $kolam_lama->gambar);
				}
			} else {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:red;">Gagal upload gambar: ' .
						$this->upload->display_errors('', '') .
						'</p>'
				);

				redirect('Kolam/edit/' . $id);
				return;
			}
		}

		$this->db->where('id', $id);
		$this->db->update('kolam', $data);

		$this->session->set_flashdata('success', 'Data kolam berhasil diperbarui.');

		redirect('Kolam/read');
	}

	public function delete($id)
	{
		$kolam = $this->db
			->get_where('kolam', array('id' => $id))
			->row();

		if (!$kolam) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Data kolam tidak ditemukan.</p>'
			);

			redirect('Kolam/read');
			return;
		}

		$jumlah_transaksi = $this->db
			->get_where('transaksi', array('id_kolam' => $id))
			->num_rows();

		if ($jumlah_transaksi > 0) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red;">Kolam tidak dapat dihapus karena sudah digunakan pada transaksi.</p>'
			);

			redirect('Kolam/read');

			redirect('Kolam/read');
			return;
		}

		if (
			!empty($kolam->gambar) &&
			file_exists('./images/kolam/' . $kolam->gambar)
		) {
			unlink('./images/kolam/' . $kolam->gambar);
		}

		$this->db->where('id', $id);
		$this->db->delete('kolam');

		$this->session->set_flashdata('success', 'Data kolam berhasil dihapus.');

		redirect('Kolam/read');
	}
}
