<?php
namespace models;

use db\DB;
use PDO;

class Video
{
    public $id;
    public $embed_url;
    public $title;
    public $author_name;
    public $author_image;
    public $author_url;
    public $visible;
    public $category_id;


    /**
     * Get all videos
     * @return mixed
     */
    public function getVideos()
    {
        $q = DB::$db->query('SELECT * FROM video');
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get video by ID or Get random video by ID is null
     * @param $id
     * @return mixed
     */
    public function getVideo($id = null)
    {
        if ($id) {
            $q = DB::$db->prepare('SELECT * FROM video WHERE id = :id');
            $q->execute(['id' => $id]);
        } else {
            // Random video
            $q = DB::$db->query('SELECT * FROM video ORDER BY RAND() LIMIT 1');
        }

        return $q->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Get videos by tag
     * @param $tag
     * @return mixed
     */
    public function getVideosByTag($tag)
    {
        $q = DB::$db->query('SELECT v.embed_url, v.title, v.author_name, v.author_url, v.author_image, GROUP_CONCAT(t.tag) tags FROM video as v INNER JOIN video_tag vt on v.id = vt.video_id INNER JOIN tag t on vt.tag_id = t.id GROUP BY v.id ORDER BY v.id desc');
        $videos = $q->fetchAll(PDO::FETCH_ASSOC);

        // Tags to array
        for ($i = 0; $i < count($videos); $i++) {
            $videos[$i]['tags'] = explode(',', $videos[$i]['tags']);
        }

        // Filter by tag
        array_walk($videos, function (&$v, $key) use (&$videos, $tag) {
            // Filter by GET tag
            if (!in_array($tag, $v['tags'])) {
                unset($videos[$key]);
            }
        });

        return $videos;
    }
}