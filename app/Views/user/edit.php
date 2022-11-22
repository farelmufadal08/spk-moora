<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>
<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>
<div class="create">
    <form action="<?= base_url('user/' . $user_id . '/update') ?>" method="POST">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">

        <div class="form-input">
            <label for="nip">nip</label>
            <input type="text" id="nip" name="nip" class="form-control" placeholder="nip" value="<?= $user['nip'] ?>">
        </div>
        <div class="form-input">
            <label for="username">username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="username" value="<?= $user['username'] ?>">
        </div>
        <div class="form-input">
            <label for="nama">nama pengguna</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="nama" value="<?= $user['nama'] ?>">
        </div>
        <div class="form-input">
            <label for="password">password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="password"></input>
        </div>



        <button type="submit" class="btn btn-center btn-outline-success my-2 my-sm-0  ">Simpan</button>
    </form>
</div>
<?= $this->endSection("content") ?>