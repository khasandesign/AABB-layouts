<?php
namespace models;

use db\DB;
use helpers\Text;
use PDO;
use Exception;

class Website
{
    public $id;
    public $name;
    public $title;
    public $description;
    public $image;
    public $source;
    public $email;
    public $ref_tag;
    public $ref_url;
    public $category;
    public $created_at;
    public $accent_color;
    public $symbol;
    public $font_headline;
    public $font_body;

    /**
     * Get all information about the website
     * @return mixed
     */
    public function getWebsite()
    {
        $q = DB::$db->query('SELECT * FROM website');
        $website = $q->fetch(PDO::FETCH_ASSOC);

        // Error handling
        if (!$website) {
            trigger_error('No website found', E_USER_ERROR);
        }

        $website['brand'] = Text::formatBrand($website['name']);

        return $website;
    }
}