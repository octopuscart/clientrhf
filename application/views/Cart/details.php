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
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <div class="cart-page-top table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td class="cart-form-heading text-left" style="width: 50%" colspan="2">Product</td>
                                <td class="cart-form-heading text-center">Price</td>
                                <td class="cart-form-heading text-center" style="    width: 135px;">Quantity</td>
                                <td class="cart-form-heading text-center">Total</td>
                                <td class="cart-form-heading"></td>
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
                                    <button type="button" ng-click="viewStyle(product)" class="btn btn-primary"  style="margin-top: 10px;    margin-top: 10px;
                                            padding: 0px 10px;
                                            line-height: 19px;">View Design</a>

                                </td>
                                <td class="amount text-center" >{{product.price|currency:" "}}</td>
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
                                <td class="amount text-center">{{product.total_price|currency:" "}}</td>
                                <td class="dismiss"><a href="#"  ng-click="removeCart(product.product_id)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">
                                    TOTAL
                                </td>
                                <td class="text-center amount text-center">
                                    {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}}
                                </td>
                                <td></td>
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

                                        <!-- SUB TOTAL -->
                                        <h2 class=" text-center" style="font-size: 20px;
                                            margin-top: 10px;">TOTAL: <span>{{globleCartData.total_price|currency:"<?php echo globle_currency_type; ?>"}}</span></h2>

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