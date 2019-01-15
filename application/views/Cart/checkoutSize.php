<?php
$this->load->view('layout/header');
?>



<style>
    .noUi-tooltip {
        display: none;
    }
    .noUi-active .noUi-tooltip {
        display: block;
    }



    .measurement_text{font-size: 20px;
                      float: left;    font-family: sans-serif;
    }
    .fr_value{
        font-size: 15px;
        margin-top: -7px;
        float: left;    font-family: sans-serif;
    }

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
    .input_display_none{
        display: none;
    }


    .measurement_lable{
        float: left;
        font-size: 13px;
        text-align: center;
        width: 100%;
        margin-bottom: 0;
        margin-top: 10px;
    }

    .measurement_img{
        height: 100px!important;
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

<!-- Inner Page Banner Area End Here -->

<!-- Content -->



<div class="cart-page-area"  ng-controller="measurementController">
    <div class="container" ng-if="globleCartData.total_quantity">
        <div class="row">

            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'items'));
            ?>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading active" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="fa-stack">
                                    <i class="fa fa-list-ol fa-stack-1x"></i>
                                    <i class="ion-bag fa-stack-1x "></i>
                                </span>   Your Size

                                <span style="float: right; line-height: 29px;" class="ng-binding">{{measurementstyle.title}} </span> 
                            </a>
                        </h4>
                    </div>
                    <div class="panel-body">

                        <div class="clearfix"></div>
                        <div class="cart-page-top table-responsive  product-details2-area">
                            <div class="product-details-tab-area" style="margin: 0;">
                                <div class="">
                                    <div class="col-lg-12 col-md-12 col-sm-12 nav nav-tabs tabs-left">
                                        <ul>
                                            <li class="active"><a href="#cash" data-toggle="tab" aria-expanded="false" ng-click="slidedemo('Mail-in Garments')">Mail-in Garments</a></li>
                                            <li><a href="#cheque" data-toggle="tab" aria-expanded="false" ng-click="slidedemo('Recent Measurement')">For Existing Clients</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="tab-content" style="padding: 2px 35px;">
                                     

                                         

                                            <div class="tab-pane active" id="cash">
                                                <p style="margin: 20px 0px 10px;">
                                                    Want to copy the fit of a shirt you already have, but aren't sure how to measure it properly?

                                                    Mail us your shirt and our experts will measure it and create a size for you. 



                                                <div class="contact-us-right">
                                                    <b>Send to:</b>
                                                    <br/>
                            Mirador Mansion, Shop No. 30 & 49,<br/> G/F 54-64 Nathan Road <br/>Tsim Sha Tsui, Hong Kong

                                                    <br/>
                                                    <i class="fa fa-envelope"></i> <?php echo email_sender;?><br/>
                                                    <i class="fa fa-phone"></i>  +(852) 2369 1196

                                                </div>
                                                </p>
                                                <div class="cart-page-top table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody id="quantity-holder">
                                                            <tr>
                                                                <td colspan="4" class="text_right">
                                                                    <div class="proceed-button pull-left " >
                                                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn btn-primary checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                    </div>
                                                                    <div class="proceed-button pull-right ">
                                                                        <form action="#" method="post">
                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn btn-primary checkout_button_next "  value="measurement">
                                                                                Choose Shipping Address <i class="fa fa-arrow-right"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                            <div class="tab-pane " id="cheque">
                                                <p style="margin: 20px 0px 10px;">
                                                    If you have purchased from us before, we have stored your most recent measurement on record.

                                                </p>
                                                <div class="cart-page-top table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody id="quantity-holder">
                                                            <tr>
                                                                <td colspan="4" class="text_right">
                                                                    <div class="proceed-button pull-left " >
                                                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn btn-primary checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                    </div>
                                                                    <div class="proceed-button pull-right ">
                                                                        <form action="#" method="post">
                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn btn-primary checkout_button_next "  value="measurement">
                                                                                Choose Shipping Address <i class="fa fa-arrow-right"></i>
                                                                            </button>
                                                                        </form>
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
                            </div>

                        </div>

                    </div>

                </div>


            </div>


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




<script type="text/javascript">
    var custom_items = "<?php echo implode(", ", $custome_items) ?>";
    var avaiblecredits = 0;</script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/noslider/nouislider.min.css">
<script src="<?php echo base_url(); ?>assets/theme/noslider/nouislider.min.js" type="text/javascript"></script>



<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
<?php
$this->load->view('layout/footer', array('custom_item' => 0, 'custom_id' => 0));
?>
<script>

    App.controller('measurementController', function ($scope, $http, $timeout, $interval) {

        $scope.measurementstyle = {'title': 'Standard Size - M'};

      
        $scope.slidedemo = function (mestitle) {


            $scope.measurementstyle.title = mestitle;
            

        }




    })



</script>