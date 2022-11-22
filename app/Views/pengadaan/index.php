<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>

<div class="pengadaan">
    <a href="<?= base_url('pengadaan/create') ?> " class="btn btn-primary mb-5"><i class="fas fa-plus-square mr-5"></i>tambah data</a>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <th>no</th>
                    <th>Tahun</th>
                    <th>Nama Pengadaan</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pengadaans as $pengadaan) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pengadaan['tahun'] ?></td>
                            <td><?= $pengadaan['nama_pengadaan'] ?></td>
                            <td><?= ($pengadaan['status']) ? 'Berlangsung' : 'Selesai' ?></td>
                            <td>
                                <?php if (!$pengadaan['status']) : ?>
                                    <a href="<?= base_url('pengadaan/'.$pengadaan['id'].'/show') ?>" class="btn btn-xs btn-primary">Lihat</a>
                                <?php endif ?>
                                <?php if ($pengadaan['status']) : ?>
                                    <form action="<?= base_url('pengadaan/'.$pengadaan['id'].'/update') ?>" method="POST">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <button class="btn btn-xs btn-success" onclick="return confirm('apakah anda yakin menutup pengadaan?')">Tutup</button>
                                    </form>
                                    <form action="<?= base_url('pengadaan/'.$pengadaan['id'].'/destroy') ?>" method="POST">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-xs btn-danger" onclick="return confirm('apakah anda yakin mengahapus pengadaan?')">Hapus</button>
                                    </form>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<?= $this->endSection("content") ?>