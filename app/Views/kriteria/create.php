<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>

<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>


<div class="create">
    <form action="<?= base_url('kriteria/store') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="kriteria">Kriteria</label>
            <input type="text" id="kriteria" name="kriteria" class="form-control" placeholder="kriteria" required autofocus>
        </div>
        <!-- <div class="form-group">
            <label for="kode_kriteria">Kode Kriteria</label>
            <input type="text" id="kode_kriteria" name="kode_kriteria" class="form-control" placeholder="kode kriteria" required>
        </div> -->
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="deskripsi" required></textarea>
        </div>
        <div class="form-group">
            <label for="tipe_pilihan">Tipe Pilihan</label>
            <select name="tipe_pilihan" id="tipe_pilihan" class="form-control">
                <option selected disabled>Tipe Pilihan</option>
                <option value="radio">Radio Button</option>
                <option value="checkbox">CheckBox</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cost_benefit">Cost/Benefit</label>
            <select name="cost_benefit" id="cost_benefit" class="form-control">
                <option selected disabled>Cost / Benefit</option>
                <option value="cost">Cost</option>
                <option value="benefit">Benefit</option>
            </select>
        </div>
        <div class="form-group">
            <label for="bobot_kriteria">Bobot Kriteria</label>
            <input type="number" id="bobot_kriteria" name="bobot_kriteria" class="form-control" placeholder="bobot" required>
        </div>

        <button type="submit" class="btn btn-center btn-outline-success my-2 my-sm-0  ">Simpan</button>
    </form>
</div>
<?= $this->endSection("content") ?>