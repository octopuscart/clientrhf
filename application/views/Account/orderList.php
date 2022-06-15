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
                text-shadow: 0px 0px;">My Orders</br>
                  <p style="font-size:15px;margin:10px auto;">Profile/Orders</p>
                 
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
                        <?php
                        foreach ($orderslist as $key => $value) {
                            ?>
                            <div class="row  " > 
                                <div class="pricing">

                                    <article class="row" style="padding: 10px">
                                        <div class="col-md-12">
                                            <h6>
                                                Order No. #<?php echo $value->order_no; ?>
                                                <span style="float: right;margin: 0px">
                                                    <i class="fa fa-calendar"></i><?php echo $value->order_date; ?>  <?php echo $value->order_time; ?>
                                                </span>
                                            </h6>
                                        </div>
                                        <div class="col-md-4">
                                            Total Amount: {{<?php echo $value->total_price; ?>|currency:"<?php echo globle_currency; ?> "}}
                                            <br/>
                                            Total Products: {{<?php echo $value->total_quantity; ?>}}
                                        </div>
                                        <div class="col-md-4">
                                            Status: <?php echo $value->status; ?>

                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo site_url('order/orderdetails/' . $value->order_key); ?>" class="btn btn-inverse btn-small" style="margin: 0px;    float: right;">View Order</a>
                                        </div>
                                    </article>

                                </div>
                            </div>
                            <?php
                        }
                        ?>
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