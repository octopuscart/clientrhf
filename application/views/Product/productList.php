<?php
$this->load->view('layout/header');
?>
<?php
$linklist = ["<a href='" . site_url("Product/ProductList/" . $custom_id . "/0") . "'>$custom_item</a>"];
foreach ($categorie_parent as $key => $value) {
    $cattitle = $value['category_name'];
    $catid = $value['id'];
    $liobj = "<a href='" . site_url("Product/ProductList/" . $catid) . "'>$cattitle</a>";
    //array_push($linklist, $liobj);
}



$image1 = "";
$image2 = "";
?>

<div style="opacity: 0;position: fixed;">
    {{gitem_price = <?php echo $item_price; ?>}}
    {{showmodel = 1}}
</div>


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



        <?php
        switch ($custom_id) {
            case "1":
                ?>
                min-height: 260px;
                <?php
                break;
            case "2":
                ?>
                min-height: 390px;
                <?php
                break;
            case "5":
                ?>
                min-height: 390px;
                <?php
                break;
            case "3":
                ?>
                min-height: 262px;
                <?php
                break;
            case "4":
                ?>
                min-height: 390px;
                <?php
                break;
            default:
                ?>
                min-height: 260px;<?php
        }
        ?>
    }



    .product-box1{



        <?php
        switch ($custom_id) {
            case "1":
                ?>
                min-height: 260px;
                <?php
                break;
            case "2":
                ?>
                min-height: 540px;
                <?php
                break;
            case "5":
                ?>
                min-height: 520px;
                <?php
                break;
            case "3":
                ?>
                min-height: 262px;
                <?php
                break;
            case "4":
                ?>
                min-height: 540px;
                <?php
                break;
            default:
                ?>
                min-height: 260px;<?php
        }
        ?>
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
        <?php
        echo $custom_item;
        ?> Customization

        <!-- Breadcrumb -->
        <br/>
        <small style="font-size: 15px;" class="barcomb">
            <a href="<?php echo site_url("/"); ?>">Home</a>
            <?php echo count($linklist) ? "<i class='fa fa-arrow-right'></i>" : ''; ?>
            <?php
            echo implode("<i class='fa fa-arrow-right'></i>", $linklist)
            ?>
        </small>

    </h1>
</div>



<!-- Content -->
<div id="content" ng-controller="ProductController"> 

    <!-- Shop Content -->
    <div class="shop-content pad-t-b-60" >
        <div class="container">
            <div class="row"> 

                <!-- Shop Side Bar -->
                <div class="col-md-2 ">
                    <div class="side-bar">
                        <div class="search">
                            <form action="#" style="margin-top: 20px;">

                                <input type="text" name="search" placeholder="SEARCH" class="form-control" style="
                                       border-radius: 21px;
                                       border-top-right-radius: 0;
                                       border-bottom-right-radius: 0;
                                       width: 126px;
                                       float: left;
                                       margin-bottom: 0;
                                       height: 49px;

                                       ">
                                <button type="submit" class="btn btn-default" style="
                                        border-radius: 21px;
                                        border-top-left-radius: 0;
                                        border-bottom-left-radius: 0;
                                        width: 18px;
                                        float: left;
                                        padding: 0px 19px;
                                        "> <i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="spacer-30"></div>
                        <?php if (count($categories)) { ?>
                            <!-- HEADING -->
                            <div class="heading" >
                                <h6>Products Categories</h6>
                                <hr class="dotted">
                            </div>

                            <!-- CATEGORIES -->
                            <ul class="cate" style="padding-left: 20px;margin-bottom: 20px;">

                                <?php
                                foreach ($categories as $key => $value) {
                                    $subcategories = $value['sub_category'];
                                    ?>  

                                    <li>
                                        <a href="<?php echo site_url("Product/ProductList/" . $custom_id . "/" . $value['id']); ?>">
                                            <i class="flaticon-left-arrow"></i>
                                            <?php echo $value['category_name']; ?>

                                            <?php
                                            if (count($subcategories)) {
                                                ?>
                                                <span>
                                                    <i class="flaticon-next"></i>
                                                </span>
                                                <?php
                                            }
                                            ?>
                                        </a>
                                        <?php
                                        if (count($subcategories)) {
                                            ?>
                                            <ul class="dropdown-menu">
                                                <?php
                                                foreach ($subcategories as $key1 => $value1) {
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo site_url("Product/ProductList/" . $value1['id']); ?>">
                                                            <?php echo $value1['category_name']; ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                            <?php
                                        }
                                        ?>
                                    </li>
                                    <?php
                                }
                                ?>   
                            </ul>

                            <?php
                        } else {
                            ?>
                            <div class="heading">
                                <h6>
                                    <a href="<?php echo site_url('Product/ProductList/' . $custom_id . '/0') ?>"><i class="fa fa-arrow-left"></i> Back</a>   

                                </h6>
                                <hr class="dotted">
                            </div>
                            <?php
                        }
                        ?>


                        <!-- HEADING -->
                        <!-- HEADING -->
                        <div class="widget" style="margin-top: 30px;" >
                            <div class="heading">
                                <h6 class="widget-title font-alt">Filter by price</h6>
                            </div>
                            <hr class="dotted">
                            <!-- PRICE -->
                            <div class="cost-price-content12">
                                <label ng-repeat="price in productResults.priceList" style='font-weight: 500;width: 100%;'>
                                    <input type="checkbox" name='pricerange[]' class='pricefilter' value='{{price}}'> {{price|currency}}
                                </label>
                                <button class="col-xs-3 btn btn-link" style="    padding: 0;
                                        margin-bottom: 20px;" ng-click="getProducts()" >FILTER</button> 
                            </div>
                        </div>




                        <!-- HEADING -->
                        <div class="widget"  >
                            <div class="product_attr" ng-repeat="(attrk, attrv) in productResults.attributes" >
                                <div class="heading" ng-if='attrv.widget == "color"'>
                                    <h6>Color</h6>
                                    <hr class="dotted">
                                </div>

                                <!-- COLORE -->
                                <div class="cate" ng-if='attrv.widget == "color"' style="    list-style-type: none;">
                                    <div class="colorwidget" ng-repeat="atv in attrv" ng-if='atv.product_count'>

                                        <label style="font-weight: 500;background: {{atv.additional_value}};">

                                            <i class="fa fa-check" ng-if="atv.checked" style="    position: absolute;
                                               margin-top: 3px;
                                               margin-left: 1px;
                                               color: #fff;"></i>
                                            <input type="checkbox"  ng-model="atv.checked" ng-click="attributeProductGet(atv)" style="opacity: 0;"> 

                                            <!--{{atv.attribute_value}} ({{atv.product_count}})-->
                                        </label>


                                    <!--<a href="#."><input type="checkbox">{{atv.attribute_value}} <span>(32) </span></a>-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- HEADING -->
                        <div class="widget" >
                            <div class="heading" style="margin-top: 30px;" >
                                <h6 class="widget-title font-alt">Filter by Brand</h6>
                            </div>
                            <hr class="dotted">
                            <!-- PRICE -->
                            <div class="cost-price-content12">
                                <label ng-repeat="(brand, price) in productResults.brandList" style='font-weight: 500;width: 100%;'>
                                    <input type="checkbox" name='pricerange[]' class='pricefilter' value='{{price}}'> {{brand}}
                                </label>
                                <button class="col-xs-3 btn btn-link" style="    padding: 0;
                                        margin-bottom: 20px;" ng-click="getProducts()" >FILTER</button> 
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Main Shop Itesm -->          
                <div class="col-md-10" style="margin-bottom: 50px;margin-top: 10px;"> 

                    <form action="" id="filterdata">
                        <div class="row">
                            <div class="col-md-9 ">
                                <?php
                                $getquerydata = $_GET;
                                unset($getquerydata["filter"]);
                                foreach ($getquerydata as $key => $value) {
                                    echo "<input type='hidden' name='$key' value='$value'/>";
                                }
                                $searchitem = $getquerydata['search'] ? $getquerydata['search'] : "";
                                if ($searchitem) {
                                    echo "Search result for <b>$searchitem</b>";
                                    ?>
                                    &nbsp;&nbsp;<a href="<?php echo current_url(); ?>" class="text-danger"><i class="fa fa-times"></i> Clear Search</a>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-3 col-lg-offset-9">

                                <select name="filter" class="form-control" onchange="changeFilterData()"  style="    background: #f5f5f5;
                                        height: 45px;
                                        font-size: 12px;
                                        line-height: 50px;
                                        border: none;
                                        color: #000;
                                        width: 100%;
                                        margin-bottom: 0px;
                                        padding: 0 25px;border-radius: 0;">
                                    <option  value="Related" <?php echo $appliedFilter == 'Related' ? "selected" : ""; ?>>Related</option>
                                    <option  value="Sales" <?php echo $appliedFilter == 'Sales' ? "selected" : ""; ?>>Sales First</option>
                                    <option  value="Popular" <?php echo $appliedFilter == 'Popular' ? "selected" : ""; ?>>Popular First</option>

                                </select>



                            </div>
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
                        <?php
                        $citem_id = $custom_id;
                        ?>
                        <div class="row products-container content" ng-if="productProcess.state == 2">
                            <!-- Item -->

                            <div class="col-lg-4 col-md-4 col-sm-12" style="padding: 10px;" ng-repeat="(k, product) in productResults.products">
                                <!-- start gallery items -->
                                <div class="gallery-items" style="height: auto!important">
                                    <div class=" thumbnail card" style="    border: none;">
                                        <span ng-if="product.is_sale == 'true'" class="onsaletag">Sale</span> 
                                        <span ng-if="product.is_populer == 'true'" class="onpopulertag">HOT</span> 
                                        <center>




                                            <img class="img-responsive" src="<?php echo custome_image_server; ?>/thumb/{{product.folder}}/fabric20001.png" alt="product" style="border-radius: 10px;">

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
                                                <a  href="<?php echo site_url("Product/customizationRedirect/") ?><?php echo $custom_id; ?>/{{product.product_id}}" class="btn btn-danger"  title="Customize this fabric" style="    padding: 0 5px; line-height: 1.9375rem">Design Now
                                                </a> 
                                              
                                                <button type="button" class="btn btn-primary" ng-click="askPriceSelection(product.product_id)" style="    padding: 0 5px; line-height: 1.9375rem;margin: 0px 10px;">Price Enq.

                                                </button>
                                                <button type="button" class="btn btn-default" ng-click="addToWishlist(product.product_id, 1, <?php echo $custom_id; ?>)" title="Add To Wishlist" style="     padding: 0px 9px;
                                                        line-height: 1.9375rem;
                                                        margin: 0px 10px;
                                                        float: right;"><i class="fa fa-heart"></i>

                                                </button>
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
    <div class="modal  fade" id="productprice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    z-index: 20000000;">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" style="font-size: 15px">
                        Price Enquiry For 
                        <?php
                        echo $custom_item;
                        ?>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>



                <!-- Cart Details -->
                <div class="modal-body checkout-form">
                    <div class="custom_block_item">


                        <div class="row cart-details" >
                            <div class="col-sm-12 col-md-3" ng-repeat="product in askpricedata" ng-if="product.item_id == '<?php echo $citem_id; ?>'">
                                <div class="thumbnail">
                                    <img src="<?php echo custome_image_server; ?>/coman/output/{{product.folder}}/cutting20001.png" alt="" style="width: auto;" alt="...">

                                    <div class="caption">
                                        <h5 style="font-size:15px;" class="text-center m_bottom_10">{{product.title}}</h5>
                                        <p><a href="#."  ng-click="removePriceData(product.id)" class="btn btn-danger btn-xs btn-block" style="    padding: 0 10px;line-height:10px;"><i class="fa fa-remove d_inline_m fs_large" ></i> Remove</a> </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <form method="post" action="#">
                                    <div style="margin-top:10px;">
                                        <input type="hidden" name="item" value="<?php echo $custom_item; ?>" />
                                        <input type="hidden" name="item_id" value="<?php echo $citem_id; ?>" />

                                        <span ng-repeat="product in askpricedata">
                                            <input type="hidden" name="productid[]" value="{{product.id}}" />
                                        </span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 w_xs_full m_xs_bottom_10">
                                                <input type="text" name="last_name" placeholder="Last Name*" class="form-control" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 w_xs_full m_xs_bottom_10" >
                                                <input type="text" name="first_name" placeholder="First Name*" class="form-control" required="">
                                            </div>

                                        </div>
                                        <input type="email" name="email" placeholder="Email*" class="form-control" required="">


                                        <input type="tel" name="contact" placeholder="Contact No." class="form-control">


                                        <button type="submit" name="priceenquiry" class="btn btn-danger">Submit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Add More</button>


                                    </div>
                                </form>
                            </div>


                        </div>

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
                    <img class="img-responsive" src="<?php echo custome_image_server; ?>/thumb/{{selectedProduct.product.folder}}/fabric20001.png" alt="product" style="border-radius: 10px;">

                </div>

            </div>
        </div>
    </div>


</div>
<!-- End Content --> 


<!-- Modal -->
<div class="modal  fade" id="productcustome" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    z-index: 20000000;">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="font-size: 15px">
                    <?php
                    echo $custom_item;
                    ?>
                </h4>
            </div>

            <?php

            function createItemBlock($citem_id) {

                switch ($citem_id) {
                    case '1':
                        $item_array = array("title" => "Shirt(s)", "link" => site_url("Customization/customizationShirt"));
                        break;
                    case '2':
                        $item_array = array("title" => "Suit(s)", "link" => site_url("Customization/customizationSuitV2/2"));
                        break;
                    case '5':
                        $item_array = array("title" => "Tuxedo Suit(s)", "link" => site_url("Customization/customizationSuitV2/5"));
                        break;
                    case '6':
                        $item_array = array("title" => "Tuxedo Jackets(s)", "link" => site_url("Customization/customizationSuitV2/6"));
                        break;
                    case '7':
                        $item_array = array("title" => "Tuxedo Pants(s)", "link" => site_url("Customization/customizationSuitV2/7"));
                        break;
                    case '3':
                        $item_array = array("title" => "Pant(s)", "link" => site_url("Customization/customizationSuitV2/3"));
                        break;
                    case '4':
                        $item_array = array("title" => "Jacket(s)", "link" => site_url("Customization/customizationSuitV2/4"));
                        break;
                    default:
                        $item_array = array("title" => "Shirt(s)", "link" => site_url("Customization/customizationSuitV2"));
                }
                ?>

                <!-- Cart Details -->
                <div class="modal-body checkout-form">
                    <div class="custom_block_item">


                        <div class="row cart-details" >
                            <div class="col-sm-12 col-md-3" ng-repeat="product in globleCartDatanc.products" ng-if="product.item_id == '<?php echo $citem_id; ?>'">
                                <div class="thumbnail">
                                    <img src="{{product.file_name}}" alt="" style="width: auto;" alt="...">
                                    <div class="caption">
                                        <h5 style="font-size:15px;">{{product.title}}</h5>
                                        <p><span class="price">{{product.price|currency:" "}}</span> <a href="#." ng-click="removeCart(product.product_id)" class="pull-right"><i class="icon-close"></i></a> </p>
                                    </div>

                                </div>
                            </div>



                        </div>

                    </div>
                </div>
                <div class="modal-footer" ng-repeat="product in globleCartDatanc.products" ng-if="(product.item_id == '<?php echo $citem_id; ?>') && $index == 0">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Add More</button>
                    <a href="<?php echo $item_array['link']; ?>" class="btn btn-default pull-right">Customize Now <i class="fa fa-arrow-right"></i></a> 
                </div>

                <?php
            }

            createItemBlock($custom_id);
            ?>




        </div>
    </div>
</div>



<script>
    var category_id = <?php echo $category; ?>;
    var custom_id = <?php echo $custom_id; ?>;
    var searchdata = "<?php echo isset($_GET["search"]) ? ($_GET["search"] != '' ? $_GET["search"] : '0') : "0"; ?>";
    var filter = "<?php echo $appliedFilter; ?>";</script>
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