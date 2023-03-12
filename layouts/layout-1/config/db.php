<?php
namespace db;

use Exception;
use PDO;

class DB {
    public static $db;

    static function init()
    {
        try {
            self::$db = new PDO(
                'mysql:host=127.0.0.1;
                port=3306;
                dbname=mygardenyard;
                charset=utf8',
                'root',
                '');

            return self::$db;
        }
        catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
    }
}

DB::init();