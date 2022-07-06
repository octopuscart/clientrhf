<?php
$this->load->view('layout/header');
?>

<style>
    .cartbutton{
        width: 100%;
        padding: 6px;
        color: #fff!important;
    }


    .noti-check1 span{
        color: red;
        color: red;
        width: 111px;
        float: left;
        text-align: right;
        padding-right: 13px;
    }

    .noti-check1 h6{
        font-size: 15px;
        font-weight: 600;
    }

    .address_block{
        background: #fff;
        border: 3px solid #d30603;
        padding: 5px 10px;
        margin-bottom: 20px;
        height: 150px;


    }
    .checkcart {
        border-radius: 50%;
        position: absolute;
        top: -28px;
        left: -8px;
        padding: 4px;
        background: #fff;
        border: 2px solid green;
    }


    .default{
        border: 2px solid green;
    }

    .default{
        border: 2px solid green;
    }

    .checkcart i{
        color: green;
    }

    .address_button{
        padding: 0px 10px;
        margin-top: 15px;
        font-size: 10px;


    }

    .cartdetail_small {
        float: left;
        width: 203px;
    }

</style>






<div class="page-header" style="height: 160px">
    <div class="container">

        <h1 style="    color: black;
            margin-bottom: 30px;
            font-size: 30px;
            text-shadow: 0px 0px;">Checkout</h1>


    </div>
</div>
<!-- Inner Page Banner Area End Here -->

<!-- Content -->


