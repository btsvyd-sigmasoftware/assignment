<?php

namespace App\Controller;

use App\Services\GarageService;
use Exception;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GarageController
{
    /**
     * @var GarageService
     */
    private GarageService $service;

    /**
     * @param GarageService $service
     */
    public function __construct(GarageService $service)
    {
        $this->service = $service;
    }

    /**
     * Index route action
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $response->getBody()->write($this->service->list($request->getQueryParams()));
        } catch (Exception $e) {
            $response->getBody()->write(json_encode(['error' => $e->getMessage()]));
            return $response->withHeader('content-type', 'application/json')
                ->withStatus(400);
        }
        return $response->withHeader('content-type', 'application/json')->withStatus(200);
    }
}
