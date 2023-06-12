<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Slim\App;
use Slim\Factory\AppFactory;


return [
    PDO::class => function (ContainerInterface $container) {
        return new PDO(
            "mysql:dbname=".$_ENV['DB_DATABASE'].";host=".$_ENV['DB_HOST'].";port=".$_ENV['DB_PORT'].";charset=".$_ENV['DB_CHARSET'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD']
        );
    },

    ServerRequestFactoryInterface::class => function (ContainerInterface $container) {
        return $container->get(Psr17Factory::class);
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        return AppFactory::create();
    },
];