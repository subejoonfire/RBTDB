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