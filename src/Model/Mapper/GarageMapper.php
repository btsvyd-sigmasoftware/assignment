<?php

namespace App\Model\Mapper;

use App\Model\Garage;
use Exception;
use JetBrains\PhpStorm\Pure;
use PDO;

class GarageMapper extends BaseMapper
{
    /**
     * @var string
     */
    public string $table = 'garage';

    /**
     * @var string
     */
    public string $model = Garage::class;

    /**
     * @var array
     */
    public array $allowedFilters = ['country', 'owner', 'location', 'latitude', 'longitude'];

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct($db);
    }

    /**
     * Fetch all models
     *
     * @return array [Garage]
     */
    public function fetchAll(): array
    {
        $sql = "SELECT * FROM $this->table ORDER BY id ASC";
        $stmt = $this->db->query($sql);

        $results = [];
        while ($row = $stmt->fetch()) {
            $results[] = new $this->model($row, $this->db);
        }

        return $results;
    }

    /**
     * Fetch all filtered models
     *
     * @return array [Garage]
     * @throws Exception
     */
    public function fetchAllFiltered(array $filters): array
    {
        $where = '';

        foreach ($filters as $key => $val) {
            if (!in_array($key, $this->allowedFilters)) {
                throw new Exception("filter '$key' doesn't exist'");
            }

            switch ($key) {
                case 'country':
                    $country = (new CountryMapper($this->db))->getByName($val)?->id ?? null;
                    $where = "where country_id = '$country'";
                    break;
                case 'owner':
                    $company = (new CompanyMapper($this->db))->getByName($val)?->id ?? null;
                    $where = "where owner_id = '$company'";
                    break;
                case 'latitude':
                    $where = "where X(coordinates) = '$val'";
                    break;
                case 'longitude':
                    $where = "where Y(coordinates) = '$val'";
                    break;
                default:
                    $where = '';
            }
        }

        $sql = "SELECT 
            id, 
            name, 
            hourly_price, 
            email, 
            ST_X(coordinates) as latitude, 
            ST_Y(coordinates) as longitude,
            currency_id,
            country_id,
            owner_id,
            created_at,
            updated_at    
        FROM $this->table $where ORDER BY id ASC";

        $stmt = $this->db->query($sql);

        $results = [];
        while ($row = $stmt->fetch()) {
            $results[] = new $this->model($row, $this->db);
        }

        return $results;
    }
}
