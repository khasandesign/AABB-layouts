<?php
/**
 * @var $article
 * @var $video
 */

use helpers\Component;
?>

<section id="see-also">
    <h4 class="section-heading">See also</h4>
    <?php
    echo Component::component('article-md', ['article' => $article]);
    echo Component::component('video-lg', ['video' => $video]);
    ?>
</section>
