<?php $this->load->view('user/header'); ?>

<div class="container" style="margin-top:120px; margin-bottom:80px;">

    <div class="section-title text-center mb-50">
        <h2>Jadwal <span>Pemancingan</span></h2>
        <p>Jam operasional Kolam Pemancingan DF</p>
    </div>

    <?php if (empty($jadwal)) : ?>

        <div class="alert alert-warning text-center">
            Jadwal pemancingan belum diinput oleh admin.
        </div>

    <?php else : ?>

        <?php
        $hari = [
            'Senin'  => $jadwal->senin,
            'Selasa' => $jadwal->selasa,
            'Rabu'   => $jadwal->rabu,
            'Kamis'  => $jadwal->kamis,
            'Jumat'  => $jadwal->jumat,
            'Sabtu'  => $jadwal->sabtu,
            'Minggu' => $jadwal->minggu
        ];
        ?>

        <div class="row">

            <?php foreach ($hari as $nama => $jam) : ?>

                <div class="col-md-4 col-sm-6">

                    <div class="single-room">

                        <div class="room-desc text-center">

                            <div class="room-name">
                                <h3><?= $nama ?></h3>
                            </div>

                            <div class="room-rent">
                                <h5>
                                    <i class="fa fa-clock-o"></i>
                                    <?= $jam ?: '-' ?>
                                </h5>
                            </div>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <div class="text-center" style="margin-top:40px;">
            <a href="<?= site_url('Welcome/index'); ?>" class="btn btn-primary">
                <i class="fa fa-home"></i> Kembali ke Beranda
            </a>
        </div>

    <?php endif; ?>

</div>

<?php $this->load->view('user/footer'); ?>