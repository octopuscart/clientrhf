<?php
$this->load->view('layout/header');
?>
<div ng-controller="PreCustomCheck">
    <!-- Inner Page Banner Area Start Here -->
    <div class="page-header" style="height: 160px">
        <div class="container">

            <h1 style="    color: black;
                margin-bottom: 30px;
                font-size: 30px;
                text-shadow: 0px 0px;">Select Design Preferences</h1>


        </div>
    </div>

    <div class="cart-page-area mt-5 mb-5" >
        <div class="container" >
            <div class="row"  >
                <div class="col-md-3 chooseStyleBlock">
                    <h1 style="    color: black;
                        margin-bottom: 30px;
                        font-size: 30px;
                        text-shadow: 0px 0px;">Create Design</h1>
                    <p>Create your own design with our design tool.</p>
                    <br/>
                    <a  class="btn btn-warning" href="<?php echo site_url("Product/customizationRedirectV2/$item_id/$product_id") ?>" >Create Now Design</a>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 chooseStyleBlock" ng-if="customizationDict.has_pre_desing" style="    background: #ffffff;">
                    <h1 style="    color: black;
                        margin-bottom: 30px;
                        font-size: 30px;
                        text-shadow: 0px 0px;">Choose Design</h1>
                    <table class="table">
                        <tr>
                            <th>
                                Profile ID
                            </th>

                            <th>
                                Recent Used
                            </th>

                            <th></th>
                        </tr>
                        <tr ng-repeat="style in customizationDict.prestyle">
                            <td>
                                <h3>{{style.name}}</h3>
                                <button type="button" ng-click="viewStyleOnly(style.cart_data.item_name, style.style)" class="btn btn-default"  style="padding: 5px 21px;
                                        line-height: normal;
                                        margin-top: 10px;">View</button>

                            </td>

                            <td>
                                {{style.order_no}}
                                <br/> <small>  {{style.cart_data.op_date_time}}</small>
                            </td>

                            <td>
                                <button type="button" ng-click="addToCartCustomeFromPre(style.cart_data.id, false, true)" class="btn btn-warning"  >Use Design</button>
                            </td>

                        </tr>
                    </table>

                </div>
                <div class="col-md-3 chooseStyleBlock">
                    <h1 style="    color: black;
                        margin-bottom: 30px;
                        font-size: 30px;
                        text-shadow: 0px 0px;">Shop Stored</h1>
                    <p>If you have purchased recently from our shop, We are having your recent desing.</p>
                    <br/>
                    <button type="button" ng-click="addToCartCustomeFromPre(style.cart_data.id, true, false)" class="btn btn-warning"  >Most Recent Purchase</button>

                </div>

            </div>

        </div>



    </div>


</div>
<script>
    var user_id = <?php echo $user_id; ?>;
    var product_id = <?php echo $product_id; ?>;
    var item_id = <?php echo $item_id; ?>;
</script>
<script src="<?php echo base_url(); ?>assets/theme/angular/preCustomCheckController.js"></script>


<?php
$this->load->view('layout/footer');
?>