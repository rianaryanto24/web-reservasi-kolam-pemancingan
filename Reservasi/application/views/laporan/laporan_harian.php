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
                    <h4 class="mb-1"><i class="fa fa-file-text"></i> Laporan Harian</h4>
                    <small>Rekap laporan harian pemancingan.</small>
                </div>

                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-md-8">
                            <form method="get" action="<?= site_url('Laporan/laporan_harian'); ?>">
                                <div class="form-row align-items-end">
                                    <div class="col-md-4">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" value="<?= $this->input->get('tanggal'); ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <button class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button>
                                        <?php if ($this->input->get('tanggal')): ?>
                                            <a href="<?= site_url('Laporan/print_harian?tanggal=' . $this->input->get('tanggal')); ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
                                        <?php endif; ?>
                                        <a href="<?= site_url('Welcome/index'); ?>" class="btn btn-secondary"><i class="fa fa-home"></i> Home</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Keterangan</th>
                                    <th>Lapak</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($laporan)): $no = 1;
                                    foreach ($laporan as $d): ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $d->nama; ?></td>
                                            <td><?= date('d-m-Y', strtotime($d->tanggal)); ?></td>
                                            <td><?= !empty($d->hari_pemancingan) ? $d->hari_pemancingan : '-'; ?></td>
                                            <td><?= !empty($d->jam_pemancingan) ? $d->jam_pemancingan : '-'; ?></td>
                                            <td><?= $d->keterangan; ?></td>
                                            <td><span class="badge badge-success"><?= $d->lapak; ?></span></td>
                                            <td class="text-right font-weight-bold text-success">Rp <?= number_format($d->jumlah, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php endforeach;
                                else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="alert alert-success mt-4">
                        <strong>Total Pendapatan :</strong>
                        <span class="float-right">Rp <?= number_format($total, 0, ',', '.'); ?></span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>