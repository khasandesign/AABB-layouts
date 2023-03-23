<?php
/**
 * @var $article
 */
use helpers\Component;
?>

<section id="new-article">
    <h4 class="section-heading">New article</h4>
    <?= Component::component('article-lg', ['article' => $article])?>
</section>