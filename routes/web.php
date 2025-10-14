<?php
use lib\Route;
use app\controllers\HomeController;
use app\controllers\PageController;
use app\controllers\VisitasController;

Route::get("/", [HomeController::class, "index"]);
Route::get("/mi-info", [PageController::class, "miInfo"]);
Route::get("/dia/:slug", [PageController::class, "dia"]);
Route::get("/visitas", [VisitasController::class, "index"]);
Route::post("/visitas", [VisitasController::class, "index"]);

Route::dispatch();
?>
