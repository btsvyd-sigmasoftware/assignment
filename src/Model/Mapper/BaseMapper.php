<?php

namespace App\Model\Mapper;

use PDO;

class BaseMapper
{
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Fetch all models
     *
     * @return array
     */
    public function fetchAll(): array
    {
        $sql = "SELECT * FROM $this->table ORDER BY id ASC";
        $stmt = $this->db->query($sql);

        $results = [];
        while ($row = $stmt->fetch()) {
            $results[] = new $this->model($row);
        }

        return $results;
    }

    /**
     * Fetch model by id
     *
     * @param string $id
     * @return mixed
     */
    public function getById(string $id): mixed
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch();
        if ($data) {
            return new $this->model($data);
        }

        return false;
    }

    /**
     * Fetch model by name
     *
     * @param string $name
     * @return mixed
     */
    public function getByName(string $name): mixed
    {
        $sql = "SELECT * FROM $this->table WHERE name = :name";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['name' => $name]);
        $data = $stmt->fetch();
        if ($data) {
            return new $this->model($data);
        }

        return false;
    }
}
