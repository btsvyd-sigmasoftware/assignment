<?php

namespace Database\Seeders;

use PDO;

class CurrencySeeder extends BaseSeeder
{
    /**
     * @var array|string[][]
     */
    protected array $data = [
        [
            'name' => 'Euro',
            'symbol' => '€'
        ]
    ];

    /**
     * @var array
     */
    protected array $columnConfig = ['name', 'symbol'];

    /**
     * @var string
     */
    protected string $table = 'currency';

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }
}




