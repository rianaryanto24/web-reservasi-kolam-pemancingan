<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('email')) {
			redirect('Auth/login');
		}

		// Hanya Admin yang boleh membuka menu data pelanggan
		if ($this->session->userdata('akses') != 'Admin') {
			redirect('Welcome/index');
		}

		$this->load->model('Pelanggan_model');
	}

	// ==========================================
	// TAMPIL DATA PELANGGAN
	// ==========================================
	public function read()
	{
		$data['user'] = $this->Pelanggan_model->read();

		$data['result'] = $this->db
			->order_by('id', 'DESC')
			->get('pelanggan')
			->result();

		$this->load->view('admin/pelanggan/data', $data);
	}

	// ==========================================
	// FORM EDIT PELANGGAN
	// ==========================================
	public function edit($id)
	{
		$data['detail'] = $this->db
			->get_where('pelanggan', ['id' => $id])
			->row();

		if (!$data['detail']) {
			redirect('Pelanggan/read');
			return;
		}

		$this->load->view('admin/pelanggan/ubah', $data);
	}

	// ==========================================
	// SIMPAN PELANGGAN BARU
	// ==========================================
	public function do_upload()

	{
		if (
			empty($this->input->post('nama')) ||
			empty($this->input->post('email')) ||
			empty($this->input->post('no')) ||
			empty($this->input->post('password')) ||
			empty($this->input->post('akses')) ||
			empty($_FILES['gambar']['name'])
		) {

			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-danger">
            Semua data wajib diisi!
        </div>'
			);

			redirect('Pelanggan/read');
			return;
		}

		$config['upload_path'] = './images/pelanggan/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-danger">' .
					$this->upload->display_errors() .
					'</div>'
			);

			redirect('Pelanggan/read');
			return;
		}

		$upload = $this->upload->data();

		$data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no' => $this->input->post('no'),
			'password' => $this->input->post('password'),
			'akses' => $this->input->post('akses'),
			'gambar' => $upload['file_name']
		];

		$query = $this->db->insert('pelanggan', $data);

		if ($query) {
			$this->session->set_flashdata(
				'success',
				'Data pelanggan berhasil ditambahkan.'
			);
		} else {
			$this->session->set_flashdata(
				'error',
				'Data pelanggan gagal ditambahkan.'
			);
		}

		redirect('Pelanggan/read');
	}

	// ==========================================
	// HAPUS PELANGGAN
	// ==========================================
	public function hapus($id)
	{
		$pelanggan = $this->db
			->get_where('pelanggan', ['id' => $id])
			->row();

		if (!$pelanggan) {
			redirect('Pelanggan/read');
			return;
		}

		$query = $this->db->delete('pelanggan', ['id' => $id]);

		if ($query && !empty($pelanggan->gambar)) {
			$file = FCPATH . 'images/pelanggan/' . $pelanggan->gambar;

			if (file_exists($file)) {
				unlink($file);
			}
		}

		$this->session->set_flashdata(
			'success',
			'Data pelanggan berhasil dihapus.'
		);

		redirect('Pelanggan/read');
	}

	// ==========================================
	// UPDATE PELANGGAN
	// ==========================================
	public function update()
	{
		$id = $this->input->post('id');

		$pelanggan = $this->db
			->get_where('pelanggan', ['id' => $id])
			->row();

		if (!$pelanggan) {
			redirect('Pelanggan/read');
			return;
		}

		$data = array(
			'nama'  => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no'    => $this->input->post('no'),
			'akses' => $this->input->post('akses')
		);

		// Update password hanya jika diisi
		if ($this->input->post('password') != '') {
			$data['password'] = $this->input->post('password');
		}

		// Upload gambar
		if (!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './images/pelanggan/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']      = 2048;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {

				$upload = $this->upload->data();

				$data['gambar'] = $upload['file_name'];

				if (!empty($pelanggan->gambar)) {

					$file_lama = FCPATH . 'images/pelanggan/' . $pelanggan->gambar;

					if (file_exists($file_lama)) {
						unlink($file_lama);
					}
				}
			}
		}

		$this->db->where('id', $id);
		$this->db->update('pelanggan', $data);

		$this->session->set_flashdata(
			'success',
			'Data pelanggan berhasil diperbarui.'
		);

		redirect('Pelanggan/read');
	}
}
