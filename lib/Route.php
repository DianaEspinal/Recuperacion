<?php
namespace lib;

class Route {
  private static $routes = [];
  private static $base = '';

  public static function init(string $base){ self::$base = rtrim($base, '/'); }
  public static function get($uri, $cb){ self::$routes["GET"][self::$base.$uri] = $cb; }
  public static function post($uri,$cb){ self::$routes["POST"][self::$base.$uri]= $cb; }

  public static function dispatch(){
    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $method = $_SERVER["REQUEST_METHOD"];
    foreach (self::$routes[$method] ?? [] as $url => $cb) {
      $pattern = "#^" . preg_replace("#:[a-zA-Z0-9_]+#", "([a-zA-Z0-9_]+)", $url) . "$#";
      if (preg_match($pattern, $uri, $m)) {
        $params = array_slice($m,1);
        if (is_callable($cb)) return print($cb(...$params));
        if (is_array($cb)) {
          $controller = new $cb[0];
          return print($controller->{$cb[1]}(...$params));
        }
      }
    }
    http_response_code(404);
    echo "404";
  }
}
