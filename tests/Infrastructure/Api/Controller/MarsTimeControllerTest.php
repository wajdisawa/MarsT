<?php

declare(strict_types=1);

namespace Wajdisawa\Marst\Tests\Infrastructure\Api\Controller;

use DI\Bridge\Slim\Bridge;
use Nyholm\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;
use Slim\App;

final class MarsTimeControllerTest extends TestCase
{
    /** @var App */
    private App $app;

    protected function setUp(): void
    {
        parent::setUp();

        $container = require __DIR__ . '/../../../../config/container.php';
        $app = Bridge::create($container);

        (require __DIR__ . '/../../../../config/routes.php')($app);
        $app->addRoutingMiddleware();
        $this->app = $app;
    }

    public function testEarthTimeConvert(): void
    {
        $data = [
            'timeUTC' => '20 Aug 2020 07:15:10 UTC'
        ];
        $expectedResponseBody = json_encode(
            [
                "MSD" => 52126.76997,
                "MTC" => "18:28:45"
            ],
            JSON_THROW_ON_ERROR
        );
        $request = new ServerRequest(
          'POST',
          '/time',
        );
        $request = $request->withParsedBody($data);
        $response = $this->app->handle($request);
        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals($expectedResponseBody, (string)$response->getBody());
    }
}
