<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>
<?php if ($pengadaan) {
    if ($pengajuan) {
        if ($pengajuan->deleted_at) { ?>
            <h3>Pengajuan anda ditolak</h3>
            <form action="<?= base_url('pengajuan/' . $pengajuan->id . '/destroy') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-xs btn-primary" type="submit">Kembali</button>
            </form>
        <?php } else { ?>
            <h3>Pengajuan Anda sedang di proses</h3>
        <?php } ?>
    <?php } else { ?>
        <form action="<?= base_url('pengajuan/store') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <!-- <div style="margin-bottom: 5px;">
                <label for="nomor_registrasi">Nomor Registrasi</label>
                <input type="number" id="nomor_registrasi" name="nomor_registrasi" class="form-control" placeholder="Nomor Registrasi">
            </div>

            <div style="margin-bottom: 5px;">
                <label for="nama_kelompok">Nama Kelompok</label>
                <input type="text" id="nama_kelompok" name="nama_kelompok" class="form-control" placeholder="Nama Kelompok">
            </div>

            <div style="margin-bottom: 5px;">
                <label for="nama_ketua">Nama Ketua</label>
                <input type="text" id="nama_ketua" name="nama_ketua" class="form-control" placeholder="Nama Ketua">
            </div>

            <div style="margin-bottom: 5px;">
                <label for="nomor_hp">Nomor Handphone</label>
                <input type="number" id="nomor_hp" name="nomor_hp" class="form-control" placeholder="Nomor Handphone">
            </div> -->
            <br>

            <div style="margin-bottom: 50px;">
                <h4>silahkan <?= session()->get('nama'); ?> upload file dengan format PDF</h4>
                <br>
                <br>
                <input type="file" id="proposal" name="proposal">
            </div>

            <!-- <div style="margin-bottom: 5px;">
                <label for="kabupaten">Kabupaten</label>
                <input type="text" id="kabupaten" class="form-control" name="kabupaten" placeholder="Kabupaten">
            </div>

            <div style="margin-bottom: 5px;">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" id="kecamatan" class="form-control" name="kecamatan" placeholder="Kecamatan">
            </div>

            <div style="margin-bottom: 5px;">
                <label for="desa">Desa</label>
                <input type="text" id="desa" class="form-control" name="desa" placeholder="Desa">
            </div> -->
            <br>
            <button type="submit" class="btn btn-center btn-outline-success my-2 my-sm-0  ">Simpan</button>
        </form>
    <?php } ?>
<?php } else { ?>
    <h3>Sedang Tidak ada pengadaan</h3>
<?php } ?>

<?= $this->endSection() ?>