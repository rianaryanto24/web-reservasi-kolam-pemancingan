<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Selamat Datang</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/core.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/shortcode/shortcodes.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style-customizer.css'); ?>">

    <!-- ini logo untuk pengganti logo xampp -->
    <link rel="icon" href="<?= base_url() ?>/images/logo1.png">

    <script src="<?= base_url('assets/js/vendor/modernizr-2.8.3.min.js'); ?>"></script>

    <style>
        .header-section {
            background-size: cover;
            background-attachment: fixed;
        }

        .header-section.height-vh {
            height: 100vh;
        }

        .header-section,
        .menu .search-bar,
        .b-date,
        .select-book {
            position: relative;
        }

        .footer {
            background-size: cover;
            background-attachment: fixed;
        }

        .footer-bg-opacity {
            background: rgba(0, 0, 0, 0.8) none repeat scroll 0 0;
        }

        .info-kolam-box {
            margin: 15px;
            padding: 20px;
            border-radius: 5px;
            color: #ffffff;
        }

        .info-kolam-box.buka {
            background: #dff0d8;
            color: #333;
        }

        .info-kolam-box.tutup {
            background: #f2dede;
            color: #333;
        }

        .btn-jadwal {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #3db9ea;
            color: #ffffff !important;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-jadwal:hover {
            background: #269fcf;
            color: #ffffff !important;
        }
    </style>
</head>

