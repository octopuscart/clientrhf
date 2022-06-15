<?php
$userlinks = [
    array("title" => "Profile", "link" => site_url("Account/profile")),
    array("title" => "Addresses", "link" => site_url("Account/address")),
    array("title" => "My Orders", "link" => site_url("Account/orderList")),
    array("title" => "Invoices", "link" => site_url("Account/index")),
    array("title" => "Payment List", "link" => site_url("Account/index")),
    array("title" => "Newsletter Subscription Preference ", "link" => site_url("Account/index")),
    array("title" => "Invoices", "link" => site_url("Account/index")),
    array("title" => "Logout", "link" => site_url("Account/orderList"))];
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