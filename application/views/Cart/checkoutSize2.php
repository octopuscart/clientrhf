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
        float: left;
    }
    .fr_value{
        font-size: 12px;
        margin-top: -7px;
        float: left;
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
                                        <ul>
                                            <li class="active"><a href="#size_standard" data-toggle="tab" aria-expanded="false" ng-click="slidedemo('Standard Size - M')">Standard Size</a></li>
                                            <li><a href="#bank" data-toggle="tab" aria-expanded="true" ng-click="slidedemo('Custom Measurement')">Measure Your Body</a></li>
                                            <li><a href="#cash" data-toggle="tab" aria-expanded="false" ng-click="slidedemo('Mail us a shirt to copy')">Mail us a Shirt to Copy</a></li>
                                            <li><a href="#cheque" data-toggle="tab" aria-expanded="false" ng-click="slidedemo('Shop Stored')">Shop Stored</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="tab-content" style="padding: 2px 35px;">
                                            <div class="tab-pane fade active in"  id="size_standard">
                                                <p>

                                                <div class="row">


                                                    <table class="table"> 
                                                        <tbody>
                                                            <tr style=""> 
                                                                <td><br></td>

                                                                <?php
                                                                $sizearray = ['S', 'M', 'L', 'XL', 'XXL'];
                                                                foreach ($sizearray as $key => $value) {
                                                                    ?>

                                                                    <td class="size_lable">
                                                                        <label for="measurement_profile_<?php echo $value; ?>" class="d_inline_m m_right_10" style="width: 100%" ng-click="slidedemo('Standard Size - <?php echo $value; ?>')">
                                                                            <input type="radio" id="measurement_profile_<?php echo $value; ?>" name="order_measurement_type" class="d_none standard_measurement" value="<?php echo $value; ?>" >
                                                                            <b><?php echo $value; ?></b>
                                                                        </label> 
                                                                    </td> 
                                                                <?php }
                                                                ?>

                                                            </tr>
                                                            <tr> 
                                                                <th>Chest</th> 
                                                                <td>35"-37"</td>
                                                                <td>38"-40"</td>
                                                                <td>41"-43"</td> 
                                                                <td>45"-47"</td> 
                                                                <td>49"-51"</td>
                                                            </tr> 
                                                            <tr> 
                                                                <th>Waist</th> 
                                                                <td>28"-30"</td> 
                                                                <td>31"-33"</td>
                                                                <td>34"-36"</td> 
                                                                <td>38"-40"</td>
                                                                <td>42"-44"</td> 
                                                            </tr> 
                                                            <tr> 
                                                                <th>Hips</th> 
                                                                <td>35"-37"</td>
                                                                <td>38"-40"</td>
                                                                <td>41"-43"</td> 
                                                                <td>44"-46"</td> 
                                                                <td>47"-49"</td> 
                                                            </tr> 
                                                            <tr> 
                                                                <th>Thigh</th>
                                                                <td>21"</td> 
                                                                <td>22"</td> 
                                                                <td>23"</td> 
                                                                <td>24"</td>
                                                                <td>25"</td> 
                                                            </tr>
                                                            <tr>
                                                                <th>Neck</th> 
                                                                <td>14 1/2"</td>
                                                                <td>15 1/2"</td>
                                                                <td>16 1/2"</td> 
                                                                <td>17 1/2"</td>
                                                                <td>18 1/2"</td> 
                                                            </tr> 
                                                            <tr> 
                                                                <th>Sleeve</th> 
                                                                <td>33"</td> 
                                                                <td>34"</td> 
                                                                <td>35"</td> 
                                                                <td>36"</td> 
                                                                <td>37"</td> 
                                                            </tr> 
                                                            <tr> 
                                                                <th>Inseam</th> 
                                                                <td>31 1/2"</td>
                                                                <td>32"</td>
                                                                <td>32 1/2"</td> 
                                                                <td>33"</td>
                                                                <td>33 1/2"</td> 
                                                            </tr> 
                                                        </tbody>
                                                    </table>


                                                </div>

                                                </p>
                                                <div class="cart-page-top table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody id="quantity-holder">
                                                            <tr>
                                                                <td colspan="4" class="text_right">
                                                                    <div class="proceed-button pull-left " >
                                                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn-apply-coupon checkout_button_pre disabled" ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                    </div>
                                                                    <div class="proceed-button pull-right ">
                                                                        <form action="#" method="post">
                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn-apply-coupon checkout_button_next disabled"  value="measurement">
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
                                            <div class="tab-pane fade " id="bank">
                                                <form action="#" method="post">
                                                    <p>
                                                    <table class="table table-responsive table-striped">
                                                        <tr>
                                                            <td style="width: 150px;">Measurements</td>
                                                            <td class="text-center">Tap to select and slide left to right to change value</td>
                                                            <!--<td style="width: 150px;"></td>-->
                                                            <td style="width: 100px">Values <br><span style="font-size: 9px;">(In Inches)</span></td>
                                                        </tr>
                                                        <!--custome meausrements-->
                                                        <?php
                                                        foreach ($measurements_list as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <th>
                                                                    <?php
                                                                    $vlname = $value['title'];
                                                                    echo $vlname;
                                                                    echo "<input class='input_display_none' name='measurement_title[]' value='$vlname'>"
                                                                    ?>

                                                                </th>
                                                                <td>

                                                                    <div id="slider-pips<?php echo $value['id']; ?>"></div>

                                                                </td>
        <!--                                                            <td>
                                                                    <select name="measurement_<?php echo $value['id']; ?>" ng-model="measurement_<?php echo $value['id']; ?>" ng-init="measurement_<?php echo $value['id']; ?> =<?php echo $value['standard_value']; ?>">
                                                                <?php
                                                                for ($i = $value['min_value']; $i <= $value['max_value']; $i++) {
                                                                    $vl1 = $i;

                                                                    echo "<option value='$vl1' " . ($value['standard_value'] == $i ? "selected" : '') . ">$vl1</option>";
                                                                }
                                                                ?>
                                                                    </select>
                                                                    <select ng-model="measurement_<?php echo $value['id']; ?>_fr">
                                                                        <option></option>
                                                                        <option value="1/8">1/8</option>
                                                                        <option value="1/4">1/4</option>
                                                                        <option value="3/8">3/8</option>
                                                                        <option value="1/2">1/2</option>
                                                                        <option value="5/8">5/8</option>
                                                                        <option value="3/4">3/4</option>
                                                                        <option value="7/8">7/8</option>
                                                                    </select>

                                                                </td>-->

                                                                <td>
                                                                    <input class="input_display_none" name="measurement_value[]" value="{{measurementDict['m<?php echo $value['id']; ?>'].mvalue}} {{measurementDict['m<?php echo $value['id']; ?>'].frvalue}}">
                                                                    <span class="measurement_text">{{measurementDict['m<?php echo $value['id']; ?>'].mvalue}}</span> <small class="fr_value">{{measurementDict['m<?php echo $value['id']; ?>'].frvalue}}"</small>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </table>



                                                    </p>
                                                    <div class="cart-page-top table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody id="quantity-holder">
                                                                <tr>
                                                                    <td colspan="4" class="text_right">
                                                                        <div class="proceed-button pull-left " >
                                                                            <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn-apply-coupon checkout_button_pre disabled" ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                        </div>
                                                                        <div class="proceed-button pull-right ">

                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn-apply-coupon checkout_button_next disabled"  value="measurement">
                                                                                Choose Shipping Address <i class="fa fa-arrow-right"></i>
                                                                            </button>

                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </form>
                                            </div>
                                            <!--end of custome meausrement-->


                                            <div class="tab-pane fade" id="cash">
                                                <p style="margin: 20px 0px 10px;">
                                                    Want to copy the fit of a shirt you already have, but aren't sure how to measure it properly?

                                                    Mail us your shirt and our experts will measure it and create a size for you. 



                                                <div class="contact-us-right">
                                                    <b>Send to:</b>
                                                    <br/>
                                                    2nd Floor, 45 Haiphong Road,
                                                    <br/>
                                                    Tsim Sha Tsui, Kowloon, Hong Kong.<br/>
                                                    <i class="fa fa-envelope"></i> info@bespoketailorshk.com<br/>
                                                    <i class="fa fa-phone"></i> +(852) 27308566

                                                </div>
                                                </p>
                                                <div class="cart-page-top table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody id="quantity-holder">
                                                            <tr>
                                                                <td colspan="4" class="text_right">
                                                                    <div class="proceed-button pull-left " >
                                                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn-apply-coupon checkout_button_pre disabled" ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                    </div>
                                                                    <div class="proceed-button pull-right ">
                                                                        <form action="#" method="post">
                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn-apply-coupon checkout_button_next disabled"  value="measurement">
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

                                            <div class="tab-pane fade" id="cheque">
                                                <p style="margin: 20px 0px 10px;">
                                                    If you have purchased from us before, we have stored your most recent measurement on record.

                                                </p>
                                                <div class="cart-page-top table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody id="quantity-holder">
                                                            <tr>
                                                                <td colspan="4" class="text_right">
                                                                    <div class="proceed-button pull-left " >
                                                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn-apply-coupon checkout_button_pre disabled" ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                    </div>
                                                                    <div class="proceed-button pull-right ">
                                                                        <form action="#" method="post">
                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn-apply-coupon checkout_button_next disabled"  value="measurement">
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
        var avaiblecredits =<?php echo $user_credits | 0; ?>;</script>

<?php
$this->load->view('layout/footer');
?>
<script>

    App.controller('measurementController', function ($scope, $http, $timeout, $interval) {

        $scope.measurementstyle = {'title': 'Standard Size - M'};

        $("#measurement_profile_M").attr("checked", "true");
        $scope.measurementDict = {};
<?php
foreach ($measurements_list as $key => $value) {
    ?>
            $scope.measurementDict["m<?php echo $value['id']; ?>"] = {'mvalue': <?php echo $value['standard_value']; ?>, 'frvalue': ''};
    <?php
}
?>




<?php
foreach ($measurements_list as $key => $value) {
    ?>
            //slider section start
            $timeout(function () {
//                $("#measurement_profile_M").click();
                $("#measurement_profile_M").attr("checked", "true");

                var pipsSlider<?php echo $value['id']; ?> = document.getElementById('slider-pips<?php echo $value['id']; ?>');
                noUiSlider.create(pipsSlider<?php echo $value['id']; ?>, {
                    start: [<?php echo $value['standard_value']; ?>],
                    connect: true,
                    step: 0.125,
                    tooltips: [true, ],
                    range: {
                        'min': <?php echo $value['min_value']; ?>,
                        'max': <?php echo $value['max_value']; ?>
                    }
                });
                pipsSlider<?php echo $value['id']; ?>.noUiSlider.on('update', function (values, handle) {
                    var value = values[handle];
                    var mvalue = ("" + value).split(".")[0];
                    var frvalue = ("" + value).split(".")[1];
                    var frdict = {13: "1/8", 25: "1/4", 38: "3/8", 50: "1/2", 63: "5/8", 75: "3/4", 88: "7/8"};
                    var frmvalue = frdict[frvalue];
                    $timeout(function () {
                        $scope.measurementDict["m<?php echo $value['id']; ?>"]["mvalue"] = mvalue;
                        $scope.measurementDict["m<?php echo $value['id']; ?>"]["frvalue"] = frmvalue;
                    }, 100)
                });




            }, 1000)


            //  end of slider section
    <?php
}
?>

        $scope.slidedemo = function (mestitle) {
            $scope.measurementstyle.title = mestitle;
            var sliderval = <?php echo $measurements_list[0]['id']; ?>;
            var svalue = <?php echo $measurements_list[0]['standard_value']; ?>;
            var pipsSlider123 = document.getElementById('slider-pips' + sliderval);
//       $(".noUi-tooltip").first().show("slow")
            $timeout(function () {

                pipsSlider123.noUiSlider.set([svalue + 20, null]);
                $timeout(function () {
//                    $(".noUi-tooltip").first().css("display", "none")
                    pipsSlider123.noUiSlider.set([svalue, null]);
                }, 700)
            }, 1000)


        }




    })



</script>