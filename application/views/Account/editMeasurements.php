<?php
$this->load->view('layout/header');
?>

<style>
    .order_box{
        padding: 10px;
        padding-bottom: 11px!important;
        height: 110px;
    }
    .order_box li{
        line-height: 19px!important;
        padding: 7px!important;
        border: none!important;
    }

    .order_box li i{
        float: left!important;
        line-height: 19px!important;
        margin-right: 13px!important;
    }

    .blog-posts article {
        margin-bottom: 10px;
    }
</style>

<div class="page-header" style="height: 160px">
    <div class="container">

        <h1 style="    color: black;
            margin-bottom: 30px;
            font-size: 30px;
            text-shadow: 0px 0px;">My Designs</br>
            <p style="font-size:15px;margin:10px auto;">Profile/ My Designs</p>

        </h1>

        <!-- Breadcrumb -->



    </div>
</div>




<!-- Content -->
<div ng-controller="EditMeasurement">
    <div id="content" class="my-account-page-area"> 

        <!-- Blog -->
        <section class="new-main blog-posts ">
            <div class="container"> 

                <!-- News Post -->
                <div class="news-post">
                    <div class="row"> 

                        <?php
                        $this->load->view('Account/sidebar');
                        ?>


                        <div class="col-md-9 mb-5" style=''>.

                            <h2>
                                <small style="font-size: 16px;">Profile Name</small><br/>
                                {{ customizationDict.prestyle.name}}
                            </h2>

                            <table class="table">
                                <tr>
                                    <th></th>
                                    <th>Current Value</th>
                                    <th style="width: 400px;">Updated Value</th>
                                </tr>
                                <tr ng-repeat="style in customizationDict.prestyle.measurements" >
                                    <td>
                                        {{style.measurement_key}}
                                    </td>
                                    <td>
                                        {{style.measurement_value}}
                                    </td>
                                    <td>
                                        <span  id="styleelement{{$index}}" data-type="text" data-pk="<?php echo $measurement_id; ?>" data-name="{{style.measurement_key}}" data-value="{{style.measurement_value}}" data-params ={'tablename':'custom_measurement', 'foregin_id':'custom_measurement_profile'} data-url="<?php echo ADMINURL . "index.php/Api/updateCustomeMeasurement"; ?>" data-mode="inline" class="m-l-5  editable-click" tabindex="-1" >
                                            {{style.measurement_value}}
                                        </span>

                                    </td>
                                </tr>
                            </table>
                        </div>



                    </div>
                </div>
        </section>
    </div>
</div>
<!-- End Content --> 




<script>
    var measurement_id = <?php echo $measurement_id; ?>;

</script>
<script src="<?php echo base_url(); ?>assets/theme/angular/preMeasurementCheckController.js"></script>
<?php
$this->load->view('layout/footer');
?>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jqueryui-editable/css/jqueryui-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jqueryui-editable/js/jqueryui-editable.min.js"></script>
