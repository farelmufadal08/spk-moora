<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>

<div class="kriteria">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <th>no</th>

                    <th>Nama Kelompok</th>
                    <th>Nama Ketua</th>
                    <th>Nomor HP</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Desa</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pengajuans as $pengajuan) : ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <td><?= $pengajuan['nama_kelompok'] ?></td>
                            <td><?= $pengajuan['nama_ketua'] ?></td>
                            <td><?= $pengajuan['nomor_hp'] ?></td>
                            <td><?= $pengajuan['kabupaten'] ?></td>
                            <td><?= $pengajuan['kecamatan'] ?></td>
                            <td><?= $pengajuan['desa'] ?></td>
                            <td>
                                <a target="blank" class="btn btn-xs btn-primary" href="<?= base_url('proposal/' . $pengajuan['proposal']) ?>">Lihat Proposal</a>
                                <form action="<?= base_url('pengajuan-masuk/' . $pengajuan['pengajuan_id'] . '/update') ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="PUT">
                                    <button class="btn btn-xs btn-success" onclick="return confirm('apakah anda yakin menerima pengajuan ini?')" type="submit">Terima</button>
                                </form>
                                <form action="<?= base_url('pengajuan-masuk/' . $pengajuan['pengajuan_id'] . '/destroy') ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-xs btn-danger" onclick="return confirm('apakah anda yakin menolak pengajuan ini');" type="submit">Tolak</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<?= $this->endSection("content") ?>