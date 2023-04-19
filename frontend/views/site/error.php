<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section class=" err-404 d-flex align-items-center">
    <div class="overlay-photo-image-bg " data-bg-img="" data-bg-opacity=".35"></div>
    <div class="container">
        <div class="row">
            <div class="col-12   mx-auto">
                <!--Start of .hero-text-area-->
                <div class="err-text-area text-center  ">
                    <h1 class="err-title hollow-text wow   fadeInUp" data-wow-delay="0s">404 </h1>
                    <h2 class="err-subtitle wow  fadeInUp " data-wow-delay="0.2s">page Not found</h2>
                    <p class="err-text narrow-centerd-text wow  fadeInUp  " data-wow-delay="0.4s">
                        oops! the page you were asking for dosen't exist. try search our site for what you are looking for.

                    </p>
                </div>
            </div>
            <div class="col-12 col-md-10 col-lg-8 mx-auto">
                <form class="search-form wow  fadeInUp " action="#" data-wow-delay=".6s">
                    <button class="search-btn" type="submit"><i class="bi bi-search icon"></i></button>
                    <input class="search-input" type="search">
                </form>
            </div>
            <div class="col-12 col-md-10 col-lg-8 mx-auto text-center">
                <div class="cta-links-area wow  fadeInUp " data-wow-delay=".8s"><a class=" btn-solid cta-link " href="#0">back to home page</a></div>
            </div>
        </div>
        <!--End of .hero-text-area -->
    </div>
</section>
