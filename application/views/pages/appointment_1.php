<?php
$this->load->view('layout/header');
$prefixshopappointment = array('Sun' => [9, 19], 'Other' => [9, 21]);
$cdateshort = date("D");
$timingarray = [];
if (isset($prefixshopappointment[$cdateshort])) {
    $timingarray = $prefixshopappointment[$cdateshort];
} else {
    $timingarray = $prefixshopappointment['Other'];
}

function createModel($value, $dtvalue, $timeslot) {
    ?>
    <div class = "modal fade" id = "<?php echo $value['id']; ?>"  role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">

        <div class = "modal-dialog ">
            <div class = "modal-content">
                <form method="post" action="#">
                    <div class = "modal-header" style=" color: #fff;background: #dd0101;    margin: 10px 0px; ">


                        <div class = "modal-title " id = "myModalLabel">

                            <address style="    margin-bottom: 0;">
                                <span id="location"><b><?php echo $value['hotel']; ?></b>
                                </span><br>
                                <span id="address">  
                                    <?php echo $value['address']; ?></span><br>
                            </address>
                            <input type="hidden" name="hotel" value="<?php echo $value['hotel']; ?>">
                            <input type="hidden" name="address" value="<?php echo $value['address']; ?>">
                            <input type="hidden" name="city_state" value="<?php echo $value['city_state']; ?>">
                            <input type="hidden" name="country" value="<?php echo $value['country']; ?>">
                            <input type="hidden" name="contact_no2" value="<?php echo $value['contact_no']; ?>">

                            <div style="clear: both"></div>
                        </div>
                        <button type = "button" style="    background-color: #dd0101;
                                border: 1px solid #dd0101;" class = " btn btn-danger btn-xm pull-right" data-dismiss = "modal" aria-hidden = "true">

                            <i class="fa fa-close"></i>

                        </button>
                    </div>



                    <div class = "modal-body">




                        <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                            <div class="col-md-4" >
                                <div class="form-group" style="font-color:#dd0101">

                                    <label for="first_name">Last Name</label> 
                                    <input type="text" class="time start form-control" name="last_name"  style="" required/>

                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group" style="font-color:#dd0101">

                                    <label for="first_name">First Name</label> 
                                    <input type="text" class="time start form-control" name="first_name"  style="" required />

                                </div>
                            </div>


                            <div class="col-md-4" >
                                <div class="form-group" style="font-color:#dd0101">
                                    <label for="first_name">No. Of Persons</label> 
                                    <input  class="time start form-control" type="number"  name="no_of_person"  style="" min="1" value="1" />

                                </div>
                            </div>
                        </div>

                        <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                            <div class="col-md-6" >
                                <div class="form-group" style="font-color:#dd0101">

                                    <label for="first_name">Email</label> 
                                    <input type="text" class="time start form-control" name="email"   style="" required />

                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group" style="font-color:#dd0101">

                                    <label for="first_name">Contact No.</label> 
                                    <input type="text" class="time start form-control" name="contact_no"  style="" required />

                                </div>
                            </div>
                        </div>


                        <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                            <div class="col-md-4" >
                                <div class="form-group" style="font-color:#dd0101">

                                    <label for="select_date">Available Date</label> 
                                    <select class="form-control" style="padding:12px;"  name="select_date" id="dateselection" style="" required ng-model="dateselection<?php echo $value['id']; ?>"  ng-init="dateselection<?php echo $value['id']; ?> = '<?php echo $value['dates'][0]['date']; ?>'" >

                                        <?php
                                        $dataes = $value['dates'];
                                        foreach ($dataes as $dkey => $dvalue) {
                                            $dateid = $value['id'] . $dkey;
                                            ?>    
                                            <option  value="<?php echo $dvalue['date']; ?>"><?php echo $dvalue['date']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>


                                </div>
                            </div>

                            <div class="col-md-4" >
                                {{dateselection}}


                                <?php
                                if ($value) {
                                    foreach ($dataes as $dtkey => $dtvalue) {
                                        $dateid = $value['id'] . $dkey;
                                        $t1 = $dtvalue['timing1'];
                                        $t2 = $dtvalue['timing2'];

                                        $cnt1 = array_search($t1, $timeslot);
                                        $cnt2 = array_search($t2, $timeslot);
                                        ?>
                                        <div class="form-group tab-pane " ng-if="dateselection<?php echo $value['id']; ?> == '<?php echo $dtvalue['date']; ?>'" style="font-color:#dd0101">
                                            <label for="select_time">Available Time</label> 
                                            <select class="form-control" style="padding:12px;"  name="select_time" id="select_time" style="" required />
                                            <?php
                                            for ($tm = $cnt1; $tm < $cnt2 + 1; $tm++) {
                                                $time1 = $timeslot[$tm];
                                                echo "<option >$time1</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>


                                    <label for="select_date">Available Date</label> 
                                    <select class="form-control" style="padding:12px;"  name="select_date" id="dateselection" style="" required ng-model="dateselection<?php echo $value['id']; ?>"  ng-init="dateselection<?php echo $value['id']; ?> = '<?php echo $value['dates'][0]['date']; ?>'" >

                                        <?php
                                        $dataes = $value['dates'];
                                        foreach ($dataes as $dkey => $dvalue) {
                                            $dateid = $value['id'] . $dkey;
                                            ?>    
                                            <option  value="<?php echo $dvalue['date']; ?>"><?php echo $dvalue['date']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group" style="font-color:#dd0101">

                                    <label for="select_date">Referral</label> 

                                    <select class="form-control" style="padding:12px;"  name="referral" id="select_time" style="" required >
                                        <option value="">Select</option>
                                        <option value="Newspaper">Newspaper</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="E-Newsletter">E-Newsletter</option>
                                        <option value="Online Search">Online Search</option>
                                        <option value="Word of Mouth">Word of Mouth</option>
                                        <option value="Paper Flier">Paper Flier</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="I am a Repeat Customer">I am a Repeat Customer</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <!--                    <div class="row" style="    border-bottom: 1px solid #E5E5E5;">
                                                <div class="col-md-12" >
                                                    <label for="first_name">Address</label> <br>
                                                    <textarea name="address" class="form-control"  rows="1" cols="27" style="height: 94px !important;"></textarea>
                                                </div>
                                            </div>-->



                        <div style="clear:both"></div>
                    </div>









                    <div class = "modal-footer">


                        <button type = "submit" name="submit" class="btn btn-danger" style="background: #dd0101;    margin: 10px 0px;" >
                            Book Appointment
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <?php
}
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    #ui-datepicker-div{
        z-index: 200000!important;
    }
    .timeing_open {
        width: 70px;
        float: left;
    }
</style>

<div class="page-header bg-image" style="background: url(<?php echo base_url(); ?>assets/theme/images/appointment.jpg);background-size: cover;">
    <h1 class="text-white">Appointment</h1>
</div>

<div >
    <!-- Inner Page Banner Area Start Here -->


    <!-- Inner Page Banner Area End Here -->
    <!-- Contact Us Page Area Start Here -->
    <!-- Single Blog Page Area Start Here -->
    <div class="single-blog-page-area" style="padding: 0px 0 0px;background: url(<?php echo base_url(); ?>assets/theme2/img/mapback.png);background-size: contain;">
        <div class="container contact-us-page-area" style="padding: 50px 0 30px;">
            <div class="row" style="border-bottom: 2px solid;    background: #ffffffb5; ">
                <div class="contact-us-right">
                    <h2 class="title-sidebar text-center" style="margin-bottom: 30px;padding-bottom:  30px;border-bottom: 1px dotted ">Local Appointment</h2>
                       <div class="row appointmentheader">
                                    <div class="col-md-1">
                                        Country
                                    </div>
                                    <div class="col-md-2">
                                        City/State
                                    </div>
                                    <div class="col-md-3">
                                        Hotel Name & Address
                                    </div>
                                    <div class="col-md-3">
                                        From Date - To Date
                                    </div>
                                    <div class="col-md-2">


                                    </div>
                                </div>
                        <?php
                        foreach ($appointmentdetailslocal as $key => $value) {
                            ?>


                            <div class="row">
                                <div class="col-md-1"> <?php echo $value['country']; ?></div>
                                <div class="col-md-2"><?php echo ucfirst(strtolower($value['city_state'])); ?></div>
                                <div class="col-md-3">
                                    <b>
                                        <i class="fa fa-building-o"></i>
                                        <span style="line-height: 14px;"> <?php echo $value['hotel']; ?></span>
                                    </b>
                                    <br/>
                                    <small>
                                        <?php echo $value['address']; ?>
                                    </small>
                                </div>
                                <div class="col-md-3">

                                    <b><?php
                                        echo $value["days"];
                                        $date1 = date_create($value['start_date']);
                                        // echo date_format($date1, "j<\s\u\p>S</\s\u\p>   F");
                                        ?></b>
                                   
                                    <ul style="    margin-bottom: 0px;margin-top: 10px;    font-size: 12px;">


                                        <li class="">

                                            <span class="timeing_opensm"> <i class="fa fa-clock-o"></i> Timing</span><br/>
                                            <span class="timeing_open">Mon - Sat</span>: 09:00 AM to 09:00 PM<br/>
                                            <span class="timeing_open">Sun</span>: 10:00 AM to 07:00 PM
                                        </li>

                                    </ul>


                                    <br/>

                                    <button class="btn btn-danger btn-lg" style="background: #dd0101;    margin: 10px 0px;" data-toggle="modal" data-target="#<?php echo $value['id']; ?>">Book Now</button>
                                    <?php
                                    createModel($value, '', $timeslot);
                                    ?>
                                </div>
                                <div class="col-md-3">
                                    <span style="    line-height: 15px;
                                          padding: 0px 0px 10px;    color: #dd0101;
                                          float: left;">
                                        <i class="fa fa-phone-square"></i>  <?php echo $value['contact_no']; ?>
                                    </span>
                                    <iframe  frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'  height="100px" width="100%"  src="https://maps.google.com/?q=<?php echo $value['hotel']; ?>+<?php echo $value['address']; ?>&output=embed">
                                    </iframe>  
                                </div>

                            </div>

                            <?php
                        }
                        ?>
                 
                </div>
            </div>

            <!--global appointment-->
            <div class="row"  style="border-bottom: 2px solid;    background: #ffffffb8; ">


                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs " role="tablist">
                        <li class="active tabview_desktop" role="presentation">
                            <a href="#aus_appointment" aria-controls="aus_appointment" class="row tabappointment active" role="tab" data-toggle="tab">
                                <h2 class="title-sidebar text-center" style="margin: 15px;padding-bottom:  15px;border-bottom: 1px dotted ;    width: 100%;">
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/images/flag/australia.jpg" alt="..." style="height: 75px"/>

                                    Australia Appointment

                                </h2>

                            </a>
                        </li>
                        <li role="presentation" class="tabview_desktop" >
                            <a href="#usa_appointment" aria-controls="usa_appointment" class="row tabappointment" role="tab" data-toggle="tab">
                                <h2 class="title-sidebar text-center" style="margin: 15px;padding-bottom:  15px;border-bottom: 1px dotted ;    width: 100%;">
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/images/flag/usa.jpg" alt="..." style="height: 75px"/>

                                    U.S.A Appointment</h2>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane contact-us-right active" id="aus_appointment">
                            <?php
                            if (count($appointmentdata)) {
                                ?>
                                <div class="row appointmentheader">
                                    <div class="col-md-1">
                                        Country
                                    </div>
                                    <div class="col-md-2">
                                        City/State
                                    </div>
                                    <div class="col-md-3">
                                        Hotel Name & Address
                                    </div>
                                    <div class="col-md-3">
                                        From Date - To Date
                                    </div>
                                    <div class="col-md-2">


                                    </div>
                                </div>
                                <?php
                                foreach ($appointmentdata as $key => $value) {
                                    ?>
                                    <div class="row appointmentfooter">
                                        <div class="col-md-1"> <?php echo $value['country']; ?></div>
                                        <div class="col-md-2"><?php echo ucfirst(strtolower($value['city_state'])); ?></div>
                                        <div class="col-md-3">
                                            <b>
                                                <i class="fa fa-building-o"></i>
                                                <span style="line-height: 14px;"> <?php echo $value['hotel']; ?></span>
                                            </b>
                                            <br/>
                                            <small>
                                                <?php echo $value['address']; ?>
                                            </small>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fa fa-calendar"></i>

                                            <b><?php
                                                echo $value["days"];
                                                $date1 = date_create($value['start_date']);
                                                // echo date_format($date1, "j<\s\u\p>S</\s\u\p>   F");
                                                ?></b>
                                            <br/><ul style="    margin-bottom: 0px;margin-top: 10px;    font-size: 12px;">






                                                <?php
                                                $dataes = $value['dates'];
                                                foreach ($dataes as $dtkey1 => $dtvalue1) {
                                                    echo "<li>";

                                                    echo '<span class = "timeing_open" style="    width: 100px;">' . $dtvalue1['date'] . "</span>: " . $dtvalue1['timing1'] . " to " . $dtvalue1['timing2'] . "<br/>";

                                                    echo "</li>";
                                                }
                                                ?>
                                            </ul>


                                            <br/>

                                            <button class="btn btn-danger btn-lg" style="background: #dd0101;    margin: 10px 0px;" data-toggle="modal" data-target="#<?php echo $value['id']; ?>">Book Now</button>
                                            <?php
                                            createModel($value, $dtvalue1, $timeslot);
                                            ?>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="    line-height: 15px;
                                                  padding: 0px 0px 10px;    color: #dd0101;
                                                  float: left;">
                                                <i class="fa fa-phone-square"></i>  <?php echo $value['contact_no']; ?>
                                            </span>
                                            <iframe  frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'  height="100px" width="100%"  src="https://maps.google.com/?q=<?php echo $value['hotel']; ?>+<?php echo $value['address']; ?>&output=embed">
                                            </iframe>  
                                        </div>

                                    </div>

                                    <?php
                                }
                                ?>

                                <?php
                            } else {
                                ?>
                                <h5 class="text-center" style="width: 100%;margin-bottom: 20px">Coming Soon....</h5>
                                <?php
                            }
                            ?>
                        </div>
                        <div role="tabpanel" class="tab-pane contact-us-right" id="usa_appointment">
                            <?php
                            if (count($appointmentdatausa)) {
                                ?>



                                <div class="row appointmentheader">
                                    <div class="col-md-1">
                                        Country
                                    </div>
                                    <div class="col-md-2">
                                        City/State
                                    </div>
                                    <div class="col-md-3">
                                        Hotel Name & Address
                                    </div>
                                    <div class="col-md-3">
                                        From Date - To Date
                                    </div>
                                    <div class="col-md-2">


                                    </div>
                                </div>

                                <?php
                                foreach ($appointmentdatausa as $key => $value) {
                                    ?>
                                    <div class="row appointmentfooter">
                                        <div class="col-md-1"> <?php echo $value['country']; ?></div>
                                        <div class="col-md-2"><?php echo ucfirst(strtolower($value['city_state'])); ?></div>
                                        <div class="col-md-3">
                                            <b>
                                                <i class="fa fa-building-o"></i>
                                                <span style="line-height: 14px;"> <?php echo $value['hotel']; ?></span>
                                            </b>
                                            <br/>
                                            <small>
                                                <?php echo $value['address']; ?>
                                            </small>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fa fa-calendar"></i>

                                            <b><?php
                                                echo $value["days"];
                                                $date1 = date_create($value['start_date']);
                                                // echo date_format($date1, "j<\s\u\p>S</\s\u\p>   F");
                                                ?></b>
                                            <br/><ul style="    margin-bottom: 0px;margin-top: 10px;    font-size: 12px;">






                                                <?php
                                                $dataes = $value['dates'];
                                                foreach ($dataes as $dtkey1 => $dtvalue1) {
                                                    echo "<li>";
                                                   

                                                    echo '<span class = "timeing_open" style="    width: 100px;">' . $dtvalue1['date'] . "</span>: " . $dtvalue1['timing1'] . " to " . $dtvalue1['timing2'] . "<br/>";

                                                    echo "</li>";
                                                }
                                                ?>
                                            </ul>


                                            <br/>

                                            <button class="btn btn-danger btn-lg" style="background: #dd0101;    margin: 10px 0px;" data-toggle="modal" data-target="#<?php echo $value['id']; ?>">Book Now</button>
                                            <?php
                                            createModel($value, $dtvalue1, $timeslot);
                                            ?>
                                        </div>
                                        <div class="col-md-2">
                                            <span style="    line-height: 15px;
                                                  padding: 0px 0px 10px;    color: #dd0101;
                                                  float: left;">
                                                <i class="fa fa-phone-square"></i>  <?php echo $value['contact_no']; ?>
                                            </span>
                                            <iframe  frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'  height="100px" width="300px"  src="https://maps.google.com/?q=<?php echo $value['hotel']; ?>+<?php echo $value['address']; ?>&output=embed">
                                            </iframe>  
                                        </div>

                                    </div>
                                    <?php
                                }
                                ?>

                                <?php
                            } else {
                                ?>
                                <h5 class="text-center" style="width: 100%;margin-bottom: 20px">Coming Soon....</h5>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>





                <!--                <div class="contact-us-right" ng-if="appointmentData.length == 0">
                
                                    <h2 class="title-sidebar text-center" style="margin: 30px;padding-bottom:  30px;border-bottom: 1px dotted ">Global Appointment</h2>
                
                                    <p class="text-center" style="font-size: 20px;">Coming Soon</p>
                
                                </div>-->

            </div>
        </div>
    </div>
    <!-- Single Blog Page Area End Here -->
    <!-- Contact Us Page Area End Here -->




</div>

<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
<script>
                                                                        $(document).ready(function () {
                                                                            $("#appintmentDate").datepicker({
                                                                                minDate: 0,
                                                                                dateFormat: "yy-mm-dd"
                                                                            });
                                                                            $.datepicker.parseDate("yy-mm-dd", "<?php echo date('Y-m-d'); ?>");
                                                                            $('#dateselection').on('change', function (e) {
                                                                                var $optionSelected = $("option:selected", this);
                                                                                console.log(this);
                                                                                $optionSelected.tab('show')
                                                                            });
                                                                        });

</script>

<?php
$this->load->view('layout/footer');
?>