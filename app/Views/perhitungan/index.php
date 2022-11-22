<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>

<div class="kriteria">
    <div class="card-body">
        <h2>Kriteria</h2>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>no</th>
                    <th>Kriteria</th>
                    <th>Kode Kriteria</th>
                    <th>Bobot</th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kriterias as $kriteria) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kriteria['kriteria'] ?></td>
                            <td><?= $kriteria['kode_kriteria'] ?></td>
                            <td><?= $kriteria['bobot_kriteria'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <h2>matriks keputusan</h2>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>no</th>
                    <th>Kelompok</th>
                    <?php foreach ($kriterias as $kriteria) : ?>
                        <th><?= $kriteria['kriteria'] ?></th>
                    <?php endforeach ?>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($nilaiKelompoks as $kelompok) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kelompok['nama_kelompok'] ?></td>
                            <?php foreach ($kelompok['kriteria'] as $kriteria) : ?>
                                <td><?= $kriteria['bobot_pilihan'] ?></td>
                            <?php endforeach ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <h2>Pembagi</h2>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th></th>
                    <?php foreach ($kriterias as $kriteria) : ?>
                        <th><?= $kriteria['kode_kriteria'] ?></th>
                    <?php endforeach ?>
                </thead>
                <tbody>

                    <tr>
                        <td>Pembagi</td>
                        <?php foreach ($pembagiKriterias as $pembagi) : ?>
                            <td><?= $pembagi['pembagi'] ?></td>
                        <?php endforeach ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="card-body">
        <h2>Matriks ternormalisasi</h2>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>no</th>
                    <th>Kelompok</th>
                    <?php foreach ($kriterias as $kriteria) : ?>
                        <th><?= $kriteria['kode_kriteria'] ?></th>
                    <?php endforeach ?>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($matriksKeputusans as $kelompok) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kelompok['nama_kelompok'] ?></td>
                            <?php foreach ($kelompok['kriteria'] as $kriteria) : ?>
                                <td><?= $kriteria['matriks_keputusan'] ?></td>
                            <?php endforeach ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="card-body">
        <h2>perkalian bobot</h2>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>no</th>
                    <th>Kelompok</th>
                    <?php foreach ($kriterias as $kriteria) : ?>
                        <th><?= $kriteria['kode_kriteria'] ?></th>
                    <?php endforeach ?>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($normalisasiMatriks as $kelompok) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kelompok['nama_kelompok'] ?></td>
                            <?php foreach ($kelompok['kriteria'] as $kriteria) : ?>
                                <td><?= $kriteria['normalisasiMatriks'] ?></td>
                            <?php endforeach ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="card-body">
        <h2>proses optimasi</h2>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>no</th>
                    <th>Kelompok</th>
                    <th>Nilai %</th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($selisihs as $kelompok) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kelompok['nama_kelompok'] ?></td>
                            <td><?= $kelompok['selisih'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="card-body">
        <h2>Ranking</h2>
        <form action="<?= base_url('perhitungan/pilih-pengajuan') ?>" method="POST">
            <button class="btn btn-xs btn-success" onclick="return confirm('apakah anda yakin?')" type="submit">Tandai sebagai penerima</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>
                            <input type="checkbox" id="checkall">
                        </th>
                        <th>Rank</th>
                        <th>Kelompok</th>
                        <th>Nilai %</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?= csrf_field() ?>
                        <?php $no = 1;
                        foreach ($rankings as $kelompok) : ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="check" name="pengajuan_id[]" id="check<?= $kelompok['id'] ?>" value="<?= $kelompok['id'] ?>" <?= ($kelompok['status'] == 'menerima') ? 'checked=""' : '' ?>>
                                </td>
                                <td><?= $no++ ?></td>
                                <td><?= $kelompok['nama_kelompok'] ?></td>
                                <td><?= $kelompok['selisih'] ?></td>
                                <td>
                                    <!-- <button class="btn btn-xs btn-primary btn-pilih" type="submit" data-id="<?= $kelompok['id'] ?>">Pilih</button> -->
                                </td>
                            </tr>
                        <?php endforeach ?>
        </form>
        </tbody>
        </table>
    </div>
</div>

</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        checkAllBtn = $('#checkall');
        checkBtn = $('.check');
        btnPilih = $('.btn-pilih')

        checkAllBtn.click(function() {
            checkBtn.prop('checked', checkAllBtn.is(':checked'));
        });

        btnPilih.click(function() {
            const id = $(this).data('id');
            const checkBtnId = $(`#check${id}`)
            isConfirm = confirm('apakah anda yakin ?');
            if (isConfirm) {
                checkBtnId.prop('checked', true)
            } else {
                checkBtnId.prop('checked', false)
            }
        })
    });
</script>
<?= $this->endSection() ?>