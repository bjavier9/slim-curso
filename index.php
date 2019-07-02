<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


require_once "vendor/autoload.php";
$app = new \Slim\App();

$app->get('/test[/{name}]',function(Request $request,Response $response, Array $args) {
    $limit = $request->getQueryParams()['limit']??10;
    $name = $args['name']??'jajajaja';
    return $response->getBody()->write("{$limit} hellow world {$name}");
});

$app->run();