<?php
// =====================================================
// Versi UI Modern - Transaksi Pending
// NOTE:
// File ini merupakan template awal yang mempertahankan
// logika asli. Silakan salin isi <tbody> dari file lama
// jika ingin mempertahankan seluruh proses CRUD.
// =====================================================

$this->load->view('template/header');
$this->load->view('template/sidebar');
$this->load->view('template/topbar');
?>

<div class="content-wrapper">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-info text-white">
            <h4 class="mb-1"><i class="fa fa-clock-o"></i> Data Transaksi Pending</h4>
            <small>Daftar transaksi yang menunggu konfirmasi admin</small>
        </div>

        <div class="card-body">

            <?php if ($this->session->flashdata('msg')) : ?>
                <?= $this->session->flashdata('msg'); ?>
            <?php endif; ?>
            <!--
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <a href="<?= site_url('Welcome/index'); ?>" class="btn btn-secondary">
                    <i class="fa fa-home"></i> Kembali ke Home
                </a>
            -->
            <div class="row mb-3">

                <div class="col-md-6">

                    <div class="alert alert-warning mb-0">

                        <i class="fa fa-list"></i>

                        <strong>Total Pending :</strong>

                        <span class="badge badge-danger">

                            <?= count($result); ?>

                        </span>

                        Pesanan

                    </div>

                </div>

                <div class="col-md-6 text-right">

                    <input
                        type="text"
                        id="searchPending"
                        class="form-control"
                        placeholder="🔍 Cari Data..."
                        style="width:250px; display:inline-block;">

                </div>

            </div>

            <div class="table-responsive">
                <table id="tbPending" class="table table-bordered table-hover">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>No</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Lapak</th>
                            <th>Tipe Kolam</th>
                            <th>Pelanggan</th>
                            <th>No. Telp</th>
                            <th>Status</th>
                            <th>Bukti</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($result)) : ?>
                            <?php $no = 1;
                            foreach ($result as $row): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= !empty($row->tgl_in) ? date('d-m-Y', strtotime($row->tgl_in)) : '-'; ?></td>
                                    <td><?= !empty($row->tgl_out) ? date('d-m-Y', strtotime($row->tgl_out)) : '-'; ?></td>
                                    <td><?= !empty($row->hari_pemancingan) ? $row->hari_pemancingan : '-'; ?></td>
                                    <td><?= !empty($row->jam_pemancingan) ? $row->jam_pemancingan : '-'; ?></td>
                                    <td><span class="badge badge-primary"><?= $row->jumlah_lapak; ?> Lapak</span></td>
                                    <td><?= !empty($row->jenis_kolam) ? $row->jenis_kolam : '-'; ?></td>
                                    <td>
                                        <strong><?= $row->nama; ?></strong><br>
                                        <small><?= $row->email; ?></small>
                                    </td>
                                    <td><?= $row->no; ?></td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                    <td>
                                        <?php if (!empty($row->gambar)): ?>
                                            <a target="_blank" href="<?= base_url('uploads/' . $row->gambar); ?>">
                                                <img src="<?= base_url('uploads/' . $row->gambar); ?>" style="width:90px;height:90px;object-fit:cover;border-radius:8px;">
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">Belum upload</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('Transaksi/edit/' . $row->id); ?>" class="btn btn-success btn-sm mb-1" onclick="return confirm('Yakin ingin mengkonfirmasi transaksi pelanggan ini?')">
                                            <i class="fa fa-check"></i> Konfirmasi
                                        </a><br>
                                        <a href="<?= site_url('Transaksi/delete/' . $row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="12" class="text-center py-5">
                                    <i class="fa fa-inbox fa-4x text-secondary"></i>
                                    <h4 class="mt-3">Belum Ada Transaksi Pending</h4>
                                    <p class="text-muted">Pesanan pelanggan akan muncul di halaman ini.</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("searchPending").addEventListener("keyup", function() {

        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll("#tbPending tbody tr");

        rows.forEach(function(row) {

            let text = row.textContent.toLowerCase();

            if (text.indexOf(value) > -1) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }

        });

    });
</script>
<?php $this->load->view('template/footer'); ?>