<body>

    <!-- PRELOADER -->
    <div class="preloader">
        <div class="loading-center">
            <div class="loading-center-absolute">
                <div class="object object_one"></div>
                <div class="object object_two"></div>
                <div class="object object_three"></div>
            </div>
        </div>
    </div>

    <!-- INFORMASI KOLAM -->
    <?php if (!empty($info)): ?>

        <div class="container-fluid">

            <div class="info-kolam-box <?= ($info->status == 'Tutup') ? 'tutup' : 'buka'; ?>">

                <div class="row">

                    <div class="col-md-1 text-center">
                        <i class="fa fa-info-circle" style="font-size:50px;"></i>
                    </div>

                    <div class="col-md-8">

                        <h3>Informasi Kolam</h3>
                        <p>
                            Status:
                            <strong><?= $info->status; ?></strong>
                        </p>

                        <p>
                            Kondisi:
                            <strong><?= $info->keterangan; ?></strong>
                        </p>

                        <p>
                            <?php if ($info->status == 'Tutup'): ?>
                                Mohon maaf, kolam sedang ditutup sementara.
                            <?php elseif ($info->keterangan == 'Penuh'): ?>
                                Kolam saat ini penuh, silakan datang lain waktu.
                            <?php else: ?>
                                Kolam tersedia, silakan melakukan reservasi 😊
                            <?php endif; ?>
                        </p>

                        <a href="<?= site_url('Jadwal/index'); ?>" class="btn-jadwal">
                            <i class="fa fa-calendar"></i>
                            Lihat Jadwal Pemancingan
                        </a>

                        <br><br>
                        <!--
                        <a href="<?= site_url('Pelanggan/profile'); ?>" class="btn btn-primary">
                            <i class="fa fa-user"></i>
                            Profil Saya
                        </a>
                        
                        <a href="<?= site_url('Auth/logout'); ?>" class="btn btn-danger">
                            <i class="fa fa-sign-out"></i>
                            Logout
                        </a>
                            -->
                    </div>


                </div>

            </div>

        </div>

    <?php endif; ?>

    <div class="wrapper">

        <!-- HEADER -->
        <div class="header-section">

            <div class="bg-opacity"></div>

            <div class="top-header sticky-header">

                <div class="top-header-inner">

                    <div class="container">

                        <div class="mgea-full-width">

                            <div class="row">

                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <div class="logo mt-15">
                                    </div>
                                </div>

                                <div class="col-md-10 col-sm-10 hidden-xs">

                                    <div class="header-top ptb-10">
                                    </div>

                                    <div class="menu mt-25">

                                        <div class="menu-list hidden-sm hidden-xs">

                                            <nav>

                                                <ul style="text-align: right;">

                                                    <li>
                                                        <a href="<?= site_url('Welcome/index'); ?>">
                                                            HOME
                                                        </a>
                                                    </li>
                                                    <!--
                                                    <li>
                                                        <a href="<?= site_url('Jadwal/index'); ?>">
                                                            JADWAL PEMANCINGAN
                                                        </a>
                                                    </li>
                                                    <-->
                                                    <li>
                                                        <a href="<?= site_url('Auth/konfirmasi'); ?>">
                                                          PESANAN SAYA
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="<?= site_url('Auth/logout'); ?>">
                                                            LOGOUT
                                                        </a>
                                                    </li>

                                                </ul>

                                            </nav>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- MENU MOBILE -->
                <div class="mobile-menu-area hidden-lg hidden-md">

                    <div class="container">

                        <div class="col-md-12">

                            <nav id="dropdown">

                                <ul>

                                    <li>
                                        <a href="<?= site_url('Welcome/index'); ?>">
                                            HOME
                                        </a>
                                    </li>
                                    <!--
                                    <li>
                                        <a href="<?= site_url('Jadwal/index'); ?>">
                                            JADWAL PEMANCINGAN
                                        </a>
                                    </li>
                                    <-->

                                    <li>
                                        <a href="<?= site_url('Auth/konfirmasi'); ?>">
                                            KONFIRMASI PEMESANAN
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?= site_url('Auth/logout'); ?>">
                                            LOGOUT
                                        </a>
                                    </li>

                                </ul>

                            </nav>

                        </div>

                    </div>

                </div>
                <!-- END MENU MOBILE -->

            </div>

            <!-- WELCOME -->
            <div class="welcome-section">

                <div class="container">

                    <div class="row">

                        <div class="col-md-4 col-sm-5">

                            <div class="booking-box">

                                <div class="booking-title">
                                    <br><br><br><br><br><br><br><br><br><br>
                                    <br><br><br><br><br><br><br><br><br><br>
                                </div>

                                <div class="booking-form">
                                    <br><br><br><br><br><br><br><br><br><br>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-8 col-sm-7">

                            <div class="welcome-text">

                                <p style="color: #fff; font-size: 18px;">
                                    Halo
                                    <b style="color: #fff; font-size: 16px; font-weight: bold;">
                                        <?= $this->session->userdata('nama'); ?>
                                    </b>
                                </p>

                                <h2>
                                    <span>SELAMAT DATANG DI</span>
                                    <span class="coloring">KPMC DF</span>
                                </h2>

                                <h1 class="cd-headline clip">

                                    <span>KEUNGGULAN</span>

                                    <span class="cd-words-wrapper coloring">
                                        <b class="is-visible">LOKASI</b>
                                        <b>KOLAM</b>
                                        <b>FASILITAS</b>
                                    </span>

                                </h1>

                                <p class="welcome-desc">
                                    Kami menyediakan tempat yang baik, lokasi yang strategis,
                                    ruangan yang nyaman dan pelayanan prima.
                                    <br>
                                    Sehingga pelanggan tidak merasa kapok setelah datang kesini.
                                </p>
                                <!--
                                <div class="explore">
                                    <a href="<?= site_url('Jadwal/index'); ?>">
                                        LIHAT JADWAL
                                    </a>
                                </div>
                                <-->

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- END WELCOME -->

        </div>
        <!-- END HEADER -->

        <!-- TENTANG -->
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

                                <img src="<?= base_url('assets/images/yan.jpg'); ?>" alt="Developer">

                                <h3>RIAN ARYANTO</h3>

                                <h5 class="mb-0">Developer</h5>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- INFORMASI PEMBAYARAN DAN KOLAM -->
        <div class="our-room text-center ptb-80 white-bg">

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div class="section-title mb-75">

                            <h2>Informasi <span>Pembayaran</span></h2>

                            <h5>
                                MOHON DI PERHATIKAN! UNTUK SETIAP PELANGGAN YANG MELAKUKAN
                                RESERVASI ATAU PESAN LAPAK PEMANCINGAN DIHARAPKAN MELAKUKAN
                                PEMBAYARAN DP ATAU FULL PEMBAYARAN LAPAK TERLEBIH DAHULU.
                            </h5>

                            <h5>
                                UNTUK DP MINIMAL 25% DARI HARGA LAPAK.
                            </h5>

                            <h5>
                                ATAU BISA BAYAR FULL.
                            </h5>

                            <h5>
                                INFORMASI UNTUK TRANSFER: 085759400256
                            </h5>

                            <br>

                            <h2>Jenis <span>Kolam</span></h2>

                            <h6>
                                Kami menyediakan jenis kolam ikan mas sebagai sarana hiburan
                                bagi anak remaja hingga orang tua.
                            </h6>

                        </div>

                    </div>

                </div>

                <div class="our-room-show">

                    <div class="row">

                        <div class="carousel-list">

                            <?php if (!empty($kolam)): ?>

                                <?php foreach ($kolam as $klm): ?>

                                    <div class="col-md-4">

                                        <div class="single-room">

                                            <div class="room-img">

                                                <a href="#">
                                                    <img src="<?= base_url('images/kolam/' . $klm->gambar); ?>" alt="Kolam">
                                                </a>

                                            </div>

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
                                                        Rp <?= number_format($klm->harga, 0, ',', '.'); ?>
                                                        / <label>Lapak</label>
                                                    </h6>

                                                    <h6>
                                                        Stok Lapak:
                                                        <strong><?= $klm->stok; ?></strong>
                                                    </h6>
                                                </div>

                                                <div class="room-book">

                                                    <?php if ($klm->stok > 0): ?>

                                                        <a href="<?= site_url('Auth/booking/' . $klm->id); ?>">
                                                            Pesan
                                                        </a>

                                                    <?php else: ?>

                                                        <a href="#" style="background:#d9534f; cursor:not-allowed;">
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
                                    <h4>Data kolam belum tersedia.</h4>
                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- FOOTER -->
        <div class="footer ptb-100">

            <div class="footer-bg-opacity"></div>

            <div class="container">

                <div class="row">

                    <div class="col-md-3 col-sm-4 col-xs-6">

                        <div class="single-footer mt-0">

                            <div class="logo">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="copyright ptb-20 white_bg">

            <div class="container">

                <div class="row">

                    <div class="col-md-6 col-sm-8 col-xs-12">

                        <p>
                            Copyright © Created by
                            <a href="#">RIAN ARYANTO</a>
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/js/vendor/jquery-1.12.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/waypoints.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.counterup.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/video-player.js'); ?>"></script>
    <script src="<?= base_url('assets/js/animated-headlines.js'); ?>"></script>
    <script src="<?= base_url('assets/js/mailchimp.js'); ?>"></script>
    <script src="<?= base_url('assets/js/ajax-mail.js'); ?>"></script>
    <script src="<?= base_url('assets/js/parallax.js'); ?>"></script>
    <script src="<?= base_url('assets/js/textilate.js'); ?>"></script>
    <script src="<?= base_url('assets/js/lettering.js'); ?>"></script>
    <script src="<?= base_url('assets/js/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/packery-mode.pkgd.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/style-customizer.js'); ?>"></script>
    <script src="<?= base_url('assets/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.magnific-popup.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>

</body>

</html>