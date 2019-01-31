<?php
$this->load->view('layout/header');
?>

<!-- start hero slider -->
<div class="hero-slider heroflex flexslider" data-autoplay="yes" data-pagination="yes" data-arrows="no" data-style="slide" data-pause="no" data-speed="3000">
    <ul class="slides">
        <li style="background: url('<?php echo base_url(); ?>assets/theme/images/1.jpg');height: 600px;" >
            <!-- start hero caption -->
            <div class="hero-caption-area">
                <div class="container">
                    <a href="" title="Shop Now" class="btn btn-secondary">Shop Now</a>
                    <h1>Rahman <span>Fashions</span></h1>
                    <p>BESPOKE OR MADE TO MEASURE SUITS & FORMAL WEARS</p>
                </div>
            </div>
            <!-- end hero caption -->
        </li>
        <li style="background: url('<?php echo base_url(); ?>assets/theme/images/2.jpg');height: 600px;">
            <!-- start hero caption -->
            <div class="hero-caption-area">
                <div class="container">
                    <a href="" title="Shop Now" class="btn btn-secondary">Shop Now</a>
                    <h1><span>HONGKONG'S</span> LEADING BESPOKE <span>TAILOR</span></h1>
                    <p>BESPOKE OR MADE TO MEASURE SUITS & FORMAL WEARS</p>
                </div>
            </div>
            <!-- end hero caption -->
        </li>
        <li style="background: url('<?php echo base_url(); ?>assets/theme/images/3.jpg');height: 600px;">
            <!-- start hero caption -->
            <div class="hero-caption-area">
                <div class="container">
                    <a href="" title="Shop Now" class="btn btn-secondary">Shop Now</a>
                    <h1>ORDER TO MADE!</h1>
                    <p>HAND MADE AND HAND CUT</p>
                </div>
            </div>
            <!-- end hero caption -->
        </li>
    </ul>
</div>
<!-- end hero slider -->


<div class="row" style="    background: #ececec;">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <!-- start class media -->
        <div class="class-media" style="    margin-bottom: 0px;">
            <img src="<?php echo base_url(); ?>assets/theme/images/style1.jpg" alt="">
        </div>
        <!-- end class media -->
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
        <!-- start class info -->
        <div class="class-info">
            <div class="spacer-40"></div>
            <h2  style="width: 100%"><strong>All</strong> about Fashions
            </h2>
            <div class="spacer-20"></div>
            <p>
                Our suits and shirts are carefully made by our skilled tailors. They create a unique pattern based on your measurements and chalk it directly upon the fabric of your choice.
            </p>
            <div class="spacer-40"></div>
            <div class="">
                <div class="">
                    <h5>
                        <span class="tab-number">01</span>
                        <span class="tab-items-content">
                            <strong>Made To Measure</strong>

                        </span>

                        <br/>
                        <span class="tab-number">02</span>
                        <span class="tab-items-content">
                            <strong>Professional Shanghainese Workmanship</strong>

                        </span>
                        <br/>


                        <span class="tab-number">03</span>
                        <span class="tab-items-content">
                            <strong>Made In Hong Kong</strong>

                        </span>
                    </h5>

                </div>
            </div>
            <div class="spacer-40"></div>
            <a href="<?php echo site_url("Shop/aboutus"); ?>" title="Read More" class="btn btn-secondary">Read More</a>
        </div>
        <!-- end class info -->
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <!-- start class media -->
        <div class="class-media" style="    margin-top: 70px;">
            <img src="<?php echo base_url(); ?>assets/theme/images/shirt-stack4.jpg" alt="">
        </div>
        <!-- end class media -->
    </div>
</div>


<div class="padding-tb-100" style="background: url(<?php echo base_url(); ?>assets/theme/images/mapback.png);    background-size: contain;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-1 col-md-1 col-sm-12">
                <i class="fa fa-globe" style="font-size: 90px;    color: #ec1f3f;"></i>
            </div>
            <div class="col-lg-7 col-md-8 col-sm-12">
                <h4 class="text-uppercase text-color-primary">SCHEDULE AN APPOINTMENT 
                    WITH US TODAY</h4>
                <div class="spacer-10"></div>
                <p style="color:black">Your can book appointment to see our Chief Tailor (<b>Mr. Micheal</b>)</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="spacer-20 visible-sm"></div>
                <a href="<?php echo site_url('Shop/appointment');?>" title="Email us now" class="btn btn-secondary pull-right">Make an Appointment</a>
            </div>
        </div>
    </div>
