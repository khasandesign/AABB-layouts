<?php
/**
 * @var $category
 * @var $most_read
 * @var $banners
 * @var $rand_video
 * @var $sidebar
 */

use helpers\Component;
?>

<div class="feed col-xxl-5 col-xl-6 col-lg-7 offset-xl-0 offset-lg-1 col-md-8" data-bg-color="<?= $category['image_color'] ?>">
    <?php
    echo Component::component('sections/most-read', [
        'article' => $category['articles'][0],
        'video' => $category['videos'][0]
    ]);
    unset($category['articles'][0]);
    unset($category['videos'][0]);

    echo Component::component('banner', ['embed' => $banners[array_rand($banners)]['src']]);
    echo Component::component('sections/category-content', [
        'category' => $category,
    ]);
    echo Component::component('sections/watch-also', [
        'video' => $rand_video
    ]);
    echo Component::component('banner', ['embed' => $banners[array_rand($banners)]['src']]);
    echo Component::component('sections/digest-form');
    echo Component::component('bottom-footer');
    ?>
</div>

<?= Component::component('sidebar', ['sidebar' => $sidebar])?>