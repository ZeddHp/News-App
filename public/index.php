<?php declare(strict_types=1);


require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

$routes = require_once dirname(__DIR__, 2) . '/routes.php';
$response = Router::route($routes);
$renderer = new Renderer();

echo $renderer->render($response);

