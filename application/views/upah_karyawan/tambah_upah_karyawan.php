<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 ml-4 text-gray-800"><?= $title; ?></h1>

    <?= form_open_multipart('upah/tambahupahkaryawan'); ?>

    <!-- Form Karyawan -->
    <div class="card border-danger">
        <h5 class="card-header text-white bg-gradient-danger">Form Karyawan</h5>
        <div class="card-body border-bottom-danger ">

            <div class="form-group">
                <input type="text" value="<?= set_value('nama_karyawan'); ?>" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Masukan Nama Karyawan">
                <small class="form-text text-danger"><?php echo form_error('nama_karyawan'); ?></small>
            </div>
            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('uang_kehadiran'); ?>" class="form-control" id="uang_kehadiran" name="uang_kehadiran" placeholder="Masukan Uang Kehadiran">
                <small class="form-text text-danger"><?php echo form_error('uang_kehadiran'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('tunjangan_jabatan'); ?>" class="form-control" id="tunjangan_jabatan" name="tunjangan_jabatan" placeholder="Masukan Tunjangan Jabatan">
                <small class="form-text text-danger"><?php echo form_error('tunjangan_jabatan'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('tunjangan_transportasi'); ?>" class="form-control" id="tunjangan_transportasi" name="tunjangan_transportasi" placeholder="Masukan Tunjangan Transportasi">
                <small class="form-text text-danger"><?php echo form_error('tunjangan_transportasi'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('tunjangan_pot'); ?>" class="form-control" id="tunjangan_pot" name="tunjangan_pot" placeholder="Masukan Tunjangan Pot">
                <small class="form-text text-danger"><?php echo form_error('tunjangan_pot'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('tunjangan_komunikasi'); ?>" class="form-control" id="tunjangan_komunikasi" name="tunjangan_komunikasi" placeholder="Masukan Tunjangan Komunikasi">
                <small class="form-text text-danger"><?php echo form_error('tunjangan_komunikasi'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('tunjangan_lain_lain'); ?>" class="form-control" id="tunjangan_lain_lain" name="tunjangan_lain_lain" placeholder="Masukan Tunjangan Lain-Lain">
                <small class="form-text text-danger"><?php echo form_error('tunjangan_lain_lain'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('insentif_libur_bersama'); ?>" class="form-control" id="insentif_libur_bersama" name="insentif_libur_bersama" placeholder="Masukan Insentif Libur Bersama">
                <small class="form-text text-danger"><?php echo form_error('insentif_libur_bersama'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('insentif_libur_perusahaan'); ?>" class="form-control" id="insentif_libur_perusahaan" name="insentif_libur_perusahaan" placeholder="Masukan Insentif Libur Perusahaan">
                <small class="form-text text-danger"><?php echo form_error('insentif_libur_perusahaan'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('ritase'); ?>" class="form-control" id="ritase" name="ritase" placeholder="Masukan Ritase">
                <small class="form-text text-danger"><?php echo form_error('ritase'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('dinas'); ?>" class="form-control" id="dinas" name="dinas" placeholder="Masukan Dinas">
                <small class="form-text text-danger"><?php echo form_error('dinas'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('rapelan'); ?>" class="form-control" id="rapelan" name="rapelan" placeholder="Masukan Rapelan">
                <small class="form-text text-danger"><?php echo form_error('rapelan'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" step="0.01" value="<?= set_value('lain_lain'); ?>" class="form-control" id="lain_lain" name="lain_lain" placeholder="Masukan Lain-Lain">
                <small class="form-text text-danger"><?php echo form_error('lain_lain'); ?></small>
            </div>

           

        </div>
    </div>

    <!-- Button Simpan Dan Cancel -->
    <button type="submit" class="btn btn-primary btn-sm btn-lg btn-block">SIMPAN</button>
    <a class="btn btn-danger btn-lg btn-sm btn-block" href="<?= base_url('karyawan/karyawan'); ?>">CANCEL</a>

    </form>

</div>
<!-- /.container-fluid -->
