<?php

namespace Repositories;

class Repository
{
    public static function get(string $repositoryName):AbstractRepository
    {
        return new $repositoryName();
    }
}