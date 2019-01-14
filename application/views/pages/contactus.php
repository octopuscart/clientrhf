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
<div class="page-header bg-image" style="background: url(<?php echo base_url(); ?>assets/theme/images/contact.jpg);">
    <h1 class="text-white">Contact Us</h1>
</div>
<!-- end page header -->
<!-- start main container -->
<div class="content main-container" id="site-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="contact-items">
                    <div class="contact-ibox">
                        <i class="fa fa-map-o"></i>
                    </div>
                    <div class="contact-info">
                        <h4>Address</h4>
                        <p> Mirador Mansion, Shop No. 30 & 49,<br/> G/F 54-64 Nathan Road <br/>Tsim Sha Tsui, Hong Kong</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="contact-items border-left">
                    <div class="contact-ibox">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="contact-info">
                        <h4>Email</h4>
                        <p><a href="mailto:sales@rahmanfashion.com" title=" rftailor@biznetvigator.com"> rftailor@biznetvigator.com</a> <br> <a href="mailto:sales@rahmanfashion.com" title="sales">sales@rahmanfashion.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="contact-items border-left">
                    <div class="contact-ibox">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="contact-info">
                        <h4>Contact No.</h4>
                        <p><span class="timeing_open">Phone</span> : <a href="tel:+(852) 2369 1196"> +(852) 2369 1196</a> <br> <span class="timeing_open">FAX </span>: <a href="tel:+(852) 9500 0744">+(852) 9500 0744</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="separator-gary"></div>
    <div class="padding-tb-100 text-center">
        <div class="container">
            <h2>Message Us</h2>
            <div class="spacer-40"></div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12"></div>
                <div class="col-lg-8 col-md-12 col-sm-12">


                 
                    <!-- start fillform -->
                    <div class="fillform">
                        <form role="form" id="contact_form" action="#" class="contact-form" method="post" >
                            <div  class="row">
                                <div  class="col-sm-6">
                                        <input type="text" class="form-control" name="last_name" id="name" placeholder="Last Name" required="">
                                </div >
                                <div  class="col-sm-6">
                                        <input type="text" class="form-control" name="first_name" id="name" placeholder="First Name" required="">
                                </div >
                                <div  class="col-sm-12">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" required="">
                                </div >
                                <div  class="col-sm-12">
                                        <input type="text" class="form-control" name="contact" id="company" placeholder="Contact No.">
                                </div >

                                <div  class="col-sm-12">
                                        <select name="subject" placeholder="Subject" class="form-control" style="  height: 50px;
                                                background: #fafafa; " required="">
                                            <option>Enquiry</option>
                                            <option>Send Swatches</option>
                                            <option>Feedback</option>
                                            <option>Appointment</option>
                                            <option>Alteration</option> 
                                        </select>
                                </div >


                                <div  class="col-sm-12">
                                        <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message" required=""></textarea>
                                </div >
                                <div  class="col-sm-12 text-left">
                                    <button type="submit"  class="btn btn-inverse" name="sendmessage" value="sendmessage" >SUBMIT</button>
                                </div >
                            </div >
                        </form>
                        <div id="message"></div>
                    </div>
                    <!-- end fillform -->
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12"></div>
            </div>
        </div>
    </div>
    <!-- start map -->
    <div class="map-box">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14765.98402321011!2d114.1723784!3d22.2970736!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4d25e19fc0290663!2sRahman+Fashions!5e0!3m2!1sen!2sin!4v1547429558407" width="100%" height="590" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <!-- end map -->
</div>
<!-- end main container -->

<?php
$this->load->view('layout/footer');
?>