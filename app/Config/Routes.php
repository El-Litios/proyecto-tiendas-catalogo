<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/loginc', 'Home::loginc');
$routes->get('/loginva', 'Home::loginva');
$routes->get('/registro', 'Home::registroc');

//CLIENTE
$routes->post('/cliente/login', 'Auth/Cliente::login');
$routes->get('/cliente/logout', 'Auth/Cliente::logout');
$routes->get('/clientedash', 'Auth/Cliente::index');
$routes->post('/registro-store', 'Auth/Cliente::store');
//Solicitudes
$routes->get('/cliente/lista-solicitud', 'Cliente/Solicitudes::index');
$routes->post('/cliente/solicitud-buscar', 'Cliente/Solicitudes::filter');
$routes->post('/cliente/solicitud-crear', 'Cliente/Solicitudes::store');
//venta
$routes->get('/cliente/lista-ventas', 'Cliente/Ventas::listar');
$routes->get('cliente/detalleventa-listar/(:num)', 'Ventas::verDetalle/$1');




//VENDEDOR
$routes->post('/usuario/login', 'Auth/Vendedor_Adm::login');
$routes->get('/usuario/logout', 'Auth/Vendedor_Adm::logout');
$routes->get('/dashboard', 'Auth/Vendedor_Adm::index');

//tiendas
$routes->get('/vendedor/lista-tienda/(:num)', 'Tiendas::listatiendavendedor/$1');

//productos
$routes->get('/vendedor/lista-producto/(:num)', 'Productos::index/$1');
$routes->post('/vendedor/producto-agregar', 'Productos::store');
$routes->get('/vendedor/producto-formeditar/(:num)','Productos::formedit/$1');
$routes->post('/vendedor/producto-editar', 'Productos::edit');
$routes->get('/vendedor/producto-eliminar/(:num)/(:any)/(:num)','Productos::delete/$1/$2/$3');

//ventas
$routes->get('/vendedor/lista-venta','Ventas::index');
$routes->post('/vendedor/venta-agregar','Ventas::store');
$routes->get('/vendedor/venta-formedit/(:num)','Ventas::formedit/$1');
$routes->post('/vendedor/venta-editar','Ventas::edit');
$routes->get('/vendedor/venta-eliminar/(:num)','Ventas::delete/$1');
$routes->get('/vendedor/detalleventa-listar/(:num)/(:num)','Ventas::listadetalle/$1/$2');
$routes->post('/vendedor/detalle-agregar-producto', 'Ventas::storedetail');




//ADMINISTRADOR
//solicitudes
$routes->get('/usuario/lista-solicitud', 'Adm/Solicitudes::index');
$routes->post('/usuario/solicitud-buscar', 'Adm/Solicitudes::filtrar');
$routes->get('/usuario/solicitud-rechazar/(:num)', 'Solicitudes::rechazar/$1');
$routes->get('/usuario/solicitud-aprobar/(:num)', 'Solicitudes::aprobar/$1');

//usuarios
$routes->get('/usuario/usuario-lista','Usuarios::index');
$routes->post('/usuario/usuario-agregar','Usuarios::store');
$routes->get('/usuario/usuario-formeditar/(:num)','Usuarios::formedit/$1');
$routes->post('/usuario/usuario-editar','Usuarios::edit');
$routes->get('/usuario/usuario-eliminar/(:num)','Usuarios::delete/$1');

//tiendas
$routes->get('/usuario/tienda-lista','Tiendas::index');
$routes->post('/usuario/tienda-agregar', 'Tiendas::store');
$routes->get('/usuario/tienda-formeditar/(:num)', 'Tiendas::formedit/$1');
$routes->post('/usuario/tienda-editar', 'Tiendas::edit');
$routes->get('/usuario/tienda-eliminar/(:num)/(:any)', 'Tiendas::delete/$1/$2');



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
