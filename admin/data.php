<?php

require_once("Model/database.php");
$db = new database;
$db->connect();

$idtheloai_con = $_POST['id'];
$tblTable_con = "tbltheloaiconsanpham_menu";
	// $data = $db->getID($tblTable_con, $idtheloai_con);

$data = $db->getIDDanhMucCon($tblTable_con, $idtheloai_con);

if($data > 0){
	$stt =1;
	foreach($data as $rel){
		$idtheloai = $rel['idtheloai'];
		$tblTable = "tbltheloaisanpham_menu";

		$result_theloai = $db->getID($tblTable,$idtheloai);

		?>
		<tr>
			<td><?php echo $stt; ?></td>
			<td><?php echo $rel['txttendanhmuccon']; ?></td>
			<td><?php echo $result_theloai['txtten']; ?></td>
			<td><?php if($rel['txttrangthai']==1){
				echo "Hiện";
			}else{
				echo "Ẩn";
			}

			?></td>
			<td><a onclick="return confirm('Bạn có chắc chẵn muốn sửa không ?')" href="index.php?controller=quan-ly-menu-sanpham&action=edit-product-baby&id=<?php echo $rel['id']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
			<td><a  onclick="return confirm('Bạn có chắc chẵn muốn xóa không ?')" href="index.php?controller=quan-ly-menu-sanpham&action=delete-product-baby&id=<?php echo $rel['id']; ?>" title="Xóa"><i class="fa fa-times" aria-hidden="true"></i></a></td>
		</tr>
		<?php
		$stt++;
	}
}
else{
	echo "Không có danh mục con nào .";
}

if($idtheloai_con == 0){
	$tblTable = 'tbltheloaiconsanpham_menu';
	$data = $db->showlist($tblTable);
	$stt = 1;
	foreach($data as $rel){

		$idtheloai = $rel['idtheloai'];
		$tblTable = "tbltheloaisanpham_menu";

		$result_theloai = $db->getID($tblTable,$idtheloai);

		?>
		<tr>
			<td><?php echo $stt; ?></td>
			<td><?php echo $rel['txttendanhmuccon']; ?></td>
			<td><?php echo $result_theloai['txtten']; ?></td>
			<td><?php if($rel['txttrangthai']==1){
				echo "Hiện";
			}else{
				echo "Ẩn";
			}

			?></td>
			<td><a onclick="return confirm('Bạn có chắc chẵn muốn sửa không ?')" href="index.php?controller=quan-ly-menu-sanpham&action=edit-product-baby&id=<?php echo $rel['id']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
			<td><a  onclick="return confirm('Bạn có chắc chẵn muốn xóa không ?')" href="index.php?controller=quan-ly-menu-sanpham&action=delete-product-baby&id=<?php echo $rel['id']; ?>" title="Xóa"><i class="fa fa-times" aria-hidden="true"></i></a></td>
		</tr>
		<?php
		$stt++;
	}
}

?>