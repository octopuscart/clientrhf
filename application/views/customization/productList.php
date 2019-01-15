<?php
$this->load->view('layout/header');
?>


<style>
    .product_image_back {
        background-size: cover!important;
        background-repeat: no-repeat!important;
        height: 400px!important;
        background-position-x: center!important;
        background-position-y: center!important;
    }

    .productblock{
        padding: 10px;
        border: 1px solid rgba(0, 0, 0, 0.07);
        margin-bottom: 30px;
        box-shadow: 0px 0px 5px #00000017;
    }

</style>

<!-- Slider -->
<section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
        <div class="container">
            <h4>Shop Shirts</h4>

            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>

                <?php
                foreach ($categorie_parent as $key => $value) {
                    $title = $value['category_name'];
                    $cid = $value['id'];
                    echo "<li><a href='" . site_url("Product/ProductList/" . $cid) . "'>$title</a></li>";
                }
                ?>
            </ol>
        </div>
    </div>
</section>

<!-- Content -->
<div id="content" ng-controller="ProductController"> 

    <!-- Shop Content -->
    <div class="shop-content ">
        <div class="container" >
            <div class="row"> 


                <!-- Shop Side Bar -->
                <!--                <div class="col-md-3" ng-if="checkproduct == 1">
                                    <div class="side-bar">
                                         HEADING 
                                        <div class="heading">
                                            <h6>Products Categories</h6>
                                            <hr class="dotted">
                                        </div>
                
                                         CATEGORIES 
                                        <ul class="cate">
                <?php
                foreach ($categories as $key => $value) {
                    ?>                                   
                                                    <li><a href="<?php echo site_url("Product/ProductList/" . $value['id']); ?>"><?php echo $value['category_name']; ?></a></li>
                    <?php
                }
                ?>                           
                                        </ul>
                
                                         HEADING 
                                        <div class="heading">
                                            <h6>Filter by price</h6>
                                            <hr class="dotted">
                                        </div>
                                         PRICE 
                                        <div class="cost-price-content">
                                            <div id="price-range" class="price-range"></div>
                                            <span id="price-min" class="price-min">{{productResults.price.minprice}}</span> <span id="price-max" class="price-max">{{productResults.price.maxprice}}</span> <a href="#." class="btn btn-small btn-inverse pull-right" ng-click="filterPrice()">FILTER</a> 
                                        </div>
                
                                        <div ng-repeat="(attrk, attrv) in productResults.attributes" ng-if="attrv.length > 1">
                                             HEADING 
                                            <div class="heading">
                                                <h6>{{attrk}}</h6>
                                                <hr class="dotted">
                                            </div>
                                             COLORE 
                                            <ul class="cate">
                                                <li ng-repeat="atv in attrv">
                                                    <a href="#.">
                                                        <label style="font-weight: 500">
                                                            <input type="checkbox"  ng-model="atv.checked" ng-click="attributeProductGet(atv)">  {{atv.attribute_value}} ({{atv.product_count}})
                                                        </label>
                                                    </a>
                
                                                    <a href="#."><input type="checkbox">{{atv.attribute_value}} <span>(32) </span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>-->


                <!-- Main Shop Itesm -->
                <div class="col-md-12" ng-if="checkproduct == 1" style="margin-top: 30px;"> 
                    <!-- SHOWING INFO -->
                    <!--                    <div class="showing-info">
                    
                                            <div class="side-bar" style="float: left;
                                                 width: 68%;padding: 0 5px">
                                                <ul class="tags" ng-if="pricerange.min > 0" style="float: left;    float: left;
                                                    border: 1px solid #eee;padding-right:10px;    margin-left: 10px;
                                                    padding-top: 5px;">
                                                    <li>
                                                        <a href="#." style="padding: 5px;background: #fff; margin: 0;    margin-left: 10px;">
                                                            Price Range :  {{pricerange.min}} - {{pricerange.max}}
                                                        </a>
                                                    </li>
                                                </ul>
                    
                                                <ul class="tags" ng-repeat="(k, attr) in attribute_checked_pre" style="float: left;    float: left;
                                                    border: 1px solid #eee;padding-right:10px;    margin-left: 10px;
                                                    padding-top: 5px;">
                                                    <li><a href="#." style="padding: 5px;background: #fff; margin: 0;    margin-left: 10px;">{{k}}</a></li>
                                                    <li ng-repeat="av in attr"> 
                                                        <a href="#." style="padding: 5px;    margin: 0;    margin-left: 10px;">{{av.attribute_value}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                    
                                            <p class="pull-right"  ng-if="productResults.products.length">Showing {{productResults.products.length}} results</p>
                                        </div>-->
                    <div class="row" ng-if="productResults.products.length"> 
                        <!-- Item -->
                        <div class="col-sm-4" ng-repeat="(k, product) in productResults.products">
                            <div class="productblock">

                                <article class="shop-artical" style="    margin-bottom: 0px;"> 

                                    <div ng-if ="product.item_type == 'Jacket'">

                                        <div class="product_image_back" style="background: url(<?php echo custome_image_server_suit; ?>/v2/output/{{product.folder}}/s1_master_style60001.png)"></div>
                                    </div>

                                    <div ng-if ="product.item_type != 'Jacket'">

                                        <div class="product_image_back" style="background: url(<?php echo custome_image_server; ?>/output/{{product.folder}}/shirt0001.png)"></div>
                                    </div>

                                    <!-- Sale -->
                                    <div class="item-sale" ng-if="product.sale_price > 0">Sale</div>

                                    <div ng-if ="product.item_type == 'Jacket'">

                                        <div class="item-hover" style="background: url(<?php echo custome_image_server_suit; ?>/v2/output/{{product.folder}}/style_buttons.png);background-size: cover;"> 

                                        </div>
                                    </div>
                                    <div ng-if ="product.item_type != 'Jacket'">

                                        <div class="item-hover" style="background: url(<?php echo custome_image_server; ?>/output/{{product.folder}}/cloth0001.png);background-size: cover;"> 

                                        </div>
                                    </div>

                                </article>
                                <div class="info" style="    height: 80px;"> 
                                    <a href="<?php echo site_url("Product/ProductDetails/"); ?>{{product.product_id}}">{{product.title}} ({{product.sku}})  </a> 
                                    <span class="price disc">
                                        <span class="line-through" ng-if="product.sale_price > 0">{{product.regular_price|currency:"<?php echo globle_currency_type; ?>"}}</span>
                                        <span>{{product.price|currency:"<?php echo globle_currency_type; ?>"}}</span>
                                    </span>
                                    <a href="#." class="btn" style="    font-size: 9px;color: white;" ng-click="addToCart(product.product_id, 1)">add to cart</a> 
                                    <a href="#." class="btn by" style="    font-size: 9px;color: white;">Customize</a> 

                                </div>
                            </div>
                        </div>
                    </div>

                    <div ng-if="!productResults.products.length">
                        <h1 style="font-size: 40px;text-align: center;">No Product Found</h1>
                        <p style="text-align: center;">Products Will Comming Soon</p>
                        <hr class="dotted">

                    </div>

                    <!-- Pagination -->
                    <!--                    <ul class="pagination" ng-if="productResults.products.length">
                                            <li><a href="#.">1</a></li>
                                            <li><a href="#.">2</a></li>
                                            <li><a href="#.">....</a></li>
                                            <li><a href="#.">&gt;</a></li>
                                        </ul>-->
                </div>


            </div>
        </div>



        <div id="content"  ng-if="!productResults.products.length"> 
            <div ng-if="checkproduct == 0">
                <!-- Tesm Text -->
                <section class="error-page text-center pad-t-b-130">
                    <div class="container "> 

                        <!-- Heading -->
                        <h1 style="font-size: 40px">No Product Found</h1>
                        <p>Products Will Comming Soon</p>
                        <hr class="dotted">
                        <a href="<?php echo site_url(); ?>" class="btn btn-inverse">BACK TO HOME</a>
                    </div>
                </section>
            </div>

        </div>

    </div>
</div>
<!-- End Content --> 


<script>
    var category_id = <?php echo $category; ?>;
</script>
<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>