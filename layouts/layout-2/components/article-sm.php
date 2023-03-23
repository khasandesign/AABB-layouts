<?php
/**
 * @var $article;
 */
use helpers\Text;
?>

<div class="article article-sm">
    <div class="article-header">
        <a href="/category?id=<?= $article['category_id'] ?>" class="platter-ref">
            <span class="preview-symbol"><img src="https://source.unsplash.com/<?= $article['category_image'] ?>/48x48" alt="*"></span>
            <?= $article['category_name'] ?>
        </a>
        <a href="/article?id=<?= $article['id'] ?>">
            <h6 class="article-title"><?= $article['title'] ?></h6>
        </a>
    </div>
    <div class="article-content">
        <a href="/article?id=<?= $article['id'] ?>">
            <?= Text::trimText(Text::trimParagraphs($article['content'], 1), 110) ?>
        </a>
    </div>
    <a href="/article?id=<?= $article['id'] ?>" class="platter-cta">Read more...</a>
</div>
