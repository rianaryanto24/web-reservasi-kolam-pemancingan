<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>
    <?php
    $jenis = '';
    $harga = '';
    $jumlah = '';


    if (isset($klm)) {
        $id = $klm->id;
        $jenis_kolam = $klm->jenis_kolam;
        $harga = $klm->harga;
        $jumlah_lapak = $klm->jumlah_lapak;
    }
    ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Ubah Data</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?= site_url('Pelanggan/read') ?>">Kembali</a></li>
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
                                            <h3 class="text-center">Ubah Data Pelanggan <?= $detail->nama ?></h3>
                                        </div>
                                        <hr>
                                        <form action="<?= site_url('Pelanggan/update/' . $detail->id) ?>" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <img src="<?= base_url('images/pelanggan/' . $detail->gambar) ?>" width="200px" height="200px">
                                            </div>
                                            <input type="hidden" name="id" value="<?= $detail->id ?>">
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Nama Lengkap</label>
                                                <input id="cc-name" value="<?= $detail->nama ?>" name="nama" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Email</label>
                                                <input id="cc-number" name="email" type="tel" class="form-control" value="<?= $detail->email ?>">
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">No. Telp</label>
                                                        <input id="cc-exp" name="no" type="tel" class="form-control " value="<?= $detail->no ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Password</label>
                                                            <input type="password"
                                                                name="password"
                                                                class="form-control"
                                                                placeholder="Kosongkan jika tidak ingin mengganti password">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Hak Akses</label>
                                                            <select id="cc-exp" name="akses" class="form-control ">
                                                                <option>Admin</option>
                                                                <option>User</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
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