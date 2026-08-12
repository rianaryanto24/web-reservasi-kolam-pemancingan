<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    public function get_all_jadwal()
    {
        return $this->db
            ->select('
                jadwal_pemancingan.*,
                kolam.jenis_kolam,
                transaksi.nama,
                transaksi.email
            ')
            ->from('jadwal_pemancingan')
            ->join(
                'kolam',
                'kolam.id = jadwal_pemancingan.id_kolam',
                'left'
            )
            ->join(
                'transaksi',
                'transaksi.id = jadwal_pemancingan.id_transaksi',
                'left'
            )
            ->order_by('jadwal_pemancingan.tanggal', 'ASC')
            ->order_by('jadwal_pemancingan.jam_mulai', 'ASC')
            ->get()
            ->result();
    }

    public function get_jadwal_aktif()
    {
        return $this->db
            ->select('
                jadwal_pemancingan.*,
                kolam.jenis_kolam
            ')
            ->from('jadwal_pemancingan')
            ->join(
                'kolam',
                'kolam.id = jadwal_pemancingan.id_kolam',
                'left'
            )
            ->where('jadwal_pemancingan.status', 'Aktif')
            ->order_by('jadwal_pemancingan.tanggal', 'ASC')
            ->order_by('jadwal_pemancingan.jam_mulai', 'ASC')
            ->get()
            ->result();
    }

    public function get_transaksi_confirm()
    {
        return $this->db
            ->select('
                transaksi.*,
                kolam.jenis_kolam
            ')
            ->from('transaksi')
            ->join('kolam', 'kolam.id = transaksi.id_kolam', 'left')
            ->where('transaksi.status', 'Confirm')
            ->where_not_in(
                'transaksi.id',
                'SELECT id_transaksi FROM jadwal_pemancingan',
                false
            )
            ->order_by('transaksi.id', 'DESC')
            ->get()
            ->result();
    }
}
