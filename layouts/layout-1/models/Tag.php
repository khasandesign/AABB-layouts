<?php
namespace models;

use db\DB;
use PDO;

class Tag
{
    public $id;
    public $tag;

    /**
     * Get all tags
     * @return mixed
     */
    public function getTags()
    {
        $q = DB::$db->query('SELECT * FROM tag');
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
}