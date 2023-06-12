<?php

namespace App\Model\Mapper;

use App\Model\Country;
use JetBrains\PhpStorm\Pure;
use PDO;

class CountryMapper extends BaseMapper
{
    /**
     * @var string
     */
    public string $table = 'country';

    /**
     * @var string
     */
    public string $model = Country::class;

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct($db);
    }
}
