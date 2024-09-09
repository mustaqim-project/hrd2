<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 ml-4 text-gray-800"><?= $title; ?></h1>

    <!-- Display Error and Flash Messages -->
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <!-- Add tab items as needed -->
        <li class="nav-item">
            <a class="nav-link active" id="gaji-tab" data-toggle="tab" href="#gaji" role="tab" aria-controls="gaji" aria-selected="true">Gaji</a>
        </li>
        <!-- Other tabs here -->
    </ul>

    <!-- Form -->
    <?= form_open('upah/tambahupahkaryawan'); ?>
        <!-- Tab Gaji -->
        <div class="tab-pane fade show active" id="gaji" role="tabpanel" aria-labelledby="gaji-tab">
            <div class="card border-success">
                <h5 class="card-header text-white bg-success">Form Upah Karyawan</h5>
                <div class="card-body border-bottom-success">

                    <div class="form-group row">
                        <label for="nama_karyawan" class="col-sm-3 col-form-label"><b>Nama Karyawan</b></label>
                        <div class="col-sm-9">
                            <input type="text" value="<?= set_value('nama_karyawan', $upah['nama_karyawan']); ?>" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Masukan Nama Karyawan">
                            <small class="form-text text-danger"><?= form_error('nama_karyawan'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="uang_kehadiran" class="col-sm-3 col-form-label"><b>Uang Kehadiran</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('uang_kehadiran', $upah['uang_kehadiran']); ?>" class="form-control" id="uang_kehadiran" name="uang_kehadiran" placeholder="Masukan Uang Kehadiran">
                            <small class="form-text text-danger"><?= form_error('uang_kehadiran'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tunjangan_jabatan" class="col-sm-3 col-form-label"><b>Tunjangan Jabatan</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('tunjangan_jabatan', $upah['tunjangan_jabatan']); ?>" class="form-control" id="tunjangan_jabatan" name="tunjangan_jabatan" placeholder="Masukan Tunjangan Jabatan">
                            <small class="form-text text-danger"><?= form_error('tunjangan_jabatan'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tunjangan_transportasi" class="col-sm-3 col-form-label"><b>Tunjangan Transportasi</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('tunjangan_transportasi', $upah['tunjangan_transportasi']); ?>" class="form-control" id="tunjangan_transportasi" name="tunjangan_transportasi" placeholder="Masukan Tunjangan Transportasi">
                            <small class="form-text text-danger"><?= form_error('tunjangan_transportasi'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tunjangan_pot" class="col-sm-3 col-form-label"><b>Tunjangan Potongan</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('tunjangan_pot', $upah['tunjangan_pot']); ?>" class="form-control" id="tunjangan_pot" name="tunjangan_pot" placeholder="Masukan Tunjangan Potongan">
                            <small class="form-text text-danger"><?= form_error('tunjangan_pot'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tunjangan_komunikasi" class="col-sm-3 col-form-label"><b>Tunjangan Komunikasi</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('tunjangan_komunikasi', $upah['tunjangan_komunikasi']); ?>" class="form-control" id="tunjangan_komunikasi" name="tunjangan_komunikasi" placeholder="Masukan Tunjangan Komunikasi">
                            <small class="form-text text-danger"><?= form_error('tunjangan_komunikasi'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tunjangan_lain_lain" class="col-sm-3 col-form-label"><b>Tunjangan Lain-Lain</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('tunjangan_lain_lain', $upah['tunjangan_lain_lain']); ?>" class="form-control" id="tunjangan_lain_lain" name="tunjangan_lain_lain" placeholder="Masukan Tunjangan Lain-Lain">
                            <small class="form-text text-danger"><?= form_error('tunjangan_lain_lain'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="insentif_libur_bersama" class="col-sm-3 col-form-label"><b>Insentif Libur Bersama</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('insentif_libur_bersama', $upah['insentif_libur_bersama']); ?>" class="form-control" id="insentif_libur_bersama" name="insentif_libur_bersama" placeholder="Masukan Insentif Libur Bersama">
                            <small class="form-text text-danger"><?= form_error('insentif_libur_bersama'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="insentif_libur_perusahaan" class="col-sm-3 col-form-label"><b>Insentif Libur Perusahaan</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('insentif_libur_perusahaan', $upah['insentif_libur_perusahaan']); ?>" class="form-control" id="insentif_libur_perusahaan" name="insentif_libur_perusahaan" placeholder="Masukan Insentif Libur Perusahaan">
                            <small class="form-text text-danger"><?= form_error('insentif_libur_perusahaan'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ritase" class="col-sm-3 col-form-label"><b>Ritase</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('ritase', $upah['ritase']); ?>" class="form-control" id="ritase" name="ritase" placeholder="Masukan Ritase">
                            <small class="form-text text-danger"><?= form_error('ritase'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dinas" class="col-sm-3 col-form-label"><b>Dinas</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('dinas', $upah['dinas']); ?>" class="form-control" id="dinas" name="dinas" placeholder="Masukan Dinas">
                            <small class="form-text text-danger"><?= form_error('dinas'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rapelan" class="col-sm-3 col-form-label"><b>Rapelan</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('rapelan', $upah['rapelan']); ?>" class="form-control
                            <input type="number" step="0.01" value="<?= set_value('rapelan', $upah['rapelan']); ?>" class="form-control" id="rapelan" name="rapelan" placeholder="Masukan Rapelan">
                            <small class="form-text text-danger"><?= form_error('rapelan'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lain_lain" class="col-sm-3 col-form-label"><b>Lain-Lain</b></label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" value="<?= set_value('lain_lain', $upah['lain_lain']); ?>" class="form-control" id="lain_lain" name="lain_lain" placeholder="Masukan Lain-Lain">
                            <small class="form-text text-danger"><?= form_error('lain_lain'); ?></small>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Submit and Cancel Buttons -->
        <button type="submit" name="edit" class="btn btn-primary btn-sm btn-lg btn-block">SIMPAN</button>
        <a class="btn btn-danger btn-lg btn-sm btn-block" href="<?= base_url('karyawan/karyawan'); ?>">CANCEL</a>
    </form>
</div>
<!-- /.container-fluid -->
