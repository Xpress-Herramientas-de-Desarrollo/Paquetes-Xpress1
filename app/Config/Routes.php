<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');


$routes->get('login', 'Login::index');
$routes->get('sistema', 'Login::sistemaindex');
$routes->get('sistemapaquetes', 'Login::sistemapaquetes');
$routes->post('login/autenticar', 'Login::autenticar');
$routes->post('logout', 'Login::logout');

$routes->get('registro', 'Registro::index');
$routes->post('registro/crear', 'Registro::crear');

$routes->get('cotizar', 'Cotizar::index');
$routes->post('cotizar/calcular', 'Cotizar::calcular');

$routes->get('seguimiento', 'Seguimiento::index');
$routes->post('seguimiento/consultar', 'Seguimiento::consultar');

$routes->get('contacto', 'Contacto::index');
