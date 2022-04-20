<?php
namespace Repositories;
use Models\Item;
use PDO;

class Items extends AbstractRepository
{

    /**
     * @return array|Item[]
     */
    public function getAll():array
    {
        $data=$this->connection->query('SELECT * from items');
        return $data->fetchAll(PDO::FETCH_CLASS,Item::class);
    }

    public function getCount():int
    {
        $data=$this->connection->query('SELECT COUNT(id) from items');
        return (int)$data->fetchColumn();
    }

    public function getWithLimit(int $perPage, int $page, ?string $name, ?int $priceFrom, ?int $priceTo,
                                 ?string $country):array
    {
        $params = [];
        $where = [];
        /**
         * where (name like ?)
         * where (name like ?) and (price > ?)
         * where name like ? and price BETWEEN ? and ?
         * where name like ? and price < ? and countries.name = ?
         * where price > ?
         */
        if ($name) {
            $where[]='items.name like ?';
            $params[]="%$name%";
        }
        if ($priceFrom) {
            $where[]='price >= ?';
            $params[]=$priceFrom;
        }
        if ($priceTo) {
            $where[]='price <= ?';
            $params[]=$priceTo;
        }
        if ($country) {
            $where[]='countries.name = ?';
            $params[]=$country;
        }
        $data=$this->connection->prepare(sprintf(
                'SELECT items.*
FROM items
INNER JOIN manufacturers ON items.manufacturer_id=manufacturers.id
INNER JOIN countries ON manufacturers.country_id=countries.id
    %s --WHERE
ORDER BY id LIMIT ? OFFSET ?',
            count($where)>0 ? 'where '.implode(' AND ',$where) : ''
        ));
        $data->execute(array_merge($params,[$perPage, (($page-1)*$perPage)]));
        return $data->fetchAll(PDO::FETCH_CLASS,Item::class);
    }

    public function create(string $name, int $price, int $manufacturer_id, string $made_at):void
    {
        $sth=$this->connection->prepare('INSERT INTO items (name, price, manufacturer_id, made_at) VALUES (?,?,?,?)');
        $sth->execute([$name, $price, $manufacturer_id, $made_at]);
    }

    public function render(int $perPage,int $page, ?string $name, ?int $priceFrom, ?int $priceTo, ?string $country):void
    {
        $items=$this->getWithLimit($perPage, $page, $name, $priceFrom, $priceTo, $country);

        ?>
        <table style="border: 1px solid black">
  <tr>
    <th>Id</th>
    <th>Название</th>
    <th>Цена, руб</th>
    <th>Производитель</th>
    <th>Дата производства</th>
    <th>Страна</th>
  </tr>
            <?php foreach ($items as $item) {
                ?>
                <tr><td><?=$item->getId()?></td>
                    <td><?=$item->getName()?></td>
                    <td><?=$item->getPrice()?></td>
                    <td><?=$item->getManufacturer()->getName()?></td>
                    <td><?=$item->getMadeAt()?></td>
                    <td><?=$item->getManufacturer()->getCountry()->getName()?></td>
                </tr>
             <?php
            }?>
</table>
   <?php }

    public function checkExist(string $name):bool
    {
        $data=$this->connection->prepare('SELECT * FROM items WHERE name=?');
        $data->execute([$name]);
        return $data->rowCount()>0;
    }


    public function getOne(int $id): mixed
    {
        // TODO: Implement getOne() method.
    }
}