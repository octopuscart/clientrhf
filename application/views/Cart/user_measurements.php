<?php
$this->load->view('layout/header');
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/style_custome.css">

<style>
    #ui-datepicker-div{
        z-index: 200000!important;
    }
    .timeing_open {
        width: 55px;
        float: left;
    }
    .form-control {
        border: 1px solid #e5e5e5;
        border-radius: 0;
        padding: 12px 30px;
        margin-bottom: 10px;
    }
    .product-thumb-info{
        padding: 10px;
        border: 2px solid #f3f3f3;
        margin: 10px;
        /*height: 400px;*/
    }
</style>
<style>
    .noUi-tooltip {
        /*display: none;*/
    }
    .noUi-active .noUi-tooltip {
        display: block;
    }

    .noUi-horizontal{
        margin-top: 60px;
    }



    .measurement_text{
        font-size: 20px;
        /*margin-top: 100px;*/
        float: left;
        font-family: sans-serif;
    }
    .fr_value{
        font-size: 15px;
        margin-top: -7px;
        /*margin-top: 90px;*/
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

<!-- start page header -->
<div class="page-header bg-image" style="height: 50px;">

</div>
<div id="page" ng-controller="measurementController">

    <div role="main" class="main">

        <div class="container">
            <div class="" style="margin-top: 50px;">
                <div class="row" style="margin:  0">
                    <h4>Create Your Measurement Profile</h4>
                    <p class="col-md-8 text-left">
                        Tap to select and slide left to right to change value.
                    </p>


                </div>
                <form action="#" method="post">
                    <div class="container">
                        <div class="catalog">
                            <hr/>
                            <div class="row">
                                <div class="col-md-4" style="overflow-y: auto;height:500px;">
                                    <ul class="nav nav-tabs tabs-left"> 
                                        <li class="list-group-item" style="width: 100%" ng-repeat="(mes, mesv) in measurementDict">
                                            <a  href="#custome{{$index}}" data-toggle="tab" >
                                                <span class="badge">{{mesv.mvalue}} {{mesv.frvalue}}  {{mesv.unit}}</span>
                                                {{mes}}
                                                <input class="input_display_none" name="measurement_key[]" value="{{mes}}">
                                                <input class="input_display_none" name="measurement_value[]" value="{{mesv.mvalue}} {{mesv.frvalue}}">
                                            </a>
                                        </li>
                                        <li class="list-group-item" style="width: 100%">
                                            <a  href="#custome_images" data-toggle="tab" >

                                                User Images
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-8">
                                    <div class="tab-content" style='min-height: 700px;'>
                                        <?php
                                        $counter = 0;
                                        foreach ($measurements_list as $key => $value) {
                                            $mesunit = $value["unit"];
                                            ?>        
                                            <div class="tab-pane {{<?php echo $counter; ?> == 0?'active':''}}" id="custome{{<?php echo $counter; ?>}}" >

                                                <?php
                                                switch ($mesunit) {
                                                    case "kg":
                                                        ?>
                                                        <div class="col-xs-12 col-sm-12 animation">
                                                            <div class="product">

                                                                <div class="product-thumb-info row">

                                                                    <div class="col-md-8">
                                                                        <div class="product-thumb-info-content">
                                                                            <h4><a><?php echo $counter + 1; ?>. <?php echo $value['title']; ?> </a>
                                                                                <small>(<?php echo $value['unit']; ?>)</small>
                                                                            </h4>

                                                                            <span>
                                                                                <?php echo $value['measurement_text']; ?> 
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input class="input_display_none" name="measurement_key[]" value="<?php echo $value['title']; ?>">
                                                                        <select class="form-control" name="measurement_value[]" ng-model="measurementDict['<?php echo $value['title']; ?>'].mvalue"  style="padding: 12px 4px;">
                                                                            <?php
                                                                            for ($ft = $value['min_value']; $ft <= $value['max_value']; $ft++) {
                                                                                echo "<option>" . $ft . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        break;
                                                    case "feet":
                                                        ?>
                                                        <div class="col-xs-12 col-sm-12 animation">
                                                            <div class="product">

                                                                <div class="product-thumb-info row" >

                                                                    <div class="col-md-8">
                                                                        <div class="product-thumb-info-content">
                                                                            <h4><a><?php echo $counter + 1; ?>. <?php echo $value['title']; ?> </a>
                                                                                <small>(<?php echo $value['unit']; ?>)</small>
                                                                            </h4>

                                                                            <span>
                                                                                <?php echo $value['measurement_text']; ?> 
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input class="input_display_none" name="measurement_key[]" value="<?php echo $value['title']; ?>">
                                                                        <select class="form-control" name="measurement_value[]" ng-model="measurementDict['<?php echo $value['title']; ?>'].mvalue"  style="padding: 12px 4px;">
                                                                            <?php
                                                                            for ($ft = $value['min_value']; $ft <= $value['max_value']; $ft++) {
                                                                                for ($ftin = 0; $ftin <= 11; $ftin++) {
                                                                                    echo "<option>" . $ft . ' Ft ' . $ftin . ' In' . "</option>";
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><?php
                                                        break;

                                                    default:
                                                        ?>
                                                        <div class="col-xs-12 col-sm-12 animation">
                                                            <div class="product">

                                                                <div class="product-thumb-info row">

                                                                    <div class="col-md-9">
                                                                        <div class="product-thumb-info-content">
                                                                            <h4><a><?php echo $counter + 1; ?>. <?php echo $value['title']; ?> </a>
                                                                                <small>(<?php echo $value['unit']; ?>)</small>
                                                                            </h4>

                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input class="input_display_none" name="measurement_key[]" value="<?php echo $value['title']; ?>">
                                                                        <input class="input_display_none" name="measurement_value[]" value="{{measurementDict['<?php echo $value['title']; ?>'].mvalue}} {{measurementDict['<?php echo $value['title']; ?>'].frvalue}}">

                                                                        <span class="measurement_text">{{measurementDict['<?php echo $value['title']; ?>'].mvalue}}</span> <small class="fr_value">{{measurementDict['<?php echo $value['title']; ?>'].frvalue}}"</small>

                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div id="slider-pips<?php echo $value['id']; ?>"></div>
                                                                        <hr/>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <?php echo $value['measurement_text']; ?> 
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                }
                                                ?>
                                                <div class="button-next-pre mt-5">
                                                    <div class="proceed-button pull-left " >
                                                        <?php if ($counter) { ?>
                                                            <button type="button"   class="btn-apply-coupon checkout_button_pre btn btn-danger " ng-click="activeTab('custome<?php echo $counter - 1; ?>')"><i class="fa fa-arrow-left"></i> Previouse</button>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="proceed-button pull-right ">
                                                        <button type="button"  class="btn-apply-coupon checkout_button_next btn btn-danger " ng-click="activeTab('custome<?php echo $counter + 1; ?>')"> Next <i class ="fa fa-arrow-right"></i></button>
                                                    </div> 
                                                </div>
                                            </div>
                                            <?php
                                            $counter += 1;
                                        }
                                        ?>
                                        <?php
                                        $counter2 = 0;
                                        foreach ($measurement_posture as $pkey => $pvalue) {
                                            $counter2 += 1;
                                            ?>        
                                            <div class="tab-pane " id="custome{{<?php echo $counter; ?>}}" >


                                                <div class="col-xs-12 col-sm-12 animation">
                                                    <div class="product">

                                                        <div class="product-thumb-info row">

                                                            <div class="col-md-9">
                                                                <div class="product-thumb-info-content">
                                                                    <h4><a><?php echo $counter + 1; ?>. <?php echo $pkey; ?> </a>
                                                                    </h4>

                                                                </div>

                                                            </div>
                                                            <div class="col-md-3">
                                                                <input class="input_display_none" name="measurement_key[]" value="<?php echo $pkey; ?>">
                                                                <input class="input_display_none" name="measurement_value[]" value="{{measurementDict['<?php echo $pkey; ?>'].mvalue}}">

                                                            </div>
                                                            <div class="col-md-12 row">
                                                                <hr/>
                                                            </div>
                                                            <div class="col-md-12 row">

                                                                <?php
                                                                foreach ($pvalue as $pvkey => $pvvalue) {
                                                                    ?>
                                                                    <div class="col-md-4 col-xs-6 custome_element_col" ng-click="selectPosture('<?php echo $pkey; ?>', '<?php echo $pvvalue["title"]; ?>')" >
                                                                        <div class="item elementItem  " >
                                                                            <div >
                                                                                <div class="elementStyle customization_box_element {{  '<?php echo $pvvalue["title"]; ?>' == measurementDict['<?php echo $pkey; ?>'].mvalue?'activestyle' :'noselected' }}" style="background:url('<?php echo ADMINURL; ?>assets/measurements/posture/<?php echo $pvvalue["image"]; ?>')" > </div>
                                                                                <div class='customization_title'>
                                                                                    <?php echo $pvvalue["title"]; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="button-next-pre mt-5">
                                                    <div class="proceed-button pull-left " >
                                                        <button type="button"   class="btn-apply-coupon checkout_button_pre btn btn-danger " ng-click="activeTab('custome<?php echo $counter - 1; ?>')"><i class="fa fa-arrow-left"></i> Previouse</button>
                                                    </div>
                                                    <div class="proceed-button pull-right ">
                                                        <button type="button"  class="btn-apply-coupon checkout_button_next btn btn-danger " ng-click="activeTab('<?php echo $counter2 == count($measurement_posture) ? 'custome_images' : "custome" . ($counter + 1) ?>')"> Next <i class ="fa fa-arrow-right"></i></button>
                                                    </div> 
                                                </div>
                                            </div>
                                            <?php
                                            $counter += 1;
                                        }
                                        ?>

                                        <div class="tab-pane " id="custome_images" >
                                            <p>You can update your images or stitched suit or shirt for more accurate measurement.</p>
                                            <div class='row'>
                                                <?php for ($i = 0; $i <= 3; $i++) { ?>
                                                    <div class="col-md-6">
                                                        <div class="thumbnail" style="border:1px solid #000;margin:10px;">
                                                            <img src="http://localhost/tailoradminv3//assets/product_images/default2.png" style="height:100px;">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="input-group">

                                                                        <div class="custom-file">
                                                                            <input type="file" class="" name='picture[]' id="inputGroupFile01" file-model="filename" >
                                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                        </div>
                                                                        <br/>

                                                                    </div>

                                                                </div>
                                                                <p>W:600px X H:800px</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="button-next-pre mt-5">
                                                <div class="proceed-button pull-left " >
                                                    <button type="button"  class="btn-apply-coupon checkout_button_pre btn btn-danger " ng-click="activeTab('custome<?php echo $counter - 1; ?>')"><i class="fa fa-arrow-left"></i> Previouse</button>
                                                </div>
                                                <div class="proceed-button pull-right ">
                                                    <button type="submit" name="submit_measurement" class="btn-apply-coupon checkout_button_next btn btn-danger " > Save Measurements <i class ="fa fa-arrow-right"></i></button>
                                                </div> 
                                            </div>


                                        </div>



                                    </div>

                                </div>




                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





</div>
<?php
$this->load->view('layout/footer');
?>

<script>

    App.controller('measurementController', function ($scope, $http, $timeout, $interval) {

    $scope.activeTab = function (customid) {

    $('a[href="#' + customid + '"]').click();
    }

    $scope.selectPosture = function(posture_title, posture_value){
    $scope.measurementDict[posture_title] = {'mvalue': posture_value, 'frvalue': '', "unit":""};
    console.log($scope.measurementDict[posture_title]);
    }



    $scope.measurementstyle = {'title': 'Standard Size - M'};
    $scope.predefine = {'1': ['Shirt'],
            '2': ['Jacket', 'Pant'],
            '3': ['Pant'],
            '4': ['Jacket'],
    };
    $scope.standard_measurement1 = {'Shirt': '16L(Shirt)', 'Jacket': '34(Jacket)', 'Suit': '34(Jacket)', 'Pant': '32S(Pant)'};
    $scope.standard_measurement = {'Shirt': '', 'Jacket': '', 'Pant': ''};
//        $("#measurement_profile_M").attr("checked", "true");

    $scope.custome_items = <?php echo json_encode(1); ?>;
    $scope.getstandardsize = "<?php echo site_url("Api/getstsize"); ?>";
    console.log($scope.getstandardsize);
    $scope.measurementDict = {};
<?php
foreach ($measurements_list as $key => $value) {
    if ($value['unit'] == 'inch') {
        ?>
            $scope.measurementDict["<?php echo $value['title']; ?>"] = {'mvalue': <?php echo $value['standard_value']; ?>, 'frvalue': '', "unit":"inch"};
        <?php
    } else {
        ?>
            $scope.measurementDict["<?php echo $value['title']; ?>"] = {'mvalue': '<?php echo $value['standard_value']; ?>', 'frvalue': '', "unit":"<?php echo $value['unit']; ?>"};
        <?php
    }
}
foreach ($measurement_posture as $pkey => $pvalue) {
    ?>
        $scope.measurementDict["<?php echo $pkey; ?>"] = {'mvalue': '<?php echo $pvalue[0]['title']; ?>', 'frvalue': '', "unit":""};
    <?php
}
?>




<?php
foreach ($measurements_list as $key => $value) {
    ?>
        //slider section start
        $timeout(function () {
        //                $("#measurement_profile_M").click();

    <?php
    if ($value['unit'] == 'inch') {
        ?>

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
            $scope.measurementDict["<?php echo $value['title']; ?>"]["mvalue"] = mvalue;
            $scope.measurementDict["<?php echo $value['title']; ?>"]["frvalue"] = frmvalue;
            }, 100)


            });
        <?php
    }
    ?>


        }, 1000)


                //  end of slider section
    <?php
}
?>










    })



</script>