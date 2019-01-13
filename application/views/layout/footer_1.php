<!-- Footer -->
<footer class="footer-shop">
    <div class="container"> 
        <div class="row"> 

            <!-- Contact -->
            <div class="col-md-4">
                <h4>Contact Information!</h4>
                <p><b>Address:</b> PO Box 16122 Collins Street West Victoria 8007 Australia</p>
                <p><b>Phone:</b> (+100) 123 456 7890</p>
                <p><b>Email:</b> demos@domain.com</p>
                <div class="social-links"> <a href="#."><i class="fa fa-facebook"></i></a> <a href="#."><i class="fa fa-twitter"></i></a> <a href="#."><i class="fa fa-linkedin"></i></a> <a href="#."><i class="fa fa-pinterest"></i></a> <a href="#."><i class="fa fa-instagram"></i></a> <a href="#."><i class="fa fa-google"></i></a> </div>
            </div>

            <!-- Categories -->
            <div class="col-md-3">
                <h4>Categories</h4>
                <ul class="links-footer">
                    <li ng-repeat="catv in categoriesMenu"><a href="<?php echo site_url("Product/ProductList/");?>{{catv.id}}">{{catv.category_name}}</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-md-3">
                <h4>Customer Services</h4>
                <ul class="links-footer">
                    <li><a href="#.">Shipping & Returns</a></li>
                    <li><a href="#.">Secure Shopping</a></li>
                    <li><a href="#.">International Shipping</a></li>
                    <li><a href="#.">Affiliates</a></li>
                    <li><a href="#.">Contact </a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-md-2">
                <h4>Information</h4>
                <ul class="links-footer">
                    <li><a href="#.">Our Blog</a></li>
                    <li><a href="#.">About Our Shop</a></li>
                    <li><a href="#.">Secure Shopping</a></li>
                    <li><a href="#.">Delivery infomation</a></li>
                    <li><a href="#.">Store Locations</a></li>
                    <li><a href="#.">FAQs</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Rights -->
<div class="rights">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p>Copyright © <?php echo date('Y')?> <a href="#." class="ri-li"> ClassApartStore.com </a>  All rights reserved</p>
            </div>
            <div class="col-sm-6 text-right"> </div>
        </div>
    </div>
</div>
<!-- End Footer -->  

<!-- GO TO TOP  --> 
<a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
<!-- GO TO TOP End --> 
</div>
<!-- End Page Wrapper --> 

<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/shopController.js"></script>

<!-- JavaScripts --> 
<script src="<?php echo base_url(); ?>assets/theme/js/vendors/jquery/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/theme/js/vendors/wow.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/theme/js/vendors/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/theme/js/vendors/jquery.magnific-popup.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/theme/js/vendors/own-menu.js"></script> 
<script src="<?php echo base_url(); ?>assets/theme/js/vendors/jquery.sticky.js"></script> 
<script src="<?php echo base_url(); ?>assets/theme/js/vendors/owl.carousel.min.js"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/theme/rs-plugin/js/jquery.tp.t.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/theme/rs-plugin/js/jquery.tp.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/theme/js/main.js"></script> 

</body>

<!-- Mirrored from demos.webicode.com/html/BizTo/html/shop-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2018 16:18:20 GMT -->
</html>
