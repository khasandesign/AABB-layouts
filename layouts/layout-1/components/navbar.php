<?php
/**
 * @var $website
 * @var $categories
 */

use helpers\Http;
?>

<div class="nav-wrap sticky-xl-top col-xxl-2 col-xl-3 offset-xxl-1">
    <nav>
        <div class="nav-brand">
            <span class="nav-symbol">
              <?= $website['symbol'] ?>
            </span>
            <?= $website['brand'] ?>
            <a href="/" class="stretched-link"></a>
        </div>
        <div class="nav-items">
            <div class="nav-item <?= Http::isActive('index') ?>">
                <a href="/" class="nav-link">Home</a>
            </div>
            <div class="nav-items-group">
                <?php foreach ($categories as $category) {
                    ?>
                    <div class="nav-item <?= Http::isActive('category', ['id' => $category['id']]) ?>">
                        <a href="/category?id=<?= $category['id'] ?>" class="nav-link">
                            <span class="preview-symbol"><img src="https://source.unsplash.com/<?= $category['image'] ?>/48x48" alt="*"></span>
                            <?= $category['name'] ?></a>
                    </div>
                    <?php
                } ?>
            </div>
            <div class="nav-item <?= Http::isActive('blog') ?>">
                <a href="/blog" class="nav-link">Blog</a>
            </div>
        </div>
    </nav>
    <footer class="top-footer">
        <p class="footer-info caption">
            <a href="https://<?= Http::getDomain() ?>"><?= Http::getDomain() ?></a> is a participant in the Amazon Services LLC
            Associates Program, an affiliate advertising program designed to provide a means for sites to earn
            advertising fees by advertising and linking to <a href="https://amazon.com">Amazon.com</a>
        </p>
        <div class="footer-links">
            <a href="/privacy-policy">Privacy Policy</a>
            <a href="/cookie-policy">Cookie Policy</a>
            <a href="/terms-of-use">Terms of Use</a>
            <a href="/disclaimer">Disclaimer</a>
            <a href="/contacts">Contacts</a>
        </div>
        <p class="footer-copywrite caption">© <?= Http::getDomain() ?> <?= Date('Y') ?></p>
    </footer>
</div>