<!DOCTYPE html>
<html>

<head>
    <title>Print Laporan Bulanan</title>
        <link rel="icon" href="<?= base_url() ?>/images/logo1.png">


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #111;
        }

        .aksi {
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            padding: 9px 14px;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-print {
            background: #28a745;
        }

        .btn-home {
            background: #6c757d;
        }

        h2,
        h4 {
            text-align: center;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #222;
            padding: 8px;
            font-size: 13px;
        }

        th {
            background: #eeeeee;
            text-align: center;
        }

        .total {
            margin-top: 18px;
            font-size: 18px;
            font-weight: bold;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                margin: 0;
            }
        }
    </style>
</head>

<body>

    <?php
    $nama_bulan = array(
        1  => 'Januari',
        2  => 'Februari',
        3  => 'Maret',
        4  => 'April',
        5  => 'Mei',
        6  => 'Juni',
        7  => 'Juli',
        8  => 'Agustus',
        9  => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    );

    // Pengaman jika bulan kosong / tidak valid
    $bulan_tampil = isset($nama_bulan[(int)$bulan])
        ? $nama_bulan[(int)$bulan]
        : '-';
    ?>

    <div class="aksi no-print">
        <button class="btn btn-print" onclick="window.print()">
            🖨 Print Sekarang
        </button>

        <a href="<?= base_url('index.php/Laporan/bulanan?bulan=' . $bulan . '&tahun=' . $tahun); ?>"
            class="btn btn-home">
            ← Kembali ke Laporan Bulanan
        </a>
    </div>

    <h2>LAPORAN BULANAN</h2>
    <h4><?= $bulan_tampil; ?> <?= $tahun; ?></h4>

    <table>
        <thead>
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
        </thead>

        <tbody>
            <?php if (!empty($laporan)) : ?>
                <?php $no = 1; ?>
                <?php foreach ($laporan as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= date('d-m-Y', strtotime($row->tanggal)); ?></td>
                        <td><?= !empty($row->hari_pemancingan) ? $row->hari_pemancingan : '-'; ?></td>
                        <td><?= !empty($row->jam_pemancingan) ? $row->jam_pemancingan : '-'; ?></td>
                        <td><?= $row->keterangan; ?></td>
                        <td><?= $row->lapak; ?></td>
                        <td>Rp <?= number_format($row->jumlah, 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8" style="text-align:center;">
                        Tidak ada data laporan pada bulan ini.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="total">
        Total Penjualan Bulanan:
        Rp <?= number_format($total_bulanan, 0, ',', '.'); ?>
    </div>

</body>

</html>