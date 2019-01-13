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

    .tab-pane p{
        padding:15px;
    }

</style>





<!-- Content -->


<div class="cart-page-area">
    <div class="container" ng-if="globleCartData.total_quantity">
        <div class="row">
            <?php
            $this->load->view('CartGuest/itemblock', array('vtype' => 'items'));
            ?>
            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'size'));
            ?>
            <?php
            $this->load->view('CartGuest/itemblock', array('vtype' => 'shipping'));
            ?>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel1 panel-default">
                    <div class="panel-heading1" role="tab" id="headingOne">
                        <h4 class=" r_corners wrapper m_bottom_10 bg_light_2  color_dark bg_gradient color_light">
                            <span class="fa-stack">
                                <i class="fa fa-money fa-stack-1x"></i>
                                <i class="ion-bag fa-stack-1x "></i>
                            </span>  Payment Method
                            <span class="process_block">
                                 Bank Transfer
                            </span> 
                        </h4>
                    </div>
                    <!-- Address Details -->
                    <div class="panel-body">
                        <div class="order-sheet product-details2-area" style="margin-top: 5px;padding:0">
                            <form action="#" method="post">
                                <div class="product-details-tab-area" style="margin: 0;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <ul class="nav nav-tabs bg_blue3 tab_measurement" >
                                                <!--<li class="active"><a href="#paypal" data-toggle="tab" aria-expanded="false">PayPal</a></li>-->
                                                <li class="active"><a href="#bank" data-toggle="tab" aria-expanded="true">Bank Transfer</a></li>
                                                <li><a href="#cash" data-toggle="tab" aria-expanded="false">Cash On Delivery</a></li>
                                                <li><a href="#cheque" data-toggle="tab" aria-expanded="false">Cheque On Delivery</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="tab-content">
                                                <div class="tab-pane fade "  id="paypal">
                                                    <p>
                                                        <img src="<?php echo base_url(); ?>assets/paymentstatus/paypal.png" style="height: 100px;">                
                                                    </p>
                                                    <div class="cart-page-top table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody id="quantity-holder">
                                                                <tr>
                                                                    <td colspan="4" class="text_right">
                                                                        <div class="proceed-button pull-left " >
                                                                            <a href=" <?php echo site_url("CartGuest/checkoutShipping"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Shipping Address</a>
                                                                        </div>
                                                                        <div class="proceed-button pull-right ">
                                                                            <a href="#" class="btn-apply-coupon btn btn-info btn-lg checkout_button_next " >Place Order <i class="fa fa-arrow-right"></i></a>

                                                                            <!--<a href=" <?php echo site_url("PayPalPaymentGuest/process"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_next " >Place Order <i class="fa fa-arrow-right"></i></a>-->
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade active in" id="bank">
                                                    <p>
                                                        <img src="<?php echo base_url(); ?>assets/paymentstatus/bank.png" style="height: 100px;">                

                                                    </p>
                                                    <div class="cart-page-top table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody id="quantity-holder">
                                                                <tr>
                                                                    <td colspan="4" class="text_right">
                                                                        <div class="proceed-button pull-left " >
                                                                            <a href=" <?php echo site_url("CartGuest/checkoutShipping"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Shipping Address</a>
                                                                        </div>
                                                                        <div class="proceed-button pull-right ">
                                                                            <button type="submit" name="place_order" class="btn-apply-coupon btn btn-info btn-lg checkout_button_next "  value="Bank Transfer">
                                                                                Place Order <i class="fa fa-arrow-right"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="cash">
                                                    <p>
                                                        <img src="<?php echo base_url(); ?>assets/paymentstatus/cod.png" style="height: 100px;">                

                                                    </p>
                                                    <div class="cart-page-top table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody id="quantity-holder">
                                                                <tr>
                                                                    <td colspan="4" class="text_right">
                                                                        <div class="proceed-button pull-left " >
                                                                            <a href=" <?php echo site_url("CartGuest/checkoutShipping"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Shipping Address</a>
                                                                        </div>
                                                                        <div class="proceed-button pull-right ">
                                                                            <button type="submit" name="place_order" class="btn-apply-coupon btn btn-info btn-lg checkout_button_next "  value="Cash On Delivery">
                                                                                Place Order <i class="fa fa-arrow-right"></i>
                                                                            </button>                                                                    </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="cheque">
                                                    <p>
                                                        <img src="<?php echo base_url(); ?>assets/paymentstatus/chod.png" style="height: 100px;">                

                                                    </p>
                                                    <div class="cart-page-top table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody id="quantity-holder">
                                                                <tr>
                                                                    <td colspan="4" class="text_right">
                                                                        <div class="proceed-button pull-left " >
                                                                            <a href=" <?php echo site_url("CartGuest/checkoutShipping"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Shipping Address</a>
                                                                        </div>
                                                                        <div class="proceed-button pull-right ">
                                                                            <button type="submit" name="place_order" class="btn-apply-coupon btn btn-info btn-lg checkout_button_next "  value="Cheque On Delivery">
                                                                                Place Order <i class="fa fa-arrow-right"></i>
                                                                            </button>                                                                   
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
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
        var avaiblecredits =<?php echo $user_credits; ?>;
</script>

<?php
$this->load->view('layout/footer');
?>