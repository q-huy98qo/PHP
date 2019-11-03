<?php 

	
	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}
	else{
		$action = "";
	}

	

	switch($action){
		

		case 'chi-tiet-don-hang':{
			if(isset($_GET['MaDDH'])){
				$MaDDH = $_GET['MaDDH'];
				$dataDonHang = $db->ChiTietDonDatHang($MaDDH);
			}
			include "Moduls/DonHang/chi-tiet-don-hang.php";
			break;
		}

		case 'danh-sach-don-hang':{

			$dataDonHang = $db->showOrder();
			include "Moduls/DonHang/danh-sach-don-hang.php";
			break;
		}

		case 'huy-don-hang':{

			/*$dataDonHang = $db->ChiTietDonDatHang($MaDDH);*/
			include "Moduls/DonHang/huy-don-hang.php";
			break;
		}

		case 'da-giao-hang':{

			/*$dataDonHang = $db->ChiTietDonDatHang($MaDDH);*/
			include "Moduls/DonHang/da-giao-hang.php";
			break;
		}

		default:{
			$dataDonHang = $db->showOrder();
			include "Moduls/DonHang/danh-sach-don-hang.php";
			break;
		}
	}

 ?>