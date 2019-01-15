<div class="fontview_custom customization_block animated zoom" ng-if="screencustom.view_type == 'front'">
    <div ng-if="selecteElements[screencustom.fabric]['Monogram Initial']">
        <div ng-if="selecteElements[fab.product_id]['Monogram'].title != 'Collar'">
            <div class="monogramtext_posistion
                 {{selecteElements[fab.product_id]['Cuff & Sleeve'].monogram_change_css?selecteElements[fab.product_id]['Cuff & Sleeve'].monogram_change_css :selecteElements[fab.product_id]['Monogram'].css_class}} 
                 {{selecteElements[fab.product_id]['Pocket'].monogram_change_css?selecteElements[fab.product_id]['Pocket'].monogram_change_css :selecteElements[fab.product_id]['Monogram'].css_class}} 
                 monogramcss_main"
                 style="
                 color: {{selecteElements[fab.product_id]['Monogram Background']}};

                 {{selecteElements[fab.product_id]['Monogram'].title=='Collar'?selecteElements[fab.product_id]['Collar'].monogram_style:''}} ;
                 margin-left: {{(-1) * (2 * (selecteElements[screencustom.fabric]['Monogram Initial'].length - 3))}}px;z-index:2000;
                 {{selecteElements[screencustom.fabric]['Monogram Font'].font_style}};
                 " 
                 ng-if="selecteElements[fab.product_id]['Monogram'].title != 'No'">
                {{selecteElements[screencustom.fabric]['Monogram Initial']}}
            </div>
        </div>
    </div>
    <!--cuff section-->
    <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].sleeve1">
    <img src="<?php echo custome_image_server; ?>/shirt/overlay/sleeveoverlay.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Cuff & Sleeve'].sleeve1[0] == 'shirt_sleeve0001.png'">




    <!--buttom-->
    <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Bottom'].elements">
    <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Bottom'].overlay">

    <!--cuff-->
    <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated"  ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].elements" >
    <img src="<?php echo custome_image_server; ?>/shirt/output_insert/{{selecteElements[fab.product_id]['Cuff Insert']}}/{{selecteElements[fab.product_id]['Cuff & Sleeve'].insert_style}}" class="fixpos animated"   ng-if="selecteElements[fab.product_id]['Cuff Insert'] != 'No'">
    <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].insertele">

    <div ng-if="selecteElements[fab.product_id]['Cuff Insert Full'] == 'Outer'">
        <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{selecteElements[fab.product_id]['Cuff & Sleeve'].insert_style}}" class="fixpos animated"   >
        <img src="<?php echo custome_image_server; ?>/shirt/output_insert/{{selecteElements[fab.product_id]['Cuff Insert']}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].inserteleo">
    </div>

    <div ng-if="selecteElements[fab.product_id]['Cuff Insert Full'] == 'Full Insert'">
        <img src="<?php echo custome_image_server; ?>/shirt/output_insert/{{selecteElements[fab.product_id]['Cuff Insert']}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].elements" >
    </div>

    <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{img}}" class="fixpos animated"  ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].overlay" >

    <div ng-switch="selecteElements[fab.product_id]['Stitching'].ptype">
        <div ng-switch-when="0">
        </div>
        <div ng-switch-when="1">
            <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].stitching14"  >
        </div>
        <div ng-switch-when="2">
            <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].stitching38"  >
        </div>
    </div>

    <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].button_hole"  >


    <div ng-switch="selecteElements[fab.product_id]['Button Hole Color Position'].ptype">
        <div ng-switch-when="1">
            <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{selecteElements[fab.product_id]['Button Hole Color'].color}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].button_hole"  >
        </div>
        <div ng-switch-when="2">
            <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{selecteElements[fab.product_id]['Button Hole Color'].color}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].button_hole"  >
        </div>
        <div ng-switch-when="3">
            <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{selecteElements[fab.product_id]['Button Hole Color'].color}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].button_hole"  >
        </div>
        <div ng-switch-when="4">
        </div>
    </div>


    <img src="<?php echo custome_image_server; ?>/shirt/buttons/{{selecteElements[fab.product_id]['Buttons'].button}}/{{selecteElements[fab.product_id]['Cuff & Sleeve'].buttons}}" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Cuff & Sleeve'].french == '0'"  >
    <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{selecteElements[fab.product_id]['Cuff & Sleeve'].buttons}}" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Cuff & Sleeve'].french == '1'"  >
    <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{selecteElements[fab.product_id]['Button Thread Color'].color}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].button_thread"  >


    <!--collar-->
    <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Collar'].elements">
    <div  ng-if="selecteElements[fab.product_id]['Collar Insert'] != 'No'">
        <img src="<?php echo custome_image_server; ?>/shirt/output_insert/{{selecteElements[fab.product_id]['Collar Insert']}}/{{selecteElements[fab.product_id]['Collar'].insert_style}}" class="fixpos animated" style="{{selecteElements[fab.product_id]['Collar'].insert_style_css}}"   >
        <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Collar'].insert_collar" >
    </div>

    <div ng-if="selecteElements[fab.product_id]['Collar Insert Full'] == 'Outer'">
        <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Collar'].elements">
        <img src="<?php echo custome_image_server; ?>/shirt/output_insert/{{selecteElements[fab.product_id]['Collar Insert']}}/{{img}}" class="fixpos animated"  ng-repeat="img in selecteElements[fab.product_id]['Collar'].insert_full" style="{{selecteElements[fab.folder]['Collar'].element}}" >
    </div>

    <div ng-if="selecteElements[fab.product_id]['Collar Insert Full'] == 'Full Insert'">
        <img src="<?php echo custome_image_server; ?>/shirt/output_insert/{{selecteElements[fab.product_id]['Collar Insert']}}/{{selecteElements[fab.product_id]['Collar'].insert_style}}" class="fixpos animated" style="{{selecteElements[fab.product_id]['Collar'].insert_style_css}}"   >
        <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Collar'].insert_collar" >
        <img src="<?php echo custome_image_server; ?>/shirt/output_insert/{{selecteElements[fab.product_id]['Collar Insert']}}/{{img}}" class="fixpos animated"  ng-repeat="img in selecteElements[fab.product_id]['Collar'].insert_full" style="{{selecteElements[fab.folder]['Collar'].element}}" >

    </div>



    <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Collar'].overlay">

    <div ng-switch="selecteElements[fab.product_id]['Stitching'].ptype">
        <div ng-switch-when="0">
        </div>
        <div ng-switch-when="1">
            <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Collar'].stitching14"  >
        </div>
        <div ng-switch-when="2">
            <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Collar'].stitching38"  >
        </div>
    </div>



    <!--front fly-->
    <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Front'].elements">
    <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Front'].overlay">

    <div ng-switch="selecteElements[fab.product_id]['Stitching'].ptype">
        <div ng-switch-when="0">
        </div>
        <div ng-switch-when="1">
            <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Front'].stitching14"  >
        </div>
        <div ng-switch-when="2">
            <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Front'].stitching38"  >
        </div>
    </div>


    <!--pocket-->
    <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Pocket'].elements">
    <img src="<?php echo custome_image_server; ?>/shirt/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Pocket'].overlay">

    <!--front button-->
    <div ng-switch="selecteElements[fab.product_id]['Button Hole Color Position'].ptype">
        <div ng-switch-when="1">
            <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{screencustom.productobj.folder}}/front_button_hole0001.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Front'].show_buttons == 'true'">
            <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{selecteElements[fab.product_id]['Button Hole Color'].color}}/front_button_hole0001.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Front'].show_buttons == 'true'">
        </div>
        <div ng-switch-when="2">
            <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{screencustom.productobj.folder}}/front_button_hole0001.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Front'].show_buttons == 'true'">
        </div>
        <div ng-switch-when="3">
            <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{screencustom.productobj.folder}}/front_button_hole0001.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Front'].show_buttons == 'true'">
            <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{selecteElements[fab.product_id]['Button Hole Color'].color}}/front_button_collar_hole0001.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Front'].show_buttons == 'true'">
        </div>
        <div ng-switch-when="4">
            <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{screencustom.productobj.folder}}/front_button_hole0001.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Front'].show_buttons == 'true'">
            <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{selecteElements[fab.product_id]['Button Hole Color'].color}}/front_button_hole0001.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Front'].show_buttons == 'true'">
        </div>
    </div>

    <img src="<?php echo custome_image_server; ?>/shirt/buttons/{{selecteElements[fab.product_id]['Buttons'].button}}/button_front0001.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Front'].show_buttons == 'true'">


    <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{screencustom.productobj.folder}}/button_front_trd0001.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Front'].show_buttons == 'true'">
    <img src="<?php echo custome_image_server; ?>/shirt/hole_thread/{{selecteElements[fab.product_id]['Button Thread Color'].color}}/button_front_trd0001.png" class="fixpos animated" ng-if="selecteElements[fab.product_id]['Front'].show_buttons == 'true'">


