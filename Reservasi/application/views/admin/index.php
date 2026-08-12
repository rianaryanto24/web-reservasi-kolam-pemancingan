<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="content-wrapper">

    <div class="container-fluid">

        <div class="card shadow border-0 mb-4">
            <div class="card-body text-white"
                style="background: linear-gradient(135deg,#0d6efd,#20c997); border-radius:15px;">

                <div class="row align-items-center">

                    <div class="col-md-8">

                        <h2 class="font-weight-bold text-white"
                            style="font-size:36px;text-shadow:2px 2px 8px rgba(0,0,0,.35);">
                            👋 Selamat Datang,
                            <?= $this->session->userdata('nama'); ?>
                        </h2>

                        <p class="mb-3 text-white"
                            style="font-size:17px;line-height:30px;text-shadow:1px 1px 5px rgba(0,0,0,.3);">
                            Selamat datang di
                            <strong>Sistem Reservasi Kolam Pemancingan KPMC DF</strong>.
                            Kelola reservasi, data kolam, data pelanggan, kelola transaksi, dan kelola laporan dengan lebih mudah.
                        </p>

                        <?php
                        $hari = [
                            'Sunday' => 'Minggu',
                            'Monday' => 'Senin',
                            'Tuesday' => 'Selasa',
                            'Wednesday' => 'Rabu',
                            'Thursday' => 'Kamis',
                            'Friday' => 'Jumat',
                            'Saturday' => 'Sabtu'
                        ];

                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];

                        $tanggal = $hari[date('l')] . ', ' . date('d') . ' ' . $bulan[date('F')] . ' ' . date('Y');
                        ?>

                        <span class="badge badge-light px-3 py-2"
                            style="font-size:15px;border-radius:30px;">
                            📅 <?= $tanggal; ?>
                        </span>

                    </div>

                    <div class="col-md-4 text-center">

                        <i class="fa fa-home"
                            style="font-size:90px;opacity:.25;"></i>

                    </div>

                </div>

            </div>
            <br>
            <br>
            <div class="row">

                <div class="col-lg-12">

                    <?php if ($transaksi_pending > 0) { ?>

                        <div class="alert alert-warning shadow border-left-warning">

                            <h5 class="font-weight-bold">
                                <i class="fa fa-bell"></i> Reservasi Baru
                            </h5>

                            <p class="mb-3">
                                Ada
                                <strong><?= $transaksi_pending; ?></strong>
                                reservasi yang menunggu konfirmasi.
                            </p>

                            <a href="<?= site_url('Transaksi/read') ?>"
                                class="btn btn-warning">

                                <i class="fa fa-eye"></i>
                                Lihat Reservasi

                            </a>

                        </div>

                    <?php } else { ?>

                        <div class="alert alert-success shadow border-left-success">

                            <h5 class="font-weight-bold">
                                <i class="fa fa-check-circle"></i>
                                Tidak Ada Reservasi Baru
                            </h5>

                            Semua reservasi telah diproses.

                        </div>

                    <?php } ?>

                </div>

            </div>
        </div>

    </div>

</div>

<?php $this->load->view('template/footer'); ?>