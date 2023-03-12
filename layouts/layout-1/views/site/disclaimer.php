<?php
use helpers\Http;
use helpers\Component;
?>
<div class="feed col-xxl-5 col-xl-6 col-lg-7 offset-xl-0 offset-lg-1 col-md-8">
    <div class="platter-lg platter-manual">
        <section id="intro">
            <h3>Disclaimer</h3>
            <p class="par-1"><?= Http::getDomain() ?> provides information for general information
                purposes and does not
                recommend particular products or services.</p>
            <p class="par-1">Nothing within this website (<?= Http::getDomain() ?>) is, or shall be
                deemed, to constitute
                financial or other advise or a recommendation to purchase any product or service.</p>
            <p class="par-1">The service provided by <?= Http::getDomain() ?> expressly disclaims to
                the fullest extent of
                the law all express, implied, and statutory warranties regarding the information contained on the
                Website. <?= Http::getDomain() ?> does not represent or warrant the accuracy or
                reliability of the
                information, and will not be liable to any user on account of their use or misuse of information
                found on <?= Http::getDomain() ?>.</p>
            <p class="par-1">We strongly recommend that independent professional advice is obtained before you
                purchase any product or service via <?= Http::getDomain() ?>.</p>
        </section>
    </div>
    <?php
    echo Component::component('sections/digest-form');
    echo Component::component('bottom-footer');
    ?>
</div>