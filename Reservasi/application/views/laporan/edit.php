<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<head>
    <meta charset="UTF-8">
    <title>Edit Laporan Pemesanan</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="icon" href="<?= base_url() ?>/images/logo1.png">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="content mt-3">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                <i class="fa fa-edit"></i>
                Edit Laporan
            </h4>
        </div>

        <div class="card-body">

            <form action="<?= site_url('Laporan/update') ?>" method="post">

                <input type="hidden" name="id" value="<?= $laporan->id ?>">

                <div class="form-group">
                    <label><b>Nama</b></label>
                    <input type="text"
                        name="nama"
                        value="<?= $laporan->nama ?>"
                        class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label><b>Tanggal</b></label>
                    <input type="date"
                        name="tanggal"
                        value="<?= $laporan->tanggal ?>"
                        class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label><b>Keterangan</b></label>
                    <input type="text"
                        name="keterangan"
                        value="<?= $laporan->keterangan ?>"
                        class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label><b>Jumlah</b></label>
                    <input type="number"
                        name="jumlah"
                        value="<?= $laporan->jumlah ?>"
                        class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label><b>Lapak</b></label>
                    <input type="number"
                        name="lapak"
                        value="<?= $laporan->lapak ?>"
                        class="form-control"
                        required>
                </div>

                <hr>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update
                </button>

                <a href="<?= site_url('Laporan/data') ?>" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>

            </form>

        </div>

    </div>

</div>

<?php $this->load->view('template/footer'); ?>