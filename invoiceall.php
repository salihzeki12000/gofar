<?php
// require_once 'config/config.php';
//   require_once 'database/database.php';//original by kevin
require_once('../functions/database.php'); //integrated by hyder - more or less the same
require_once 'function/fn_invoice.php';
require_once 'function/custom.php';
require_once 'function/class.paginate.php';
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 

################
#issue97
$ini_array = parse_ini_file("../../outlet.ini", true);
//print_r($ini_array);
###################

//  echo  $ini_array[mdc_details]  [region];
//  var_dump($outletid_arr);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Invoice</title>
<style type="text/css" media="print">

    body {
        font-family: Arial;
        font-size: 12px;
    }

    .lister {
        border: 1px solid #ccc;
    }

    .lister td {
        border-right: 1px solid #ccc;
        border-top: 1px solid #ccc;
        height: 15px

    }

    .lister td.last {
        border-right: none;
    }

    .firstBorder {
        border-top: 1px solid #ccc;
        border-left: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
    }

    .logoWithoutBorder {
        border-top: 1px solid #ccc;
        border-right: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
    }

    .theBorder {
        border: 1px solid #ccc;
    }

    .removeSomePadding {
        padding: 2px 0 0 0;
        border-top: 0;
    }

    .lister th {
        border-right: 1px solid #fff;
    }

    .lister th.last {
        border-right: none;
    }

    .subs {
        border: 1px solid #ccc;
        margin-top: 5px;
    }

    .subs td {
        border-bottom: 1px solid #ccc;
    }

    .subs td.last {
        border-bottom: none;
    }

    .subs th {
        border-bottom: 1px solid #fff;
    }

    .subs th.last {
        border-bottom: none;
    }

    .pagination {
        display: none;
    }

    button {

        display: none;

    }

    .addBorder td, .addBorder th {
        border: 1px solid #ccc;
    }

    .center {
        background: none repeat scroll 0 0 #CCCCCC;
        font-weight: bold;
        margin-bottom: 5px;
        margin-left: 23.8%;
        padding: 5px;
        text-align: center;
        width: 200px;
    }
</style>

<style type="text/css" media="screen">

body {
    font-family: Arial;
    font-size: 12px;
}

.lister {
    border: 1px solid #ccc;
}

.lister td {
    border-right: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    height: 15px
}

.lister td.last {
    border-right: none;
}

.firstBorder {
    border-top: 1px solid #ccc;
    border-left: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
}

.logoWithoutBorder {
    border-top: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
}

.theBorder {
    border: 1px solid #ccc;
}

.removeSomePadding {
    padding: 2px 0 0 0;
    border-top: 0;
}

.lister th {
    border-right: 1px solid #fff;
}

.lister th.last {
    border-right: none;
}

.subs {
    border: 1px solid #ccc;
    margin-top: 5px;
}

.subs td {
    border-bottom: 1px solid #ccc;
}

.subs td.last {
    border-bottom: none;
}

.subs th {
    border-bottom: 1px solid #fff;
}

.subs th.last {
    border-bottom: none;
}

.pagination {
    margin-top: 20px;
}

.pagination a {
    padding-right: 20px;
}

.addBorder td, .addBorder th {
    border: 1px solid #ccc;
}

.center {
    background: none repeat scroll 0 0 #CCCCCC;
    font-weight: bold;
    margin-bottom: 5px;
    margin-left: 23.8%;
    padding: 5px;
    text-align: center;
    width: 200px;
}

.buttons:before, .buttons:after {
    content: " \0020 ";
    display: block;
    height: 0;
    visibility: hidden;
}

.buttons:after {
    clear: both;
}

.buttons {
    zoom: 1;
}

