<?php
$this->load->view('layout/header');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/8.7.1/lazyload.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Bungee|Orbitron|Six+Caps|Wallpoet" rel="stylesheet">

<!-- get jQuery from the google apis or use your own -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- CSS STYLE-->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/xzoom@1.0.14/dist/xzoom.css" media="all" />

<!-- XZOOM JQUERY PLUGIN  -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/theme/js/jquery.zoom.js"></script>



<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/bootstrap.vertical-tabs.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/style_custome.css">
<style>
    .product_image_back {
        background-size: contain!important;
        background-repeat: no-repeat!important;
        height: 300px!important;
        background-position-x: center!important;
        background-position-y: center!important;
    }

    .productblock{
        padding: 10px;
        border: 1px solid rgba(0, 0, 0, 0.07);
        margin-bottom: 30px;
        box-shadow: 0px 0px 5px #00000017;
    }


    .shirtmodel1{
        margin-top: 7px;
        margin-left: 152px;
        width: 139px;
        height: auto;
    }


    .shirt11_model{
        z-index: 200;
        margin-top: 1px;
        margin-left: -0.5px;
    }

    .shirt_model{
        /*margin-top: 1.50px*/
    }

    .show_shirt_image{
        height: 50px;
    }



    .show_shirt_button{
        right: -30px;
    }

    .pant_model{
        height: 190px;
        width: 596px;
        position: absolute;
        margin-top: 251px;
        left: -160px;
    }



    .frame {

        font-family: sans-serif;
        overflow: hidden;
        width: 25vw;
        margin: 3vw;
        display: inline-block;

        .zoom {

            font-size: 1.3vw;
            transition: transform 0.2s linear;

        }


        img {

            max-width: 25vw;

        }


        .lorem {

            padding: 2% 2%;

        }


        form {

            margin : 2% auto;    
            text-align: center;

            button {

                font-size: inherit;
                margin: inherit;

            }

            input {

                border {
                    radius : 5px;
                    style: 1px solid;
                }    

                width :20vw;
                margin : 2% auto;
                padding: .5vw .8vw;
                font-size: 1.3vw;

            }
        }
    }

    .pantoverlay{
        top: 294px;
        width: 702px;
        left: -149px;
        height: auto;
    }


</style>
<!-- Slider -->


<div class="" ng-controller="customizationShirt">
    <!-- Slider -->
