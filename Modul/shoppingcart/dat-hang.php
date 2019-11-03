<?php //include "Modul/slider.php";
if(isset($_POST['dathang'])){
	if(isset($_SESSION['cart']) && $_SESSION['cart'] !=null){
	$HoVaTen = $_POST['hovaten'];
	$SoDienThoai = $_POST['sodienthoai'];
	$DiaChi = $_POST['diachi'];
	$Email = $_POST['email'];
	$ThanhPho = $_POST['thanhpho'];
	$tongtien = 0;
	foreach($_SESSION['cart'] as $cart){
		$thanhtien = $cart['qty']*$cart['giagoc'];
		$tongtien  = $tongtien+$thanhtien;
	}
}

	if($db->XuLyDonHang($HoVaTen, $SoDienThoai, $DiaChi, $Email, $ThanhPho, $tongtien)==TRUE){

		header('location: index.php?controller=bao-cao-thanh-cong');
	}
}

?>