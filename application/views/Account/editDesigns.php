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
<div ng-controller="EditDesing">
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
                                    <th>Current Selection</th>
                                    <th style="width: 400px;">Updated Selected</th>
                                </tr>
                                <tr ng-repeat="style in customizationDict.prestyle.style" >
                                    <td>
                                        {{style.style_key}}
                                    </td>
                                    <td>
                                        {{style.style_value}}

                                    </td>
                                    <td>
                                        <span  id="styleelement{{$index}}" data-type="select" data-pk="<?php echo $design_id;?>" data-name="{{style.style_key}}" data-value="{{style.style_value}}" data-params ={'tablename':'cart_customization_profile_design','update_kye':'style_key','update_value':'style_value','foregin_id':'profile_id'} data-url="<?php echo ADMINURL . "index.php/Api/updateCustomeDesign"; ?>" data-mode="inline" class="m-l-5  editable-click" tabindex="-1" >
                                            {{style.style_value}}
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
    var design_id = <?php echo $design_id; ?>;
    var item_id = <?php echo $item_id; ?>;
    var customurl = "<?php echo $customurl;?>";
</script>
<script src="<?php echo base_url(); ?>assets/theme/angular/preCustomCheckController.js"></script>
<?php
$this->load->view('layout/footer');
?>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jqueryui-editable/css/jqueryui-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jqueryui-editable/js/jqueryui-editable.min.js"></script>
