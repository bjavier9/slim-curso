<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


require_once "vendor/autoload.php";
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$configuration = new \Slim\Container($configuration);
$app = new \Slim\App($configuration);
$mid01 = function (Request $request, Response $response, $next): Response {
    $response->getBody()->write("Dentro Do middleware01 ");
    $next($request, $response);
    $response->getBody()->write("Dentro Do middleware02 ");
    return $response;
};
$app->group('/v1',function() use($app){
    $app->get('/',function (Request $request, Response $response, array $args){});
    $app->get('/test',function (Request $request, Response $response, array $args){});
})->add($mid01);
$app->post('/test', function (Request $request, Response $response, array $args): Response {
    $data = $request->getParsedBody();
    $nombre = $data['nombre'] ?? '';
    $response->getBody()->write("Producto {$nombre} (POST)");
    return $response;
})->add($mid01);


$app->run();
