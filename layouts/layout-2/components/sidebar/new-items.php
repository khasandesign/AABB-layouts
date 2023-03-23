<?php
use models\Product;
use helpers\Component;

$product_m = new Product();
$products = $product_m->getHotDeals(2);

try {
    if (!$products) {
        throw new Exception('Error: No <b>products</b> provided to component: ' . __FILE__);
    }
} catch (Exception $e) {
    return false;
}
?>

<section id="new-items">
    <h5 class="section-heading">New items</h5>
    <?php foreach ($products as $product) {
        echo Component::component('product-sm', ['product' => $product]);
    } ?>
</section>
