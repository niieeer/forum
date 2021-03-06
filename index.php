<?php

namespace App;

require_once('vendor/autoload.php');

use Router\Router;

$router = new Router($_GET['url']);

// Article
$router->get("/", "App\Controller\AppController@index");
$router->get("/add", "App\Controller\ArticleController@showForm");
$router->post("/add", "App\Controller\ArticleController@addArticle");
$router->get("/show", "App\Controller\ArticleController@showArticle");
$router->get("/modify/:id", "App\Controller\ArticleController@modifyArticle");
$router->post("/modify/:id", "App\Controller\ArticleController@sendModifyArticle");
$router->get("/delete/:id", "App\Controller\ArticleController@deleteArticle");

// User
$router->get("/adduser", "App\Controller\UserController@add");

$router->run();