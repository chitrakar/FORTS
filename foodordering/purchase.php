<style type="text/css">
    body,
    table,
    td,
    a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    table,
    td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }

    img {
        -ms-interpolation-mode: bicubic;
    }

    img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
    }

    table {
        border-collapse: collapse !important;
    }

    body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }

    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    @media screen and (max-width: 480px) {
        .mobile-hide {
            display: none !important;
        }

        .mobile-center {
            text-align: center !important;
        }
    }

    div[style*="margin: 16px 0;"] {
        margin: 0 !important;
    }
</style>
<?php
define('location', '#');
define('navbar_position', '');
include('includes/header.php');
if (!isset($_SESSION['email'])) {
    redirect('index.php');
}
$uid = $_SESSION['uid'];
// $lat = $_GET['lat'];
// $long = $_GET['long'];
$totalset = $_GET['total'];

$sql1 = "INSERT INTO purchase(customerId,total,date_purchase) VALUES('$uid','$totalset',NOW());";
$result1 = query($sql1);
$sql2 = "SELECT * FROM purchase ORDER BY date_purchase DESC LIMIT 1;";
$result2 = query($sql2);


$sql = "SELECT DISTINCT cart.pid, cart.quantity, items.name, items.price FROM cart LEFT JOIN items ON cart.pid=items.pid WHERE customerId = '$uid';";
$result = query($sql);
if (num_rows($result) > 0) {
    while ($row = fetch_array($result)) {
        $pid = $row['pid'];
        $qty = $row['quantity'];
        $price = $row['price'];

        if (num_rows($result2) > 0) {
            while ($row = fetch_array($result2)) {
                $purchase_id = $row['purchaseid'];
            }
        }

        $sql4 = "INSERT INTO purchase_details(item_id, quantity, purchaseId) VALUES('$pid','$qty','$purchase_id');";
        $result3 = query($sql4);
    }
}

$sql2 = "DELETE FROM cart WHERE customerId='$uid'";
$result2 = query($sql2);
// $link = "index..php?total=".$totalset;
// redirect($link);
?>

<table align="center" border="1" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
    <tr>
        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Thank You For Your Order! </h2>
        </td>
    </tr>
    <tr>
        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"> Your order will be ready for the specified time</p>
        </td>
    </tr>
</table>