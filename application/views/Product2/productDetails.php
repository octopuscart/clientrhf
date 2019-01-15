<?php
$this->load->view('layout/header');
?>

<?php
$linklist = [];
$cattitle = "";
foreach ($categorie_parent as $key => $value) {
    $cattitle = $value['category_name'];
    $catid = $value['id'];
    $liobj = "<li><a href='" . site_url("Product/ProductList/" . $catid) . "'>$cattitle</a></li>";
    array_push($linklist, $liobj);
}
?>


<style>
   .frame {
  
  font-family: sans-serif;
	overflow: hidden;

	margin: 3vw;
  display: inline-block;
  
  .zoom {
    
    font-size: 1.3vw;
		transition: transform 0.2s linear;
    
  }
  
  
  img {
	  
    max-width: 25vw;
  
  }
  
  
  .lorem {
    
    padding: 2% 2%;
  
  }
  
  
  form {

    margin : 2% auto;    
    text-align: center;
    
    button {
      
      font-size: inherit;
      margin: inherit;
      
    }
  
    input {
      
      border {
        radius : 5px;
        style: 1px solid;
      }    
     
      width :20vw;
      margin : 2% auto;
      padding: .5vw .8vw;
      font-size: 1.3vw;
    
    }
  }
}
</style>


<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background: url(<?php echo imageserver . $product_details['file_name2']; ?>);    background-position: center;background-size: cover;
     background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>
                        <?php echo $product_details['title']; ?>
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







