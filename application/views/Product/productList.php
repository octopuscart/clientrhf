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
                min-height: 520px;
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
                min-height: 520px;
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
        height:520px!important;
        border-radius: 15px;
    }   

    .imagehover{
        height: 250px;border-radius: 10px;border-radius: 10px;
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
                <div class="col-md-2">
                    <div class="side-bar">
                        <!--                        <div class="search">
                                                    <form>
                                                        <input type="text" placeholder="SEARCH">
                                                        <button type="submit"> <i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>-->
                        <div class="spacer-30"></div>
                        <?php if (count($categories)) { ?>
                            <!-- HEADING -->
                            <div class="heading">
                                <h6>Products Categories</h6>
                                <hr class="dotted">
                            </div>

                            <!-- CATEGORIES -->
                            <ul class="cate" style="padding-left: 20px;">

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
                                    <a href="<?php echo site_url('Product/ProductList/'.$custom_id.'/0') ?>"><i class="fa fa-arrow-left"></i> Back</a>   

                                </h6>
                                <hr class="dotted">
                            </div>
                            <?php
                        }
                        ?>


                        <!-- HEADING -->
                        <!--                        <div  ng-if='atv.product_count'>
                                                    <div class="heading">
                                                        <h6>Filter by price</h6>
                                                        <hr class="dotted">
                                                    </div>
                                                     PRICE 
                                                    <div class="cost-price-content">
                                                        <div id="price-range" class="price-range"></div>
                                                        <span id="price-min" class="price-min">20</span> <span id="price-max" class="price-max">80</span> <a href="#." class="btn btn-small btn-inverse pull-right" >FILTER</a> </div>
                                                </div>-->

                        <!-- HEADING -->

                        <div class="product_attr" ng-repeat="(attrk, attrv) in productResults.attributes" >
                            <div class="heading" ng-if='attrv.widget == "color"'>
                                <h6>Color</h6>
                                <hr class="dotted">
                            </div>

                            <!-- COLORE -->
                            <ul class="cate" ng-if='attrv.widget == "color"' style="    list-style-type: none;">
                                <li ng-repeat="atv in attrv" ng-if='atv.product_count'>

                                    <label style="font-weight: 500;background: {{atv.additional_value}};padding: 0px 5px;float: left;
                                           margin-right: 5px;border: 1px solid #0000005e;border: 1px solid #0000005e;
                                           text-shadow: 0px 1px 4px #000;">
                                        <input type="checkbox"  ng-model="atv.checked" ng-click="attributeProductGet(atv)" style="opacity: 0;"> 

                                        <i class="fa fa-check" ng-if="atv.checked" style="    position: absolute;
                                           margin-top: -22px;
                                           color: #fff;"></i>
                                        <!--{{atv.attribute_value}} ({{atv.product_count}})-->
                                    </label>


                                    <!--<a href="#."><input type="checkbox">{{atv.attribute_value}} <span>(32) </span></a>-->
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <!-- Main Shop Itesm -->          
                <div class="col-md-10" style="margin-bottom: 50px"> 


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
<!--                                        <div class="product-img-holder">
                                            <a href="#">

                                                <div class="product_image_back" style="background: url(<?php echo custome_image_server; ?>/coman/fabricsx/{{product.folder}}.jpg);     height: 350px;background-size: cover;"></div>


                                            </a>
                                        </div>-->
                                        <center>




                                            <img class="img-responsive" src="<?php echo custome_image_server; ?>/coman/fabricsx/{{product.folder}}.jpg" alt="product" style="height: 400px;border-radius: 10px;">
                                            <div class="img-responsive imagehover" style="" ng-click="zoomProduct(product)" data-toggle="modal" data-target="#zoomModel">
                                                <i class="fa fa-search-plus" style="    color: black;
                                                   margin-top: 53%;"></i>
                                            </div>



                                            <h3 style="text-align: center;font-size: 15px">{{product.title}}
                                                <br>
                                                <span >{{product.short_description}} </span></h3>
                                            <!--<p style="text-align: center">{{product.price|currency:"<?php echo globle_currency; ?> "}}</p>-->
                                            <br>
                                            <p>
                                            <center> 
<!--                                                <a href="<?php echo site_url("Product/customizationRedirect/") ?><?php echo $custom_id; ?>/{{product.product_id}}" class="btn btn-danger"  title="Customize this fabric" style="    padding: 0 5px; line-height: 1.9375rem">Design Now
                                                </a> -->
                                                <a href="#" class="btn btn-danger"  title="Customize this fabric" style="    padding: 0 5px; line-height: 1.9375rem">Design Now
                                                </a> 
                                                <button type="button" class="btn btn-primary" ng-click="askPriceSelection(product.product_id)" style="    padding: 0 5px; line-height: 1.9375rem">Price Enq.

                                                </button>
                                            </center>
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




                    <!--                     Pagination 
                                        <ul class="pagination">
                                            <li><a href="#.">1</a></li>
                                            <li><a href="#.">2</a></li>
                                            <li><a href="#.">....</a></li>
                                            <li><a href="#.">&gt;</a></li>
                                        </ul>-->

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
                    <img class="img-responsive" src="<?php echo custome_image_server; ?>/coman/fabricsx/{{selectedProduct.product.folder}}.jpg" alt="product" style="border-radius: 10px;">

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
    var custom_id = <?php echo $custom_id; ?>;</script>
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