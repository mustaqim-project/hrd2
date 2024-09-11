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

            <a href="<?= base_url('klaim/form_tambah_klaim'); ?>" class="btn btn-primary mb-2 ml-4">
                <i class="fas fa-plus"></i> Tambah Data Klaim Karyawan
            </a>

            <!-- Table Data Klaim Karyawan -->
            <table id="table_id" class="table table-hover table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($klaim_karyawan as $klaim) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $klaim['nik']; ?></td>
                            <td><?= $klaim['nama']; ?></td>
                            <td><?= $klaim['jabatan']; ?></td>
                            <td>
                                <!-- Action buttons (Edit, Delete, etc.) -->
                                <a href="<?= base_url(); ?>klaim/lihatklaimkaryawan/<?= $klaim['id']; ?>" class="btn btn-sm btn-primary" title="Lihat"><i class="fas fa-eye"></i></a>
                                <a href="<?= base_url(); ?>klaim/editKlaimKaryawan/<?= $klaim['id']; ?>" class="btn btn-sm btn-success" title="Edit"><i class="fas fa-pen"></i></a>
                                <a href="<?= base_url(); ?>klaim/hapusKlaimKaryawan/<?= $klaim['id']; ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus data ini');"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
