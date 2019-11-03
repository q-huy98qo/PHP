<?php
require_once('Model/database.php');
$db = new database;
$db->connect();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tblTable_tv = "tblthanhvien";
    $data_tv = $db->getID($tblTable_tv,$id);

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

            $sql_update = "UPDATE tblthanhvien SET user = '$txttendangnhap', email = '$txtemail', pass = '$txtmatkhau', roleId = '$txtphanquyen' WHERE id ='$id'";
            $db->update($sql_update);

            header('location: index.php?controller=thanh-vien&action=danh-sach-thanh-vien');
        }else{
            header('location: index.php?controller=thanh-vien&action=danh-sach-thanh-vien');
        }
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
            <li class="breadcrumb-item"><a  href="index.php?location: index.php?controller=thanh-vien&action=danh-sach-thanh-vien">Sửa thành viên</a></li>

        </ol>
        <div class="row">
            <div class="col-12">
                <form action="" method="POST" role="form" enctype="multipart/form-data">>
                    <legend>Thêm mới thành viên</legend>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Tên đăng nhập (*)</label>
                            <input type="text" class="form-control" name="txttendangnhap" id="" placeholder="Tên đăng nhập" value="<?php echo $data_tv['user']; ?>">
                            <?php
                            if(isset($error)&&in_array('txttendangnhap', $error)){
                                echo "<p class='loinhap'>Bạn cần nhập tên đăng nhập !</p>";
                            }
                            ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Email (*)</label>
                            <input type="text" class="form-control" name="txtemail" id="" placeholder="Email" value="<?php echo $data_tv['email']; ?>">
                            <?php
                            if(isset($error)&&in_array('txtemail', $error)){
                                echo "<p class='loinhap'>Bạn cần nhập địa chỉ email !</p>";
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="">Mật khẩu (*)</label>
                            <input type="text" class="form-control" name="txtmatkhau" id="" placeholder="Mật khẩu" value="<?php echo $data_tv['pass']; ?>">
                            <?php
                            if(isset($error)&&in_array('txtmatkhau', $error)){
                                echo "<p class='loinhap'>Bạn cần nhập mật khẩu !</p>";
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn quyền</label>
                            <select name="txtphanquyen" class="form-control loaitin" id="">
                                <?php  
                                if($data_tv['roleId'] == 1){
                                    echo "<option value='1'>Admin</option>   
                                    <option value='2'>User</option>"; 
                                }else{
                                    echo "<option value='2'>User</option>   
                                    <option value='1'>Admin</option>"; 
                                }
                                ?>
                            }
                        </select>
                    </div>

                </div>



                <div class="col-md-12">
                    <button type="submit" class="btn" name="submit">Sửa thành viên</button>
                </form>
                <div class="luuy">
                    <p><b>Lưu ý : </b><i>Các trường có dấu (*) đều không được để trống !</i></p>
                </div>
            </div>

        </div>
    </div>
</div>
</div>