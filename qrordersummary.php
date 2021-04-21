<?php
require_once 'phpqrcode/qrlib.php';
require 'includes/connect.php';
include 'includes/wallet.php';

if(isset($_GET['status'])){
    $status = $_GET['status'];
}
else{
    $status = '%';
}
$id = $_POST['id'];
$sql = mysqli_query($con, "SELECT * FROM orders WHERE customer_id = $user_id AND id=$id;");
while($row = mysqli_fetch_array($sql))
					{
                        $status = $row['status'];
                        $id = $row['id'];
                        $date = $row['date'];
                        $payment_type = $row['payment_type'];
                        $address = $row['address']; 
                        $total = $row['total'];
                        $description = $row['description'];

                    }

$path = 'qrcodeimage/';
$file = $path.uniqid().".png";

$text ="ID: $id";
$text .= " ";
$text .= "Date: $date";
$text .= " ";
$text .= "Payment type: $payment_type";
$text .=" ";
$text .="Address: $address";
$text .=" ";
$text .= "Status: $status";
$text .= " ";
$text .="Note: $description";
$text .=" ";
$text .="Total: $total";



QRcode::png($text,$file,'L',10,2);
echo "<center><img src='".$file."'><center>";


