<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>

<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>
<div class="create">
    <form action="<?= base_url('user/store') ?>" method="POST">
        <?= csrf_field() ?>


        <div class="form-group">
            <label for="nip">nip</label>
            <input type="number" id="nip" name="nip" class="form-control" placeholder="nip" required autofocus>
        </div>
        <div class="form-group">
            <label for="username">username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="username" required autofocus>
        </div>
        <div class="form-group">
            <label for="nama">nama pengguna</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="nama pengguna    " required>
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="password" required></input>
        </div>

        <div class="form-group">
            <label for="role">role</label>
            <select name="role" id="role" class="form-control">
                <option selected disabled>role</option>
                <option value="admin">admin</option>
                <option value="pegawai">pegawai</option>

            </select>
        </div>


        <button type="submit" class="btn btn-center btn-outline-success my-2 my-sm-0  ">Simpan</button>
    </form>
</div>
<?= $this->endSection("content") ?>