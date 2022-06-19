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

    public function getWithLimit(string $perPage,string $page,string $name):array
    {
        $where='';
        $params='';
        if ($name) {
            $where='name LIKE ?';
            $params="%$name%";
        }
        $data=$this->connection->prepare(sprintf(
                'SELECT * from countries %s ORDER BY id LIMIT ? OFFSET ?',
            $name ? 'where '.$where : ''
        ));
        $data->execute($name ? [$params ,$perPage,($page-1)*$perPage] : [$perPage,($page-1)*$perPage]);
        return $data->fetchAll(PDO::FETCH_CLASS,Country::class);
    }

    public function getCount():int
    {
        $sth=$this->connection->query('SELECT * from countries');
        return $sth->rowCount();
    }

    public function create(string $name):void
    {
        $sth=$this->connection->prepare('INSERT INTO countries (name) VALUES (?)');
        $sth->execute([$name]);
    }

    public function render(string $perPage,string $page, string $name):void
    {
        $countries=$this->getWithLimit($perPage, $page, $name);
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
        if (strcasecmp($name, '')===0) {
            return 0;
        }
        return $data->fetchObject(Country::class)->getId();
    }

    public function checkExist(string $name):bool
    {
        $sth = $this->connection->prepare('SELECT * FROM countries WHERE name=?');
        $sth->execute([$name]);
        return $sth->rowCount()>0;
    }
}