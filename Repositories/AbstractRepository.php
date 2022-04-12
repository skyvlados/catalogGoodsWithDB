<?php

namespace Repositories;

use Connections\DataBase;
use PDO;

abstract class AbstractRepository
{
    protected PDO $connection;

    public function __construct()
    {
        $this->connection=DataBase::get();
    }

    abstract public function getAll():array;
    abstract public function getOne(int $id): mixed;
}