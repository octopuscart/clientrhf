<?php
$this->load->view('layout/header');
?>


<!-- start page header -->
<div class="page-header bg-image" style="background: url(<?php echo base_url(); ?>assets/theme/images/older-man-in-suit-banner.jpg);background-size: cover;">
    <h1 class="text-white"><?php echo $pageobj["title"];?></h1>
</div>
<!-- end page header -->
<!-- start main container -->
<div class="content main-container" id="site-content">
    <div class="padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $pageobj["content"];?>
                 </div>
        </div>
    </div>
</div>
</div>

</div>
<!-- end main container -->


<?php
$this->load->view('layout/footer');
?>