<?php
namespace models;

use db\DB;
use PDO;

class Banner
{
    public $id;
    public $src;
    public $size_id;


    /**
     * Get all banners
     * @return mixed
     */
    public function getBanners() {
        $q = DB::$db->query('SELECT * FROM banner');
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get banner by ID or Get random banner by ID is null
     * @param $id
     * @return mixed
     */
    public function getBanner($id = null)
    {
        if ($id) {
            $q = DB::$db->prepare('SELECT * FROM banner WHERE id = :id');
            $q->execute(['id' => $id]);
        } else {
            // Random banner
            $q = DB::$db->query('SELECT * FROM banner ORDER BY RAND() LIMIT 1');
        }

        return $q->fetch(PDO::FETCH_ASSOC);
    }
}