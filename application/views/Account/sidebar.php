<?php
$userlinks = [
    array("title" => "Profile", "link" => site_url("Account/profile")),
    array("title" => "Addresses", "link" => site_url("Account/address")),
    array("title" => "My Orders", "link" => site_url("Account/orderList")),
    array("title" => "My Wishlist", "link" => site_url("Account/wishlist")),
    array("title" => "Design Profiles", "link" => site_url("Account/myDesigns")),
    array("title" => "Measurement Profiles", "link" => site_url("Account/myMeasurements")),
    array("title" => "Invoices", "link" => site_url("Account/invoiceList")),
    array("title" => "Payment List", "link" => site_url("Account/paymentList")),
    array("title" => "Newsletter Preference ", "link" => site_url("Account/newsletter")),
    array("title" => "Logout", "link" => site_url("Account/logout"))];
?>
<div class="col-md-3">
    <div class="side-bar shop-sidbar">
        <nav class="">
            <ul class="list-group">
                <?php
                foreach ($userlinks as $key => $value) {
                    ?>
                    <li class="list-group-item list-group-item--dashboard profile_page1 ">
                        <a href="<?php echo $value["link"]; ?>" >
                            <?php echo $value["title"]; ?>
                        </a>
                    </li>

                    <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</div>
<script>
    $(function () {
        var urlactive = window.location.href;
        $("a[href='" + urlactive + "']").parent("li").addClass("active");
    })
</script>