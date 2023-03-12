<?php
/**
 * @var $website
 * @var $dynamic
 * @var $tags
 */

use helpers\Http;
use helpers\Text;

$website['name'] = Text::removeSymbol($website['name'], '&#8203');
?>

<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title><?= strip_tags($dynamic->title) ?></title>

<meta name="description" content="<?= strip_tags($dynamic->description) ?>">
<meta name="keywords" content="<?= Text::arrToStr($tags, ',', true, 'tag') ?>">
<meta name="image" content="https://source.unsplash.com/<?= $website['image'] ?>">

<meta name="Author" content="<?= ucfirst($website['name']) ?>">
<meta name="Copywrite" content="© <?= ucfirst($website['name']) . ' ' . date('Y') ?>">

<!-- Schema.org for Google -->
<meta itemprop="name" content="<?= ucfirst($website['name']) ?>">
<meta itemprop="description" content="<?= strip_tags($dynamic->description) ?>">
<meta itemprop="image" content="https://source.unsplash.com/<?= $website['image'] ?>">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?= strip_tags($dynamic->title) ?>">
<meta name="twitter:description" content="<?= strip_tags($dynamic->description) ?>">
<meta name="twitter:image:src" content="https://source.unsplash.com/<?= $website['image'] ?>">
<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="<?= strip_tags($dynamic->title) ?>">
<meta name="og:description" content="<?= strip_tags($dynamic->description) ?>">
<meta name="og:image" content="https://source.unsplash.com/<?= $website['image'] ?>">
<meta name="og:url" content="https://<?= Http::getDomain() . '/' ?>">
<meta name="og:site_name" content="<?= $website['name'] ?>">
<meta name="og:locale" content="en_US">
<meta name="og:type" content="website">

<link rel="icon" href="data:image/svg+xml,<?= Text::svgUrlEncode($website['symbol']) ?>" type="image/svg+xml">
