<?php
require_once('Model/database.php');
$db = new database;
$db->connect();

if(isset($_GET['MaDDH'])){
	$id = $_GET['MaDDH'];
	$sql="UPDATE dondathang set DaThanhToan=1 where MaDDH=$id";
	$db->update($sql);
	header('location: index.php?controller=don-hang&action=danh-sach-don-hang');
}
else{
	header('location: index.php?controller=don-hang&action=danh-sach-don-hang');
}

?>