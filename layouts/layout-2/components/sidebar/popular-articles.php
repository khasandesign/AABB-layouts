<?php
use models\Article;
use helpers\Component;

$article_m = new Article();
$articles = $article_m->getArticles();
?>

<section id="popular">
    <h5 class="section-heading">Popular</h5>
    <?php foreach (array_splice($articles, 0, 2) as $article) {
        echo Component::component('article-sm', ['article' => $article]);
    }?>
</section>