<!DOCTYPE html>
<html>

<head>
    <title>Print Laporan Harian</title>

    <link rel="stylesheet"
        href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">
            <link rel="icon" href="<?= base_url() ?>/images/logo1.png">


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 8px;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="no-print tombol-kembali">
        <a href="<?= site_url('laporan/laporan_harian'); ?>" class="btn btn-secondary">
            ← Kembali ke Home
        </a>
    </div>

    <h2>
        LAPORAN HARIAN <br>

        <?= !empty($tanggal) ? date('d-m-Y', strtotime($tanggal)) : '-' ?>
    </h2>


    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Hari Pemancingan</th>
            <th>Jam Pemancingan</th>
            <th>Keterangan</th>
            <th>Lapak</th>
            <th>Jumlah</th>
        </tr>

        <?php
        $no = 1;
        foreach ($laporan as $d) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d->nama ?></td>
                <td><?= date('d-m-Y', strtotime($d->tanggal)) ?></td>

                <!-- Tambahan hari dan jam pemancingan -->
                <td><?= !empty($d->hari_pemancingan) ? $d->hari_pemancingan : '-'; ?></td>
                <td><?= !empty($d->jam_pemancingan) ? $d->jam_pemancingan : '-'; ?></td>

                <td><?= $d->keterangan ?></td>
                <td><?= $d->lapak ?></td>
                <td>Rp <?= number_format($d->jumlah, 0, ',', '.') ?></td>
            </tr>
        <?php } ?>
    </table>

    <br>

    <h4>
        Total : Rp <?= number_format($total, 0, ',', '.') ?>
    </h4>

</body>

</html>