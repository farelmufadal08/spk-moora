<?php

use CodeIgniter\HTTP\URI;

$uri = new URI(uri_string());

?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($uri->getSegment(1) == 'home') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url() ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <?php if (session()->get('role') == 'admin') : ?>
        <li class="nav-item <?= ($uri->getSegment(1) == 'user' || $uri->getSegment(1) == 'kriteria') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Data</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('user') ?>">User</a>
                    <a class="collapse-item" href="<?= base_url('kriteria') ?>">Kriteria</a>
                    <a class="collapse-item" href="<?= base_url('alternatif') ?>">kelompok ternak</a>

                </div>
            </div>
        </li>

        <li class="nav-item <?= ($uri->getSegment(1) == 'pengajuan-masuk' || $uri->getSegment(1) == 'pengajuan-diterima') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Pengajuan</span>
            </a>
            <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('pengajuan-masuk') ?>">Pengajuan Masuk</a>
                    <a class="collapse-item" href="<?= base_url('pengajuan-diterima') ?>">Pengajuan Diterima</a>
                </div>
            </div>
        </li>

        <li class="nav-item <?= ($uri->getSegment(1) == 'pengadaan') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pengadaan') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Pengadaan Bantuan</span>
            </a>
        </li>

        <li class="nav-item <?= ($uri->getSegment(1) == 'perhitungan') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('perhitungan') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Perhitungan</span></a>
        </li>

    <?php endif ?>

    <?php if (session()->get('role') == 'pegawai') : ?>
        <li class="nav-item <?= ($uri->getSegment(1) == 'penilaian') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('penilaian') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Nilai Kelompok</span>
            </a>
        </li>
    <?php endif ?>

    <?php if (session()->get('role') == 'kelompokternak') : ?>
        <li class="nav-item <?= ($uri->getSegment(1) == 'pengajuan') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pengajuan') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>pengajuan</span>
            </a>

        </li>
        <li class="nav-item <?= ($uri->getSegment(1) == 'pengajuan') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pengajuan/gantipassword') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>ganti password</span>
            </a>

        </li>
    <?php endif ?>
</ul>
<!-- End of Sidebar -->