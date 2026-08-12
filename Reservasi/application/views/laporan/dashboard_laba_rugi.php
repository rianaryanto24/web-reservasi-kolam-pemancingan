<div class="content mt-3">

    <!-- 🔥 CARD RINGKASAN -->
    <div class="row">

        <div class="col-md-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h5>Total Pemasukan</h5>
                    <h3>Rp <?= number_format($total_pemasukan, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <h5>Total Pengeluaran</h5>
                    <h3>Rp <?= number_format($total_pengeluaran, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h5>Total Laba</h5>
                    <h3>Rp <?= number_format($total_laba, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>

    </div>

    <!-- 🔥 TABEL HISTORY -->
    <div class="card mt-4 shadow">
        <div class="card-header bg-dark text-white">
            <i class="fa fa-table"></i> History Laba Rugi
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Pemasukan</th>
                        <th>Pengeluaran</th>
                        <th>Laba</th>
                        <th>Tipe</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1;
                    foreach ($history as $d): ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <td><?= $d->tanggal ?? '-' ?></td>
                            <td><?= $d->bulan ?? '-' ?></td>
                            <td><?= $d->tahun ?? '-' ?></td>

                            <td>Rp <?= number_format($d->pemasukan, 0, ',', '.') ?></td>

                            <td>Rp <?= number_format($d->pengeluaran, 0, ',', '.') ?></td>

                            <!-- 🔥 WARNA LABA -->
                            <td>
                                <?php if ($d->laba >= 0): ?>
                                    <span class="text-success">
                                        Rp <?= number_format($d->laba, 0, ',', '.') ?>
                                    </span>
                                <?php else: ?>
                                    <span class="text-danger">
                                        Rp <?= number_format($d->laba, 0, ',', '.') ?>
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <span class="badge badge-info">
                                    <?= strtoupper($d->tipe) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <a href="<?= site_url('Welcome/index') ?>"
                        class="btn btn-secondary">

                        <i class="fa fa-home"></i> Home

                    </a>
                </tbody>

            </table>

        </div>
    </div>

</div>