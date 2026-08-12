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

                <div class="card-header text-white"
                    style="background:linear-gradient(135deg,#198754,#20c997);">

                    <h4 class="mb-1">
                        <i class="fa fa-pencil"></i>
                        Edit Data Pengeluaran
                    </h4>

                    <small>
                        Perbarui data pengeluaran Kolam Pemancingan
                    </small>

                </div>

                <div class="card-body">

                    <form action="<?= base_url('index.php/Pengeluaran/update'); ?>" method="post">

                        <input type="hidden"
                            name="id"
                            value="<?= $pengeluaran['id']; ?>">

                        <div class="form-group row mb-4">

                            <label class="col-md-3 col-form-label font-weight-bold">
                                Tanggal Pengeluaran
                            </label>

                            <div class="col-md-6">
                                <input
                                    type="date"
                                    name="tanggal"
                                    class="form-control"
                                    value="<?= $pengeluaran['tanggal']; ?>"
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
                                    value="<?= $pengeluaran['keterangan']; ?>"
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
                                    value="<?= $pengeluaran['jumlah']; ?>"
                                    required>
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-3"></div>

                            <div class="col-md-6">

                                <button type="submit" class="btn btn-success">

                                    <i class="fa fa-save"></i>
                                    Simpan Perubahan

                                </button>

                                <a href="<?= base_url('index.php/Pengeluaran/index'); ?>"
                                    class="btn btn-secondary">

                                    <i class="fa fa-arrow-left"></i>
                                    Kembali

                                </a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

<?php $this->load->view('template/footer'); ?>