<!--    <section class="sub-bnr" data-stellar-background-ratio="0.5" style="font-weight: 300;
             font-size: 20px;">
        <div class="position-center-center">
            <div class="container">
                <div  class="row">

                </div>
            </div>
        </div>
    </section>-->

    <!-- Content -->
    <div id="content"> 

        <!--======= PAGES INNER =========-->
        <section class="item-detail-page padding-top-30 ">
            <div class="container" style="width: 100%">
                <div class="row"> 


                    <!--======= IMAGES SLIDER =========-->


                    <div class="col-sm-5 large-detail shirtcontainer  " >

                        <div class="col-sm-12 col-xs-12"  style="padding: 0">
                            <div class="tab-content">

                                <div class="{{$index === 0?'active':''}} frame1" ng-repeat="fab in cartFabrics" id="fabric_{{fab.product_id}}">
                                    <!--                                    <button class="btn btn-default btn-lg custom_rotate_button" ng-click="rotateModel()">
                                                                            <i class="icon ion-refresh"></i>
                                                                        </button>
                                                                        <button class="btn btn-default btn-lg custom_rotate_button show_shirt_button" ng-click="show_shirt('with_shirt')" style="margin-right: 65px;">
                                                                            <img src="<?php echo base_url(); ?>assets/images/customization_suit/jacket_with_shirt.png" class="show_shirt_image" >
                                                                        </button>
                                                                        <button class="btn btn-default btn-lg custom_rotate_button show_shirt_button" ng-click="show_shirt('without_shirt')">
                                                                            <img src="<?php echo base_url(); ?>assets/images/customization_suit/jacket_without_shirt.png" class="show_shirt_image" >
                                                                        </button>-->
                                    <div class="fontview_custom customization_block animated zoom "  ng-if="screencustom.view_type == 'front'" >
                                        <img src="<?php echo custome_image_server; ?>/jacket/overlay/shirtoverlay.png" class="fixpos animated" >
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/sleeve_20001.png" class="fixpos animated" style="">

                                        <!--breast pocket-->
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Breast Pocket'].elements">



                                        <!--jacket body left-->

                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].elements" >

                                        <!--buttons-->
                                        <!--<img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}.png" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].buttons2" >-->
                                        <!--jacket body left-->
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in [selecteElements[fab.product_id]['Jacket Style'].left]" >

                                        <!--buttons-->
                                        <img src="<?php echo custome_image_server; ?>/jacket/buttons/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].buttons2" >

                                        <!--jacket body right-->
                                        <img src="<?php echo custome_image_server; ?>/jacket/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].overlay" >
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}//{{img}}" class="fixpos animated" ng-repeat="img in [selecteElements[fab.product_id]['Jacket Style'].right]" >

                                        <!--breast pocket-->
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Breast Pocket'].elements" >
                                        <!--<img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/breast_pocket0001.png" class="fixpos animated" >-->


                                        <!--button holes-->
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].button_hole" >


                                        <!--sleeve half-->
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/sleeve_2_l0001.png" class="fixpos animated" >

                                        <!--button sleeve-->
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Sleeve Buttons'].elements" >
                                        <img src="<?php echo custome_image_server; ?>/jacket/buttons/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Sleeve Buttons'].buttons" >


                                        <!--<img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/buttons_flat1_hole0001.png" class="fixpos animated" >-->





                                        <!--lower pocket-->
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Lower Pocket'].elements">


                                        <img src="<?php echo custome_image_server; ?>/jacket/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Lapel Style'].laple_style[selecteElements[fab.product_id]['Jacket Style'].title].overelay">

                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Lapel Style'].laple_style[selecteElements[fab.product_id]['Jacket Style'].title].elements">


                                        <div class="" ng-if="selecteElements[fab.product_id]['Handstitching'].title == 'Yes'">
                                            <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Lapel Style'].laple_style[selecteElements[fab.product_id]['Jacket Style'].title].stitcing">
                                        </div>

                                        <div class="" ng-if="selecteElements[fab.product_id]['Lapel Button Hole'].title == 'Yes'">
                                            <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Lapel Style'].laple_style[selecteElements[fab.product_id]['Jacket Style'].title].hole" >
                                        </div>

                                        <!--buttons-->
                                        <img src="<?php echo custome_image_server; ?>/jacket/buttons/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].buttons" >




                                    </div>   


                                    <div class="backview_custom customization_block zoom animated " ng-if="screencustom.view_type == 'back'">



                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Back Vent'].elements">
                                        <img src="<?php echo custome_image_server; ?>/jacket/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Back Vent'].overlay">


                                    </div> 


                                    <div class="backview_custom customization_block zoom animated " ng-if="screencustom.view_type == 'pant'">
                                        <!--<img src="<?php echo base_url(); ?>assets/images/pant_elements/base.png" class="fixpos animated">-->
                                        <!--font-->
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Number of Pleat'].elements">
                                        <img src="<?php echo custome_image_server; ?>/jacket/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Front Pocket Style'].elements">  
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Waistband'].elements">
                                        <img src="<?php echo custome_image_server; ?>/jacket/overlay//{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff'].elements">

                                    </div> 


                                    <div class="backview_custom customization_block zoom animated " ng-if="screencustom.view_type == 'pantback'">
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/pant_back_pocket0001.png" class="fixpos animated">
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/pant_back_waistband0001.png" class="fixpos animated">
                                        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Number of Back Pocket'].elements">
                                    </div> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--======= ITEM DETAILS =========-->
                    <div class="col-sm-7 col-xs-12">
                        <!--shirt customization-->
                        <div class="row" style="margin-top: 10px;">
                            <?php
                            $this->load->view('Product/custome_support_suit2');
                            ?> 
                        </div>
                    </div>
                </div>

                <div class="row customization_order_block">

                    <div class="col-md-8 col-xs-3">
                        <button class="btn btn-inverse pull-left" style="padding: 10px 5px;
                                margin-top: 10px;" ng-click="pullUp()"><i class="fa fa-arrow-up"></i></button>
                    </div>
                    <div class="col-md-2 col-xs-5">
                        <div class="total_price_block">
                            <h5> {{screencustom.productobj.price|currency:"<?php echo globle_currency_type; ?>"}}</h5>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <button class="btn btn-inverse pull-right" ng-click="addToCartCustome()" style="padding: 10px 5px;
                                margin-top: 10px;">
                            Add To Cart  <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>

                </div>

            </div>
        </section>


    </div>
    <!-- End Content --> 

</div>

<script>
    var product_id = <?php echo $productdetails['id']; ?>;

</script>

<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme2/angular/ng-suitcustomization2.js"></script>


<?php
$this->load->view('layout/footer');
?>
