<!DOCTYPE html>
<html>

<head>
    <title>Print Laporan Pembayaran</title>
        <link rel="icon" href="<?= base_url() ?>/images/logo1.png">


    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 25px;
            color: #000;
        }
                .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            color: #fff;
        }

        .btn-print {
            background: #28a745;
        }

        .btn-home {
            background: #6c757d;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }

        th {
            width: 35%;
            background: #f2f2f2;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- Tombol ini tidak akan ikut tercetak -->
    <div class="action-area no-print">
        <button type="button" class="btn btn-print" onclick="window.print()">
            🖨 Print Sekarang
        </button>

        <a href="<?= base_url('index.php/Laporan/data'); ?>" class="btn btn-home">
            ← Kembali ke Data Laporan
        </a>

        <a href="<?= base_url('index.php/Welcome/index'); ?>" class="btn btn-home">
            ⌂ Home
        </a>
    </div>

    <h2>BUKTI LAPORAN PEMBAYARAN</h2>

    <table>
        <tr>
            <th>Nama</th>
            <td><?= $laporan->nama; ?></td>
        </tr>

        <tr>
            <th>Tanggal</th>
            <td><?= date('d-m-Y', strtotime($laporan->tanggal)); ?></td>
        </tr>

        <tr>
            <th>Hari Pemancingan</th>
            <td><?= $laporan->hari_pemancingan; ?></td>
        </tr>

        <tr>
            <th>Jam Pemancingan</th>
            <td><?= $laporan->jam_pemancingan; ?></td>
        </tr>

        <tr>
            <th>Keterangan</th>
            <td><?= $laporan->keterangan; ?></td>
        </tr>

        <tr>
            <th>Lapak</th>
            <td><?= $laporan->lapak; ?></td>
        </tr>

        <tr>
            <th>Jumlah Pembayaran</th>
            <td>Rp <?= number_format($laporan->jumlah, 0, ',', '.'); ?></td>
        </tr>
    </table>

</body>

</html>