<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{

    // =====================================================
    // Constructor
    // Fungsi : dijalankan otomatis saat controller dipanggil
    // Digunakan untuk memanggil model yang diperlukan
    // =====================================================
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Info_model');
    }

    // =====================================================
    // Function Index
    // Fungsi :
    // - Menampilkan halaman informasi kolam
    // - Mengambil data dari database melalui model
    // =====================================================
    public function index()
    {
        $data['info'] = $this->Info_model->get_info();
        $this->load->view('admin/info', $data);
    }

    // =====================================================
    // Function Update
    // Fungsi :
    // - Mengambil data yang dikirim dari form
    // - Menyimpan perubahan ke database
    // - Kembali ke halaman Info
    // =====================================================
    public function update()
    {
        $data = [
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->Info_model->update_info($data);
        redirect('Info');
    }
}
