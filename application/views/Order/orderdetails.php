<?php
$this->load->view('layout/header');
$paymentstatus = "";
?>


<style>
    .measurement_right_text{
        float: right;
    }
    .measurement_text{
        float: left;
    }
    .fr_value{
        font-size: 12px;
        margin-top: -7px;
        float: left;
    }
    .productStatusBlock{
        padding:10px;
        border: 1px solid #000;
        float: left;
        margin: 5px;
    }

    .payment_block{
        padding: 10px;
        padding-top: 30px;
        margin: 0px;
        margin-top: 30px;
        background: #ddd;
        border: 6px solid #ff3b3b;
    }
    .icon-circle {
        font-size: 19px;
        height: 31px;
        width: 31px;
        background-color: #b28c06;
        float: left;
        border-radius: 50%;
        color: #fff;
        line-height: 28px;
        text-align: center;
    }
    .headerorder{
        padding: 2px 10px;
        /*text-align: center;*/

        margin-bottom: 10px;
        font-weight: 600;
        font-size: 18px;
    }
</style>


<div class="page-header" style="height: 160px">
    <div class="container">

        <h1 style="    color: black;
            margin-bottom: 30px;
            font-size: 30px;
                text-shadow: 0px 0px;">Order Details</br>
                  <p style="font-size:15px;margin:10px auto;">Order No. #<?php echo $order_data->order_no; ?></p>
                 
        </h1>

        <!-- Breadcrumb -->
       
          
        
    </div>
</div>



<!-- Content -->
<div id="content" ng-controller="OrderDetailsController"> 

    <!--======= PAGES INNER =========-->
    <section class="order-details-page-area">
        <div class="container">
            <div class="row  "> 

                <div class="col-md-3" style="    border: 1px solid #000;
                     padding: 6px;
                     border-radius: 5px;">
                    <h3 class="headerorder">Order Status</h3>

                    <?php
                    $count = 0;
                    $countord = count($order_status);
                    foreach ($order_status as $oskey => $osvalue) {
                        ?>
                        <div class="media" style="border-bottom: 1px solid #000;
                             margin-bottom: 10px;
                             padding-bottom: 10px;">
                            <div class="media-left">
                                <a href="#">
                                    <i class='icon-circle'><?php
                                        echo $countord - $count;
                                        ?></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading" style="font-size: 15px">  <?php
                                    echo $osvalue->status;
                                    ?></h4>
                                <small style="font-weight:300;font-size:13px">
                                    <?php
                                    if ($osvalue->status == "Shipped") {
                                        echo $osvalue->description;
                                    } else {
                                        echo $osvalue->remark;
                                    }
                                    ?>

                                </small>
                                <br/>
                                <span style="font-size: 10px;">
                                    <i class="fa fa-calendar"></i> 
                                    <?php
                                    echo $osvalue->c_date . " " . $osvalue->c_time;
                                    ?>
                                </span>
                            </div>
                        </div>
                        <?php
                        $count++;
                        ?>

                        <?php
                    }
                    ?>

                    <button class="btn btn-inverse btn-block" ng-click="sendOrderMail('<?php echo $order_data->order_no; ?>')">
                        <i class="fa fa-envelope"></i> Request Order Copy On Mail
                    </button>




                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">

                            <article class="order_box">
                                <h3 class="headerorder"><i class="fa fa-user"></i> Customer Information</h3>
                                <li><i class="fa fa-user"></i> <?php echo $order_data->name; ?> </li>
                                <li><i class="fa fa-phone"></i> <?php echo $order_data->contact_no; ?></li> 
                                <li><i class="fa fa-envelope"></i> <?php echo $order_data->email; ?> </li>
                            </article>
                        </div>

                        <div class="col-md-4">
                            <article class="order_box">
                                <h3 class="headerorder"><i class="fa fa-map"></i> Shipping Address</h3>

                                <li>  <?php echo $order_data->address1; ?><br/><?php echo $order_data->address2; ?><br/>
                                    <?php echo $order_data->state; ?>  <?php echo $order_data->city; ?> <?php echo $order_data->country; ?>, <?php echo $order_data->zipcode; ?></li>
                            </article>
                        </div>

                        <div class="col-md-4">
                            <article class="order_box">
                                <h3 class="headerorder"><i class="fa fa-list"></i> Order Information</h3>
                                <li> <i class=" fa fa-chevron-circle-right"></i> <?php echo $order_data->order_no; ?></li>
                                <li> <i class="fa fa-calendar"></i> <?php echo $order_data->order_date; ?> </li>
                                <li> <i class="fa fa-clock-o"></i>  <?php echo $order_data->order_time; ?> </li>

                            </article>
                        </div>

                        <div class="col-md-12">
                            <?php
