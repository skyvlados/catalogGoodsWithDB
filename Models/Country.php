<?php

namespace Models;

class Country
{
    public string $id;
    public ?string $name=null;

    public function getId(): int
    {
        return (int)$this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

}