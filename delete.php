<?php
require_once('includes/load.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
$db->query("DELETE FROM comments WHERE id='$id'");
header("location: message.php");
}
$session->msg()
?>