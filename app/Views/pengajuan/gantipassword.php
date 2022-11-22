<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>

<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>

<div class="create">
    <form action="<?= base_url('pengajuan/update') ?>" method="POST">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">

        <!-- <div class="form-input">
            <label for="kelompok_id">simluhtan</label>
            <input type="text" id="kelompok_id" name="kelompok_id" class="form-control" placeholder="simluhtan">
        </div> -->
        <div class="form-input">
            <label for="password">password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="password ">
        </div>

        <br>


        <button type="submit" class="btn btn-center btn-outline-success my-2 my-sm-0  ">Simpan</button>



    </form>
</div>


<?= $this->endSection("content") ?>