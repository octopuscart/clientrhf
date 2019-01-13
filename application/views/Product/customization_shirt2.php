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
                <div class="row m_bottom_30"> 
                    <!--======= IMAGES SLIDER =========-->
                    <div class="col-sm-5 large-detail shirtcontainer  " >

                        <div class="col-sm-12 col-xs-12"  style="padding: 0">
                            <div class="">
                                <div class=" frame1" ng-repeat="fab in [cartFabrics[0]]" id="fabric_{{fab.product_id}}">
                                    <button class="btn btn-default btn-lg custom_rotate_button" ng-click="rotateModel()">
                                        <i class="icon ion-refresh"></i>
                                    </button>
                                    <div class="fontview_custom customization_block animated zoom" ng-if="screencustom.view_type == 'front'">
                                        <div ng-if="selecteElements[screencustom.fabric]['Monogram Initial']">
                                            <div class="monogramtext_posistion
                                                 {{selecteElements[fab.product_id]['Cuff & Sleeve'].monogram_change_css?selecteElements[fab.product_id]['Cuff & Sleeve'].monogram_change_css :selecteElements[fab.product_id]['Monogram'].css_class}} 
                                                 {{selecteElements[fab.product_id]['Pocket'].monogram_change_css?selecteElements[fab.product_id]['Pocket'].monogram_change_css :selecteElements[fab.product_id]['Monogram'].css_class}} 
                                                 monogramcss_main"
                                                 style="
                                                 background: {{selecteElements[fab.product_id]['Monogram Background']}};
                                                 color: {{selecteElements[fab.product_id]['Monogram Color']}};

                                                 {{selecteElements[fab.product_id]['Monogram'].title=='Collar'?selecteElements[fab.product_id]['Collar'].monogram_style:''}} ;
                                                 margin-left: {{(-1) * (2 * (selecteElements[screencustom.fabric]['Monogram Initial'].length - 3))}}px;z-index:2000;
                                                 {{selecteElements[screencustom.fabric]['Monogram Font'].font_style}};
                                                 " 
                                                 ng-if="selecteElements[fab.product_id]['Monogram'].title != 'No'">
                                                {{selecteElements[screencustom.fabric]['Monogram Initial']}}
                                            </div>
                                        </div>
                                        <!--cuff section-->
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].sleeve1">


                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/body_front.png" class="fixpos animated" >

                                        <!--front fly-->
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Front'].elements">

                                        <!--buttom-->
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Bottom'].elements">

                                        <!--cuff-->
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/{{img}}" class="fixpos animated"  ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].elements" >
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/{{selecteElements[fab.product_id]['Cuff & Sleeve'].buttons}}" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Cuff & Sleeve'].buttons"  >

                                        <!--collar-->
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Collar'].elements">

                                        <!--pocket-->
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Pocket'].elements">

                                        <!--front button-->
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/front_button.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Front'].show_buttons == 'true'">

                                    </div>   
                                    <div class="backview_custom customization_block  animated " ng-if="screencustom.view_type == 'back'" >
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/body_back.png" class="fixpos animated" >
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/{{img}}" ng-repeat="img in selecteElements[fab.product_id].sleeve" class="fixpos animated" >
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Back'].elements" >
                                        <img src="<?php echo base_url(); ?>assets/images/shirt_elements/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Bottom'].backelements">
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--======= ITEM DETAILS =========-->
                    <div class="col-sm-7 col-xs-12 mobile_bottom_20">
                        <!--shirt customization-->
                        <div class="row" style="margin-top:10px;">
                            <?php
                            $this->load->view('Product/custome_support');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row customization_order_block">
                    <?php
                    $this->load->view('Product/custom_bottom');
                    ?>
                </div>
            </div>
        </section>
    </div>
    <!-- End Content -->  
</div>

<script>
    var product_id = <?php echo $productdetails['id']; ?>;
    var defaut_view = "<?php echo $custom_item; ?>";
    var gcustome_id = <?php echo $custom_id; ?>;

</script>
<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/ng-shirtcustomization.js"></script>
<?php
$this->load->view('layout/footer');
?>