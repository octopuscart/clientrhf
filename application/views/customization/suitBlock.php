
<div class="fontview_custom customization_block animated zoom "  ng-if="screencustom.view_type == 'front'" >
    <img src="<?php echo custome_image_server; ?>/jacket/overlay/shirtoverlay.png" class="fixpos animated" >
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/sleeve0001.png" class="fixpos animated" >

    <!--breast pocket-->
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Breast Pocket'].elements">



    <!--jacket body left-->

                                        <!--<img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].elements" >-->

    <!--buttons-->
    <!--<img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}.png" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].buttons2" >-->
    <!--jacket body left-->
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in [selecteElements[fab.product_id]['Jacket Style'].left]" >

    <!--buttons-->
    <img src="<?php echo custome_image_server; ?>/jacket/buttons/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].buttons2" >

    <!--jacket body right-->
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}//{{img}}" class="fixpos animated" ng-repeat="img in [selecteElements[fab.product_id]['Jacket Style'].right]" >
    
        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Lower Pocket'].elements">

    
    <img src="<?php echo custome_image_server; ?>/jacket/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].overlay" >

    <!--breast pocket-->
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Breast Pocket'].elements" >
    <!--<img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/breast_pocket0001.png" class="fixpos animated" >-->


    <!--button holes-->
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].button_hole" >


    <!--sleeve half-->
    <!--<img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/sleeve0001.png" class="fixpos animated" >-->

    <!--button sleeve-->
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Sleeve Buttons'].elements" >
    
    
    
    
    <img src="<?php echo custome_image_server; ?>/jacket/buttons/{{selecteElements[fab.product_id]['Buttons'].folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Sleeve Buttons'].buttons" >


                                        <!--<img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/buttons_flat1_hole0001.png" class="fixpos animated" >-->





    <!--lower pocket-->


    <img src="<?php echo custome_image_server; ?>/jacket/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Lapel Style'].laple_style[selecteElements[fab.product_id]['Jacket Style'].title].overelay">



    <?php
    if ($tuxedotype == '1') {
        ?>
       
            <img src="<?php echo custome_image_server; ?>/jacket/output/{{selecteElements[fab.product_id]['Lapel Facing'].folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Lapel Style'].laple_style[selecteElements[fab.product_id]['Jacket Style'].title].elements">



        <?php
    } else {
        ?>
        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Lapel Style'].laple_style[selecteElements[fab.product_id]['Jacket Style'].title].elements">
        <?php
    }
    ?>




    <div class="" ng-if="selecteElements[fab.product_id]['Handstitching'].title == 'Yes'">
        <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Lapel Style'].laple_style[selecteElements[fab.product_id]['Jacket Style'].title].stitcing">
    </div>

    <div class="" ng-if="selecteElements[fab.product_id]['Lapel Button Hole'].title == 'Yes'">
        <!--<img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Lapel Style'].laple_style[selecteElements[fab.product_id]['Jacket Style'].title].hole" >-->
    </div>

    <!--buttons-->
    <img src="<?php echo custome_image_server; ?>/jacket/buttons/{{selecteElements[fab.product_id]['Buttons'].folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Jacket Style'].buttons" >




</div>   


<div class="backview_custom customization_block zoom animated " ng-if="screencustom.view_type == 'back'">



    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Back Vent'].elements">
    <img src="<?php echo custome_image_server; ?>/jacket/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Back Vent'].overlay">
    <img src="<?php echo custome_image_server; ?>/jacket/overlay/overlayback.png" class="fixpos animated" >
    <img src="<?php echo custome_image_server; ?>/jacket/overlay/overlayback1.png" class="fixpos animated" >



</div> 


<div class="backview_custom customization_block zoom animated " ng-if="screencustom.view_type == 'pant'">
    <!--<img src="<?php echo base_url(); ?>assets/images/pant_elements/base.png" class="fixpos animated">-->
    <!--font-->
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Number of Pleat'].elements">
    
    <?php
    if ($tuxedotype == '1') {
        ?>


        <img src="<?php echo custome_image_server; ?>/jacket/output/{{selecteElements[fab.product_id]['Ribbon on Side Seam'].folder}}/pant_side_seam0001.png" class="fixpos animated" >

        <?php
    } else {
        ?>
        <?php
    }
    ?>
    
    <img src="<?php echo custome_image_server; ?>/jacket/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Front Pocket Style'].elements">  
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Waistband'].elements">
    <img src="<?php echo custome_image_server; ?>/jacket/overlay/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Cuff'].elements">
    <img src="<?php echo custome_image_server; ?>/jacket/overlay/zipper.png" class="fixpos animated" >

</div> 


<div class="backview_custom customization_block zoom animated " ng-if="screencustom.view_type == 'pantback'">
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/pant_back_pocket0001.png" class="fixpos animated">
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/pant_back_waistband0001.png" class="fixpos animated">
    <img src="<?php echo custome_image_server; ?>/jacket/output/{{screencustom.productobj.folder}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.product_id]['Number of Back Pocket'].elements">
</div> 
