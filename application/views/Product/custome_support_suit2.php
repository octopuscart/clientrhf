<?php
$this->load->view('Product/custom_select_left');
?>


<div class="col-md-8 col-xs-10">
    <!-- Tab panes -->
    <div class="tab-content" >
        <div class="tab-pane {{$index == 0?'active':''}}" ng-repeat="k in keys" id="custome{{$index}}" ng-if="k.type == 'main'">
            <div class=" elementTabList">
                <div ng-switch="k.title">



                 
                    <div ng-switch-when="Lapel Button Hole Color">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-3 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                <div >
                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}'); {{k.style_side}}" > </div>
                                    <div class='customization_title'>
                                        {{ele.title}} 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div ng-switch-when="Waistband Adjustment">
                        
                        <h5 class="customization_heading">{{k.title}} {{selecteElements[screencustom.fabric]["Waistband Adjustment"].wbtype}} {{selecteElements[screencustom.fabric]["Waistband"].wbtype}} </h5>
                        <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" ng-if='selecteElements[screencustom.fabric]["Waistband"].wbtype ==ele.wbtype'>
                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                <div >
                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}'); {{k.style_side}}" > </div>
                                    <div class='customization_title'>
                                        {{ele.title}} 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div ng-switch-when="Contrast First Button Hole">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-3 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                <div >
                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}'); {{k.style_side}}" > </div>
                                    <div class='customization_title'>
                                        {{ele.title}} 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div ng-switch-when="Jacket Style">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-6 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                <div >
                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}');    background-size: 80%!important;height: 200px; {{k.style_side}}" > </div>
                                    <div class='customization_title'>
                                        {{ele.title}} 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div ng-switch-when="Back Vent">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-6 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                <div >
                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}');    background-size: 80%!important;height: 200px; {{k.style_side}}" > </div>
                                    <div class='customization_title'>
                                        {{ele.title}} 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  
                    
                    <div ng-switch-when="Sleeve Buttons">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-6 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                <div >
                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}');    {{k.style_side}}; background-size: 80%!important;height: 200px;" > </div>
                                    <div class='customization_title'>
                                        {{ele.title}} 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div ng-switch-when="Remark">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-12 customization_items customization_items_elements">
                            <div class="row">

                                <div style="clear:both "></div>

                                <div class="row" style="margin: 0;opacity: {{selecteElements[screencustom.fabric]['summary'][k.title]=='No'?0.2:1 }};" >
                                  <div class="col-md-12 monogram_init">
                                        <h6>Max Char limit 150</h6>
                                        <textarea type="text" maxlength="150"  ng-model="selecteElements[screencustom.fabric]['summary']['Remark']" ></textarea>
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
                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}'); {{k.style_side}}" > </div>
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


