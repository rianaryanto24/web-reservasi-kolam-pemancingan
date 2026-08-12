<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="content mt-3">

    <!-- Left Panel -->

    <!-- Right Panel -->



        <!-- Header-->
        <div class="container-fluid">

            <div class="row justify-content-center">

                <div class="col-lg-10">

                    <div class="card shadow">

                        <div class="card-header bg-primary text-white">

                            <h4 class="mb-0">
                                <i class="fa fa-pencil"></i>
                                Input Laporan Harian
                            </h4>

                        </div>

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="<?= site_url('Welcome/index'); ?>" class="btn btn-outline-primary">
                                    <i class="fa fa-home"></i> Home
                                </a>
                            </div>

                            <?php if ($this->session->flashdata('msg')): ?>
                                <div class="alert alert-info">
                                    <?= $this->session->flashdata('msg'); ?>
                                </div>
                            <?php endif; ?>

                            <a href="<?= site_url('Laporan/data'); ?>" class="btn btn-success">
                                <i class="fa fa-table"></i> Data Laporan
                            </a>

                            <form action="<?= site_url('Laporan/simpan'); ?>" method="post">

                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-user"></i>
                                        Nama
                                    </label>
                                    <input type="text"
                                        name="nama"
                                        class="form-control"
                                        placeholder="Masukkan nama"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-calendar"></i>
                                        Tanggal
                                    </label>
                                    <input type="date"
                                        name="tanggal"
                                        class="form-control"
                                        required>
                                </div>

                                <!-- TAMBAHAN INPUT HARI PEMANCINGAN -->
                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-clock-o"></i>
                                        Hari Pemancingan
                                    </label>
                                    <input type="text"
                                        name="hari_pemancingan"
                                        class="form-control"
                                        placeholder="Contoh: Senin"
                                        required>
                                </div>

                                <!-- TAMBAHAN INPUT JAM PEMANCINGAN -->
                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-clock-o"></i>
                                        Jam Pemancingan
                                    </label>
                                    <input type="text"
                                        name="jam_pemancingan"
                                        class="form-control"
                                        placeholder="Contoh: 13:00 - 17:00"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>
                                    <i class="fa fa-map-marker"></i>
                                    Keteangan
                                    </label>
                                    <input type="text"
                                        name="keterangan"
                                        class="form-control"
                                        placeholder="Masukkan keterangan"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-map-marker"></i>
                                        Lapak
                                    </label>
                                    <input type="number"
                                        name="lapak"
                                        class="form-control"
                                        min="1"
                                        placeholder="Masukkan jumlah lapak"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-money"></i>
                                        Jumlah
                                    </label>
                                    <input type="number"
                                        name="jumlah"
                                        class="form-control"
                                        min="0"
                                        placeholder="Masukkan Total Harga Ikan"
                                        required>
                                </div>

                                <button class="btn btn-primary btn-lg">

                                    <i class="fa fa-save"></i>

                                    Simpan Laporan

                                </button>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>




<?php $this->load->view('template/footer'); ?>