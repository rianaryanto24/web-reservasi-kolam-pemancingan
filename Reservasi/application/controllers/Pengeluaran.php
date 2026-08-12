<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));

        if (!$this->session->userdata('email')) {
            redirect('Auth/login');
        }

        if (strtolower($this->session->userdata('akses')) != 'admin') {
            redirect('Welcome/index');
        }
    }

    public function index()
    {
        // Ambil nilai bulan dan tahun dari form pencarian
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        // Query tabel pengeluaran
        $this->db->from('pengeluaran');

        // Jika bulan dipilih
        if (!empty($bulan)) {
            $this->db->where('MONTH(tanggal)', $bulan);
        }

        // Jika tahun diisi
        if (!empty($tahun)) {
            $this->db->where('YEAR(tanggal)', $tahun);
        }

        // Data terbaru tampil paling atas
        $this->db->order_by('id', 'DESC');

        // Ambil hasil query
        $data['pengeluaran'] = $this->db->get()->result_array();

        // Kirim data ke halaman pengeluaran
        $this->load->view('pengeluaran/index', $data);
    }

    public function simpan()
    {
        $tanggal    = $this->input->post('tanggal', true);
        $keterangan = $this->input->post('keterangan', true);
        $jumlah     = $this->input->post('jumlah', true);

        if (empty($tanggal) || empty($keterangan) || empty($jumlah)) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger">Data pengeluaran wajib diisi.</div>'
            );

            redirect('Pengeluaran/index');
            return;
        }

        $data_insert = array(
            'tanggal'    => $tanggal,
            'keterangan' => $keterangan,
            'jumlah'     => $jumlah
        );

        $this->db->insert('pengeluaran', $data_insert);

        $this->session->set_flashdata(
            'msg',
            '<div class="alert alert-success">Data pengeluaran berhasil disimpan.</div>'
        );

        redirect('Pengeluaran/index');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengeluaran');

        $this->session->set_flashdata(
            'msg',
            '<div class="alert alert-success">Data pengeluaran berhasil dihapus.</div>'
        );

        redirect('Pengeluaran/index');
    }

    public function edit($id)
    {
        $data['pengeluaran'] = $this->db
            ->get_where('pengeluaran', array('id' => $id))
            ->row_array();

        if (!$data['pengeluaran']) {
            show_404();
        }

        $this->load->view('pengeluaran/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');

        $data = array(
            'tanggal'    => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'jumlah'     => $this->input->post('jumlah')
        );

        $this->db->where('id', $id);
        $this->db->update('pengeluaran', $data);

        $this->session->set_flashdata(
            'msg',
            '<div class="alert alert-success">Data pengeluaran berhasil diubah.</div>'
        );

        redirect('Pengeluaran/index');
    }
}
