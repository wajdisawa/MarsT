<?php

declare(strict_types=1);

use Slim\App;
use Wajdisawa\MarsT\Infrastructure\Api\Controller\MarsTimeController;

return static function (App $app): void {
    $app->post('/time', [MarsTimeController::class, 'earthTimeConvert']);
};

