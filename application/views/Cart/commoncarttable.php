<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="panel panel-default">
        <div class="panel-heading active" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span class="fa-stack">
                        <i class="fa fa-shopping-cart fa-stack-1x"></i>
                        <i class="ion-bag fa-stack-1x "></i>
                    </span>   My Shopping Bag
                    <span style="float: right; line-height: 29px;" class="ng-binding">Total:  {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}} ({{globleCartData.total_quantity}}</small>)</span> 
                </a>
            </h4>
        </div>
        <div class="panel-body">

            <div class="clearfix"></div>
            <div class="cart-page-top table-responsive">
                <div class="cart-page-top table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td class="cart-form-heading text-left" colspan="2" style="width: 50%" colspan="2">Product</td>
                                <td class="cart-form-heading text-center">Price</td>
                                <td class="cart-form-heading text-right" style="    width: 135px;">Quantity</td>
                                <td class="cart-form-heading text-right" style="    width: 200px;">Total</td>
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
                                <td class="quantity text-right">

                                    {{product.quantity}}


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

                                <td colspan="4" class="text-right">


                                    COUPON DISCOUNT
                                </td>
                                <td class="text-right amount text-right">
                                    {{globleCartData.discount|currency:"<?php echo globle_currency; ?>"}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">
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
                                <td colspan="5" class="text_right">
                                    <div class="proceed-button pull-left " >
                                        <a href=" <?php echo site_url("Cart/details"); ?>" class="btn btn-danger checkout_button_pre " ><i class="fa fa-arrow-left"></i> Back To Cart</a>
                                    </div>
                                    <div class="proceed-button pull-right ">
                                        <a href=" <?php echo site_url("Cart/checkoutSize"); ?>" class="btn btn-danger checkout_button_next " >Your Size <i class="fa fa-arrow-right"></i></a>
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