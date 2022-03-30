<?php
error_reporting(-1);
ini_set('display_errors', 1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/accesoDatos/accesoDatos.php';
require __DIR__ . '/entidades/clientes.php';
require __DIR__ . '/entidades/mantenimientos.php';
require __DIR__ . '/entidades/reparaciones.php';
require __DIR__ . '/entidades/usuarios.php';
require __DIR__ . '/controllers/clienteController.php';
require __DIR__ . '/controllers/mantenimientosController.php';
require __DIR__ . '/controllers/reparacionesController.php';
require __DIR__ . '/controllers/usuariosController.php';

$app = AppFactory::create();

app->addErrorMiddleware(true,true,true);

$app->add(function (Request $request, RequestHandlerInterface $handler): Response {
    // $routeContext = RouteContext::fromRequest($request);
    // $routingResults = $routeContext->getRoutingResults();
    // $methods = $routingResults->getAllowedMethods();
    
    $response = $handler->handle($request);
    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');

    $response = $response->withHeader('Access-Control-Allow-Origin','*');
    $response = $response->withHeader('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE');
    $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);

    // Optional: Allow Ajax CORS requests with Authorization header
    // $response = $response->withHeader('Access-Control-Allow-Credentials', 'true');

    return $response;
});




$app->run();