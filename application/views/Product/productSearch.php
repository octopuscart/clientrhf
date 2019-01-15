<?php
$this->load->view('layout/header');
?>
<?php
$linklist = [];

?>


<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>
                        <?php
                        echo count($linklist) ? $cattitle : 'Shop Now';
                        ?>
                    </h1>
                    <ul>
                        <li><a href="<?php echo site_url("/"); ?>">Home</a></li>
                        <?php echo count($linklist) ? "<b class='barcomb-list'>/</b>" : ''; ?>
                        <?php
                        echo implode("<b class='barcomb-list'>/</b>", $linklist)
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Shop Page Area Start Here -->
<div class="shop-page-area" ng-controller="ProductSearchController">
    <div class="container">
        

        <div class="row"  ng-if="productResults.products.length">
            <div class="col-lg-3 col-md-3">
                <div class="sidebar hidden-after-desk">
                  


                    <div class="product_attr" ng-repeat="(attrk, attrv) in productResults.attributes" >
                        <!-- HEADING -->
                  
                        <h2 class="title-sidebar product_attr_h2">{{attrk}}</h2>

                        <!-- COLORE -->
                        <ul class="cate">
                            <li ng-repeat="atv in attrv">
                                <a href="#.">
                                    <label style="font-weight: 500">
                                        <input type="checkbox"  ng-model="atv.checked" ng-click="attributeProductGet(atv)">  {{atv.attribute_value}} ({{atv.product_count}})
                                    </label>
                                </a>

                                    <!--<a href="#."><input type="checkbox">{{atv.attribute_value}} <span>(32) </span></a>-->
                            </li>
                        </ul>
                    </div>





                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                        <h3>Your are searching (<?php echo $keyword?>)</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4">
                        <div class="inner-shop-top-right">
                            <ul>
                                <li class="active"><a href="#gried-view" data-toggle="tab" aria-expanded="false"><i class="fa fa-th-large"></i></a></li>
                                <li><a href="#list-view" data-toggle="tab" aria-expanded="true"><i class="fa fa-list"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row inner-section-space-top">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active clear products-container" id="gried-view">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6"  ng-repeat="(k, product) in productResults.products">
                                <div class="product-box1">
                                    <ul class="product-social">
                                        <li><a href="#" ng-click="addToCart(product.product_id, 1)"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                        <!--<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>-->
                                        <li><a href="#" data-toggle="modal" data-target="#myModal" ng-click="viewShortDetails(product)"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                    </ul>
                                    <div class="product-img-holder">
                                        <div class="hot-sale" ng-if="product.sale_price > 0">
                                            <span>Sale</span>
                                        </div>
                                        <a href="<?php echo site_url("Product/ProductDetails/"); ?>{{product.product_id}}">
                                            <!--<img class="img-responsive" src="<?php echo imageserver; ?>{{product.file_name}}" alt="product">-->
                                            <div class="product_image_back product_image_back_grid" style="background: url(<?php echo imageserver; ?>{{product.file_name}});"></div>

                                        </a>
                                    </div>
                                    <div class="product-content-holder product_details_height">
                                        <h3><a href="<?php echo site_url("Product/ProductDetails/"); ?>{{product.product_id}}">{{product.title}} 
                                                <br>
                                                <p>{{product.attr}} </p>
                                            </a></h3>
                                        <span>
                                            <span ng-if="product.sale_price > 0"> {{product.regular_price|currency:"<?php echo globle_currency; ?> "}}</span>
                                            {{product.price|currency:"<?php echo globle_currency; ?> "}}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- List Style -->
                        <div role="tabpanel" class="tab-pane clear products-container" id="list-view">
                            <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12 product_list_style"  ng-repeat="(k, product) in productResults.products">
                                <div class="product-box2">
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <!--<img class="img-responsive" src="img/product/grid/1.jpg" alt="product" />-->
                                            <div class="product_image_back product_image_back_list" style="background: url(<?php echo imageserver; ?>{{product.file_name}});"></div>

                                        </a>
                                        <div class="media-body">
                                            <div class="product-box2-content ">
                                                <h3><a href="#">{{product.title}} </a></h3>
                                                <span>{{product.price|currency:"<?php echo globle_currency; ?> "}}</span>
                                                <p>
                                                    {{product.short_description}}
                                                    <br/>
                                                    {{product.attr}} 
                                                </p>
                                            </div>
                                            <ul class="product-box2-cart" style="    margin-top: 0px;">
                                                <li><a href="#" ng-click="addToCart(product.product_id, 1)">Add To Cart</a></li>
                                                <!--<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>-->
                                                <li><a href="#" data-toggle="modal" data-target="#myModal" ng-click="viewShortDetails(product)"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
<!--                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="mypagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div>
                </div>-->
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
                        <a href="<?php echo site_url(); ?>" class="woocommerce-Button button btn-shop-now-fill">BACK TO HOME</a>
                    </div>
                </section>
            </div>

        </div>
        
    </div>
</div>
<!-- Shop Page Area End Here -->


<!-- Shop Page Area End Here -->
<div id="paging_container1" class="container1">
    <h2>Vanilla</h2>
    <div class="page_navigation"></div>

    <ul class="content">
        <li><p>One</p></li> 
        <li><p>Two</p></li> 
        <li><p>Three</p></li> 
        <li><p>Four</p></li> 
        <li><p>Five</p></li> 
        <li><p>Six</p></li> 
        <li><p>Seven</p></li> 
        <li><p>Eight</p></li> 
        <li><p>Nine</p></li> 
        <li><p>Ten</p></li> 
        <li><p>Eleven</p></li> 
        <li><p>Twelve</p></li> 
        <li><p>Thirteen</p></li> 
        <li><p>Fourteen</p></li> 
        <li><p>Fifteen</p></li> 
        <li><p>Sixteen</p></li> 
    </ul>	
</div>	


<script>
    
    var keywords = "<?php echo $keyword?>";
</script>

<script src="<?php echo base_url(); ?>assets/theme2/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>
<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme2/js/jquery.pajinate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#paging_container1').pajinate();
    });
</script>