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
<div id="content" ng-if="globleCartData.total_quantity"> 
    <!-- Shop Content -->
    <section class="shop-content pad-t-b-60 checkout-page-area">
        <div class="container"> 
            <!-- Checkout -->
            <div class="checkout-form">
                <div class="row"> 
                    <div class="col-md-6">
                        <!-- Login Details -->
                        <div class="col-md-12">

                            <div class="order-sheet">
                                <h2>Contact Details</h2>
                                <ul>
                                    <li>Email<span><?php echo $user_details->email; ?></span></li>
                                    <li>Name<span><?php echo $user_details->first_name; ?> <?php echo $user_details->last_name; ?></span></li>
                                    <li>Contact No.<span><?php echo $user_details->contact_no; ?></span></li>
                                </ul>
                            </div>

                        </div>

                        <hr/>
                        <!-- Address Details -->
                        <div class="col-md-12">
                            <div class="order-sheet">
                                <h2 style="margin-bottom: 50px;">Shipping Details <button class="btn-send-message" data-toggle="modal" data-target="#changeAddress" style="margin-left: 20px;padding: 5px 11px;color:white;"><i class="fa fa-plus"></i> Add New</button></h2>

                                <div class="noti-check1" style="#f5f5f5">  
                                    <div class="row">




                                        <?php
                                        if (count($user_address_details)) {
                                            ?>
                                            <?php
                                            foreach ($user_address_details as $key => $value) {
                                                ?>
                                                <div class="col-md-12">
                                                    <?php if ($value['status'] == 'default') { ?> 
                                                        <div class="checkcart <?php echo $value['status']; ?> ">
                                                            <i class="fa fa-check fa-2x"></i>
                                                        </div>
                                                    <?php } ?> 
                                                    <div class=" address_block <?php echo $value['status']; ?> ">
                                                        <p>
                                                            <?php echo $value['address']; ?>,<br/>
                                                            <?php echo $value['city']; ?>, <?php echo $value['state']; ?> <?php echo $value['pincode']; ?>
                                                            <br/>
                                                            <?php if ($value['status'] != 'default') { ?> 
                                                                <a href="<?php echo site_url("Cart/checkout/?setAddress=" . $value['id']); ?>" class="btn-send-message address_button btn-small ">Select Address</a>
                                                            <?php } ?> 
                                                        </p>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <h4><i class="fa fa-warning"></i> Please Add Shipping Address</h4>

                                            <?php
                                        }
                                        ?>
                                    </div>                            

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <form action="#" method="post">


                            <div class="order-sheet" style="margin-bottom: 10px;">
                                <h2>Your Order</h2>
                                <ul>
                                    <li  ng-repeat="product in globleCartData.products">         
                                        {{product.title}}<br/>
                                        <b>Credit Limit : {{product.credit_limit|currency:" "}} X  {{product.quantity}}</b>
                                        <span>{{product.total_price|currency:" "}}</span></li>
                                </ul>
                                <h3>Subtotal<span>{{globleCartData.total_price|currency:" "}}</span></h3>
                                <ul>
                                    <li class="availble_credit"> Applicable Credit Limit <span> {{globleCartData.total_credit_limit}}</span></li>
                                    <li>Available Credits:{{<?php echo $user_credits; ?>|currency:" "}} <span><input type="number" 
                                                                                                                     ng-change="checkOrderTotal()"
                                                                                                                     max="{{globleCartData.total_credit_limit}}" 
                                                                                                                     min="0" 
                                                                                                                     name="credit_price"
                                                                                                                     class="form-control" 
                                                                                                                     ng-model="globleCartData.used_credit" 
                                                                                                                     value="{{globleCartData.used_credit}}" 
                                                                                                                     style="width: 100px"></span>
                                    </li>
                                </ul>
                                <h3>Total<span>{{globleCartData.grand_total|currency:" "}}</span></h3>
                            </div>



                            <input type="hidden" value="{{globleCartData.total_price}}" name="sub_total_price">
                            <input type="hidden" value="{{globleCartData.total_quantity}}" name="total_quantity">
                            <input type="hidden" value="{{globleCartData.grand_total}}" name="total_price">
                            <div class="col-sm-12">


                                <?php
                                if (count($user_address_details)) {
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pLace-order" style="text-align: left;">
                                                <button class="btn-send-message disabled" type="submit" name="place_order" >Place Order</button>
                                            </div>
                                            <p>..and we'll get back to you</p>
                                        </div>
                                    </div>
                                <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End Content --> 

<!-- Content -->
<div id="content" class="cart-page-area"  ng-if="!globleCartData.total_quantity"> 
    <!-- Tesm Text -->
    <section class="error-page text-center pad-t-b-130">
        <div class="container "> 

            <!-- Heading -->
            <h1 style="font-size: 40px">No Product Found</h1>
            <p>Please add product to cart<br>
                You can go back to</p>
            <hr class="dotted">
            <a href="<?php echo site_url(); ?>" class="btn-send-message ">BACK TO HOME</a>
        </div>
    </section>
</div>
<!-- End Content --> 



<!-- Modal -->
<div class="modal  fade" id="changeAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    z-index: 20000000;">
    <div class="modal-dialog modal-sm" role="document">
        <form action="#" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="font-size: 15px">Change Password</h4>
                </div>
                <div class="modal-body checkout-form">

                    <label>
                        Address
                        <input type="text" name="address"  value="" class="form-control">
                    </label>

                    <label>
                        City
                        <input type="text" name="city"  value="" class="form-control">
                    </label>
                    <br/>
                    <label>
                        State
                        <input type="text" name="state"  value="" class="form-control">
                    </label>
                    <label>
                        Pincode
                        <input type="text" name="pincode"  value="" class="form-control">
                    </label>
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