<!DOCTYPE html>
<html>

<head>

    <title>Profil Saya</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

</head>

<body style="background:#f5f5f5;">

    <div class="container" style="margin-top:50px;">

        <div class="panel panel-primary">

            <div class="panel-heading">

                <h3>Profil Saya</h3>

            </div>

            <div class="panel-body">

                <center>

                    <img src="<?= base_url('images/pelanggan/' . $user->gambar); ?>"

                        style="width:150px;height:150px;border-radius:50%;object-fit:cover;">

                </center>

                <br>

                <form action="<?= site_url('Pelanggan/update_profile'); ?>" method="post">

                    <input type="hidden"

                        name="id"

                        value="<?= $user->id; ?>">

                    <div class="form-group">

                        <label>Nama</label>

                        <input

                            type="text"

                            name="nama"

                            class="form-control"

                            value="<?= $user->nama; ?>">

                    </div>

                    <div class="form-group">

                        <label>Email</label>

                        <input

                            type="email"

                            name="email"

                            class="form-control"

                            value="<?= $user->email; ?>">

                    </div>

                    <div class="form-group">

                        <label>No HP</label>

                        <input

                            type="text"

                            name="no"

                            class="form-control"

                            value="<?= $user->no; ?>">

                    </div>

                    <div class="form-group">

                        <label>Password</label>

                        <input

                            type="text"

                            name="password"

                            class="form-control"

                            value="<?= $user->password; ?>">

                    </div>

                    <button class="btn btn-success">

                        Simpan

                    </button>

                    <a href="<?= site_url('Welcome/index'); ?>"

                        class="btn btn-default">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</body>

</html>