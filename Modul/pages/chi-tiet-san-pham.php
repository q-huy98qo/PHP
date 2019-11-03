<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$tblTable = "sanphampost";
	$data = $db->getID($tblTable, $id);
	

    //cập nhật số lượt xem của sản phẩm ,hiếu fix
	$tencot = "luotxem";
	$db->SoLanXem($tblTable, $tencot, $id);

?>
<div class="info-title-product"><h3>Thông tin sản phẩm</h3></div>
<div class="product-image">
	<div class="hinhanh-product">
		<img src="admin/<?php echo $data['hinhanh']; ?>" alt="hinhanh" class="img-fluid">
	</div>
	<div class="thongtin-product">
		<h3><?php echo $data['tensanpham']; ?></h3>
		<span><i>Mô tả : </i></span>
		<p><?php echo $data['mota']; ?></p>
		<p><i>Số lượt xem : </i><?php echo $data['luotxem']; ?></p>
		<div class="add-product">
			<a href="index.php?controller=them-gio-hang&id=<?php echo $data['id']; ?>" title="Mua hàng" class="mua-ngay"><img src="image/icon/mua-ngay.png" alt="" class="img-fluid"></a>
			<a href="index.php?controller=them-gio-hang&id=<?php echo $data['id']; ?>" title="Thêm giỏ hàng" class="them-gio">Thêm giỏ hàng</a>
		</div>
	</div>

</div>  <!-- /product-image -->

<div class="noidung">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<!-- Nav tabs --><div class="card">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active" ><a href="#content" aria-controls="content" role="tab" data-toggle="tab" style="background-color: #f0ad4e; ">Nội dung</a></li>
									</ul>
									<!-- Tab panes -->
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="content"><?php echo $data['noidung']; ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- /noidung -->
				<?php
			}
			else{
				header('location: index.php');
			}
			?>