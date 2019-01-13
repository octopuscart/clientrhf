<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
?>
<?php
include APPPATH.'/views/layout/header.php';
?>
<!-- Content -->
<div id="content"> 
    <!-- Tesm Text -->
    <section class="error-page text-center pad-t-b-130 banner-w3">
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