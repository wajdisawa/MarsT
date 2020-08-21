<?php

declare(strict_types=1);

use DI\Bridge\Slim\Bridge;

require __DIR__ . '/../vendor/autoload.php';
$container = require __DIR__ . '/../config/container.php';
$app = Bridge::create($container);

(require __DIR__ . '/../config/routes.php')($app);
$app->addRoutingMiddleware();
$app->addErrorMiddleware(false, false, false);
$app->run();

