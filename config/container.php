<?php

declare(strict_types=1);

$containerBuilder = new DI\ContainerBuilder();
$containerBuilder->useAutowiring(true);
$containerBuilder->useAnnotations(false);
return $containerBuilder->build();
