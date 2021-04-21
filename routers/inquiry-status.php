<?php
include '../includes/connect.php';
include '../includes/wallet.php';
$status = $_POST['status'];
$ticket_id = $_POST['inquiry_id'];
$sql = "UPDATE inquiry SET status = '$status' WHERE id = $inquiry_id;";
$con->query($sql);
header("location: ../allinquiry.php?id=".$inquiry_id);
?>