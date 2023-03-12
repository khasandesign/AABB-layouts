<?php
use helpers\Http;
?>

<hr class="d-block d-xl-none">
<footer class="bottom-footer">
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