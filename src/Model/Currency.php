<?php

namespace App\Model;

class Currency
{
    /**
     * @var mixed|null
     */
    public mixed $id;

    /**
     * @var mixed|null
     */
    public mixed $name;

    /**
     * @var mixed|null
     */
    public mixed $symbol;

    /**
     * @var mixed|null
     */
    public mixed $created_at;

    /**
     * @var mixed|null
     */
    public mixed $updated_at;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->symbol = $data['symbol'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }
}
