<?php

namespace Models;

class User
{
    public string $id;
    public string $login;
    public string $password;

    public function getId(): int
    {
        return (int)$this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}