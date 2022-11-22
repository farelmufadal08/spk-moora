<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>





<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>

<div class="alternatif">
    <a href="<?= base_url('alternatif/create') ?> " class="btn btn-primary mb-5"><i class="fas fa-plus-square mr-5"></i>tambah data</a>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <th>no</th>
                    <th>kode kelompok</th>
                    <th>nama kelompok</th>
                    <th>nama ketua</th>
                    <th>nomor hp</th>
                    <th>kabupaten</th>
                    <th>kecamatan</th>
                    <th>desa</th>
                    <th>AKSI</th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($alternatifs as $alternatif) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $alternatif['simluhtan'] ?></td>
                            <td><?= $alternatif['nama_kelompok'] ?></td>
                            <td><?= $alternatif['nama_ketua'] ?></td>
                            <td><?= $alternatif['nomor_hp'] ?></td>
                            <td><?= $alternatif['kabupaten'] ?></td>
                            <td><?= $alternatif['kecamatan'] ?></td>
                            <td><?= $alternatif['desa'] ?></td>
                            <td>
                                <a href="<?= base_url('alternatif/' . $alternatif['id'] . '/edit') ?>"><button class="btn btn btn-success">edit</button></a>
                                <form action="<?= base_url('alternatif/' . $alternatif['id'] . '/destroy') ?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" onclick="return confirm('apakah anda yakin');" type="submit">hapus</button>
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