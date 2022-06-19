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

    public function getIdsByCountryId(int $countryId):array
    {
        $ids=[];
        $data=$this->connection->prepare('SELECT * from manufacturers WHERE country_id=?');
        $data->execute([$countryId]);
        for ($i=0;$i<$data->rowCount();$i++) {
            $ids = array(
                $i => $data->fetchObject(Manufacturer::class)->getId(),
            );
        }
        return $ids;
    }

    public function getWithLimit(int $perPage, int $page, string $name, string $country):array
    {
        /**
         * where name like $name
         * where country like $country
         */
        $where = [];
        $params=[];
        if ($name) {
            $where[] = 'manufacturers.name like ?';
            $params[] = "%$name";
        }
        if ($country) {
            $where[] = 'countries.name like ?';
            $params[] = "%$country";
        }
        $data=$this->connection->prepare(sprintf(
                'SELECT manufacturers.*
from manufacturers
    INNER JOIN countries on manufacturers.country_id=countries.id
    %s ORDER BY id LIMIT ? OFFSET ?',
                count($where)>0 ? 'where '.implode(' AND ', $where) : ''));
        $data->execute(array_merge($params,[$perPage,(($page-1)*$perPage)]));
        return $data->fetchAll(PDO::FETCH_CLASS,Manufacturer::class);
    }

    public function getCount():int
    {

        $data=$this->connection->query('SELECT * from manufacturers');
        return $data->rowCount();
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

    public function render(int $perPage,int $page,string $name, string $country):void
    {
        $manufacturers=$this->getWithLimit($perPage, $page, $name, $country);
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