<div class="col-md-8 col-xs-3">
    <button class="btn btn-danger pull-left button_type_4 color_pink r_corners tt_uppercase fs_large tr_all f_left m_right_10 m_md_bottom_10" style="padding: 10px 5px;
            margin-top: 10px;" ng-click="pullUp()"><i class="fa fa-arrow-up"></i></button>
</div>
<div class="col-md-2 col-xs-5">
    <div class="total_price_block">
        <h5> {{screencustom.productobj.price|currency:"<?php echo globle_currency_type; ?>"}}</h5>
    </div>
</div>
<div class="col-md-2 col-xs-4">
    <button class="btn btn-danger pull-right button_type_4 color_pink r_corners tt_uppercase fs_large tr_all f_right m_right_10 m_md_bottom_10" ng-click="addToCartCustome()" style="padding: 10px 5px;
            margin-top: 10px;">
        Add To Cart  <i class="fa fa-arrow-right" style='    margin-top: 3px;'></i>
    </button>
</div>
<hr class='bg_gradiant'>