<?php
/**
 * @var array $sidebar Array containing the necessary sidebar parts.
 *      $sidebar = [
 *          [
 *              'target'   => (string) Section id from feed to be attached to
 *              'sections' => (array) Component names from /component/sidebar
 *          ]
 *          [...]
 *      ]
 */

use helpers\Component;

try {
    if (!$sidebar) {
        throw new Exception('Error: No <b>sidebar</b> provided to component: ' . __FILE__);
    }
}
catch (Exception $e)
{
    echo $e->getMessage();
    return false;
}
?>

<div class="sidebar col-md-4 d-none d-md-block">
    <?php foreach ($sidebar as $part) {
        ?>
        <div class="sidebar-part" data-target="<?= $part['target'] ?>">
            <?php foreach ($part['sections'] as $section) {
                echo Component::component('sidebar/' . $section);
            } ?>
        </div>
        <?php
    } ?>
</div>