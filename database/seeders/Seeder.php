<?php

namespace Database\Seeders;

require_once 'vendor/autoload.php';
require_once 'BaseSeeder.php';
require_once 'CountrySeeder.php';
require_once 'CompanySeeder.php';
require_once 'CurrencySeeder.php';
require_once 'GarageSeeder.php';

use Dotenv\Dotenv;
use PDO;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$pdo = new PDO(
    "mysql:dbname=".$_ENV['DB_DATABASE'].";host=".$_ENV['DB_HOST'].";port=".$_ENV['DB_PORT'].";charset=".$_ENV['DB_CHARSET'],
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD']
);


$pdo->query('SET foreign_key_checks = 0');

(new CountrySeeder($pdo))->seed();
(new CompanySeeder($pdo))->seed();
(new CurrencySeeder($pdo))->seed();
(new GarageSeeder($pdo))->seed();

$pdo->query('SET foreign_key_checks = 1');
