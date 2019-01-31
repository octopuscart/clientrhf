<style>
    .standardmeasurement{
        margin: 10px 0px;
        width: 100%;
    }
    .standardmeasurement tr{
        padding: 10px;
        border: 1px solid #000;
    }
    .standardmeasurement td{
        padding: 10px;
        border: 1px solid #000;
    }
    .standardmeasurement th{
        padding: 10px;
        border: 1px solid #000;
    }

    .cart-page-area .cart-page-top .standardmeasurement table tr td:last-child {
        border-right: 1px solid;
    }

    .mestitle{
        width: 65px;
    }
    .meskeys{
        width: 120px;
    }
    .mesvalue{
        /*width: 50px;*/
    }
</style>

<?php
$panttsize = array(
   
    "S" => array(
        "Height" => "< 5.5",
        "size_type" => "Short",
        "sizes" => ['26', '28', '30', '32', '34', '36', '38', '40', '42', '44', '46', '48'],
    ),
    "R" => array(
        "Height" => "5.5 - 6.1",
        "size_type" => "Regular",
        "sizes" => ['30S', '32S', '34S', '36S', '38S', '40S', '42S', '44S', '46S', '48S'],
    ),
     "L" => array(
        "Height" => "> 6.1",
        "size_type" => "Long",
        "sizes" => ['30L', '32L', '34L', '36L', '38L', '40L', '42L', '44L', '46L'],
    )
);


$jacketsize = array(
    
    "S" => array(
        "Height" => "< 5.5",
        "size_type" => "Short",
        "sizes" => ['36S', '38S', '40S', '42S', '44S', '46S', '48S', '50S', '52S', '54S'],
    ),
    "R" => array(
        "Height" => "5.5 - 6.1",
        "size_type" => "Regular",
        "sizes" => ['32', '34', '36', '38', '40', '42', '44', '46', '48', '50', '52', '54'],
    ),
    "L" => array(
        "Height" => "> 6.1",
        "size_type" => "Long",
        "sizes" => ['30L', '32L', '34L', '36L', '38L', '40L', '42L', '44L', '46L'],
    )
);


$shirtsize = array(
    
    "R" => array(
        "Height" => "5.5 - 6.1",
        "size_type" => "Regular",
        "sizes" => ['15L', '15 1/2L', '15 3/4L', '16L', '16 1/2L', '17L', '17 1/2L', '17 3/4L', '18L'],
    ),
    "L" => array(
        "Height" => "> 6.1",
        "size_type" => "Long",
        "sizes" => ['14 1/2', '15', '15 1/2', '15 3/4', '16', '16 1/2', '17', '17 1/2', '17 3/4', '18'],
    )
);

function sizeTable($ctype, $lable) {
    ?>
    <table class="standardmeasurement" id="id<?php echo $lable;?>">
        <tr>
            <td rowspan="4" class="mestitle"><?php
                echo $lable;
                ?></td>

        </tr>
        <?php
        $mscount = 1;
        foreach ($ctype as $size => $sizevalue) {
            ?>
            <tr>
                <th class="meskeys">
                    <?php
                    echo $sizevalue['size_type'];
                    ?>
                    <br/>
                    <small>
                        Height:
                        <?php
                        echo $sizevalue['Height'];
                        ?>
                    </small>
                </th>
                <?php
                foreach ($sizevalue['sizes'] as $skey => $svalue) {
                    ?>
                    <td class="mesvalue">
                        <?php
                        $msid = $lable.$svalue;
                        $mestitle = $svalue . "($lable)";
                        $checkst = $sizevalue['size_type'];
                        $isstandard = "";
                        if($checkst == 'Regular'){
                            if($skey==0){
                                $isstandard = "activemeasurement$lable";
                            }
                        }
                        ?>

                        <label for="measurement_profile_<?php echo $msid; ?>" class="d_inline_m m_right_10" style="width: 100%" ng-click="slidedemostandard()">
                            <input  type="radio" id="measurement_profile_<?php echo $msid; ?>" name="order_measurement_type_<?php echo $lable?>" class="d_none standard_measurement <?php echo $isstandard;?>" value="<?php echo $mestitle; ?>" ng-model="standard_measurement.<?php echo $lable?>">
                            <b><?php  echo $svalue; ?></b>
                        </label> 


                    </td>
                    <?php
                    $mscount++;
                }
                ?>
            </tr>
            <?php
            ?>
            <?php
        }
        ?>
    </table>
    <?php
}

//sizeTable($shirtsize, 'Shirt');
//
//sizeTable($jacketsize, 'Jacket');
//
//
//sizeTable($panttsize, 'Pant');
        
        
        $mesdatacheck = array_unique($items);
$anotherarray = array();
foreach ($mesdatacheck as $key => $value) {
    $anotherarray[$value] = $key;
}


if(isset($anotherarray[1])){
sizeTable($shirtsize, 'Shirt');
}
if(isset($anotherarray[4])){
sizeTable($jacketsize, 'Jacket');
}
if(isset($anotherarray[2])){
sizeTable($jacketsize, 'Jacket');
sizeTable($panttsize, 'Pant');
}

if(isset($anotherarray[3])){
sizeTable($panttsize, 'Pant');
}
?>