

<div class="col-md-5 col-xs-7" style="height: 600px;"> <!-- required for floating -->
    <!-- Nav tabs -->
    <ul class="nav nav-tabs tabs-left"><!-- 'tabs-right' for right tabs -->
        <li class="{{$index == 0?'active':''}}" ng-repeat="k in keys" >
            <a href="#custome{{$index}}" data-toggle="tab" >
                <div class="media"  style="cursor:pointer"> 
                    <div class="media-left media-middle">
                        <p class="elementItemImage" style="margin: 0px;background: url(<?php echo base_url(); ?>assets/images/customization/{{selecteElements[k].image}})"></p>
                    </div>
                    <div class="media-body">
                        <h4 style="font-size: 15px;margin-bottom: 0px;" class="media-heading">{{k}}</h4>
                        <p style="margin: 0px;font-size: 12px;">{{selecteElements[k].title}}</p>
                        <span ng-if="k == 'Monogram'">
                            <span ng-if="selecteElements[k].title != 'None'">
                                {{ monogramstyle.text}} ,{{ monogramstyle.color}} , {{ monogramstyle.title}}
                            </span>
                        </span>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</div>

<div class="col-md-7 col-xs-5">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane {{$index == 0?'active':''}}" ng-repeat="k in keys" id="custome{{$index}}">
            <div class="row"  style="height: 400px;overflow: auto;">
                <div class="col-md-6" ng-repeat="ele in data_list[k]" style="    margin: 5px 0px 10px; ">

                    <div class="item elementItem"  ng-click='selectElement(k, ele)'>
                        <div >
                            <div class="elementStyle customization_box_element {{  k == selecteElements[k].title?'activestyle' :'' }} " style="background:url('<?php echo base_url(); ?>assets/images/customization/{{ele.image}}')" > </div>
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




<!--<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true" style="height: 500px;">


    <div class="panel panel-default elementtab " ng-repeat="k in keys" ng-click="category_item(data_list[k], k)">
        <div class="panel-heading" role="tab" id="heading{{$index}}" style="padding:3px 5px;">
            <h4 class="panel-title">
                <a   role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse{{$index}}" aria-expanded="{{$index==0?'true':'false'}}" aria-controls="collapse{{$index}}">
                    <div class="media"  style="cursor:pointer"> 
                        <div class="media-left media-middle">
                            <p class="elementItemImage" style="margin: 0px;background: url(<?php echo base_url(); ?>assets/images/customization/{{selecteElements[k].image}})">

                            </p>
                        </div>
                        <div class="media-body">
                            <h4 style="font-size: 15px;margin-bottom: 0px;" class="media-heading">{{ k}}</h4>
                            <p style="margin: 0px;font-size: 12px;">
                                {{selecteElements[k].title}}
                            </p>
                            <span ng-if="k == 'Monogram'">
                                <span ng-if="selecteElements[k].title != 'None'">
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
                            <div class="elementStyle customization_box_element {{  k == selecteElements[k].title?'activestyle' :'' }} " style="background:url('<?php echo base_url(); ?>assets/images/customization/{{ele.image}}')" > </div>
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


