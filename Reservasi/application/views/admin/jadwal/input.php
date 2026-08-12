<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <div class="card shadow-lg border-0">

                <div class="card-header text-white" style="background:linear-gradient(135deg,#198754,#20c997);">
                    <h4><i class="fa fa-calendar"></i> Input Jadwal Pemancingan</h4>
                    <small>Atur jadwal operasional kolam pemancingan.</small>
                </div>

                <div class="card-body">

                    <?php if ($this->session->flashdata('msg')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('msg'); ?></div>
                    <?php endif; ?>

                    <a href="<?= site_url('Welcome/index'); ?>" class="btn btn-outline-primary mb-3">
                        <i class="fa fa-home"></i> Kembali ke Home
                    </a>

                    <div class="alert alert-info">
                        Contoh: 09:00 - 12:00
                    </div>

                    <form action="<?= site_url('Jadwal/simpan'); ?>" method="post">

                        <?php
                        $hari = ['senin' => 'Senin', 'selasa' => 'Selasa', 'rabu' => 'Rabu', 'kamis' => 'Kamis', 'jumat' => 'Jumat', 'sabtu' => 'Sabtu', 'minggu' => 'Minggu'];
                        foreach ($hari as $field => $label):
                        ?>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label font-weight-bold"><?= $label; ?></label>
                                <div class="col-md-6">
                                    <input type="text"
                                        name="<?= $field; ?>"
                                        class="form-control"
                                        placeholder="Contoh : 13:00 - 17:00"
                                        value="<?= isset($jadwal->$field) ? $jadwal->$field : ''; ?>">
                                </div>
                            </div>

                        <?php endforeach; ?>

                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Jadwal</button>
                                <a href="<?= site_url('Welcome/index'); ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>