<?php

namespace App\Model\Mapper;

use App\Model\Currency;
use JetBrains\PhpStorm\Pure;
use PDO;

class CurrencyMapper extends BaseMapper
{
    /**
     * @var string
     */
    public string $table = 'currency';

    /**
     * @var string
     */
    public string $model = Currency::class;

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct($db);
    }
}
