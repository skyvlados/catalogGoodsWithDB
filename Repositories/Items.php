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

    public function getWithLimit(int $perPage, int $page, string $name, int $priceFrom, int $priceTo):array
    {
        $data=$this->connection->prepare('SELECT * from items WHERE (name LIKE ?)
AND (price BETWEEN ? AND ?) ORDER BY id LIMIT ? OFFSET ?');
        if ($priceTo === 0) {
            $priceTo=1000000000;
        }
        $data->execute(['%'.$name.'%', $priceFrom, $priceTo,$perPage, (($page-1)*$perPage)]);
        return $data->fetchAll(PDO::FETCH_CLASS,Item::class);
    }

//    public function getByName(string $name):array
//    {
//        $data=$this->connection->prepare('SELECT * from items WHERE name LIKE ?');
//        $data->execute(['%'.$name.'%']);
//        return $data->fetchAll(PDO::FETCH_CLASS,Item::class);
//    }

    public function create(string $name, int $price, int $manufacturer_id, string $made_at):void
    {
        $sth=$this->connection->prepare('INSERT INTO items (name, price, manufacturer_id, made_at) VALUES (?,?,?,?)');
        $sth->execute([$name, $price, $manufacturer_id, $made_at]);
    }

    public function render(int $perPage,int $page, string $name, int $priceFrom, int $priceTo):void
    {
        $items=$this->getWithLimit($perPage, $page, $name, $priceFrom, $priceTo);

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