<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>



<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>

<div class="kriteria">
    <a href="<?= base_url('kriteria/create') ?> " class="btn btn-primary mb-5"><i class="fas fa-plus-square mr-5"></i>tambah data</a>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <th>no</th>
                    <!-- <th>Kode kriteria</th> -->
                    <th>kriteria</th>
                    <th>deskripsi</th>
                    <th>tipe pilihan</th>
                    <th>cost/benefit</th>
                    <th>bobot kriteria</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kriterias as $kriteria) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <!-- <td><?= $kriteria['kode_kriteria'] ?></td> -->
                            <td><?= $kriteria['kriteria'] ?></td>
                            <td><?= $kriteria['deskripsi'] ?></td>
                            <td><?= $kriteria['tipe_pilihan'] ?></td>
                            <td><?= $kriteria['cost_benefit'] ?></td>
                            <td><?= $kriteria['bobot_kriteria'] ?></td>
                            <td>
                                <a href="<?= base_url('keterangan/' . $kriteria['id']) ?>"><button class="btn btn btn-primary">view</button></a>
                                <a href="<?= base_url('kriteria/' . $kriteria['id'] . '/edit') ?>"><button class="btn btn btn-success">edit</button></a>
                                <form action="<?= base_url('kriteria/' . $kriteria['id'] . '/destroy') ?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn btn-danger" onclick="return confirm('apakah anda yakin');" type="submit">hapus</button>
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