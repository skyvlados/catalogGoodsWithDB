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

    public function create(string $name, int $price, int $manufacturer_id, string $made_at):void
    {
        $sth=$this->connection->prepare('INSERT INTO items (name, price, manufacturer_id, made_at) VALUES (?,?,?,?)');
        $sth->execute([$name, $price, $manufacturer_id, $made_at]);
    }

    public function render():void
    {
        $items=$this->getAll();
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