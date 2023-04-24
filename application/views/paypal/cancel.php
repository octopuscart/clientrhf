<?php
$this->load->view('layout/header');
?>
<div class="page-header" style="height: 160px">
    <div class="container">

        <h1 style="    color: black;
            margin-bottom: 30px;
            font-size: 30px;
            text-shadow: 0px 0px;">Order Details</br>
            <p style="font-size:15px;margin:10px auto;">Payment</p>

        </h1>

        <!-- Breadcrumb -->



    </div>
</div>


<!-- Cart Page Area Start Here -->
<div class="cart-page-area">
 

    <!-- Content -->
    <div id="content"  > 
        <!-- Tesm Text -->
        <section class="error-page text-center pad-t-b-130">
            <div class="container "> 

                <!-- Heading -->
                <h1 style="font-size: 40px">Payment Cancelled </h1>
                <p>You have canceled payment using PayPal try to make payment using other method or retry using PayPal. </p>
                <hr class="dotted">
               
                <a href="<?php echo site_url("Cart/checkoutPayment"); ?>" class="btn-send-message "> <i class="fa fa-arrow-left"></i> OTHER PAYMENT METHOD </a>
                <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token= <?php  echo $token;?>" class="btn-send-message ">RETRY PAYPAL <i class="fa fa-arrow-right"></i></a>
            </div>
        </section>
    </div>
    <!-- End Content --> 


</div>
<!-- Cart Page Area End Here -->
<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>