</div>

<div class="backview_custom customization_block  animated " ng-if="screencustom.view_type == 'back'" >
    <div ng-if="selecteElements[screencustom.fabric]['Monogram Initial']">
        <div ng-if="selecteElements[fab.product_id]['Monogram'].title == 'Collar'">
            <div class="monogramtext_posistion
                 {{selecteElements[fab.product_id]['Cuff & Sleeve'].monogram_change_css?selecteElements[fab.product_id]['Cuff & Sleeve'].monogram_change_css :selecteElements[fab.product_id]['Monogram'].css_class}} 
                 {{selecteElements[fab.product_id]['Pocket'].monogram_change_css?selecteElements[fab.product_id]['Pocket'].monogram_change_css :selecteElements[fab.product_id]['Monogram'].css_class}} 
                 monogramcss_main"
                 style="
                 color: {{selecteElements[fab.product_id]['Monogram Background']}};

                 {{selecteElements[fab.product_id]['Monogram'].title=='Collar'?selecteElements[fab.product_id]['Collar'].monogram_style:''}} ;
                 margin-left: {{(-1) * (2 * (selecteElements[screencustom.fabric]['Monogram Initial'].length - 3))}}px;z-index:2000;
                 {{selecteElements[screencustom.fabric]['Monogram Font'].font_style}};
                 " 
                 ng-if="selecteElements[fab.product_id]['Monogram'].title != 'No'">
                {{selecteElements[screencustom.fabric]['Monogram Initial']}}
            </div>
        </div>
    </div>
    <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/b_collar0001.png" class="fixpos animated" >
    <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" ng-repeat="img in selecteElements[fab.product_id]['Cuff & Sleeve'].sleeve" class="fixpos animated" >
    <img src="<?php echo custome_image_server; ?>/shirt/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Back'].elements" >
</div>