/*------------------------------------
	BUTTON
------------------------------------*/
button, .button {
    text-decoration: none;
    text-shadow: 0 1px 0 #fff;
    font: bold 11px Helvetica, Arial, sans-serif;
    color: #fff;
    line-height: 17px;
    height: 18px;
    display: inline-block;
    float: left;
    margin: 5px;
    padding: 5px 6px 4px 6px;
    background: #F3F3F3;
    border: solid 1px #D9D9D9;
    border-radius: 2px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -webkit-transition: border-color .20s;
    -moz-transition: border-color .20s;
    -o-transition: border-color .20s;
    transition: border-color .20s;
}

button {
    height: 29px !important;
    cursor: pointer;
}

button.left, .button.left {
    margin: 5px 0 5px 5px;
    border-top-right-radius: 0;
    -webkit-border-top-right-radius: 0;
    -moz-border-radius-topright: 0;
    border-bottom-right-radius: 0;
    -webkit-border-bottom-right-radius: 0;
    -moz-border-radius-bottomright: 0;
}

button.middle, .button.middle {
    margin: 5px 0;
    border-left-color: #F4F4F4;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
}

button.right, .button.right {
    margin: 5px 5px 5px 0;
    border-left-color: #F4F4F4;
    border-top-left-radius: 0;
    -webkit-border-top-left-radius: 0;
    -moz-border-radius-topleft: 0;
    border-bottom-left-radius: 0;
    -webkit-border-bottom-left-radius: 0;
    -moz-border-radius-bottomleft: 0;
}

button:hover, .button:hover {
    background: #F4F4F4;
    border-color: #C0C0C0;
    color: #fff;
}

button:active, .button:active {
    border-color: #4D90FE;
    color: #4D90FE;
    -moz-box-shadow: inset 0 0 10px #D4D4D4;
    -webkit-box-shadow: inset 0 0 10px #D4D4D4;
    box-shadow: inset 0 0 10px #D4D4D4;
}

button.on, .button.on {
    border-color: #BBB;
    -moz-box-shadow: inset 0 0 10px #D4D4D4;
    -webkit-box-shadow: inset 0 0 10px #D4D4D4;
    box-shadow: inset 0 0 10px #D4D4D4;
}

button.on:hover, .button.on:hover {
    border-color: #BBB;
    -moz-box-shadow: inset 0 0 10px #D4D4D4;
    -webkit-box-shadow: inset 0 0 10px #D4D4D4;
    box-shadow: inset 0 0 10px #D4D4D4;
}

button.on:active, .button.on:active {
    border-color: #4D90FE;
}

