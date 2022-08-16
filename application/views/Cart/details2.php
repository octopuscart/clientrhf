<?php
$this->load->view('layout/header');
?>

<!-- Inner Page Banner Area Start Here -->
<div class="page-header" style="height: 160px">
    <div class="container">

        <h1 style="    color: black;
            margin-bottom: 30px;
            font-size: 30px;
            text-shadow: 0px 0px;">Your Shopping Cart</h1>


    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Cart Page Area Start Here -->
<div class="cart-page-area">
    <div class="container" ng-if="globleCartData.total_quantity">
        <div class="row"  ng-if="gcheckcart.status == 2">
            <div class="col-md-1"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cart-page-top table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td class="cart-form-heading text-left" style="width: 50%" colspan="2">Product</td>
                                <td class="cart-form-heading text-center" >Price</td>
                                <td class="cart-form-heading text-center" >Quantity</td>
                                <td class="cart-form-heading text-right" style="width: 250px;">Total</td>

                            </tr>
                        </thead>
                        <tbody id="quantity-holder">
                            <tr ng-repeat="product in globleCartData.products">
                                <td class="cart-img-holder " style="    border-right: 0px;    width: 35px;">
                                    <a href="#">
                                        <img  src="{{product.file_name}}" alt=""  alt="cart" class="img-responsive cart_image_block">
                                    </a>
                                </td>
                                <td  style="    border-left: 0px;">
                                    <h3 style="font-size: 20px;"><a href="#">{{product.title}} - {{product.item_name}}</a>
                                        <br/>
                                        <small style="font-size: 10px">{{product.sku}}</small>
                                    </h3>
                                    <button type="button" ng-click="viewStyle(product)" class="btn btn-primary btn-small-xs"  >View Design</button> &nbsp;
                                    <a href="#" class="btn btn-default btn-small-xs"  ng-click="removeCart(product.product_id)"><i class="fa fa-times" aria-hidden="true"></i> Remove</a>


                                </td>
                                <td>
                                    <span class="price">{{product.price|currency:" "}}</span>
                                </td>
                                <td class="quantity text-center">

                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default quantity-minus" type="button" ng-click="updateCart(product, 'sub')" style="    padding: 0px 11px;"><i class="fa fa-minus" aria-hidden="true" ></i></button>
                                        </span>
                                        <input type="text" name='quantity' class="form-control quantity-input text-center" value="{{product.quantity}}"  placeholder="1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default quantity-plus" type="button" ng-click="updateCart(product, 'add')" style="    padding: 0px 11px;"><i class="fa fa-plus" aria-hidden="true" ></i></button>
                                        </span>
                                    </div><!-- /input-group -->


                                </td>
                                <td class="amount text-right">{{product.total_price|currency:" "}}</td>

                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">
                                    SUB TOTAL
                                </td>
                                <td class="text-right amount">
                                    {{globleCartData.sub_total_price|currency:"<?php echo globle_currency; ?>"}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" >
                                    <div class="coupon_form" >
                                        <form ng-if="globleCartData.coupon.has_coupon != '1'" action="<?php echo site_url("Cart/applyCoupon") ?>" method="post">
                                            <div class="input-group">
                                                <input type="hidden" name="next_url" value="<?php echo current_url(); ?>"/>
                                                <input type="text" name='couponcode' class="form-control coupon-input text-left" value=""  placeholder="Enter Coupon Here..." required=""/>
                                                <button class="btn btn-default quantity-plus" type="submit"  style="    padding: 0px 11px;"><i class="fa fa-check" aria-hidden="true" ></i> Apply Coupon</button>

                                            </div>
                                        </form>
                                        <span ng-if="globleCartData.coupon.has_coupon == '1'">
                                            <div class="col-md-12">
                                                Applied Coupon Code: <b>{{globleCartData.coupon.coupon_code}}</b> 
                                                <button class="btn btn-danger removecouponbutton" ng-click="removeCoupon()">Remove Coupon</button>
                                            </div>
                                            <div class="col-md-12">{{globleCartData.coupon.coupon_message}}</div>
                                        </span>
                                    </div>
                                </td>
                                <td colspan="2" class="text-right">


                                    COUPON DISCOUNT
                                </td>
                                <td class="text-right amount text-right">
                                    {{globleCartData.discount|currency:"<?php echo globle_currency; ?>"}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" >
                                    <div class="coupon_form" ng-if="!globleCartData.store_pick_check">
                                        <div class="input-group">
                                            <div class="checkbox">
                                                <label><input type="checkbox" ng-model="globleCartData.store_pick" ng-click="checkPickFromStore(globleCartData.store_pick)"> Check here </label>
                                            </div>
                                        </div>
                                        If you want to pick order from store. No shipping cost will be applied. 
                                    </div>
                                    <div class="coupon_form" ng-if="globleCartData.store_pick_check">
                                        You have selected pick order from store.
                                        <br/>
                                        <button class="btn btn-danger removecouponbutton" ng-click="checkPickFromStore(false)">Click here</button> to cancel pick order from store

                                    </div>
                                </td>
                                <td colspan="2" class="text-right">
                                    SHIPPING
                                </td>
                                <td class="text-right amount text-right">
                                    {{globleCartData.shipping_price|currency:"<?php echo globle_currency; ?>"}}
                                </td>
                            </tr>
                            <tr style="font-weight: bold;">
                                <td colspan="4" class="text-right">
                                    TOTAL
                                </td>
                                <td class="text-right amount text-right">
                                    {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text_right">
                                    <section class="pad-t-b-30 light-gray-bg shopping-cart small-cart"  >
                                        <div class="container"> 
                                            <!-- SHOPPING INFORMATION -->
                                            <div class="cart-ship-info margin-top-0" style="    margin-bottom: 10px;"> 
                                                <div class="row">
                                                    <!-- SUB TOTAL -->

                                                    <div class="col-md-4">
                                                        <a href="<?php echo site_url("Cart/details"); ?>" class="btn btn-primary pull-left" ><i class=" fa fa-arrow-left"></i> Customize More </a>

                                                    </div>
                                                    <div class="col-md-4">


                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="<?php echo site_url('Cart/checkoutInit') ?>" class="btn btn-primary pull-right" >Proceed To Checkout <i class=" fa fa-arrow-right"></i></a>

                                                    </div>






                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </td>

                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-md-1"></div>

        </div>

    </div>

    <?php
    $this->load->view('Cart/noproduct');
    ?>


</div>
<!-- Cart Page Area End Here -->
<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>