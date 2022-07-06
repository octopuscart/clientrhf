<?php
$this->load->view('layout/header');
?>




<!-- Inner Page Banner Area Start Here -->
<div class="page-header" style="height: 160px">
    <div class="container">

        <h1 style="    color: black;
            margin-bottom: 30px;
            font-size: 30px;
            text-shadow: 0px 0px;">FAQ's</h1>


    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Contact Us Page Area Start Here -->
<!-- Single Blog Page Area Start Here -->
<div class="single-blog-page-area" style="padding: 50px 0 30px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="single-blog-details-content">
                    <?php
                    
                    ?>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <?php
                        $index = 1;
                        foreach ($content_faq as $x => $x_value) {
                            ?>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne<?php echo "accord_" . $index; ?>" style="    background: #fff;color: #000;">
                                    <h4 class="panel-title" >
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo "accord_" . $index; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo "accord_" . $index; ?>" style="font-size: 15px">
                                          Q:  <?php echo $x_value["question"]; ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne<?php echo "accord_" . $index; ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne<?php echo "accord_" . $index; ?>">
                                    <div class="panel-body">
                                      A:  <?php echo $x_value["answer"]; ?>
                                    </div>
                                </div>
                            </div>


                            <?php
                            $index = $index + 1;
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Single Blog Page Area End Here -->
<!-- Contact Us Page Area End Here -->






<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>