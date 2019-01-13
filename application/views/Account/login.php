<?php
$this->load->view('layout/header');
?>
<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>My Account</h1>
                    <ul>
                        <li><a href="#">Home</a> /</li>
                        <li>Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Login Registration Page Area Start Here -->
<div class="login-registration-page-area">
    <div class="container">
        <div class="row">
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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="login-registration-field">
                    <h2 class="cart-area-title">Login</h2>
                    <form method="post" action="#">
                        <label>Email address *</label>
                        <input type="email" name="email" placeholder="Email " required=""/>
                        <label>Password *</label>
                        <input type="password" name="password" placeholder="Password *" required=""/>
                        <label class="check">Lost your password?</label>
                        <button class="btn-send-message disabled" name="signIn" type="submit" value="signIn">Login</button>
                        <!--<span><input type="checkbox" name="remember"/>Remember Me</span>-->
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="login-registration-field">
                    <h2 class="cart-area-title">Register</h2>
                    <form>
                        <label>First Name *</label>
                        <input type="text" name="first_name" placeholder="First Name *">
                        <label>Last Name *</label>
                        <input type="text" name="last_name" placeholder="Last Name *">
                        <label>Email address *</label>
                        <input type="email" name="email" placeholder="Email *">
                        <label>Password *</label>
                        <input type="password" class="pass" name="password" placeholder="Password">
                         <label>Confirm Password *</label>
                        <input type="password" class="con_pass" name="con_password" placeholder="Confirm Password">



                        <button class="btn-send-message disabled" type="submit" value="Login">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Registration Page Area End Here -->

<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>