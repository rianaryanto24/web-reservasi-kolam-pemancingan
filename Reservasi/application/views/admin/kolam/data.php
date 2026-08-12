<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<!-- isi halaman -->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Kolam Pemancingan DF</h1>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>
                        <a href="<?= site_url('Welcome/index') ?>">Home</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-header">
                        <button class="btn btn-info" data-toggle="modal" data-target="#contact-modal">
                            <i class="fa fa-plus-circle"></i>
                            Tambah Data
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Jenis Kolam</th>
                                        <th>Harga</th>
                                        <th>Stok Lapak</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php $i = 1; ?>

                                    <?php foreach ($result as $klm): ?>

                                        <tr>
                                            <td><?= $i++; ?></td>

                                            <td>
                                                <?php if (!empty($klm->gambar)): ?>
                                                    <img src="<?= base_url('images/kolam/' . $klm->gambar); ?>"
                                                        width="150"
                                                        height="100"
                                                        class="img-thumbnail">
                                                <?php else: ?>
                                                    Tidak ada gambar
                                                <?php endif; ?>
                                            </td>

                                            <td><?= $klm->jenis_kolam; ?></td>

                                            <td>
                                                <span class="badge badge-success p-2">

                                                    Rp <?= number_format($klm->harga, 0, ',', '.'); ?>

                                                </span>
                                            </td>

                                            <td>
                                                <span class="badge badge-info" style="font-size:14px;">
                                                    <?= $klm->stok; ?> Lapak
                                                </span>
                                            </td>

                                            <td>
                                                <a class="btn btn-success btn-sm"
                                                    href="<?= site_url('Kolam/edit/' . $klm->id); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>

                                                <a href="<?= site_url('Kolam/delete/' . $klm->id); ?>"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                    <?php if (empty($result)): ?>
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                Data kolam belum tersedia.
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- MODAL TAMBAH KOLAM -->
<div id="contact-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Kolam</h4>

                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <form action="<?= site_url('Kolam/do_upload'); ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="form-group">
                        <label>Jenis Kolam</label>
                        <input name="jenis_kolam"
                            type="text"
                            class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga"
                            type="number"
                            min="0"
                            class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Jumlah / Stok Lapak</label>

                        <!-- nama input harus stok karena controller Kolam memakai post('stok') -->
                        <input name="jumlah_lapak"
                            type="number"
                            min="0"
                            class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>File Gambar</label>
                        <input name="gambar"
                            type="file"
                            class="form-control"
                            accept=".jpg,.jpeg,.png"
                            required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.btn-hapus').forEach(function(btn) {

        btn.addEventListener('click', function(e) {

            e.preventDefault();

            let url = this.getAttribute('href');

            Swal.fire({
                title: 'Hapus Data?',
                text: 'Data kolam yang dihapus tidak dapat dikembalikan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {
                    window.location.href = url;
                }

            });

        });

    });
</script>
<?php $this->load->view('template/footer'); ?>