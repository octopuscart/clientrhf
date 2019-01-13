<?php
$this->load->view('layout/header');
?>
<?php
$linklist = [];
foreach ($categorie_parent as $key => $value) {
    $cattitle = $value['category_name'];
    $catid = $value['id'];
    $liobj = "<li><a href='" . site_url("Product/ProductList/" . $catid) . "'>$cattitle</a></li>";
    array_push($linklist, $liobj);
}
?>


<style>
    .product_image_back {
        background-size: contain!important;
        background-repeat: no-repeat!important;
        height: 236px!important;
        background-position-x: center!important;
        background-position-y: center!important;
    }

    .productblock{
        padding: 10px;
        border: 1px solid rgb(255, 214, 88);
        margin-bottom: 30px;
    }
</style>

<!--content-->
<div class="content" ng-controller="ProductController">
    <div class="products-agileinfo" style="    padding: 1em 0;">
        <h2 class="tittle">
            <?php
            foreach ($categorie_parent as $key => $value) {
                $title = $value['category_name'];
                $cid = $value['id'];
              //  echo "<span >" . $title . "</span>";
            }
            ?>
            <span><?php echo $custom_item;?></span>
        </h2>
        <div class="container">
            <div class="product-agileinfo-grids" style="    margin-top: -10px;">
                <div class="col-md-3 product-agileinfo-grid">

                    <div class="price">
                        <h3>Price Range</h3>
                        <ul class="dropdown-menu6">
                            <li>                
                                <div id="slider-range"></div>							
                                <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
                            </li>			
                        </ul>
                        <script type="text/javascript" src="<?php echo base_url(); ?>assets/theme/js/jquery-ui.js"></script>
                    </div>


                </div>
                <div class="col-md-9 product-agileinfon-grid1">
                    <div class="product-agileinfon-top">
                        <div class="col-md-6 product-agileinfon-top-left">
                            <img class="img-responsive " src="images/img1.jpg" alt="">
                        </div>
                        <div class="col-md-6 product-agileinfon-top-left">
                            <img class="img-responsive " src="images/img2.jpg" alt="">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!--                    <div class="mens-toolbar">
                                            <p >Showing 1–9 of 21 results</p>
                                            <p class="showing">Sorting By
                                                <select>
                                                    <option value=""> Name</option>
                                                    <option value="">  Rate</option>
                                                    <option value=""> Color </option>
                                                    <option value=""> Price </option>
                                                </select>
                                            </p> 
                                            <p>Show
                                                <select>
                                                    <option value=""> 9</option>
                                                    <option value="">  10</option>
                                                    <option value=""> 11 </option>
                                                    <option value=""> 12 </option>
                                                </select>
                                            </p>
                                            <div class="clearfix"></div>		
                                        </div>-->

                    <div class="product-tab prod1" style="margin: 2em 0;">
                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem" ng-repeat="(k, product) in productResults.products">
                            <div class="grid-arr">
                                <div  class="grid-arrival">
                                    <figure>		
                                        <a href="#" class="new-gri" data-toggle="modal1" data-target="#myModal2">
                                            <div class="grid-img">
                                                <div class="product_image_back" style="background: url(<?php echo imageserver; ?>{{product.file_name}})"></div>
                                            </div>

                                        </a>		
                                    </figure>	
                                </div>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="women">
                                    <h6><a href="single.html">{{product.title}}</a></h6>
                                    <span class="size">{{product.short_description}} </span>
                                    <p ><del  ng-if="product.sale_price > 0">{{product.regular_price|currency:"<?php echo globle_currency;?> "}}</del>
                                        <em class="item_price">{{product.price|currency:"<?php echo globle_currency;?> "}}</em></p>
                                    <a href="<?php echo site_url("Product/customizationRedirect/")?><?php echo $custom_id;?>/{{product.product_id}}" data-text="Customize Now" class="my-cart-b item_add" >Customize Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>



                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
</div>
<!--content-->


<script>
    var category_id = <?php echo $category; ?>;
</script>
<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>