<?php
$this->load->view('layout/header');
?>


<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>Contact With US</h1>
                    <ul>
                        <li><a href="#">Home</a> /</li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Contact Us Page Area Start Here -->
<div class="contact-us-page-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="contact-us-left">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="google-map-area">
                                <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyA319S-ZyrzBQNhbYmjGedtOfl8wm6tY0Y&v=3.exp'></script><div style='overflow:hidden;height:338px;width:100%;'>
                                    <div id='gmap_canvas' style='height:338px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small>

                                        </small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
                                </div><script type='text/javascript'>
                                    function init_map() {
                                        //22.2968045,114.1687551  22.2969039,114.1623853
                                        var myOptions = {zoom: 17, center: new google.maps.LatLng(22.297975, 114.17118299999993),
                                            mapTypeId: google.maps.MapTypeId.ROADMAP};
                                        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                                        marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(22.297975, 114.17118299999993)});

                                        marker2 = new google.maps.Marker({map: map, position: new google.maps.LatLng(22.2967832, 114.1709048)});



                                        infowindow = new google.maps.InfoWindow({content: '<strong>Bespoke Tailors Showroom</strong><br>2nd Floor, 45 Haiphong Road ,Tsim Sha Tsui, Kowloon , Hong Kong<br>'});

                                        google.maps.event.addListener(marker, 'click', function () {
                                            infowindow.open(map, marker);
                                        });
                                        infowindow.open(map, marker);



                                        infowindow = new google.maps.InfoWindow({content: '<strong>Bespoke Tailors Shop</strong><br>Shop D, Ground Floor, Hanyee Building, 19-21 Hankow Road , Tsim Sha Tsui, Kowloon , Hong Kong.<br>'});

                                        google.maps.event.addListener(marker2, 'click', function () {
                                            infowindow.open(map, marker2);
                                        });
                                        infowindow.open(map, marker2);

                                    }
                                    google.maps.event.addDomListener(window, 'load', init_map);</script>

                            </div>
                        </div>
                    </div>
                    <h2>Send Us Message</h2>
                    <div class="row">
                        <div class="contact-form">
                            <form id="contact-form" method="post" action="#">
                                <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="last_name" type="text" placeholder="Last Name*" class="form-control" id="form-name" data-error="This field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="first_name" type="text" placeholder="First Name*" class="form-control" id="form-email" data-error="This field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="email" type="email" placeholder="Email*" class="form-control" id="form-email" data-error="Email field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="contact" type="text" placeholder="Contact No." class="form-control" id="form-name" data-error="This field is required" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <select name="subject" placeholder="Subject" class="form-control" style="   " required="">
                                                <option>Enquiry</option>
                                                <option>Send Swatches</option>
                                                <option>Feedback</option>
                                                <option>Appointment</option>
                                                <option>Alteration</option> 
                                            </select>
                                        </div>
                                    </div>




                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message*" class="textarea form-control" id="form-message" rows="8" cols="20" data-error="Message field is required" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" name="sendmessage" value="sendmessage" class="btn-send-message">Send Message</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class='form-response'></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="contact-us-right">
                    <h2 class="title-sidebar" style="margin-bottom: 10px;">Showroom</h2>
                    <ul style="    margin-bottom: 30px;">
                        <li class="con-address">2nd Floor, 45 Haiphong Road ,
                            <br/>
                            Tsim Sha Tsui, Kowloon, <br/>Hong Kong
                        </li>
                        <li class="con-envelope">info@bespoketailorshk.com</li>
                        <li class="con-phone">+(852) 2730 8566</li>

                        <li class=""><i class="con-clock fa fa-clock-o"></i> <span class="timeing_opensm">Opening Hours</span><br/>
                            <span class="timeing_open">Mon - Sat</span>: 09:00 to 19:00 <br/>
                            <span class="timeing_open">Sun & Holidays</span>: 09:00 to 18:00
                        </li>
                    </ul>
                    <h2 class="title-sidebar" style="margin-bottom: 10px;">Shop Address</h2>
                    <ul>
                        <li class="con-address">Shop D, Ground Floor,<br/>  Hanyee Building,<br/> 19-21 Hankow Road,
                            <br/>
                            Tsim Sha Tsui, Kowloon, <br/>Hong Kong</li>
                        
                        
                        
                        <li class="con-envelope">info@bespoketailorshk.com</li>
                        
                        <li class="con-phone">+(852) 3460 5254</li>

                        <li class=""><i class="con-clock fa fa-clock-o"></i> <span class="timeing_opensm">Opening Hours</span><br/>
                            <span class="timeing_open">Mon - Sat</span>: 09:00 to 21:00 <br/>
                            <span class="timeing_open">Sun & Holidays</span>: 09:00 to 19:00
                        </li>
 
                    </ul>
                    
                    
                    <ul>
                      

                        <li class=""><i class="con-clock fa fa-whatsapp"></i> 
                            <span class="timeing_opensm">WhatsApp (24 Hours)</span><br> 
                            <b>+(852) 6795 8894</b>
                        
                        </li>
 
                    </ul>
                    
                    
                </div>





            </div>
        </div>
    </div>
</div>
<!-- Contact Us Page Area End Here -->






<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>