<?php

namespace Database\Seeders;

use PDO;

class CompanySeeder extends BaseSeeder
{
    /**
     * @var array
     */
    protected array $data = [
        ['name' => 'AutoPark'],
        ['name' => 'Parkkitalo OY'],
    ];

    /**
     * @var array
     */
    protected array $columnConfig = ['name'];

    /**
     * @var string
     */
    protected string $table = 'company';

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }
}

