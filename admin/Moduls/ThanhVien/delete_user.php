<?php
require_once('Model/database.php');
$db = new database;
$db->connect();

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$tblTable = "tblthanhvien";
	$db->delete($tblTable, $id);
	header('location: index.php?controller=thanh-vien&action=danh-sach-thanh-vien');
}
else{
	header('location: index.php?controller=thanh-vien&action=danh-sach-thanh-vien');
}

?>