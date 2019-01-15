<?php
$this->load->view('layout/header');
?>
<!-- Inner Page Banner Area Start Here -->


<div class="page-header" style="height: 160px">
    <div class="container">

        <h1 style="    color: black;
            margin-bottom: 30px;
            font-size: 30px;
            text-shadow: 0px 0px;">Login/Registration</h1>


    </div>
</div>


<!-- Inner Page Banner Area End Here -->
<!-- Login Registration Page Area Start Here -->
<div class="login-registration-page-area" style="padding: 20px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                if ($next_link === 'checkoutInit') {
                    ?>
                    <h5  class="text-center">
                        <a href="<?php echo site_url("CartGuest/checkoutInit"); ?>" class="btn  btn btn-danger">
                            <i class=" fa fa-user"></i> Checkout As Guest <i class="fa fa-arrow-right"></i>
                        </a>
                    </h5>
                    <h3  class="text-center" style="    padding:20px 50px 0px">OR</h3>
                    <?php
                }
                ?>
                <p class="text-center" style="padding:0px 50px; padding: 30px 50px;">  By creating an account with our store, you will be able to move through
                    the checkout process faster, store multiple shipping addresses,
                    view and track your orders in your account and more.
                </p>
            </div>
            <?php
            if ($msg) {
                ?>
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i> </span></button>
                        <i class="fa fa-exclamation-triangle "></i> <?php echo $msg; ?>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="background: wheat;padding-bottom: 15px;">
                <div class="login-registration-field">
                    <h2 class="cart-area-title">Login</h2>
                    <form method="post" action="#">
                        <label>Email address *</label>
                        <input type="email"  class="form-control"name="email" placeholder="Email " required=""/>
                        <label>Password *</label>
                        <input type="password"  class="form-control"name="password" placeholder="Password *" required=""/>
   <br/>
                        <button class="btn btn-default" name="signIn" type="submit" value="signIn">Login</button>
                        <!--<span><input type="checkbox" name="remember"/>Remember Me</span>-->
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background: wheat;padding-bottom: 15px;">
                <div class="login-registration-field">
                    <h2 class="cart-area-title">Register</h2>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Last Name *</label>
                                <input type="text"  class="form-control"name="last_name" placeholder="Last Name *" required="">
                            </div>
                            <div class="col-md-6">
                                <label>First Name *</label>
                                <input type="text"  class="form-control"name="first_name" placeholder="First Name *" required="">
                            </div>
                        </div>
                        <label>Email address *</label>
                        <input type="email"  class="form-control"name="email" placeholder="Email *" required="">

                        <div class="row">
                            <div class="col-md-6">
                                <label>Password *</label>
                                <input type="password"  class="form-control"class="pass" name="password" placeholder="Password" required="">

                            </div>
                            <div class="col-md-6">
                                <label>Confirm Password *</label>
                                <input type="password"  class="form-control"class="con_pass" name="con_password" placeholder="Confirm Password" required>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label>Gender *</label>
                                <select name="gender" id="gender" class="form-control"   required >
                                    <option value="Male" >Male</option>
                                    <option value="Female" >Female</option>
                                </select>


                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="birth_date" id="birth_date" value="{{birth_year}}-{{birth_month}}-{{date_birth}}"> 
                                <label>Date Of Birth *</label>
                               <div class="row" style="    margin: 0;">
                                <select id="birth_year" name="birth_year"  ng-model="birth_year" class="form-control bg_light w_full border_none bith_date_select_year"  required >
                                    <option value="" >-YYYY-</option>
                                    <?php
                                    for ($i = (date('Y') - 100); $i <= date('Y'); $i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>

                                <select id="birth_month" ng-model="birth_month" name="birth_month" class="form-control bg_light w_full border_none bith_date_select" required >
                                    <option value="" >-MM-</option>
                                     <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        $mmdate = $i<10?"0".$i:$i;
                                        echo "<option value='$mmdate'>$mmdate</option>";
                                    }
                                    ?>
                                </select> 

                                <select id="birth_date" name="date_birth" ng-model="date_birth" class="form-control bg_light w_full border_none bith_date_select"  required >
                                    <option value="" >-DD-</option>
                                     <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                         $dddate = $i<10?"0".$i:$i;
                                        echo "<option value='$dddate'>$dddate</option>";
                                    }
                                    ?>
                                </select>
                               </div>

                            </div>
                        </div>
                        <div style="clear: both"></div>

                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-6">
                                <label>Profession *</label>
                                <select name="profession" id="profession_select" class="form-control" onchange="professionChange()" class="r_corners bg_light w_full border_none" style="width: 100%;height: 40px;padding: 5px;" required >
                                    <option value="" >Select Profession</option>
                                    <option value="Academic" >Academic</option>
                                    <option value="Medicine" >Medicine</option>
                                    <option value="Law" >Law</option>
                                    <option value="Banking" >Banking</option>
                                    <option value="IT" >IT</option>
                                    <option value="Entrepreneur" >Entrepreneur</option>
                                    <option value="Sales/Marketing" >Sales/Marketing</option>
                                    <option value="Other" >Other</option>
                                </select>

                            </div>
                            <div class="col-md-6">
                                <label>Country *</label>
                                <select name="country" id="country" class="form-control"  onchange="countryChange()" class="r_corners bg_light w_full border_none" style="width: 100%;height: 40px;padding: 5px;" required >
                                   <option value="" >Select Country</option>
                                            <?php
                                            foreach ($countrylist as $key => $value) {
                                                echo $country = ucwords(strtolower($value->country_name));
                                                echo "<option value='$country'>$country</option>";
                                            }
                                            ?>
                                </select>
                            </div>
                        </div> 



                        <br/>


                        <button name = "registration" class="btn btn-default" type="submit" value="Login">Register</button>
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