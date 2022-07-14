<?php
$this->load->view('layout/header');
?>


<style>
    .order_box{
        padding: 10px;
        padding-bottom: 11px!important;
        height: 110px;
    }
    .order_box li{
        line-height: 19px!important;
        padding: 7px!important;
        border: none!important;
    }

    .order_box li i{
        float: left!important;
        line-height: 19px!important;
        margin-right: 13px!important;
    }

    .blog-posts article {
        margin-bottom: 10px;
    }
</style>

<div class="page-header" style="height: 160px">
    <div class="container">

        <h1 style="    color: black;
            margin-bottom: 30px;
            font-size: 30px;
            text-shadow: 0px 0px;">My Designs</br>
            <p style="font-size:15px;margin:10px auto;">Profile/ My Designs</p>

        </h1>

        <!-- Breadcrumb -->



    </div>
</div>




<!-- Content -->
<div ng-controller="PreCustomCheck">
    <div id="content" class="my-account-page-area"> 

        <!-- Blog -->
        <section class="new-main blog-posts ">
            <div class="container"> 

                <!-- News Post -->
                <div class="news-post">
                    <div class="row"> 

                        <?php
                        $this->load->view('Account/sidebar');
                        ?>


                        <div class="col-md-9 mb-5" style=''>
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
                                        <br/>
                                        <button type="button" ng-click="viewStyleOnly(style.cart_data.profile, style.style)" class="btn btn-default btn-small-xs"  title ="Update Profile">View</button>
                                        <button type="button" ng-click="setAsFavorite(style.cart_data.id, style.cart_data.status)" class="btn btn-default btn-small-xs"  title ="Favorite Profile"><i class="text-danger fa {{style.cart_data.status=='f'?'fa-heart':'fa-heart-o'}}"></i></button>


                                    </td>

                                    <td>
                                        {{style.order_no}}
                                        <br/> <small>  {{style.cart_data.op_date_time}}</small>
                                    </td>

                                    <td>

                                        <a href="<?php echo ADMINURL . "index.php/Order/selectPreviouseProfilesReport/"; ?>/{{style.cart_data.id}}/1" class="btn btn-default greencolorbg"  title ="Dowload Profile"><i class="fa fa-download"></i></a>
                                        &nbsp;
                                        <button type="button" ng-click="askForEmail(style.cart_data.id)" class="btn btn-default"  title ="Email Profile"><i class="fa fa-envelope"></i></button>
                                        &nbsp;
                                        <!--<button type="button" ng-click="addToCartCustomeFromPre(style.cart_data.id, false, true)" class="btn btn-warning"  title ="Update Profile"><i class="fa fa-edit"></i></button>-->
                                        <!--&nbsp;-->
                                        <a href="<?php echo site_url("Account/editDesing"); ?>/{{style.cart_data.id}}/{{style.cart_data.item_id}}" class="btn btn-default yellocolorbg"  title ="Edit Profile"><i class="fa fa-edit"></i></a>
                                        &nbsp;
                                        <button type="button" ng-click="askForDelete(style.cart_data.id)" class="btn btn-danger"  title ="Delte Profile"><i class="fa fa-trash"></i></button>

                                    </td>

                                </tr>
                            </table>
                        </div>



                    </div>
                </div>
        </section>
    </div>
</div>
<!-- End Content --> 




<script>
    var user_id = <?php echo $user_id; ?>;
    var product_id = <?php echo $product_id; ?>;
    var item_id = <?php echo $item_id; ?>;
</script>
<script src="<?php echo base_url(); ?>assets/theme/angular/preCustomCheckController.js"></script>
<?php
$this->load->view('layout/footer');
?>

<script>
    $(function () {
        $(".woocommerce-MyAccount-navigation-link--dashboard").removeClass("active");
        $(".orderlist_page").addClass("active");
    })
</script>