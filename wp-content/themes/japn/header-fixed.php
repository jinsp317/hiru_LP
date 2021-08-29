<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Japn
 */

?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri() ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri() ?>/css/fonts.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri() ?>/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri() ?>/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri() ?>/css/owl.theme.default.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri() ?>/css/stylesheet.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri() ?>/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body <?php body_class(); ?>>
    <div class="wrapper inner-page">
        <!-- HEADER_START -->
        <header id="header" class="header-hp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-in-hp mt-0">
                        <div class="logo-hp">
                            <a href="<?php echo get_site_url(); ?>">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png" alt="" />
                            </a>
                        </div>                        
                        <div class="mobile-menu-icon-hp">
                            <div class="menu-toggle-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="overlay-mobile-menu-hp"></div>
        <div class="clearfix"></div>
        <!-- HEADER_END -->
        