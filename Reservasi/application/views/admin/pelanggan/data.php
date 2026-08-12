<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Pelanggan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?= site_url('Welcome/index') ?>">Home</a></li>
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
                        <strong class="card-title"><button class="btn btn-warning " data-toggle="modal" data-target="#contact-modal">Tambah Data</button></strong>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No. Telp</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Akses</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($result as $user) {
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><img src="<?= base_url('images/pelanggan/' . $user->gambar) ?>" width="50px" height="50px" style="border-radius: 100%">
                                            </td>
                                            <td><?= $user->nama ?></td>
                                            <td><?= $user->email ?></td>
                                            <td><?= $user->no ?></td>
                                            <td><?= $user->password ?></td>
                                            <td><?= $user->akses ?></td>
                                            <td>
                                                <a class="btn btn-success" href="<?= site_url('Pelanggan/edit/' . $user->id) ?>">Edit</a>
                                                <a href="<?= site_url('Pelanggan/hapus/' . $user->id) ?>"
                                                    class="btn btn-danger btn-hapus">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                            <!-- <td>
                                                <?php
                                                if ($cat->sold_049 == 1) {
                                                ?>
                                                        <button class="btn btn-default">SOLD OUT</button>
                                                 <?php
                                                } else {  ?>
                                                    <a class="btn btn-warning" href="<?= site_url('cats049/sale/' . $cat->id_049) ?>">Sale</a>
                                                <?php } ?>
                                            </td> -->
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

</div>
<div id="contact-modal" class="modal fade" role="dialog" style="margin-top: 200px">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>

            </div>
            <form id="formtambah" action="<?= site_url('Pelanggan/do_upload') ?>" method="post" enctype="multipart/form-data">
                <div id="pay-invoice">
                    <div class="card-body">
                        <hr>
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">No. Telp</label>
                                    <input type="text" name="no" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="cc-exp" class="control-label mb-1">Paswword</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="cc-j" class="control-label mb-1">Hak Akses</label>
                                        <select name="akses" class="form-control" required>
                                            <option value="">-- Pilih Hak Akses --</option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Foto</label>
                                    <div class="input-group">
                                        <input type="file" name="gambar" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input name="simpan" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" value="Simpan">
                            </div>

                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#contactForm").submit(function(event) {
            submitForm();
            return false;
        });
    });
    // function to handle form submit
    function submitForm() {
        $.ajax({
            type: "POST",
            url: "save_kontak.php",
            cache: false,
            data: $('form#contactForm').serialize(),
            success: function(response) {
                $("#contact").html(response)
                $("#contact-modal").modal('hide');
            },
            error: function() {
                alert("Error");
            }
        });
    }
</script>

<script>
    document.getElementById("formtambah").addEventListener("submit", function(e) {

        if (document.getElementsByName("nama")[0].value.trim() == "") {
            alert("Nama Lengkap wajib diisi!");
            e.preventDefault();
            return;
        }

        if (document.getElementsByName("email")[0].value.trim() == "") {
            alert("Email wajib diisi!");
            e.preventDefault();
            return;
        }

        if (document.getElementsByName("no")[0].value.trim() == "") {
            alert("Nomor Telepon wajib diisi!");
            e.preventDefault();
            return;
        }

        if (document.getElementsByName("password")[0].value.trim() == "") {
            alert("Password wajib diisi!");
            e.preventDefault();
            return;
        }

        if (document.getElementsByName("akses")[0].value == "") {
            alert("Hak Akses wajib dipilih!");
            e.preventDefault();
            return;
        }

        if (document.getElementsByName("gambar")[0].value == "") {
            alert("Foto wajib dipilih!");
            e.preventDefault();
            return;
        }

    });
</script>

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