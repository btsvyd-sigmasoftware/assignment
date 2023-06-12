<?php

namespace Tests\Traits;

use Psr\Container\ContainerInterface;
use Selective\TestTrait\Traits\HttpTestTrait;
use Selective\TestTrait\Traits\MockTestTrait;
use Slim\App;
use UnexpectedValueException;

trait AppTestTrait
{
    use HttpTestTrait;
    use MockTestTrait;

    /**
     * @var ContainerInterface
     */
    protected ContainerInterface $container;

    /**
     * @var App
     */
    protected App $app;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->app = require __DIR__ . '/../../config/bootstrap.php';

        $container = $this->app->getContainer();
        if ($container === null) {
            throw new UnexpectedValueException('Container must be initialized');
        }
        $this->container = $container;
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
    }
}