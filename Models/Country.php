<?php

namespace Models;

class Country
{
    public string $id;
    public ?string $name=null;

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

}