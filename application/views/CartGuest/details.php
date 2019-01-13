<?php
$this->load->view('layout/header');
?>

<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>Cart Page</h1>
                    <ul>
                        <li><a href="#">Home</a> /</li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Cart Page Area Start Here -->
<div class="cart-page-area">
    <div class="container" ng-if="globleCartData.total_quantity">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cart-page-top table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td class="cart-form-heading text_center" style="width: 50%" colspan="2">Product</td>
                                <td class="cart-form-heading text_center">Price</td>
                                <td class="cart-form-heading text_center">Quantity</td>
                                <td class="cart-form-heading text_center">Total</td>
                                <td class="cart-form-heading"></td>
                            </tr>
                        </thead>
                        <tbody id="quantity-holder">
                            <tr ng-repeat="product in globleCartData.products">
                                <td class="cart-img-holder" style="    border-right: 0px;">
                                    <a href="#">
                                        <img  src="{{product.file_name}}" alt=""  alt="cart" class="img-responsive cart_image_block">
                                    </a>
                                </td>
                                <td  style="    border-left: 0px;">
                                    <h3><a href="#">{{product.title}} - {{product.item_name}}</a>
                                        <br/>
                                        <small style="font-size: 10px">{{product.sku}}</small>
                                    </h3>
                                </td>
                                <td class="amount">{{product.price|currency:" "}}</td>
                                <td class="quantity">
                                    <div class="input-group quantity-holder">
                                        <input type="text" name='quantity' class="form-control quantity-input" value="{{product.quantity}}"  placeholder="1">
                                        <div class="input-group-btn-vertical">
                                            <button class="btn btn-default quantity-plus" type="button" ng-click="updateCart(product, 'add')"><i class="fa fa-plus" aria-hidden="true" ></i></button>
                                            <button class="btn btn-default quantity-minus" type="button" ng-click="updateCart(product, 'sub')"><i class="fa fa-minus" aria-hidden="true" ></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td class="amount">{{product.total_price|currency:" "}}</td>
                                <td class="dismiss"><a href="#"  ng-click="removeCart(product.product_id)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text_right">
                                    TOTAL
                                </td>
                                <td class="text-center amount">
                                    {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text_right">
                                    <div class="proceed-button">

                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn-apply-coupon disabled" >Proceed to checkout</a>
                                    </div> </td>

                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

    <!-- Content -->
    <div id="content"  ng-if="!globleCartData.total_quantity"> 
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


</div>
<!-- Cart Page Area End Here -->
<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>