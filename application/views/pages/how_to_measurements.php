<?php
$this->load->view('layout/header');
?>
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



    .measurement_text{font-size: 20px;
                      margin-top: 100px;
                      float: left;    font-family: sans-serif;
    }
    .fr_value{
        font-size: 15px;
        margin-top: -7px;
        margin-top: 90px;
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

<!-- start page header -->
<div class="page-header bg-image" style="background: url(<?php echo base_url(); ?>assets/theme/images/older-man-in-suit-banner.jpg);background-size: cover;height: 150px;">
    <h1 class="text-white">How To Measure</h1>
</div>
<div id="page" ng-controller="measurementController">

    <div role="main" class="main">

        <div class="container">
            <div class="" style="margin-top: 50px;">
                <div class="row" style="margin:  0">
                     <p class="col-md-8 text-left">
                    Tap to select and slide left to right to change value.
                </p>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#measurement_enq">
                        Send Measurement
                    </button>
                </div>
               
                </div>

                <div class="container">
                    <div class="catalog">
                        <div class="row">


                            <?php
                            foreach ($measurements as $key => $value) {
                                ?>
                                <div class="col-xs-12 col-sm-12 animation">
                                    <div class="product">

                                        <div class="product-thumb-info row">
                                            <div class="col-md-3">
                                                <div class="product-thumb-info-image">
                                                    <img alt="" class="img-responsive" src="<?php echo base_url(); ?>/assets/mearurements_images/<?php echo $value['image']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="product-thumb-info-content">
                                                    <h4><a><?php echo $key + 1; ?>. <?php echo $value['title']; ?></a></h4>
                                                    <span>
                                                        <?php echo $value['description']; ?>
                                                    </span>
                                                </div>
                                                <div id="slider-pips<?php echo $value['id']; ?>"></div>
                                            </div>
                                            <div class="col-md-1">
                                                <input class="input_display_none" name="measurement_key[]" value="<?php echo $value['title']; ?>">
                                                <input class="input_display_none" name="measurement_value[]" value="{{measurementDict['<?php echo $value['title']; ?>'].mvalue}} {{measurementDict['<?php echo $value['title']; ?>'].frvalue}}">
                                                <span class="measurement_text">{{measurementDict['<?php echo $value['title']; ?>'].mvalue}}</span> <small class="fr_value">{{measurementDict['<?php echo $value['title']; ?>'].frvalue}}"</small>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="col-md-12" style="margin-bottom: 50px;">
                                <center>
                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#measurement_enq">
                        Send Measurement
                    </button>
                                </center>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal  fade" id="measurement_enq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    z-index: 20000000;">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" style="font-size: 15px">
                        Send Measurement
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>



                <!-- Cart Details -->
                <div class="modal-body checkout-form">
                    <div class="custom_block_item">


                        <div class="row cart-details" >

                            <div class="col-md-12">
                                <form method="post" action="#">
                                    <div style="margin-top:10px;">

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 w_xs_full m_xs_bottom_10">
                                                <input type="text" name="last_name" placeholder="Last Name*" class="form-control" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 w_xs_full m_xs_bottom_10" >
                                                <input type="text" name="first_name" placeholder="First Name*" class="form-control" required="">
                                            </div>

                                        </div>
                                        <input type="email" name="email" placeholder="Email*" class="form-control" required="">


                                        <input type="tel" name="contact" placeholder="Contact No." class="form-control">

                                        <textarea name="remark" placeholder="Remark" class="form-control" style="height: 80px;"></textarea>



                                        <ul class="list-group">
                                            <li class="list-group-item" ng-repeat="(mes, mesv) in measurementDict">
                                                <span class="badge">{{mesv.mvalue}} {{mesv.frvalue}}"</span>
                                                {{mes}}
                                                <input class="input_display_none" name="measurement_key[]" value="{{mes}}">
                                                <input class="input_display_none" name="measurement_value[]" value="{{mesv.mvalue}} {{mesv.frvalue}}">
                                                
                                            </li>
                                        </ul>
                                        <hr/>
                                        <button type="submit" name="priceenquiry" class="btn btn-danger">Submit</button>


                                    </div>
                                </form>
                            </div>


                        </div>

                    </div>

                </div>







            </div>
        </div>
    </div>

</div>
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



//        $("#measurement_profile_M").attr("checked", "true");

        $scope.custome_items = <?php echo json_encode(1); ?>;
        $scope.getstandardsize = "<?php echo site_url("Api/getstsize"); ?>";

        console.log($scope.getstandardsize);





        $scope.measurementDict = {};
<?php
foreach ($measurements as $key => $value) {
    ?>
            $scope.measurementDict["<?php echo $value['title']; ?>"] = {'mvalue': <?php echo $value['standard_value']; ?>, 'frvalue': ''};
    <?php
}
?>




<?php
foreach ($measurements as $key => $value) {
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
                        $scope.measurementDict["<?php echo $value['title']; ?>"]["mvalue"] = mvalue;
                        $scope.measurementDict["<?php echo $value['title']; ?>"]["frvalue"] = frmvalue;
                    }, 100)
                });




            }, 1000)


            //  end of slider section
    <?php
}
?>










    })



</script>