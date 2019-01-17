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

    .table th, .table td {
        padding: 5px;
        vertical-align: top;
        border-top: 1px solid #e9ecef;
    }
</style>






<!-- Inner Page Banner Area Start Here -->

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
            $this->load->view('CartGuest/itemblock', array('vtype' => 'items'));
            ?>
            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'size'));
            ?>



            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading active" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="fa-stack">
                                    <i class="fa fa-map-marker fa-stack-1x"></i>
                                    <i class="ion-bag fa-stack-1x "></i>
                                </span>   Shopping Address
                                <span style="float: right; line-height: 29px;" class="ng-binding">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#changeAddress" style="margin-left: 20px;padding: 5px 11px;color:white;line-height: 16px;"><i class="fa fa-plus"></i> Add New</button>
                                </span> 
                            </a>
                        </h4>
                    </div>
                    <!-- Address Details -->
                    <div class="panel-body">


                        <div class=" col-md-12" >  

                            <div class="row">

                                <?php
                                if (count($user_address_details)) {
                                    ?>
                                    <div class="col-md-6">
                                        <h3><i class="fa fa-user"></i> <?php echo $user_details['name']; ?> </h3>
                                        <p class="address_guest_p"><i class="fa fa-phone"></i> <?php echo $user_details['contact_no']; ?> </p>
                                        <p class="address_guest_p"><i class="fa fa-envelope"></i> <?php echo $user_details['email']; ?> </p>
                                        <a href="<?php echo site_url("CartGuest/checkoutShipping/?removeAddress=" . $user_details['email']); ?>" class="btn btn-danger address_button btn-sm " style="line-height: 15px;"><i class ="fa fa-times"></i> Remove Address</a>
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
                                    <h4 class="text-center " style="color: red;    width: 100%;
    padding: 10px 0px 30px;"><i class="fa fa-warning"></i> Please Add Shipping Address</h4>

                                    <?php
                                }
                                ?>
                            </div>                            

                        </div>
                    </div>
                    <div class="cart-page-top table-responsive">
                        <table class="table table-hover">
                            <tbody id="quantity-holder">
                                <tr>
                                    <td colspan="4" class="text_right">
                                        <div class="proceed-button pull-left " >
                                            <a href=" <?php echo site_url("CartGuest/checkoutInit"); ?>" class="btn btn-primary checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                        </div>
                                        <div class="proceed-button pull-right ">
                                            <?php
                                            if (count($user_address_details)) {
                                                ?>
                                                <a href=" <?php echo site_url("CartGuest/checkoutPayment"); ?>" class="btn btn-primary checkout_button_next " >Choose Payment Method <i class="fa fa-arrow-right"></i></a>
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
            
            <?php
        $this->load->view('CartGuest/itemblock', array('vtype' => 'payment'));
        ?>
        </div>


        
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
                        <tbody>
                            <tr>
                                <td style="    padding: 5px;vertical-align: middle;">
                                    <span for="name" class=""><b>Full Name</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="name" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style=" margin-bottom: 0px; ">
                                </td>
                            </tr>
                            <tr>
                                <td style="    padding: 5px;vertical-align: middle;">
                                    <span for="name" class=""><b>Email Address</b></span>
                                </td>
                                <td>
                                    <input type="email" required="" name="email" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style=" margin-bottom: 0px; ">
                                </td>
                            </tr>
                            <tr>
                                <td style="    padding: 5px;vertical-align: middle;">
                                    <span for="name" class=""><b>Contact No.</b></span>
                                </td>
                                <td>
                                    <input type="tel" required="" name="contact_no" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style=" margin-bottom: 0px; ">
                                </td>
                            </tr>
                            <tr>
                                <td style="    padding: 5px;vertical-align: middle;">
                                    <span for="name" class=""><b>Address (Line 1)</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="address1" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style=" margin-bottom: 0px; ">
                                </td>
                            </tr>

                            <tr>
                                <td style="    padding: 5px;vertical-align: middle;">
                                    <span for="name" class=""><b>Address (Line 2)</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="address2" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style=" margin-bottom: 0px; ">
                                </td>
                            </tr>
                            <tr>
                                <td style="    padding: 5px;vertical-align: middle;">
                                    <span for="name" class=""><b>Town/City</b></span>

                                </td>
                                <td>
                                    <input type="text" required="" name="city" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style=" margin-bottom: 0px; ">
                                </td>
                            </tr>
                            <tr>
                                <td style="    padding: 5px;vertical-align: middle;">
                                    <span for="name"><b>State</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="state" class="form-control woocommerce-Input woocommerce-Input--email input-text" value="" style=" margin-bottom: 0px; ">
                                </td>
                            </tr>


                            <tr>
                                <td style="    padding: 5px;vertical-align: middle;">
                                    <span for="name"><b>Zip/Postal</b></span>
                                </td>
                                <td>
                                    <input type="text"  name="zipcode" class="form-control " value="" style=" margin-bottom: 0px; ">
                                </td>
                            </tr>
                            <tr>
                                <td style="    padding: 5px;vertical-align: middle;">
                                    <span for="name"><b>Country</b></span>
                                </td>
                                <td>
                                    <input type="text" required="" name="country" class="form-control" value="" style=" margin-bottom: 0px; ">
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