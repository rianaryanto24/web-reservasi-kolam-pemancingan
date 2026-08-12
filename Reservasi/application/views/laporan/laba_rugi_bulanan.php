<div class="content mt-3">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            Laba Rugi Bulanan
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Bulan</label>
                <select id="bulan" class="form-control">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tahun</label>
                <input type="number" id="tahun" class="form-control">
            </div>

            <div class="form-group">
                <label>Pemasukan</label>
                <input type="text" id="pemasukan" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label>Pengeluaran</label>
                <input type="number" id="pengeluaran" class="form-control">
            </div>

            <div class="form-group">
                <label>Laba</label>
                <input type="text" id="laba" class="form-control" readonly>
            </div>

            <!-- 🔥 BUTTON -->
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Simpan
            </button>

        </div>
    </div>
</div>

<script>
    $('#bulan, #tahun').change(function() {

        let bulan = $('#bulan').val();
        let tahun = $('#tahun').val();

        $.post("<?= site_url('Laporan/get_pemasukan_bulanan') ?>", {
            bulan: bulan,
            tahun: tahun
        }, function(data) {

            let res = JSON.parse(data);

            $('#pemasukan').val(res.pemasukan);

            hitung();
        });

    });

    $('#pengeluaran').keyup(function() {
        hitung();
    });

    function hitung() {

        let pemasukan = parseInt($('#pemasukan').val()) || 0;
        let pengeluaran = parseInt($('#pengeluaran').val()) || 0;

        let laba = pemasukan - pengeluaran;

        $('#laba').val(laba);
    }
</script>