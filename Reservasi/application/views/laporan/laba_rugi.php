<h2>Laporan Laba Rugi</h2>

<p>Pemasukan: Rp <?= number_format($pemasukan,0,',','.') ?></p>
<p>Pengeluaran: Rp <?= number_format($pengeluaran,0,',','.') ?></p>
<p><b>Laba: Rp <?= number_format($laba,0,',','.') ?></b></p>

<a href="<?= site_url('Laporan/simpan_laba_rugi') ?>" class="btn btn-success">
    Simpan
</a>