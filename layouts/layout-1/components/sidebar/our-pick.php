<?php
use models\Product;
use helpers\Component;

$product_m = new Product();
$product = $product_m->getHotDeals(1);

try {
    if (!$product) {
        throw new Exception('Error: No <b>product</b> provided to component: ' . __FILE__);
    }
} catch (Exception $e) {
    return false;
}
?>

<section id="our-pick">
    <h5 class="section-heading">Our pick</h5>
    <?= Component::component('product-sm', ['product' => $product]) ?>
</section>
