<?php
/**
 * @var $new_article
 * @var $categories
 * @var $banners
 * @var $sidebar
 */

use helpers\Component;

?>

<div class="feed col-xxl-8 col-xl-6 col-lg-7 offset-xl-0 offset-lg-1 col-md-8">
    <?php
    echo Component::component('sections/new-article', ['article' => $new_article]);
    for ($i = 0; $i < count($categories); $i++) {
        echo Component::component('sections/category-content', [
            'category' => $categories[$i],
        ]);
    }
    echo Component::component('sections/digest-form');
    echo Component::component('bottom-footer');
    ?>
</div>

<?= Component::component('sidebar', ['sidebar' => $sidebar])?>