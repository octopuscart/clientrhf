<?php
$this->load->view('layout/header');
?>



<div class="inner-page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>My Profile</h1>
                    <ul>
                        <li><a href="#">Home</a> /</li>
                        <li>Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Content -->
<div id="content" class="my-account-page-area"> 

    <!-- Blog -->
    <section class="woocommerce ">
        <div class="container"> 

            <!-- News Post -->
            <div class="news-post">
                <div class="row"> 

                    <?php
                    $this->load->view('Account/sidebar');
                    ?>


                    <div class="col-md-9 checkout-form">
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

                        <div class=" woocommerce-MyAccount-content">  
                            <h6><?php echo $user_details->email; ?> <small>Email (For Login)</small> </h6>
                            <div class="woocommerce-MyAccount-content "> 
                                <header class="row woocommerce-Address-title title">
                                    <h3 class="col-xs-12 metro-title">ACCESS YOUR ACCOUNT</h3>
                                </header>  

                                <form class="create_account_form row woocommerce-EditAccountForm edit-account" method="post" action="#">
                                    <input type="hidden" name="user_id" value="45">
                                    <ul class="">
                                        <li class="col-sm-6 woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                            <label>
                                                First Name
                                                <input type="text" name="first_name" class="woocommerce-Input woocommerce-Input--text input-text"  value="<?php echo $user_details->first_name; ?>">
                                            </label>
                                        </li>
                                        <li class="col-sm-6 woocommerce-form-row woocommerce-form-row--last form-row form-row-last">

                                            <label>
                                                Last Name
                                                <input type="text" name="last_name" class="woocommerce-Input woocommerce-Input--text input-text"  value="<?php echo $user_details->last_name; ?>">
                                            </label>
                                        </li>


                                        <li class="col-sm-6 woocommerce-form-row woocommerce-form-row--last form-row form-row-last">

                                            <label>
                                                Contact No.
                                                <input type="text" name="contact_no" class="woocommerce-Input woocommerce-Input--text input-text"  value="<?php echo $user_details->contact_no; ?>">
                                            </label>
                                        </li>



                                        <li class="col-sm-6 woocommerce-form-row woocommerce-form-row--last form-row form-row-last">

                                            <label>
                                                Gender
                                                <select name="gender" class="form-control" style="    background: #f5f5f5;
                                                        height: 45px;
                                                        font-size: 12px;
                                                        line-height: 50px;
                                                        border: none;
                                                        color: #000;
                                                        width: 100%;
                                                        padding: 0 25px;border-radius: 0;">
                                                    <option  value="Male" <?php echo $user_details->gender == 'Male' ? "selected" : ""; ?>>Male</option>
                                                    <option  value="Female" <?php echo $user_details->gender == 'Female' ? "selected" : ""; ?>>Female</option>
                                                </select>
                                            </label> 
                                        </li>

                                        <li class="col-sm-6 woocommerce-form-row woocommerce-form-row--last form-row form-row-last">

                                            <label>
                                                Date of Birth
                                                <input type="date" class="woocommerce-Input woocommerce-Input--text input-text" name="birth_date"  value="<?php echo $user_details->birth_date; ?>">
                                            </label>
                                        </li>


                                        <li class="col-sm-6" style="padding-top: 20px;">

                                            <button name="update_profile" type="submit" class="woocommerce-Button button btn-shop-now-fill">Update Profile</button>
                                        </li>


                                        <div style="clear: both"></div>

                                    </ul>
                                </form>
                            </div>


                            <hr/>
                            <header class="row woocommerce-Address-title title">
                                <h3 class="col-xs-12 metro-title">                                
                                    <a href="#." class="changepassword"  data-toggle="modal" data-target="#changePassword" style="    color: #000;
                                       font-size: 13px;
                                       "><i class="fa fa-refresh"></i> Change Password</a>
                                </h3>
                            </header>  



                            <!--                                    <div class="col-sm-4">  
                                                                    <div class="noti-check1">
                                                                        <h3 style="    color: #fff;"></h3>
                                                                        <center><img class="media-object img-responsive" src="post_image/user-default.jpg" alt="..." style="height:200px;"></center>
                                                                        <form method="post" action="#" enctype="multipart/form-data">
                                                                            <ul class="row">
                                                                                <li class="col-sm-12">
                                                                                    <label>
                                                                                        <input type="file" class="" name="image" style="padding-top: 12px;">
                                                                                    </label>
                                                                                </li>
                                                                                <li class="col-sm-12">
                                                                                    <label>
                                                                                        <input type="submit" name="submit1" class="btn btn-inverse" value="Change Profile Image" >
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </form>
                                                                    </div>
                                                                </div>-->

                        </div>
                    </div>



                </div>
                </section>
            </div>
            <!-- End Content --> 


            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal  fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    z-index: 20000000;">
                <div class="modal-dialog modal-sm woocommerce" role="document" style="width: 300px">
                    <form action="#" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel" style="font-size: 15px">Change Password</h4>
                            </div>
                            <div class="modal-body checkout-form ">

                                <label class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                    Old Password
                                    <input type="text" name="old_password"  value="" class=" woocommerce-Input woocommerce-Input--text input-text">
                                </label>

                                <label class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                    New Password
                                    <input type="text" name="new_password"  value="" class=" woocommerce-Input woocommerce-Input--text input-text">
                                </label>
                                <br/>
                                <label class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                    Confirm Password
                                    <input type="text" name="re_password"  value="" class=" woocommerce-Input woocommerce-Input--text input-text">
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>




            <?php
            $this->load->view('layout/footer');
            ?>
            <script>
                $(function () {
                    $(".woocommerce-MyAccount-navigation-link--dashboard").removeClass("active");
                    $(".profile_page").addClass("active");
                })
            </script>