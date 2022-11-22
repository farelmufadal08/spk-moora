<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>


<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>
<div>
    <form action="<?= base_url('keterangan/store') ?>" method="POST">
        <?= csrf_field() ?>
        <input type="hidden" name="kriteria_id" value="<?= $kriteria_id ?>">
        <div class="form-group">
            <label for="keterangan_kriteria">Keterangan</label>
            <input type="text" id="keterangan_kriteria" name="keterangan_kriteria" class="form-control" placeholder="keterangan kriteria" required autofocus>
        </div>
        <div class="form-group">
            <label for="bobot_pilihan">Bobot</label>
            <input type="number" id="bobot_pilihan" name="bobot_pilihan" class="form-control" placeholder="bobot pilihan" required>
        </div>
        <button type="submit" class="btn btn-center btn-outline-success my-2 my-sm-0  ">Simpan</button>
    </form>
</div>
<?= $this->endSection("content") ?>