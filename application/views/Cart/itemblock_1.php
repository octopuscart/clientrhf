<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel1 panel-default">
        <div class="panel-heading1" role="tab" id="headingOne">
            <h4 class="panel-title1">
                <?php
                if ($vtype == 'items') {
                    ?>

                    <h4 class=" r_corners wrapper m_bottom_23 bg_light_2  color_dark bg_gradient color_light">
                        <span class="fa-stack">
                            <i class="fa fa-shopping-cart fa-stack-1x"></i>
                        </span> My Shopping Bag
                        <span class="process_block">Total: {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}} ({{globleCartData.total_quantity}})</span> 
                    </h4>
                    <?php
                }
                ?>


                <?php
                if ($vtype == 'size') {
                    ?>
                    <!--shipping block-->



                    <h4 class=" r_corners wrapper m_bottom_23 bg_light_2  color_dark bg_gradient color_light">
                        <span class="fa-stack">
                            <i class="fa fa-list-ol fa-stack-1x"></i>
                            <i class="ion-bag fa-stack-1x "></i>
                        </span>  Your Size
                        <span  class="process_block">                           
                            <?php echo $measurement_style_type; ?></span> 

                    </h4>

                    <?php
                }
                ?>


                <?php
                if ($vtype == 'shipping') {
                    ?>
                    <!--shipping block-->
                    <h4 class=" r_corners wrapper m_bottom_23 bg_light_2  color_dark bg_gradient color_light">
                        <span class="fa-stack">
                            <i class="fa fa-map-marker fa-stack-1x"></i>
                            <i class="ion-bag fa-stack-1x "></i>
                        </span>   Shipping Address
                        <span  class="process_block">
                            <?php
                            if (count($user_address_details)) {
                                $value = $user_address_details[0];
                                ?>

                                <?php echo $value['address1']; ?>,
                                <?php echo $value['address2']; ?>,
                                <?php echo $value['city']; ?>, <?php echo $value['state']; ?> <?php echo $value['zipcode']; ?>
                                <?php
                            } else {
                                echo "Choose Shipping Address";
                            }
                            ?>
                        </span> 
                    </h4>
                    <?php
                }
                ?>

                <?php
                if ($vtype == 'payment') {
                    ?>
                    <!--shipping block-->
                    <h4 class=" r_corners wrapper m_bottom_23 bg_light_2  color_dark bg_gradient color_light">
                        <span class="fa-stack">
                            <i class="fa fa-money fa-stack-1x"></i>
                            <i class="ion-bag fa-stack-1x "></i>
                        </span>  Payment Method
                        <span class="process_block">
                            PayPal
                        </span> 
                    </h4>
                    <?php
                }
                ?>



            </h4>
        </div>
    </div>
</div>