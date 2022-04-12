<?php
namespace Repositories;
use Connections\DataBase;
use Models\User;
use PDO;
use function Amp\Postgres\connect;

class Users extends AbstractRepository
{
    public function getAll():array
    {
        $data=$this->connection->query('SELECT * from users');
        return $data->fetchAll(PDO::FETCH_CLASS,User::class);
    }

    public function create(string $login, string $password):void
    {
        $sth=$this->connection->prepare('INSERT INTO users (login, password) VALUES (?,?)');
        $sth->execute([$login, $password]);
    }

    public function checkExist(string $login, string $password):bool
    {
        $sth = $this->connection->prepare('SELECT * FROM users WHERE login=? and password=?');
        $sth->execute([$login, $password]);
        return $sth->rowCount()>0;
    }

    public function getOne(int $id): User
    {

    }
}