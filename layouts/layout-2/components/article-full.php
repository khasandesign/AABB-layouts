<?php
/**
 * @var $article
 * @var $products
 */

use helpers\Component;
?>

<section id="article-<?= $article['id'] ?>">
    <div class="article article-expand">
        <div class="article-header">
            <a href="/category?id=<?= $article['category_id'] ?>" class="platter-ref">
                <span class="preview-symbol"><img src="https://source.unsplash.com/<?= $article['category_image'] ?>/48x48" alt="*"></span>
                <?= $article['category_name'] ?>
            </a>
            <a href="/article?id=<?= $article['id'] ?>">
                <h3 class="article-title"><?= $article['title'] ?></h3>
            </a>
        </div>
        <div class="article-tags tag-group">
            <?php foreach ($article['tags'] as $tag) {
                ?>
                <a href="/search?tag=<?= $tag?>" class="tag"><?= ucfirst($tag) ?></a>
                <?php
            }?>
            <?= isset($article['new']) && $article['new'] ? '<a class="tag tag-active">New</a>' : ''?>
        </div>
        <div class="article-content">
            <?= $article['content'] ?>
        </div>
        <div class="article-af-items">
            <?php foreach ($products as $product) {
                echo Component::component('product-lg', ['product' => $product]);
            } ?>
        </div>
    </div>
</section>
