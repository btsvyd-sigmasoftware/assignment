<?php

namespace Database\Seeders;

use Exception;
use PDO;
use tebazil\dbseeder\Seeder;

class BaseSeeder
{
    /**
     * @var Seeder
     */
    protected Seeder $seeder;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->seeder = new Seeder($pdo);
    }

    /**
     * @throws Exception
     */
    public function seed(): void
    {
        $this->seeder->table($this->table)->data($this->data, $this->columnConfig)->rowQuantity(count($this->data));

        $this->seeder->refill();
    }
}