//                        print_r($order_status);
                            foreach ($order_status as $key => $value) {
                                if ($value->status == 'Payment Pending') {
                                    $paymentstatus = "yes";
                                } else {
                                    $paymentstatus = "no";
                                }
                            }
                            if ($paymentstatus == 'yes') {
                                ?>
                                <div class="row payment_block " >
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <!--                                        <div class="col-md-3">
                                                                                        <div class="thumbnail">
                                                                                            <img src="<?php
                                            echo imageservermain . 'barcodes/' . $paymentbarcode->file_name;
                                            ?>" alt="..." style="height:170px;">
                                                                                            <div class="caption">
                                                                                                <h3 style="text-align: center"><?php echo $paymentbarcode->mobile_no; ?></h3>
                                                                                            </div>
                                                                                        </div>    
                                                                                    </div>-->

                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image1">Upload Payment Screen</label>
                                                        <input type="file" name="picture" />           
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group sliderbox-panel">
                                                        <label>Mobile No.</label>
                                                        <input type="text" class="form-control" name="mobile_no"  placeholder="" value="<?php echo ''; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group sliderbox-panel">
                                                        <label>Payment ID / Transaction ID</label>
                                                        <input type="text" class="form-control" name="payment_id"  placeholder="" value="<?php echo ''; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group sliderbox-panel">
                                                        <label>Payment Date</label>
                                                        <input type="text" class="form-control" name="payment_date"  placeholder="" value="<?php echo ''; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group sliderbox-panel">
                                                        <label>Description</label>
                                                        <textarea class="form-control" name="description"  placeholder=""><?php echo ''; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label></label>
                                                    <button class="btn btn-success btn-lg" type="submit" name="submit" value="submit" style="margin-top: 32px;">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <?php
                            }
                            ?>
                        </div>

                        <div class="col-md-12" style=" margin-top: 10px;">
                            <article class="" style="padding: 10px;border: 1px solid #000;
                                     padding: 6px;
                                     border-radius: 5px;">
                                <table class="table table-bordered"  border-color= "#9E9E9E" align="center" border="1" cellpadding="0" cellspacing="0" width="600" style="background: #fff;padding:20px">
                                    <tr style="font-weight: bold">
                                        <td style="width: 20px;text-align: right">S.No.</td>
                                        <td colspan="2"  style="text-align: center">Product</td>

                                        <td style="text-align: right;width: 100px"">Price</td>
                                        <td style="text-align: right;width: 10px">Qantity</td>
                                        <td style="text-align: right;width: 100px">Total</td>
                                    </tr>
                                    <!--cart details-->
                                    <?php
                                    foreach ($cart_data as $key => $product) {
                                        ?>
                                        <tr>
                                            <td style="text-align: right">
                                                <?php echo $key + 1; ?>
                                            </td>

                                            <td style="width: 80px">
                                        <center>   
                                            <img src=" <?php echo $product->file_name; ?>" style="height: 70px;"/>
                                        </center>
                                        </td>

                                        <td style="width: 300px;">

                                            <?php echo $product->title; ?> - <?php echo $product->item_name; ?>
                                            <br/>
                                            <small style="font-size: 12px;">(<?php echo $product->sku; ?>)</small>

                                            <h4 class="panel-title">
                                                <a role="button" class="btn  btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $product->id; ?>" aria-expanded="true" aria-controls="collapseOne" style=" line-height: 15px;   margin: 5px 0px;
                                                   padding: 4px;">
                                                    View Summary
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="collapse<?php echo $product->id; ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body" style="padding:10px 0px;">
                                                    <?php
                                                    echo "<ul class='list-group'>";
                                                    foreach ($product->custom_dict as $key => $value) {
                                                        $checkextra = $value;
                                                        $isextra = strpos($value, "$");
                                                        if ($isextra) {
                                                            $extraarry = explode(" ", $value);
                                                            $prefix = array_slice($extraarry, 0, count($extraarry) - 1);
                                                            $sufix = "<b class='extrapricesummryorder'>" . $extraarry[count($extraarry) - 1] . "</b>";
                                                            array_push($prefix, $sufix);
                                                            $fvalue = (implode(" ", $prefix));
                                                            echo "<li class='list-group-item' style='font-size:12px'>$key <span class='badge'>$fvalue</span></li>";
                                                        } else {
                                                            echo "<li class='list-group-item'  style='font-size:12px'>$key <span class='badge'>$value</span></li>";
                                                        }
                                                    }
                                                    echo "</ul>";
                                                    ?>                                            </div>
                                            </div>


                                        </td>

                                        <td style="text-align: right">
                                            {{ <?php echo $product->price; ?> |currency:"<?php echo globle_currency; ?> "}}
                                            <?php
                                            if ($product->extra_price > 0) {
                                                ?>
                                            <span  style="font-size: 12px;
                                          font-weight: 600;
                                          text-align: center;">
                                        <br/>
                                       {{ <?php echo $product->price - $product->extra_price; ?> |currency:""}}
                                              + {{ <?php echo $product->extra_price; ?> |currency:""}}
                                                </span>
                                                <?php
                                            }
                                            ?>
                                        </td>

                                        <td style="text-align: right;width: 50px;">
                                            <?php echo $product->quantity; ?> 
                                        </td>

                                        <td style="text-align: right;">
                                            {{ <?php echo $product->total_price; ?>|currency:"<?php echo globle_currency; ?> "}}
                                        </td>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                    <td colspan="7">
                                        Measurement Type :
                                        <?php
                                        echo $order_data->measurement_style;
                                        if (count($measurements_items)) {
                                            ?>
                                            <a role="button" class="btn btn-xs btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapsemeasurements" aria-expanded="true" aria-controls="collapseOne">
                                                View Measurement
                                            </a>
                                            <div id="collapsemeasurements" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="panel-body" style="padding:10px 0px;">
                                                            <?php
                                                            echo "<ul class='list-group'>";
                                                            foreach ($measurements_items as $keym => $valuem) {
                                                                $mvalues = explode(" ", $valuem['measurement_value']);
                                                                echo "<li class='list-group-item'>" . $valuem['measurement_key'] . " <span class='measurement_right_text'><span class='measurement_text'>" . $mvalues[0] . "</span><span class='fr_value'>" . $mvalues[1] . '"' . "</span></span></li>";
                                                            }
                                                            echo "</ul>";
                                                            ?>                             
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </td>


                                    <!--end of cart details-->
                                    <tr>
                                        <td colspan="7">
                                            <?php
                                            $laststatus = "";
                                            $laststatus_cdate = "";
                                            $laststatus_ctime = "";
                                            $laststatusremark = "";
                                            foreach ($order_status as $key => $value) {
                                                $laststatus = $value->status;
                                                $laststatus_cdate = $value->c_date;
                                                $laststatus_ctime = $value->c_time;
                                                $laststatusremark = $value->remark;
                                            }
                                            ?>



<!--                                        <button class="btn btn-button pull-right" type="button" data-toggle="collapse" data-target="#collapseProduct<?php echo $product->id; ?>" aria-expanded="false" aria-controls="collapseProduct<?php echo $product->id; ?>">
                                            Show More  <i class="fa fa-arrow-down"></i>
                                        </button>-->

                                            <div class="statusdiv">
                                                Current Status: <?php echo $laststatus; ?>
                                                <p style="font-size: 10px;    margin: 0;">
                                                    <i class="fa fa-calendar"></i> 
                                                    <?php echo $laststatus_cdate; ?>
                                                    <?php echo $laststatus_ctime; ?>
                                                </p>

                                                <p style="font-size: 12px;    margin: 0;">
                                                    <?php echo $laststatusremark; ?>
                                                </p>
                                            </div>






                                            <div class="collapse" id="collapseProduct<?php echo $product->id; ?>">
                                                <div class="">
                                                    <?php
                                                    foreach ($product->product_status as $key => $value) {
                                                        ?>
                                                        <div class="productStatusBlock">
                                                            <p style="font-size: 10px;margin: 0;"><i class="fa fa-calendar"></i> <?php echo $value->c_date ?> <?php echo $value->c_time ?></p>
                                                            <h3><?php echo $value->status; ?></h3>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>



                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3"  rowspan="5" style="font-size: 12px">
                                            <b>Total Amount in Words:</b><br/>
                                            <span style="text-transform: capitalize"> <?php echo $order_data->amount_in_word; ?></span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: right">Sub Total</td>
                                        <td style="text-align: right;width: 60px">{{"<?php echo $order_data->sub_total_price; ?>"|currency:"<?php echo globle_currency; ?> "}} </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: right">Coupon Discount</td>
                                        <td style="text-align: right;width: 60px">{{"<?php echo $order_data->discount; ?>"|currency:"<?php echo globle_currency; ?> "}} </td>
                                    </tr>
                                     <tr>
                                        <td colspan="2" style="text-align: right">Shipping</td>
                                        <td style="text-align: right;width: 60px">{{"<?php echo $order_data->shipping; ?>"|currency:"<?php echo globle_currency; ?> "}} </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: right">Total Amount</td>
                                        <td style="text-align: right;width: 60px">{{"<?php echo $order_data->total_price; ?>"|currency:"<?php echo globle_currency; ?> "}} </td>
                                    </tr>




                                </table>
                            </article>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>





</div>


<script>

    App.controller('OrderDetailsController', function ($scope, $http, $timeout, $interval) {
        var url = baseurl + "Api/order_mail/" + <?php echo $order_data->id; ?> + "/" + '<?php echo $order_data->order_no; ?>';
        $scope.checkmailsend = 0;
        $scope.sendOrderMail = function (order_no) {
            swal({
                title: 'Sending Mail...',
                onOpen: function () {
                    swal.showLoading()
                },
            })
            $http.get(url).then(function (rdata) {
                swal({timer: 1500,
                    title: 'Mail Sent!',
                    type: 'success', })
            }, function () {
                swal({timer: 1500,
                    title: 'Unable To Send Mail!',
                    type: 'error', })
            })
        }

        $interval(function () {
            if ($scope.checkmailsend == 1) {
            }
            else {
                $scope.sendOrderMailCheck();
            }
        }, 2000)

        $scope.sendOrderMailCheck = function (order_no) {
            var url1 = baseurl + "Api/order_mailcheck/" + <?php echo $order_data->id; ?> + "/" + '<?php echo $order_data->order_no; ?>';


            $http.get(url1).then(function (rdata) {
                $scope.checkmailsend = rdata.data.checkpre;
                if ($scope.checkmailsend == 0) {
                    var url2 = baseurl + "Api/order_mailchecksend/" + <?php echo $order_data->id; ?> + "/" + '<?php echo $order_data->order_no; ?>';
                    $http.get(url2).then(function (rdata) {
                        swal({timer: 1500,
                            title: 'Mail Sent!',
                            type: 'success', })
                    }, function () {
                        swal({timer: 1500,
                            title: 'Unable To Send Mail!',
                            type: 'error', })
                    })
                }

            }, function () {

            })
        }

    })


</script>


<?php
$this->load->view('layout/footer');
?>