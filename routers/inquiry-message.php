<?php
include '../includes/connect.php';
include '../includes/wallet.php';
$message = htmlspecialchars($_POST['message']);
$ticket_id = $_POST['inquiry_id'];
if{
	$sql = "UPDATE inquiry SET status = 'Open' WHERE id=$inquiry_id;";
	$con->query($sql);	
}
if($message != ''){
	$sql = "INSERT INTO inquiry_details (inquiry_id, user_id, description) VALUES ($inquiry_id, $user_id, '$message')";
	$con->query($sql);
}
header("location: ../allinquiry.php?id=".$inquiry_id);
?>