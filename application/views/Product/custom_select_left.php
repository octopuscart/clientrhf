
<div class="media selected-fabric-block-mobile"  style="cursor:pointer;    padding: 0px 10px;"> 
    <div class="media-left  mobile_view_element_tab">
        <p class="selected-fabric-block-image" style="margin: 0px;background: url('<?php echo custome_image_server; ?>/coman/output/{{screencustom.productobj.folder}}/cutting20001.png')"></p>
    </div>
    <div class="media-body">
        <h4 class="selected-element-title media-heading">{{screencustom.productobj.title}} - {{screencustom.productobj.item_name}}</h4>
        <p class="selected-element-title_text">
            {{screencustom.productobj.short_description}}
        </p>
        <p class="selected-element-title_text_price">
            <span ng-if="selecteElements[screencustom.fabric].totalextracost == 0">
                {{screencustom.productobj.price|currency:"<?php echo globle_currency_type; ?>"}}
            </span>
            <span ng-if="selecteElements[screencustom.fabric].totalextracost">
                {{(tonumber(screencustom.productobj.price) + tonumber(selecteElements[screencustom.fabric].totalextracost)) | currency:"<?php echo globle_currency_type; ?>"}}
            </span>        </p>
    </div>

</div>

<div class="col-md-4 col-xs-2  customization_items_title " style="padding: 0px 5px;">  
    <div class="selected-fabric-block elementItemDesktop">
        <div class="media"  style="cursor:pointer"> 
            <div class="media-left media-middle mobile_view_element_tab" style=" margin-right: 10px;margin-bottom: 10px;">
                <p class="selected-fabric-block-image" style="margin: 0px;background: url('<?php echo custome_image_server; ?>/coman/output/{{screencustom.productobj.folder}}/cutting20001.png')"></p>
            </div>
            <div class="media-body elementItemDesktop">
                <h4 class="selected-element-title media-heading">{{screencustom.productobj.title}} - {{screencustom.productobj.item_name}}</h4>
                <p class="selected-element-title_text">
                    {{screencustom.productobj.short_description}}
                </p>
                <p class="selected-element-title_text_price">
                    <span ng-if="selecteElements[screencustom.fabric].totalextracost == 0">
                        {{screencustom.productobj.price|currency:"<?php echo globle_currency_type; ?>"}}
                    </span>
                    <span ng-if="selecteElements[screencustom.fabric].totalextracost">
                        {{(tonumber(screencustom.productobj.price) + tonumber(selecteElements[screencustom.fabric].totalextracost)) | currency:"<?php echo globle_currency_type; ?>"}}
                    </span>

                </p>
            </div>

        </div>
    </div>
    <div class="customization_items">
        <ul class="nav nav-tabs tabs-left"> 
            <li class="" ng-repeat="k in keys" ng-if="k.type == 'main'">
                <a href="#custome{{$index}}" data-toggle="tab"  ng-click="changeViews(k.viewtype)">
                    <div class="media"  style="cursor:pointer"> 
                        <div class="media-left media-middle mobile_view_element_tab">
                            <p class="elementItemImage" style="margin: 0px;background: url(<?php echo base_url(); ?>assets/images/{{selecteElements[screencustom.fabric][k.title].image}})"></p>
                        </div>
                        <div class="media-body elementItemDesktop">
                            <h4 class="selected-element-title media-heading">{{k.title}} </h4>

                            <p class="selected-element-result">{{selecteElements[screencustom.fabric]['summary'][k.title]}}  </p>
                        </div>
                    </div>
                </a>
            </li>

        </ul>
    </div>
</div>
