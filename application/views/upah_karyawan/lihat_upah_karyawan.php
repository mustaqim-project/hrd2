<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 ml-4 text-gray-800"><?= $title; ?></h1>

    <!-- Form Divisi -->
    <div class="card border-primary">
        <h5 class="card-header text-white bg-primary">Form Data Upah Karyawan</h5>
        <div class="card-body border-bottom-primary">

            <div class="form-group row">
                <label for="perusahaan_id" class="col-sm-3 col-form-label"><b>Nama Karyawan</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['nama_karyawan'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="penempatan_id" class="col-sm-3 col-form-label"><b>Uang Kehadiran</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['uang_kehadiran'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="jabatan_id" class="col-sm-3 col-form-label"><b>Tunjangan Jabatan</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['tunjangan_jabatan'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="jam_kerja_id" class="col-sm-3 col-form-label"><b>Tunjangan Transportasi</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['tunjangan_transportasi'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="status_kerja" class="col-sm-3 col-form-label"><b>Tunjangan POT</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['tunjangan_pot'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="tanggal_mulai_kerja" class="col-sm-3 col-form-label"><b>Tunjangan Komunikasi</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['tunjangan_komunikasi'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_mulai_kerja" class="col-sm-3 col-form-label"><b>Tunjangan Lain Lain</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['tunjangan_lain_lain'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_mulai_kerja" class="col-sm-3 col-form-label"><b>Insentif Libur Bersama</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['insentif_libur_bersama'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_mulai_kerja" class="col-sm-3 col-form-label"><b>Insentif Libur Perusahaan</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['insentif_libur_perusahaan'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_mulai_kerja" class="col-sm-3 col-form-label"><b>Ritase</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['ritase'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_mulai_kerja" class="col-sm-3 col-form-label"><b>Dinas</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['dinas'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_mulai_kerja" class="col-sm-3 col-form-label"><b>Rapelan</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['rapelan'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_mulai_kerja" class="col-sm-3 col-form-label"><b>Lain - Lain</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $karyawan['lain_lain'] ?>">
                </div>
            </div>

           

        </div>
    </div>

    <a class="btn btn-danger btn-lg btn-sm btn-block mt-3" href="<?= base_url('karyawan/karyawan'); ?>">BACK</a>
</div>
<!-- /.container-fluid -->
