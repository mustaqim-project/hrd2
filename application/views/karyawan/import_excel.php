<!DOCTYPE html>
<html>
<head>
    <title>Import Excel</title>
</head>
<body>
    <h3>Import Data Karyawan dari Excel</h3>
    <?php if ($this->session->flashdata('success')): ?>
        <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <form method="post" action="<?php echo site_url('karyawan/import'); ?>" enctype="multipart/form-data">
        <input type="file" name="file" accept=".xls, .xlsx">
        <br><br>
        <button type="submit">Import</button>
    </form>
</body>
</html>
