<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <div class="card shadow-lg border-0">

                <div class="card-header text-white" style="background:linear-gradient(135deg,#198754,#20c997);">
                    <h4><i class="fa fa-history"></i> Riwayat Laba Bulanan</h4>
                    <small>Riwayat hasil laba bulanan kolam pemancingan.</small>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <a href="<?= base_url('index.php/Laporan/bulanan'); ?>" class="btn btn-primary">
                            <i class="fa fa-arrow-left"></i> Laporan Bulanan
                        </a>

                        <a href="<?= base_url('index.php/Welcome/index'); ?>" class="btn btn-secondary">
                            <i class="fa fa-home"></i> Home
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">

                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Total Penjualan</th>
                                    <th>Pengeluaran</th>
                                    <th>Laba Bersih</th>
                                    <th>Tanggal Simpan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $nama_bulan = [
                                    1 => 'Januari',
                                    2 => 'Februari',
                                    3 => 'Maret',
                                    4 => 'April',
                                    5 => 'Mei',
                                    6 => 'Juni',
                                    7 => 'Juli',
                                    8 => 'Agustus',
                                    9 => 'September',
                                    10 => 'Oktober',
                                    11 => 'November',
                                    12 => 'Desember'
                                ];
                                ?>

                                <?php if (!empty($laba_rugi)): $no = 1;
                                    foreach ($laba_rugi as $row): ?>

                                        <tr>

                                            <td class="text-center"><?= $no++; ?></td>

                                            <td><?= $nama_bulan[$row->bulan]; ?></td>

                                            <td class="text-center"><?= $row->tahun; ?></td>

                                            <td class="text-right text-success font-weight-bold">
                                                Rp <?= number_format($row->pemasukan, 0, ',', '.'); ?>
                                            </td>

                                            <td class="text-right text-warning font-weight-bold">
                                                Rp <?= number_format($row->pengeluaran, 0, ',', '.'); ?>
                                            </td>

                                            <td class="<?= $row->laba >= 0 ? 'text-success' : 'text-danger'; ?> font-weight-bold text-right">
                                                Rp <?= number_format($row->laba, 0, ',', '.'); ?>
                                            </td>

                                            <td><?= date('d-m-Y H:i', strtotime($row->created_at)); ?></td>

                                            <td class="text-center">
                                                <a href="<?= site_url('Laporan/print_riwayat_laba/' . $row->id); ?>"
                                                    target="_blank"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-print"></i> Print
                                                </a>
                                            </td>

                                        </tr>

                                    <?php endforeach;
                                else: ?>

                                    <tr>
                                        <td colspan="8" class="text-center">
                                            Belum ada data laba bulanan.
                                        </td>
                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>