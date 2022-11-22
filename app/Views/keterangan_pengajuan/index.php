<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>


<div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>No</th>
                    <th>simluhtan</th>
                    <th>Nama Kelompok</th>
                    <th>Proposal</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($pengajuans as $pengajuan) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $pengajuan['simluhtan'] ?></td>
                            <td><?= $pengajuan['nama_kelompok'] ?></td>
                            <td>
                                <a href="<?= base_url('proposal/' . $pengajuan['proposal']) ?>" target="_blank" class="btn btn-xs btn-primary">Lihat Proposal</a>
                            </td>
                            <td>
                                <a href="<?= base_url('penilaian/' . $pengajuan['id'] . '/show') ?>" class="btn btn-xs btn-primary">Nilai</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection("content") ?>