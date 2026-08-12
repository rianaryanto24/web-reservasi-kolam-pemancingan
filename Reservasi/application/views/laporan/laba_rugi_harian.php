<div class="content mt-3">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            Laba Rugi Harian
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" id="tanggal" class="form-control">
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

<script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>

<script>
    $('#tanggal').change(function() {

        let tanggal = $(this).val();

        $.post("<?= site_url('Laporan/get_pemasukan_harian') ?>", {
            tanggal: tanggal
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