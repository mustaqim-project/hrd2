<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 ml-4 text-gray-800"><?= $title; ?></h1>

    <div class="card border-primary">
        <h5 class="card-header text-white bg-primary">Detail Klaim Karyawan</h5>
        <div class="card-body border-bottom-primary">

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>NIK</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" value="<?= $karyawan['nik']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Nama Karyawan</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" value="<?= $karyawan['nama']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Jabatan</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" value="<?= $karyawan['jabatan']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Lokasi Kerja</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" value="<?= $karyawan['lokasi_kerja']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Tujuan / Alasan Klaim</b></label>
                <div class="col-sm-9">
                    <textarea readonly class="form-control-plaintext"><?= $karyawan['tujuan_alasan']; ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Kategori Klaim</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" value="<?= $karyawan['kategori']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Tanggal Pelaksanaan</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" value="<?= date('d-m-Y', strtotime($karyawan['tgl_pelaksanaan'])); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Tanggal Selesai</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" value="<?= date('d-m-Y', strtotime($karyawan['tgl_selesai'])); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Jumlah Nominal Klaim</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" value="<?= number_format($karyawan['jumlah_nominal'], 2); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Nama Bank</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" value="<?= $karyawan['nama_bank']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>No. Rekening</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" value="<?= $karyawan['no_rek']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Atas Nama</b></label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" value="<?= $karyawan['atas_nama']; ?>">
                </div>
            </div>

        </div>
    </div>

    <a class="btn btn-danger btn-lg btn-sm btn-block mt-3" href="<?= base_url('klaim'); ?>">BACK</a>
</div>
<!-- /.container-fluid -->
