<?php

declare(strict_types=1);

namespace Wajdisawa\MarsT\Infrastructure\Api\Controller;

use DateTimeImmutable;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wajdisawa\MarsT\Domain\MarsTime;
use Wajdisawa\MarsT\Infrastructure\Constants\ApiConstants;

final class MarsTimeController
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function earthTimeConvert(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $timeUTC = $request->getParsedBody()['timeUTC'];

        $marsTime = new MarsTime(new DateTimeImmutable($timeUTC));

        $body = [
            'MSD' => $marsTime->marsSolDate(),
            'MTC' => $marsTime->martianCoordinatedTime(),
        ];

        $response
            ->withStatus(ApiConstants::HTTP_OK)
            ->getBody()
            ->write(
                json_encode($body, JSON_THROW_ON_ERROR)
            );
        return $response;
    }
}
