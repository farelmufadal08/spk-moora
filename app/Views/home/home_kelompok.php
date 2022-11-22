<?php if (session()->get('role') == 'kelompokternak') : ?>

    <?= $this->extend("templates/layout"); ?>

    <?= $this->section("content") ?>

    <div class="jumbotron">
        <h2 class="display-5">selamat datang di sistem pendukung keputusan pemilihan bantuan ternak sapi dinas peternakan dan kesehatan hewan provinsi riau</h2>

        <hr class="my-4">
        <p class="lead">sebelum peserta mengikuti program seleksi pemilihan bantuan sapi, peserta harus memberikan dokumen yang dibutuhkan oleh dinas dan dokumen tersebut dijadikan dalam satu file berbentuk PDF</p>
        <p class="lead">berikut dokumen yang harus diserahkan didalam sistem :</p>
        <p>1.latar belakang</p>
        <p>2.maksud dan tujuan</p>
        <p>3.data umum organisasi (berita acara pembentukan organisasi)</p>
        <p>4.alamat lengkap</p>
        <p>5.susunan kepengurusan</p>
        <p>6.foto pengurus</p>
        <p>7.foto KTP dan KK pengurus</p>
        <p>8.foto kandang</p>
        <p>9.foto lahan</p>
        <p>10.surat keterangan domisili</p>
        <p>11.surat keterangan terdaftar Simluhtan</p>

        <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
    </div>











    <?= $this->endSection("content") ?>
<?php endif ?>