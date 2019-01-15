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

</style>
<!-- Slider -->


<div class="" ng-controller="customizationShirtMulti">
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
                                            <div class="elementStyle customization_box_elements fabricblock {{  fab.folder == screencustom.fabric?'active' :'noselected' }}" style="background:url('<?php echo custome_image_server; ?>/coman/output/{{fab.folder}}/cutting20001.png');" > </div>
                                            <p class="fabric_title">{{fab.sku}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--======= IMAGES SLIDER =========-->


                    <div class="col-sm-5 large-detail shirtcontainer multicustom " >
                        <div class="col-sm-3 col-xs-12 fabricblockdesktop customization_items " style="padding: 0">
                            <ul class="nav nav-tabs tabs-left">
                                <li role="presentation" class="{{$index === 0?'active':''}} " ng-repeat="fab in cartFabrics" >
                                    <a href="#fabric_{{fab.folder}}" class="fabricblock_a" aria-controls="collars_area" role="tab" data-toggle="tab" ng-click="selectFabric(fab)">
                                        <div class="elementStyle customization_box_elements fabricblock {{  fab.product_id == screencustom.fabric?'active' :'noselected' }}" style="background:url('<?php echo custome_image_server; ?>/coman/output/{{fab.folder}}/cutting20001.png');" > </div>
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
                                       <?php
                                    $this->load->view('customization/shirtBlock');
                                    ?>
                                     
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

                    <?php
                    $this->load->view('Product/custom_bottom');
                    ?>

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