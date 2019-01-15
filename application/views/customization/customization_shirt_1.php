<?php
$this->load->view('layout/header');
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/style_custome.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/bootstrap.vertical-tabs.css">

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
        <section class="item-detail-page padding-top-30 padding-bottom-30">
            <div class="container" style="width: 100%">
                <div class="row"> 

                    <!--======= IMAGES SLIDER =========-->
                    <div class="col-sm-6 large-detail shirtcontainer" >

                        <img src="http://api.octopuscart.com/output/AM697/{{img}}" class="fixpos" ng-repeat="img in selecteElements['Cuff & Sleeve'].elements">
                        <img src="http://api.octopuscart.com/output/AM697/{{img}}" class="fixpos" ng-repeat="img in selecteElements['Bottom'].elements">
                        <img src="http://api.octopuscart.com/output/AM697/{{img}}" class="fixpos" ng-repeat="img in selecteElements['Front'].elements">
                        <img src="http://api.octopuscart.com/output/AM697/{{img}}" class="fixpos" ng-repeat="img in selecteElements['Pocket'].elements">
                        <img src="http://api.octopuscart.com/output/AM697/{{img}}" class="fixpos" ng-repeat="img in selecteElements['Collar'].elements">
                        <img src="img/buttons.png" class="fixpos button_style1" >
                    </div>


                    <!--======= ITEM DETAILS =========-->
                    <div class="col-sm-6">
 


                        <!--shirt customization-->
                        <div class="col-md-12" style="margin-top: 10px;padding: 0px;">


                            
                            <?php
                            $this->load->view('Product/custome_support');
                            ?>








                        </div>
                        <!--end of shirt customization-->

