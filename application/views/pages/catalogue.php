<?php
$this->load->view('layout/header');
?>


<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="    background: url(<?php echo base_url(); ?>assets/images/shop2.jpg);
     background-size: cover;
     background-position: 459px -1031px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>Catalogue</h1>
                    <ul>
                        <li><a href="#">Home</a> /</li>
                        <li>Catalogue</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Contact Us Page Area Start Here -->
<!-- Single Blog Page Area Start Here -->


<div class="portfolio2-page-area1" style="padding: 30px">
    <div class="container-fluid">
        <div class="row">

            <?php
            $catlist = ['01_Anteprima_FW_2018_19.jpg', '02_Anteprima_FW_2018_19.jpg', '03_Anteprima_FW_2018_19.jpg', '04_Anteprima_FW_2018_19.jpg', '05_Anteprima_FW_2018_19.jpg', '06_Anteprima_FW_2018_19.jpg', '07_Anteprima_FW_2018_19.jpg', '08_Anteprima_FW_2018_19.jpg', '09_Anteprima_FW_2018_19.jpg', '10_Anteprima_FW_2018_19.jpg', '11_Anteprima_FW_2018_19.jpg', '12_Anteprima_FW_2018_19.jpg', '13_Anteprima_FW_2018_19.jpg', '14_Anteprima_FW_2018_19.jpg', '15_Anteprima_FW_2018_19.jpg', '16_Anteprima_FW_2018_19.jpg', '17_Anteprima_FW_2018_19.jpg', '18_Anteprima_FW_2018_19.jpg', '19_Anteprima_FW_2018_19.jpg', '20_Anteprima_FW_2018_19.jpg', '21_Anteprima_FW_2018_19.jpg', '22_Anteprima_FW_2018_19.jpg', '23_Anteprima_FW_2018_19.jpg', '24_Anteprima_FW_2018_19.jpg', '25_Anteprima_FW_2018_19.jpg', '26_Anteprima_FW_2018_19.jpg', '27_Anteprima_FW_2018_19.jpg', '28_Anteprima_FW_2018_19.jpg', '29_Anteprima_FW_2018_19.jpg', '30_Anteprima_FW_2018_19.jpg', '31_Anteprima_FW_2018_19.jpg', '32_Anteprima_FW_2018_19.jpg', '33_Anteprima_FW_2018_19.jpg', '34_Anteprima_FW_2018_19.jpg', '35_Anteprima_FW_2018_19.jpg', '36_Anteprima_FW_2018_19.jpg', '37_Anteprima_FW_2018_19.jpg', '38_Anteprima_FW_2018_19.jpg', '39_Anteprima_FW_2018_19.jpg'];
            foreach ($catlist as $key => $catv) {
                ?>

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                    <div class="portfolio2-box">
                        <div class="portfolio2-img-holder">
                            <div class="portfolio2-content-holder">
                                <h3><a href="#">BT Style <?php echo $key+1;?></a></h3>
<!--                                <ul>
                                    <li>Travel</li>
                                    <li>Style</li>
                                </ul>-->
                            </div>
                            <a href="#">
                                <img class="img-responsive" src="<?php echo base_url(); ?>assets/zegna/<?php echo $catv;?>" alt="portfolio">
                            </a>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

        </div>
    </div>
</div>


<?php
$this->load->view('layout/footer');
?>