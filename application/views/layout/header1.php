<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <?php
        meta_tags();
        ?>
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/logof.png'; ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url() . 'assets/images/logof.png'; ?>" type="image/x-icon">

        <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/logof.png'; ?>"/>
        <link rel="apple-touch-icon image_src" href="<?php echo base_url() . 'assets/images/logof.png'; ?>"/>


        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link href="<?php echo base_url(); ?>assets/theme/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="<?php echo base_url(); ?>assets/theme/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/theme/css/jquery-ui.css">

        <link href="<?php echo base_url(); ?>assets/theme/css/font-awesome.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/theme/css/customstyle.css" rel="stylesheet" type="text/css" media="all" />

        <!--custom css style-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/custom_style.css">


      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script charset="UTF8" src="<?php echo base_url(); ?>assets/theme/js/jquery.min.js"></script>
        <link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
        <!--search jQuery-->
        <script src="<?php echo base_url(); ?>assets/theme/js/main.js"></script>
        <!--search jQuery-->
        <script src="<?php echo base_url(); ?>assets/theme/js/responsiveslides.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-beta.2/lazyload.js"></script>
        
          <!--sweet alert-->
        <script src="<?php echo base_url(); ?>assets/theme/sweetalert2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/sweetalert2/sweetalert2.min.css">

        <!--angular js-->
        <script src="<?php echo base_url(); ?>assets/theme/angular/angular.min.js"></script>
        
        <!--mycart-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/theme/js/bootstrap-3.1.1.min.js"></script>
        <!-- cart -->
        <script src="<?php echo base_url(); ?>assets/theme/js/simpleCart.min.js"></script>
        <!-- cart -->
        <!--start-rate-->
        <script src="<?php echo base_url(); ?>assets/theme/js/jstarbox.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
       
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/noslider/nouislider.min.css">
        <script src="<?php echo base_url(); ?>assets/theme/noslider/nouislider.min.js" type="text/javascript"></script>


        
        
        <script type="text/javascript">
            jQuery(function () {
                jQuery('.starbox').each(function () {
                    var starbox = jQuery(this);
                    starbox.starbox({
                        average: starbox.attr('data-start-value'),
                        changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                        ghosting: starbox.hasClass('ghosting'),
                        autoUpdateAverage: starbox.hasClass('autoupdate'),
                        buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                        stars: starbox.attr('data-star-count') || 5
                    }).bind('starbox-value-changed', function (event, value) {
                        if (starbox.hasClass('random')) {
                            var val = Math.random();
                            starbox.next().text(' ' + val);
                            return val;
                        }
                    })
                });
            });
        </script>
        <!--//End-rate-->



    </head>

    <body ng-app="App">
        <div ng-controller="ShopController">
            <script>
                var App = angular.module('App', []).config(function ($interpolateProvider, $httpProvider) {
                //$interpolateProvider.startSymbol('{$');
                //$interpolateProvider.endSymbol('$}');
                $httpProvider.defaults.headers.common = {};
                        $httpProvider.defaults.headers.post = {};
                });
                        var baseurl = "<?php echo base_url(); ?>index.php/";
                        var imageurlg = "<?php echo imageserver; ?>";
                        var globlecurrency = "<?php echo globle_currency;?>";
                        var avaiblecredits = 0;</script>
            <!--header-->
            <div class="header">
                <div class="header-top">
                    <div class="container">
                        <div class="top-left">
                            <a href="#">   <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +(852) 6626 4429</a>

                            <a href="#" style="margin-left: 10px;"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> john@perfectfashion.com.hk</a>
                        </div>
                        <div class="top-right">
                            <ul>
                                <li><a href="https://www.facebook.com/Johns-Perfect-Fashion-1886520941596824/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="heder-bottom">
                    <div class="container">
                        <div class="logo-nav">
                            <div class="logo-nav-left">
                                <h1><a href="/">
                                        <img src="<?php echo base_url(); ?>/assets/images/logo1.png" style="    height: 80px;" class="centerimage">
                                    </a></h1>
                            </div>
                            <div class="logo-nav-left1">
                                <nav class="navbar navbar-default">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header nav_2">
                                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div> 
                                    <div class="collapse navbar-collapse mobile_menu" id="bs-megadropdown-tabs">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="/" class="act">Home</a></li>	
                                            <!-- Mega Menu -->
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop Now<b class="caret"></b></a>
                                                <ul class="dropdown-menu   singlemenu">
                                                    <li><a href="<?php echo site_url('Product/ProductList/1/0') ?>">Shirts</a></li>
                                                    <li><a href="<?php echo site_url('Product/ProductList/2/0') ?>">Suits</a></li>
                                                    <li><a href="<?php echo site_url('Product/ProductList/4/0') ?>">Jackets</a></li>
                                                    <li><a href="<?php echo site_url('Product/ProductList/3/0') ?>">Pants</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalogue <b class="caret"></b></a>
                                                <ul class="dropdown-menu   singlemenu">
                                                    <li><a href="<?php echo site_url('Product/ProductList/1/0') ?>">Shirts</a></li>
                                                    <li><a href="<?php echo site_url('Product/ProductList/2/0') ?>">Suits</a></li>
                                                    <li><a href="<?php echo site_url('Product/ProductList/4/0') ?>">Jackets</a></li>
                                                    <li><a href="<?php echo site_url('Product/ProductList/3/0') ?>">Pants</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo site_url('Shop/clients'); ?>">Our Clients </a></li>
                                            <li><a href="<?php echo site_url('Shop/contactus'); ?>">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>

                            <div class="header-right2">
                                <div class="cart box_1" style="    margin-top: 10px;">
                                    <a href="<?php echo site_url("Cart/details"); ?>">
                                        <h3> <div class="total">
                                                <span class="simpleCart_total1">{{globleCartData.total_price|currency:"<?php echo globle_currency;?> "}}</span> (<span  class="simpleCart_quantity1">{{globleCartData.total_quantity}}</span> items)</div>
                                            <img src="<?php echo base_url(); ?>assets/theme/images/bag.png" alt="" />
                                        </h3>
                                    </a>
                                    <!--<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>-->
                                    <div class="clearfix"> </div>
                                </div>	
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header-->