<!--
                         Nav tabs 
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#newdesign" aria-controls="newdesign" role="tab" data-toggle="tab">Design New</a></li>
                            <li role="presentation"><a href="#choosestyle" aria-controls="choosestyle" role="tab" data-toggle="tab">Choose Style</a></li>

                                                <li role="presentation"><a href="#shopstore" aria-controls="shopstore" role="tab" data-toggle="tab">Shop Stored</a></li>
                                                <li role="presentation"><a href="#otherstyle" aria-controls="otherstyle" role="tab" data-toggle="tab">Other</a></li>
                            
                        </ul>

                         Tab panes 
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="newdesign">
                                <div class="col-md-6" style='padding: 0px'>
                                    <div class="box box-solid" style='padding: 0px'>
                                        <div class="box-header ">
                                            <h3 class="box-title"> </h3>
                                        </div>
                                        <div class="box-body">
                                            <ul class="list-group">
                                                <li class="list-group-item active" style=   " background: black;margin-top:10px;
                                                    color: #fff;">
                                                    <h4 >Select Style </h4>
                                                </li>

                                                <li class="list-group-item  parentitem {{k == parents ? 'activestyle' : '' }}"  style="cursor:pointer" 
                                                    ng-repeat="k in keys" ng-click="category_item(data_list[k], k)"  >

                                                    <div class="media"  style="cursor:pointer"> 
                                                        <div class="media-left media-middle">
                                                            <p >

                                                                <img class="media-object" src="http://octopuscart.com/default/download/{{default_array[k].images}}" style="height:50px;width:50px">
                                                            </p>

                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{ k}}</h4>
                                                            <p>
                                                                {{k}}
                                                            </p>
                                                            <span ng-if="k == 'Monogram'">
                                                                <span ng-if="default_array[k].title != 'None'">
                                                                    {{ monogramstyle.text}} ,{{ monogramstyle.color}} , {{ monogramstyle.title}}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 childelementbox" style='    padding-right: 0px;margin-top: 20px;    margin-top: 20px;padding: 0px'>
                                    <div class="col-md-1" style="padding: 0px">


                                    </div>
                                    <div class="box box-solid col-md-11 childelementbox2" style=" ">
                                        <div class="box-header ">
                                            <h3 class="box-title"> </h3>
                                        </div>
                                        <div class="box-body">

                                            <ul class="list-group">
                                                <li class="list-group-item active" style=   " background: black;
                                                    color: #fff;margin-top:10px;
                                                    ">
                                                    <h4 >{{parents}}</h4>
                                                </li>
                                                <li class="list-group-item {{  c.title == default_array[parents].title?'activestyle' :'' }}" ng-repeat="c in category_data" 
                                                    ng-click="selectElement(parents, c)" style="cursor:pointer">
                                                    <div class="media ">

                                                        <div class="media-left media-middle">
                                                            <p >
                                                                <img class="media-object" src="http://octopuscart.com/default/download/{{c.images}}" style="height:50px;width:50px">
                                                            </p>

                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{ c.title}}</h4>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div class='monogramblock' ng-if="parents == 'Monogram'">
                                                    <h5>Monogram Text</h5>
                                                    <input type="text" ng-model="monogramstyle.text" ng-keyup="textChange()" >
                                                </div>
                                                <div class='monogramblock' ng-if="parents == 'Monogram'">
                                                    <h5>Monogram Color</h5>
                                                    <div class="row" style="padding:0px 15px;">
                                                        <div class="col-md-2 colorblock {{  c.title == default_array[parents].title?'activestyle' :'' }}" ng-repeat="c in colorsList" 
                                                             ng-click="selectColorForMonogram(c.color_code)" style="cursor:pointer;background:{{c.color_code}}"></div>
                                                    </div>
                                                </div>
                                                <div class='monogramblock' ng-if="parents == 'Monogram'">
                                                    <h5>Monogram Style</h5>
                                                    <div class="row" style="padding:0px 15px;">
                                                        <div class="col-md-4"  ng-repeat="c in monogramArray" style="    padding: 0;"  ng-click="monogramtitle(c.title)">
                                                            <p>
                                                                <img class="monogram_style" src="/octopuscart/static/monogram/{{ c.images}}" >
                                                            </p>
                                                        </div>
                                                    </div>


                                                </div>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="choosestyle">
                                previouse style selecttion
                                <div ng-if="userStyleList.length"> 
                                    <div class="col-md-6" style='padding: 0px'>
                                        <div class="box box-solid" style='padding: 0px'>
                                            <div class="box-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item active" style=   " background: black;margin-top:10px;
                                                        color: #fff;">
                                                        <h4>Choose From Previous Style</h4>
                                                    </li>
                                                    <li class="list-group-item  parentitem"  style="cursor:pointer;    height: 76px;" 
                                                        ng-repeat="style in userStyleList" ng-click="selectPreStyle(style)"  >

                                                        <div class="media"  style="cursor:pointer">
                                                            <div class="media-left media-middle">
                                                                <p >
                                                                    <img class="media-object" src="{{style.useimage?style.useimage:dummystyle}}" style="height:50px;width:50px">
                                                                </p>
                                                            </div>
                                                            <div class="media-body">
                                                                <h4 class="media-heading" style="    font-size: 15px;font-weight: 500;">{{ style.style_profile}}</h4>
                                                                <p style="font-size: 10px;">Use In Order : {{ style.usedin}} Time</p>
                                                                <p style="font-size: 10px;">Created At :{{ style.d_date}} {{ style.d_time}} Time</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 childelementbox" style='    padding-right: 0px;margin-top: 20px;    margin-top: 20px;padding: 0px'>
                                        <div class="col-md-1" style="padding: 0px">

                                        </div>
                                        <div class="box box-solid col-md-11 childelementbox2" style=" ">
                                            <div class="box-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item active" style=   " background: black;
                                                        color: #fff;margin-top:10px;
                                                        ">
                                                        <h4 class="media-heading" style="    font-size: 15px;font-weight: 500;">
                                                            {{ selectedStyleFormPreDict.style_profile}}
                                                            <button class="btn btn-default btn-xs pull-right" ng-click="chooseForStylePre()">Choose</button> 
                                                        </h4>
                                                        <p style="font-size: 10px;">Use In Order : {{ selectedStyleFormPreDict.usedin}} Time</p>
                                                        <p style="font-size: 10px;">Created At :{{ selectedStyleFormPreDict.d_date}} {{ selectedStyleFormPreDict.d_time}} Time</p>
                                                    </li>
                                                    <li class="list-group-item   "  style="cursor:pointer" 
                                                        ng-repeat="(ks, kv) in selectedStyleFromPre"   >
                                                        <div class="media"  style="cursor:pointer">
                                                            <div class="media-left media-middle">
                                                                <p >
                                                                    <img class="media-object" src="/download/{{kv.images}}" style="height:50px;width:50px">
                                                                </p>
                                                            </div>
                                                            <div class="media-body">
                                                                <h4 class="media-heading">{{ ks}}</h4>
                                                                <p>{{ kv.title}}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div ng-if="userStyleList.length == 0">
                                    <div class="nostylefound" style="    margin-top: 20px;">
                                        <h3>No Previous Style Found</h3>
                                        <p>Please create new style from first tab.</p>
                                    </div>
                                </div>
                                end of previouse style
                            </div>
                            <div role="tabpanel" class="tab-pane" id="shopstore">

                            </div>
                            <div role="tabpanel" class="tab-pane" id="otherstyle">

                            </div>
                        </div>

                        collar section
                        <div class="row" >
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
                                    <h2 class='panel-title'>Collars</h2>
                                </div>
                                <div class='panel-body'>
                                    <div class='custom_block_slide'> 
                                         Item 
                                        <div class="item" ng-repeat="collar in elements.collar.elements"  >
                                            <div >
                                                <div class="collar_style elementStyle customization_box_element {{selecteElements.collar.image == collar.image?'active':''}}" style="background:url('{{fabricurl}}{{selectedproduct.imagename}}/{{collar.image}}0001.png')" ng-click='selectElement("collar", collar)'> </div>
                                                <div class='customization_title'>
                                                    {{collar.title}} 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        cuff section
                        <div class="row" >
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
                                    <h2 class='panel-title'>Sleeve & Cuff</h2>
                                </div>
                                <div class='panel-body'>
                                    <div class='custom_block_slide'> 
                                         Item 
                                        <div class="item" ng-repeat="cuff in elements.cuff.elements"  >
                                            <div >
                                                <div class="cuff_style elementStyle customization_box_element {{selecteElements.cuff.image == cuff.image?'active':''}}" style="background:url('{{fabricurl}}{{selectedproduct.imagename}}/{{cuff.image}}0001.png')" ng-click='selectElement("cuff", cuff)'> </div>
                                                <div class='customization_title'>
                                                    {{cuff.title}} 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->



                    </div>
                </div>
            </div>
        </section>

        <!-- Shop Content -->
        <section class="shop-content related-pro pad-t-b-130">
            <div class="container"> 
                <!-- Heading -->
                <div class="heading-block margin-bottom-30">
                    <h3>Related Products</h3>
                    <hr>
                </div>

                <div class="row"> 




                    <!-- Item -->

                    <div class="col-sm-4" ng-repeat="product in relatedProducts">
                        <article class="shop-artical"> 
                            <img class="img-responsive" src="http://api.octopuscart.com/output/{{product.imagename}}/shirt0001.png" alt="" >
                            <div class="item-hover" style="background: url(http://api.octopuscart.com/output/{{product.imagename}}/cloth0001.png);   background-size: cover;">

                                <a href="#!shop-detail-shirt/{{product.id}}" class="btn">add to cart</a> 
                                <a href="#!shop-detail-shirt/{{product.id}}" class="btn by">BUY NOW</a> 
                            </div>
                        </article>
                        <div class="info">
                            <a href="#!shop-detail/{{product.id}}">{{product.sort_description}}  </a> 
                            <span class="price">{{product.price| currency:config.currency}}</span> 
                        </div>
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