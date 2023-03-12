<?php
/**
 * @var $category
 */

use helpers\Component;
use helpers\Text;

try {
    if (!$category) {
        throw new Exception('Error: No <b>category</b> provided to component: ' . __FILE__);
    }
}
catch (Exception $e)
{
    echo $e->getMessage();
    return false;
}
?>

<section id="<?= $category['name_id'] ?>">
    <h4 class="section-heading"><?= Text::ucOnlyFirst($category['name']) ?></h4>
    <?php
    // Articles
    foreach (array_slice($category['articles'], 0, 2) as $article) {
        echo Component::component('article-lg', ['article' => $article]);
    }
    // Videos
    foreach (array_slice($category['videos'], 0, 2) as $video) {
        echo Component::component('video-lg', ['video' => $video]);
    }
    ?>
</section>