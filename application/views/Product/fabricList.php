<?php
$this->load->view('layout/header');
?>




<style>
    .page_navigation a {
        padding: 5px 10px;
        border: 1px solid #000;
        margin: 5px;
        background: #000;
        color: white;
    }
    .page_navigation a.active_page {
        padding: 5px 10px;
        border: 1px solid #000;
        margin: 5px;
        background: #fff;
        color: black;
    }

    .colorblock{
        font-weight: 500;
        padding: 0px 10px;
        height: 8px;
        /* float: left; */
        width: 15px;
        position: absolute;
        /* float: left; */
        /* margin-top: -71px; */
        /* position: absolute; */
        margin: auto;
        /* border: 1px solid #0000005e; */
        /* border: 1px solid #0000005e; */
        text-shadow: 0px 1px 4px #000;
        /* margin-top: -71px; */
        margin-left: -7px;
    }


    .product-box1 .product-img-holder {
                min-height: 260px;
    }



    .product-box1{


                min-height: 260px;
    }

    .gallery-items {
        border: 1px solid #e0e0e0;
        padding: 10px 10px;
        height:445px!important;
        border-radius: 15px;
    }

    .imagehover{
        height: 250px;
        border-radius: 10px;
        border-radius: 10px;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        opacity: 0;
    }

    .imagehover i{
        color: black;
        margin-top: 53%;
        font-size: 48px;
        text-shadow: 1px 1px 1px #fff;

    }

    .imagehover:hover{
        opacity: 1;
    }

    .widget{
        clear:both;
    }
    .colorwidget {
        display: inline-block;
    }

    .colorwidget label{
          padding: 0px 5px;
    float: left;
    margin-right: 7px;
    border: 1px solid #0000005e;
    border: 1px solid #0000005e;
    text-shadow: 0px 1px 4px #000;
    margin-bottom: 0px;
    }


</style>



<!-- Slider -->


<div class="page-header bg-image" style="background: url(<?php echo base_url(); ?>assets/theme/images/customheader.jpg);background-size: cover;height: 160px">
    <h1 class="text-white" style="font-size: 30px;margin-bottom: 25px;    text-shadow: 0px 0px;">
        
        <small style="font-size: 15px;" class="barcomb">
            <a href="<?php echo site_url("/"); ?>">Home</a>
            <i class='fa fa-arrow-right'></i>
            Fabrics
             <i class='fa fa-arrow-right'></i>
            <?php
            echo  $category;
            ?>
        </small>

    </h1>
</div>



<!-- Content -->
<div id="content" ng-controller="ProductFabricController"> 

    <!-- Shop Content -->
    <div class="shop-content pad-t-b-60" >
        <div class="container">
            <div class="row"> 

     

                <!-- Main Shop Itesm -->          
                <div class="col-md-12" style="margin-bottom: 50px;margin-top: 10px;"> 

                    <form action="" id="filterdata">
                        <div class="row">
                            
                        </div>
                    </form>

                    <div id="content1"  ng-if="productProcess.state == 1" style="padding: 100px 0px;"> 

                        <!-- Tesm Text -->
                        <section class="error-page text-center pad-t-b-130">
                            <div class="{{productResults.products.length?'container1':'container'}}"> 
                                <center>
                                    <!--<img src="<?php echo base_url() . 'assets/theme2/img/loader.gif' ?>">-->
                                </center>
                                <!-- Heading -->
                                <h1 style="font-size: 40px;text-align: center">Loading...</h1>
                            </div>
                        </section>

                    </div>

                    <!-- SHOWING INFO -->




                    <div class="" > 
                     
                        <div class="row products-container content" ng-if="productProcess.state == 2">
                            <!-- Item -->

                            <div class="col-lg-3 col-md-3 col-sm-12" style="padding: 10px;" ng-repeat="(k, product) in productResults.products">
                                <!-- start gallery items -->
                                <div class="gallery-items" style="height: auto!important">
                                    <div class=" thumbnail card" style="    border: none;">
                                        <span ng-if="product.is_sale == 'true'" class="onsaletag">Sale</span> 
                                        <span ng-if="product.is_populer == 'true'" class="onpopulertag">HOT</span> 
                                        <center>




                                            <img class="img-responsive" src="<?php echo base_url() . 'assets/images/blank.png';?>" alt="product" style="border-radius: 10px;background-image: url({{product.image}});background-size: cover;">

                                            <div class="img-responsive imagehover" style="" ng-click="zoomProduct(product)" data-toggle="modal" data-target="#zoomModel">
                                                <i class="fa fa-search-plus" style="    color: black;
                                                   margin-top: 53%;"></i>
                                            </div>




                                            <h3 style="text-align: center;font-size: 15px">{{product.title}}
                                                <br>
                                                <span >{{product.short_description}} </span></h3>
                                            <p style="text-align: center" ng-if="product.is_sale == 'true'"><span class="cutprice">{{product.org_price|currency:"<?php echo globle_currency; ?> "}}</span> {{product.price|currency:"<?php echo globle_currency; ?> "}}</p>
                                            <p style="text-align: center" ng-if="product.is_sale != 'true'">{{product.price|currency:"<?php echo globle_currency; ?> "}}</p>
                                            <br>
                                            <p>
                                            <div class="productBottomButtons text-left"> 
                          
                                            </div>
                                            </p>
                                    </div>
                                </div>
                                <!-- end gallery items -->
                            </div>
                            <div style="clear: both"></div>



                        </div>


                    </div>



                    <div id="content"  ng-if="productProcess.state == 0"> 
                        <div ng-if="checkproduct == 0">
                            <!-- Tesm Text -->
                            <section class="error-page text-center pad-t-b-130">
                                <div class="1 "> 

                                    <!-- Heading -->
                                    <h1 style="font-size: 40px">No Product Found</h1>
                                    <p>Products Will Comming Soon</p>
                                    <hr class="dotted">
                                    <a href="<?php echo site_url(); ?>" class="woocommerce-Button button btn-shop-now-fill">BACK TO HOME</a>
                                </div>
                            </section>
                        </div>
                    </div>






                    <div class="col-md-12" id="paging_container1">
                        <div class="showing-info">
                            <p class="text-center"><span class="info_text ">Showing {0}-{1} of {2} results</span></p>
                        </div>
                        <div class="row products-container content" ng-if="productProcess.state == 2">
                            <!-- Item -->
                            <div class="col-sm-4 animated zoomIn"  ng-repeat="(k, product) in productResults.productscounter">
                            </div>
                        </div>
                        <center>
                            <div class="page_navigation"></div>
                        </center>
                        <div style="clear: both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="zoomModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{selectedProduct.product.title}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <img class="img-responsive" src="{{selectedProduct.product.image}}" alt="product" style="border-radius: 10px;">

                </div>

            </div>
        </div>
    </div>


</div>
<!-- End Content --> 






<script>
    var category_id = '<?php echo $category; ?>';
</script>
<!--angular controllers-->


<?php
$this->load->view('layout/footer');
?>

<script src="<?php echo base_url(); ?>assets/theme/js/jquery.pajinate.min.js"></script>


<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>

<!--angular controllers-->


<script type="text/javascript">
    $(document).ready(function () {

    });
</script>