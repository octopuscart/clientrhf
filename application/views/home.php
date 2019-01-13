<?php
$this->load->view('layout/header');
?>

<script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    nav: true,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>

<!--slider part-->
<div class="banner-w3">
    <div class="demo-1">            
        <div id="example1" class="core-slider core-slider__carousel example_1">
            <div class="core-slider_viewport">
                <div class="core-slider_list">
                    <div class="core-slider_item">
                        <img src="<?php echo base_url(); ?>assets/theme/slider/4.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="core-slider_item">
                        <img src="<?php echo base_url(); ?>assets/theme/slider/2.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="core-slider_item">
                        <img src="<?php echo base_url(); ?>assets/theme/slider/3.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="core-slider_item">
                        <img src="<?php echo base_url(); ?>assets/theme/slider/5.jpg" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
            <div class="core-slider_nav">
                <div class="core-slider_arrow core-slider_arrow__right"></div>
                <div class="core-slider_arrow core-slider_arrow__left"></div>
            </div>
            <div class="core-slider_control-nav"></div>
        </div>
    </div>
    <link href="<?php echo base_url(); ?>assets/theme/css/coreSlider.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url(); ?>assets/theme/js/coreSlider.js"></script>
    <script>
        $('#example1').coreSlider({
            pauseOnHover: false,
            interval: 3000,
            controlNavEnabled: true
        });</script>

</div>	
<!--end of slider part-->



