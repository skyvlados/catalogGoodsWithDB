<?php
namespace Connections;
use PDO;
use function Amp\Postgres\connect;

class DataBase
{
    private static $connection;

    private static function connect():void
    {
        if (!self::$connection) {
            self::$connection=new PDO('pgsql:host=localhost;dbname=new_shop', "vladislav", "");
        }
    }

    public static function get():PDO
    {
        self::connect();
        return self::$connection;
    }

}