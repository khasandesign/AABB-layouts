<?php
use helpers\Component;
use models\Article;

$article_m = new Article();
$products = isset($_GET['id']) ? $article_m->getArticleProducts($_GET['id']) : [];
?>

<section id="picked-items">
    <h5 class="section-heading">Picked items</h5>
    <div class="platter-group platter-group-sm">
        <?php foreach ($products as $product) {
            echo Component::component('product-sm', ['product' => $product]);
        } ?>
    </div>
</section>
