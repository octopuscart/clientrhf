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
            text-shadow: 0px 0px;">My Wishlist</br>
            <p style="font-size:15px;margin:10px auto;">Profile/WISHLIST</p>

        </h1>

        <!-- Breadcrumb -->



    </div>
</div>




<!-- Content -->
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
                        <div class="cart-page-area">
                            <div class="container">
                                <div class="row"  >
                                    <div class="col-md-1"></div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cart-page-top table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <td class="cart-form-heading text-left" style="width: 40%" colspan="2">Product</td>
                                                        <td class="cart-form-heading text-right" >Price</td>

                                                        <td class="cart-form-heading" style="    width: 300px;"></td>
                                                    </tr>
                                                </thead>
                                                <tbody id="quantity-holder">
                                                    <?php foreach ($wishlist as $key => $value) {
                                                        ?>
                                                        <tr >
                                                            <td class="cart-img-holder " style="    border-right: 0px;    width: 35px;">
                                                                <a href="#">
                                                                    <img  src="<?php echo $value["file_name"]; ?>" alt=""  alt="cart" class="img-responsive cart_image_block">
                                                                </a>
                                                            </td>
                                                            <td  style="    border-left: 0px;">
                                                                <h3 style="font-size: 20px;"><a href="#"><?php echo $value["title"]; ?> - <?php echo $value["item_name"]; ?></a>
                                                                    <br/>
                                                                    <small style="font-size: 10px"><?php echo $value["sku"]; ?></small>
                                                                </h3>

                                                            </td>
                                                            <td class="text-right">
                                                                <span class="price">{{<?php echo $value["price"]; ?>|currency:" "}}</span>
                                                            </td>

                                                            <td class="dismiss">
                                                                <a href="<?php echo site_url("Product/customizationRedirect/") ?><?php echo $value["item_id"]; ?>/<?php echo $value["product_id"]; ?>" class="btn btn-warning btn-small-xs" ><i class="fa fa-paint-brush" aria-hidden="true"></i> Design Now</a>

                                                                <a href="<?php echo site_url("Account/removeWishlist/".$value["product_id"]) ?>" class="btn btn-danger btn-small-xs" ><i class="fa fa-times" aria-hidden="true"></i> Remove</a>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                    ?>





                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>

                                </div>

                            </div>

                           


                        </div>
                    </div>



                </div>
                </section>
            </div>
            <!-- End Content --> 



            <?php
            $this->load->view('layout/footer');
            ?>

            <script>
                        $(function () {
                            $(".woocommerce-MyAccount-navigation-link--dashboard").removeClass("active");
                            $(".orderlist_page").addClass("active");
                        })
            </script>