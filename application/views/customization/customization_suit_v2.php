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


<div class="" ng-controller="customizationSuitMulti">
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


                    <div class="col-sm-5 large-detail shirtcontainer multicustom " style="    height: 530px;">
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
                                    <!--                                    <button class="btn btn-default btn-lg custom_rotate_button" ng-click="rotateModel()">
                                                                            <i class="icon ion-refresh"></i>
                                                                        </button>
                                                                        <button class="btn btn-default btn-lg custom_rotate_button show_shirt_button" ng-click="show_shirt('with_shirt')" style="margin-right: 65px;">
                                                                            <img src="<?php echo base_url(); ?>assets/images/customization_suit/jacket_with_shirt.png" class="show_shirt_image" >
                                                                        </button>
                                                                        <button class="btn btn-default btn-lg custom_rotate_button show_shirt_button" ng-click="show_shirt('without_shirt')">
                                                                            <img src="<?php echo base_url(); ?>assets/images/customization_suit/jacket_without_shirt.png" class="show_shirt_image" >
</button>-->

                                    <?php
                                    $this->load->view('customization/suitBlock');
                                    ?>
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

    var defaut_view = "<?php echo $custom_item; ?>";
    var gcustome_id = <?php echo $custom_id; ?>;
</script>

<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/ng-suitcustomization2.js"></script>


<?php
$this->load->view('layout/footer');
?>
