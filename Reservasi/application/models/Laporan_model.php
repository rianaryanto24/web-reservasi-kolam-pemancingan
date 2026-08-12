    <?php
class Laporan_model extends CI_Model {

    // PEMASUKAN dari laporan harian
    public function get_pemasukan()
    {
        $this->db->select_sum('jumlah');
        return $this->db->get('laporan_harian')->row()->jumlah;
    }

    // PENGELUARAN
    public function get_pengeluaran()
    {
        $this->db->select_sum('jumlah');
        return $this->db->get('pengeluaran')->row()->jumlah;
    }

    // SIMPAN LABA RUGI
    public function simpan_laba_rugi($data)
    {
        return $this->db->insert('laba_rugi', $data);
    }

    // AMBIL DATA LABA RUGI
    public function get_laba_rugi()
    {
        return $this->db->order_by('id','DESC')->get('laba_rugi')->result();
    }

}