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



    .measurement_text{
        font-size: 20px;
        float: left;
        font-family: sans-serif;
    }
    .fr_value{
        font-size: 15px;
        margin-top: -7px;
        float: left;
        font-family: sans-serif;
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
                    <div class="panel-heading" role="tab" id="headingOne">
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
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">




                                        <ul class="nav nav-tabs" role="tablist">

                                            <?php
                                            if ($has_user) {
                                                ?>
                                                <li role="presentation" class=" active">
                                                    <a href="#previouseStyles" class="active" data-toggle="tab" role="tab" ng-click="slidedemo('Previouse Measurement')">Select From Previous</a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                            <li  role="presentation" class=" <?php echo $has_user ? '' : 'active'; ?>">
                                                <a href="#size_standard" data-toggle="tab" class=" <?php echo $has_user ? '' : 'active'; ?>" role="tab" ng-click="slidedemostandard()">Standard Size</a>
                                            </li>
                                            <li><a href="#bank" data-toggle="tab" role="tab" ng-click="slidedemo('Custom Measurement')">Measure Your Body</a></li>
                                            <li><a href="#cash" data-toggle="tab"  role="tab" ng-click="slidedemo('Mail Garment(s)')">Mail Garment(s)</a></li>
                                            <li><a href="#cheque" data-toggle="tab" role="tab"  ng-click="slidedemo('Recent Measurement')">For Existing Clients</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="tab-content" style="padding: 2px 35px;">
                                            <?php
                                            if ($has_user) {
                                                ?>
                                                <div class="tab-pane  active in" id="previouseStyles" ng-controller="PreMeasurementCheck">
                                                    <p style="margin: 20px 0px 10px;">
                                                        If you have purchased from us before, You can select your measurement from your previous measurement profiles.


                                                    </p>
                                                    <table class="table">

                                                        <tr ng-repeat="(meskey, mesval) in customizationDict.premeasurements">
                                                            <th>
                                                                <h3>{{mesval.name}}</h3><br/>
                                                                <button type="button" ng-click="viewMeasurementOnly(mesval.name, mesval.measurements)" class="btn btn-default  btn-small-xs"  >View</button>
                                                                <button type="button"  class="btn btn-default btn-small-xs"  title ="Favorite Profile"><i class="text-danger fa {{mesval.meausrement_data.status=='f'?'fa-heart':'fa-heart-o'}}"></i></button>

                                                            </th>
                                                            <td>


                                                            </td>


                                                            <td>Created On: {{mesval.meausrement_data.datetime}}</td>
                                                            <td>                                
                                                                <button type="button" ng-click="applyMessurements(mesval.meausrement_data.id, mesval.name, mesval.measurements)" class="btn btn-warning"  >Apply Measurement</button>
                                                            </td>
                                                        </tr>


                                                    </table>
                                                    <div class="cart-page-top table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody id="quantity-holder">
                                                                <tr>
                                                                    <td colspan="4" class="text_right">
                                                                        <div class="proceed-button pull-left " >
                                                                            <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn btn-danger  checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <div class="tab-pane <?php echo $has_user ? '' : 'active in'; ?> "  id="size_standard">






                                                <div class="row">
                                                    <?php
                                                    $this->load->view('Cart/sizes', array('vtype' => 'items', 'items' => $custome_items));
                                                    ?>


                                                </div>


                                                <div class="cart-page-top table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody id="quantity-holder">
                                                            <tr>
                                                                <td colspan="4" class="text_right">
                                                                    <div class="proceed-button pull-left " >
                                                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn btn-danger " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                    </div>
                                                                    <div class="proceed-button pull-right ">
                                                                        <form action="#" method="post">
                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn btn-danger "  value="measurement">
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

                                            <!--start of custome measurement-->
                                            <div class="tab-pane  text-center" id="bank">
                                                <div class="mt-5 mb-5">
                                                    <p style="margin: 20px 0px 10px;">
                                                        Click here to create your body measurements profile.
                                                    </p>
                                                    <a href=" <?php echo site_url("Cart/measurements"); ?>" class="btn btn-danger  checkout_button_pre " >Proceed For Measurement <i class="fa fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <!--end of custome meausrement-->


                                            <div class="tab-pane " id="cash">
                                                <p style="margin: 20px 0px 10px;">
                                                    Want to copy the fit of a shirt you already have, but aren't sure how to measure it properly?

                                                    Mail us your shirt and our experts will measure it and create a size for you. 



                                                <div class="contact-us-right">
                                                    <b>Send to:</b>
                                                    <br/>
                                                    Shop No. 30, G/F, <br/>Mirador Mansion, 1-J Mody Road, <br/> 54-64 Nathan Road, Tsim Sha Tsui,<br/> Kowloon, Hong Kong<br>(MTR Exit No. N5)<br>
                                                    <span class="text-black">Email:</span> <a href="mailto:rftailor@biznetvigator.com" title="rftailor@biznetvigator.com">rftailor@biznetvigator.com, sales@rahmanfashions.com/</a><br>
                                                    <span class="text-black">Phone:</span> <a href="tel:+852 2369 1196">+(852) 2369 1196</a>

                                                </div>
                                                </p>
                                                <div class="cart-page-top table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody id="quantity-holder">
                                                            <tr>
                                                                <td colspan="4" class="text_right">
                                                                    <div class="proceed-button pull-left " >
                                                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn btn-danger checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                    </div>
                                                                    <div class="proceed-button pull-right ">
                                                                        <form action="#" method="post">
                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn btn-danger  checkout_button_next "  value="measurement">
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
                                                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn btn-danger  checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                    </div>
                                                                    <div class="proceed-button pull-right ">
                                                                        <form action="#" method="post">
                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn btn-danger  checkout_button_next "  value="measurement">
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
    var itemarrays = "<?php echo implode("-", $items_array) ?>";
    var avaiblecredits = 0;
    var user_id = "<?php echo $has_user; ?>";</script>



<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/preMeasurementCheckController.js"></script>
<?php
$this->load->view('layout/footer', array('custom_item' => 0, 'custom_id' => 0));
?>
<script>

    App.controller('measurementController', function ($scope, $http, $timeout, $interval) {

    $scope.measurementstyle = {'title': 'Standard Size - M'};
    $scope.predefine = {'1': ['Shirt'],
            '2': ['Jacket', 'Pant'],
            '3': ['Pant'],
            '4': ['Jacket'],
    };
    $scope.standard_measurement1 = {'Shirt': '16L(Shirt)', 'Jacket': '34(Jacket)', 'Suit': '34(Jacket)', 'Pant': '32S(Pant)'};
    $scope.standard_measurement = {'Shirt': '', 'Jacket': '', 'Pant': ''};
    var cussta = custom_items.split(", ")
            $timeout(function () {
            for (i in cussta) {
            var temp = $scope.predefine[cussta[i]];
            for (k in temp) {
            $scope.standard_measurement[temp[k]] = $scope.standard_measurement1[temp[k]];
//            $(".activemeasurement" + temp[k]).click();
            }


            }
//            $scope.slidedemostandard();
            }, 500)


//        $("#measurement_profile_M").attr("checked", "true");

            $scope.custome_items = <?php echo json_encode($custome_items); ?>;
    $scope.getstandardsize = "<?php echo site_url("Api/getstsize"); ?>";
    $scope.measurementDict = {};
    $scope.slidedemostandard = function () {
    var stsize = [$scope.standard_measurement.Jacket, $scope.standard_measurement.Shirt, $scope.standard_measurement.Pant];
    var trsize = (stsize.join("  ")).trim();
    $scope.measurementstyle.title = trsize.replace("  ", ", ");
    }

    $scope.measurementPreData = {"userdata": []};
    $http.get(baseurl + "Api/getUserPreMeasurementByItem_get/" + custom_items).then(function (rdata) {
    $scope.measurementPreData.userdata = rdata.data;
    });
<?php
if ($has_user) {
    ?>
        $scope.measurementstyle.title = "Previous Measurement";
    <?php
}
?>

    });</script>

<script src="<?php echo base_url(); ?>assets/theme/bootstrap/js/bootstrap.min.js"></script> <!-- Bootstrap javascript functions -->
