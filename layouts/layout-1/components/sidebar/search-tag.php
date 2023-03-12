<?php
use models\Tag;
use helpers\Http;

$tag_m = new Tag();
$tags = $tag_m->getTags();
?>

<section id="search-tag">
    <h5 class="section-heading">Search tag</h5>
    <div class="tag-group">
        <?php foreach ($tags as $tag) {
            ?>
            <a href="/search?tag=<?= $tag['tag']?>" class="tag <?= Http::isActive('search', ['tag' => $tag['tag']], 'tag-active')?>"><?= ucfirst($tag['tag']) ?></a>
            <?php
        }?>
    </div>
</section>