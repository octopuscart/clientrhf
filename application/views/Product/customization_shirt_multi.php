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
    .frame {

        font-family: sans-serif;
        overflow: hidden;
        /*width: 25vw;*/
        /*margin: 3vw;*/
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
                                            <div class="elementStyle customization_box_elements fabricblock {{  fab.folder == screencustom.fabric?'active' :'noselected' }}" style="background:url('<?php echo custome_image_server; ?>/output/{{fab.folder}}/cloth0001.png');" > </div>
                                            <p class="fabric_title">{{fab.sku}}</p>
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
                                        <div class="elementStyle customization_box_elements fabricblock {{  fab.folder == screencustom.fabric?'active' :'noselected' }}" style="background:url('<?php echo imageserver; ?>/{{fab.file_name2}};" > </div>
                                        <p class="fabric_title">{{fab.sku}}</p>
                                    </a>

                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-9 col-xs-12"  style="padding: 0">
                            <div class="tab-content">
                                <div class="tab-pane {{$index === 0?'active':''}} frame" ng-repeat="fab in cartFabrics" id="fabric_{{fab.folder}}">
                                    <button class="btn btn-default btn-lg custom_rotate_button" ng-click="rotateModel()">
                                        <i class="icon ion-refresh"></i>
                                    </button>
                                    <div class="fontview_custom customization_block animated zoom" ng-if="screencustom.view_type == 'front'">
                                        <div ng-if="selecteElements[screencustom.fabric]['Monogram Initial']">
                                            <div class="monogramtext_posistion
                                                 {{selecteElements[fab.folder]['Cuff & Sleeve'].monogram_change_css?selecteElements[fab.folder]['Cuff & Sleeve'].monogram_change_css :selecteElements[fab.folder]['Monogram'].css_class}} 
                                                 {{selecteElements[fab.folder]['Pocket'].monogram_change_css?selecteElements[fab.folder]['Pocket'].monogram_change_css :selecteElements[fab.folder]['Monogram'].css_class}} 
                                                 monogramcss_main"
                                                 style="
                                                 background: {{selecteElements[fab.folder]['Monogram Background']}};
                                                 color: {{selecteElements[fab.folder]['Monogram Color']}};

                                                 {{selecteElements[fab.folder]['Monogram'].title=='Collar'?selecteElements[fab.folder]['Collar'].monogram_style:''}} ;
                                                 margin-left: {{(-1) * (2 * (selecteElements[screencustom.fabric]['Monogram Initial'].length - 3))}}px;z-index:2000;
                                                 {{selecteElements[screencustom.fabric]['Monogram Font'].font_style}};
                                                 " 
                                                 ng-if="selecteElements[fab.folder]['Monogram'].title != 'No'">
                                                {{selecteElements[screencustom.fabric]['Monogram Initial']}}
                                            </div>
                                        </div>
                                        <!--cuff section-->
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Cuff & Sleeve'].sleeve1">

                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Bottom'].elements">
                                        
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Cuff & Sleeve'].elements">
                                        <img src="<?php echo custome_image_server; ?>/output/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Cuff & Sleeve'].overlay">

                                        <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Cuff Insert']}}/{{img}}" class="fixpos animated"  ng-repeat="img in selecteElements[fab.folder]['Cuff & Sleeve'].insert_full" style="{{selecteElements[fab.folder]['Cuff & Sleeve'].style}}"  ng-if="selecteElements[fab.folder]['Cuff Insert Full'] == 'Full Insert'">
                                        <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Cuff Insert']}}/{{selecteElements[fab.folder]['Cuff & Sleeve'].insert_style}}" class="fixpos animated" style="{{selecteElements[fab.folder]['Cuff & Sleeve'].insert_style_css}}"    ng-if="selecteElements[fab.folder]['Cuff Insert'] != 'No'">
                                        <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Cuff & Sleeve'].insert_overlay}}" class="fixpos animated" style="{{selecteElements[fab.folder]['Cuff & Sleeve'].insert_overlay_css}}"   ng-if="selecteElements[fab.folder]['Cuff Insert'] != 'No'"   >

                                        <div ng-if="selecteElements[fab.folder]['Cuff Insert Full'] == 'Outer'">
                                            <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{selecteElements[fab.folder]['Cuff & Sleeve'].insert_style}}" class="fixpos animated"  style="{{selecteElements[fab.folder]['Cuff & Sleeve'].insert_style_css}};    z-index: 200;"  >
                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Cuff Insert']}}/{{img}}" class="fixpos animated"  ng-repeat="img in selecteElements[fab.folder]['Cuff & Sleeve'].insert_full" style="{{selecteElements[fab.folder]['Cuff & Sleeve'].style}}" >
                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Cuff & Sleeve'].insert_overlay}}" class="fixpos animated" style="{{selecteElements[fab.folder]['Cuff & Sleeve'].insert_overlay_css}};    z-index: 200;"   ng-if="(selecteElements[fab.folder]['Cuff Insert'] != 'No')"   >
                                        </div>
                                        
                                        <img src="<?php echo custome_image_server; ?>/buttonemrald/{{selecteElements[fab.folder]['Cuff & Sleeve'].buttons}}" class="fixpos animated" ng-if="selecteElements[fab.folder]['Cuff & Sleeve'].buttons" >

                                        <!--pocket-->
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Pocket'].elements">



                                        <!--collar section-->
                                        <div  ng-if="selecteElements[fab.folder]['Collar Insert'] != 'No'">
                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Collar Insert']}}/{{selecteElements[fab.folder]['Collar'].insert_style}}" class="fixpos animated" style="{{selecteElements[fab.folder]['Collar'].insert_style_css}}"   >
                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Collar'].insert_overlay}}" class="fixpos animated" style="  z-index: 200;">
                                            <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Collar'].elements" >
                                        </div>
                                        <!--collar band-->
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/collar_m_comman_insert20001.png" class="fixpos animated"  ng-if="selecteElements[fab.folder]['Collar Insert'] == 'No'">
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/collar_m_comman_band40001.png" class="fixpos animated"  >
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Collar'].elements">

                                        <div ng-if="selecteElements[fab.folder]['Collar Insert Full'] == 'Outer'">
                                            <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/collar_m_comman_insert20001.png" class="fixpos animated"  >
                                            <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/collar_m_comman_band40001.png" class="fixpos animated"  >
                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Collar Insert']}}/collar_m_comman_full_insert0001.png" class="fixpos animated"  >

                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Collar Insert']}}/{{img}}" class="fixpos animated"  ng-repeat="img in selecteElements[fab.folder]['Collar'].insert_full" style="{{selecteElements[fab.folder]['Collar'].element}}" >
                                        </div>

                                        <div ng-if="selecteElements[fab.folder]['Collar Insert Full'] == 'Full Insert'">
                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Collar Insert']}}/collar_m_comman_insert20001.png" class="fixpos animated"  ng-if="selecteElements[fab.folder]['Collar Insert'] == 'No'">
                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Collar Insert']}}/collar_m_comman_band40001.png" class="fixpos animated"  >

                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Collar Insert']}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Collar'].elements">

                                        </div>



                                        <img src="<?php echo custome_image_server; ?>/output/{{selecteElements[fab.folder]['Collar'].button_down}}" class="fixpos animated" style="margin-left: -3px;" ng-if="selecteElements[fab.folder]['Collar'].button_down">
                                        <!--<img src="http://w2p.nitafashions.com/output_insert/p23/pocket_l0001.png" class="fixpos animated" >-->

                                        <!--<img src="http://w2p.nitafashions.com/output_insert/{{selecteElements[fab.folder]['Collar Insert']}}/pocket_border_l0001.png" class="fixpos animated" >-->
                                        <img src="<?php echo custome_image_server; ?>/buttonemrald/button_front0001.png" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Front'].elements">



                                    </div>   
                                    <div class="backview_custom customization_block  animated " ng-if="screencustom.view_type == 'back'">
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" ng-repeat="img in selecteElements[fab.folder].sleeve" class="fixpos animated" >

                                        <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Collar Insert']}}/back_collar0001.png" class="fixpos animated" ng-if="selecteElements[fab.folder]['Collar Insert Full'] == 'Full Insert'">
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/back_collar0001.png" class="fixpos animated" ng-if="selecteElements[fab.folder]['Collar Insert Full'] != 'Full Insert'">

                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Back'].elements" >


                                        <img src="<?php echo custome_image_server; ?>/output/{{selecteElements[fab.folder]['Back'].overlay}}" class="fixpos animated" ng-if="selecteElements[fab.folder]['Back'].overlay">




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
                            $this->load->view('Product/custome_support');
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
<script src="<?php echo base_url(); ?>assets/theme/angular/ng-shirtcustomization.js"></script>


<?php
$this->load->view('layout/footer');
?>