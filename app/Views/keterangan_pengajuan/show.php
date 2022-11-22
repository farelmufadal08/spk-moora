<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>

<?php if (session()->has('success')) : ?>
    <p style="color: green;"><?= session('success') ?></p>
<?php endif ?>
<?php if (session()->has('error')) : ?>
    <p style="color: red;"><?= session('error') ?></p>
<?php endif ?>
<div>
    <form action="<?= base_url('penilaian/' . $pengajuan_id . '/store') ?>" method="POST">
        <?= csrf_field() ?>
        <ul>

            <?php $index_kriteria = 0;
            $no = 1;

            foreach ($kriterias as $kriteria) : ?>

                <div class="jumbotron">

                    <p class="lead" style="border: solid 1px black;  "><?= $no++ ?> <?= $kriteria['kriteria'] ?></p>

                    <p style="bac" sclass="lead"><?= $kriteria['deskripsi'] ?></p>
                    <?php $index_keterangan = 0;
                    foreach ($kriteria['keterangan'] as $keterangan) :
                        $index_keterangan++;
                    ?>
                        <?php $data = $penilaians['kriteria'][$index_kriteria]['keterangan'] ?>
                        <div class="form-input">
                            <?php if ($keterangan) { ?>
                                <input type="<?= ($kriteria['tipe_pilihan'] == 'radio') ? 'radio' : 'checkbox' ?>" value="<?= $keterangan['id'] ?>" id="<?= $keterangan['id'] ?>" name="<?= ($kriteria['tipe_pilihan'] == 'radio') ? 'keterangan[' . $kriteria['id'] . ']' : 'keterangan[' . $kriteria['id'] . '][]' ?>" <?= (in_array($keterangan['id'], array_column($data, 'id'))) ? 'checked=""' : '' ?>>
                                <label for="<?= $keterangan['id'] ?>"><?= $keterangan['keterangan_kriteria'] ?></label>
                            <?php } ?>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php $index_kriteria++;
            endforeach ?>
        </ul>
        <button type="submit" class="btn btn-center btn-outline-success my-2 my-sm-0  ">Simpan</button>
    </form>
</div>
<?= $this->endSection("content") ?>