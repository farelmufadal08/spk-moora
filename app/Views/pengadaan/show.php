<?= $this->extend("templates/layout"); ?>

<?= $this->section("content") ?>

<div class="kriteria">
    <div class="card-body">
        <h3>Rekap Penerima Bantuan Tahun <?= $pengadaan['tahun'] ?> (<?= $pengadaan['nama_pengadaan'] ?>)</h3>
        <div class="table-responsive">
            <a target="_blank" href="<?php echo base_url('generate-pdf/' . $pengadaan['id']) ?>" class="btn btn-primary ">
                Download Laporan Pdf
            </a>
            <hr>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <th>no</th>
                    <th>simluhtan</th>
                    <th>Nama Kelompok</th>
                    <th>Nama Ketua</th>
                    <th>Nomor HP</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Desa</th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kelompoks as $kelompok) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kelompok['simluhtan'] ?></td>
                            <td><?= $kelompok['nama_kelompok'] ?></td>
                            <td><?= $kelompok['nama_ketua'] ?></td>
                            <td><?= $kelompok['nomor_hp'] ?></td>
                            <td><?= $kelompok['kabupaten'] ?></td>
                            <td><?= $kelompok['kecamatan'] ?></td>
                            <td><?= $kelompok['desa'] ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<?= $this->endSection("content") ?>