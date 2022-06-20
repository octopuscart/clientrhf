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
                                            <li  role="presentation" class="active"><a href="#size_standard" data-toggle="tab" role="tab" ng-click="slidedemostandard()">Standard Size</a></li>

                                            <li ><a href="#previouseStyles" data-toggle="tab" role="tab" ng-click="slidedemo('Previouse Measurement')">Select From Previous</a></li>
                                            <li><a href="#bank" data-toggle="tab" role="tab" ng-click="slidedemo('Custom Measurement')">Measure Your Body</a></li>
                                            <li><a href="#cash" data-toggle="tab"  role="tab" ng-click="slidedemo('Mail-in Garments')">Mail-in Garments</a></li>
                                            <li><a href="#cheque" data-toggle="tab" role="tab"  ng-click="slidedemo('Recent Measurement')">For Existing Clients</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="tab-content" style="padding: 2px 35px;">
                                            <div class="tab-pane " id="previouseStyles">
                                                <p style="margin: 20px 0px 10px;">
                                                    If you have purchased from us before, You can select your measurement from your previous measurement profiles.


                                                </p>
                                                <table class="table">
                                                    <?php
                                                    foreach ($previous_measurements as $key => $value) {
                                                        ?>
                                                        <tr>
                                                            <th>
                                                                <h3><?php echo $value["profile"]; ?></h3>
 <button type="button" ng-click="viewStyleOnly(style.cart_data.item_name, style.style)" class="btn btn-default"  style="padding: 5px 21px;
                                        line-height: normal;
                                        margin-top: 10px;">View</button>
                                                            </th>
                                                            <td>
                                                                <?php
                                                                $itemslistpre = explode(", ", $value["measurement_items"]);
                                                                $itemslistpreunique = array_unique($itemslistpre);

                                                                echo implode(", ", $itemslistpreunique);
                                                                ?>

                                                            </td>
                                                           

                                                            <td>Created On: <?php echo $value["datetime"]; ?></td>
 <td>                                
                                                                <button type="button" ng-click="addToCartCustomeFromPre(style.cart_data.id, false, true)" class="btn btn-warning"  >Apply Measurement</button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>

                                                </table>
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
                                            <div class="tab-pane  active in"  id="size_standard">






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
                                            <div class="tab-pane  " id="bank">
                                                <form action="#" method="post">
                                                    <p>
                                                    <table class="table table-responsive table-striped">
                                                        <tr>
                                                            <td style="width: 150px;">Measurements</td>
                                                            <td class="text-center" style="    width: 100%;">Tap to select and slide left to right to change value</td>
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
                                                                        <!--<img src="<?php echo $vimg; ?>" class="measurement_img">-->
                                                                        <h4 class="measurement_lable">
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
                                                                            <a href=" <?php echo site_url("Cart/checkoutInit"); ?>" class="btn btn-danger  checkout_button_pre " ><i class="fa fa-arrow-left"></i> View Cart</a>
                                                                        </div>
                                                                        <div class="proceed-button pull-right ">

                                                                            <input class="input_display_none" type ="hidden1" name="measurement_type" ng-model="measurementstyle.title"  >
                                                                            <button type="submit" name="submit_measurement" class="btn btn-danger  checkout_button_next "  value="measurement">
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
    var avaiblecredits = 0;</script>



<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
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

<script src="<?php echo base_url(); ?>assets/theme/bootstrap/js/bootstrap.min.js"></script> <!-- Bootstrap javascript functions -->
