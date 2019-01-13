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


<div class="cart-page-area">
    <div class="container" ng-if="globleCartData.total_quantity">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="fa-stack">
                                    <i class="fa fa-shopping-cart fa-stack-1x"></i>
                                    <i class="ion-bag fa-stack-1x "></i>
                                </span>   My Shopping Bag
                                <span style="float: right; line-height: 29px;" class="ng-binding">Total: {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}} (<small style="color: #fff" class="ng-binding">{{globleCartData.total_quantity}}</small>)</span> 
                            </a>
                        </h4>
                    </div>
                    <div class="panel-body">

                        <div class="clearfix"></div>
                        <div class="cart-page-top table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td class="cart-form-heading text_center" style="width: 50%" colspan="2">Product</td>
                                        <td class="cart-form-heading text_center">Price</td>
                                      
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
                                        <td class="amount">{{product.price|currency:" "}} X {{product.quantity}}
                                        </td>
                                        <td class="amount">{{product.total_price|currency:" "}}</td>
                                        <td class="dismiss"><a href="#"  ng-click="removeCart(product.product_id)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text_right">
                                            TOTAL
                                        </td>
                                        <td class="text-center amount">
                                            {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}}
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text_right">
                                            <div class="proceed-button pull-left " >
                                                <a href=" <?php echo site_url("Cart/details"); ?>" class="btn-apply-coupon checkout_button_pre disabled" ><i class="fa fa-arrow-left"></i> Back To Cart</a>
                                            </div>
                                            <div class="proceed-button pull-right ">
                                                <a href=" <?php echo site_url("CartGuest/checkoutShipping"); ?>" class="btn-apply-coupon checkout_button_next disabled" >Choose Shipping Address <i class="fa fa-arrow-right"></i></a>
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
            $this->load->view('CartGuest/itemblock', array('vtype' => 'shipping'));
            ?>
            <?php
            $this->load->view('CartGuest/itemblock', array('vtype' => 'payment'));
            ?>

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







<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
<script>
    var avaiblecredits =<?php echo $user_credits; ?>;
</script>

<?php
$this->load->view('layout/footer');
?>