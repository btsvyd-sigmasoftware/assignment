<?php

use App\Controller\GarageController;
use Slim\App;

return function (App $app) {
    $app->get('/api/garage', [GarageController::class, 'index'])->setName('get-garages');
};
