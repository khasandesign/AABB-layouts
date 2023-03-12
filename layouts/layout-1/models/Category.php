<?php
namespace models;

use db\DB;
use PDO;
use helpers\Text;

class Category
{
    public $id;
    public $name;
    public $title;
    public $image;
    public $source;
    public $visible;


    /**
     * Get all categories
     * @return mixed
     */
    public function getCategories()
    {
        $q = DB::$db->query('SELECT * FROM category');
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get category by ID
     * @param $id
     * @return mixed
     */
    public function getCategory($id)
    {
        $q = DB::$db->prepare('SELECT * FROM category WHERE id = :id');
        $q->execute(['id' => $id]);

        return $q->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Get category's articles by category ID
     * @param $id
     * @return mixed
     */
    public function getCategoryArticles($id)
    {
        $q = DB::$db->prepare('SELECT a.id, a.title, a.content, c.id as category_id, c.name as category_name, c.image as category_image, GROUP_CONCAT(t.tag) tags FROM article a INNER JOIN article_tag at ON a.id = at.article_id INNER JOIN tag t ON t.id = at.tag_id INNER JOIN category c on a.category_id = c.id WHERE a.category_id = :id GROUP BY a.id ORDER BY a.id DESC');
        $q->execute(['id' => $id]);
        $articles = $q->fetchAll(PDO::FETCH_ASSOC);

        // Tags to array
        for ($i = 0; $i < count($articles); $i++) {
            $articles[$i]['tags'] = explode(',', $articles[$i]['tags']);
        }

        return $articles;
    }

    /**
     * Get category's videos by category ID
     * @param $id
     * @return mixed
     */
    public function getCategoryVideos($id)
    {
        $q = DB::$db->prepare('SELECT v.embed_url, v.title, v.author_name, v.author_image, v.author_url, c.id as category_id, c.name as category_name FROM video v JOIN category c on v.category_id = c.id WHERE v.category_id = :id');
        $q->execute(['id' => $id]);

        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get category bundle
     * @param $id
     * @return mixed
     */
    public function getCategoryContent($id)
    {
        $category = $this->getCategory($id);
        $category['name_id'] = Text::strToId($category['name']);
        $category['articles'] = $this->getCategoryArticles($category['id']);
        $category['videos'] = $this->getCategoryVideos($category['id']);

        return $category;
    }

    /**
     * Get all categories bundle
     * @return mixed
     */
    public function getCategoriesContent()
    {
        $categories = $this->getCategories();
        for ($i = 0; $i < count($categories); $i++) {
            $categories[$i]['name_id'] = Text::strToId($categories[$i]['name']);
            $categories[$i]['articles'] = $this->getCategoryArticles($categories[$i]['id']);
            $categories[$i]['videos'] = $this->getCategoryVideos($categories[$i]['id']);
        }

        return $categories;
    }
}