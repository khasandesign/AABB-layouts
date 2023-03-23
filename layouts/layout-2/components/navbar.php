<?php
/**
 * @var $website
 * @var $categories
 */

use helpers\Http;
?>

<div class="nav-wrap">
    <nav>
        <div class="nav-brand">
            <span class="nav-symbol">
              <?= $website['symbol'] ?>
            </span>
            <?= $website['brand'] ?>
            <a href="/" class="stretched-link"></a>
        </div>
        <div class="nav-items">
            <div class="nav-item <?= Http::isActive('index') ?>">
                <a href="/" class="nav-link">Home</a>
            </div>
            <?php foreach ($categories as $category) {
                ?>
                <div class="nav-item <?= Http::isActive('category', ['id' => $category['id']]) ?>">
                    <a href="/category?id=<?= $category['id'] ?>" class="nav-link">
                        <span class="preview-symbol"><img src="https://source.unsplash.com/<?= $category['image'] ?>/48x48" alt="*"></span>
                        <?= $category['name'] ?></a>
                </div>
                <?php
            } ?>
            <div class="nav-item <?= Http::isActive('blog') ?>">
                <a href="/blog" class="nav-link">Blog</a>
            </div>
        </div>
    </nav>
</div>