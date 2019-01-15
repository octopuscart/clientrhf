<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Order No#</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style>
            .carttable{
                border-color: #fff;
            }

            .carttable td{
                padding: 5px 10px;
                border-color: #9E9E9E;
            }
            .carttable tr{
                /*padding: 0 10px;*/
                border-color: #9E9E9E;
                font-size: 12px
            }

            .detailstable td{
                padding:10px 20px;
            }

            .gn_table td{
                padding:3px 0px;
            }
            .gn_table th{
                padding:3px 0px;
                text-align: left;

            }
            .style_block{
                float: left;
                padding: 1px 1px;
                margin: 2.5px;
                /* background: #000; */
                color: white;
                border: 1px solid #e4e4e4;
                width: 47%;
                font-size: 10px;
            }

            .style_block span {
                background: #fff;
                margin-left: 5px;
                color: #000;
                padding: 0px 5px;
                width: 50%;
            }
            .style_block b {
                width: 46%;
                float: left;
                background: #dedede;
                color: black;
            }
        </style>
    </head>

    <body style="margin: 0;
          padding: 0;
          background: rgb(225, 225, 225);
          font-family: sans-serif;">
        <div class="" style="padding:50px 0px">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="700" style="background: #000;padding: 0 20px">
                <tr>
                    <td >
                        <center><img src="<?php echo site_mail_logo; ?> " style="margin: 10px;
                                     height: 50px;
                                     width: auto;"/><br/>
                            <h4 style="color: white;    margin-top: 0px;"> Your Appointment <br>
                                    <small>
                                        Appointment Date & Time: <?php echo date_format(date_create($appointment['select_date'] . ' ' . $appointment['select_time']), "l, d F Y"); ?> (<?php echo $appointment['select_time']; ?>)
                                    </small>
                            </h4>
                        </center>
                    </td>

                </tr>

            </table>

            <table class="carttable"  border-color= "#9E9E9E" align="center" border="1" cellpadding="0" cellspacing="0" width="700" style="background: #fff;padding:20px">



                <tr>
                    <td colspan="6" style="font-size: 12px;">

                        <p>Dear <?php echo $appointment['first_name']; ?> <?php echo $appointment['last_name']; ?>,</p><br/>

                        <p> Thank you for choosing to book an appointment with Bespoke Tailors. </p>
                        <p>We have booked your appointment to see our Chief Tailor, on <b><?php echo date_format($opdater = date_create($appointment['select_date'] . ' ' . $appointment['select_time']), "l, d F Y"); ?>, <?php echo $appointment['select_time']; ?></b> at our shop.</p> 

                        <p>For any appointment related queries, please email us at info@bespoketailorshk.com</p>

                        <br/>
                        <div style="height: 200px;">Kindest Regards,<br />
                            <img src="<?php echo site_mail_logo; ?>" style="height: 30px;  background: #000 ;margin: 5px 0px 10px ;"><br/>
                                <span style="float: left; font-size: 12px;">

                                    <address>
                                        <b>Address 1</b><br/>
                                        2nd Floor, 45 Haiphong Road,<br/> 
                                        Tsim Sha Tsui, Kowloon, Hong Kong
                                        <br/><br/>
                                        <b>Address 2</b><br/>
                                        Shop D, Ground Floor, Hanyee Building, 19-21 Hankow Road, <br/>
                                        Tsim Sha Tsui, Kowloon, Hong Kong                                        <br/>
                                        <b>Tel#</b>: +(852) 2730 8566  <b>Fax#</b>: +(852) 2730 8577<br/>
                                        <b>Email</b>: info@bespoketailorshk.com  
                                        <b>Web</b>: www.bespoketailorshk.com


                                    </address>
                                </span>
                        </div>

                    </td>
                </tr>

            </table>

        </div>
    </body>
</html>