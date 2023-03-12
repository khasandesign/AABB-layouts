<?php
/**
 * @var $article
 */

use helpers\Text;

if (!$article) {
    return false;
}
?>

<div class="article article-lg">
    <div class="article-header">
        <a href="/category?id=<?= $article['category_id']?>" class="platter-ref">
            <span class="preview-symbol"><img src="https://source.unsplash.com/<?= $article['category_image'] ?>/48x48" alt="*"></span>
            <?= ucfirst(strtolower($article['category_name'])) ?>
        </a>
        <a href="/article?id=<?= $article['id']?>">
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
        <?= Text::trimParagraphs($article['content'], 3) ?>
    </div>
    <a href="/article?id=<?= $article['id']?>" class="platter-cta">Read more...</a>
</div>