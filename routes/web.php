<?php

use lib\Route;
use app\controllers;
use app\controllers\HomeController;

Route::get("/", function(){
    return "RUTA RAIZ";
});
Route::get("/inicio", function(){
    return ["title"=>"ejemplo"];
});

Route::get("/Home", [HomeController::class, "index"]);
Route::dispatch();
?>