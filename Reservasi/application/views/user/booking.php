<!DOCTYPE html>
<html>

<head>
    <title>Pemesanan Kolam</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/core.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/shortcode/shortcodes.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>">
    <link rel="icon" href="<?= base_url() ?>/images/logo1.png">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <style>
        .booking-panel {
            background: #3db9ea;
            padding: 35px;
            margin-top: 35px;
        }

        .booking-panel label {
            color: #555;
            font-weight: 600;
        }

        .booking-panel .form-control {
            height: 40px;
        }

        .tab-booking-custom {
            display: flex;
            gap: 20px;
            margin-bottom: 35px;
        }

        .tab-step {
            width: 220px;
            padding: 25px 15px;
            text-align: center;
            background: #eeeeee;
            color: #555;
            font-size: 18px;
            font-weight: bold;
        }

        .tab-step.active {
            background: #3db9ea;
            color: #ffffff;
        }

        .tab-step span {
            display: block;
            font-size: 25px;
            margin-bottom: 8px;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .btn-lanjut,
        .btn-kembali,
        .btn-pesan {
            border: none;
            padding: 12px 25px;
            font-weight: bold;
            cursor: pointer;
            margin-left: 8px;
        }

        .btn-lanjut,
        .btn-pesan {
            background: #3db9ea;
            color: #ffffff;
        }

        .btn-kembali {
            background: #777;
            color: #ffffff;
        }

        .btn-lanjut:hover,
        .btn-pesan:hover {
            background: #269fcf;
        }

        .btn-kembali:hover {
            background: #555;
        }

        .personal-card {
            max-width: 650px;
            margin: 0 auto;
            padding: 35px;
            background: #f7f7f7;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="room-booking ptb-80">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title mb-80 text-center">
                            <h2>Pemesanan <span>Kolam</span></h2>
                            <p>Silakan isi data pemesanan dengan benar.</p>

                            <?php if ($this->session->flashdata('msg')): ?>
                                <div class="alert alert-danger">
                                    <?= $this->session->flashdata('msg'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="tab-booking-custom">
                    <div class="tab-step active" id="step1Label">
                        <span>1</span>
                        Info Pemesanan
                    </div>

                    <div class="tab-step" id="step2Label">
                        <span>2</span>
                        Data Pribadi
                    </div>
                </div>

                <form action="<?= site_url('Auth/proses_booking'); ?>"
                    method="post"
                    enctype="multipart/form-data"
                    id="formBooking">

                    <input type="hidden" name="id_kolam" value="<?= $detail->id; ?>">

                    <!-- LANGKAH 1 -->
                    <div class="form-step active" id="step1">

                        <div class="booking-info-deatils">
                            <div class="single-room-details fix">

                                <div class="room-img">
                                    <img src="<?= base_url('images/kolam/' . $detail->gambar); ?>"
                                        alt="Kolam">
                                </div>

                                <div class="single-room-details pl-50">
                                    <h3 class="s_room_title">
                                        <?= $detail->jenis_kolam; ?>
                                    </h3>

                                    <div class="room_price">
                                        <h4>Harga</h4>
                                        <h5>
                                            Rp <?= number_format($detail->harga, 0, ',', '.'); ?>
                                            <span>/ Kg</span>
                                        </h5>
                                    </div>
                                </div>

                            </div>

                            <div class="booking-panel">

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tanggal Masuk</label>
                                            <input id="txtCheckin"
                                                type="text"
                                                name="tgl_in"
                                                class="form-control"
                                                placeholder="Pilih tanggal masuk"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tanggal Keluar</label>
                                            <input id="txtCheckout"
                                                type="text"
                                                name="tgl_out"
                                                class="form-control"
                                                placeholder="Pilih tanggal keluar"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Jumlah Lapak</label>
                                            <input type="number"
                                                name="jumlah_lapak"
                                                class="form-control"
                                                min="1"
                                                placeholder="Masukkan jumlah lapak"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Pilih Hari</label>

                                            <select name="hari_pemancingan"
                                                id="hari_pemancingan"
                                                class="form-control"
                                                required>

                                                <option value="">-- Pilih Hari --</option>

                                                <?php if (!empty($jadwal) && !empty($jadwal->senin)): ?>
                                                    <option value="Senin">Senin</option>
                                                <?php endif; ?>

                                                <?php if (!empty($jadwal) && !empty($jadwal->selasa)): ?>
                                                    <option value="Selasa">Selasa</option>
                                                <?php endif; ?>

                                                <?php if (!empty($jadwal) && !empty($jadwal->rabu)): ?>
                                                    <option value="Rabu">Rabu</option>
                                                <?php endif; ?>

                                                <?php if (!empty($jadwal) && !empty($jadwal->kamis)): ?>
                                                    <option value="Kamis">Kamis</option>
                                                <?php endif; ?>

                                                <?php if (!empty($jadwal) && !empty($jadwal->jumat)): ?>
                                                    <option value="Jumat">Jumat</option>
                                                <?php endif; ?>

                                                <?php if (!empty($jadwal) && !empty($jadwal->sabtu)): ?>
                                                    <option value="Sabtu">Sabtu</option>
                                                <?php endif; ?>

                                                <?php if (!empty($jadwal) && !empty($jadwal->minggu)): ?>
                                                    <option value="Minggu">Minggu</option>
                                                <?php endif; ?>

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Pilih Jam Pemancingan</label>

                                            <select name="jam_pemancingan"
                                                id="jam_pemancingan"
                                                class="form-control"
                                                required>

                                                <option value="">-- Pilih Hari Terlebih Dahulu --</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Jenis Kolam</label>

                                            <input type="text"
                                                readonly
                                                class="form-control"
                                                value="<?= $detail->jenis_kolam; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Upload Bukti Pembayaran</label>

                                            <input type="file"
                                                name="gambar"
                                                class="form-control"
                                                accept=".jpg,.jpeg,.png"
                                                required>
                                        </div>
                                    </div>

                                </div>

                                <div class="text-right">
                                    <button type="button"
                                        id="btnLanjut"
                                        class="btn-lanjut">
                                        Lanjut ke Data Pribadi →
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- LANGKAH 2 -->
                    <div class="form-step" id="step2">

                        <div class="personal-card">
                            <h3 class="text-center">Data Pribadi</h3>
                            <hr>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text"
                                    class="form-control"
                                    value="<?= $this->session->userdata('nama'); ?>"
                                    readonly
                                    name="nama"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control"
                                    value="<?= $this->session->userdata('email'); ?>"
                                    readonly
                                    name="email"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>No. Telepon</label>
                                <input type="text"
                                    class="form-control"
                                    value="<?= $this->session->userdata('no'); ?>"
                                    readonly
                                    name="no"
                                    required>
                            </div>

                            <div class="text-right">
                                <button type="button"
                                    id="btnKembali"
                                    class="btn-kembali">
                                    ← Kembali
                                </button>

                                <button type="submit"
                                    class="btn-pesan">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            // Data jadwal dari database
            var jadwalSenin = <?= json_encode(!empty($jadwal->senin) ? $jadwal->senin : ''); ?>;
            var jadwalSelasa = <?= json_encode(!empty($jadwal->selasa) ? $jadwal->selasa : ''); ?>;
            var jadwalRabu = <?= json_encode(!empty($jadwal->rabu) ? $jadwal->rabu : ''); ?>;
            var jadwalKamis = <?= json_encode(!empty($jadwal->kamis) ? $jadwal->kamis : ''); ?>;
            var jadwalJumat = <?= json_encode(!empty($jadwal->jumat) ? $jadwal->jumat : ''); ?>;
            var jadwalSabtu = <?= json_encode(!empty($jadwal->sabtu) ? $jadwal->sabtu : ''); ?>;
            var jadwalMinggu = <?= json_encode(!empty($jadwal->minggu) ? $jadwal->minggu : ''); ?>;

            $('#txtCheckin').datepicker({
                minDate: 0,
                dateFormat: 'dd-M-yy',
                onSelect: function() {
                    var tanggalMasuk = $('#txtCheckin').datepicker('getDate');

                    $('#txtCheckout').datepicker('setDate', tanggalMasuk);
                    $('#txtCheckout').datepicker('option', 'minDate', tanggalMasuk);
                }
            });

            $('#txtCheckout').datepicker({
                minDate: 0,
                dateFormat: 'dd-M-yy'
            });

            // Ketika pelanggan memilih hari, tampilkan jam sesuai input admin
            $('#hari_pemancingan').on('change', function() {

                var hari = $(this).val();
                var jamSelect = $('#jam_pemancingan');

                jamSelect.html('<option value="">-- Pilih Jam Pemancingan --</option>');

                var dataJam = '';

                if (hari === 'Senin') {
                    dataJam = jadwalSenin;
                } else if (hari === 'Selasa') {
                    dataJam = jadwalSelasa;
                } else if (hari === 'Rabu') {
                    dataJam = jadwalRabu;
                } else if (hari === 'Kamis') {
                    dataJam = jadwalKamis;
                } else if (hari === 'Jumat') {
                    dataJam = jadwalJumat;
                } else if (hari === 'Sabtu') {
                    dataJam = jadwalSabtu;
                } else if (hari === 'Minggu') {
                    dataJam = jadwalMinggu;
                }

                if (dataJam === '') {
                    jamSelect.html('<option value="">Jadwal belum diinput admin</option>');
                    return;
                }

                // Contoh input admin:
                // 09:00 - 12:00, 13:00 - 17:00, 20:00 - 00:00
                var daftarJam = dataJam.split(',');

                $.each(daftarJam, function(index, jam) {
                    jam = $.trim(jam);

                    if (jam !== '') {
                        jamSelect.append(
                            '<option value="' + jam + '">' + jam + '</option>'
                        );
                    }
                });
            });

            $('#btnLanjut').on('click', function() {

                var tanggalMasuk = $('#txtCheckin').val();
                var tanggalKeluar = $('#txtCheckout').val();
                var jumlahLapak = $('input[name="jumlah_lapak"]').val();
                var hariPemancingan = $('#hari_pemancingan').val();
                var jamPemancingan = $('#jam_pemancingan').val();
                var gambar = $('input[name="gambar"]').val();

                if (
                    tanggalMasuk === '' ||
                    tanggalKeluar === '' ||
                    jumlahLapak === '' ||
                    hariPemancingan === '' ||
                    jamPemancingan === '' ||
                    gambar === ''
                ) {
                    alert('Silakan lengkapi tanggal, jumlah lapak, hari, jam pemancingan, dan bukti pembayaran.');
                    return;
                }

                $('#step1').removeClass('active');
                $('#step2').addClass('active');

                $('#step1Label').removeClass('active');
                $('#step2Label').addClass('active');

                window.scrollTo(0, 0);
            });

            $('#btnKembali').on('click', function() {
                $('#step2').removeClass('active');
                $('#step1').addClass('active');

                $('#step2Label').removeClass('active');
                $('#step1Label').addClass('active');

                window.scrollTo(0, 0);
            });

        });
    </script>

</body>

</html>