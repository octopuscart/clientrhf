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






<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>Checkout</h1>
                    <ul>
                        <li><a href="#">Home</a> /</li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->

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
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="fa-stack">
                                    <i class="fa fa-money fa-stack-1x"></i>
                                    <i class="ion-bag fa-stack-1x "></i>
                                </span>   Payment Method
                                <span style="float: right; line-height: 29px;font-size: 12px;" class="ng-binding">
                                    Bank Transfer
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
                                            <ul>
                                               <li> <a href="#paypal" data-toggle="tab" aria-expanded="false">PayPal</a></li>
                                              <li class="active"><a href="#bank" data-toggle="tab" aria-expanded="true">Bank Transfer</a></li>

                                            </ul>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="">
                                                <div class="  "  id="paypal">
                                                    <p>
                                                        <img src="<?php echo base_url(); ?>assets/paymentstatus/paypal.png" style="height: 100px;">                
                                                    </p>
                                                    <div class="cart-page-top table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody id="quantity-holder">
                                                                <tr>
                                                                    <td colspan="4" class="text_right">
                                                                        <div class="proceed-button pull-left " >
                                                                            <a href=" <?php echo site_url("CartGuest/checkShipping"); ?>" class="btn btn-default btn-apply-coupon checkout_button_pre disabled" ><i class="fa fa-arrow-left"></i> View Shipping Address</a>
                                                                        </div>
                                                                        <div class="proceed-button pull-right ">

                                                                            <a href=" <?php echo site_url("PayPalPaymentGuest/process"); ?>" class="btn btn-default btn-apply-coupon checkout_button_next disabled" >Place Order <i class="fa fa-arrow-right"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane  active in" id="bank">
                                                    <p>
                                                        <img src="<?php echo base_url(); ?>assets/paymentstatus/bank.png" style="height: 100px;">                

                                                    </p>
                                                    <div class="cart-page-top table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody id="quantity-holder">
                                                                <tr>
                                                                    <td colspan="4" class="text_right">
                                                                        <div class="proceed-button pull-left " >
                                                                            <a href=" <?php echo site_url("CartGuest/checkShipping"); ?>" class="btn btn-default btn-apply-coupon checkout_button_pre disabled" ><i class="fa fa-arrow-left"></i> View Shipping Address</a>
                                                                        </div>
                                                                        <div class="proceed-button pull-right ">
                                                                            <button type="submit" name="place_order" class="btn btn-default btn-apply-coupon checkout_button_next disabled"  value="Bank Transfer">
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
        var avaiblecredits = 0;
</script>

<?php
$this->load->view('layout/footer', array('custom_item' => 0, 'custom_id' => 0));
?>