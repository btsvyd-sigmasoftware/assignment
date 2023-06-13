<?php

namespace App\Services;

use App\Model\Mapper\GarageMapper;
use Exception;

class GarageService
{
    /**
     * @var GarageMapper
     */
    private GarageMapper $mapper;

    /**
     * @param GarageMapper $mapper
     */
    public function __construct(GarageMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * Return list of garage entities in json format
     *
     * @param array $filter
     * @return string
     * @throws Exception
     */
    public function list(array $filter): string
    {
        return json_encode(
            ['garages' => $this->prepareGarageList(
                $filter ? $this->mapper->fetchAllFiltered($filter) : $this->mapper->fetchAll()
            )]
        );
    }

    /**
     * Format array of Garage entities
     *
     * @param array $list
     * @return array
     */
    public function prepareGarageList(array $list): array
    {
        $preparedList = [];

        foreach ($list as $garage) {
            $preparedGarage = [];

            $preparedGarage['garage_id'] = $garage->id;
            $preparedGarage['name'] = $garage->name;
            $preparedGarage['hourly_price'] = $garage->hourly_price + 0;
            $preparedGarage['currency'] = $garage->currency->symbol;
            $preparedGarage['contact_email'] = $garage->email;
            $preparedGarage['point'] = $garage->latitude . ' ' . $garage->longitude;
            $preparedGarage['country'] = $garage->country->name;
            $preparedGarage['owner_id'] = $garage->owner->id;
            $preparedGarage['garage_owner'] = $garage->owner->name;

            $preparedList[] = $preparedGarage;
        }

        return $preparedList;
    }
}
