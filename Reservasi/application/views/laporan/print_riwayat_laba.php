<!DOCTYPE html>
<html>

<head>
    <title>Cetak Riwayat Laba Bulanan</title>
    <link rel="icon" href="<?= base_url() ?>/images/logo1.png">

    <style>
        body {
            font-family: Arial;
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

        th {
            background: #f2f2f2;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="aksi no-print">
        <a href="<?= base_url('index.php/laporan/riwayat_laba'); ?>"
            class="btn btn-home">
            ← Kembali ke Laporan Bulanan
        </a>
    </div>

    <h2>RIWAYAT LABA BULANAN</h2>

    <?php
    $nama_bulan = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    );
    ?>

    <table>

        <tr>
            <th>No</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Total Penjualan</th>
            <th>Pengeluaran</th>
            <th>Hasil Akhir</th>
            <th>Tanggal Simpan</th>
        </tr>

        <tr>
            <td>1</td>

            <td><?= $nama_bulan[$laba->bulan]; ?></td>

            <td><?= $laba->tahun; ?></td>

            <td>
                Rp <?= number_format($laba->pemasukan, 0, ',', '.'); ?>
            </td>

            <td>
                Rp <?= number_format($laba->pengeluaran, 0, ',', '.'); ?>
            </td>

            <td>
                Rp <?= number_format($laba->laba, 0, ',', '.'); ?>
            </td>

            <td>
                <?= date('d-m-Y H:i', strtotime($laba->created_at)); ?>
            </td>

        </tr>

    </table>

</body>

</html>