<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('Auth/login');
        }
    }

    // Halaman pelanggan untuk melihat jadwal
    public function index()
    {
        $data['jadwal'] = $this->db
            ->order_by('id', 'DESC')
            ->get('jadwal_pemancingan')
            ->row();

        $this->load->view('user/jadwal_pemancingan', $data);
    }

    // Halaman admin input jadwal
    public function admin()
    {
        if ($this->session->userdata('akses') != 'Admin') {
            redirect('Welcome/index');
            return;
        }

        $data['jadwal'] = $this->db
            ->order_by('id', 'DESC')
            ->get('jadwal_pemancingan')
            ->row();

        $this->load->view('admin/jadwal/input', $data);
    }

    // Proses tombol Simpan admin
    public function simpan()
    {
        if ($this->session->userdata('akses') != 'Admin') {
            redirect('Welcome/index');
            return;
        }

        $data = array(
            'senin'  => $this->input->post('senin'),
            'selasa' => $this->input->post('selasa'),
            'rabu'   => $this->input->post('rabu'),
            'kamis'  => $this->input->post('kamis'),
            'jumat'  => $this->input->post('jumat'),
            'sabtu'  => $this->input->post('sabtu'),
            'minggu' => $this->input->post('minggu')
        );

        // Ambil satu data jadwal terakhir
        $jadwal = $this->db
            ->order_by('id', 'DESC')
            ->get('jadwal_pemancingan')
            ->row();

        // Jika belum ada jadwal: INSERT
        if (!$jadwal) {
            $this->db->insert('jadwal_pemancingan', $data);

            $this->session->set_flashdata(
                'msg',
                '<p style="color:green;">Jadwal pemancingan berhasil disimpan.</p>'
            );
        } else {
            // Jika sudah ada jadwal: UPDATE
            $this->db->where('id', $jadwal->id);
            $this->db->update('jadwal_pemancingan', $data);

            $this->session->set_flashdata(
                'msg',
                '<p style="color:green;">Jadwal pemancingan berhasil diperbarui.</p>'
            );
        }

        redirect('Jadwal/admin');
    }
}