button.action, .button.action {
    border: 1px solid #D8D8D8 !important;
    background: #F2F2F2;
    background: -webkit-linear-gradient(top, #F5F5F5, #F1F1F1);
    background: -moz-linear-gradient(top, #F5F5F5, #F1F1F1);
    background: -ms-linear-gradient(top, #F5F5F5, #F1F1F1);
    background: -o-linear-gradient(top, #F5F5F5, #F1F1F1);
    -webkit-transition: border .20s;
    -moz-transition: border .20s;
    -o-transition: border .20s;
    transition: border .20s;
}

button.action:hover, .button.action:hover {
    border: 1px solid #C6C6C6 !important;
    background: #F3F3F3;
    background: -webkit-linear-gradient(top, #F8F8F8, #F1F1F1);
    background: -moz-linear-gradient(top, #F8F8F8, #F1F1F1);
    background: -ms-linear-gradient(top, #F8F8F8, #F1F1F1);
    background: -o-linear-gradient(top, #F8F8F8, #F1F1F1);
}

button.blue, .button.blue {
    border: 1px solid #3079ED !important;
    background: #4B8DF8;
    background: -webkit-linear-gradient(top, #4C8FFD, #4787ED);
    background: -moz-linear-gradient(top, #4C8FFD, #4787ED);
    background: -ms-linear-gradient(top, #4C8FFD, #4787ED);
    background: -o-linear-gradient(top, #4C8FFD, #4787ED);
    -webkit-transition: border .20s;
    -moz-transition: border .20s;
    -o-transition: border .20s;
    transition: border .20s;
}

button.blue:hover, .button.blue:hover {
    border: 1px solid #2F5BB7 !important;
    background: #3F83F1;
    background: -webkit-linear-gradient(top, #4D90FE, #357AE8);
    background: -moz-linear-gradient(top, #4D90FE, #357AE8);
    background: -ms-linear-gradient(top, #4D90FE, #357AE8);
    background: -o-linear-gradient(top, #4D90FE, #357AE8);
}

button.action:hover, .button.action:hover {
    -moz-box-shadow: 0 1px 0px #DDD;
    -webkit-box-shadow: 0 1px 0px #DDD;
    box-shadow: iset 0 1px 0px #DDD;
}

button.action:active, .button.action:active {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border-color: #C6C6C6 !important;
}

button.blue:active, .button.blue:active {
    border-color: #2F5BB7 !important;
}

button.green:active, .button.green:active {
    border-color: #2D6200 !important;
}

button.red:active, .button.red:active {
    border-color: #B0281A !important;
}
</style>
</head>

<body>
<?php

$invoicesId = $_GET['invoice'];

//  $outletid_list = '8,36,194,68';
//  var_dump($invoicesId);
$outletid_arr = explode(',', $invoicesId);


foreach ($outletid_arr as $id) {
    //   echo "$id </br>";

    if (is_numeric($id)) {

        $getDate = getdate(time());

        $currentDayName = $getDate['weekday'];

        $arrayOfOutletsID = getOutletIdsForCurrentDay($currentDayName);

        $invoicesId = $id;

        if (isset ($_GET['invoiceno'])) {
            $invoiceref = $_GET['invoiceno']; // When viewing past history invoice - bug fixed - Hyder - 07 oct 2012
        } else {
            $invoiceref = date("dmyGi") . $invoicesId; // generate invoice ref by using todays date and outletid
        }

        $nums = countInvoices($arrayOfOutletsID);
        // var_dump($arrayOfOutletsID);
        // $nums = 3;

        $perPage = 1;
        $pagination = new sitePagination($invoicesId, $perPage, $nums);

        $routeID = getRouteIdByOutletId($invoicesId);
        ?>

        <table border="0" width="700" cellpadding="5" cellspacing="0" align="center">
        <tr>
            <td class="firstBorder" valign="top">
                <table border="0" cellpadding="0" width="200" cellspacing="0">
                    <tr>
                        <td>
                            <strong><?php echo $ini_array[mdc_details][mdc]; ?></strong><br/>
                            <?php echo $ini_array[mdc_details][region]; ?><br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border="0" cellpadding="0" width="200" cellspacing="0">
                                <tr>
                                    <td>Tel no.</td>
                                    <td>: <?php echo $ini_array[mdc_details][tel]; ?> </td>
                                </tr>
                                <!--                             <tr> -->
                                <!--                                 <td></td> -->
                                <!--                                 <td>: +230 7362507</td>                    -->
                                <!--                             </tr> -->

                            </table>
                        </td>

                        <td>
                            <table border="0" cellpadding="0" width="200" cellspacing="0">
                                <tr>
                                    <td colspan="2" align="right"><strong>VAT Invoice</strong></td>
                                </tr>
                                <tr>
                                    <td align="right">VAT Reg No.</td>
                                    <td align="right">: <?php echo $ini_array[mdc_details][vat_no]; ?></td>
                                </tr>
                                <tr>
                                    <td align="right">Business Reg No.</td>
                                    <td align="right">: <?php echo $ini_array[mdc_details][business_reg_no]; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <td valign="top" class="logoWithoutBorder">
                <img src="../image/logo.png" alt="Phoenix"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="removeSomePadding">
                <?php
                //   $invoiceTo = getOuletInformation($routeID);
                $invoiceTo = getOutletDetails($invoicesId); //added by hyder

                if (!empty($invoiceTo)):
                    ?>
                    <table border="0" width="100%" cellpadding="5" cellspacing="0">
                        <tr>
                            <td class="theBorder">
                                <table border="0" cellpadding="1" cellspacing="0">
                                    <tr>
                                        <td>INVOICE TO</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $invoiceTo->contact_person_name; ?> <br/>
                                            <?php echo $invoiceTo->outletname; ?><br/>
                                            <?php echo $invoiceTo->street . ',' . $invoiceTo->town_village; ?> <br/>
                                            BRN: <?php echo $invoiceTo->businessregistrationno; ?>   <br/>
                                            Tel :  <?php if ($invoiceTo->owner_homenum != '0') {
                                                echo $invoiceTo->owner_homenum;
                                            }; ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="theBorder">
                                <table border="0" cellpadding="1" cellspacing="0">
                                    <tr>
                                        <td>DELIVERED TO</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php
                                            //  $invoiceTo = getOuletInformation($routeID);
                                            $invoiceTo = getOutletDetails($invoicesId); //added by hyder
                                            $termsType = getTermsType($invoiceTo->id);
                                            ?>

                                            <?php echo $invoiceTo->contact_person_name; ?><br/>
                                            <?php echo $invoiceTo->outletname; ?><br/>
                                            <?php echo $invoiceTo->street . ',' . $invoiceTo->town_village; ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="removeSomePadding">
                <table border="0" width="100%" cellpadding="5" cellspacing="0" class="addBorder">
                    <tr>
                        <th>DATE</th>
                        <td> <?php echo date('d/m/y', time()); ?></td>
                        <th>ACC No.</th>
                        <td><?php echo !empty($invoiceTo->acc_no) ? $invoiceTo->acc_no : ''; ?></td>
                        <th>TERMS</th>
                        <td><?php echo !empty($termsType) ? ucfirst($termsType) : ''; ?></td>
                        <th>INV. REF.</th>
                        <td><?php echo $invoiceref; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="removeSomePadding">
                <table border="0" width="100%" cellpadding="5" cellspacing="0" class="lister">
                    <tr>
                        <th bgcolor="#cccccc">CODE</th>
                        <th bgcolor="#cccccc">DESCRIPTION</th>
                        <th bgcolor="#cccccc">QUANTITY</th>
                        <th bgcolor="#cccccc">UNIT PRICE</th>
                        <th bgcolor="#cccccc">DISCOUNT</th>
                        <th bgcolor="#cccccc" class="last">AMOUNT</th>
                    </tr>
                    <?php

                        $subTotal         = 0;
                        $discountPricePct = 0;
                        $discount         = 0;
                        $total_price_vat  = 0;
                        $total_cases      = 0; // Issue #5 - Hyder - 20 Aug 2014
                        $grand_discount   = 0;

                        $product_arr = array();

                        foreach (generateInvoice($invoicesId, $invoiceref) as $key => $invoices):

                            $product_arr[] = $invoices->productcode;
                            $price_per_pack = $invoices->QtyOrdered / $invoices->packno;
                            $discount_type  = $invoices->discount_type;
                            $price          = $invoices->price * $price_per_pack;
                            $final_price    = 0;
                            if ($discount_type == 'percentage') {
                                $discount_value         = $invoices->discount_value;
                                $discount_value_display = $discount_value . ' %';
                                $discount_price         = $price * $discount_value / 100;
                                $final_price            = $price - $discount_price;
                                $grand_discount         = $grand_discount + $discount_price;
                            } elseif ($discount_type == 'absolute') {
                                $discount_value = $invoices->discount_value;
                                $discount_value_display = 'Rs ' . $discount_value;
                                $final_price            = ($invoices->price - $discount_value) * $price_per_pack;

                                $grand_discount         = $grand_discount + $discount_value;
                            } else {
                                $discount_value         = '-';
                                $final_price            = $price;
                                $discount_value_display = $discount_value;
                            }

                            // $thePrice             = number_format($invoices->price,2) * $price_per_pack;
                            // $subTotal            += number_format($invoices->price,2) * $price_per_pack;

                            //  $thePrice = $invoices->price * $price_per_pack;
                            //  $subTotal += $invoices->price * $price_per_pack;
                            $subTotal += $final_price;
                            #########################################################################
                            if ($invoices->packagingtype == 'Empties') { // Hyder - Exclude vat from crates - 12-12-2013  - #Issue 34
                                $total_price_vat = $total_price_vat + $final_price;

                            } else {
                                $total_price_vat = $total_price_vat + $final_price * VAT_VALUE;

                            }
                            #########################################################################




                            #####################################################################
                            # Fix : Link an invoice with an order - START - Hyder - 04 oct 2012##
                            #####################################################################
                            //check if order is linked to this invoice , if yes , skip , else , update colum in orderdelivery

                            $OutletOrderDeliveryid = $invoices->OutletOrderDeliveryid;

                            link_invoice_to_order($OutletOrderDeliveryid, $invoiceref);

                            #####################################################################
                            # Fix : Link an invoice with an order - END - Hyder - 04 oct 2012##
                            #####################################################################
                            ?>
                            <tr>
                                <td align="center"><?php echo $invoices->productcode; ?></td>
                                <td><?php echo $invoices->productname; ?> <?php if ($invoices->price == '0') {
                                        echo '(Free)';
                                    } ?></td>
                                <td align="center"><?php echo number_format($price_per_pack, 2); ?></td>
                                <td align="right"><?php echo number_format($invoices->price, 2); ?></td>
                                <td align="right"><?php echo $discount_value_display; ?></td>
                                <td class="last" align="right"><?php echo $final_price; ?></td>
                            </tr>

                            <?php // Issue #5 - 20 August 2014 - Hyder
                            $total_cases += $price_per_pack; ?>
                        <?php endforeach; ?>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right" class="removeSomePadding">
                <table border="0" width="200" cellpadding="5" cellspacing="0" class="subs">
                    <tr>
                        <th bgcolor="#cccccc">SUB-TOTAL</th>
                        <td align="center"><?php echo number_format($subTotal, 2); ?></td>
                    </tr>
                    <tr>
                        <th bgcolor="#cccccc">DISCOUNT</th>
                        <td align="center"><?php echo number_format($grand_discount, 2); ?></td>
                    </tr>

                    <tr>
                        <th bgcolor="#cccccc">VAT</th>
                        <td align="center"><?php    $vat = $total_price_vat - $subTotal;

                                echo number_format($vat, 2);
                            ?></td>
                    </tr>

                    <tr>
                        <th bgcolor="#cccccc">TOTAL</th>
                        <td align="center">
                            <?php
                                $db_grand_tot = $total_price_vat;
                                echo number_format($total_price_vat, 2); //number_format( $total,2);
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th class="last" bgcolor="#cccccc">TOTAL CASES</th>
                        <td align="center" class="last"> <?php echo number_format($total_cases, 2);; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        </table>

        <div class="center" style="margin-left:5.2%">EMPTIES BILLED</div>

        <table border="0" width="700" cellpadding="0" cellspacing="0" align="center">
            <tr>
                <td>
                    <table border="0" width="100%" cellpadding="5" cellspacing="0" class="lister emptiestbl">
                        <tr>
                            <th bgcolor="#cccccc">CODE</th>
                            <th bgcolor="#cccccc">DESCRIPTION</th>
                            <th bgcolor="#cccccc">QUANTITY</th>
                            <th bgcolor="#cccccc">UNIT PRICE</th>
                            <th bgcolor="#cccccc" class="last">AMOUNT</th>
                        </tr>
                        <?php

                        $sub_total = 0;

                        foreach (generateInvoiceEmpties($invoicesId) as $key => $val):
                            $sub_total += $val->price * $val->QtyDelivered;
                            ?>
                            <tr>
                                <td><?php echo $val->EmptiesID; ?></td>
                                <td><?php echo $val->description; ?></td>
                                <td align="center"><?php echo $val->QtyDelivered; ?></td>
                                <td align="right"><?php echo number_format($val->price, 2); ?></td>
                                <td class="last"
                                    align="right"><?php echo number_format($val->price * $val->QtyDelivered, 2); ?></td>
                            </tr>
                        <?php endforeach; ?>



                        <tr>
                            <td></td>
                            <td></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td class="last" align="right"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td class="last" align="right"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td class="last" align="right"></td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right" class="removeSomePadding">
                    <table border="0" width="250" cellpadding="5" cellspacing="0" class="subs">
                        <tr>
                            <th bgcolor="#cccccc">SUB-TOTAL</th>
                            <td align="center"><?php echo number_format($sub_total, 2); ?></td>
                        </tr>
                        <tr>
                            <th class="last" bgcolor="#cccccc">TOTAL AMOUNT PAYABLE</th>
                            <td align="center"><?php echo $grand_tot; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table border="0" width="700" cellpadding="0" cellspacing="0" style="margin-top:15px" align="center">
            <tr>
                <td><strong>Checques should be crossed and made payable
                        to <?php echo $ini_array[mdc_details] [mdc]; ?></strong></td>
            </tr>
            <tr>
                <td>
                    <table border="0" width="200" cellpadding="5" cellspacing="0"
                           style="margin-top:15px;border:1px solid #cccccc;">
                        <tr>
                            <td bgcolor="#cccccc">RECEIVED BY</td>
                            <td bgcolor="#cccccc" align="right">SIGNATURE</td>
                        </tr>
                        <tr>
                            <td colspan="2" height="50">&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td align="right" valign="bottom">
                    <table border="0" width="250" cellpadding="5" cellspacing="0" style="border:1px solid #cccccc;">
                        <tr>
                            <td align="center" bgcolor="#cccccc">PAGE NUMBER</td>
                            <td width="100">&nbsp;</td>
                        </tr>


                    </table>

                    <table border="0" width="250" cellpadding="5" cellspacing="0">
                        <tr>
                            <td align="center"></td>
                            <td width="100">
                                <button onClick="window.print()" class="action blue right"
                                        style="margin-left: 230px;width: 70px;font-weight: 600;" id="create_route"><span
                                        class="label">Print</span></button>
                            </td>
                        </tr>


                    </table>
                </td>
            </tr>
        </table>

        <div style="page-break-before: always;"></div>

        <div class="pagination">
            <?php

            if ($pagination->previousPageExists()) {
                $previouspageid = $pagination->previousPage();
                if ($previouspageid) {

                    // echo '<a id="x" class="prev" href="invoice.php?invoice='.$previouspageid.'">&lt;&lt; Prev</a>';
                }
            } else {
                //  echo '<a id="x" class="prev" href="javascript:void(0);">&lt;&lt; Prev</a>';
            }
            ?>

            <?php

            if ($pagination->nextPageExists()) {
                $nextpageid = $pagination->nextPage();
                if ($nextpageid) {

                    //  echo '<a class="next" href="invoice.php?invoice='.$nextpageid.'">Next &gt;&gt;</a>';
                }
            } else {
                //  echo '<a id="x" class="next" href="javascript:void(0);">Next &gt;&gt;</a>';
            }


            if (!isset ($_GET['action'])) {

                if (check_duplicate_invoice($invoiceref)) { //return true - means new invoice , false - invoice already generated for today

                    if (!empty($product_arr)) { // make sure we have  products in the invoice before generating it - Hyder -


                        generate_invoice($invoicesId, $invoiceref, $db_grand_tot, $discount, $vat); // save the discount seperately for report generation later

                        unset ($db_grand_tot);
                    }

                } else {
                    //echo 'Fatal Error : Invoice already generated for today';
                }

            }


            ?>

            <!--  <a class="all" href="invoice-all.php">View All</a>-->
        </div>
    <?php
    }
}
?>
</body>
</html>