<div class="col-md-8 col-xs-3">
    <button class="btn btn-danger pull-left" style="
            margin-top: 6px;" ng-click="pullUp()"><i class="fa fa-arrow-up"></i></button>
</div>
<div class="col-md-2 col-xs-5">
    <div class="total_price_block" style="
    margin-top: 19px;">
        <h5>
<!--            <span ng-if="selecteElements[screencustom.fabric].totalextracost==0">
                         {{screencustom.productobj.price|currency:"<?php echo globle_currency_type; ?>"}}
                     </span>
                     <span ng-if="selecteElements[screencustom.fabric].totalextracost">
                         {{(tonumber(screencustom.productobj.price)+tonumber(selecteElements[screencustom.fabric].totalextracost))|currency:"<?php echo globle_currency_type; ?>"}}
                     </span>-->
        </h5>
    </div>
</div>
<div class="col-md-2 col-xs-4">
    <button class="btn btn-danger pull-right" ng-click="addToCartCustome()" style="
            margin-top:6px;">
        Add To Cart  <i class="fa fa-arrow-right"></i>
    </button>
</div>