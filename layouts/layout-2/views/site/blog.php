<?php
/**
 * @var $articles
 * @var $videos
 * @var $banners
 * @var $sidebar
 */

use helpers\Component;
?>

<div class="feed col-md-8">
    <section id="blog-articles">
        <h4 class="section-heading">Blog articles</h4>
        <?php foreach ($articles as $article) {
            echo Component::component('article-md', ['article' => $article]);
        } ?>
    </section>
    <?php echo Component::component('banner', ['embed' => $banners[array_rand($banners)]['src']]); ?>
    <section id="videos">
        <h4 class="section-heading">Videos</h4>
        <?php foreach ($videos as $video) {
            echo Component::component('video-lg', ['video' => $video]);
        } ?>
    </section>
    <?php
    echo Component::component('banner', ['embed' => $banners[array_rand($banners)]['src']]);
    echo Component::component('bottom-footer');
    ?>
</div>

<?= Component::component('sidebar', ['sidebar' => $sidebar])?>