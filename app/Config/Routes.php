<?php

namespace Config;

use App\Controllers\AuthController;
use App\Controllers\UserControlller;
use App\Controllers\KriteriaController;
use App\Controllers\AlternatifController;
use App\Controllers\KeteranganKriteriaController;
use App\Database\Migrations\KeteranganKriteriaAlternatif;
use App\Controllers\KeteranganKriteriaPengajuanController;
use App\Controllers\KeteranganKriteriaAlternatifController;
use App\Controllers\PengadaanController;
use App\Controllers\PengajuanController;
use App\Controllers\PengajuanDiterimaController;
use App\Controllers\PengajuanMasukController;
use App\Controllers\PerhitunganController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->addRedirect('/', 'home');
$routes->get('homekelompok', 'Home::kelompok', ['filter' => 'logged_in:kelompokternak']);

$routes->get('home', 'Home::index', ['filter' => 'logged_in:pegawai, admin, kelompokternak']);

$routes->get('berkas', 'berkas::index');
$routes->get('berkas/upload', 'berkas::upload');


$routes->get('berkas/create', 'berkas::create');
$routes->post('/berkas/save', 'berkas::save');
$routes->get('/berkas/download/(:segment)', 'berkas::download/$1');


// $routes->get("generate-pdf", "AlternatifController::generatePDF");
$routes->get('generate-pdf/(:num)', 'PengadaanController::generatePDF/$1    ', ['filter' => 'logged_in:admin']);




$routes->get('login', 'AuthController::index', ['filter' => 'logged_out']);
$routes->post('login', 'AuthController::login');
$routes->post('logout', 'AuthController::logout');

$routes->group('alternatif', ['filter' => 'logged_in: admin,pegawai,kelompokternak'], function ($routes) {
    $routes->get('', [AlternatifController::class, 'index']);
    $routes->get('create', [AlternatifController::class, 'create']);
    $routes->get('(:num)/edit', [AlternatifController::class, 'edit/$1']);
    $routes->post('store', [AlternatifController::class, 'store']);
    $routes->put('(:num)/update', [AlternatifController::class, 'update/$1']);
    $routes->delete('(:num)/destroy', [AlternatifController::class, 'destroy/$1']);
    // $routes->get('generate-pdf', [AlternatifController::class, 'generatePDF']);
});

$routes->group('kriteria', ['filter' => 'logged_in:admin'], function ($routes) {
    $routes->get('', [KriteriaController::class, 'index']);
    $routes->get('create', [KriteriaController::class, 'create']);
    $routes->get('(:num)/edit', [KriteriaController::class, 'edit/$1']);
    $routes->post('store', [KriteriaController::class, 'store']);
    $routes->put('(:num)/update', [KriteriaController::class, 'update/$1']);
    $routes->delete('(:num)/destroy', [KriteriaController::class, 'destroy/$1']);
});

$routes->group('keterangan', ['filter' => 'logged_in:admin'], function ($routes) {
    $routes->get('(:num)', [KeteranganKriteriaController::class, 'index/$1']);
    $routes->get('(:num)/create', [KeteranganKriteriaController::class, 'create/$1']);
    $routes->get('(:num)/edit', [KeteranganKriteriaController::class, 'edit/$1']);
    $routes->post('store', [KeteranganKriteriaController::class, 'store/$1']);
    $routes->put('(:num)/update', [KeteranganKriteriaController::class, 'update/$1']);
    $routes->delete('(:num)/(:num)/destroy', [KeteranganKriteriaController::class, 'destroy/$1/$2']);
});

$routes->group('penilaian', ['filter' => 'logged_in:pegawai'], function ($routes) {
    $routes->get('', [KeteranganKriteriaPengajuanController::class, 'index/$1']);
    $routes->get('(:num)/show', [KeteranganKriteriaPengajuanController::class, 'show/$1']);
    $routes->post('(:num)/store', [KeteranganKriteriaPengajuanController::class, 'store/$1']);
});

$routes->group('user', ['filter' => 'logged_in:admin'], function ($routes) {
    $routes->get('', [UserControlller::class, 'index']);
    $routes->get('create', [UserControlller::class, 'create']);
    $routes->get('(:num)/edit', [UserControlller::class, 'edit/$1']);
    $routes->put('(:num)/update', [UserControlller::class, 'update/$1']);
    $routes->get('(:num)/show', [KeteranganKriteriaAlternatifController::class, 'show/$1']);
    $routes->post('(:num)/store', [KeteranganKriteriaAlternatifController::class, 'store/$1']);
    $routes->post('store', [UserControlller::class, 'store']);
    $routes->delete('(:num)/destroy', [UserControlller::class, 'destroy/$1']);
});

$routes->group('pengajuan-masuk', ['filter' => 'logged_in:admin'], function ($routes) {
    $routes->get('', [PengajuanMasukController::class, 'index']);
    $routes->put('(:num)/update', [PengajuanMasukController::class, 'update/$1']);
    $routes->delete('(:num)/destroy', [PengajuanMasukController::class, 'destroy/$1']);
});

$routes->group('pengajuan-diterima', ['filter' => 'logged_in:admin'], function ($routes) {
    $routes->get('', [PengajuanDiterimaController::class, 'index']);
    $routes->delete('(:num)/destroy', [PengajuanDiterimaController::class, 'destroy']);
});

$routes->group('pengadaan', ['filter' => 'logged_in:admin'], function ($routes) {
    $routes->get('', [PengadaanController::class, 'index']);
    $routes->get('(:num)/show', [PengadaanController::class, 'show/$1']);
    $routes->get('create', [PengadaanController::class, 'create']);
    $routes->post('store', [PengadaanController::class, 'store']);
    $routes->put('(:num)/update', [PengadaanController::class, 'update/$1']);
    $routes->delete('(:num)/destroy', [PengadaanController::class, 'destroy/$1']);
});

$routes->group('pengajuan', ['filter' => 'logged_in:kelompokternak'], function ($routes) {
    $routes->get('', [PengajuanController::class, 'index']);
    $routes->post('store', [PengajuanController::class, 'store']);
    $routes->get('gantipassword', [PengajuanController::class, 'gantipassword']);
    $routes->put('update', [PengajuanController::class, 'update']);


    $routes->delete('(:num)/destroy', [PengajuanController::class, 'destroy']);
});

$routes->group('perhitungan', ['filter' => 'logged_in:admin'], function ($routes) {
    $routes->get('', [PerhitunganController::class, 'index']);
    $routes->post('pilih-pengajuan', [PerhitunganController::class, 'store']);
    // $routes->post('store', [PerhitunganController::class, 'store']);
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
