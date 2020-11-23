<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="<?php  echo get_template_directory_uri(); ?>/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/reset.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/icomoon/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css">
<!--    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,500,700&display=swap" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP:400,500,700&display=swap" rel="stylesheet">
    <?php wp_head()?>
</head>

<body itemschope="itemscope" itemtype="http://schema.org/WebPage">
    <header itemscope="itemscope" itemtype="http://schema.org/WPHeader">
        <div class="header-wrap">
            <div class="header-wrap-inner">
            <div class="header-top">
                <?php if ( is_single() or is_page() ) { // シングルページの場合 ?>
                <a id="logo" href="<?php bloginfo('url');?>">Magnific Japan</a><?php } else { // シングルページ以外の場合 ?> <h1 class="log" itemprop="name"> <a id="logo" href="<?php bloginfo('url');?>" itemprop="url" href="<?php bloginfo('url');?>">Magnific Japan</a> </h1><?php } ?>
                </div>
                
                <div class="nav-trigger">
                    <ul class="nav-border is-sp">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <nav>
                    <ul itemscope="itemscope" itemtype="http://scheme.org/SiteNavigationElement">
                        <a href="/tag/mysterious-place" itemprop="url"><li itemprop="name"><nobr>Mysterious Place</nobr></li></a>
                        <a href="/category/trip" itemprop="url"><li itemprop="name">Trip</li></a>
                        <a href="/category/folklore" itemprop="url"><li itemprop="name">Folklore</li></a>
                        <a href="/contact" itemprop="url"><li itemprop="name">contact</li></a>
                    </ul>
                </nav>
            </div>
        </div>
    </header>