<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>
<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>
<div class="create">
    <form action="<?= base_url('kriteria/' . $kriteria['id'] . '/update') ?>" method="POST">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="form-input">
            <label for="kriteria">Kriteria</label>
            <input type="text" id="kriteria" name="kriteria" class="form-control" placeholder="kriteria" value="<?= $kriteria['kriteria'] ?>">
        </div>
        <!-- <div class="form-input">
            <label for="kode_kriteria">Kode Kriteria</label>
            <input type="text" id="kode_kriteria" name="kode_kriteria" class="form-control" placeholder="kode kriteria" value="">
        </div> -->
        <div class="form-input">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="deskripsi"><?= $kriteria['deskripsi']  ?></textarea>
        </div>
        <div class="form-input">
            <label for="tipe_pilihan">Tipe Pilihan</label>
            <select name="tipe_pilihan" id="tipe_pilihan" class="form-control" placeholder="pilih tipe pilihan">
                <option disabled>Cost / Benefit</option>
                <option value="radio" <?= ($kriteria['tipe_pilihan'] == 'radio') ? 'selected' : '' ?>>Radio Button</option>
                <option value="checkbox" <?= ($kriteria['tipe_pilihan'] == 'checkbox') ? 'selected' : '' ?>>CheckBox</option>
            </select>
        </div>

        <div class="form-input">
            <label for="cost_benefit">Cost/Benefit</label>
            <select name="cost_benefit" id="cost_benefit" class="form-control" placeholder="cost/benefit">
                <option disabled>Cost / Benefit</option>
                <option value="cost" <?= ($kriteria['cost_benefit'] == 'cost') ? 'selected' : '' ?>>Cost</option>
                <option value="benefit" <?= ($kriteria['cost_benefit'] == 'benefit') ? 'selected' : '' ?>>Benefit</option>
            </select>
        </div>
        <div class="form-input">
            <label for="bobot_kriteria">Bobot Kriteria</label>
            <input type="number" id="bobot_kriteria" name="bobot_kriteria" class="form-control" placeholder="bobot kriteria" value="<?= $kriteria['bobot_kriteria'] ?>">
        </div>

        <button type="submit" class="btn btn-center btn-outline-success my-2 my-sm-0  ">Simpan</button>
    </form>
</div>
<?= $this->endSection("content") ?>