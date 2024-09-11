<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 ml-4 text-gray-800"><?= $title; ?></h1>

    <?= form_open('klaim/aksi_tambah_klaim'); ?>

    <div class="form-group">
        <label for="nik">NIK Karyawan</label>
        <input type="text" name="nik" id="nik" class="form-control" value="<?= set_value('nik'); ?>" required>
        <small class="text-danger"><?= form_error('nik'); ?></small>
    </div>

    <div class="form-group">
        <label for="nama">Nama Karyawan</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= set_value('nama'); ?>" required>
        <small class="text-danger"><?= form_error('nama'); ?></small>
    </div>

    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?= set_value('jabatan'); ?>" required>
        <small class="text-danger"><?= form_error('jabatan'); ?></small>
    </div>

    <div class="form-group">
        <label for="lokasi_kerja">Lokasi Kerja</label>
        <input type="text" name="lokasi_kerja" id="lokasi_kerja" class="form-control" value="<?= set_value('lokasi_kerja'); ?>" required>
        <small class="text-danger"><?= form_error('lokasi_kerja'); ?></small>
    </div>

    <div class="form-group">
        <label for="kategori">Kategori Klaim</label>
        <select name="kategori" id="kategori" class="form-control" required>
            <option value="">Pilih Kategori</option>
            <?php foreach ($kategori_options as $kategori) : ?>
                <option value="<?= $kategori; ?>"><?= $kategori; ?></option>
            <?php endforeach; ?>
        </select>
        <small class="text-danger"><?= form_error('kategori'); ?></small>
    </div>

    <div class="form-group">
        <label for="tgl_pelaksanaan">Tanggal Pelaksanaan</label>
        <input type="date" name="tgl_pelaksanaan" id="tgl_pelaksanaan" class="form-control" value="<?= set_value('tgl_pelaksanaan'); ?>" required>
        <small class="text-danger"><?= form_error('tgl_pelaksanaan'); ?></small>
    </div>

    <div class="form-group">
        <label for="tgl_selesai">Tanggal Selesai</label>
        <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" value="<?= set_value('tgl_selesai'); ?>" required>
        <small class="text-danger"><?= form_error('tgl_selesai'); ?></small>
    </div>

    <div class="form-group">
        <label for="jumlah_nominal">Jumlah Nominal</label>
        <input type="text" name="jumlah_nominal" id="jumlah_nominal" class="form-control" value="<?= set_value('jumlah_nominal'); ?>" required>
        <small class="text-danger"><?= form_error('jumlah_nominal'); ?></small>
    </div>

    <div class="form-group">
        <label for="no_rek">Nomor Rekening</label>
        <input type="text" name="no_rek" id="no_rek" class="form-control" value="<?= set_value('no_rek'); ?>" required>
        <small class="text-danger"><?= form_error('no_rek'); ?></small>
    </div>

    <div class="form-group">
        <label for="nama_bank">Nama Bank</label>
        <input type="text" name="nama_bank" id="nama_bank" class="form-control" value="<?= set_value('nama_bank'); ?>" required>
        <small class="text-danger"><?= form_error('nama_bank'); ?></small>
    </div>

    <div class="form-group">
        <label for="atas_nama">Atas Nama Rekening</label>
        <input type="text" name="atas_nama" id="atas_nama" class="form-control" value="<?= set_value('atas_nama'); ?>" required>
        <small class="text-danger"><?= form_error('atas_nama'); ?></small>
    </div>

    <!-- Button Simpan -->
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a class="btn btn-danger" href="<?= base_url('klaim'); ?>">Cancel</a>

    <?= form_close(); ?>

</div>
<!-- /.container-fluid -->
