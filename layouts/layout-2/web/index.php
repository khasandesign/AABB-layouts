<?php
require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Controller.php';
require $_SERVER['DOCUMENT_ROOT'] . '/controllers/SiteController.php';
require $_SERVER['DOCUMENT_ROOT'] . '/helpers/Component.php';
require $_SERVER['DOCUMENT_ROOT'] . '/helpers/Text.php';
require $_SERVER['DOCUMENT_ROOT'] . '/helpers/Http.php';
require $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

use helpers\Component;
use controllers\SiteController;
use models\Website;
use models\Category;
use models\Tag;

// Get content
$site = new SiteController();
$content = $site->getContent();
$website_m = new Website();
$category_m = new Category();
$website = $website_m->getWebsite();
$categories = $category_m->getCategories();
$tag_m = new Tag();
$tags = $tag_m->getTags();

if (!$site->layout) {
    echo $content;
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/web/"/>
    <?php
    echo Component::component('meta/seo', ['website' => $website, 'dynamic' => $site, 'tags' => $tags])
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/app.css">
    <?php
    echo Component::component('meta/fonts', ['website' => $website]);
    echo Component::component('meta/colors', ['website' => $website]);
    ?>
</head>
<body>
<div class="container">
    <?= Component::component('navbar', ['website' => $website, 'categories' => $categories]) ?>
    <div class="row">
        <?= $content ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