</div>
<!-- start main container -->
<div class="content main-container" id="site-content" style="">




    <div class="bg-gray-100 bg-image padding-tb-30" style="background-image: url(<?php echo base_url(); ?>assets/theme/images/suitpng.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12" style="    margin-top: 30px;">
                    <h2 style="color: white;">What We Do</h2>
                    <div class="spacer-25"></div>
                    <p style="color: white;">
                        With our unique suit customizer, you can easily create a suit that perfectly matches your personality. Tailored to your individual measurements, we dare to guarantee a perfect fit - every time.          
                        Trust us to deliver your new suit, our experienced tailors will stop at nothing to give you:

                    </p>
                    <div class="spacer-35"></div>
                    <a href="#" title="Read More" class="btn btn-secondary">Read More</a>
                    <div class="spacer-30"></div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-12"></div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="color: white;">
                    <div class="icon-box clearfix">
                        <div class="ibox"><i class="fa fa-paint-brush"></i></div>
                        <div class="ibox-content">
                            <strong>Create Own Style</strong>

                            <p>Choose any fabric and create own style.</p>


                        </div>
                    </div>
                    <div class="icon-box clearfix">
                        <div class="ibox"><i class="fa fa-list-ol"></i></div>
                        <div class="ibox-content">
                            <strong>Get Size</strong>
                            <p>
                                Let Size and calculate your measurement.                           
                            </p>
                        </div>
                    </div>
                    <div class="icon-box clearfix">
                        <div class="ibox"><i class="fa fa-cut"></i></div>
                        <div class="ibox-content">
                            <strong>Cut to Create</strong>
                            <p>
                                Our experienced shanghainese tailor cut and make your new dress.
                            </p>
                        </div>
                    </div>

                    <div class="icon-box clearfix">
                        <div class="ibox"><i class="fa fa-truck"></i></div>
                        <div class="ibox-content">
                            <strong>Delivery</strong>
                            <p>
                                Delivery with guaranteed best fit.

                            </p>
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>




    <div class="padding-tb-30 text-center">
        <div class="container">
            <h2>What <br> our client’s say</h2>
            <div class="thumb-slider2 flexslider">
                <ul class="slides">
                    <li>
                        <!-- start testimonial -->
                        <div class="testimonial testimonial-style4">
                            <blockquote>
                                <p style='    padding: 0px 60px;'>I have been a very pleased customer for three years. The owner Michael gives very personalized service in helping selecting fabrics and meeting scheduling needs.
                                    Please go see Michael! I’m sure you will find him to meet your tailoring needs in Hong Kong</p>
                            </blockquote>
                        </div>
                        <!-- end testimonial -->
                    </li>
                    <li>
                        <!-- start testimonial -->
                        <div class="testimonial testimonial-style4">
                            <blockquote>
                                <p style='    padding: 0px 60px;'>
                                    Was in HK for about a week and stumbled into this shop after exploring quite a few others in the neighborhood.  The service was excellent, and the staff was very friendly and helpful.                                        </p>
                            </blockquote>
                        </div>
                        <!-- end testimonial -->
                    </li>
                    <li>
                        <!-- start testimonial -->
                        <div class="testimonial testimonial-style4">
                            <blockquote>
                                <p style='    padding: 0px 60px;'>
                                    I came into Hong Kong and only had a couple of days in the city and I came upon Rahman fashions in the city and I am very impressed.                                         </p>
                            </blockquote>
                        </div>
                        <!-- end testimonial -->
                    </li>
                </ul>
            </div>
            <div class="testimonial-author thumb-carousel2 flexslider" style="    margin: 0 0 20px;">
                <ul class="slides">
                    <li class="testimonial">
                        <a href="#">

                            <cite>
                                <strong>Ric Young</strong>
                                <span>Google Review</span>
                            </cite>
                        </a>
                    </li>
                    <li class="testimonial">
                        <a href="#">

                            <cite>
                                <strong>Avraham Feingold</strong>
                                <span>Google Review</span>
                            </cite>
                        </a>
                    </li>
                    <li class="testimonial">
                        <a href="#">

                            <cite>
                                <strong>Naftali Gross</strong>
                                <span>Google Review</span>
                            </cite>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="spacer-10 hidden-sm"></div>

</div>
<!-- end main container -->
<?php
$this->load->view('layout/footer');
?>