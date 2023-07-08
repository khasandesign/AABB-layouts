<?php
/**
 * @var $articles
 * @var $videos
 * @var $tag
 * @var $banner
 * @var $sidebar
 */

use helpers\Component;
?>

<div class="feed col-xxl-5 col-xl-6 col-lg-7 offset-xl-0 offset-lg-1 col-md-8">
    <section id="articles">
        <h4 class="section-heading">Tag: <span class="text-accent"><?= $tag ?></span></h4>
        <?php foreach ($articles as $article) {
            echo Component::component('article-md', ['article' => $article]);
        } ?>
    </section>
    <section id="videos">
        <h4 class="section-heading"><span class="text-accent"><?= $tag ?></span> Videos</h4>
        <?php foreach ($videos as $video) {
            echo Component::component('video-lg', ['video' => $video]);
        } ?>
    </section>
    <?php
    echo Component::component('sections/digest-form');
    echo Component::component('bottom-footer');
    ?>
</div>

<?= Component::component('sidebar', ['sidebar' => $sidebar])?>