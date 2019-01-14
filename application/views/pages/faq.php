<?php
$this->load->view('layout/header');
?>


<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="    background: url(<?php echo base_url(); ?>assets/images/shop2.jpg);
     background-size: cover;
     background-position: 459px -1031px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>FAQ's</h1>
                    <ul>
                        <li><a href="#">Home</a> /</li>
                        <li>FAQ's</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Contact Us Page Area Start Here -->
<!-- Single Blog Page Area Start Here -->
<div class="single-blog-page-area" style="padding: 50px 0 30px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="single-blog-details-content">
                    <?php
                    $temp = array("Will you keep a record of my order? " => "Yes, we will keep a record of your online order with all the details. In addition, we will keep your individual paper pattern. ",
                        "Once I complete the order online, how long does it take to deliver? " => "We will email your order confirmation within 24 hours with expected delivered date. We anticipate delivering all orders within 12-14 days of confirmation.",
                        "Can you ship my order internationally? " => "Yes, we can ship orders to anywhere in the world. Delivery times vary by region.",
                        "What is your return policy?" => "Upon inspection, if Bespoke Tailors made an error, we will then make arrangements to receive back the order and have it corrected or redone.",
                        "What if I made a mistake in my order, can I fix it? " => "Yes, send us an email immediately and we will rectify the error.",
                        "Do you ship the orders door-to-door?" => "Yes, we ship orders door-to-door via UPS, Fedex, DHL or EMS Speedpost",
                        "What if my order doesn’t fit to my satisfaction?" => "Please contact us and we will do everything possible to handle the case and make you happy with your purchase.",
                        "Can I send you a garment that fits perfectly to copy the measurements?" => "Yes, of course! That will help us to create perfect fit clothing for you.",
                        "What does ‘bespoke’ mean?" => "The word bespoke means made-to-order or custom-made. It is most known for its centuries-old relationship with tailor-made suits.",
                        "Are the buttons on jacket sleeves working or artificial?" => "We construct all jackets with working buttons."
                    );
                    ?>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <?php
                        $index = 1;
                        foreach ($temp as $x => $x_value) {
                            ?>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne<?php echo "accord_" . $index; ?>" style="    background: #fff;color: #000;">
                                    <h4 class="panel-title" >
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo "accord_" . $index; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo "accord_" . $index; ?>" style="font-size: 15px">
                                          Q:  <?php echo $x; ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne<?php echo "accord_" . $index; ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne<?php echo "accord_" . $index; ?>">
                                    <div class="panel-body">
                                      A:  <?php echo $x_value; ?>
                                    </div>
                                </div>
                            </div>


                            <?php
                            $index = $index + 1;
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Single Blog Page Area End Here -->
<!-- Contact Us Page Area End Here -->






<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>