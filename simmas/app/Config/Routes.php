<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'AuthController::login');
$routes->post('/authenticate', 'AuthController::authenticate');
// $routes->post('/login', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');
$routes->post('/logout', 'AuthController::logout');

$routes->group('admin', ['filter' => ['jwt', 'role:admin']], function($routes){
    $routes->get('dashboard', 'AdminController::index');

    $routes->get('dudi', 'AdminController::index');
    $routes->get('get-siswa/(:num)', 'AdminController::getSiswaByDudi/$1');
    $routes->get('get-dudi/(:num)', 'AdminController::getDudi/$1');
    $routes->post('update-dudi/(:num)', 'AdminController::updateDudi/$1');
    $routes->post('add-dudi', 'AdminController::addDudi');
    $routes->post('delete-dudi/(:num)', 'AdminController::deleteDudi/$1');  
    $routes->post('restore-dudi/(:num)', 'AdminController::restoreDudi/$1');

    $routes->get('pengguna', 'AdminController::index');
    $routes->post('add-user', 'AdminController::addUser');
    $routes->get('get-user/(:num)', 'AdminController::getUser/$1');
    $routes->post('update-user/(:num)', 'AdminController::updateUser/$1');
    $routes->post('delete-user/(:num)', 'AdminController::deleteUser/$1');

    $routes->get('pengaturan', 'AdminController::index');
    $routes->get('get-school', 'AdminController::getSchool');
    $routes->post('update-school', 'AdminController::updateSchool');

});



$routes->group('siswa', ['filter' => ['jwt', 'role:siswa']], function($routes){
    $routes->get('dashboard', 'SiswaController::index');
    
    $routes->get('dudi', 'SiswaController::index');
    $routes->post('daftar-magang/(:num)', 'SiswaController::daftarMagang/$1');

    $routes->get('jurnal-harian', 'SiswaController::index');
    $routes->post('add-jurnal', 'SiswaController::addJurnal');
    $routes->get('detail-jurnal/(:num)', 'SiswaController::detailJurnal/$1');
    // $routes->put('edit-jurnal/(:num)', 'SiswaController::updateJurnal/$1');
    $routes->put('update-jurnal/(:num)', 'SiswaController::updateJurnal/$1');
    $routes->match(['POST', 'PUT'], 'update-jurnal/(:num)', 'SiswaController::updateJurnal/$1');
    $routes->delete('delete-jurnal/(:num)', 'SiswaController::deleteJurnal/$1');

    $routes->get('magang', 'SiswaController::index');

});

$routes->group('guru', ['filter' => ['jwt', 'role:guru']], function($routes){
    $routes->get('dashboard', 'GuruController::index');
    $routes->get('dudi', 'GuruController::index');

    $routes->get('magang', 'GuruController::index');
    $routes->get('get-magang/(:num)', 'GuruController::getMagang/$1');
    $routes->post('update-magang/(:num)', 'GuruController::updateMagang/$1');
    $routes->post('add-magang', 'GuruController::addMagang');
    $routes->post('delete-magang/(:num)', 'GuruController::deleteMagang/$1');
    $routes->get('verifikasi/:(num)', 'GuruController::verifikasi/$1');

    $routes->get('jurnal-harian', 'GuruController::index');
    $routes->get('detail-jurnal/(:num)', 'GuruController::detailJurnal/$1');
    $routes->post('update-jurnal/(:num)', 'GuruController::updateJurnal/$1');

});

