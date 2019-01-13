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






<!-- Inner Page Banner Area End Here -->

<!-- Content -->


<div class="cart-page-area"  ng-controller="measurementController">
    <div class="container" ng-if="globleCartData.total_quantity">
        <div class="row">

            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'items'));
            ?>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="panel1 panel-default">
                    <div class="panel-heading1" role="tab" id="headingOne">
                        <h4 class=" r_corners wrapper m_bottom_10 bg_light_2  color_dark bg_gradient color_light">
                            <span class="fa-stack">
                                <i class="fa fa-list-ol fa-stack-1x"></i>
                                <i class="ion-bag fa-stack-1x "></i>
                            </span>  Your Size
                            <span  class="process_block"> {{measurementstyle.title}}</span> 

                        </h4>
                    </div>
                    <div class="panel-body1">
                        <div class="clearfix"></div>
                        <div class="cart-page-top table-responsive  product-details2-area">
                            <div class="product-details-tab-area" style="margin: 0;">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul class="nav nav-tabs bg_blue3 tab_measurement" >
                                            <li class="active"><a href="#size_standard" data-toggle="tab" aria-expanded="false" ng-click="slidedemostandard()">Standard Size</a></li>
                                            <li><a href="#bank" data-toggle="tab" aria-expanded="true" ng-click="slidedemo('Custom Measurement')">Measure Your Body</a></li>
                                            <li><a href="#cash" data-toggle="tab" aria-expanded="false" ng-click="slidedemo('Mail-in Garments')">Mail-in Garments</a></li>
                                            <li><a href="#cheque" data-toggle="tab" aria-expanded="false" ng-click="slidedemo('Recent Measurements')">For Existing Clients</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="tab-content" style="padding: 2px 35px;">
                                            <div class="tab-pane fade active in"  id="size_standard">



                                                <div class="row">
                                                    <?php
                                                    $this->load->view('Cart/sizes', array('vtype' => 'items'));
                                                    ?>


                                                </div>


                                                <div class="cart-page-top table-responsive">

                                                    <table class="table table-hover">
                                                        <tbody id="quantity-holder">
                                                            <tr>
                                                                <td colspan="4" class="text_right">
                                                                    <div class="proceed-button pull-left " >
                                                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                    </div>
                                                                    <div class="proceed-button pull-right ">
                                                                        <form action="#" method="post">
                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn-apply-coupon btn btn-info btn-lg checkout_button_next "  value="measurement">
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
                                                            $vlname = $value['title'];
                                                            $vimg = $value['imagespath'];
                                                            ?>
                                                            <tr style="height: 150px;">
                                                                <th>


                                                            <div class="thumbnail" style="margin-bottom: 0px;">
                                                                <img src="<?php echo $vimg; ?>" class="measurement_img">
                                                                <h4 class="measurement_lable" style="font-size: 15px;    text-align: center;">
                                                                    <?php
                                                                    echo $vlname;
                                                                    echo "<input class='input_display_none' name='measurement_title[]' value='$vlname'>"
                                                                    ?>    

                                                                </h4>

                                                            </div>



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
                                                                            <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                        </div>
                                                                        <div class="proceed-button pull-right ">

                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn-apply-coupon btn btn-info btn-lg checkout_button_next "  value="measurement">
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
                                                    Want to copy the fit of a cloth you already have, but aren't sure how to measure it properly?

                                                    Mail us your cloth and our experts will measure it and create a size for you. 



                                                <div class="contact-us-right">
                                                    <b>Send to:</b><br/>
                                                    Shop# 13, G/F, Wing Lee Building,<br/>
                                                    27-33 Kimberley Rd, Tsim Sha Tsui,<br/>
                                                    Hong Kong<br/>
                                                    <i class="fa fa-envelope"></i>  john@perfectfashion.com.hk<br/>
                                                    <i class="fa fa-phone"></i> +(852) 6626 4429  

                                                </div>
                                                </p>
                                                <div class="cart-page-top table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody id="quantity-holder">
                                                            <tr>
                                                                <td colspan="4" class="text_right">
                                                                    <div class="proceed-button pull-left " >
                                                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                    </div>
                                                                    <div class="proceed-button pull-right ">
                                                                        <form action="#" method="post">
                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn-apply-coupon btn btn-info btn-lg checkout_button_next "  value="measurement">
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
                                                                        <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                    </div>
                                                                    <div class="proceed-button pull-right ">
                                                                        <form action="#" method="post">
                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn-apply-coupon btn btn-info btn-lg checkout_button_next "  value="measurement">
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



<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
<?php
$this->load->view('layout/footer');
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
                    $(".activemeasurement" + temp[k]).click();
                }


            }
            $scope.slidedemostandard();
        }, 500)


//        $("#measurement_profile_M").attr("checked", "true");

        $scope.custome_items = <?php echo json_encode($custome_items); ?>;
        $scope.getstandardsize = "<?php echo site_url("Api/getstsize"); ?>";

        console.log($scope.getstandardsize);





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

            console.log($scope.standard_measurement);

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

        $scope.slidedemostandard = function () {
            console.log($scope.standard_measurement);
            var stsize = [$scope.standard_measurement.Jacket, $scope.standard_measurement.Shirt, $scope.standard_measurement.Pant];

            var trsize = (stsize.join("  ")).trim();
            $scope.measurementstyle.title = trsize.replace("  ", ", ");
            console.log("--" + (stsize.join(" ")).trim() + "--");
        }






    })



</script>