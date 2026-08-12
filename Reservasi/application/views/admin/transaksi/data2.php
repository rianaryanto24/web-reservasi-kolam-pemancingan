<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>



<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>
<style>
    .card-header {
        background: linear-gradient(135deg, #198754, #20c997);
    }

    .card-header h3,
    .card-header h4 {
        color: #fff;
        font-weight: bold;
    }

    .card-header p {
        color: #fff;
    }

    .btn-home {
        color: #fff;
        background: rgba(255, 255, 255, .15);
        padding: 8px 15px;
        border-radius: 5px;
    }

    .btn-home:hover {
        background: #fff;
        color: #198754;
    }
</style>


<div class="content mt-3">
    <div class="card shadow">
        <div class="card-header text-white" style="background:linear-gradient(135deg,#198754,#20c997);">
            <h3 class="mb-2 font-weight-bold">
                <i class="fa fa-check-circle"></i>
                Data Transaksi Confirm
            </h3>

            <p class="mb-3">
                Daftar pesanan pelanggan yang sudah dikonfirmasi.
            </p>
            <!--
            <a href="<?= site_url('Welcome/index'); ?>" class="btn-home">
                <i class="fa fa-home"></i> Kembali ke Home
            </a>
-->
        </div>

        <div class="card-body">

            <div class="alert alert-success">
                <i class="fa fa-list"></i>
                Data pesanan pelanggan yang sudah berhasil dikonfirmasi.
            </div>

            <div class="row mb-3 align-items-center">

                <div class="col-md-6">
                    <h5 class="mb-0">
                        Data Transaksi Confirm
                    </h5>
                </div>

                <div class="col-md-6 text-right">

                    <input
                        type="text"
                        id="searchConfirm"
                        class="form-control"
                        placeholder="🔍 Cari Data..."
                        style="width:250px; display:inline-block;">

                </div>

            </div>

            <div class="table-responsive">
                <table id="tbConfirm" class="table table-bordered table-hover">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>No</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Hari Pemancingan</th>
                            <th>Jam Pemancingan</th>
                            <th>Jumlah Lapak</th>
                            <th>Tipe Kolam</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telp</th>
                            <th>Status</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($result)) : ?>
                            <?php $no = 1; ?>
                            <?php foreach ($result as $row) : ?>
                                <tr class="data-row">
                                    <td><?= $no++; ?></td>

                                    <td>
                                        <?= !empty($row->tgl_in) ? date('d-M-Y', strtotime($row->tgl_in)) : '-'; ?>
                                    </td>

                                    <td>
                                        <?= !empty($row->tgl_out) ? date('d-M-Y', strtotime($row->tgl_out)) : '-'; ?>
                                    </td>

                                    <td><?= !empty($row->hari_pemancingan) ? $row->hari_pemancingan : '-'; ?></td>

                                    <td><?= !empty($row->jam_pemancingan) ? $row->jam_pemancingan : '-'; ?></td>

                                    <td>
                                        <span class="badge badge-info">
                                            <?= !empty($row->jumlah_lapak) ? $row->jumlah_lapak : 0; ?> Lapak
                                        </span>
                                    </td>

                                    <td><?= !empty($row->jenis_kolam) ? $row->jenis_kolam : '-'; ?></td>

                                    <td><?= !empty($row->nama) ? $row->nama : '-'; ?></td>

                                    <td><?= !empty($row->email) ? $row->email : '-'; ?></td>

                                    <td><?= !empty($row->no) ? $row->no : '-'; ?></td>

                                    <td>
                                        <span class="badge badge-success">
                                            <i class="fa fa-check"></i>
                                            <?= !empty($row->status) ? $row->status : 'Confirm'; ?>
                                        </span>
                                    </td>

                                    <td>
                                        <?php if (!empty($row->gambar)) : ?>
                                            <img
                                                src="<?= base_url('uploads/' . $row->gambar); ?>"
                                                class="img-thumbnail"
                                                style="width:90px;height:90px;object-fit:cover;"
                                                alt="Bukti">
                                        <?php else : ?>
                                            <span class="text-muted">Tidak ada gambar</span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <a
                                            href="<?= site_url('Transaksi/delete/' . $row->id); ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else : ?>
                            <tr>
                                <td colspan="13" class="empty-data">
                                    <i class="fa fa-check-circle"></i>
                                    Belum ada transaksi yang dikonfirmasi.
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
    document.getElementById("searchConfirm").addEventListener("keyup", function() {

        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll("#tbConfirm tbody tr");

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