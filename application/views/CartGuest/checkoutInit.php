<?php
$this->load->view('layout/header');
?>

<style>
    
    
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    font-size: 1em;
    color: #000;
    border-top: none !important;
}
    .cartbutton{
        width: 100%;
        padding: 6px;
        color: #fff!important;
    }


    .noti-check1 span{
        color: red;
        color: red;
        width: 111px;
        float: left;
        text-align: right;
        padding-right: 13px;
    }

    .noti-check1 h6{
        font-size: 15px;
        font-weight: 600;
    }

    .address_block{
        background: #fff;
        border: 3px solid #d30603;
        padding: 5px 10px;
        margin-bottom: 20px;

    }
    .checkcart {
        border-radius: 50%;
        position: absolute;
        top: -28px;
        left: -8px;
        padding: 4px;
        background: #fff;
        border: 2px solid green;
    }


    .default{
        border: 2px solid green;
    }

    .default{
        border: 2px solid green;
    }

    .checkcart i{
        color: green;
    }

    .address_button{
        padding: 0px 10px;
        margin-top: 15px;
        font-size: 10px;
    }

    .cartdetail_small {
        float: left;
        width: 203px;
    }

</style>








<!-- Content -->


<div class="cart-page-area">
    <div class="container" ng-if="globleCartData.total_quantity">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading1" role="tab" id="headingOne">
                        <h4 class=" r_corners wrapper  bg_light_2  color_dark bg_gradient color_light">
                            <span class="fa-stack">
                                <i class="fa fa-shopping-cart fa-stack-1x"></i>
                            </span> My Shopping Bag
                            <span class="process_block">Total: {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}} ({{globleCartData.total_quantity}})</span> 
                        </h4>
                    </div>
                    <div class="panel-body1">

                        <div class="clearfix"></div>
                        <table class="table table-hover">
                            <thead>
                                <tr class="bg_light_2 color_dark">

                                    <th colspan="2">Product Description</th>

                                    <th style='    width: 100px;'>Price</th>
                                    <th style='    width: 100px;'>Quantity</th>
                                    <th style='    width: 100px;'>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr_delay" ng-repeat="product in globleCartData.products">
                                    <td data-title="Product Image" style='    width: 100px;'>
                                        <a href="#" class="r_corners d_inline_b wrapper">
                                            <img src="{{product.file_name}}" alt="" style='height: 80px'>
                                        </a>
                                    </td>
                                    <td data-title="Description">
                                        <h6 class="m_bottom_5"><a href="#" class="color_dark tr_all" style="font-size: 20px;">{{product.title}} - {{product.item_name}}</a></h6>
                                        <p class="fw_light">{{product.attrs}}</p>
                                    </td>
                                    <td data-title="Price">{{product.price|currency:" "}}</td>
                                    <td data-title="Quantity" >
                                        {{product.quantity}}

                                    <td  data-title="Total" class="fw_ex_bold color_dark ">
                                        {{product.total_price|currency:" "}}
                                    </td>

                                </tr>



                                <tr class="bg_light_2">
                                    <td colspan="4" class="v_align_m">
                                        <div class="d_table w_full">

                                            <div class="v_align_m d_table_cell d_xs_block f_none t_align_r fw_ex_bold color_pink t_xs_align_c" style="text-align: right;font-size: 20px;">
                                                Total:		
                                            </div>
                                        </div>
                                    </td>
                                    <td  class="fw_ex_bold color_pink v_align_m" style="font-size: 20px;">{{globleCartData.total_price|currency:" "}}</td>
                                </tr>

                                <tr>
                                    <td colspan="6" class="text_right">
                                        <div class="proceed-button pull-left " >
                                            <a href=" <?php echo site_url("Cart/details"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_pre " ><i class="fa fa-arrow-left"></i> Back To Cart</a>
                                        </div>
                                        <div class="proceed-button pull-right ">
                                            <a href=" <?php echo site_url("CartGuest/checkoutSize"); ?>" class="btn-apply-coupon btn btn-info btn-lg checkout_button_next " >Your Size <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </td>

                                </tr>


                            </tbody>
                        </table>

                    </div>

                </div>


            </div>

            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'size'));
            ?>
            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'shipping'));
            ?>
            <?php
            $this->load->view('Cart/itemblock', array('vtype' => 'payment'));
            ?>

        </div>

    </div>

    <?php
    $this->load->view('Cart/noproduct');
    ?>


</div>






<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
<script>
                                    var avaiblecredits =<?php echo $user_credits; ?>;
</script>

<?php
$this->load->view('layout/footer');
?>