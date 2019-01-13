<div class="col-md-8 col-xs-3">
    <button class="btn btn-danger pull-left" style="padding: 10px 5px;
            margin-top: 10px;" ng-click="pullUp()"><i class="fa fa-arrow-up"></i></button>
</div>
<div class="col-md-2 col-xs-5">
    <div class="total_price_block">
        <h5> {{screencustom.productobj.price|currency:"<?php echo globle_currency_type; ?>"}}</h5>
    </div>
</div>
<div class="col-md-2 col-xs-4">
    <button class="btn btn-danger pull-right" ng-click="addToCartCustome()" style="padding: 10px 5px;
            margin-top: 10px;">
        Add To Cart  <i class="fa fa-arrow-right"></i>
    </button>
</div>