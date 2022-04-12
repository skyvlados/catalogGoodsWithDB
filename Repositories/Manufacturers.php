<?php

namespace Repositories;

use Models\Manufacturer;
use PDO;

class Manufacturers extends AbstractRepository
{
    public function getOne(int $id): Manufacturer
    {
        $data=$this->connection->prepare('SELECT * from manufacturers WHERE id=?');
        $data->execute([$id]);
        return $data->fetchObject(Manufacturer::class);
    }

    public function getIdByName(string $name): int
    {
        $data=$this->connection->prepare('SELECT * from manufacturers WHERE name=?');
        $data->execute([$name]);
        return $data->fetchObject(Manufacturer::class)->getId();
    }

    /**
     * @return array|Manufacturer[]
     */
    public function getAll(): array
    {
        $data=$this->connection->query('SELECT * FROM manufacturers');
        return $data->fetchAll(PDO::FETCH_CLASS,Manufacturer::class);
    }

    public function create(string $name, int $country_id):void
    {
        $sth=$this->connection->prepare('INSERT INTO manufacturers (name,country_id) VALUES (?,?)');
        $sth->execute([$name, $country_id]);
    }

    public function render():void
    {
        $manufacturers=$this->getAll();
        ?>
        <table style="border: 1px solid black">
            <tr>
                <th>Id</th>
                <th>Название</th>
                <th>Страна</th>
            </tr>
            <?php foreach ($manufacturers as $manufacturer) {
                ?>
                <tr><td><?=$manufacturer->getId()?></td>
                    <td><?=$manufacturer->getName()?></td>
                    <td><?=$manufacturer->getCountry()->getName()?></td>
                </tr>
                <?php
            }?>
        </table>
    <?php }

    public function checkExist(string $name):bool
    {
        $sth = $this->connection->prepare('SELECT * FROM manufacturers WHERE name=?');
        $sth->execute([$name]);
        return $sth->rowCount()>0;
    }
}