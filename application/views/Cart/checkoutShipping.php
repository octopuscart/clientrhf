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


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="fa-stack">
                                    <i class="fa fa-map-marker fa-stack-1x"></i>
                                    <i class="ion-bag fa-stack-1x "></i>
                                </span>   Shipping Address
                                <span style="float: right; line-height: 29px;" class="ng-binding" ng-if="!globleCartData.store_pick_check">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#changeAddress" style="margin-left: 20px;padding: 5px 11px;color:white;line-height: 16px;"><i class="fa fa-plus"></i> Add New</button>
                                </span> 
                                <span style="float: right; line-height: 29px;font-size: 12px;font-weight: 300" ng-if="globleCartData.store_pick_check">
                                    Pick order from store.

                                </span>
                            </a>
                        </h4>
                    </div>
                    <!-- Address Details -->
                    <div class="panel-body">
                        <div class="order-sheet" style="margin-top: 30px">


                            <div class="row" ng-if="!globleCartData.store_pick_check">  
                                <div class="col-md-12">

                                    <?php
                                    if (count($user_address_details)) {
                                        ?>
                                        <?php
                                        foreach ($user_address_details as $key => $value) {
                                            ?>
                                            <div class="col-md-6">
                                                <?php if ($value['status'] == 'default') { ?> 
                                                    <div class="checkcart <?php echo $value['status']; ?> ">
                                                        <i class="fa fa-check fa-2x"></i>
                                                    </div>
                                                <?php } ?> 
                                                <div class=" address_block <?php echo $value['status']; ?> ">
                                                    <p>
                                                        <?php echo $value['address1']; ?>,<br/>
                                                        <?php echo $value['address2']; ?>,<br/>
                                                        <?php echo $value['city']; ?>, <?php echo $value['state']; ?> <?php echo $value['zipcode']; ?>
                                                        <br/>
                                                        <?php if ($value['status'] != 'default') { ?> 
                                                            <a href="<?php echo site_url("Cart/checkoutShipping/?setAddress=" . $value['id']); ?>" class="btn-send-message address_button btn-small ">Select Address</a>
                                                        <?php } ?> 
                                                    </p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <h4 class="text-center "  style="color: red"><i class="fa fa-warning"></i> Please Add Shipping Address</h4>

                                        <?php
                                    }
                                    ?>
                                </div>                            

                            </div>

                            <div class="row" ng-if="globleCartData.store_pick_check">  
                                <div class="col-md-12">
                                    <form action="#" method="post">
                                        <table class="table">
                                            <tbody>
                                                
                                                <tr>
                                                    <td style="line-height: 25px;">
                                                        <span for="name" class="">Date</span>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $starttime = 9;
                                                        $endtime = 21;
                                                        $current_date = date("Y-m-d");
                                                        $expdate = date('Y-m-d', strtotime("+10 days", strtotime($current_date)));
                                                        ?>
                                                        <input type="date" required="" name="address2" class="form-control woocommerce-Input woocommerce-Input--email input-text" min="<?php echo $expdate; ?>" value="<?php echo $expdate; ?>" style="margin-bottom: 0px; ">
                                                    </td>
                                                    <td></td>
                                                    <td style="line-height: 25px;">
                                                        <span for="name" class=""><b>Time</b></span>
                                                    </td>
                                                    <td>
                                                        <select name="city" class="form-control woocommerce-Input woocommerce-Input--email input-text" >
                                                            <?php
                                                            for ($tt = $starttime; $tt <= $endtime; $tt++) {
                                                                echo "<option value='$tt:00'>$tt:00</option>";
                                                            }
                                                            ?>
                                                        </select>

                                                        <input type="hidden"  name="address1" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="Pick From Store" style="margin-bottom: 0px; ">

                                                        <input type="hidden"  name="state" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="margin-bottom: 0px; ">
                                                        <input type="hidden"  name="zipcode" class="form-control " value="" style="margin-bottom: 0px; ">
                                                        <input type="hidden"  name="country" class="form-control" value="" style="margin-bottom: 0px; ">
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="add_address" class="btn btn-primary btn-small" style="color: white">Confirm Date/Time</button>

                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>





                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="cart-page-top table-responsive">
                            <table class="table table-hover">
                                <tbody id="quantity-holder">
                                    <tr>
                                        <td colspan="4" class="text_right">
                                            <div class="proceed-button pull-left " >
                                                <a href=" <?php echo site_url("Cart/checkoutSize"); ?>" class="btn-apply-coupon checkout_button_pre btn btn-primary " ><i class="fa fa-arrow-left"></i> View Size</a>
                                            </div>
                                            <div class="proceed-button pull-right ">
                                                <a href=" <?php echo site_url("Cart/checkoutPayment"); ?>" class="btn-apply-coupon checkout_button_next btn btn-primary " >Choose Payment Method <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'payment'));
            ?>
        </div>
    </div>
</div>



<?php
$this->load->view('Cart/noproduct');
?>



<!-- Modal -->
<div class="modal  fade" id="changeAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    z-index: 20000000;">
    <div class="modal-dialog " role="document">
        <form action="#" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" style="font-size: 15px">Add New Address</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body checkout-form">

                    <table class="table">
                        <tbody><tr>
                                <td style="line-height: 25px;">
                                    <span for="name" class=""><b>Address (Line 1)</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="address1" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="margin-bottom: 0px; ">
                                </td>
                            </tr>

                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name" class=""><b>Address (Line 2)</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="address2" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="margin-bottom: 0px; ">
                                </td>
                            </tr>
                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name" class=""><b>Town/City</b></span>

                                </td>
                                <td>
                                    <input type="text" required="" name="city" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="margin-bottom: 0px; ">
                                </td>
                            </tr>
                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name"><b>State</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="state" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="margin-bottom: 0px; ">
                                </td>
                            </tr>


                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name"><b>Zip/Postal</b></span>
                                </td>
                                <td>
                                    <input type="text"  name="zipcode" class="form-control " value="" style="margin-bottom: 0px; ">
                                </td>
                            </tr>
                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name"><b>Country</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="country" class="form-control" value="" style="margin-bottom: 0px; ">
                                </td>
                            </tr>

                        </tbody>
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_address" class="btn btn-primary btn-small" style="color: white">Add Address</button>
                </div>
            </div>
        </form>
    </div>
</div>









<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
<script>
                                var avaiblecredits = 0;
</script>

<?php
$this->load->view('layout/footer', array('custom_item' => 0, 'custom_id' => 0));
?>