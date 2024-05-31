<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'login\login::index');
$routes->post('/login', 'login\login::login');
$routes->get('/logout', 'login\login::logout');
$routes->get('/home', 'Home\Home::index',['filter' => 'auth']);
$routes->post('/registro', 'login\login::registro');
$routes->post('/crear_vehiculo', 'Home\Home::guardar_data_vehiculo',['filter' => 'auth']);
$routes->get('/get_data_usuario', 'Home\Home::get_data_usuario',['filter' => 'auth']);
$routes->get('/administracion', 'Administracion\Administracion::index',['filter' => 'auth']);
$routes->get('/get_user_data', 'Administracion\Administracion::get_user_data',['filter' => 'auth']);
$routes->post('/deleteUser', 'Administracion\Administracion::deleteUser',['filter' => 'auth']);
$routes->get('/get_all_permits', 'Administracion\Administracion::get_all_permits',['filter' => 'auth']);
$routes->post('/get_permits_of_user', 'Administracion\Administracion::get_permits_of_user',['filter' => 'auth']);
$routes->post('/guardarPermisos', 'Administracion\Administracion::guardarPermisos',['filter' => 'auth']);
$routes->get('/viajes', 'viajes\viajes::index',['filter' => 'auth']);
$routes->get('/get_destinos', 'viajes\viajes::get_destinos',['filter' => 'auth']);
$routes->post('/get_data_viajes', 'viajes\viajes::get_data_viajes',['filter' => 'auth']);
$routes->post('/guardar_viaje', 'viajes\viajes::guardar_viaje',['filter' => 'auth']);
$routes->post('/delete_viaje', 'viajes\viajes::delete_viaje',['filter' => 'auth']);
$routes->post('/finalizarViaje', 'viajes\viajes::finalizarViaje',['filter' => 'auth']);
$routes->post('/iniciarViaje', 'viajes\viajes::iniciarViaje',['filter' => 'auth']);
$routes->get('/reservas', 'reservas\reservas::index',['filter' => 'auth']);
$routes->post('/get_viajes', 'reservas\reservas::get_viajes',['filter' => 'auth']);
$routes->post('/reservar_viaje', 'reservas\reservas::reservar_viaje',['filter' => 'auth']);
$routes->get('/mis_reservas', 'mis_reservas\mis_reservas::index',['filter' => 'auth']);
$routes->get('/get_mis_viajes', 'mis_reservas\mis_reservas::get_mis_viajes',['filter' => 'auth']);
$routes->post('/cancelar_viaje', 'mis_reservas\mis_reservas::cancelar_viaje',['filter' => 'auth']);











