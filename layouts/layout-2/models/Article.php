<?php
namespace models;

use db\DB;
use PDO;

class Article
{
    public $id;
    public $title;
    public $content;
    public $created_at;
    public $visible;
    public $author_id;
    public $category_id;


    /**
     * Get all articles
     * @return mixed
     */
    public function getArticles() {
        $q = DB::$db->query('SELECT a.id, a.title, a.content, c.id as category_id, c.name as category_name, c.image as category_image, GROUP_CONCAT(t.tag) tags FROM article a INNER JOIN article_tag at ON a.id = at.article_id INNER JOIN tag t ON t.id = at.tag_id INNER JOIN category c on a.category_id = c.id GROUP BY a.id ORDER BY a.id desc');
        $articles = $q->fetchAll(PDO::FETCH_ASSOC);

        // Tags to array
        for ($i = 0; $i < count($articles); $i++) {
            $articles[$i]['tags'] = explode(',', $articles[$i]['tags']);
        }

        return $articles;
    }

    /**
     * Get article by ID or Get random article by ID is null
     * @param $id
     * @param bool $not
     * @return mixed
     */
    public function getArticle($id = null, $not = false)
    {
        if ($id && !$not) {
            // Id article
            $q = DB::$db->prepare('SELECT a.id, a.title, a.content, c.id as category_id, c.name as category_name, c.image as category_image, GROUP_CONCAT(t.tag) tags FROM article a INNER JOIN article_tag at ON a.id = at.article_id INNER JOIN tag t ON t.id = at.tag_id INNER JOIN category c on a.category_id = c.id WHERE a.id = :id GROUP BY a.id ORDER BY a.id desc');
            $q->execute(['id' => $id]);
        } else if ($id && $not) {
            // Not id article
            $q = DB::$db->prepare('SELECT a.id, a.title, a.content, c.id as category_id, c.name as category_name, c.image as category_image, GROUP_CONCAT(t.tag) tags FROM article a INNER JOIN article_tag at ON a.id = at.article_id INNER JOIN tag t ON t.id = at.tag_id INNER JOIN category c on a.category_id = c.id WHERE a.id != :id GROUP BY a.id ORDER BY RAND() LIMIT 1');
            $q->execute(['id' => $id]);
        } else {
            // Random article
            $q = DB::$db->query('SELECT a.id, a.title, a.content, c.id as category_id, c.name as category_name, c.image as category_image, GROUP_CONCAT(t.tag) tags FROM article a INNER JOIN article_tag at ON a.id = at.article_id INNER JOIN tag t ON t.id = at.tag_id INNER JOIN category c on a.category_id = c.id GROUP BY a.id ORDER BY RAND() LIMIT 1');
        }
        $article = $q->fetch(PDO::FETCH_ASSOC);

        // Tags to array
        $article['tags'] = explode(',', $article['tags']);

        return $article;
    }

    /**
     * Get article's product by article ID
     * @param $id
     * @return mixed
     */
    public function getArticleProducts($id) {
        $q = DB::$db->prepare('SELECT * FROM product WHERE article_id = :id');
        $q->execute(['id' => $id]);

        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get last added article
     * @return mixed
     */
    public function getNewArticle()
    {
        $q = DB::$db->query('SELECT a.id, a.title, a.content, c.id as category_id, c.name as category_name, c.image as category_image, GROUP_CONCAT(t.tag) tags FROM article a INNER JOIN article_tag at ON a.id = at.article_id INNER JOIN tag t ON t.id = at.tag_id INNER JOIN category c on a.category_id = c.id GROUP BY a.id ORDER BY a.id desc LIMIT 1');
        $article = $q->fetch(PDO::FETCH_ASSOC);

        // Tags to array
        if ($article) {
            $article['tags'] = explode(',', $article['tags']);
            $article['new'] = true;
        }

        return $article;
    }

    /**
     * Get articles by tag
     * @param $tag
     * @return mixed
     */
    public function getArticlesByTag($tag)
    {
        $q = DB::$db->query('SELECT a.id, a.title, a.content, c.id as category_id, c.name as category_name, c.image as category_image, GROUP_CONCAT(t.tag) tags FROM article a INNER JOIN article_tag at ON a.id = at.article_id INNER JOIN tag t ON t.id = at.tag_id INNER JOIN category c on a.category_id = c.id GROUP BY a.id ORDER BY a.id desc');
        $articles = $q->fetchAll(PDO::FETCH_ASSOC);

        // Tags to array
        for ($i = 0; $i < count($articles); $i++) {
            $articles[$i]['tags'] = explode(',', $articles[$i]['tags']);
        }

        // Filter by tag
        array_walk($articles, function (&$a, $key) use (&$articles, $tag) {
            // Filter by GET tag
            if (!in_array($tag, $a['tags'])) {
                unset($articles[$key]);
            }
        });

        return $articles;
    }
}
