<?php
$this->load->view('layout/header');
?>

<?php
    $clients = ["1DerrickWilliams.jpg", "2PrinceAkim.jpg", "3RapperGotti.jpg", "5.jpg", "6.jpg", "31RapperGotti.jpg",
        "7.jpg", "8.jpg", "9.jpg",
        "10.jpg", "11.jpg", "12.jpg",
        "13.jpg", "14.jpg", "15.jpg",
        "16.jpg", "18.jpg", "19.jpg",
        "21.jpg", "22.jpg",  "31.jpg", 
        ];

   
    ?>
<!--banner-->
<div class="banner1" style='background: url("<?php echo base_url(); ?>assets/theme/images/clients.jpg") ;background-size: cover;'>
    <div class="container" >
        <h3 style="color: black"><a href="/" style="color: black">Home</a> / <span style="color: black">Our Clients</span></h3>
    </div>
</div>
<!--banner-->
<!--content-->
<div class="content">
    <!--contact-->
    <!--clients area-->
    <div class="latest-w3">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/theme/GridGallery/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/theme/GridGallery/css/component.css" />

        <script src="<?php echo base_url(); ?>assets/theme/GridGallery/js/modernizr.custom.js"></script>
    
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
    <!--contact-->
</div>
<!--content-->

<?php
$this->load->view('layout/footer');
?>