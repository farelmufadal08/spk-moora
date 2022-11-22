<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>


<div class="container">
    <div class="card">
        <div class="card-header">
            Form Upload Berkas
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url(); ?>/berkas/save" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-input">
                    <label for="kode_kelompok">Kode Kelompok</label>
                    <input type="text" id="kode_kelompok" name="kode_kelompok" class="form-control" placeholder=" kode kelompok" required autofocus>
                </div>
                <div class="form-input">
                    <label for="nama_kelompok">nama Kelompok</label>
                    <input type="text" id="nama_kelompok" name="nama_kelompok" class="form-control" placeholder=" nama kelompok" required>
                </div>
                <div class="form-input">
                    <label for="nama_ketua"> nama ketua</label>
                    <input type="text" id="nama_ketua" name="nama_ketua" class="form-control" placeholder=" nama ketua" required>
                </div>
                <div class="form-input">
                    <label for="nomor_hp">nomor HP</label>
                    <input type="text" id="nomor_hp" name="nomor_hp" class="form-control" placeholder=" no HP" required>
                </div>
                <div class="form-input">
                    <label for="kabupaten">kabupaten</label>
                    <input type="text" id="kabupaten" name="kabupaten" class="form-control" placeholder=" kabupaten" required>
                </div>
                <div class="form-input">
                    <label for="kecamatan">Kode Kelompok</label>
                    <input type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder=" kecamatan" required>
                </div>
                <div class="form-input">
                    <label for="desa">desa</label>
                    <input type="text" id="desa" name="desa" class="form-control" placeholder=" desa" required>
                </div>
                <div class="mb-3">
                    <label for="berkas" class="form-label">Berkas</label>
                    <input type="file" class="form-control" id="berkas" name="berkas">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= old('keterangan'); ?></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-info" value="Upload" />
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection("content") ?>