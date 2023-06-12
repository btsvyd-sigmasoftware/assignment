<?php

namespace Database\Seeders;

use PDO;

class CountrySeeder extends BaseSeeder
{
    /**
     * @var array|string[][]
     */
    protected array $data = [
        ['name' => 'Finland']
    ];

    /**
     * @var array
     */
    protected array $columnConfig = ['name'];

    /**
     * @var string
     */
    protected string $table = 'country';

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }
}




