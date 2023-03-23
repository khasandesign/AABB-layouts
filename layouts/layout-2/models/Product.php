<?php
namespace models;

use db\DB;
use PDO;

class Product
{
    public $id;
    public $name;
    public $brand;
    public $description;
    public $url;
    public $image;
    public $hot_deal;


    /**
     * Get all products
     * @return mixed
     */
    public function getProducts()
    {
        $q = DB::$db->query('SELECT * FROM product');
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get product by ID or Get random product by ID is null
     * @param $id
     * @return mixed
     */
    public function getProduct($id = null)
    {
        if ($id) {
            $q = DB::$db->prepare('SELECT * FROM product WHERE id = :id');
            $q->execute(['id' => $id]);
        } else {
            // Random product
            $q = DB::$db->query('SELECT * FROM product ORDER BY RAND() LIMIT 1');
        }

        return $q->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Get all or limited count hot deals products
     * @param $limit
     * @return mixed
     */
    public function getHotDeals($limit = 0)
    {
        if ($limit) {
            $q = DB::$db->query('SELECT * FROM product WHERE hot_deal = 1 ORDER BY RAND() LIMIT ' . $limit);
        } else {
            // Get all hot deals
            $q = DB::$db->query('SELECT * FROM product WHERE hot_deal = 1');
        }

        if ($limit > 1) {
            return $q->fetchAll(PDO::FETCH_ASSOC);
        }
        return $q->fetch(PDO::FETCH_ASSOC);
    }

}