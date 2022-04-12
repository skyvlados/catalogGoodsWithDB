<?php

namespace Repositories;

use Models\Country;
use PDO;

class Countries extends AbstractRepository
{
    /**
     * @return array|Country[]
     */
    public function getAll():array
    {
        $data=$this->connection->query('SELECT * from countries');
        return $data->fetchAll(PDO::FETCH_CLASS,Country::class);
    }

    public function create(string $name):void
    {
        $sth=$this->connection->prepare('INSERT INTO countries (name) VALUES (?)');
        $sth->execute([$name]);
    }

    public function render():void
    {
        $countries=$this->getAll();
        ?>
        <table style="border: 1px solid black">
            <tr>
                <th>Id</th>
                <th>Страна</th>
            </tr>
            <?php foreach ($countries as $country) {
                ?>
                <tr><td><?=$country->getId()?></td>
                    <td><?=$country->getName()?></td>
                </tr>
                <?php
            }?>
        </table>
    <?php }

    public function getOne(int $id): Country
    {
        $data=$this->connection->prepare('SELECT * from countries WHERE id=?');
        $data->execute([$id]);
        return $data->fetchObject(Country::class);
    }

    public function getOneByName(string $name): int
    {
        $data=$this->connection->prepare('SELECT * from countries WHERE name=?');
        $data->execute([$name]);
        return $data->fetchObject(Country::class)->getId();
    }

    public function checkExist(string $name):bool
    {
        $sth = $this->connection->prepare('SELECT * FROM countries WHERE name=?');
        $sth->execute([$name]);
        return $sth->rowCount()>0;
    }
}