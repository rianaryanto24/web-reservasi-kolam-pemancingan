<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Ubah Data Kolam Pemancingan DF</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="<?= site_url('Kolam/read') ?>">Kembali</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Ubah Data Kolam <?= $detail->jenis_kolam ?></h3>
                                    </div>
                                    <hr>
                                    <form action="<?= site_url('Kolam/update/' . $detail->id) ?>" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <img src="<?= base_url('images/kolam/' . $detail->gambar) ?>" width="450px" height="280px">
                                        </div>
                                        <input type="hidden" name="id" value="<?= $detail->id ?>">
                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1">Jenis Kolam</label>
                                            <input id="cc-name" value="<?= $detail->jenis_kolam ?>" name="jenis_kolam" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Harga</label>
                                            <input id="cc-number" name="harga" type="tel" class="form-control" value="<?= $detail->harga ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Jumlah Lapak</label>
                                                    <input id="cc-exp" name="jumlah_lapak" type="tel" class="form-control " value="<?= $detail->jumlah_lapak ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="x_card_code" class="control-label mb-1">File Gambar</label>
                                                <div class="input-group">
                                                    <input id="x_card_code" name="gambar" type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <input name="simpan" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" value="Simpan">
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer'); ?>