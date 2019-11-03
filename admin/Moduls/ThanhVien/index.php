<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action = '';
    }

    switch ($action) {

    	case 'danh-sach-thanh-vien':{
    		require_once('Moduls/ThanhVien/list_user.php');
    		break;
    	}

        case 'xoa-thanh-vien':{
            require_once('Moduls/ThanhVien/delete_user.php');
            break;
        }

        case 'sua-thanh-vien':{
            require_once('Moduls/ThanhVien/edit_user.php');
            break;
        }

         case 'them-thanh-vien':{
            require_once('Moduls/ThanhVien/add_user.php');
            break;
        }

    	default:{
    		require_once('Moduls/ThanhVien/list_user.php');
    		break;
    	}
    }
?>