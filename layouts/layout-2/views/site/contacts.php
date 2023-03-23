<?php
/**
 * @var $website
 */

use helpers\Component;
?>
<div class="feed col-md-8">
    <div class="platter-lg platter-manual">
        <section id="contacts">
            <h3>Contacts</h3>
            <p class="par-1">If you have any questions for us about <?= ucfirst($website['name']) ?>, you can email <a
                    href="mailto:<?= $website['email'] ?>"><?= $website['email'] ?></a>.</p>
            <p class="par-1">Your email will not be subscribed to the newsletter and will not be shared with third.</p>
            <p class="par-1">Our manager will contact you as soon as possible.</p>
        </section>
    </div>
    <?php
    echo Component::component('bottom-footer');
    ?>
</div>