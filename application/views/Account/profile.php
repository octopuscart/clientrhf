<?php
$this->load->view('layout/header');
?>
<style>
    .profile-image {
        width: 182px ;
        height: 182px;
    }
</style>

<div class="page-header" style="height: 160px">
    <div class="container">

        <h1 style="    color: black;
            margin-bottom: 30px;
            font-size: 30px;
            text-shadow: 0px 0px;">My Profile</br>

        </h1>

        <!-- Breadcrumb -->



    </div>
</div>




<!-- Content -->
<div id="content" class="my-account-page-area"> 

    <!-- Blog -->
    <section class="woocommerce mb-5">
        <div class="container"> 

            <!-- News Post -->
            <div class="news-post">
                <div class="row"> 

                    <?php
                    $this->load->view('Account/sidebar');
                    ?>


                    <div class="col-md-9 checkout-form row">
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
                        <div class="col-md-3">
                            <div class="profile-image" style="background: url(<?php echo ADMINURL; ?>assets/emoji/user.png); background-size: cover;margin-top:150px;">
                                <?php
                                if ($user_details->image) {
                                    ?>
                                    <img src='<?php echo ADMINURL; ?>assets/profile_image/<?php echo $user_details->image; ?>' style="width: 100%;   height: auto;" />
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">  
                            <h6><?php echo $user_details->email; ?> <small>Email (For Login)</small> </h6><br/>
                            <div class="woocommerce-MyAccount-content "> 
                                <header class="row woocommerce-Address-title title">
                                    <h3 class="col-xs-12 metro-title">ACCESS YOUR ACCOUNT</h3>
                                </header>  

                                <form class="create_account_form row woocommerce-EditAccountForm edit-account" method="post" action="#">
                                    <input type="hidden" name="user_id" value="45">
                                    <ul class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <label>
                                                First Name    </label>
                                            <input type="text" name="first_name" class="form-control"  value="<?php echo $user_details->first_name; ?>">

                                        </div>
                                        <div class="col-md-6 col-xs-12">

                                            <label>
                                                Last Name    </label>
                                            <input type="text" name="last_name" class="form-control"  value="<?php echo $user_details->last_name; ?>">

                                        </div>


                                        <div class="col-md-6 col-xs-12">

                                            <label>
                                                Contact No.    </label>
                                            <input type="text" name="contact_no" class="form-control"  value="<?php echo $user_details->contact_no; ?>">

                                        </div>



                                        <div class="col-md-6 col-xs-12">

                                            <label>
                                                Gender    </label> 
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

                                        </div>

                                        <div class="col-md-6 col-xs-12">

                                            <label>
                                                Date of Birth   </label>
                                            <input type="date" class="form-control" name="birth_date"  value="<?php echo $user_details->birth_date; ?>">

                                        </div>


                                        <li class="col-sm-12" style="padding-top: 20px;">

                                            <button name="update_profile" type="submit" class="woocommerce-Button button btn-shop-now-fill btn btn-default">Update Profile</button>
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
                                <h4 class="modal-title" id="myModalLabel" style="font-size: 15px">Change Password</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body checkout-form ">

                                <label class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                    Old Password
                                    <input type="text" name="old_password"  value="" class=" form-control">
                                </label>

                                <label class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                    New Password
                                    <input type="text" name="new_password"  value="" class=" form-control">
                                </label>
                                <br/>
                                <label class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                    Confirm Password
                                    <input type="text" name="re_password"  value="" class=" form-control">
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