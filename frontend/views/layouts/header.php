<?php

use yii\helpers\Html; ?>


<header class="page-header header-basic" id="page-header">
	<div class="header-search-box">
		<div class="close-search"></div>
		<form class="nav-search search-form" role="search" method="get" action="#">
			<div class="search-wrapper">
				<label class="search-lbl">Search for:</label>
				<input class="search-input" type="search" placeholder="Search..." name="searchInput" autofocus="autofocus"/>
				<button class="search-btn" type="submit"><i class="bi bi-search icon"></i></button>
			</div>
		</form>
	</div>
	<div class="container">
		<nav class="menu-navbar">
			<div class="header-logo"><a class="logo-link" href="/"><img class="logo-img light-logo" loading="lazy" src="/image/climnew.png" alt="logo"/><img class="logo-img  dark-logo" loading="lazy" src="image/climnew.png" alt="logo"/></a></div>
			<div class="links menu-wrapper ">
				<ul class="list-js links-list">
					<li class="menu-item has-sub-menu"><a class="text-white active" href="/"><?= Yii::t('ui', 'О нас' )?> <i class="fas"> </i></a></li>
					<li class="menu-item"><a class="text-white" href="#">Товары </a></li>
					<li class="menu-item has-sub-menu"><a class="text-white" href="#">Наши работы<i class="fas"> </i></a></li>
					<li class="menu-item has-sub-menu"><a class="text-white" href="#">Отзывы <i class="fas "> </i></a></li>
					<li class="menu-item has-sub-menu"><a class="text-white" href="#">Контакты <i class="fas "> </i></a></li>
					<li class="menu-item has-sub-menu"><a class="text-white" href="#">Новости<i class="fas "> </i></a></li>
<!--					<li class="menu-item has-sub-menu"><a class="text-white" href="#"><i class="fas fa-phone"> </i> 998555825 / 87875416 </a></li>-->
                    <li class="menu-item has-sub-menu">
						<?php
						$languageItems = new cetver\LanguageSelector\items\MenuLanguageItems([
							'languages' => [
								'ru' => '<span style="color: #fff"><i class="fas fa-language"></i> / RU /</span> ',
								'uz' => '<span style="color: #fff">O`Z /</span> ',
							],
							'options' => ['encode' => false],
						]);

						echo \yii\widgets\Menu::widget([
							'options' => ['class' => 'd-flex gap-2 justify-content-between list-js links-list navbar-right'],
							'items' => $languageItems->toArray(),
						]);

						?>
                    </li>

                </ul>
			</div>
			<div class="controls-box">

				<!--Menu Toggler button-->
				<div class="control  menu-toggler"><span></span><span></span><span></span></div>
				<!--search Icon button-->
				<div class="control header-search-btn"><i class="bi bi-search icon"></i></div>
				<!--Dark/Light mode button-->
				<div class="mode-switcher ">
					<div class="switch-inner go-light " title="Switch To Light Mode "><i class="bi bi-sun icon "></i></div>
					<div class="switch-inner go-dark" title="Switch To Dark Mode "><i class="bi bi-moon icon "></i></div>
				</div>
				<!--mini shoping cart-->
			</div>
		</nav>
	</div>
</header>
<style>
    .navbar-nav
    {
        display: flex !important;
        justify-content: space-between;
    }
</style>
