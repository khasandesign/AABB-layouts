<?php
/**
 * @var $video
 */

use helpers\Text;
?>

<div class="video video-sm">
    <div class="ratio ratio-16x9">
        <iframe loading="lazy" src="<?= $video['embed_url'] ?>" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
    </div>
    <div class="platter-inner">
        <a href="<?= $video['embed_url'] ?>" target="_blank">
            <h6 class="video-title"><?= Text::trimText($video['title'], 48) ?></h6>
        </a>
    </div>
    <div class="platter-footer">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M7.3335 4.66671H8.66683V6.00004H7.3335V4.66671ZM7.3335 7.33337H8.66683V11.3334H7.3335V7.33337ZM8.00016 1.33337C4.32016 1.33337 1.3335 4.32004 1.3335 8.00004C1.3335 11.68 4.32016 14.6667 8.00016 14.6667C11.6802 14.6667 14.6668 11.68 14.6668 8.00004C14.6668 4.32004 11.6802 1.33337 8.00016 1.33337ZM8.00016 13.3334C5.06016 13.3334 2.66683 10.94 2.66683 8.00004C2.66683 5.06004 5.06016 2.66671 8.00016 2.66671C10.9402 2.66671 13.3335 5.06004 13.3335 8.00004C13.3335 10.94 10.9402 13.3334 8.00016 13.3334Z"
                fill="black" fill-opacity="0.3" />
        </svg>
        <span>
                  Copyrighted by <a href="https://creativecommons.org/">Creative Commons</a>
                  <a href="https://creativecommons.org/licenses/by/3.0/legalcode">CC BY</a>.
                </span>
    </div>
</div>
