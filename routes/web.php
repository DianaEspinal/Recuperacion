<?php
use lib\Route;
use app\controllers\HomeController;
use app\controllers\DiasController;
use app\controllers\MiInfoController;

$base = getenv('APP_URL_BASE');
Route::init($base === false ? '/' : $base);

Route::get("/",        [HomeController::class, "inicio"]);
Route::get("/inicio",  [HomeController::class, "inicio"]);
Route::get("/dia/:n",  [DiasController::class,  "ver"]);
Route::get("/mi-info", [MiInfoController::class, "index"]);


Route::dispatch();
