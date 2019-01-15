
<div class="media selected-fabric-block-mobile"  style="cursor:pointer;    padding: 0px 10px;"> 
    <div class="media-left  mobile_view_element_tab">
        <p class="selected-fabric-block-image" style="margin: 0px;background: url('<?php echo custome_image_server_suit; ?>/{{screencustom.fabric}}/fabric0001.png')"></p>
    </div>
    <div class="media-body">
        <h4 class="selected-element-title media-heading">{{screencustom.fabric}}</h4>
        <p class="selected-element-title_text">
            {{screencustom.productobj.title}}
        </p>
        <p class="selected-element-title_text_price">
            {{screencustom.productobj.price|currency:"<?php echo globle_currency_type; ?>"}}
        </p>
    </div>

</div>

<div class="col-md-4 col-xs-2  customization_items_title " style="padding: 0px 5px;">  
    <div class="selected-fabric-block elementItemDesktop">
        <div class="media"  style="cursor:pointer"> 
            <div class="media-left media-middle mobile_view_element_tab">
                <p class="selected-fabric-block-image" style="margin: 0px;background: url('<?php echo custome_image_server_suit; ?>/{{screencustom.fabric}}/fabric0001.png')"></p>
            </div>
            <div class="media-body elementItemDesktop">
                <h4 class="selected-element-title media-heading">{{screencustom.sku}}</h4>
                <p class="selected-element-title_text">
                    {{screencustom.productobj.title}}
                </p>
                <p class="selected-element-title_text_price">
                    {{screencustom.productobj.price|currency:"<?php echo globle_currency_type; ?>"}}
                </p>
            </div>

        </div>
    </div>
    <div class="customization_items">
        <ul class="nav nav-tabs tabs-left"> 
            <li class="{{$index == 0?'active':''}}" ng-repeat="k in keys" ng-if="k.type == 'main'">
                <a href="#custome{{$index}}" data-toggle="tab"  >
                    <div class="media"  style="cursor:pointer"> 
                        <div class="media-left media-middle mobile_view_element_tab">
                            <p class="elementItemImage" style="margin: 0px;background: url(<?php echo base_url(); ?>assets/images/customization_suit/{{selecteElements[screencustom.fabric][k.title].image}})"></p>
                        </div>
                        <div class="media-body elementItemDesktop">
                            <h4 class="selected-element-title media-heading">{{k.title}}</h4>
                            <p class="selected-element-result">{{selecteElements[screencustom.fabric]['summary'][k.title]}}</p>
                        </div>
                    </div>
                </a>
            </li>

        </ul>
    </div>
</div>


<div class="col-md-8 col-xs-10">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane {{$index == 0?'active':''}}" ng-repeat="k in keys" id="custome{{$index}}" ng-if="k.type == 'main'">
            <div class="row elementTabList">
                <div ng-switch="k.title">



                    <div ng-switch-when="Lapel Button Hole">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-12 customization_items customization_items_elements">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]"  ng-if="ele.not_show_when.indexOf(selecteElements[screencustom.fabric][ele.checkwith].title) == (-1)">
                                    <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                        <div >
                                            <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization_suit/{{ele.image}}')" > </div>
                                            <div class='customization_title' style="    height: 22px;">
                                                {{ele.title}} 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="clear:both "></div>

                                <div class="row" style="margin: 0;opacity: {{selecteElements[screencustom.fabric]['summary'][k.title]=='No'?0.2:1 }};" >



                                    <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                                        <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                            <div >
                                                <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization_suit/{{ele.image}}'); {{k.style_side}}" > </div>
                                                <div class='customization_title'>
                                                    {{ele.title}} 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 monogram_init">
                                        <h6>Contrast Button Hole On Lapel </h6>
                                        <div class="row" style="margin: 0">
                                            <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list['Button Thread']" >
                                                <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='laple_button_hole_contrast(ele)'>
                                                    <div >
                                                        <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization_suit/{{ele.image}}'); {{k.style_side}}" > </div>
                                                        <div class='customization_title'>
                                                            {{ele.title}} 
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

                    <div ng-switch-when="Sleeve Buttons">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-12 customization_items customization_items_elements">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]"  ng-if="ele.not_show_when.indexOf(selecteElements[screencustom.fabric][ele.checkwith].title) == (-1)">
                                    <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                        <div >
                                            <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization_suit/{{ele.image}}')" > </div>
                                            <div class='customization_title' style="    height: 22px;">
                                                {{ele.title}} 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="clear:both "></div>

                                <div class="row" style="margin: 0;opacity: {{selecteElements[screencustom.fabric]['summary'][k.title]=='No'?0.2:1 }};" >



                                    <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                                        <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                            <div >
                                                <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization_suit/{{ele.image}}'); {{k.style_side}}" > </div>
                                                <div class='customization_title'>
                                                    {{ele.title}} 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 monogram_init">
                                        <h6>Contrast First Sleeve Button Hole </h6>
                                        <div class="row" style="margin: 0">
                                            <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list['Button Thread']" >
                                                <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='sleeve_button_hole_contrast(ele)'>
                                                    <div >
                                                        <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization_suit/{{ele.image}}'); {{k.style_side}}" > </div>
                                                        <div class='customization_title'>
                                                            {{ele.title}} 
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
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                <div >
                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization_suit/{{ele.image}}'); {{k.style_side}}" > </div>
                                    <div class='customization_title'>
                                        {{ele.title}} 
                                        <span ng-if="ele.extracost">
                                            <br/>{{ele.extracost|currency:"<?php echo globle_currency_type; ?>"}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


