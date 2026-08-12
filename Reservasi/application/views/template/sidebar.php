    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <p class="navbar-brand">KPMC DF</p>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <!-- HOME -->
                    <li>
                        <a href="<?= site_url('kolam/home') ?>">
                            <i class="menu-icon fa fa-dashboard"></i> Home
                        </a>
                    </li>

                    <h3 class="menu-title">MASTER DATA</h3>

                    <!-- DATA -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-database"></i> Data
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <a href="<?= site_url('Kolam/read') ?>">
                                    <i class="fa fa-circle"></i> Kolam
                                </a>
                            </li>

                            <li>
                                <a href="<?= site_url('Pelanggan/read') ?>">
                                    <i class="fa fa-user"></i> Admin & Pelanggan
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('Info') ?>">
                                    <i class=" fa fa-info-circle"></i> Info Kolam
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- TRANSAKSI -->
                    <h3 class="menu-title">RESERVASI</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-exchange"></i> Transaksi
                        </a>

                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <a href="<?= site_url('Transaksi/read') ?>">
                                    <i class="fa fa-clock-o"></i> Pending
                                </a>
                            </li>

                            <li>
                                <a href="<?= site_url('Transaksi/data') ?>">
                                    <i class="fa fa-check"></i> Confirm
                                </a>
                            </li>

                            <li>
                                <a href="<?= site_url('Laporan/harian') ?>">
                                    <i class="fa fa-plus"></i> Input Laporan Pemesanan
                                </a>
                            </li>

                            <li>
                                <a href="<?= site_url('Pengeluaran/index') ?>">
                                    <i class="fa fa-plus"></i> Input Laporan Pengeluaran
                                </a>
                            </li>

                        </ul>
                    </li>

                    <!-- LAPORAN -->
                    <h3 class="menu-title">JADWAL</h3>

                    <li>
                        <a href="<?= site_url('Jadwal/admin'); ?>">
                            <i class="fa fa-calendar"></i> Jadwal Pemancingan
                        </a>
                    </li>
                    <h3 class="menu-title">LAPORAN</h3>

                    <li>
                        <a href="<?= site_url('Laporan/data') ?>">
                            <i class="fa fa-file-text"></i> Data Pemesanan
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('Laporan/laporan_harian') ?>">
                            <i class="fa fa-file-text"></i> Laporan Harian
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url('Laporan/bulanan') ?>">
                            <i class="fa fa-calendar"></i> Laporan Bulanan
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('index.php/Laporan/riwayat_laba'); ?>">
                            <i class="fa fa-history"></i>
                            <span>Riwayat Laba</span>
                        </a>
                    </li>

                    <h3 class="menu-title">BUKTI BAYAR</h3>
                    <li>
                        <a href="<?= site_url('Transaksi/gambar') ?>">
                            <i class="fa fa-image"></i> Bukti Pembayaran Pelanggan
                        </a>

                    </li>
                </ul>
            </div>
        </nav>
    </aside>