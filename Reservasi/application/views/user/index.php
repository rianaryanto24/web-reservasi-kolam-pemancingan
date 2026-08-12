<?php $this->load->view('user/header'); ?>

<style>
    html {
        scroll-behavior: smooth;
    }

    #daftar-kolam {
        scroll-margin-top: 80px;
    }

    .payment-box {
        padding: 25px 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, .08);
        margin-bottom: 25px;
    }

    .payment-box i {
        font-size: 32px;
        color: #20b8e8;
        margin-bottom: 15px;
    }

    .payment-box h4 {
        font-weight: 600;
        margin-bottom: 10px;
    }

    .payment-box p {
        color: #777;
        line-height: 1.7;
        margin-bottom: 8px;
    }

    .payment-number {
        display: inline-block;
        padding: 8px 18px;
        background: #20b8e8;
        color: #fff;
        border-radius: 20px;
        text-decoration: none !important;
        font-weight: bold;
        font-size: 14px;
    }

    .payment-number:hover {
        background: #159fc9;
        color: #fff;
    }

    .payment-number i {
        color: #fff;
        font-size: 14px;
        margin: 0 5px 0 0;
    }

    .payment-note {
        margin-top: 10px;
        padding: 15px 20px;
        background: #fff8df;
        border-left: 4px solid #f0ad4e;
        text-align: left;
    }

    .kolam-heading {
        margin-top: 65px;
    }
</style>


<!-- =====================================================
     TENTANG
====================================================== -->

<div class="about-section text-center ptb-80 white_bg">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="section-title mb-80">

                    <h2>Tentang <span>KPMC</span></h2>

                    <p>
                        Aplikasi ini dirancang untuk memenuhi tugas akhir skripsi.
                    </p>

                </div>

            </div>


            <div class="col-md-12">

                <div class="about-chondo">

                    <div class="about-member">

                        <img
                            src="<?= base_url('assets/images/yan.jpg'); ?>"
                            alt="Developer">

                        <h3>RIAN ARYANTO</h3>

                        <h5 class="mb-0">Developer</h5>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- =====================================================
     INFORMASI PEMBAYARAN
====================================================== -->

<div class="our-room text-center ptb-80 white-bg">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="section-title mb-50">

                    <h2>
                        Informasi <span>Pembayaran</span>
                    </h2>

                    <p>
                        Sebelum melakukan reservasi, pelanggan diharapkan
                        memperhatikan ketentuan pembayaran yang berlaku
                        di Kolam Pemancingan KPMC DF.
                    </p>

                </div>

            </div>

        </div>


        <!-- =================================================
             CARD PEMBAYARAN
        ================================================== -->

        <div class="row">

            <!-- DP -->

            <div class="col-md-4">

                <div class="payment-box">

                    <i class="fa fa-money"></i>

                    <h4>DP Minimal 25%</h4>

                    <p>
                        Pelanggan dapat melakukan pembayaran
                        uang muka minimal sebesar 25% dari
                        harga lapak yang dipesan.
                    </p>

                </div>

            </div>


            <!-- FULL PAYMENT -->

            <div class="col-md-4">

                <div class="payment-box">

                    <i class="fa fa-credit-card"></i>

                    <h4>Full Payment</h4>

                    <p>
                        Pelanggan juga dapat melakukan
                        pembayaran penuh sesuai dengan total
                        harga lapak yang dipesan.
                    </p>

                </div>

            </div>


            <!-- DANA -->

            <div class="col-md-4">

                <div class="payment-box">

                    <i class="fa fa-mobile"></i>

                    <h4>Pembayaran DANA</h4>

                    <p>
                        Silakan melakukan pembayaran melalui
                        aplikasi DANA menggunakan nomor yang
                        telah disediakan.
                    </p>


                    <!-- NOMOR WHATSAPP -->

                    <a
                        href="https://wa.me/6285759400256?text=Halo%2C%20saya%20ingin%20melakukan%20pembayaran%20reservasi%20Kolam%20Pemancingan%20KPMC%20DF."
                        target="_blank"
                        class="payment-number">

                        <i class="fa fa-whatsapp"></i>

                        085759400256

                    </a>


                    <br>
                    <br>


                    <!-- TOMBOL DANA -->

                    <a
                        href="https://link.dana.id/"
                        target="_blank"
                        class="payment-number">

                        <i class="fa fa-credit-card"></i>

                        Bayar dengan DANA

                    </a>

                </div>

            </div>

        </div>


        <!-- =================================================
             PERHATIAN PEMBAYARAN
        ================================================== -->

        <div class="row">

            <div class="col-md-12">

                <div class="payment-note">

                    <strong>

                        <i class="fa fa-info-circle"></i>

                        Perhatian:

                    </strong>

                    Pelanggan yang melakukan reservasi atau
                    pemesanan lapak diharapkan melakukan
                    pembayaran DP atau full payment terlebih
                    dahulu sebelum melakukan reservasi.

                </div>

            </div>

        </div>


        <!-- =================================================
             JENIS KOLAM
        ================================================== -->

        <div
            id="daftar-kolam"
            class="kolam-heading">

            <div class="row">

                <div class="col-md-12">

                    <div class="section-title mb-75">

                        <h2>
                            Jenis <span>Kolam</span>
                        </h2>

                        <p>
                            Kami menyediakan jenis kolam ikan mas
                            sebagai sarana hiburan bagi anak,
                            remaja hingga orang tua.
                        </p>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 DAFTAR KOLAM
            ================================================== -->

            <div class="our-room-show">

                <div class="row">

                    <div class="carousel-list">

                        <?php if (!empty($kolam)): ?>

                            <?php foreach ($kolam as $klm): ?>

                                <div class="col-md-4">

                                    <div class="single-room">

                                        <!-- GAMBAR KOLAM -->

                                        <div class="room-img">

                                            <a href="#">

                                                <img
                                                    src="<?= base_url('images/kolam/' . $klm->gambar); ?>"
                                                    alt="<?= $klm->jenis_kolam; ?>">

                                            </a>

                                        </div>


                                        <!-- INFORMASI KOLAM -->

                                        <div class="room-desc">

                                            <div class="room-name">

                                                <h3>

                                                    <a href="#">
                                                        <?= $klm->jenis_kolam; ?>
                                                    </a>

                                                </h3>

                                            </div>


                                            <div class="room-rent">

                                                <h6>

                                                    Rp
                                                    <?= number_format(
                                                        $klm->harga,
                                                        0,
                                                        ',',
                                                        '.'
                                                    ); ?>

                                                    / <label>Lapak</label>

                                                </h6>


                                                <h6>

                                                    Stok Lapak:

                                                    <strong>
                                                        <?= $klm->stok; ?>
                                                    </strong>

                                                </h6>

                                            </div>


                                            <!-- TOMBOL PESAN -->

                                            <div class="room-book">

                                                <?php if ($klm->stok > 0): ?>

                                                    <a
                                                        href="<?= site_url('Auth/booking/' . $klm->id); ?>">

                                                        <i class="fa fa-calendar"></i>

                                                        Pesan

                                                    </a>

                                                <?php else: ?>

                                                    <a
                                                        href="#"
                                                        style="
                                                            background:#d9534f;
                                                            cursor:not-allowed;
                                                        ">

                                                        <i class="fa fa-ban"></i>

                                                        Lapak Penuh

                                                    </a>

                                                <?php endif; ?>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <div class="col-md-12">

                                <h4>
                                    Data kolam belum tersedia.
                                </h4>

                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<?php $this->load->view('user/footer'); ?>