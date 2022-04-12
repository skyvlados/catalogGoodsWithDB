<?php

namespace Models;

use Repositories\Manufacturers;
use Repositories\Repository;

class Item
{
    private string $id;
    private string $name;
    private string $price;
    private string $manufacturer_id;
    private string $made_at;

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getManufacturerId(): int
    {
        return (int)$this->manufacturer_id;
    }

    public function getMadeAt(): string
    {
        return $this->made_at;
    }

    public function getManufacturer():Manufacturer
    {
        return Repository::get(Manufacturers::class)->getOne($this->manufacturer_id);
    }



}