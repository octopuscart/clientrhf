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
    .address_guest_p{
        margin: 0px;
    }

</style>








<!-- Content -->


<div class="cart-page-area" ng-if="globleCartData.total_quantity">
    <div class="container" >
        <div class="">
            <?php
            $this->load->view('CartGuest/itemblock', array('vtype' => 'items'));
            ?>
            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'size'));
            ?>



            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel1 panel-default">
                    <div class="panel-heading1" role="tab" id="headingOne">

                        <h4 class=" r_corners wrapper  bg_light_2  color_dark bg_gradient color_light">
                            <span class="fa-stack">
                                <i class="fa fa-shopping-cart fa-stack-1x"></i>
                            </span> My Shopping Bag
                            <span style="float: right;     margin-top: 7px;" class="ng-binding">
                                <button class="button_type_1 color_dark r_corners fs_medium color_purple tr_all f_left m_right_10 " data-toggle="modal" data-target="#changeAddress" style="margin-left: 20px;color:white;">Add New</button>
                            </span>                        
                        </h4>


                    </div>
                    <!-- Address Details -->
                    <div class="panel-body">


                        <div class="row" >  

                            <div class="col-md-12">

                                <?php
                                if (count($user_address_details)) {
                                    ?>
                                    <div class="col-md-6 fw_normal color_dark">
                                        <h3><i class="fa fa-user"></i> <?php echo $user_details['name']; ?> </h3>
                                        <p class="address_guest_p"><i class="fa fa-phone"></i> <?php echo $user_details['contact_no']; ?> </p>
                                        <p class="address_guest_p"><i class="fa fa-envelope"></i> <?php echo $user_details['email']; ?> </p>
                                        <a href="<?php echo site_url("CartGuest/checkoutShipping/?removeAddress=" . $user_details['email']); ?>" class="btn btn-danger address_button btn-sm "><i class ="icon-close"></i> Remove Address</a>
                                    </div>

                                    <?php
                                    foreach ($user_address_details as $key => $value) {
                                        ?>
                                        <div class="col-md-6">
                                            <div class="">
                                                <b>Ship To</b>
                                                <p>
                                                    <?php echo $value['address1']; ?>,<br/>
                                                    <?php echo $value['address2']; ?>,<br/>
                                                    <?php echo $value['city']; ?>, <?php echo $value['state']; ?> <?php echo $value['zipcode']; ?>

                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <h4 class="text-center " style="color: red"><i class="fa fa-warning"></i> Please Add Shipping Address</h4>

                                    <?php
                                }
                                ?>
                            </div>                            

                        </div>
                    </div>

                    <div class="cart-page-top table-responsive">
                        <table class="table ">
                            <tbody id="quantity-holder">
                                <tr>
                                    <td colspan="4" class="text_right">
                                        <div class="proceed-button pull-left " >
                                            <a href=" <?php echo site_url("CartGuest/checkoutSize"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Size</a>
                                        </div>
                                        <div class="proceed-button pull-right ">
                                            <?php
                                            if (count($user_address_details)) {
                                                ?>
                                                <a href=" <?php echo site_url("CartGuest/checkoutPayment"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_next " >Choose Payment Method <i class="fa fa-arrow-right"></i></a>
                                                <?php
                                            }
                                            ?>
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
        $this->load->view('CartGuest/itemblock', array('vtype' => 'payment'));
        ?>

    </div>
</div>
<?php
$this->load->view('Cart/noproduct');
?>







<!-- Modal -->
<div class="modal  fade" id="changeAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    z-index: 20000000;">
    <div class="modal-dialog modal-md" role="document">
        <form action="#" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="font-size: 15px">Add New Address</h4>
                </div>
                <div class="modal-body checkout-form">

                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name" class=""><b>Full Name</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="name" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="height: 10%;">
                                </td>
                            </tr>
                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name" class=""><b>Email Address</b></span>
                                </td>
                                <td>
                                    <input type="email" required="" name="email" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="height: 10%;">
                                </td>
                            </tr>
                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name" class=""><b>Contact No.</b></span>
                                </td>
                                <td>
                                    <input type="tel" required="" name="contact_no" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="height: 10%;">
                                </td>
                            </tr>
                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name" class=""><b>Address (Line 1)</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="address1" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="height: 10%;">
                                </td>
                            </tr>

                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name" class=""><b>Address (Line 2)</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="address2" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="height: 10%;">
                                </td>
                            </tr>
                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name" class=""><b>Town/City</b></span>

                                </td>
                                <td>
                                    <input type="text" required="" name="city" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="height: 10%;">
                                </td>
                            </tr>
                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name"><b>State</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="state" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style="height: 10%;">
                                </td>
                            </tr>


                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name"><b>Zip/Postal</b></span>
                                </td>
                                <td>
                                    <input type="text"  name="zipcode" class="form-control " value="" style="height: 10%;">
                                </td>
                            </tr>
                            <tr>
                                <td style="line-height: 25px;">
                                    <span for="name"><b>Country</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="country" class="form-control" value="" style="height: 10%;">
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
    var avaiblecredits =<?php echo $user_credits; ?>;
</script>

<?php
$this->load->view('layout/footer');
?>