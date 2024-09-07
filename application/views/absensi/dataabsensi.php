<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 ml-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <!-- Menampilkan Pesan Kesalahan -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <!-- Menampilkan Pesan Kesalahan -->

            <!-- Jika Yang Login adalah HRD Maka Button Tambah Dan Download Tampil -->
            <?php
            $role_id = $this->session->userdata("role_id");

            if ($role_id == 1 ||  $role_id == 11) : ?>
                <!-- Button Tambah Data Absensi -->
                <a href="<?= base_url('absensi/tambahabsensi'); ?>" class="btn btn-primary mb-2 ml-4">
                    <i class="fas fa-plus"></i> Tambah Data Absen
                </a>

                <!-- Button Import Data Absensi -->
                <a href="<?= base_url('absensi/download_template'); ?>" class="btn btn-info mb-2 ml-4">
                    <i class="fas fa-download"></i> Download Template
                </a>

                <!-- Button Import Data Absensi -->
                <button type="button" class="btn btn-primary mb-2 ml-4" data-toggle="modal" data-target="#importModal">
                    <i class="fas fa-upload"></i> Import Data Absen
                </button>
            <?php endif; ?>

            <!-- Table Data Absen -->
            <table id="table_id" class="table table-hover table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIK Karyawan</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Tgl Absen</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($joinabsensi as $pm) : ?>
                        <?php
                        $tanggalabsen = date('d-m-Y', strtotime($pm['tanggal_absen']));
                        $tanggalselesai = date('d-m-Y', strtotime($pm['tanggal_selesai']));
                        $hari = ($pm['keterangan_absen'] == "Cuti") ? " Hari" : "";
                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $pm['nik_karyawan']; ?></td>
                            <td><?= $pm['nama_karyawan']; ?></td>
                            <td><?= $pm['tanggal_absen']; ?></td>
                            <td><?= $pm['keterangan_absen']; ?></td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#viewAbsen" onclick="viewdata(
                                    '<?= $pm['id_absen']; ?>',
                                    '<?= $pm['nik_karyawan_absen']; ?>',
                                    '<?= $tanggalabsen; ?>',
                                    '<?= $tanggalselesai; ?>',
                                    '<?= $pm['keterangan_absen']; ?>',
                                    '<?= $pm['lama_absen'] . $hari; ?>',
                                    '<?= $pm['keterangan']; ?>',
                                    '<?= $pm['jenis_cuti']; ?>')">
                                    <i class="fas fa-eye"></i> View
                                </a>

                                <?php if ($role_id == 1 || $role_id == 11) : ?>
                                    <a href="<?= base_url(); ?>absensi/editabsensi/<?= $pm['id_absen']; ?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-pen"></i> Edit
                                    </a>
                                    <a href="<?= base_url(); ?>absensi/hapusabsensi/<?= $pm['id_absen']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Import Data Absen -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('absensi/import_absensi'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Upload File Excel</label>
                        <input type="file" name="file" class="form-control" id="file" accept=".xls,.xlsx" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal View Absen -->
<div class="modal fade" id="viewAbsen" tabindex="-1" role="dialog" aria-labelledby="viewAbsenLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewAbsenLabel">View Detail Absensi Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_absen" name="id_absen">
                <div class="form-group row">
                    <label for="nik_karyawan_absen" class="col-sm-5 col-form-label">NIK Karyawan</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" id="nik_karyawan_absen" name="nik_karyawan_absen">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggalabsen" class="col-sm-5 col-form-label">Tanggal Absen</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" id="tanggalabsen" name="tanggalabsen">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggalselesai" class="col-sm-5 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" id="tanggalselesai" name="tanggalselesai">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keterangan_absen" class="col-sm-5 col-form-label">Keterangan Absen</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" id="keterangan_absen" name="keterangan_absen">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lama_absen" class="col-sm-5 col-form-label">Lama Absen</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" id="lama_absen" name="lama_absen">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keterangan" class="col-sm-5 col-form-label">Keterangan</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" id="keterangan" name="keterangan">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jenis_cuti" class="col-sm-5 col-form-label">Jenis Cuti</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" id="jenis_cuti" name="jenis_cuti">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function viewdata(id_absen, nik_karyawan_absen, tanggalabsen, tanggalselesai, keterangan_absen, lama_absen, keterangan, jenis_cuti) {
        $('#id_absen').val(id_absen);
        $('#nik_karyawan_absen').val(nik_karyawan_absen);
        $('#tanggalabsen').val(tanggalabsen);
        $('#tanggalselesai').val(tanggalselesai);
        $('#keterangan_absen').val(keterangan_absen);
        $('#lama_absen').val(lama_absen);
        $('#keterangan').val(keterangan);
        $('#jenis_cuti').val(jenis_cuti);
    }
</script>
