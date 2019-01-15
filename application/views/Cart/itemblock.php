<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <?php
                if ($vtype == 'items') {
                    ?>
                <!--cart block-->
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span class="fa-stack">
                            <i class="fa fa-shopping-cart fa-stack-1x"></i>
                            <i class="ion-bag fa-stack-1x "></i>
                        </span>   My Shopping Bag
                        <span style="float: right; line-height: 29px;" class="ng-binding">Total: {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}} (<small style="color: #000" class="ng-binding">{{globleCartData.total_quantity}}</small>)</span> 
                    </a>
                    <?php
                }
                ?>
                
                
                <?php
                if ($vtype == 'size') {
                    ?>
                <!--shipping block-->
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                         <span class="fa-stack">
                                    <i class="fa fa-list-ol fa-stack-1x"></i>
                                    <i class="ion-bag fa-stack-1x "></i>
                                </span>   Your Size
                        <span style="float: right; line-height: 29px;font-size: 12px;font-weight: 300" class="ng-binding">
                            <?php echo $measurement_style_type;?>
                        </span> 
                    </a>
                    <?php
                }
                ?>
                
                
                <?php
                if ($vtype == 'shipping') {
                    ?>
                <!--shipping block-->
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span class="fa-stack">
                            <i class="fa fa-map-marker fa-stack-1x"></i>
                            <i class="ion-bag fa-stack-1x "></i>
                        </span>   Shipping Address
                        <span style="float: right; line-height: 29px;font-size: 12px;font-weight: 300" class="ng-binding">
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
                    </a>
                    <?php
                }
                ?>
                
                <?php
                if ($vtype == 'payment') {
                    ?>
                <!--shipping block-->
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span class="fa-stack">
                            <i class="fa fa-money fa-stack-1x"></i>
                            <i class="ion-bag fa-stack-1x "></i>
                        </span>  Payment Method
                        <span style="float: right; line-height: 29px;font-size: 12px;font-weight: 300" class="ng-binding">
                            PayPal
                        </span> 
                    </a>
                    <?php
                }
                ?>
                
                
                
            </h4>
        </div>
    </div>
</div>