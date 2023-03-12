<?php
namespace controllers;

include $_SERVER['DOCUMENT_ROOT'] . '/models/Article.php';
include $_SERVER['DOCUMENT_ROOT'] . '/models/Banner.php';
include $_SERVER['DOCUMENT_ROOT'] . '/models/Category.php';
include $_SERVER['DOCUMENT_ROOT'] . '/models/Product.php';
include $_SERVER['DOCUMENT_ROOT'] . '/models/Video.php';
include $_SERVER['DOCUMENT_ROOT'] . '/models/Tag.php';
include $_SERVER['DOCUMENT_ROOT'] . '/models/Website.php';
include $_SERVER['DOCUMENT_ROOT'] . '/models/EmailList.php';

use helpers\Text;
use models\Article;
use models\Banner;
use models\Category;
use models\Product;
use models\Video;
use models\Website;
use models\EmailList;

class SiteController extends Controller
{
    public $title;
    public $description;

    public function __construct()
    {
        parent::__construct();

        $website_m = new Website();
        $website = $website_m->getWebsite();

        $this->title = $website['title'];
        $this->description = $website['description'];
    }

    public function actionIndex()
    {
        $article_m = new Article();
        $banner_m = new Banner();
        $category_m = new Category();

        // Feed
        $new_article = $article_m->getNewArticle();
        $categories = $category_m->getCategoriesContent();
        $banners = $banner_m->getBanners();

        // Sidebar
        $sidebar = [
            [
                'target' => '',
                'sections' => ['watching', 'popular-articles']
            ],
            [
                'target' => $categories[1]['name_id'],
                'sections' => ['new-items']
            ],
            [
                'target' => $categories[2]['name_id'],
                'sections' => ['our-pick', 'search-tag']
            ]
        ];

        return $this->render('index', ['new_article' => $new_article, 'categories' => $categories, 'banners' => $banners, 'sidebar' => $sidebar]);
    }

    public function actionCategory($id)
    {
        $category_m = new Category();
        $banner_m = new Banner();
        $video_m = new Video();

        // Feed
        $category = $category_m->getCategoryContent($id);
        $banners = $banner_m->getBanners();
        $rand_video = $video_m->getVideo();

        // Sidebar
        $sidebar = [
            [
                'target' => '',
                'sections' => ['search-tag', 'new-items']
            ],
            [
                'target' => 'watch-also',
                'sections' => ['popular-articles']
            ],
        ];

        $this->title = $category['name'];
        return $this->render('category', ['category' => $category, 'banners' => $banners, 'rand_video' => $rand_video, 'sidebar' => $sidebar]);
    }

    public function actionBlog()
    {
        $article_m = new Article();
        $video_m = new Video();
        $banner_m = new Banner();

        // Feed
        $articles = $article_m->getArticles();
        $videos = $video_m->getVideos();
        $banners = $banner_m->getBanners();

        // Sidebar
        $sidebar = [
            [
                'target' => '',
                'sections' => ['search-tag', 'popular-articles']
            ],
            [
                'target' => 'videos',
                'sections' => ['new-items']
            ],
        ];

        $this->title = 'Our Blog';
        return $this->render('blog', ['articles' => $articles, 'videos' => $videos, 'banners' => $banners, 'sidebar' => $sidebar]);
    }

    public function actionSearch($tag)
    {
        $article_m = new Article();
        $video_m = new Video();
        $banner_m = new Banner();

        // Feed
        $articles = $article_m->getArticlesByTag($tag);
        $videos = $video_m->getVideosByTag($tag);
        $banner = $banner_m->getBanner();

        // Sidebar
        $sidebar = [
            [
                'target' => '',
                'sections' => ['search-tag', 'new-items']
            ],
        ];

        $this->title = 'Search: ' . ucfirst($tag);
        return $this->render('search', ['articles' => $articles, 'videos' => $videos, 'tag' => ucfirst($tag), 'banner' => $banner, 'sidebar' => $sidebar]);
    }

    public function actionArticle($id, $ref = false)
    {
        $article_m = new Article();
        $video_m = new Video();
        $banner_m = new Banner();
        $product_m = new Product();

        if (isset($ref) && $ref) {
            $product = $product_m->getProduct();
            if ($product) {
                header('Location: ' . $product['url']);
            }
        }

        // Feed
        $article = $article_m->getArticle($id);
        $products = $article_m->getArticleProducts($id);
        $banners = $banner_m->getBanners();
        $see_also['article'] = $article_m->getArticle($id, true);
        $see_also['video'] = $video_m->getVideo();

        // Sidebar
        $sidebar = [
            [
                'target' => '',
                'sections' => ['picked-items', 'watching']
            ],
        ];

        $this->title = $article['title'];
        $this->description = Text::trimParagraphs($article['content'], 1);
        return $this->render('article', ['article' => $article, 'products' => $products, 'banners' => $banners, 'see_also' => $see_also, 'sidebar' => $sidebar]);
    }

    public function actionPrivacyPolicy()
    {
        $website_m = new Website();
        $website = $website_m->getWebsite();

        $this->title = 'Privacy Policy';
        return $this->render('privacy-policy', ['website' => $website]);
    }

    public function actionCookiePolicy()
    {
        $website_m = new Website();
        $website = $website_m->getWebsite();

        $this->title = 'Cookie Policy';
        return $this->render('cookie-policy', ['website' => $website]);
    }

    public function actionTermsOfUse()
    {
        $this->title = 'Terms of Use';
        return $this->render('terms-of-use');
    }

    public function actionDisclaimer()
    {
        $this->title = 'Disclaimer';
        return $this->render('disclaimer');
    }

    public function actionContacts()
    {
        $website_m = new Website();
        $website = $website_m->getWebsite();

        $this->title = 'Contacts';
        return $this->render('contacts', ['website' => $website]);
    }

    public function actionSubscribeEmail()
    {
        $this->layout = false;

        if ($_POST['email']) {
            $email_list_m = new EmailList();
            $email_list_m->subscribeEmail($_POST['email']);
        } else {
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        }
    }
}