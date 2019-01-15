<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
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
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="700" style=" background: linear-gradient(to right, #FFD194, #D1913C);padding: 0 20px">
                <tr>
                    <td >
                       
                        <center><img src="<?php echo site_mail_logo; ?> " style="margin: 10px;
                                     height: 50px;
                                     width: auto;"/><br/>
                            <h4 style="color: white;"> <?php echo $web_enquiry['subject']; ?> </h4>
                        </center>
                    </td>

                </tr>

            </table>

            <table class="carttable"  border-color= "#9E9E9E" align="center" border="1" cellpadding="0" cellspacing="0" width="700" style="background: #fff;padding:20px">



                <tr>
                    <td colspan="6" style="font-size: 12px;">

                        <p><?php echo $web_enquiry['first_name']; ?> <?php echo $web_enquiry['last_name']; ?>,</p><br/>
                        E:<?php echo $web_enquiry['email']; ?><br/>
                        T:<?php echo $web_enquiry['contact']; ?>
                        <p><?php echo $web_enquiry['message']; ?></p> 
                        <br/>
                        <div style="height: 200px;">End<br />
                            
                        </div>

                    </td>
                </tr>

            </table>

        </div>
    </body>
</html>