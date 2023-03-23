<?php
/**
 * @var $video
 */

use helpers\Component;
?>

<section id="watch-also">
    <h4 class="section-heading">Watch also</h4>
    <?= Component::component('video-lg', ['video' => $video])?>
</section>