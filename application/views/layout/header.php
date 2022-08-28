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

        <!--theme assets-->

        <link href="<?php echo base_url(); ?>assets/theme/css/style.css" rel="stylesheet" type="text/css"> <!-- Template Stylesheet -->
        <link href="<?php echo base_url(); ?>assets/theme/css/elements-style.css" rel="stylesheet" type="text/css"> <!-- Element Stylesheet -->
        <link href="<?php echo base_url(); ?>assets/theme/css/font-awesome.css" rel="stylesheet" type="text/css"> 
        <link href="<?php echo base_url(); ?>assets/theme/vendor/flexslider/css/flexslider.css" rel="stylesheet" type="text/css"> <!-- FlexSlider Stylesheet -->
        <link href="<?php echo base_url(); ?>assets/theme/vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css"> <!-- Owl Carousel Stylesheet -->
        <link href="<?php echo base_url(); ?>assets/theme/vendor/owl-carousel/css/owl.template.css" rel="stylesheet" type="text/css"> <!-- Owl Carousel Template Stylesheet -->
        <link href="<?php echo base_url(); ?>assets/theme/vendor/magnific/magnific-popup.css" rel="stylesheet" type="text/css"> <!-- Magnific Popup Template Stylesheet -->
        <script src="<?php echo base_url(); ?>assets/theme/js/modernizr.js"></script> <!-- Modernizr Library -->
        <link href="https://fonts.googleapis.com/css?family=Sintony" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet"> 
        <!--end of theme assets-->


        <link href="<?php echo base_url(); ?>assets/theme/css/customstyle.css" rel="stylesheet" type="text/css" media="all" />
        <!--custom css style-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/custom_style.css">

        <!--sweet alert-->
        <script src="<?php echo base_url(); ?>assets/theme/sweetalert2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/sweetalert2/sweetalert2.min.css">

        <!--angular js-->
        <script src="<?php echo base_url(); ?>assets/theme/angular/angular.min.js"></script>


        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/noslider/nouislider.min.css">
        <script src="<?php echo base_url(); ?>assets/theme/noslider/nouislider.min.js" type="text/javascript"></script>

<!--        <link href="<?php echo base_url(); ?>assets/theme/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>-->


        <script src="<?php echo base_url(); ?>assets/theme/js/jquery-2.1.0.min.js"></script> <!-- jQuery Library Import -->



    </head>

    <body ng-app="App" ng-controller="ShopController">
        <div >
            <script>
                var App = angular.module('App', []).config(function ($interpolateProvider, $httpProvider) {
                //$interpolateProvider.startSymbol('{$');
                //$interpolateProvider.endSymbol('$}');
                $httpProvider.defaults.headers.common = {};
                $httpProvider.defaults.headers.post = {};
                });
                var baseurl = "<?php echo base_url(); ?>index.php/";
                var adminurl = "<?php echo ADMINURL ?>index.php/";
                var imageurlg = "<?php echo imageserver; ?>";
                var globlecurrency = "<?php echo globle_currency; ?>";
                var avaiblecredits = 0;</script>
            <!-- start site header -->
            <header class="site-header" style>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <!-- start logo -->
                            <div class="site-logo">
                                <a href="<?php echo site_url(); ?>" title="Lagom Fitnness">
                                    <img src="<?php echo base_url() . 'assets/images/logo73.png'; ?>" alt="logo" class="default-logo">
                                    <img src="<?php echo base_url() . 'assets/images/logo73.png'; ?>" alt="logo" class="default-retina-logo">
                                </a>
                            </div>
                            <!-- end logo -->
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-12">
                            <!-- start main navigation -->
                            <nav class="main-navigation">
                                <ul class="sf-menu">
                                    <li class="active"><a href="<?php echo site_url(); ?>" title="Home">Home</a></li>
                                    <li><a href="<?php echo site_url('Shop/aboutus'); ?>" title="About Us">About Us</a></li>
                                    <li><a href="#" title="Gallery">Design Now</a>
                                        <ul>
                                            <li><a href="<?php echo site_url('Product/ProductList/1/0') ?>">Shirts</a></li>
                                            <li><a href="<?php echo site_url('Product/ProductList/2/0') ?>">Suits</a></li>
                                            <li><a href="<?php echo site_url('Product/ProductList/4/0') ?>">Jackets</a></li>
                                            <li><a href="<?php echo site_url('Product/ProductList/3/0') ?>">Pants</a></li>
                                            <li><a href="<?php echo site_url('Product/ProductList/5/0') ?>">Tuxedo Suits</a></li>


                                        </ul>
                                    </li>
                                    <li><a href="<?php echo site_url("offers"); ?>">Offers</a></li>

                                    <li><a href="<?php echo site_url("appointment"); ?>">Schedule</a></li>

                                    <li><a href="<?php echo site_url("Shop/lookbook"); ?>" title="Trainers">Look Book</a></li>

                                    <li><a href="<?php echo site_url("Shop/measurements_guide"); ?>" title="Trainers">Measurement</a></li>


                                    <li><a href="<?php echo site_url('Shop/contactus'); ?>" title="Contact">contact</a></li>

                                    <!--<li><a href="<?php echo site_url('Cart/details'); ?>" title="Contact"><i class="fa fa-cart-plus"></i> Cart  {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}} ({{globleCartData.total_quantity}})<br/></a></li>-->
                                    <li class="dropdown"> 
                                        <a href="<?php echo site_url('Cart/details'); ?>" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-cart-plus"></i> ({{globleCartData.total_quantity}})
                                        </a>
                                        <ul class="dropdown-menu miniicartdropdown" ng-if="globleCartData.sub_total_price > 0">
                                            <li ng-repeat="product in globleCartData.products">
                                                <p>{{product.title}} - {{product.item_name}}</p>
                                                <p>{{product.total_price|currency:" "}}</p>
                                            </li>

                                            <li class="totalli">Total: {{globleCartData.sub_total_price|currency:"<?php echo globle_currency; ?> "}}</li>
                                            <li><a href="<?php echo site_url('Cart/details'); ?>" class="btn btn-warning" title="Cart"><i class="fa fa-cart-plus"></i> View Cart  </a></li>
                                        </ul>
                                        <ul class="dropdown-menu miniicartdropdown" ng-if="!globleCartData.sub_total_price">
                                            <li >
                                                No product in cart.
                                            </li>
                                        </ul>
                                    </li>

                                    <?php
                                    $session_data = $this->session->userdata('logged_in');
                                    if ($session_data) {
                                        ?>
                                        <li class="dropdown"> <a href="<?php echo site_url("Account/profile"); ?>" class="dropdown-toggle" data-toggle="dropdown">Hi, <?php echo $session_data['first_name'] ? $session_data['first_name'] : 'User'; ?>! </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo site_url("Account/profile"); ?>">Profile</a></li>
                                                <li><a href="<?php echo site_url("Account/orderList"); ?>">My Order</a></li>
                                                <li><a href="<?php echo site_url("Account/wishlist"); ?>">My Wishlist</a></li>
                                                <li><a href="<?php echo site_url("Account/logout"); ?>">Logout</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li> <a href="<?php echo site_url("Account/login"); ?>" >Sign In / Sign Up </a>
                                        </li>

                                        <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <a href="javascript:;" id="menu-toggle" title="Menu"></a>
                            <!-- end main navigation -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- end site header -->


