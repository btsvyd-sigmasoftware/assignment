<?php

namespace App\Model\Mapper;

use App\Model\Company;
use JetBrains\PhpStorm\Pure;
use PDO;

class CompanyMapper extends BaseMapper
{
    /**
     * @var string
     */
    public string $table = 'company';

    /**
     * @var string
     */
    public string $model = Company::class;

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct($db);
    }
}
