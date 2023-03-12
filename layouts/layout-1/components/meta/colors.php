<?php
/**
 * @var $website
 */

use helpers\Text;
?>

<style>
    :root {
        --ds-accent-rgb: <?= Text::hexToRgb($website['accent_color']) ?>
    }
</style>
