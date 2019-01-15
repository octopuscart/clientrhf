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

                                                {{product.quantity}}


                                            </td>
                                            <td class="amount text-center">{{product.total_price|currency:" "}}</td>
                                            <td class="dismiss">

                                            </td>
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

                    </div>

                </div>


            </div>

            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'size'));
            ?>
            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'shipping'));
            ?>
            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'payment'));
            ?>

        </div>

    </div>


    <?php
    $this->load->view('Cart/noproduct');
    ?>

</div>






<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
<script>
                                                var avaiblecredits = 0;
</script>

<?php
$this->load->view('layout/footer', array('custom_item' => 0, 'custom_id' => 0));
?>