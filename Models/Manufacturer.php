<?php

namespace Models;

use Repositories\Countries;
use Repositories\Repository;

class Manufacturer
{
    public string $id;
    public ?string $name=null;
    public string $country_id;

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCountryId(): string
    {
        return $this->country_id;
    }


    public function getCountry():Country
    {
        return Repository::get(Countries::class)->getOne($this->country_id);
    }

}