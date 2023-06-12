<?php

namespace App\Model;

use App\Model\Mapper\CompanyMapper;
use App\Model\Mapper\CountryMapper;
use App\Model\Mapper\CurrencyMapper;
use PDO;

class Garage
{
    /**
     * @var integer
     */
    public mixed $id;

    /**
     * @var string
     */
    public mixed $name;

    /**
     * @var float
     */
    public mixed $hourly_price;

    /**
     * @var string
     */
    public mixed $email;

    /**
     * @var string
     */
    public mixed $coordinates;

    /**
     * @var Currency
     */
    public Currency $currency;

    /**
     * @var Country
     */
    public mixed $country;

    /**
     * @var Company
     */
    public mixed $owner;

    /**
     * @var string
     */
    public mixed $created_at;

    /**
     * @var string
     */
    public mixed $updated_at;

    /**
     * @param array $data
     * @param PDO $db
     */
    public function __construct(array $data, PDO $db)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->hourly_price = $data['hourly_price'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->coordinates = $data['coordinates'] ?? null;
        $this->currency = (new CurrencyMapper($db))->getById($data['currency_id']) ?? null;
        $this->country = (new CountryMapper($db))->getById($data['country_id']) ?? null;
        $this->owner = (new CompanyMapper($db))->getById($data['owner_id']) ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }
}