<div class="cart-page-area">
    <div class="container" ng-if="globleCartData.total_quantity">
        <div class="row">
            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'items'));
            ?>
            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'size'));
            ?>
            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'shipping'));
            ?>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading active" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="fa-stack">
                                    <i class="fa fa-money fa-stack-1x"></i>
                                    <i class="ion-bag fa-stack-1x "></i>
                                </span>   Confirm Order Now
                                <span style="float: right; line-height: 29px;font-size: 12px;" class="ng-binding">
                                    
                                </span> 
                            </a>
                        </h4>
                    </div>
                    <!-- Address Details -->
                    <div class="panel-body">
                        <div class="order-sheet product-details2-area" style="margin-top: 5px;padding:0">
                                     <form action="#" method="post">
                                <div class="product-details-tab-area" style="margin: 0;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <?php
                                                if (PAYMENT_MODE_PAYPAL == 'on') {
                                                    ?>
                                                    <li class="<?php echo DEFAULT_PAYMENT_MODE == 'PayPal' ? 'active' : ''; ?>"><a href="#paypal" data-toggle="tab" aria-expanded="false" class="<?php echo DEFAULT_PAYMENT_MODE == 'PayPal' ? 'active' : ''; ?>">PayPal</a></li>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if (PAYMENT_MODE_BANK == 'on') {
                                                    ?>
                                                    <li class="<?php echo DEFAULT_PAYMENT_MODE == 'Bank Transfer' ? 'active' : ''; ?>" ><a href="#bank" data-toggle="tab" aria-expanded="true" class="<?php echo DEFAULT_PAYMENT_MODE == 'Bank Transfer' ? 'active' : ''; ?>">Bank Transfer</a></li>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if (PAYMENT_MODE_COD == 'on') {
                                                    ?>
                                                    <li class="<?php echo DEFAULT_PAYMENT_MODE == 'Cash On Delivery' ? 'active' : ''; ?>"><a href="#cash" data-toggle="tab" aria-expanded="false"  class="<?php echo DEFAULT_PAYMENT_MODE == 'Cash On Delivery' ? 'active' : ''; ?>">Cash On Delivery</a></li>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if (PAYMENT_MODE_CHEQUE == 'on') {
                                                    ?>
                                                    <li class="<?php echo DEFAULT_PAYMENT_MODE == 'Cheque On Delivery' ? 'active' : ''; ?>"><a href="#cheque" data-toggle="tab" aria-expanded="false" class="<?php echo DEFAULT_PAYMENT_MODE == 'Cheque On Delivery' ? 'active' : ''; ?>">Cheque On Delivery</a></li>
                                                    <?php
                                                }
                                                ?>


                                            </ul>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="tab-content">
                                                <?php
                                                if (PAYMENT_MODE_PAYPAL == 'on') {
                                                    ?>
                                                    <div class="tab-pane  <?php echo DEFAULT_PAYMENT_MODE == 'PayPal' ? 'active in' : ''; ?>"  id="paypal">
                                                        <p>
                                                            <img src="<?php echo base_url(); ?>assets/paymentstatus/paypal.png" style="height: 100px;">                
                                                        </p>
                                                        <div class="cart-page-top table-responsive">
                                                            <table class="table table-hover">
                                                                <tbody id="quantity-holder">
                                                                    <tr>
                                                                        <td colspan="4" class="text_right">
                                                                            <div class="proceed-button pull-left " >
                                                                                <a href=" <?php echo site_url("Cart" . $checkoutmode . "/checkoutShipping"); ?>" class="btn btn-primary  btn-apply-coupon checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Shipping Address</a>
                                                                            </div>
                                                                            <div class="proceed-button pull-right ">

                                                                                <a href=" <?php echo site_url("PayPalPayment" . $checkoutmode . "/process"); ?>" class="btn btn-primary  btn-apply-coupon checkout_button_next "  onclick="confirmOrder()">Place Order <i class="fa fa-arrow-right"></i></a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                                <?php
                                                if (PAYMENT_MODE_BANK == 'on') {
                                                    ?>
                                                    <div class="tab-pane  <?php echo DEFAULT_PAYMENT_MODE == 'Bank Transfer' ? 'active in' : ''; ?>" id="bank">
                                                        <p>

                                                         <img src="<?php echo base_url(); ?>assets/paymentstatus/bank.png" >
                                                          
                                                        </p>
                                                        <div class="cart-page-top table-responsive">
                                                            <table class="table table-hover">
                                                                <tbody id="quantity-holder">
                                                                    <tr>
                                                                        <td colspan="4" class="text_right">
                                                                            <div class="proceed-button pull-left " >
                                                                                <a href=" <?php echo site_url("Cart/checkoutShipping"); ?>" class="btn btn-primary  btn-apply-coupon checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Shipping Address</a>
                                                                            </div>
                                                                            <div class="proceed-button pull-right ">
                                                                                <button type="submit" name="place_order" class="btn btn-primary  btn-apply-coupon checkout_button_next "  value="Bank Transfer" onclick="confirmOrder()">
                                                                                    Place Order <i class="fa fa-arrow-right"></i>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                                <?php
                                                if (PAYMENT_MODE_COD == 'on') {
                                                    ?>
                                                    <div class="tab-pane  <?php echo DEFAULT_PAYMENT_MODE == 'Cash On Delivery' ? 'active in' : ''; ?>" id="cash">
                                                        <p>
                                                            <img src="<?php echo base_url(); ?>assets/paymentstatus/cod.png" style="height: 100px;">                

                                                        </p>
                                                        <div class="cart-page-top table-responsive">
                                                            <table class="table table-hover">
                                                                <tbody id="quantity-holder">
                                                                    <tr>
                                                                        <td colspan="4" class="text_right">
                                                                            <div class="proceed-button pull-left " >
                                                                                <a href=" <?php echo site_url("Cart/checkoutShipping"); ?>" class="btn btn-primary  btn-apply-coupon checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Shipping Address</a>
                                                                            </div>
                                                                            <div class="proceed-button pull-right ">
                                                                                <button type="submit" name="place_order" class="btn btn-primary  btn-apply-coupon checkout_button_next "  value="Cash On Delivery">
                                                                                    Place Order <i class="fa fa-arrow-right"></i>
                                                                                </button>                                                                  
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                                <?php
                                                if (PAYMENT_MODE_CHEQUE == 'on') {
                                                    ?>
                                                    <div class="tab-pane  <?php echo DEFAULT_PAYMENT_MODE == 'Cheque On Delivery' ? 'active in' : ''; ?>" id="cheque">
                                                        <p>
                                                            <img src="<?php echo base_url(); ?>assets/paymentstatus/chod.png" style="height: 100px;">                

                                                        </p>
                                                        <div class="cart-page-top table-responsive">
                                                            <table class="table table-hover">
                                                                <tbody id="quantity-holder">
                                                                    <tr>
                                                                        <td colspan="4" class="text_right">
                                                                            <div class="proceed-button pull-left " >
                                                                                <a href=" <?php echo site_url("Cart/checkoutShipping"); ?>" class="btn btn-primary  btn-apply-coupon checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Shipping Address</a>
                                                                            </div>
                                                                            <div class="proceed-button pull-right ">
                                                                                <button type="submit" name="place_order" class="btn btn-primary  btn-apply-coupon checkout_button_next "  value="Cheque On Delivery">
                                                                                    Place Order <i class="fa fa-arrow-right"></i>
                                                                                </button>                                                                   
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div>



<?php
$this->load->view('Cart/noproduct');
?>







<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
<script>
                                                                                var avaiblecredits = 0;
                                                                                function confirmOrder() {
                                                                                    swal({
                                                                                        title: 'Processing Order',
                                                                                        onOpen: function () {
                                                                                            swal.showLoading()
                                                                                        }
                                                                                    });
                                                                                }
</script>

<?php
$this->load->view('layout/footer', array('custom_item' => 0, 'custom_id' => 0));
?>