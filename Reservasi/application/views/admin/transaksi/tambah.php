<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Transaksi</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="icon" href="<?= base_url() ?>/images/logo1.png">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script language="javascript">
        $(document).ready(function() {
            $("#txtCheckin").datepicker({
                minDate: 0,
                dateFormat: "dd-M-yy",
                onSelect: function(date) {
                    var date2 = $('#txtCheckin').datepicker('getDate');
                    date2.setDate(date2.getDate());
                    $('#txtCheckout').datepicker('setDate', date2);
                    //sets minDate to dateofbirth date + 1
                    $('#txtCheckout').datepicker('option', 'minDate', date2);
                }
            });
            $('#txtCheckout').datepicker({
                minDate: 0,
                dateFormat: "dd-M-yy",
                onClose: function() {
                    var dt1 = $('#txtCheckin').datepicker('getDate');
                    console.log(dt1);
                    var dt2 = $('#txtCheckout').datepicker('getDate');
                    if (dt2 <= dt1) {
                        var minDate = $('#txtCheckout').datepicker('option', 'minDate');
                        $('#txtCheckout').datepicker('setDate', minDate);
                    }
                }
            });
        });
    </script>
</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <p class="navbar-brand">KPMC DF</p>
                <p class="navbar-brand hidden">C</p>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?= site_url('Welcome/index') ?>"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                        </li>
                        <h3 class="menu-title">MANAGEMENT</h3><!-- /.menu-title -->
                        <li class="menu-item-has-children active dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Data</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-bed"></i><a href="<?= site_url('Kolam/read') ?>">Kolam </a></li>
                                <li><i class="fa fa-address-card"></i><a href="<?= site_url('Pelanggan/read') ?>">Pelanggan</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Transaksi</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-envelope"></i><a href="<?= site_url('Transaksi/read') ?>">Pending</a></li>
                                <li><i class="fa fa-envelope-open"></i><a href="<?= site_url('Transaksi/data') ?>">Confirm</a></li>
                                <li><i class="fa fa-plus"></i><a href="<?= site_url('Transaksi/add') ?>">Baru</a></li>
                            </ul>
                        </li>
                    </ul>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">

                        <div class="form-inline">
                        </div>


                        <div class="dropdown for-message">
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" style="height: 40px; width: 35px;" src="<?= base_url() ?>/images/pelanggan/<?= $this->session->userdata('gambar') ?>">
                        </a>

                        <div>Logout</div>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?= site_url('Auth/logout') ?>"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah Transaksi</h1>
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

        <!--  -->
        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <hr>
                                        <form action="<?= site_url('Transaksi/tambah') ?>" method="post">

                                            <!-- Admin membuat transaksi langsung Confirm -->
                                            <input type="hidden" name="status" value="Confirm">

                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Nama Lengkap</label>
                                                <input name="nama" type="text" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-1">Email</label>
                                                <input name="email" type="email" class="form-control" required>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">No. Telp</label>
                                                        <input name="no" type="text" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Jenis Kolam</label>

                                                        <!-- Penting: value harus ID kolam -->
                                                        <select name="id_kolam" class="form-control" required>
                                                            <option value="">-- Pilih Kolam --</option>

                                                            <?php foreach ($result as $klm) : ?>
                                                                <option value="<?= $klm->id ?>">
                                                                    <?= $klm->jenis_kolam ?> (Sisa Lapak: <?= $klm->stok ?>)
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Check-in</label>
                                                        <input id="txtCheckin" name="tglin" type="text" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Check-out</label>
                                                        <input id="txtCheckout" name="tglout" type="text" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Jumlah Lapak</label>
                                                        <input
                                                            name="jumlah_lapak"
                                                            type="number"
                                                            min="1"
                                                            class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-save"></i> Simpan
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  <script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script> -->
    <script src="<?= base_url('assets/vendors/popper.js/dist/umd/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/main.js'); ?>"></script>
</body>

</html>