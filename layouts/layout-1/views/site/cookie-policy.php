<?php
/**
 * @var $website
 */

use helpers\Http;
use helpers\Component;
?>
<div class="feed col-xxl-5 col-xl-6 col-lg-7 offset-xl-0 offset-lg-1 col-md-8">
    <div class="platter-lg platter-manual">
        <section id="intro">
            <h3>Cookie Policy</h3>
            <p class="par-1">This is the Cookie Policy for <?= Http::getDomain() ?>, accessible from <a
                    href="https://<?= Http::getDomain() ?>/cookie-policy"><?= Http::getDomain() ?>/cookie-policy</a></p>
        </section>
        <section id="what-are-cookies">
            <a href="<?= $_SERVER['REQUEST_URI'] ?>#what-are-cookies">
                <h5>What Are Cookies.</h5>
            </a>
            <p class="par-1">As is common practice with almost all professional websites this site uses cookies,
                which are tiny files that are downloaded to your computer, to improve your experience. This page
                describes what information they gather, how we use it and why we sometimes need to store these
                cookies. We will also share how you can prevent these cookies from being stored however this may
                downgrade or 'break' certain elements of the sites functionality.</p>
            <p class="par-1">For more general information on cookies, please read <a
                    href="https://www.privacypolicyonline.com/what-are-cookies/">"What Are Cookies"</a>.</p>
        </section>
        <section id="how-we-use-cookies">
            <a href="<?= $_SERVER['REQUEST_URI'] ?>#how-we-use-cookies">
                <h5>How We Use Cookies.</h5>
            </a>
            <p class="par-1">We use cookies for a variety of reasons detailed below. Unfortunately in most cases
                there are no industry standard options for disabling cookies without completely disabling the
                functionality and features they add to this site. It is recommended that you leave on all cookies if
                you are not sure whether you need them or not in case they are used to provide a service that you
                use.</p>
        </section>
        <section id="disabling-cookies">
            <a href="<?= $_SERVER['REQUEST_URI'] ?>#disabling-cookies">
                <h5>Disabling Cookies</h5>
            </a>
            <p class="par-1">You can prevent the setting of cookies by adjusting the settings on your browser (see
                your browser Help for how to do this). Be aware that disabling cookies will affect the functionality
                of this and many other websites that you visit. Disabling cookies will usually result in also
                disabling certain functionality and features of the this site. Therefore it is recommended that you
                do not disable cookies.</p>
        </section>
        <section id="the-cookies-we-set">
            <a href="<?= $_SERVER['REQUEST_URI'] ?>#the-cookies-we-set">
                <h5>The Cookies We Set.</h5>
            </a>
            <ul>
                <li class="par-1">Site preferences cookies</li>
            </ul>
            <p class="par-1">In order to provide you with a great experience on this site we provide the
                functionality to set your preferences for how this site runs when you use it. In order to remember
                your preferences we need to set cookies so that this information can be called whenever you interact
                with a page is affected by your preferences.</p>
        </section>
        <section id="third-party-cookies">
            <a href="<?= $_SERVER['REQUEST_URI'] ?>#third-party-cookies">
                <h5>Third Party Cookies.</h5>
            </a>
            <p class="par-1">In some special cases we also use cookies provided by trusted third parties. The
                following section details which third party cookies you might encounter through this site.</p>
            <ul>
                <li class="par-1">Several partners advertise on our behalf and affiliate tracking cookies simply
                    allow us to see if our customers have come to the site through one of our partner sites so that
                    we can credit them appropriately and where applicable allow our affiliate partners to provide
                    any bonus that they may provide you for making a purchase.
                </li>
            </ul>
        </section>
        <section id="more-information">
            <a href="<?= $_SERVER['REQUEST_URI'] ?>#more-information">
                <h5>More Information.</h5>
            </a>
            <p class="par-1">Hopefully that has clarified things for you and as was previously mentioned if there is
                something that you aren't sure whether you need or not it's usually safer to leave cookies enabled
                in case it does interact with one of the features you use on our site.</p>
            <p class="par-1">However if you are still looking for more information then you can contact us through
                one of our preferred contact methods:</p>
            <ul>
                <li class="par-1">Email: <a href="mailto:<?= $website['email'] ?>"><?= $website['email'] ?></a></li>
            </ul>
        </section>
    </div>
    <?php
    echo Component::component('sections/digest-form');
    echo Component::component('bottom-footer');
    ?>
</div>