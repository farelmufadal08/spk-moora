<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>


<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>

<div class="create">
    <form action="<?= base_url('alternatif/store') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="form-input">
            <label for="simluhtan">simluhtan</label>
            <input type="number" id="simluhtan" name="simluhtan" class="form-control" placeholder=" kode kelompok" required autofocus>
        </div>
        <div class="form-input">
            <label for="nama_kelompok">Nama Kelompok</label>
            <input type="text" id="nama_kelompok" name="nama_kelompok" class="form-control" placeholder="nama kelompok" required>
        </div>
        <div class="form-input">
            <label for="nama_ketua">Nama Ketua</label>
            <input type="text" id="nama_ketua" name="nama_ketua" class="form-control" placeholder="nama ketua " required>
        </div>
        <div class="form-input">
            <label for="nomor_hp">Nomor Hp</label>
            <input type="number" id="nomor_hp" name="nomor_hp" class="form-control" placeholder="nomor hp" required>
        </div>
        <div class="form-input">
            <label for="kabupaten">Kabupaten</label>
            <input type="text" id="kabupaten" name="kabupaten" class="form-control" placeholder="kabupaten" required>
        </div>
        <div class="form-input">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder="kecamatan" required>
        </div>
        <div class="form-input">
            <label for="desa">Desa</label>
            <input type="text" id="desa" name="desa" placeholder="desa" class="form-control" placeholder="desa " required>
        </div>
        <br>
        <button type="submit" class="btn btn-center btn-outline-success my-2 my-sm-0  ">Simpan</button>
    </form>
</div>
<?= $this->endSection("content") ?>