<!-- Product Details2 Area Start Here -->
<div class="product-details2-area" ng-controller="ProductDetails">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="inner-product-details-left">
                    <div class="tab-content frame">

                        <?php
                        $images = array(
                            'img1' => $product_details['file_name'],
                            'img2' => $product_details['file_name1'],
                            'img3' => $product_details['file_name2'],
                        );
                        foreach ($images as $key => $value) {
                            $countarray = explode(".", $value);
                            if (end($countarray)) {
                                if ($value) {
                                    ?>
                                    <div class="tab-pane fade <?php echo $key == 'img1' ? 'active in' : ''; ?> zoom" id="images_<?php echo $key; ?>">
                                        <a href="#" class="zoom ex1 product_image_detail">
                                            <div class="product_image_back product_image_detail_big" style="background: url(<?php echo imageserver . $value; ?>"></div>
                                            <!--<img alt="single" src="img/product/product-details1.jpg" class="img-responsive">-->
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <ul>
                        <?php
                        foreach ($images as $key => $value) {
                            $countarray = explode(".", $value);
                            if (end($countarray)) {
                                if ($value) {
                                    ?>
                                    <li class="<?php echo $key == 'img1' ? 'active' : ''; ?>">
                                        <a class="product_image_detail" href="#images_<?php echo $key; ?>" data-toggle="tab" aria-expanded="false">
                                            <div class="product_image_back product_image_detail_small" style="background: url(<?php echo imageserver . $value; ?>"></div>
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="inner-product-details-right">
                    <h3><?php echo $product_details['title']; ?><br/>
                        <small><?php echo $product_details['title']; ?>
                            <span style="    font-size: 12px;color: #000;"></span>
                        </small>
                    </h3>
                    <ul>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    </ul>
                    <p class="price">{{<?php echo $product_details['price']; ?>|currency:"<?php echo globle_currency; ?> "}}</p>
                    <p>
                        <?php echo $product_details['short_description']; ?>
                    </p>


                    <div class="product-details-content">
                        <p><span>Availability:</span> <?php echo $product_details['stock_status']; ?></p>
                        <p><span>Category:</span> <?php echo $cattitle; ?></p>

                    </div>


                    <div class="product_variation_list">

                        <?php
                        foreach ($product_attr as $key => $value) {
                            $productvrnt = $product_attr_variant[$value['attribute']];
                            if (count($productvrnt) > 1) {
                                ?>
                                <p class="product_detail_attr" style="margin-top: 10px;"><?php echo $value['attribute']; ?></p>

                                <ul class="product-tags">
                                    <?php
                                    foreach ($product_attr_variant[$value['attribute']] as $kat => $vat) {
                                        ?>
                                        <li class="<?php echo $vat['attribute_value'] == $value['attribute_value'] ? 'active' : ''; ?>">
                                            <a href="<?php echo site_url("Product/ProductDetails/" . $vat['product_id']); ?>" ><?php echo $vat['attribute_value']; ?></a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <?php
                            }
                        }
                        ?>


                        <!--                        <form id="checkout-form">
                        
                        <?php
                        foreach ($product_attr as $key => $value) {
                            $productvrnt = $product_attr_variant[$value['attribute']];
                            if (count($productvrnt) > 1) {
                                ?>
                                                                                                                                                                            <div class="col-md-6">
                                                                                                                                                                                <ul class="more-option">
                                                                                                                                                                                    <li>
                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                            <div class="custom-select">
                                                                                                                                                                                                 COLOR 
                                                                                                                                                                                                <p class="product_detail_attr"><?php echo $value['attribute']; ?></p>
                                                                                                                                                                                                <select  class='select2'>
                                <?php
                                foreach ($product_attr_variant[$value['attribute']] as $kat => $vat) {
                                    ?>
                                    <?php //echo $value['attribute_value']; ?>
                                                                                                                                                                                                                                                                <option <?php echo $vat['attribute_value'] == $value['attribute_value'] ? 'selected' : ''; ?> value="<?php echo $vat['product_id']; ?>" ><?php echo $vat['attribute_value']; ?></option>
                                    <?php
                                }
                                ?>
                                                                                                                                                                                                </select>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </li>
                                                                                                                                                                                </ul>
                                                                                                                                                                            </div>
                                <?php
                            }
                        }
                        ?>
                                                </form>-->
                    </div>


                    <ul class="inner-product-details-cart">
                        <li>
                            <div class="input-group quantity-holder" id="quantity-holder">
                                <input type="text" name='quantity' class="form-control quantity-input" ng-model="productver.quantity" placeholder="1">
                                <div class="input-group-btn-vertical">
                                    <button class="btn btn-default quantity-plus" type="button" ng-click="updateCartDetail('add')"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    <button class="btn btn-default quantity-minus" type="button" ng-click="updateCartDetail('sub')"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </li>
                        <li><a href="#" ng-click="addToCart(<?php echo $product_details['id']; ?>, productver.quantity)">Add To Cart</a></li>
    <!--                            <li><a href="#"><i aria-hidden="true" class="fa fa-heart-o"></i></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                        -->
                    </ul>






                </div>
            </div>
        </div>
        <div class="product-details-tab-area">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul>
                        <li class="active"><a href="#highlights" data-toggle="tab" aria-expanded="false">Highlights</a></li>
                        <li><a href="#description" data-toggle="tab" aria-expanded="false">Description</a></li>
                        <?php
                        if ($product_details['video_link']) {
                            ?>
                            <li><a href="#videodescription" data-toggle="tab" aria-expanded="false">Video Description</a></li>

                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="tab-content">

                        <div class="tab-pane fade active in spacification_product_details" id="highlights">
                            <div class="product-details-content product_highlights">
                                <p><span>Availability:</span> <?php echo $product_details['stock_status']; ?></p>
                                <p><span>Category:</span> <?php echo $cattitle; ?></p>
                                <?php
                                foreach ($product_attr as $key => $value) {
                                    ?>
                                    <p><span><?php echo $value['attribute']; ?>:</span> <?php echo $value['attribute_value']; ?></p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="tab-pane fade in spacification_product_details" id="description">
                            <p class="">
                                <?php echo $product_details['description']; ?> 
                            </p>
                        </div>

                        <?php
                        if ($product_details['video_link']) {
                            ?>
                            <div class="tab-pane fade in spacification_product_details" id="videodescription">
                                <p class="">
                                <center>
                                    <iframe width="800" height="400" src="<?php echo $product_details['video_link']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </center>
                                </p>
                            </div>
                            <?php
                        }
                        ?>



                    </div>
                </div>
            </div>
        </div>
        <div class="featured-products-area2">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="title-carousel">Related Products</h2>
                </div>
            </div>
            <div class="metro-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="3" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">

                <?php
                foreach ($product_related as $key => $value) {
                    ?>

                    <div class="product-box1">
                        <ul class="product-social">
                            <li><a href="#" ng-click="addToCart(<?php echo $value['id']; ?>, 1)"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        </ul>
                        <div class="product-img-holder">
                            <?php
                            if ($value['sale_price']) {
                                ?>
                                <div class="hot-sale" >
                                    <span>Sale</span>
                                </div>
                                <?php
                            }
                            ?>

                            <a href="#">
                                <div class="product_image_back product_image_back_grid" style="background: url(<?php echo imageserver . $value['file_name']; ?>);"></div>

                            </a>
                        </div>
                        <div class="product-content-holder">
                            <h3><a href="#"><?php echo $value['title']; ?></a></h3>
                            <span>
                                <?php
                                if ($value['sale_price']) {
                                    ?>
                                    <span>{{<?php echo $value['sale_price']; ?>|currency:"<?php echo globle_currency; ?> "}}</span>
                                    <?php
                                }
                                ?>
                                {{<?php echo $value['price']; ?>|currency:"<?php echo globle_currency; ?> "}}
                            </span>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Product Details1 Area End Here -->




<?php
$this->load->view('layout/footer');
?>
<script>
    
    //zoom plugin

        $(document).on('mousemove', '.frame', function () {

            var element = {
                width: $(this).width(),
                height: $(this).height()
            };

            var mouse = {
                x: event.pageX,
                y: event.pageY
            };

            var offset = $(this).offset();

            var origin = {
                x: (offset.left + (element.width / 2)),
                y: (offset.top + (element.height / 2))
            };

            var trans = {
                left: (origin.x - mouse.x) / 2,
                down: (origin.y - mouse.y) / 2
            };

            var transform = ("scale(2,2) translateX(" + trans.left + "px) translateY(" + trans.down + "px)");

            $(this).children(".zoom").css("transform", transform);

        });

        $(document).on('mouseleave', '.frame', function () {
            $(this).children(".zoom").css("transform", "none");
        });

        //end of zoom
    
</script>