<head>
    <style>
        table,
        table thead th,
        table tbody tr td {
            border: solid 1px black;
        }

        table {
            width: 100vw;
        }

        hr {
            border: solid 2px black;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #logo {
            width: 70px !important;
            height: 80px !important;
        }

        #brand {
            text-align: center;
        }

        #header {
            border: none !important;
        }

        img {
            width: 70px;
            height: 80px;
        }
    </style>
</head>
<div>
    <table border="0" id="header">
        <thead>
            <th id="logo"><img class="ml-5 mt-5" src="../assets/img/riau.png" alt=""></th>
            <th id="brand"><span style="display: block;">Dinas Peternakan dan Kesehatan Hewan</span> <span style="display: block;">Provinsi Riau</span></th>
        </thead>
    </table>
</div>
<hr>
<div>
    <table cellspacing="0">

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
<script>
    window.print();
</script>