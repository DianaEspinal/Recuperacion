<?php
namespace app\controllers;

class HomeController {
  private function render($view, $data = []) {
    extract($data);
    ob_start();
    include "../app/views/{$view}.php";
    $content = ob_get_clean();
    include "../app/views/layout.php";
  }

  public function inicio(){
    return $this->render('home', ['title' => 'Inicio']);
  }
}
