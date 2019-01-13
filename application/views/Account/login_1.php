<?php
$this->load->view('layout/header');
?>

<style>
    .cartbutton{
        width: 100%;
        padding: 6px;
        color: #fff!important;
    }
</style>






<!-- Slider -->
<section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
        <div class="container">
            <h4>Login/Registration</h4>

            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
            
            </ol>
        </div>
    </div>
</section>





<div class="container"> 
    <!-- Checkout -->
    <div class="checkout-form pad-t-b-60" >

        <div class="row"> 
            <!-- Checkout Form -->
            <?php
            if ($msg) {
                ?>
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i> </span></button>
                        <i class="fa fa-exclamation-triangle fa-2x"></i><?php echo $msg; ?>
                    </div>
                </div>
                <?php
            }
            ?>


            <div class="col-sm-6">
                <div class="noti-check">
                    <h3 style="    color: #fff;">Welcome Back</h3> 
                    <div id="login" style="">
                        <form class="create_account_form" method="post" action="#">
                            <p>If you have registered with us before, please enter your details in the boxes below. If you are a new user, please proceed to the registration &amp; Registration section. </p>
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>
                                        <input type="email" name="email" placeholder="Email " required="">
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>
                                        <input type="password" name="password" placeholder="Password *" required="">
                                    </label>
                                </li>
                                <li class="col-sm-6">
                                    <button class="btn" type="submit" name="signIn">LOGIN</button>
                                </li>
                                <li class="col-sm-6 text-right">
                                    <a href="#." class="lst-pass">Lost your password?</a> 
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 ">
                <div class="noti-check">
                    <h3 style="    color: #fff;">New User Registration </h3> 

                    <form class="create_account_form" method="post" action="#">
                        <p>
                            By creating an account with our website, you will be able to view and get our best deals and offers.
                        </p>

                        <ul class="row">
                            <li class="col-sm-12">
                                <label>
                                    <input type="text" name="first_name" placeholder="First Name *">
                                </label>
                            </li>
                            <li class="col-sm-12">
                                <label>
                                    <input type="text" name="last_name" placeholder="Last Name *">
                                </label>
                            </li>
                            <li class="col-sm-12">
                                <label>
                                    <input type="email" name="email" placeholder="Email *">
                                </label>
                            </li>
                            <li class="col-sm-12">
                                <label>
                                    <input type="password" class="pass" name="password" placeholder="Password">
                                </label>
                            </li>
                            <li class="col-sm-12">
                                <label>
                                    <input type="password" class="con_pass" name="con_password" placeholder="Confirm Password">
                                </label>
                            </li>
                            <li class="col-sm-12">
                                <label>
                                    <button name="registration" type="submit" class="registration btn e">Create An Account</button>

                                </label>
                            </li>

                        </ul>
                    </form>
                </div>
            </div>


        </div>

    </div>
</div>



<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>