
<style>

    .wrapper {
        width: 100%;
    }
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/cokr3d/styles/jquery.carousel-3d.default.css">

<script src="<?php echo base_url(); ?>assets/theme/cokr3d/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/theme/cokr3d/jquery.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/theme/cokr3d/jquery.waitforimages.js"></script>
<script src="<?php echo base_url(); ?>assets/theme/cokr3d/modernizr.js"></script>
<script src="<?php echo base_url(); ?>assets/theme/cokr3d/jquery.carousel-3d.js"></script>
<div class="wrapper">


    <div data-carousel-3d>
        <?php foreach ($clients as $key => $value) {
            ?>
            <?php if ($key == 0) { ?>
                <div style = "min-width: 320px; min-height: 300px; max-width: 320px; max-height: 300px;background: url(<?php echo base_url(); ?>assets/theme/clients/<?php echo $value; ?>);background-size:100% ">
                    <p style = "background-color:black; color:white; margin:20px; padding:20px;">Our Clients</p>


                </div>
            <?php
            } else {
                ?>

                <img src="<?php echo base_url(); ?>assets/theme/clients/<?php echo $value; ?>"   alt=""/>


                <?php
            }
        }
        ?>
    </div>
</div>