<?php if (session()->get('role') == 'kelompokternak') : ?>

    <?= $this->extend("templates/layout"); ?>

    <?= $this->section("content") ?>

    <div class="jumbotron">
        <h2 class="display-5">selamat datang <?= session()->get('nama'); ?> di sistem pendukung keputusan pemilihan bantuan ternak sapi dinas peternakan dan kesehatan hewan provinsi riau</h2>

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



<?php if (session()->get('role') == 'admin') : ?>



    <?= $this->extend("templates/layout"); ?>

    <?= $this->section("content") ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tot_user ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-300"></i>
                        </div>
                    </div>



                </div>
                <div class="card-footer ">

                    <a href="<?= base_url('user') ?>" class="small-box-footer">lihat detail <i class="fa fa-arrow-circle"></i></a>
                </div>

            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                kelompok ternak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tot_alternatif ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-300"></i>
                        </div>
                    </div>

                </div>
                <div class="card-footer ">

                    <a href="<?= base_url('alternatif') ?>" class="small-box-footer">lihat detail <i class="fa fa-arrow-circle"></i></a>
                </div>
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">kriteria
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tot_kriteria ?></div>
                                </div>
                                <!-- <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div> -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">

                    <a href="<?= base_url('kriteria') ?>" class="small-box-footer">lihat detail <i class="fa fa-arrow-circle"></i></a>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                keterangan kriteria</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tot_keterangan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">


                    <a href="<?= base_url('kriteria') ?>" class="small-box-footer">lihat detail </a>
                </div>
            </div>

        </div>
    </div>
    <?= $this->endSection("content") ?>
<?php endif ?>



<?php if (session()->get('role') == 'pegawai') : ?>



    <?= $this->extend("templates/layout"); ?>

    <?= $this->section("content") ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tot_user ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-300"></i>
                        </div>
                    </div>



                </div>
                <div class="card-footer ">

                    <a href="<?= base_url('user') ?>" class="small-box-footer">lihat detail <i class="fa fa-arrow-circle"></i></a>
                </div>

            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                kelompok ternak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-300"></i>
                        </div>
                    </div>

                </div>
                <div class="card-footer ">

                    <a href="<?= base_url('alternatif') ?>" class="small-box-footer">lihat detail <i class="fa fa-arrow-circle"></i></a>
                </div>
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">kriteria
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tot_kriteria ?></div>
                                </div>
                                <!-- <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div> -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">

                    <a href="<?= base_url('kriteria') ?>" class="small-box-footer">lihat detail <i class="fa fa-arrow-circle"></i></a>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                keterangan kriteria</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tot_keterangan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">


                    <a href="<?= base_url('kriteria') ?>" class="small-box-footer">lihat detail </a>
                </div>
            </div>

        </div>
    </div>
    <?= $this->endSection("content") ?>
<?php endif ?>