<!--content-->
<div class="content">


    <!--custome block-->
    <div class="latest-w3">
        <div class="container">
            <h3 class="tittle1">Customize Now</h3>
            <div class="latest-grids">
                <div class="col-md-3 latest-grid">
                    <div class="latest-top">
                        <img  src="<?php echo base_url(); ?>assets/theme/images/suitb.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Suits</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4 style="    font-size: 12px;">From<br/> HK$ 1700.00</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 latest-grid">
                    <div class="latest-top">
                        <img  src="<?php echo base_url(); ?>assets/theme/images/shirts.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Shirt</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4 style="    font-size: 12px;">From<br/> HK$ 220.00</h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 latest-grid">
                    <div class="latest-top">
                        <img  src="<?php echo base_url(); ?>assets/theme/images/suita.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Jacket</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4 style="    font-size: 12px;">From<br/> HK$ 1200.00</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 latest-grid">
                    <div class="latest-top">
                        <img  src="<?php echo base_url(); ?>assets/theme/images/pant.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Pant</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4 style="    font-size: 12px;">From<br/> HK$ 500.00</h4>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    <!--end of custom block-->
    <hr/>



    <!--new-arrivals-->
    <div class="new-arrivals-w3agile">
        <div class="container">
            <h2 class="tittle">New Arrivals in Shirts</h2>
            <div class="arrivals-grids">
                <?php
                foreach ($product_home_slider_bottom['home_slider'] as $key => $value) {
                    ?>
                    <div class="col-md-3 cap-left simpleCart_shelfItem">
                        <div class="grid-arr">
                            <div  class="grid-arrival">
                                <figure>		
                                    <a href="#">
                                        <div class="grid-img">
                                            <img  src="<?php echo custome_image_server . "/coman/output/"; ?><?php echo $value['folder']; ?>/cutting20001.png" class="img-responsive" alt="" style="height: 245px;">
                                        </div>

                                    </a>		
                                </figure>	
                            </div>

                            <div class="women">
                                <h6><a href=""><?php echo $value['title']; ?> </a></h6>
                                <span class="size"><?php echo $value['short_description']; ?> </span>
                                <p ><em class="item_price">{{<?php echo $shirtcustome->price; ?>|currency:"<?php echo globle_currency; ?> "}}</em></p>
                                <a href="<?php echo site_url("Product/customizationRedirect/" . $shirtcustome->id) ?>/<?php echo $value['id']; ?>" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--new-arrivals-->
    <hr/>

    <!--accessories-->
    <div class="accessories-w3l">
        <div class="container">
            <h3 class="tittle">ORIGINAL ITALIAN FABRICS</h3>
            <span style="font-size: 35px;">The best men's suits are tailored from the best cloth.</span>
            <div class="button">
                <a href="#" class="button1"> Shop Now</a>
                <a href="#" class="button1"> Quick View</a>
            </div>
        </div>
    </div>
    <!--accessories-->


    <!--Products-->
    <!--Products-->
    <div class="product-agile">
        <div class="container">
            <h3 class="tittle1"> New Fabrics In Suits</h3>
            <div class="slider">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider">
                        <li>	 
                            <div class="caption">
                                <?php
                                foreach ($product_home_slider_bottom['home_bottom'] as $key => $value) {
                                    ?>
                                    <div class="col-md-3 cap-left simpleCart_shelfItem">
                                        <div class="grid-arr">
                                            <div  class="grid-arrival">
                                                <figure>		
                                                    <a href="#">
                                                        <div class="grid-img">
                                                            <img  src="<?php echo custome_image_server . "/coman/output/"; ?><?php echo $value['folder']; ?>/cutting20001.png" class="img-responsive" alt="">
                                                        </div>

                                                    </a>		
                                                </figure>	
                                            </div>

                                            <div class="women">
                                                <h6><a href=""><?php echo $value['title']; ?> </a></h6>
                                                <span class="size"><?php echo $value['short_description']; ?> </span>
                                                <p ><em class="item_price">{{<?php echo $suitcustome->price; ?>|currency:"<?php echo globle_currency; ?> "}}</em></p>
                                                <a href="<?php echo site_url("Product/customizationRedirect/" . $suitcustome->id) ?>/<?php echo $value['id']; ?>" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="clearfix"></div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php
    $clients = ["1DerrickWilliams.jpg", "2PrinceAkim.jpg", "3RapperGotti.jpg", "5.jpg", "6.jpg", "7.jpg", "14.jpg", "17.jpg"];

    $clientsa = ["a.jpg", "b.jpg", "c.jpg", "d.jpg"];
    ?>
</div>
<!--content-->
<hr/>

<!--clients area-->
<div class="latest-w3">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/theme/GridGallery/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/theme/GridGallery/css/component.css" />

    <script src="<?php echo base_url(); ?>assets/theme/GridGallery/js/modernizr.custom.js"></script>
    <h3 class="tittle1"> Our Clients</h3>
    <div id="grid-gallery" class="grid-gallery" style="    margin-top: 2em;">
        <section class="grid-wrap">
            <ul class="grid">
                <li class="grid-sizer"></li><!-- for Masonry column width -->

                <?php foreach ($clients as $key => $value) {
                    ?>
                    <li>
                        <div class="panel panel-default" style="border:none;margin: 0px">
                            <div class="panel-body" style="    padding: 5px;">
                                <div class="thumbnail" style="border:none; padding: 0px;   margin-bottom: 0px;">
                                    <img src="<?php echo base_url(); ?>assets/theme/clients/<?php echo $value; ?>" alt="img01" style=""/>

                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>


            </ul>
            <div style="clear:both"></div>
        </section><!-- // grid-wrap -->
        <section class="slideshow" >
            <ul>

                <?php foreach ($clients as $key => $value) {
                    ?>
                    <li>
                        <div class="panel panel-default" style="background: none;border:none;">
                            <div class="panel-body" style="">
                                <div class="thumbnail" style="background: none;border:none">
                                    <img src="<?php echo base_url(); ?>assets/theme/clients/<?php echo $value; ?>" alt="img01"  style="    height: 600px;
                                         margin-top: -40px;"/>

                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>

            </ul>

            <nav>
                <span class="icon nav-prev"></span>
                <span class="icon nav-next"></span>
                <span class="icon nav-close"></span>
            </nav>

        </section><!-- // slideshow -->
    </div><!-- // grid-gallery -->


    <!-- // grid-gallery -->
    <script src="<?php echo base_url(); ?>assets/theme/GridGallery/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/GridGallery/js/masonry.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/GridGallery/js/classie.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/GridGallery/js/cbpGridGallery.js"></script>
    <script>
        new CBPGridGallery(document.getElementById('grid-gallery'));
    </script>
</div>
<!--end of client area-->
<?php
$this->load->view('layout/footer');
?>