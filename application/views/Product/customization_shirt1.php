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


    <!-- Content -->
    <div id="content"> 

        <!--======= PAGES INNER =========-->
        <section class="item-detail-page padding-top-30 ">
            <div class="container" style="width: 100%">
                <div class="row"> 


                    <!--======= IMAGES SLIDER =========-->


                    <div class="col-sm-5 large-detail shirtcontainer  " >

                        <div class="col-sm-12 col-xs-12"  style="padding: 0">
                            <div class="">
                                <div class=" frame" ng-repeat="fab in [cartFabrics[0]]" id="fabric_{{fab.folder}}">
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

                                        <!--buttom-->
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Bottom'].elements">


                                        <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Cuff Insert']}}/{{selecteElements[fab.folder]['Cuff & Sleeve'].insert_style}}" class="fixpos animated"   ng-if="selecteElements[fab.folder]['Cuff Insert'] != 'No'">
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Cuff & Sleeve'].insertele">

                                        <div ng-if="selecteElements[fab.folder]['Cuff Insert Full'] == 'Outer'">
                                            <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{selecteElements[fab.folder]['Cuff & Sleeve'].insert_style}}" class="fixpos animated"   >
                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Cuff Insert']}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Cuff & Sleeve'].inserteleo">
                                        </div>

                                        <div ng-if="selecteElements[fab.folder]['Cuff Insert Full'] == 'Full Insert'">
                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Cuff Insert']}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Cuff & Sleeve'].elements" >
                                        </div>

                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Cuff & Sleeve'].elements" ng-if="selecteElements[fab.folder]['Cuff Insert'] == 'No'">



                                        <img src="<?php echo custome_image_server; ?>/whitebutton/{{selecteElements[fab.folder]['Cuff & Sleeve'].buttons}}" class="fixpos animated" ng-if="selecteElements[fab.folder]['Cuff & Sleeve'].buttons" >




                                        <!--collar section-->
                                        <div  ng-if="selecteElements[fab.folder]['Collar Insert'] != 'No'">
                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Collar Insert']}}/{{selecteElements[fab.folder]['Collar'].insert_style}}" class="fixpos animated" style="{{selecteElements[fab.folder]['Collar'].insert_style_css}}"   >
                                            <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Collar'].insert_overlay}}" class="fixpos animated" style="  z-index: 200;">
                                            <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Collar'].elements" >
                                        </div>
                                        <!--collar band-->
                                        <!--<img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/collar_m_comman_insert20001.png" class="fixpos animated"  ng-if="selecteElements[fab.folder]['Collar Insert'] == 'No'">-->
                                        <!--<img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/collar_m_comman_band40001.png" class="fixpos animated"  >-->
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Collar'].elements">
                                        <img src="<?php echo custome_image_server; ?>/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Collar'].overlay">


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

                                        <!--pocket-->
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Pocket'].elements">



                                        <img src="<?php echo custome_image_server; ?>/output/{{selecteElements[fab.folder]['Collar'].button_down}}" class="fixpos animated" style="margin-left: -3px;" ng-if="selecteElements[fab.folder]['Collar'].button_down">
                                        <!--<img src="http://w2p.nitafashions.com/output_insert/p23/pocket_l0001.png" class="fixpos animated" >-->

                                        <!--<img src="http://w2p.nitafashions.com/output_insert/{{selecteElements[fab.folder]['Collar Insert']}}/pocket_border_l0001.png" class="fixpos animated" >-->

                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Front'].elements">

                                        <img src="<?php echo custome_image_server; ?>/overlay/button_front0001.png" class="fixpos animated" ng-if="selecteElements[fab.folder]['Front'].show_buttons == 'true'">

                                        <!--<img src="<?php echo custome_image_server; ?>/overlay/frontoverlay.png" class="fixpos animated" ng-if="selecteElements[fab.folder]['Front'].show_buttons == 'true'">-->


                                    </div>   
                                    <div class="backview_custom customization_block  animated " ng-if="screencustom.view_type == 'back'" style="margin-top: -10px;">

                                        <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.folder]['Collar Insert']}}/b_collar0001.png" class="fixpos animated" ng-if="selecteElements[fab.folder]['Collar Insert Full'] == 'Full Insert'">
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/b_collar0001.png" class="fixpos animated" ng-if="selecteElements[fab.folder]['Collar Insert Full'] != 'Full Insert'">
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" ng-repeat="img in selecteElements[fab.folder].sleeve" class="fixpos animated" >

                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.folder]['Back'].elements" >







                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--======= ITEM DETAILS =========-->
                    <div class="col-sm-7 col-xs-12">
                        <!--shirt customization-->
                        <div class="row" style="margin-top:10px;padding: 5px;">
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

<script>
    var product_id = <?php echo $productdetails['id']; ?>;

</script>
<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/ng-shirtcustomization.js"></script>


<?php
$this->load->view('layout/footer');
?>