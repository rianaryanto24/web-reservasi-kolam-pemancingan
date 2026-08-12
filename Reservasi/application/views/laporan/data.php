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
                    <h4 class="mb-1"><i class="fa fa-file-text"></i> Data Laporan Pemesanan</h4>
                    <small>Daftar seluruh laporan pemesanan kolam pemancingan.</small>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <a href="<?= site_url('Laporan/harian'); ?>" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Input Laporan
                        </a>

                        <a href="<?= site_url('Welcome/index'); ?>" class="btn btn-secondary">
                            <i class="fa fa-home"></i> Home
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">

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
                                    <th>Aksi</th>
                                    <th>Print</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php $no = 1;
                                foreach ($laporan as $d): ?>

                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $d->nama; ?></td>
                                        <td><?= date('d-m-Y', strtotime($d->tanggal)); ?></td>
                                        <td><?= $d->hari_pemancingan; ?></td>
                                        <td><?= $d->jam_pemancingan; ?></td>
                                        <td><?= $d->keterangan; ?></td>
                                        <td class="text-center">
                                            <span class="badge badge-success"><?= $d->lapak; ?></span>
                                        </td>
                                        <td class="text-right text-success font-weight-bold">
                                            Rp <?= number_format($d->jumlah, 0, ',', '.'); ?>
                                        </td>

                                        <td class="text-center">
                                            <a href="<?= site_url('Laporan/edit/' . $d->id); ?>" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <a href="<?= site_url('Laporan/delete/' . $d->id); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <a href="<?= base_url('index.php/Laporan/print_satu/' . $d->id); ?>"
                                                target="_blank"
                                                class="btn btn-info btn-sm">
                                                <i class="fa fa-print"></i>
                                            </a>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>

                    <div class="alert alert-success mt-4">
                        <h5 class="mb-0">
                            Total Pendapatan
                            <span class="float-right">
                                Rp <?= number_format($total, 0, ',', '.'); ?>
                            </span>
                        </h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>