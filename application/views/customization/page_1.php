<?php
$this->load->view('layout/header');
?>

<!-- Slider -->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>Cart</h4>
        
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Cart</li>
        </ol>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Shop Content -->
    <div class="shop-content pad-t-b-130">
      <div class="container"> 
        <!-- Payments Steps -->
        <div class="shopping-cart text-center">
          <div class="cart-head">
            <ul class="row">
              <!-- PRODUCTS -->
              <li class="col-sm-2 text-left">
                <h6>PRODUCTS</h6>
              </li>
              <!-- NAME -->
              <li class="col-sm-4 text-left">
                <h6>NAME</h6>
              </li>
              <!-- PRICE -->
              <li class="col-sm-2">
                <h6>PRICE</h6>
              </li>
              <!-- QTY -->
              <li class="col-sm-1">
                <h6>QTY</h6>
              </li>
              
              <!-- TOTAL PRICE -->
              <li class="col-sm-2">
                <h6>TOTAL</h6>
              </li>
              <li class="col-sm-1"> </li>
            </ul>
          </div>
          
          <!-- Cart Details -->
          <ul class="row cart-details" ng-repeat="product in globleCartData.products" >
            <li class="col-sm-6">
              <div class="media"> 
                <!-- Media Image -->
                <div class="media-left media-middle"> 
                    <a href="#." class="item-img"> 
                        <img class="media-object" src="{{product.file_name}}" alt="" style="height: 100px;width: auto;"> 
                    </a> 
                </div>
                
                <!-- Item Name -->
                <div class="media-body">
                  <div class="position-center-center">
                    <h5>{{product.title}}</h5>
                    <!--<p>Lorem ipsum dolor sit amet</p>-->
                  </div>
                </div>
              </div>
            </li>
            
            <!-- PRICE -->
            <li class="col-sm-2">
              <div class="position-center-center"> <span class="price"> {{product.price|currency:" "}}</span> </div>
            </li>
            
            <!-- QTY -->
            <li class="col-sm-1">
              <div class="position-center-center">
                <div class="quinty"> 
                  <!-- QTY -->
                  <input type="number" value="1" placeholder="1" ng-model=""product.quantity">
                </div>
              </div>
            </li>
            
            <!-- TOTAL PRICE -->
            <li class="col-sm-2">
              <div class="position-center-center"> <span class="price"> {{product.total_price|currency:" "}} </div>
            </li>
            
            <!-- REMOVE -->
            <li class="col-sm-1">
              <div class="position-center-center"> <a href="#."><i class="icon-close"></i></a> </div>
            </li>
            
          </ul>
          
        
        </div>
      </div>
    </div>
    
    <!--======= PAGES INNER =========-->
    <section class="pad-t-b-130 light-gray-bg shopping-cart small-cart">
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0"> 
          
          <!-- DISCOUNT CODE -->
          <h6>DISCOUNT CODE</h6>
          <div class="row">
            <div class="col-sm-6">
              <form>
                <input type="text" value="" placeholder="Coupon Code...">
                <button type="submit" class="btn btn-inverse">APPLY CODE</button>
              </form>
            </div>
            <div class="col-sm-6 text-right">
              <div class="coupn-btn"> <a href="#." class="btn btn-inverse">update cart</a> </div>
            </div>
            <div class="clearfix margin-bottom-50"></div>
            
            <!-- SUB TOTAL -->
            <div class="col-sm-12">
              <h6>grand total</h6>
              <div class="grand-total">
                <div class="order-detail">
                  <p>WOOD CHAIR <span>$598 </span></p>
                  <p>STOOL <span>$199 </span></p>
                  <p>WOOD SPOON <span> $139</span></p>
                  
                  <!-- SUB TOTAL -->
                  <p class="all-total">TOTAL COST <span> $998</span></p>
                </div>
              </div>
            </div>
            <div class="col-sm-12 text-right margin-top-30">
              <div class="coupn-btn"> <a href="#." class="btn btn-inverse">continue shopping</a> </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- End Content --> 



<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>