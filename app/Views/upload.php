<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>


<form action="<?= site_url('Upload') ?>" method="post" enctype="multipart/form-data"></form>
<?php if (session('pesan')) : ?>
    <div class="alert alert-success">
        <?= session('pesan') ?>
    </div>

<?php endif; ?>
<div class="form-group">
    <label for="kelompok">pilih kelompok</label>
    <select name="cost_benefit" id="cost_benefit" class="form-control">
        <option selected disabled>kelompok</option>
        <option value="kelompok">kelompok</option>

</div>
<div class="form-group">
    <label for="pilih gambar">
        <input type="file" name="gambar[]" class="form-control" multiple required>
    </label>

</div>
<button type="submit" class="btn btn-facebook">upload gambar</button>


<?= $this->endSection("content") ?>