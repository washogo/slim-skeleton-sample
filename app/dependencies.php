<?php

declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        Capsule::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);
            $eloquent = new Capsule;
            $dbSettings = $settings->get('db');
            $eloquent->addConnection($dbSettings);
            // Make this Capsule instance available globally via static methods
            $eloquent->setAsGlobal();
            // Setup the Eloquent ORM...
            $eloquent->bootEloquent();

            return $eloquent;
        }
      ]);
};
