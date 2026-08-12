<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<style>
    /* Header tabel */
    .table thead th {
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: #fff;
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
        border: none;
    }

    /* Isi tabel */
    .table tbody td {
        text-align: center;
        vertical-align: middle;
    }

    /* Hover */
    .table-hover tbody tr:hover {
        background-color: #f4f6f9;
    }
</style>
<div class="content mt-3">

    <div class="animated fadeIn">

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white">

                        <h3 class="card-title mb-0">
                            <i class="fa fa-image"></i>
                            Bukti Pembayaran Pelanggan
                        </h3>

                    </div>

                    <div class="card-body">
                        <div class="row mb-3 align-items-center">

                            <div class="col-md-5">

                                <h4 class="mb-0">
                                    Data Bukti Transfer Pelanggan
                                </h4>

                            </div>

                            <div class="col-md-7">

                                <div class="d-flex justify-content-end">

                                    <input
                                        type="text"
                                        id="searchTable"
                                        class="form-control"
                                        placeholder="🔍 Cari Data..."
                                        style="width:250px; margin-right:10px;">

                                    <a href="<?= current_url(); ?>" class="btn btn-success">

                                        <i class="fa fa-refresh"></i>

                                        Refresh

                                    </a>

                                </div>

                            </div>

                        </div>

                        <div class="card-body-bukti">

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Hari Pemancingan</th>
                                            <th>Jam Pemancingan</th>
                                            <th>Kolam</th>
                                            <th>Lapak</th>
                                            <th>Status</th>
                                            <th>Bukti Transfer</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if (!empty($transaksi)) : ?>
                                            <?php $no = 1; ?>

                                            <?php foreach ($transaksi as $row) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>

                                                    <td><?= $row->nama; ?></td>

                                                    <td><?= $row->email; ?></td>

                                                    <td><?= $row->no; ?></td>

                                                    <td>
                                                        <?= !empty($row->tgl_in)
                                                            ? date('d-m-Y', strtotime($row->tgl_in))
                                                            : '-'; ?>
                                                    </td>

                                                    <td>
                                                        <?= !empty($row->tgl_out)
                                                            ? date('d-m-Y', strtotime($row->tgl_out))
                                                            : '-'; ?>
                                                    </td>

                                                    <td>
                                                        <?= !empty($row->hari_pemancingan)
                                                            ? $row->hari_pemancingan
                                                            : '-'; ?>
                                                    </td>

                                                    <td>
                                                        <?= !empty($row->jam_pemancingan)
                                                            ? $row->jam_pemancingan
                                                            : '-'; ?>
                                                    </td>

                                                    <td>
                                                        <?= !empty($row->jenis_kolam)
                                                            ? $row->jenis_kolam
                                                            : '-'; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?= !empty($row->jumlah_lapak)
                                                            ? $row->jumlah_lapak
                                                            : '0'; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php if ($row->status == 'Confirm') : ?>

                                                            <span class="badge badge-success">

                                                                <i class="fa fa-check-circle"></i>
                                                                Confirm

                                                            </span>

                                                        <?php else : ?>

                                                            <span class="badge badge-warning">

                                                                <i class="fa fa-clock-o"></i>
                                                                Pending

                                                            </span>

                                                        <?php endif; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php if (!empty($row->gambar)) : ?>
                                                            <a href="<?= base_url('uploads/' . $row->gambar); ?>"
                                                                target="_blank">

                                                                <img
                                                                    src="<?= base_url('uploads/' . $row->gambar); ?>"
                                                                    class="img-thumbnail"
                                                                    style="width:90px;height:90px;object-fit:cover;">

                                                            </a>
                                                        <?php else : ?>
                                                            <span class="text-muted">
                                                                Tidak ada bukti
                                                            </span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        <?php else : ?>
                                            <tr>
                                                <i class="fa fa-folder-open fa-2x"></i>

                                                <br><br>

                                                Belum ada bukti pembayaran dari pelanggan.
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>

                <script>
                    document.getElementById("searchTable").addEventListener("keyup", function() {

                        var keyword = this.value.toLowerCase();

                        var rows = document.querySelectorAll("table tbody tr");

                        rows.forEach(function(row) {

                            var text = row.innerText.toLowerCase();

                            row.style.display = text.indexOf(keyword) > -1 ? "" : "none";

                        });

                    });
                </script>

                <?php $this->load->view('template/footer'); ?>