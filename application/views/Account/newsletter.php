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
            text-shadow: 0px 0px;">Newsletter </br>

        </h1>

        <!-- Breadcrumb -->



    </div>
</div>




<!-- Content -->
<div ng-controller="newsLetterController">
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


                        <div class="col-md-9 mb-5" style=''>
                            <div class="col-md-12 " style="    margin-top: 20px;
                                 border-top: 1px solid;
                                 padding-top: 20px;">
                                <h2 style="font: 300 37px 'Lato';color: #000;    margin-bottom: 20px;">
                                    Newsletters Preferences
                                </h2>
                                <p> 
                                    <label for="subscribe_check" class="d_inline_m m_right_10" style="margin: 0px 0px 24px 0px;"></label>


                                </p>

                                <div class="col-md-1"></div>
                                <div class="col-md-10" id="block_frequncey">

                                    <div ng-if="newsalertDict.user_subscription.has_subscription == 'no'">
                                        <h3>You have no subscription.</h3>
                                    </div>
                                    <div ng-if="newsalertDict.user_subscription.has_subscription != 'no'">
                                        <p>Your newsletter frequency preference</p>
                                        <h3>{{newsalertDict.user_subscription.subscription_data.newsletter_type}}</h3>
                                     <br/>
                                        <p>Updated On</p>
                                         <span style="margin: 0px">
                                            <i class="fa fa-calendar"></i> {{newsalertDict.user_subscription.subscription_data.c_date}} {{newsalertDict.user_subscription.subscription_data.c_time}}
                                        </span>
                                    </div>
                                    <hr/>
                                    <button class="btn btn-small btn-dark" ng-click="openModal()"><i class="fa fa-refresh"></i> Change Subscription</button>







                                </div>
                            </div>
                        </div>



                    </div>
                </div>
        </section>
    </div>
    <!-- Modal -->
    <div class="modal  fade" id="changeSubcription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    z-index: 20000000;">
        <div class="modal-dialog  woocommerce" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" style="font-size: 15px">Update Newsletters Preferences</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body checkout-form">

                    Please select your newsletter frequency preference. 
                    <hr/>
                    <div ng-repeat="news in newsalertDict.listdata"> 

                        <label >
                            <input type="radio" checked="false" id="radio_1" ng-change="askForSubscription(news)" ng-model="newsalertDict.selected" ng-value="news.title" class="d_none" /> {{news.title}} 
                        </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-default btn-small">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- End Content --> 



<script>
    var user_id = <?php echo $user_id; ?>
</script>
<script src="<?php echo base_url(); ?>assets/theme/angular/newsLetterController.js"></script>
<?php
$this->load->view('layout/footer');
?>

<script>
    $(function () {

    })
</script>

<script>
            $(function () {

            var newsalert = {
            'Full Experience': {'title': 'Full Experience', 'description': 'I want the full Nita Fashions Experience.'},
                    'Sales/Promotion': {'title': 'Sales/Promotion', 'description': 'I would like to only know about products that are on Sales/Promotion.'},
                    'New Arrival': {'title': 'New Arrival', 'description': 'I would like to only know about products that are New/Trending.'},
                    'Monthly': {'title': 'Monthly Subscription', 'description': 'I would like to receive monthly newsletters subscription from Nita Fashions.'},
            }
//         news letter
            function getStatus(a) {
            $.ajax({
            url: 'https://www.nitafashions.com/index.php/Api/newsLetterApi',
                    method: "post",
                    data: {'news_letters_subscribe': 'card', },
                    success: function (data) {
                    if (data) {

                    var jdata = (data);
                    console.log(jdata);
                    if (jdata.length) {
                    var fs = jdata[0].frequency;
                    $("input[valuecheck='" + fs + "']")[0].checked = true;
                    $("#block_frequncey").show(100);
                    $("#subscribe_check")[0].checked = true;
                    if (a) {
                    swal(newsalert[fs]['title'], newsalert[fs]['description'], "success");
                    }
                    }

                    }
                    ;
                    }
            });
            }


            function setStatus(a) {
            var subs = $("#subscribe_check")[0].checked;
            var feq = $("input[valuecheck]:checked").attr("valuecheck");
            console.log(feq);
            $.ajax({
            url: 'https://www.nitafashions.com/index.php/Api/newsLetterApi',
                    method: "post",
                    data: {'news_letters_subscribe': 'card', 'frequency': feq, 'subscribe': subs},
                    success: function (data) {
                    console.log(data);
                    getStatus(a);
                    }
            });
            }

            $("input[name='frequency']").click(function () {
            setStatus(1);
            })


                    getStatus();
            $("#subscribe_check").click(function () {
            var obj = this;
            if (this.checked) {
            $("#block_frequncey").show(100);
            swal({title: "Welcome",
                    text: "Confirm to subscribe to Nita Fashions newsletter. ",
//                    type: "warning", 
                    imageUrl: "../assets/nf_logoalert.png",
                    showCancelButton: true,
                    confirmButtonColor: "green",
                    confirmButtonText: "Yes, Do it!",
                    closeOnConfirm: false,
                    //closeOnCancel: false
            }, function (isConfirm) {

            if (isConfirm) {
            setStatus();
            swal("Thank You!", "You have subscribed from Nita Fashions newsletters. You can change your newsletters frequency", "success");
            }
            else {
            obj.checked = false;
            $("#block_frequncey").hide(100)
            }
            });
            }
            else {
            $("#block_frequncey").hide(100)
                    swal({title: "Are you sure?",
                            text: "You will not be able to receive newsletters form Nita Fashions !",
                            type: "warning", showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, Do it!",
                            closeOnConfirm: false,
                            //closeOnCancel: false
                    }, function (isConfirm) {

                    if (isConfirm) {
                    $.ajax({
                    url: 'https://www.nitafashions.com/index.php/Api/newsLetterApi',
                            method: "post",
                            data: {'news_letters_unsubscribe': 'card'},
                            success: function (data) {
                            console.log(data);
                            swal("Unsubscribed!", "You have unsubscribed from Nita Fashions newsletters.", "success");
                            //getStatus();
                            }
                    });
                    }
                    else {
                    obj.checked = true;
                    $("#block_frequncey").show(100)
                    }
                    });
            }
            })

//end of new letter