<?php
/**
 * @var $article
 * @var $video
 */

use helpers\Component;

try {
    if (!$article) {
        throw new Exception('Error: No <b>article</b> provided to component: ' . __FILE__);
    }
}
catch (Exception $e)
{
    echo $e->getMessage();
    return false;
}
?>

<section id="most-read">
    <h4 class="section-heading">Most read</h4>
    <?php
    // Articles
    echo Component::component('article-lg', ['article' => $article]);
    // Videos
    echo Component::component('video-lg', ['video' => $video]);
    ?>
</section>