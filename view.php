<?php
require_once('includes/load.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
$db->query("UPDATE comments SET `status` = 'read' WHERE id='$id'");
header("location: message.php");
}
$session->msg()
?>