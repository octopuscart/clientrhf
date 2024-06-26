<?php
$this->load->view('Product/custom_select_left');
?>

<div class="col-md-8 col-xs-10">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane {{$index == 0?'active':''}}" ng-repeat="k in keys" id="custome{{$index}}" ng-if="k.type == 'main'">
            <div class="row elementTabList">
                <div ng-switch="k.title" style="width: 100%;">


                    <!--                    <div ng-switch-when="Collar">
                                            <h5 class="customization_heading">{{k.title}}</h5>
                                            Nav tabs 
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
                                            Tab panes 
                                            <div class="tab-content">
                                                collars list
                                                <div role="tabpanel" class="tab-pane active" id="collars_area">
                                                    <div class="customization_items customization_items_elements cuff_collar_area_elements" >
                                                        <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                                                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                                                <div >
                                                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}')" > </div>
                                                                    <div class='customization_title'>
                                                                        {{ele.title}} 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                                collar insert
                                                <div role="tabpanel" class="tab-pane" id="collar_insert">
                    
                                                    <div class="customization_items customization_items_elements cuff_collar_area_elements">
                                                        <div class="col-md-4 col-xs-6 custome_element_col">
                                                            <div class="item elementItem  "  ng-click='selectCollarCuffInsert("Collar Insert", "No")'>
                                                                <div >
                                                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{selecteElements[screencustom.fabric]['Collar'].image}}')" > </div>
                                                                    <div class='customization_title'>
                                                                        No Collar Insert
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="cci in cuff_collar_insert" >
                                                            <div class="item elementItem"  ng-click='selectCollarCuffInsert("Collar Insert", cci)'>
                                                                <div >
                                                                    <div class="elementStyle customization_box_elements {{  cci == selecteElements[screencustom.fabric]['Collar Insert']?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/fabrics_insert/{{cci}}.jpg')" > </div>
                                                                    <div class='customization_title'>
                                                                        {{cci}}
                                                                        <br/>
                                                                        <div class="btn-group" role="group" aria-label="...">
                                                                            <button class="btn btn-danger btn-small insert_button" ng-click="selectCollarCuffInsertType('Collar Insert Full', 'No')">Inner</button>
                                                                            <button class="btn btn-danger btn-small  insert_button" ng-click="selectCollarCuffInsertType('Collar Insert Full', 'Outer')">Outer</button>
                                                                            <button class="btn btn-danger btn-small  insert_button" ng-click="selectCollarCuffInsertType('Collar Insert Full', 'Full Insert')">Full</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->


                    <!--                    cuff area
                                        <div ng-switch-when="Cuff & Sleeve">
                                            <h5 class="customization_heading">{{k.title}}</h5>
                                             Nav tabs 
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
                                             Tab panes 
                                            <div class="tab-content">
                                                cuff list
                                                <div role="tabpanel" class="tab-pane active" id="cuff_area">
                                                    <div class="customization_items customization_items_elements cuff_collar_area_elements">
                                                        <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                                                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                                                <div >
                                                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}')" > </div>
                                                                    <div class='customization_title'>
                                                                        {{ele.title}} 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="cuff_insert">
                                                    <div class="customization_items customization_items_elements cuff_collar_area_elements">
                                                        Cuff insert
                                                        <div class="col-md-4 col-xs-6 custome_element_col" >
                                                            <div class="item elementItem  "  ng-click='selectCollarCuffInsert("Cuff Insert", "No")'>
                                                                <div >
                                                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{selecteElements[screencustom.fabric]['Cuff & Sleeve'].image}}')" > </div>
                    
                                                                    <div class='customization_title'>
                                                                        No Cuff Insert
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                    
                    
                    
                    
                                                        <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="cci in cuff_collar_insert" >
                                                            <div class="item elementItem  "  ng-click='selectCollarCuffInsert("Cuff Insert", cci)'>
                                                                <div >
                                                                    <div class="elementStyle customization_box_elements {{  cci == selecteElements[screencustom.fabric]['Cuff Insert']?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/fabrics_insert/{{cci}}.jpg')" > </div>
                    
                                                                    <div class='customization_title'>
                                                                        {{cci}}
                                                                        <br/>
                                                                        <div class="btn-group" role="group" aria-label="...">
                                                                            <button class="btn btn-danger btn-small insert_button" ng-click="selectCollarCuffInsertType('Cuff Insert Full', 'No')">Inner</button>
                                                                            <button class="btn btn-danger btn-small  insert_button" ng-click="selectCollarCuffInsertType('Cuff Insert Full', 'Outer')">Outer</button>
                                                                            <button class="btn btn-danger btn-small  insert_button" ng-click="selectCollarCuffInsertType('Cuff Insert Full', 'Full Insert')">Full</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->


                    <!--monogram area-->

                    <div ng-switch-when="Buttons" class="customization_items ">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-3 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                <div >
                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}');{{k.style_side}}" > </div>
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
                    <div ng-switch-when="Button Thread Color" class="customization_items ">
                        <div class="col-md-12">
                            <h5 class="customization_heading">{{k.title}}</h5>
                            <div class="col-md-2 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                                <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                    <div >
                                        <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}');{{k.style_side}}" > </div>
                                        <div class='customization_title'>
                                            {{ele.title}} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div ng-switch-when="Button Hole Color Position" class="customization_items ">
                        <div class="col-md-12">
                            <h5 class="customization_heading">Button Hole Color Position {{selecteElements[fab.product_id]['Button Hole Color Position'].ptype}}</h5>
                            <div class="col-md-3 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                                <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                    <div >
                                        <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}');{{k.style_side}}" > </div>
                                        <div class='customization_title'>
                                            {{ele.title}} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div ng-switch-when="Button Hole Color" class="customization_items ">

                        <div class="col-md-12">
                            <h5 class="customization_heading">{{k.title}}</h5>
                            <div class="col-md-2 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                                <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                    <div >
                                        <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}');{{k.style_side}}" > </div>
                                        <div class='customization_title'>
                                            {{ele.title}} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div ng-switch-when="Monogram">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-12 customization_items customization_items_elements">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]"  ng-if="ele.not_show_when.indexOf(selecteElements[screencustom.fabric][ele.checkwith].title) == (-1)">
                                    <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele);'>
                                        <div >
                                            <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}');{{k.style_side}}" > </div>
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
                                                <div class="monogram_color_style" style="background: {{mgc.backcolor}};{{k.style_side}};">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 monogram_init">
                                        <h6>Monogram Style</h6>
                                        <div class="row" style="margin: 0">


                                            <div class="col-md-3 col-xs-6 custome_element_col" ng-repeat="mgf in monogram_style" ng-click="monogramFont(mgf)" >
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

                    <div ng-switch-default style="width: 100%;">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                <div >
                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/{{ele.image}}')" > </div>
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


