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
                    <h4><i class="fa fa-calendar"></i> Laporan Bulanan</h4>
                    <small>Rekap laporan bulanan dan laba rugi.</small>
                </div>

                <div class="card-body">

                    <form method="get">
                        <div class="form-row align-items-end">

                            <div class="col-md-4">
                                <label>Bulan</label>
                                <select name="bulan" class="form-control">
                                    <?php
                                    $bulanList = [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'];
                                    foreach ($bulanList as $k => $v):
                                    ?>
                                        <option value="<?= $k; ?>" <?= ($this->input->get('bulan') == $k) ? 'selected' : ''; ?>><?= $v; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>Tahun</label>
                                <input type="number" name="tahun" value="<?= $this->input->get('tahun') ?: date('Y'); ?>" class="form-control">
                            </div>

                            <div class="col-md-5">
                                <button class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button>
                                <?php if (!empty($laporan)): ?>
                                    <a target="_blank" href="<?= site_url('Laporan/print_bulanan?bulan=' . $this->input->get('bulan') . '&tahun=' . $this->input->get('tahun')); ?>" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
                                <?php endif; ?>
                                <a href="<?= site_url('Welcome/index'); ?>" class="btn btn-secondary"><i class="fa fa-home"></i> Home</a>
                            </div>

                        </div>
                    </form>

                    <?php if (!empty($laporan)): ?>

                        <div class="table-responsive mt-4">
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
                                    <?php $no = 1;
                                    foreach ($laporan as $d): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $d->nama; ?></td>
                                            <td><?= date('d-m-Y', strtotime($d->tanggal)); ?></td>
                                            <td><?= !empty($d->hari_pemancingan) ? $d->hari_pemancingan : '-'; ?></td>
                                            <td><?= !empty($d->jam_pemancingan) ? $d->jam_pemancingan : '-'; ?></td>
                                            <td><?= $d->keterangan; ?></td>
                                            <td><span class="badge badge-success"><?= $d->lapak; ?></span></td>
                                            <td class="text-right font-weight-bold text-success">Rp <?= number_format($d->jumlah, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="alert alert-success"><strong>Total Penjualan</strong><br>Rp <?= number_format($total_bulanan, 0, ',', '.'); ?></div>
                            </div>
                            <div class="col-md-4">
                                <div class="alert alert-warning"><strong>Pengeluaran</strong><br>Rp <?= number_format($total_pengeluaran, 0, ',', '.'); ?></div>
                            </div>
                            <div class="col-md-4">
                                <div class="alert alert-primary"><strong>Laba Bersih</strong><br>Rp <?= number_format($total_bulanan - $total_pengeluaran, 0, ',', '.'); ?></div>
                            </div>
                        </div>

                        <form action="<?= base_url('index.php/Laporan/simpan_laba_bulanan'); ?>" method="post">
                            <input type="hidden" name="bulan" value="<?= $bulan; ?>">
                            <input type="hidden" name="tahun" value="<?= $tahun; ?>">
                            <input type="hidden" name="pemasukan" value="<?= $total_bulanan; ?>">
                            <input type="hidden" name="pengeluaran" value="<?= $total_pengeluaran; ?>">
                            <input type="hidden" name="laba" value="<?= $total_bulanan - $total_pengeluaran; ?>">

                            <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Laba Bulanan</button>
                            <a href="<?= base_url('index.php/Laporan/riwayat_laba'); ?>" class="btn btn-primary"><i class="fa fa-history"></i> Riwayat Laba</a>
                        </form>

                        <div class="card mt-4">
                            <div class="card-header bg-dark text-white"><i class="fa fa-bar-chart"></i> Grafik Keuangan Bulanan</div>
                            <div class="card-body">
                                <canvas id="chartKeuangan"></canvas>
                            </div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            new Chart(document.getElementById('chartKeuangan'), {
                                type: 'bar',
                                data: {
                                    labels: ['Penjualan', 'Pengeluaran', 'Laba Bersih'],
                                    datasets: [{
                                        data: [<?= $total_bulanan ?>, <?= $pengeluaran_bulan ?>, <?= $total_bulanan - $pengeluaran_bulan ?>],
                                        backgroundColor: ['#28a745', '#ffc107', '#007bff']
                                    }]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            display: false
                                        }
                                    },
                                    responsive: true
                                }
                            });
                        </script>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>