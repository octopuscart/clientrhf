<!-- Content -->



<div id="content"  ng-if="gcheckcart.status == 1"> 
    <!-- Tesm Text -->
    <section class="error-page text-center pad-t-b-130">
        <div class="container "> 

            <!-- Heading -->
            <h1 style="font-size: 40px;padding: 50px 0 100px">Loading...</h1>
           
        </div>
    </section>
</div>


<div id="content"  ng-if="gcheckcart.status == 0"> 
    <!-- Tesm Text -->
    <section class="error-page text-center pad-t-b-130">
        <div class="container "> 

            <!-- Heading -->
            <h1 style="font-size: 40px">No Product Found</h1>
            <p>Please add product to cart<br>
                You can go back to</p>
            <hr class="dotted">
            <a href="<?php echo site_url(); ?>" class="btn-send-message ">BACK TO HOME</a>
        </div>
    </section>
</div>
<!-- End Content --> 