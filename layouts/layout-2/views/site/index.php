<?php
/**
 * @var $new_article
 * @var $categories
 * @var $banners
 * @var $sidebar
 */

use helpers\Component;

?>

<div class="feed col-md-8">
    <?php
    echo Component::component('sections/new-article', ['article' => $new_article]);
    for ($i = 0; $i < count($categories); $i++) {
        echo Component::component('sections/category-content', [
            'category' => $categories[$i],
        ]);
        echo Component::component('banner', ['embed' => isset($banners[$i]) ? $banners[$i]['src'] : '']);
    }
    echo Component::component('bottom-footer');
    ?>
</div>

<?= Component::component('sidebar', ['sidebar' => $sidebar])?>