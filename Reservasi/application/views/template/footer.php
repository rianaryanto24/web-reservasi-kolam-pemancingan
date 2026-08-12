</div> <!-- content -->

<script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/popper.js/dist/umd/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/main.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<footer class="sticky-footer bg-white">
    <div class="container-fluid">
        <div class="copyright">
            Copyright &copy; <?= date('Y'); ?>
            <strong>RIAN ARYANTO</strong>
        </div>
    </div>
</footer>

<?php if ($this->session->flashdata('success')) : ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '<?= $this->session->flashdata("success"); ?>',
                timer: 1800,
                showConfirmButton: false
            });
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')) : ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= $this->session->flashdata("error"); ?>'
            });
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('warning')) : ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: '<?= $this->session->flashdata("warning"); ?>'
            });
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('info')) : ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'info',
                title: 'Informasi',
                text: '<?= $this->session->flashdata("info"); ?>'
            });
        });
    </script>
<?php endif; ?>

<script>
    $(document).on('click', '.btn-hapus', function(e) {

        e.preventDefault();

        let url = $(this).attr('href');

        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Apakah Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if (result.isConfirmed) {
                window.location.href = url;
            }

        });

    });
</script>

<script>
    document.querySelectorAll('.btn-confirm').forEach(function(btn) {

        btn.addEventListener('click', function(e) {

            e.preventDefault();

            let url = $(this).attr('href');

            Swal.fire({
                title: 'Konfirmasi Reservasi',
                text: 'Apakah Anda yakin ingin mengonfirmasi reservasi ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Konfirmasi',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {
                    window.location.href = url;
                }

            });
        });

    });
</script>

</body>

</html>