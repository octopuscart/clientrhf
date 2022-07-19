<?php
$this->load->view('layout/header');
?>


<!-- start page header -->
<div class="page-header bg-image" style="background: url(<?php echo base_url(); ?>assets/theme/images/older-man-in-suit-banner.jpg);background-size: cover;">
    <h1 class="text-white">Coupon Offers</h1>
</div>
<!-- end page header -->
<!-- start main container -->
<div class="content main-container" id="site-content">
    <div class="padding-tb-100">
        <div class="container">
            <div class="row text-center">
                <?php
                foreach ($coupons as $key => $value) {
                    ?>
                    <div class="col-md-12">

                        <h2 ><?php echo $value["code"]; ?><input style="display: none"  id="coupon<?php echo $value["id"]; ?>" value="<?php echo $value["code"]; ?>" /> <button class="btn btn-small-xs btn-default" onclick="copyCode('coupon<?php echo $value["id"]; ?>')">Copy now</button></h2>
                        <p style="font-size: 20px;"><?php echo $value["promotion_message"]; ?></p>
                        <hr/>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>
</div>

</div>
<!-- end main container -->

<script>
    function copyCode(codeid) {
        /* Get the text field */
        var copyText = document.getElementById(codeid);

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
        alert("Copied the text: " + copyText.value);
    }
</script>
<?php
$this->load->view('layout/footer');
?>