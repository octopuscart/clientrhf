


<div class="col-md-11 col-xs-12  customization_items_title ">  

    <div class="media selected-fabric-block-mobile"  style="  padding: 0px 10px;"> 
        <div class="media-left  mobile_view_element_tab" style='float: left;    margin-right: 10px'>
            <p class="selected-fabric-block-image" style="margin: 0px;background: url('<?php echo custome_image_server; ?>/coman/output/{{screencustom.productobj.folder}}/fabricx0001.png')"></p>
        </div>
        <div class="media-body" style='float: left; '>
            <h4 class="selected-element-title media-heading">{{screencustom.productobj.title}} - {{screencustom.productobj.item_name}}</h4>
            <p class="selected-element-title_text">
                {{screencustom.productobj.short_description}}
            </p>
            <p class="selected-element-title_text_price">
                {{screencustom.productobj.price|currency:"<?php echo globle_currency_type; ?>"}}
            </p>
        </div>
    </div>
    <div class="selected-fabric-block elementItemDesktop" style='width: 100%;    margin-bottom: 10px'>
        <div class='row'>
            <div class='col-md-8'>
                <div class="media"  style="cursor:pointer"> 
                    <div class="media-left media-middle mobile_view_element_tab" style='float: left;    margin-right: 10px'>
                        <p class="selected-fabric-block-image" style="margin: 0px;background: url('<?php echo custome_image_server; ?>/coman/output/{{screencustom.productobj.folder}}/fabricx0001.png')"></p>
                    </div>
                    <div class="media-body elementItemDesktop">
                        <h4 class="selected-element-title media-heading">{{screencustom.productobj.title}} - {{screencustom.productobj.item_name}}</h4>
                        <p class="selected-element-title_text">
                            {{screencustom.productobj.short_description}}
                        </p>
                        <p class="selected-element-title_text_price">
                            {{screencustom.productobj.price|currency:"<?php echo globle_currency_type; ?>"}}
                        </p>
                    </div>
                </div>
            </div>
            <button class="btn btn-danger pull-right button_type_4 color_pink r_corners tt_uppercase fs_large tr_all f_right m_right_10 m_md_bottom_10" ng-click="addToCartCustome()" style="padding: 10px 5px;    margin-right: 15px;">
             <i class="fa fa-shopping-cart" style='    margin-top: 3px;'></i>    Add To Cart 
            </button>
        </div>
    </div>

    <div style=' width: 100%; float: left;'>
        <div class="accordion">

            <dl class="accordion_item {{$index==0?'active':''}} r_corners wrapper m_bottom_5 tr_all" ng-repeat="k in keys" id="custome{{$index}}" ng-if="k.type == 'main'">
                <dt class="accordion_link relative color_dark tr_all" style='padding: 5px 50px 5px 5px;' ng-click="changeViews(k.viewtype)">
                {{k.title}} 



                <span class="icon_wrap_size_1 circle d_block hide">
                    <i class="icon-minus"></i>
                </span>
                <span class="icon_wrap_size_1 circle d_block show">
                    <i class="icon-plus"></i>
                </span>
                <div class="" style="margin: 0px;background: url(<?php echo base_url(); ?>assets/images/customization/{{selecteElements[screencustom.fabric][k.title].image}});    float: left;
                     height: 23px;
                     width: 23px;
                     background-size: cover;
                     margin-right: 10px;">
                </div> 
                <div style="float: right;    font-size: 12px;">
                    {{selecteElements[screencustom.fabric]['summary'][k.title]}}
                </div>
                </dt>
                <dd class="fw_light color_dark">

                    <div class="row elementTabList">
                        <div ng-switch="k.title">

                            <!--monogram area-->
                            <div ng-switch-when="Monogram">
                                <h5 class="customization_heading">{{k.title}}</h5>
                                <div class="col-md-12 customization_items customization_items_elements">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]"  ng-if="ele.not_show_when.indexOf(selecteElements[screencustom.fabric][ele.checkwith].title) == (-1)">
                                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                                <div >
                                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/{{ele.image}}')" > </div>
                                                    <div class='customization_title' style="    height: 22px;">
                                                        {{ele.title}} 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="clear:both "></div>

                                        <div class="row" style="margin: 0;opacity: {{selecteElements[screencustom.fabric]['summary'][k.title]=='No'?0.2:1 }};" >
                                            <div class="col-md-12 monogram_init">
                                                <h6>Monogram Initial</h6>
                                                <input type="text" maxlength="5"  ng-model="selecteElements[screencustom.fabric]['Monogram Initial']" >
                                            </div>

                                            <div class="col-md-12 monogram_init">
                                                <h6>Monogram Colors</h6>
                                                <div class="row" style="margin: 0">
                                                    <div class="col-md-2 col-xs-4 " style="padding-left: 0px;" ng-repeat="mgc in monogram_colors" ng-click="monogramColor(mgc)" >
                                                        <div class="monogram_color_style" style="background: {{mgc.backcolor}};color:{{mgc.color}}">
                                                            {{selecteElements[screencustom.fabric]['Monogram Initial']}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 monogram_init">
                                                <h6>Monogram Style</h6>
                                                <div class="row" style="margin: 0">


                                                    <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="mgf in monogram_style" ng-click="monogramFont(mgf)" >
                                                        <div class="item elementItem "  >
                                                            <div >
                                                                <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/monogram/{{mgf.image}}')" > </div>
                                                                <div class='customization_title'>
                                                                    {{mgf.title}} 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div style="clear:both "></div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div ng-switch-default>

                                <div class="col-md-3 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                                    <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                        <div >
                                            <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/{{ele.image}}')" > </div>
                                            <div class='customization_title'>
                                                {{ele.title}} 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </dd>
            </dl>

        </div>
    </div>
</div>
