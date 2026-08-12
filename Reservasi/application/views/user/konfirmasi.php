<!DOCTYPE html>
<html>

<head>
    <title>Konfirmasi Pemesanan</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/core.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/shortcode/shortcodes.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>">
    <link rel="icon" href="<?= base_url() ?>/images/logo1.png">


    <style>
        .konfirmasi-wrapper {
            padding: 80px 0;
        }

        .konfirmasi-card {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border: 1px solid #e5e5e5;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.10);
            border-radius: 5px;
        }

        .judul-kolam {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .bukti-img {
            width: 140px;
            max-height: 190px;
            object-fit: cover;
            border: 3px solid #eeeeee;
        }

        .badge-pending {
            background: #f0ad4e;
            color: #ffffff;
            padding: 5px 12px;
            border-radius: 15px;
            font-weight: bold;
        }

        .badge-confirm {
            background: #28a745;
            color: #ffffff;
            padding: 5px 12px;
            border-radius: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="konfirmasi-wrapper">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h2> KONFIRMASI <span>PEMESANAN</span></h2>
                        </div>
                    </div>
                </div>

                <div class="text-right" style="max-width:900px; margin:0 auto 20px;">
                    <a href="<?= site_url('Welcome/index'); ?>" class="btn btn-primary btn-sm">
                        Kembali ke Beranda
                    </a>
                </div>

                <?php if (!empty($trans)): ?>

                    <div class="konfirmasi-card">

                        <div class="row">

                            <div class="col-md-8">

                                <h3 class="judul-kolam">
                                    <?= $trans->jenis_kolam; ?>
                                </h3>

                                <table class="table table-bordered">
                                    <tr>
                                        <td width="35%">Nama Pemesan</td>
                                        <td><?= $trans->nama; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td><?= $trans->email; ?></td>
                                    </tr>

                                    <tr>
                                        <td>No. Telepon</td>
                                        <td><?= $trans->no; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Pesan</td>
                                        <td>
                                            <?= $trans->tgl_in; ?>
                                            sampai
                                            <?= $trans->tgl_out; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Hari Pemancingan</td>
                                        <td>
                                            <?= !empty($trans->hari_pemancingan)
                                                ? $trans->hari_pemancingan
                                                : '-'; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jam Pemancingan</td>
                                        <td>
                                            <?= !empty($trans->jam_pemancingan)
                                                ? $trans->jam_pemancingan
                                                : '-'; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jumlah Lapak</td>
                                        <td><?= $trans->jumlah_lapak; ?> Lapak</td>
                                    </tr>

                                    <tr>
                                        <td>Harga per Lapak</td>
                                        <td>
                                            Rp <?= number_format($trans->harga, 0, ',', '.'); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Total Pembayaran</td>
                                        <td>
                                            <strong style="color:green; font-size:16px;">
                                                Rp <?= number_format(
                                                        $trans->harga * $trans->jumlah_lapak,
                                                        0,
                                                        ',',
                                                        '.'
                                                    ); ?>
                                            </strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Status Pemesanan</td>
                                        <td>
                                            <?php if ($trans->status == 'Confirm'): ?>
                                                <span class="badge-confirm">Confirm</span>
                                            <?php else: ?>
                                                <span class="badge-pending">Pending</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </table>

                            </div>

                            <div class="col-md-4 text-center">
                                <h3>Bukti Pembayaran</h3>

                                <?php if (!empty($trans->gambar)): ?>
                                    <img
                                        src="<?= base_url('uploads/' . $trans->gambar); ?>"
                                        class="bukti-img"
                                        alt="Bukti Pembayaran">
                                <?php else: ?>
                                    <div class="alert alert-warning">
                                        Bukti pembayaran belum diupload.
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>

                    </div>

                <?php else: ?>

                    <div class="alert alert-warning text-center">
                        Data pemesanan belum tersedia.
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>

</body>

</html>