<?php
require_once('Model/database.php');
$db = new database;
$db->connect();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $error = array();

    if(empty($_POST['txttendangnhap'] == 0)){
        $error[] = 'tendangnhap';
    }
    else{
        $txttendangnhap = $_POST['txttendangnhap'];
    }
    

    if(empty($_POST['txtemail'] == 0)){
        $error[] = 'email';
    }
    else{
        $txtemail = $_POST['txtemail'];
    }

    if(empty($_POST['txtmatkhau'] == 0)){
        $error[] = 'matkhau';
    }
    else{
        $txtmatkhau = $_POST['txtmatkhau'];
    }

    if($_POST['txtphanquyen'] == 0){
        $error[] = 'phanquyen';
    }
    else{
        $txtphanquyen = $_POST['txtphanquyen'];
    }
    if(isset($txttendangnhap) && isset($txtemail) && isset($txtmatkhau) && isset($txtphanquyen)){
            $sql_insert = "INSERT INTO tblthanhvien(user,email,pass,roleId)VALUES('$txttendangnhap','$txtemail', '$txtmatkhau', $txtphanquyen)";
            $db->add($sql_insert);
            header('location: index.php?controller=thanh-vien&action=danh-sach-thanh-vien');
    }else{
        header('location: index.php?controller=thanh-vien&action=them-thanh-vien');
    }
}

?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Bảng điều khiển</a>
            </li>
            <li class="breadcrumb-item"><a  href="index.php?location: index.php?controller=thanh-vien&action=danh-sach-thanh-vien">Thêm mới thành viên</a></li>

        </ol>
        <div class="row">
            <div class="col-12">
                <form action="index.php?controller=thanh-vien&action=them-thanh-vien" method="POST" role="form" enctype="multipart/form-data">
                    <legend>Thêm mới thành viên</legend>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Tên đăng nhập (*)</label>
                            <input type="text" class="form-control" name="txttendangnhap" id="" placeholder="Tên đăng nhập">
                            <?php
                            if(isset($error)&&in_array('txttendangnhap', $error)){
                                echo "<p class='loinhap'>Bạn cần nhập tên đăng nhập !</p>";
                            }
                            ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Email (*)</label>
                            <input type="text" class="form-control" name="txtemail" id="" placeholder="Email">
                            <?php
                            if(isset($error)&&in_array('txtemail', $error)){
                                echo "<p class='loinhap'>Bạn cần nhập địa chỉ email !</p>";
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="">Mật khẩu (*)</label>
                            <input type="text" class="form-control" name="txtmatkhau" id="" placeholder="Mật khẩu">
                            <?php
                            if(isset($error)&&in_array('txtmatkhau', $error)){
                                echo "<p class='loinhap'>Bạn cần nhập mật khẩu !</p>";
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn quyền</label>
                            <select name="txtphanquyen" class="form-control loaitin" id="">
                                <option value="0">-- Phân quyền --</option>
                                <option value="1">Admin</option>  
                                <option value="2">User</option>  
                            </select>
                        </div>

                    </div>

                    

                    <div class="col-md-12">
                        <button type="submit" class="btn" name="submit">Thêm thành viên</button>
                    </form>
                    <div class="luuy">
                        <p><b>Lưu ý : </b><i>Các trường có dấu (*) đều không được để trống !</i></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>