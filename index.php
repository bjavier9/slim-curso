<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


require_once "vendor/autoload.php";
$app = new \Slim\App();

$app->post('/test',function(Request $request,Response $response, Array $args) {
   $data = $request->getParsedBody();
    $nombre = $data['nombre']??'';
    return $response->getBody()->write("Producto {$nombre} (POST)");
});

$app->put('/test',function(Request $request,Response $response, Array $args) {
    $data = $request->getParsedBody();
     $nombre = $data['nombre']??'';
     return $response->getBody()->write("Producto {$nombre} (PUT)");
 });

 $app->delete('/test',function(Request $request,Response $response, Array $args) {
    $data = $request->getParsedBody();
     $nombre = $data['nombre']??'';
     return $response->getBody()->write("Producto {$nombre} (DELETE)");
 });

$app->run();