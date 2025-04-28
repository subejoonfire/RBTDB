<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/karyawan', 'Karyawan2::index');
$routes->get('karyawan/delete/(:num)', 'Karyawan2::delete/$1');
$routes->get('karyawan/edit', 'Karyawan::edit');
$routes->get('karyawan/edit/(:num)', 'Karyawan::edit/$1');
$routes->get('karyawan/detail/(:num)', 'Karyawan::detail/$1');
$routes->post('karyawan/edit/(:num)', 'Karyawan2::edit/$1');
$routes->get('/karyawanlook', 'Karyawan2::karyawan');
$routes->get('/karyawanadd', 'Karyawan2::add_data_karyawan');
$routes->post('/proses_add_karyawan', 'Karyawan2::proses_add_karyawan');
$routes->post('/karyawan/edit-multiple', 'Karyawan2::editMultiple');
$routes->post('/karyawan/update-multiple', 'Karyawan2::updateMultiple');
$routes->get('karyawan/get/(:num)', 'Karyawan::getKaryawanById/$1'); // Mengambil data karyawan berdasarkan ID
$routes->post('karyawan/updateSelected', 'Karyawan::updateSelectedKaryawan'); // Memperbarui data karyawan yang terpilih


$routes->get('/departemen', 'departemen::index');
$routes->post('/proses_add_departemen', 'departemen::proses_add_departemen');
$routes->get('departemen/delete/(:num)', 'departemen::delete/$1');
$routes->get('departemen/edit', 'departemen::edit');
$routes->get('departemen/edit/(:num)', 'departemen::edit/$1');
$routes->get('departemen/detail/(:num)', 'departemen::detail/$1');
$routes->post('departemen/edit/(:num)', 'departemen::edit/$1');
$routes->get('/departemenlook', 'departemen::karyawan');
$routes->get('/departemenadd', 'departemen::add_data_departemen');

$routes->get('/jabatan', 'jabatan::index');
$routes->post('/proses_add_jabatan', 'jabatan::proses_add_jabatan');
$routes->get('jabatan/delete/(:num)', 'jabatan::delete/$1');
$routes->get('jabatan/edit', 'jabatan::edit');
$routes->get('jabatan/edit/(:num)', 'jabatan::edit/$1');
$routes->get('jabatan/detail/(:num)', 'jabatan::detail/$1');
$routes->post('jabatan/edit/(:num)', 'jabatan::edit/$1');
$routes->get('/jabatanlook', 'jabatan::karyawan');
$routes->get('/jabatanadd', 'jabatan::add_data_jabatan');
