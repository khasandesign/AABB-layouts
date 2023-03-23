<?php
/**
 * @var $embed
 */

try {
    if (!$embed) {
        throw new Exception('Error: No <b>embed</b> provided to component: ' . __FILE__);
    }
}
catch (Exception $e)
{
    echo $e->getMessage();
    return false;
}
?>

<div class="banner">
    <?= isset($embed) && $embed ? $embed : '' ?>
</div>