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
            <hr />
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>kode kelompok</th>
                        <th>nama kelompok</th>
                        <th>nama ketua</th>
                        <th>nomor HP</th>
                        <th>kabupaten</th>
                        <th>kecamatan</th>
                        <th>desa</th>
                        <th>Keterangan</th>
                        <th>berkas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no  = 1;
                    foreach ($berkas as $row) {
                    ?>
                        <tr>
                            <td><?= $row->kode_kelompok; ?></td>
                            <td><?= $row->nama_kelompok; ?></td>
                            <td><?= $row->nama_ketua; ?></td>
                            <td><?= $row->nomor_hp; ?></td>
                            <td><?= $row->kabupaten; ?></td>
                            <td><?= $row->kecamatan; ?></td>
                            <td><?= $row->desa; ?></td>

                            <td><?= $no++; ?></td>
                            <td><?= $row->keterangan; ?></td>

                            <td><a class="btn btn-info" href="<?= base_url(); ?>/berkas/download/<?= $row->id_berkas; ?>">Download</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?= $this->endSection("content") ?>