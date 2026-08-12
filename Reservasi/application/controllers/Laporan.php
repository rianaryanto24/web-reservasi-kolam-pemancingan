<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    // ==========================
    // INPUT LAPORAN HARIAN
    // ==========================
    public function harian()
    {
        $this->load->view('laporan/harian');
    }

    // ==========================
    // SIMPAN DATA
    // ==========================
    public function simpan()
    {
        if (!$this->session->userdata('email')) {
            redirect('Auth/login');
            return;
        }

        if ($this->session->userdata('akses') != 'Admin') {
            redirect('Welcome/index');
            return;
        }

        $data = array(
            'nama'             => $this->input->post('nama'),
            'tanggal'          => $this->input->post('tanggal'),
            'hari_pemancingan' => $this->input->post('hari_pemancingan'),
            'jam_pemancingan'  => $this->input->post('jam_pemancingan'),
            'keterangan'       => $this->input->post('keterangan'),
            'lapak'            => $this->input->post('lapak'),
            'jumlah'           => $this->input->post('jumlah')
        );

        $this->db->insert('laporan_harian', $data);

        $this->session->set_flashdata(
            'msg',
            '<p style="color:green;">Laporan harian berhasil disimpan.</p>'
        );

        redirect('Laporan/harian');
    }

    // ==========================
    // DATA LAPORAN
    // ==========================
    public function data()
    {
        $data['laporan'] = $this->db->get('laporan_harian')->result();

        $data['total'] = $this->db
            ->select_sum('jumlah')
            ->get('laporan_harian')
            ->row()
            ->jumlah;

        $this->load->view('laporan/data', $data);
    }

    // ==========================
    // LAPORAN HARIAN
    // ==========================
    public function laporan_harian()
    {
        $tanggal = $this->input->get('tanggal');

        if ($tanggal) {

            $this->db->where('tanggal', $tanggal);

            $data['laporan'] =
                $this->db->get('laporan_harian')->result();

            $this->db->select_sum('jumlah');
            $this->db->where('tanggal', $tanggal);

            $row =
                $this->db->get('laporan_harian')->row();

            $data['total'] = $row->jumlah ?? 0;
        } else {

            $data['laporan'] = [];
            $data['total'] = 0;
        }

        $this->load->view('laporan/laporan_harian', $data);
    }

    // ==========================
    // LAPORAN BULANAN
    // ==========================
    public function bulanan()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        if (empty($bulan)) {
            $bulan = date('n');
        }

        if (empty($tahun)) {
            $tahun = date('Y');
        }

        // Data transaksi/laporan pada bulan yang dipilih
        $this->db->where('MONTH(tanggal) = ' . (int)$bulan, NULL, FALSE);
        $this->db->where('YEAR(tanggal) = ' . (int)$tahun, NULL, FALSE);

        $data['laporan'] = $this->db
            ->order_by('tanggal', 'ASC')
            ->get('laporan_harian')
            ->result();

        // Total pemasukan bulan yang dipilih
        $this->db->select_sum('jumlah');
        $this->db->where('MONTH(tanggal) = ' . (int)$bulan, NULL, FALSE);
        $this->db->where('YEAR(tanggal) = ' . (int)$tahun, NULL, FALSE);

        $total = $this->db
            ->get('laporan_harian')
            ->row();

        $data['total_bulanan'] = !empty($total->jumlah)
            ? $total->jumlah
            : 0;

        // Total pengeluaran bulan yang dipilih
        $this->db->select_sum('jumlah');
        $this->db->where('MONTH(tanggal)', $bulan);
        $this->db->where('YEAR(tanggal)', $tahun);

        $pengeluaran = $this->db->get('pengeluaran')->row();

        $data['total_pengeluaran'] = $pengeluaran->jumlah ?? 0;

        // Tambahkan baris ini
        $data['pengeluaran_bulan'] = $data['total_pengeluaran'];

        // Hitung laba bersih otomatis
        $data['laba_bersih'] =
            $data['total_bulanan'] - $data['total_pengeluaran'];

        // Variabel untuk form simpan laba
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $this->load->view('laporan/bulanan', $data);
    }



    // ==========================
    // PRINT HARIAN
    // ==========================
    public function print_harian()
    {
        $tanggal = $this->input->get('tanggal');

        $this->db->where('tanggal', $tanggal);

        $data['laporan'] =
            $this->db->get('laporan_harian')->result();

        $this->db->select_sum('jumlah');
        $this->db->where('tanggal', $tanggal);

        $row = $this->db->get('laporan_harian')->row();

        $data['total'] = $row->jumlah ?? 0;
        $data['tanggal'] = $tanggal;

        $this->load->view('laporan/print_harian', $data);
    }

    // ==========================
    // PRINT BULANAN
    // ==========================
    public function print_bulanan()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        // Jika URL kosong, gunakan bulan dan tahun sekarang
        if (empty($bulan)) {
            $bulan = date('n');
        }

        if (empty($tahun)) {
            $tahun = date('Y');
        }

        // Ambil data laporan sesuai bulan dan tahun
        $this->db->where('MONTH(tanggal) = ' . (int)$bulan, NULL, FALSE);
        $this->db->where('YEAR(tanggal) = ' . (int)$tahun, NULL, FALSE);

        $data['laporan'] = $this->db
            ->order_by('tanggal', 'ASC')
            ->get('laporan_harian')
            ->result();

        // Hitung total bulanan
        $this->db->select_sum('jumlah');
        $this->db->where('MONTH(tanggal) = ' . (int)$bulan, NULL, FALSE);
        $this->db->where('YEAR(tanggal) = ' . (int)$tahun, NULL, FALSE);

        $total = $this->db
            ->get('laporan_harian')
            ->row();

        $data['total_bulanan'] = !empty($total->jumlah)
            ? $total->jumlah
            : 0;

        // Kirim bulan dan tahun ke view print
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $this->load->view('laporan/print_bulanan', $data);
    }

    public function print_satu($id)
    {
        $data['laporan'] = $this->db
            ->get_where('laporan_harian', array('id' => $id))
            ->row();

        if (!$data['laporan']) {
            show_404();
        }

        $this->load->view('laporan/print_satu', $data);
    }

    public function simpan_laba_bulanan()
    {
        $bulan       = $this->input->post('bulan');
        $tahun       = $this->input->post('tahun');
        $pemasukan   = $this->input->post('pemasukan');
        $pengeluaran = $this->input->post('pengeluaran');

        // Bersihkan format rupiah jika ada titik atau Rp
        $pemasukan = preg_replace('/[^0-9]/', '', $pemasukan);
        $pengeluaran = preg_replace('/[^0-9]/', '', $pengeluaran);

        $laba = $pemasukan - $pengeluaran;

        $data = array(
            'bulan'       => $bulan,
            'tahun'       => $tahun,
            'pemasukan'   => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'laba'        => $laba
        );

        // Cek apakah bulan dan tahun tersebut sudah pernah disimpan
        $cek = $this->db
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->get('laba_rugi')
            ->row();

        if ($cek) {
            // Jika sudah ada, update data lama
            $this->db->where('id', $cek->id);
            $this->db->update('laba_rugi', $data);

            $this->session->set_flashdata(
                'success',
                'Data laba bulan ini berhasil diperbarui.'
            );
        } else {
            // Jika belum ada, simpan data baru
            $this->db->insert('laba_rugi', $data);

            $this->session->set_flashdata(
                'success',
                'Data laba bulan ini berhasil disimpan.'
            );
        }

        redirect('Laporan/bulanan?bulan=' . $bulan . '&tahun=' . $tahun);
    }

    public function riwayat_laba()
    {
        $data['laba_rugi'] = $this->db
            ->order_by('tahun', 'DESC')
            ->order_by('bulan', 'DESC')
            ->get('laba_rugi')
            ->result();

        $this->load->view('laporan/riwayat_laba', $data);
    }

    public function print_riwayat_laba($id)
    {
        $data['laba'] = $this->db
            ->get_where('laba_rugi', ['id' => $id])
            ->row();

        if (!$data['laba']) {
            show_404();
        }

        $this->load->view('laporan/print_riwayat_laba', $data);
    }

    // ==========================
    // EDIT
    // ==========================
    public function edit($id)
    {
        $data['laporan'] =
            $this->db
            ->get_where('laporan_harian', ['id' => $id])
            ->row();

        $this->load->view('laporan/edit', $data);
    }

    // ==========================
    // UPDATE
    // ==========================
    public function update()
    {
        $id = $this->input->post('id');

        $data = [
            'nama'       => $this->input->post('nama'),
            'tanggal'    => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'lapak'      => $this->input->post('lapak'),
            'jumlah'     => $this->input->post('jumlah')
        ];

        $this->db->where('id', $id);
        $this->db->update('laporan_harian', $data);

        redirect('Laporan/data');
    }

    // ==========================
    // DELETE
    // ==========================
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('laporan_harian');

        redirect('Laporan/data');
    }
}
