<?php

namespace Tests\Unit;

use App\Model\Country;
use App\Model\Currency;
use App\Model\Company;
use App\Model\Garage;
use App\Services\GarageService;
use Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Tests\Traits\AppTestTrait;

class GarageServiceTest extends TestCase
{
    use AppTestTrait;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Exception
     */
    public function testPrepareGarageListSuccess(): void
    {
        $currencyModelMock = $this->mock(Currency::class);
        $currencyModelMock->id = 1;
        $currencyModelMock->symbol = '€';

        $countryModelMock = $this->mock(Country::class);
        $countryModelMock->id = 1;
        $countryModelMock->name = 'Finland';

        $companyModelMock = $this->mock(Company::class);
        $companyModelMock->id = 1;
        $companyModelMock->name = 'Test Company';

        $garageModelMock = $this->mock(Garage::class);
        $garageModelMock->id = 1;
        $garageModelMock->name = 'test name';
        $garageModelMock->hourly_price = '2';
        $garageModelMock->email = 'testemail@gmail.com';
        $garageModelMock->coordinates = '60.162562 24.939453';
        $garageModelMock->currency = $currencyModelMock;
        $garageModelMock->country = $countryModelMock;
        $garageModelMock->owner = $companyModelMock;

        $garageService = $this->container->get(GarageService::class);

        $expectedResult = [[
            'garage_id' => $garageModelMock->id,
            'name' => $garageModelMock->name,
            'hourly_price' => $garageModelMock->hourly_price,
            'currency' => $garageModelMock->currency->symbol,
            'contact_email' => $garageModelMock->email,
            'point' => $garageModelMock->coordinates,
            'country' => $garageModelMock->country->name,
            'owner_id' => $garageModelMock->owner->id,
            'garage_owner' => $garageModelMock->owner->name,
        ]];

        $actualResult = $garageService->prepareGarageList([$garageModelMock]);

        $this->assertEquals($expectedResult, $actualResult);
    }
}