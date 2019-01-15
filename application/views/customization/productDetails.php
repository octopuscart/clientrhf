<?php
$this->load->view('layout/header');
?>

<!-- Slider -->
<section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
        <div class="container">
            <h4><?php echo $product_details['title']; ?></h4>
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
<div id="content"> 

    <!--======= PAGES INNER =========-->
    <section class="item-detail-page pad-t-b-60">
        <div class="container">
            <div class="row"> 

                <!--======= IMAGES SLIDER =========-->
                <div class="col-sm-6 large-detail">
                    <div class="images-slider"  style="background: none;">
                        <ul class="slides">

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
                                        <li data-thumb="<?php echo imageserver . $value; ?>"> 
                                        <center> 
                                            <img class="img-responsive" src="<?php echo imageserver . $value; ?>"  alt="" style="height: auto;width: 500px;">
                                        </center>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                            ?>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--======= ITEM DETAILS =========-->
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5><?php echo $product_details['title']; ?></h5>
                            <span class="price">
                                {{<?php echo $product_details['price']; ?>|currency:" Rs. "}}
                            </span> 
                            <?php
                                if($product_details['credit_limit']){
                                ?>
                            <span class="credit_limit">
                                 Credit Can Be Used <b>{{<?php echo $product_details['credit_limit']; ?>|currency:" Rs. "}}</b>
                            </span>
                                <?php
                                }
                                ?>  
                        </div>
                        <div class="col-sm-12"> 
                            <span class="code">Item Code: <?php echo $product_details['sku']; ?></span>
                            <div class="some-info">
                                <?php if ($product_details['stock_status'] == 'In Stock') { ?>
                                    <div class="in-stoke"> <i class="fa fa-check-circle"></i> IN STOCK</div>
                                <?php } ?>

                                <div class="stars">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                                </div>
                                <a href="#review"  class="review">(3) Review</a> &nbsp;&nbsp;&nbsp; <a href="#review-form" class="review">Add Your Review</a></div>
                        </div>
                    </div>
                    <p><?php echo $product_details['short_description']; ?></p>
                    <hr>
                    <div class="row">
                        <?php
                        foreach ($product_attr as $key => $value) {
                            ?>
                            <div class="col-sm-6">
                                <div class="item-select"> 
                                    <!-- COLOR -->
                                    <p><?php echo $value['attribute'];?></p>
                                    <select class="selectpicker">
                                        <option><?php echo $value['attribute_value'];?></option>
                                    </select>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <div class="row"> 
                        <!-- QUIENTY -->
                        <div class="col-sm-12">
                            <div class="fun-share">
                                <input type="number" value="1" ng-model="product_quantity" >
                                <a href="#." class="btn btn-small btn-dark" ng-click="addToCart(<?php echo $product_details['id'];?>, product_quantity)">ADD TO CART</a>
                                <a href="#." class="btn btn-small btn-dark">BUY NOW</a>
                            </div>
                        </div>
                        <!-- SHARE -->
                        <div class="col-sm-12">
                            <ul class="share-with">
                                <li>
                                    <p>SHARE WITH</p>
                                </li>
                                <li><a href="#."><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#."><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#."><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#."><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!--======= PRODUCT DESCRIPTION =========-->
            <div class="item-decribe">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#descr" role="tab" data-toggle="tab">DESCRIPTION</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content"> 
                    <!-- DESCRIPTION -->
                    <div role="tabpanel" class="tab-pane fade  in active" id="descr">
                        <?php echo $product_details['description']; ?> 
                    </div>

               

                </div>
            </div>
        </div>
    </section>
    
    
    
      <!-- Tesm Text -->
    <section class="lookin-pro" data-stellar-background-ratio="0.5" style="background:url(<?php echo imageserver. $product_details['file_name1'];?>);background-size: cover; ">
      <div class="container"> 
        
        <!-- Heading -->
        <div class="heading-block white margin-bottom-20">
          <h4>- <?php echo $product_details['sku']; ?> - </h4>
          <h3><?php echo $product_details['title']; ?></h3>
          <hr>
        </div>
        <div class="intro-small col-md-11 center-auto margin-bottom-0">
          <p><?php echo $product_details['short_description']; ?></p>
        </div>
      </div>
    </section>
    

  
</div>
<!-- End Content --> 



<?php
$this->load->view('layout/footer');
?>