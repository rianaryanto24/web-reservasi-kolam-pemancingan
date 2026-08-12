<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<!-- isi halaman -->
<div class="content mt-3">

    <div class="animated fadeIn">

        <div class="row">

            <div class="col-lg-8">

                <div class="card shadow">

                    <div class="card-header bg-info text-white">

                        <h4 class="mb-0">
                            <i class="fa fa-info-circle"></i>
                            Pengaturan Informasi Kolam
                        </h4>

                    </div>

                    <div class="card-body">

                        <div class="alert alert-info">

                            <i class="fa fa-lightbulb-o"></i>

                            Atur status kolam agar pelanggan mengetahui kondisi
                            kolam sebelum melakukan reservasi.

                        </div>

                        <form method="post"
                              action="<?= site_url('Info/update'); ?>">

                            <div class="form-group">

                                <label>
                                    <strong>Status Kolam</strong>
                                </label>

                                <select name="status"
                                        class="form-control">

                                    <option value="Buka"
                                        <?= ($info->status=='Buka')?'selected':''; ?>>
                                        🟢 Buka
                                    </option>

                                    <option value="Tutup"
                                        <?= ($info->status=='Tutup')?'selected':''; ?>>
                                        🔴 Tutup
                                    </option>

                                </select>

                            </div>

                            <div class="form-group">

                                <label>
                                    <strong>Keterangan</strong>
                                </label>

                                <select name="keterangan"
                                        class="form-control">

                                    <option value="Tersedia"
                                        <?= ($info->keterangan=='Tersedia')?'selected':''; ?>>
                                        ✅ Tersedia
                                    </option>

                                    <option value="Penuh"
                                        <?= ($info->keterangan=='Penuh')?'selected':''; ?>>
                                        ⚠️ Penuh
                                    </option>

                                </select>

                            </div>

                            <hr>

                            <button class="btn btn-info">

                                <i class="fa fa-save"></i>
                                Simpan

                            </button>

                            <a href="<?= site_url('Kolam/home'); ?>"
                               class="btn btn-secondary">

                                <i class="fa fa-arrow-left"></i>
                                Kembali

                            </a>

                        </form>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card shadow">

                    <div class="card-header bg-secondary text-white">

                        <i class="fa fa-eye"></i>
                        Preview

                    </div>

                    <div class="card-body text-center">

                        <?php if($info->status=="Buka"){ ?>

                            <h3 class="text-success">

                                <i class="fa fa-check-circle"></i><br>

                                BUKA

                            </h3>

                        <?php }else{ ?>

                            <h3 class="text-danger">

                                <i class="fa fa-times-circle"></i><br>

                                TUTUP

                            </h3>

                        <?php } ?>

                        <hr>

                        <h5>

                            <?= $info->keterangan; ?>

                        </h5>

                        <small class="text-muted">

                            Tampilan ini akan terlihat oleh pelanggan
                            pada halaman utama website.

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<?php $this->load->view('template/footer'); ?>