<?php
/**
 * @var $article
 * @var $products
 * @var $banners
 * @var $see_also
 * @var $sidebar
 */

use helpers\Component;
?>

<div class="feed col-md-8">
    <?php
    echo Component::component('article-full', ['article' => $article, 'products' => $products]);
    echo Component::component('banner', ['embed' => $banners[array_rand($banners)]['src']]);

    echo Component::component('sections/see-also', ['article' => $see_also['article'], 'video' => $see_also['video']]);
    echo Component::component('banner', ['embed' => $banners[array_rand($banners)]['src']]);

    echo Component::component('bottom-footer');
    ?>
</div>

<?= Component::component('sidebar', ['sidebar' => $sidebar])?>