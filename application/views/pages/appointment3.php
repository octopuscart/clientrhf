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

<
<div >
    <!-- Inner Page Banner Area Start Here -->


    <!-- Inner Page Banner Area End Here -->
    <!-- Contact Us Page Area Start Here -->
    <!-- Single Blog Page Area Start Here -->
    <div class="single-blog-page-area" style="padding: 0px 0 0px;background: url(<?php echo base_url(); ?>assets/theme2/img/mapback.png);background-size: contain;width: 100%">
        <div class="container contact-us-page-area" style="padding: 50px 0 30px;">
            <div class="row" style="border-bottom: 2px solid;    background: #ffffffb5; ">
                <div class="col-md-12">
                    <h2 class="title-sidebar text-center" style="margin-bottom: 30px;padding-bottom:  10px;border-bottom: 1px dotted ">Dallas, Texas</h2>
                    <div style="    text-align: center;">
                        <table style='    display: inline-block;margin-bottom: 20px;'>
                            <tr>
                                <td style='text-align: right'>U.S.A Mobile No.</td>
                                <th>: +(1) 917 915 6552</th>
                            </tr>
                            <tr>
                                <td style='text-align: right'>Hong Kong Mobile No.</td>
                                <th>: +(852) 9500 0744</th>
                            </tr>
                        </table>
                        <br/>

                    </div>

                    <table id="data-table" class="table table-bordered" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact No.</th>
                                <th>Person(s)</th>
                                <th>Selected Date/Time</th>
                                <th>Country</th>
                                <th>City/State</th>
                                <th style="width:200px;">Hotel Name & Address</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($appointmentdata)) {
                                foreach ($appointmentdata as $key => $value) {
                                    ?>

                                    <tr>
                                        <td><?php echo $value['first_name'] . " " . $value['last_name']; ?></td>
                                        <td><?php echo $value['email']; ?></td>
                                        <td><?php echo $value['contact_no']; ?></td>
                                        <td><?php echo $value['no_of_person']; ?></td>
                                        <td><?php echo $value['select_date']; ?> <?php echo $value['select_time']; ?></td>
                                        <td><?php echo $value['country']; ?></td>
                                        <td><?php echo ucfirst(strtolower($value['city_state'])); ?></td>
                                        <td> <b>
                                                <i class="fa fa-building-o"></i>
                                                <span style="line-height: 14px;"> <?php echo $value['hotel']; ?></span>
                                            </b>
                                            <br/>
                                            <small>
                                                <?php echo $value['address']; ?>
                                            </small>

                                        </td>
                                       
                                    </tr>



                                    <?php
                                }
                            } else {
                                
                            }
                            ?>

                        </tbody>
                    </table>
               
                   

                </div>
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