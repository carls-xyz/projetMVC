<?php
require_once __DIR__ . '/app/utils/Autoload.php';
require_once __DIR__ . '/app/utils/Router.php';

Autoload::register();
session_start();

$router = new Router();

// Accueil = liste des activités
$router->get('/', ActivityController::class, 'index');
$router->get('/activity', ActivityController::class, 'index');
$router->get('/activity/show', ActivityController::class, 'show');

// Réservation
$router->get('/reservation', ReservationController::class, 'index');
$router->get('/reservation/show', ReservationController::class, 'show');

// Users
$router->get('/user', UserController::class, 'index');
$router->get('/user/login', UserController::class, 'login');
$router->post('/user/login', UserController::class, 'login');
$router->get('/user/register', UserController::class, 'register');
$router->post('/user/register', UserController::class, 'register');
$router->get('/user/logout', UserController::class, 'logout');

// Lancer le routage
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);