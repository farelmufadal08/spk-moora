<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>

<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>
<div class="create">
    <form action="<?= base_url('pengadaan/store') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" id="tahun" name="tahun" class="form-control" placeholder="Tahun" required>
        </div>
        <div class="form-group">
            <label for="nama_pengadaan">Nama Pengadaan</label>
            <input type="text" id="nama_pengadaan" name="nama_pengadaan" class="form-control" placeholder="Nama Pengadaan" required>
        </div>

        <button type="submit" class="btn btn-center btn-outline-success my-2 my-sm-0 ">Simpan</button>
    </form>
</div>
<?= $this->endSection("content") ?>