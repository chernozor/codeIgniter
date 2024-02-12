<?php

use App\Controllers\Comment;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('comment', [Comment::class, 'index']);
$routes->get('comment/new', [Comment::class, 'new']);
$routes->post('comment', [Comment::class, 'create']);
$routes->get('comment/delete/(:segment)', [Comment::class, 'delete']);
$routes->match(['get', 'post'], 'comment/edit/(:segment)', [Comment::class, 'edit']);
$routes->get('comment/show/(:segment)', [Comment::class, 'show']);

$routes->get('comment/edited', [Comment::class, 'edited']);
