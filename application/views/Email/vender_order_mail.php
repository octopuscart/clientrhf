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

        </style>
    </head>
    <body style="margin: 0;
          padding: 0;
          background: rgb(225, 225, 225);
          font-family: sans-serif;">
        <div class="" style="padding:50px 0px">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="background: #fff;padding: 0 20px">
                <tr>
                    <td style="width: 80px">
                        <img src="<?php echo base_url() . 'assets/images/logo73.png'; ?> " style="margin: 10px">
                    </td>
                    <td style="font-size: 30px;    font-family: serif;">
                        Class Apart <span style="color: red">Store</span>
                    </td>
                </tr>
                <tr><td colspan="2"><hr/></td></tr>

            </table>
            <table class="detailstable" align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="background: #fff">
                <tr>
                    <td style="font-size: 12px;width: 50%" >
                        <b>Shipping Address</b><br/><hr/>
                        <span style="text-transform: capitalize;margin-top: 10px;"> 
                            <?php echo $order_data->name; ?>
                        </span> <br/>
                        <div style="    padding: 5px 0px;">
                            <?php echo $order_data->address; ?>
                            <?php echo $order_data->state; ?>
                            <?php echo $order_data->city; ?>
                            <?php echo $order_data->pincode; ?>
                        </div>

                        <span style="">
                            <b>Email.</b> <?php echo $order_data->email; ?> 
                        </span>
                        <br/>
                        <span style="">
                            <b>Contact No.</b> : <?php echo $order_data->contact_no; ?> 
                        </span>
                    </td>
                    <td style="font-size: 12px;width: 50%" >
                        <b>Vendor Information</b><br/><hr/>
                        <span style="">
                            <?php echo $vendor->first_name; ?>  <?php echo $vendor->last_name; ?>
                        </span><br/>
                        <span style="">
                            <b>Email:</b> <?php echo $vendor->email; ?> 
                        </span>
                        <br/>
                        
                        <span style="">
                            <b>Order No.</b> #<?php echo $vorder_no; ?> 
                        </span>
                        <br/>
                        <span style="">
                            <b>Date Time</b> : <?php echo $order_data->order_date; ?> <?php echo $order_data->order_time; ?> 
                        </span>
                    </td>
                </tr>
            </table>
            <table class="carttable"  border-color= "#9E9E9E" align="center" border="1" cellpadding="0" cellspacing="0" width="600" style="background: #fff;padding:20px">
                <tr style="font-weight: bold">
                    <td style="width: 20px;text-align: center">S.No.</td>
                    <td colspan="2"  style="text-align: center">Product</td>

                    <td style="text-align: center">Price<br/><span style="font-size: 10px">(In INR)</span></td>
                    <td style="text-align: center">Qnty.</td>
                    <td style="text-align: center;width: 60px">Total<br/><span style="font-size: 10px">(In INR)</span></td>
                </tr>
                <!--cart details-->
                <?php
                foreach ($cart_data as $key => $product) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $key + 1; ?>
                        </td>

                        <td style="width: 80px">
                            <center>   <img src=" <?php echo $product->file_name; ?>" style="height: 70px;"></img>
                        </td>

                        <td style="width: 200px;">
                            <?php echo $product->title; ?>
                        </td>

                        <td style="text-align: right">
                            <?php echo $product->price; ?>
                        </td>

                        <td style="text-align: right">
                            <?php echo $product->quantity; ?>
                        </td>

                        <td style="text-align: right;">
                            <?php echo $product->total_price; ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <!--end of cart details-->

               


                <tr>
                    <td colspan="6" style="font-size: 12px;">
                        <p> DECLARATION:
                          
                        </p>

                        <p>
                            CUSTOMER ACKNOWLEDGEMENT:
                        
                        </p>

                        <br/>
                        <span style="    text-align: center;
                              width: 100%;
                              float: left;
                              margin-top: 24px;
                              background-color: white;
                              color: black;
                              font-size: 10px;"> (This is computer generated receipt and does not require physical signature.)</span>
                    </td>
                </tr>

            </table>
        </div>
    </body>
</html>