<?php

namespace Database\Seeders;

use App\Model\Mapper\CompanyMapper;
use App\Model\Mapper\CountryMapper;
use App\Model\Mapper\CurrencyMapper;
use Exception;
use PDO;

class GarageSeeder extends BaseSeeder
{
    /**
     * @var array
     */
    protected array $columnConfig = ['name', 'hourly_price', 'currency_id', 'email', 'coordinates', 'country_id', 'owner_id'];

    /**
     * @var string
     */
    protected string $table = 'garage';

    /**
     * @var PDO
     */
    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        parent::__construct($pdo);
    }

    /**
     * @throws Exception
     */
    public function seed(): void
    {
        $rawData = [
            [
                'name' => 'Garage1',
                'hourly_price' => 2,
                'currency_id' => 'Euro',
                'email' => 'testemail@testautopark.fi',
                'coordinates' => '60.168607847624095 24.932371066131623',
                'country_id' => 'Finland',
                'owner_id' => 'AutoPark',
            ],
            [
                'name' => 'Garage2',
                'hourly_price' => 1.5,
                'currency_id' => 'Euro',
                'email' => 'testemail@testautopark.fi',
                'coordinates' => '60.162562 24.939453',
                'country_id' => 'Finland',
                'owner_id' => 'AutoPark',
            ],
            [
                'name' => 'Garage3',
                'hourly_price' => 3,
                'currency_id' => 'Euro',
                'email' => 'testemail@testautopark.fi',
                'coordinates' => '60.16444996645511 24.938178168200714',
                'country_id' => 'Finland',
                'owner_id' => 'AutoPark',
            ],
            [
                'name' => 'Garage4',
                'hourly_price' => 3,
                'currency_id' => 'Euro',
                'email' => 'testemail@testautopark.fi',
                'coordinates' => '60.165219358852795 24.93537425994873',
                'country_id' => 'Finland',
                'owner_id' => 'AutoPark',
            ],
            [
                'name' => 'Garage5',
                'hourly_price' => 3,
                'currency_id' => 'Euro',
                'email' => 'testemail@testautopark.fi',
                'coordinates' => '60.17167429490068 24.921585662024363',
                'country_id' => 'Finland',
                'owner_id' => 'AutoPark',
            ],
            [
                'name' => 'Garage6',
                'hourly_price' => 2,
                'currency_id' => 'Euro',
                'email' => 'testemail@testgarage.fi',
                'coordinates' => '60.16867390148751 24.930162952045407',
                'country_id' => 'Finland',
                'owner_id' => 'Parkkitalo OY',
            ],
        ];

        $currencyMapper = new CurrencyMapper($this->pdo);
        $countryMapper = new CountryMapper($this->pdo);
        $companyMapper = new CompanyMapper($this->pdo);

        $stmt = $this->pdo->prepare("TRUNCATE TABLE $this->table");
        $stmt->execute();

        foreach ($rawData as $row) {
            $coordinates = $row['coordinates'];
            $coordinates = "POINT($coordinates)";

            $stmt = $this->pdo->prepare("INSERT INTO $this->table 
                (name, hourly_price, currency_id, email, coordinates, country_id, owner_id) 
                VALUES (:name, :hourly_price, :currency_id, :email, ST_GeomFromText(:coordinates), :country_id, :owner_id)
            ");
            $stmt->bindParam(':name', $row['name']);
            $stmt->bindParam(':hourly_price', $row['hourly_price']);
            $stmt->bindParam(':currency_id', $currencyMapper->getByName($row['currency_id'])->id);
            $stmt->bindParam(':email', $row['email']);
            $stmt->bindParam(':coordinates', $coordinates);
            $stmt->bindParam(':country_id', $countryMapper->getByName($row['country_id'])->id);
            $stmt->bindParam(':owner_id', $companyMapper->getByName($row['owner_id'])->id);

            $stmt->execute();
        }
    }
}




