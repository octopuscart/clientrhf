<?php
$this->load->view('layout/header');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/8.7.1/lazyload.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Bungee|Orbitron|Six+Caps|Wallpoet" rel="stylesheet">

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
                    <div class="col-md-12">
                        <div class="row">
                            <div class='custom_block_slide'> 
                                <div class="item"   ng-repeat="fab in cartFabrics">
                                    <div class=" fabricblockmobile ">
                                        <a href="#fabric_{{fab.folder}}" class="fabricblock_a" aria-controls="collars_area" role="tab" data-toggle="tab" ng-click="selectFabric(fab)">
                                            <div class="elementStyle customization_box_elements fabricblock {{  fab.folder == screencustom.fabric?'active' :'noselected' }}" style="background:url('<?php echo custome_image_server_suit; ?>/{{fab.folder}}/fabric0001.png');" > </div>
                                            <p class="fabric_title">{{fab.folder}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--======= IMAGES SLIDER =========-->


                    <div class="col-sm-5 large-detail shirtcontainer  " >
                        <div class="col-sm-3 col-xs-12 fabricblockdesktop customization_items " style="padding: 0">
                            <ul class="nav nav-tabs tabs-left">
                                <li role="presentation" class="{{$index === 0?'active':''}} " ng-repeat="fab in cartFabrics" >
                                    <a href="#fabric_{{fab.folder}}" class="fabricblock_a" aria-controls="collars_area" role="tab" data-toggle="tab" ng-click="selectFabric(fab)">
                                        <div class="elementStyle customization_box_elements fabricblock {{  fab.folder == screencustom.fabric?'active' :'noselected' }}" style="background:url('<?php echo custome_image_server_suit; ?>/{{fab.folder}}/fabric0001.png');" > </div>
                                        <p class="fabric_title">{{fab.sku}}</p>
                                      
                                    </a>

                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-9 col-xs-12"  style="padding: 0">
                            <div class="tab-content">

                                <div class="tab-pane {{$index === 0?'active':''}}" ng-repeat="fab in cartFabrics" id="fabric_{{fab.folder}}">
                                    <button class="btn btn-default btn-lg custom_rotate_button" ng-click="rotateModel()">
                                        <i class="icon ion-refresh"></i>
                                    </button>
                                    <button class="btn btn-default btn-lg custom_rotate_button show_shirt_button" ng-click="show_shirt('with_shirt')" style="margin-right: 65px;">
                                        <img src="<?php echo base_url(); ?>assets/images/customization_suit/jacket_with_shirt.png" class="show_shirt_image" >
                                    </button>
                                    <button class="btn btn-default btn-lg custom_rotate_button show_shirt_button" ng-click="show_shirt('without_shirt')">
                                        <img src="<?php echo base_url(); ?>assets/images/customization_suit/jacket_without_shirt.png" class="show_shirt_image" >
                                    </button>
                                    <div class="fontview_custom customization_block animated " ng-if="screencustom.view_type == 'front'">
                                        <img src="<?php echo custome_image_server_suit; ?>/lining/{{selecteElements[fab.folder]['Lining Style'].folder}}/back_no_vent0001.png" class="fixpos animated" >

                                        <img src="<?php echo custome_image_server_suit; ?>/shirtcuff.png" class="fixpos animated" ng-if="screencustom.style_select == 'with_shirt'">


                                        <img src="<?php echo custome_image_server_suit; ?>/{{fab.folder}}/sleeve_new_rl_n0001.png" class="fixpos animated" >





                                        <img src="<?php echo custome_image_server_suit; ?>/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in [selecteElements[fab.folder]['Lapel Style & Width'].laple_style[selecteElements[fab.folder]['Jacket Style'].title].elements[0]]">




                                        <img src="<?php echo custome_image_server_suit; ?>/shirto1.png" class="fixpos animated shirt_model" ng-if="screencustom.style_select == 'with_shirt'"> 

                                        <!--front-->
                                        <img src="<?php echo custome_image_server_suit; ?>/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Jacket Style'].elements" >
                                       
                                        <img src="<?php echo custome_image_server_suit; ?>/body_overlay.png" class="fixpos animated shirt_model" >
                                        <img src="<?php echo custome_image_server_suit; ?>/threads/{{selecteElements[fab.folder]['Button Thread'].folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Jacket Style'].button_hole">
                                        <img src="<?php echo custome_image_server_suit; ?>/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Jacket Style'].button_hole" ng-if="selecteElements[fab.folder]['Button Thread'].title=='Matching'">

                                        <!--buttons-->
                                        <img src="<?php echo custome_image_server_suit; ?>/buttons/{{selecteElements[fab.folder]['Buttons'].folder}}/{{img}}.png" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Jacket Style'].buttons" >
                                        <!--buttons-->
                                      <!--<img src="<?php echo custome_image_server_suit; ?>/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Jacket Style'].extra_button" >-->
                                        <img src="<?php echo custome_image_server_suit; ?>/buttons/{{selecteElements[fab.folder]['Buttons'].folder}}/{{img}}.png" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Jacket Style'].extra_button" >
                                         <img src="<?php echo custome_image_server_suit; ?>/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Jacket Style'].overlay" >


                                        <!--breast pocket-->
                                        <img src="<?php echo custome_image_server_suit; ?>/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Breast Pocket'].elements">


                                        <!--lower pocket-->
                                        <img src="<?php echo custome_image_server_suit; ?>/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Lower Pocket'].elements">


                                        <!--Sleeve Buttons-->
                                        <img src="<?php echo custome_image_server_suit; ?>/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Sleeve Buttons'].elements">
                                        <img src="<?php echo custome_image_server_suit; ?>/threads/{{selecteElements[fab.folder]['Button Thread'].folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Sleeve Buttons'].elements" ng-if="selecteElements[fab.folder]['Button Thread'].title!='Matching'">



                                        <img src="<?php echo custome_image_server_suit; ?>/buttons/{{selecteElements[fab.folder]['Buttons'].folder}}/{{img}}.png" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Sleeve Buttons'].buttons" >


                                        <!--laple-->
                                        <img src="<?php echo custome_image_server_suit; ?>/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Lapel Style & Width'].laple_style[selecteElements[fab.folder]['Jacket Style'].title].elements">

                                        <img src="<?php echo custome_image_server_suit; ?>/shirto.png" class="fixpos animated shirt11_model" ng-if="screencustom.style_select == 'with_shirt'">

                                        <!--laple overlay-->
                                        <img src="<?php echo custome_image_server_suit; ?>/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Lapel Style & Width'].laple_style[selecteElements[fab.folder]['Jacket Style'].title].overelay">



                                    </div>   
                                    <div class="backview_custom customization_block  animated " ng-if="screencustom.view_type == 'back'">


                                        <!--pocket-->
                                        <img src="<?php echo custome_image_server_suit; ?>/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Back Vent'].elements">

                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--======= ITEM DETAILS =========-->
                    <div class="col-sm-7 col-xs-12">
                        <!--shirt customization-->
                        <div class="row" style="margin-top: -10px;padding: 5px;">
                            <?php
                            $this->load->view('Product/custome_support_suit');
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row customization_order_block">

                    <div class="col-md-8 col-xs-3">
                        <button class="btn btn-inverse pull-left" style="    padding: 20px 5px;" ng-click="pullUp()"><i class="fa fa-arrow-up"></i></button>
                    </div>
                    <div class="col-md-2 col-xs-5">
                        <div class="total_price_block">
                            <h5> {{fabricCartData['grand_total']|currency:"<?php echo globle_currency_type; ?>"}}</h5>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <button class="btn btn-inverse pull-right" style="    padding: 20px 5px;">
                            Order Now  <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>





                </div>

            </div>
        </section>


    </div>
    <!-- End Content --> 

</div>

<scirpt></scirpt>

<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/ng-suitcustomization.js"></script>


<?php
$this->load->view('layout/footer');
?>