<?php
$this->load->view('layout/header');
?>
<style>
    #ui-datepicker-div{
        z-index: 200000!important;
    }
    .timeing_open {
        width: 55px;
        float: left;
    }
    .form-control {
        border: 1px solid #e5e5e5;
        border-radius: 0;
        padding: 12px 30px;
        margin-bottom: 10px;
    }
</style>

<!-- start page header -->
<div class="page-header bg-image" style="background: url(<?php echo base_url(); ?>assets/theme/images/older-man-in-suit-banner.jpg);background-size: cover;height: 150px;">
    <h1 class="text-white">Look Book</h1>
</div>
<div id="page">

    <div role="main" class="main">

        <div class="container">
            <div class="" style="margin-top: 50px;">

                <div class="row format-gallery1">


                    <?php foreach ($lookbook as $b) { ?>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <!-- start gallery items -->
                            <div class="gallery-items">
                                <div class="gallery-media format-image">
                                    <a href="<?php echo base_url(); ?>assets/look_books/<?php echo $b['look_book_image'] ?>" class="media-box popup-image" target="_blank">
                                        <img src="<?php echo base_url(); ?>assets/look_books/<?php echo $b['look_book_image'] ?>" alt="gallery">
                                    </a>
                                </div>
                            </div>
                            <!-- end gallery items -->
                        </div>


                    <?php } ?>
                </div>



            </div>
        </div>
    </div>

</div>
<?php
$this->load->view('layout/footer');
?>