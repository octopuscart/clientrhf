<?php
$this->load->view('layout/header');
?>
<!-- Inner Page Banner Area Start Here -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<div class="page-header" style="height: 160px">
    <div class="container">

        <h1 style="    color: black;
            margin-bottom: 30px;
            font-size: 30px;
            text-shadow: 0px 0px;">Reset Password</h1>


    </div>
</div>


<!-- Inner Page Banner Area End Here -->
<!-- Login Registration Page Area Start Here -->
<div class="login-registration-page-area" ng-controller="LoginController" style="padding: 20px 0;    color: white;background: url(<?php echo base_url(); ?>assets/theme/images/backimages.jpg);background-size: cover">
    <div class="container">
        <div class="row" style="    margin-bottom: 50px;">
            <div class="col-lg-12 row">
                <div class="col-md-4">
                 

                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 15px;">
                    <div class="login-registration-field" style="padding: 30px;
                         background: white;
                         color: black;">
                        <h2 class="cart-area-title">Enter Password</h2>
                        <form method="post" action="#">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Password *</label>
                                    <input type="password"  class="form-control"class="pass" name="password" placeholder="Password" required="">

                                </div>
                                <div class="col-md-12">
                                    <label>Confirm Password *</label>
                                    <input type="password"  class="form-control"class="con_pass" name="con_password" placeholder="Confirm Password" required>

                                </div>
                            </div>
                            <button class="btn btn-primary" name="changePassword" type="submit" value="signIn">Change Password</button>

                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>
    <!-- Login Registration Page Area End Here -->

    <!--angular controllers-->
    <script src="<?php echo base_url(); ?>assets/theme/angular/loginController.js"></script>


    <?php
    $this->load->view('layout/footer');
    ?>
    <?php
    if ($responsedata["status"]!="100") {
        ?>
        <script>
    $(function(){
    swal({
    title: '<?php echo $responsedata["title"]; ?>',
            type: 'info',
            text:  '<?php echo $responsedata["message"]; ?>',
            showConfirmButton: true,
            animation: true,
            onClose: function () {
    <?php
    if ($responsedata["status"] == "200") {
        ?>
                window.location = "<?php echo site_url("Account/login") ?>";
        <?php
    }
    ?>
            }
    });
    });
        </script>
        <?php
    }
    ?>