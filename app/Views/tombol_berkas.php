<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            Data Berkas
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>
            <a href="<?= base_url(); ?>/berkas/create" class="btn btn-primary">Upload</a>

        </div>
    </div>
</div>



<?= $this->endSection("content") ?>