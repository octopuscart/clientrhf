<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
?>
<?php
include APPPATH.'/views/layout/header1.php';
?>
<div class="page-header" style="height: 160px">
    <div class="container">

        <h1 style="    color: black;
            margin-bottom: 30px;
            font-size: 30px;
            text-shadow: 0px 0px;">Page Not Found

        </h1>

        <!-- Breadcrumb -->



    </div>
</div>
<!-- Content -->
<div id="content"> 
    <!-- Tesm Text -->
    <section class="error-page text-center pad-t-b-130 banner-w3 mt-5 mb-5" >
        <div class="container "> 
            <div class="latest-w3">
                <!-- Heading -->
                <h1 style="    font-size: 115px;">404</h1>
                <p style="    font-size: 20px;">We're sorry, the page you requested cannot be found.<br>
                    You can go back to</p>
                <hr class="dotted">
                <a href="/"  style="    font-size: 20px;" class="btn btn-primary">BACK TO HOME</a>
            </div>
        </div>
    </section>
</div>
<!-- End Content --> 
<?php
include APPPATH.'/views/layout/footer.php';
?>