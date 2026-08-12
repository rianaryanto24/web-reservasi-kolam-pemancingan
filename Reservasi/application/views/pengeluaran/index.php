<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!--
<head>
    <title>pengeluaran</title>
</head>
-->

<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow-lg border-0">

                <div class="card-header text-white"
                    style="background:linear-gradient(135deg,#198754,#20c997);">

                    <h4 class="mb-1">
                        <i class="fa fa-money"></i>
                        Data Pengeluaran
                    </h4>

                    <small>
                        Input dan kelola seluruh pengeluaran Kolam Pemancingan
                    </small>
                </div>

                <div class="card-body">

                    <?php echo $this->session->flashdata('msg'); ?>

                    <div class="form-title">Input Pengeluaran</div>


                    <form action="<?php echo base_url('index.php/Pengeluaran/simpan'); ?>" method="post">

                        <div class="form-group row mb-4">
                            <label class="col-md-3 col-form-label font-weight-bold">
                                Tanggal Pengeluaran
                            </label>

                            <div class="col-md-6">
                                <input
                                    type="date"
                                    name="tanggal"
                                    class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-md-3 col-form-label font-weight-bold">
                                Keterangan Pengeluaran
                            </label>

                            <div class="col-md-6">
                                <input
                                    type="text"
                                    name="keterangan"
                                    class="form-control"
                                    placeholder="Contoh : Beli pakan ikan"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-md-3 col-form-label font-weight-bold">
                                Jumlah Pengeluaran
                            </label>

                            <div class="col-md-6">
                                <input
                                    type="number"
                                    name="jumlah"
                                    class="form-control"
                                    placeholder="Contoh : 50000"
                                    min="0"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-3"></div>

                            <div class="col-md-6">

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    Simpan Pengeluaran
                                </button>

                                <a href="<?php echo base_url('index.php/Welcome/index'); ?>" class="btn btn-secondary">
                                    <i class="fa fa-home"></i>
                                    Kembali
                                </a>

                            </div>
                        </div>

                    </form>

                    <hr class="mt-5 mb-4">

                    <h4 class="font-weight-bold text-success mb-4">
                        <i class="fa fa-history"></i>
                        Riwayat Pengeluaran
                    </h4>
                    <form action="<?= base_url('index.php/Pengeluaran/index'); ?>" method="get" class="mb-4">

                        <div class="form-row align-items-end">

                            <!-- Cari Bulan -->
                            <div class="col-md-4">
                                <label class="font-weight-bold">Cari Bulan</label>

                                <select name="bulan" class="form-control">
                                    <option value="">Semua Bulan</option>

                                    <?php
                                    $nama_bulan = array(
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
                                    );

                                    foreach ($nama_bulan as $angka => $nama) {
                                        $selected = ($this->input->get('bulan') == $angka) ? 'selected' : '';
                                        echo '<option value="' . $angka . '" ' . $selected . '>' . $nama . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Tahun -->
                            <div class="col-md-4">
                                <label class="font-weight-bold">Tahun</label>

                                <input
                                    type="number"
                                    name="tahun"
                                    class="form-control"
                                    placeholder="Contoh : 2026"
                                    value="<?= $this->input->get('tahun'); ?>">
                            </div>

                            <!-- Tombol -->
                            <div class="col-md-4">
                                <label>&nbsp;</label>

                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Cari
                                    </button>

                                    <a href="<?= base_url('index.php/Pengeluaran/index'); ?>" class="btn btn-secondary">
                                        Reset
                                    </a>
                                </div>
                            </div>

                        </div>

                    </form>
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h5 class="mb-0 text-success">

                            <i class="fa fa-list"></i>

                            Data Pengeluaran

                        </h5>

                        <span class="badge badge-success">

                            <?= count($pengeluaran); ?> Data

                        </span>

                    </div>
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-striped mb-0">
                            <thead class="thead-dark">

                                <tr>

                                    <th width="60">No</th>

                                    <th width="150">Tanggal</th>

                                    <th>Keterangan</th>

                                    <th width="170" class="text-right">Jumlah</th>

                                    <th width="150" class="text-center">Opsi</th>

                                </tr>

                            </thead>
                            <tbody>
                                <?php if (!empty($pengeluaran)) : ?>

                                    <?php
                                    $no = 1;
                                    $total_pengeluaran = 0;
                                    ?>

                                    <?php foreach ($pengeluaran as $row) : ?>
                                        <?php $total_pengeluaran += (int)$row['jumlah']; ?>

                                        <tr>

                                            <td class="align-middle text-center">
                                                <?= $no++; ?>
                                            </td>

                                            <td class="align-middle">
                                                <?= date('d-m-Y', strtotime($row['tanggal'])); ?>
                                            </td>

                                            <td class="align-middle">
                                                <?= $row['keterangan']; ?>
                                            </td>

                                            <td class="align-middle text-right font-weight-bold text-success">
                                                Rp <?= number_format($row['jumlah'], 0, ',', '.'); ?>
                                            </td>

                                            <td class="align-middle text-center">

                                                <a href="<?= base_url('index.php/Pengeluaran/edit/' . $row['id']); ?>"
                                                    class="btn btn-warning btn-sm">

                                                    <i class="fa fa-pencil"></i>

                                                </a>

                                                <a href="<?= base_url('index.php/Pengeluaran/hapus/' . $row['id']); ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">

                                                    <i class="fa fa-trash"></i>

                                                </a>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                <?php else : ?>

                                    <?php $total_pengeluaran = 0; ?>

                                    <tr>
                                        <td colspan="5" class="empty-data">
                                            Belum ada data pengeluaran.
                                        </td>
                                    </tr>

                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="alert alert-success mt-4">

                        <h5 class="mb-0">

                            <i class="fa fa-money"></i>

                            Total Pengeluaran

                            <span class="float-right">

                                Rp <?= number_format($total_pengeluaran, 0, ',', '.'); ?>

                            </span>

                        </h5>

                    </div>

                </div>
            </div>
            <?php $this->load->view('template/footer'); ?>