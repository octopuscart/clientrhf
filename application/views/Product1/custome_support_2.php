

<div class="col-md-4 col-xs-7 customization_items " style="padding: 0px 5px;"> <!-- required for floating -->
    <!-- Nav tabs -->
    <ul class="nav nav-tabs tabs-left"><!-- 'tabs-right' for right tabs -->
        <li class="{{$index == 0?'active':''}}" ng-repeat="k in keys" ng-if="k.type == 'main'">
            <a href="#custome{{$index}}" data-toggle="tab"  >
                <div class="media"  style="cursor:pointer"> 
                    <div class="media-left media-middle">
                        <p class="elementItemImage" style="margin: 0px;background: url(<?php echo base_url(); ?>assets/images/customization/{{selecteElements[screencustom.fabric][k.title].image}})"></p>
                    </div>
                    <div class="media-body">
                        <h4 class="selected-element-title media-heading">{{k.title}}</h4>
                        <p class="selected-element-result">{{selecteElements[screencustom.fabric][k.title].title}}</p>
                        <span ng-if="k.title == 'Monogram'">
                            <span ng-if="selecteElements[screencustom.fabric][k.title].title != 'No'">
                                {{ selecteElements[screencustom.fabric][k.title].monogramstyle_text}} ,
                                {{ selecteElements[screencustom.fabric][k.title].monogramstyle_color}} ,
                                {{ selecteElements[screencustom.fabric][k.title].monogramstyle_title}}
                            </span>
                        </span>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</div>

<div class="col-md-8 col-xs-5">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane {{$index == 0?'active':''}}" ng-repeat="k in keys" id="custome{{$index}}" ng-if="k.type == 'main'">
            <div class="row elementTabList">


                <div ng-switch="k.title">
                    <div ng-switch-when="Collar">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#collars_area" class="btn btn-inverse" aria-controls="collars_area" role="tab" data-toggle="tab">
                                    Collars
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#collar_insert" class="btn btn-inverse" aria-controls="collar_insert" role="tab" data-toggle="tab">
                                    Collar Insert
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--collars list-->
                            <div role="tabpanel" class="tab-pane active" id="collars_area">
                                <div class="customization_items">
                                    <div class="col-md-4 col-xs-12" ng-repeat="ele in data_list[k.title]" style="    margin: 5px 0px 10px; ">
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
                            <div role="tabpanel" class="tab-pane" id="collar_insert">
                                <div class="customization_items">
                                    <div class="col-md-4 col-xs-12"  style="    margin: 5px 0px 10px; ">
                                        <div class="item elementItem  "  ng-click='selectCollarCuffInsert("Collar Insert", "No")'>
                                            <div >
                                                <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/{{selecteElements[screencustom.fabric]['Collar'].image}}')" > </div>
                                                <div class='customization_title'>
                                                    No Collar Insert
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12" ng-repeat="cci in cuff_collar_insert" style="    margin: 5px 0px 10px; ">

                                        <div class="item elementItem  "  ng-click='selectCollarCuffInsert("Collar Insert", cci)'>
                                            <div >
                                                <div class="elementStyle customization_box_elements {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('http://api.octopuscart.com/output_insert/fabrics_insert/{{cci}}.jpg')" > </div>
                                                <div class='customization_title'>
                                                    {{cci}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div ng-switch-when="Cuff & Sleeve">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#cuff_area" class="btn btn-inverse" aria-controls="cuff_area" role="tab" data-toggle="tab">
                                    Cuff & Sleeve
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#cuff_insert" class="btn btn-inverse" aria-controls="cuff_insert" role="tab" data-toggle="tab">
                                    Cuff Insert
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--collars list-->
                            <div role="tabpanel" class="tab-pane active" id="cuff_area">
                                <div class="customization_items">
                                    <div class="col-md-4 col-xs-12" ng-repeat="ele in data_list[k.title]" style="    margin: 5px 0px 10px; ">
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
                            <div role="tabpanel" class="tab-pane" id="cuff_insert">
                                <div class="customization_items">
                                    <div class="col-md-4 col-xs-12"  style="    margin: 5px 0px 10px; ">
                                        <div class="item elementItem  "  ng-click='selectCollarCuffInsert("Cuff Insert", "No")'>
                                            <div >
                                                <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/{{selecteElements[screencustom.fabric]['Cuff & Sleeve'].image}}')" > </div>
                                                <div class='customization_title'>
                                                    No Cuff Insert
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12" ng-repeat="cci in cuff_collar_insert" style="    margin: 5px 0px 10px; ">
                                        <div class="item elementItem  "  ng-click='selectCollarCuffInsert("Cuff Insert", cci)'>
                                            <div >
                                                <div class="elementStyle customization_box_elements {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('http://api.octopuscart.com/output_insert/fabrics_insert/{{cci}}.jpg')" > </div>
                                                <div class='customization_title'>
                                                    {{cci}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div ng-switch-when="Monogram">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-3 col-xs-12" ng-repeat="ele in data_list[k.title]" style="    margin: 5px 0px 10px; " ng-if="ele.not_show_when.indexOf(selecteElements[screencustom.fabric][ele.checkwith].title)==(-1)">
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
                    <div ng-switch-default>
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-4 col-xs-12" ng-repeat="ele in data_list[k.title]" style="    margin: 5px 0px 10px; ">
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
        </div>
    </div>
</div>




<!--<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true" style="height: 500px;">


    <div class="panel panel-default elementtab " ng-repeat="k in keys" ng-click="category_item(data_list[k], k)">
        <div class="panel-heading" role="tab" id="heading{{$index}}" style="padding:3px 5px;">
            <h4 class="panel-title">
                <a   role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse{{$index}}" aria-expanded="{{$index==0?'true':'false'}}" aria-controls="collapse{{$index}}">
                    <div class="media"  style="cursor:pointer"> 
                        <div class="media-left media-middle">
                            <p class="elementItemImage" style="margin: 0px;background: url(<?php echo base_url(); ?>assets/images/customization/{{selecteElements[screencustom.fabric][k].image}})">

                            </p>
                        </div>
                        <div class="media-body">
                            <h4 style="font-size: 15px;margin-bottom: 0px;" class="media-heading">{{ k}}</h4>
                            <p style="margin: 0px;font-size: 12px;">
                                {{selecteElements[screencustom.fabric][k].title}}
                            </p>
                            <span ng-if="k == 'Monogram'">
                                <span ng-if="selecteElements[screencustom.fabric][k].title != 'None'">
                                    {{ monogramstyle.text}} ,{{ monogramstyle.color}} , {{ monogramstyle.title}}
                                </span>
                            </span>
                            <button class="btn btn-link button-expand"  >
                                <i class="fa fa-plus"></i>    
                            </button>

                        </div>
                    </div>

                </a>
            </h4>
        </div>
        <div id="collapse{{$index}}" class="elementItemBox panel-collapse collapse  " role="tabpanel" aria-labelledby="heading{{$index}}">
            <div class="panel-body">
                <div class="col-md-3 col-xs-6" ng-repeat="ele in data_list[k]" style="    margin: 5px 0px 10px; ">
                     Item 
                    <div class="item elementItem"  ng-click='selectElement(k, ele)'>
                        <div >
                            <div class="elementStyle customization_box_element {{  k == selecteElements[screencustom.fabric][k].title?'activestyle' :'' }} " style="background:url('<?php echo base_url(); ?>assets/images/customization/{{ele.image}}')" > </div>
                            <div class='customization_title'>
                                {{ele.title}} 
                            </div>
                        </div>
                    </div>
                </div>
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

            </div>
        </div>
    </div>

</div>-->


