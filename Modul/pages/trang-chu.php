					<?php require_once('includes/slider.php'); ?>

                   <?php 
                    $tblTable = "sanphampost"; 
		            //dinh nghia so ban ghi tren 1 trang
					$record_page = 4;			
					//tinh tong so ban ghi
					$total = $db->showlist($tblTable);
					// print_r($total);
					$dd = $db->showAllProduct($tblTable);
					$num = mysqli_num_rows($dd);
					// //dinh nghia so trang = tongsobanghi/so-ban-ghi-tren-trang
					// //tinh so trang
					$num_page = ceil($num/$record_page);
					// //xac dinh trang hien tai , page  - 1 để lấy số page đó * với limit để ra đúng tổng số product cần 
					$page = isset($_GET["page"])?($_GET["page"]-1):0;
					// //lay tu ban ghi nao
					$from = $page*$record_page;
					// //thuc hien cau truy van de lay danh sach cac ban ghi
					$data = $db->showlist_Page($tblTable,$from,$record_page);
			
                   	 ?>
					<div class="sanphammoinhat">
						<h3>Danh sách sản phẩm</h3>
						<?php
					
						foreach($data as $dt){
							?>
							<div class="item-product">
								<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $dt['id']; ?>"><img src="admin/<?php echo $dt['hinhanh']; ?>" class="img-fluid" alt=""></a>
								<div class="info-product">
									<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $dt['id']; ?>" class="tieude-product"><h5><?php echo $dt['tensanpham']; ?></h5></a>
									<p class="gia">Giá : <?php echo number_format($dt['giagoc'],0); ?>đ</p>
									<a href="index.php?controller=them-gio-hang&id=<?php echo $dt['id']; ?>" class="themgio" title="Thêm giỏ hàng">Thêm giỏ hàng</a>
								</div>
							</div>  <!-- /item-product -->
							<?php
						}
						?>

					</div> <!--  /sanphammoinhat -->
				<div class="row mt-5">
                   <div class="col text-center">
         		   <div class="block-27">
	                   	<ul >
							<li class="active"><a href="">Trang</a></li>
							<?php 
								for($i = 1; $i<= $num_page; $i++)
									{
								 ?>
									<li><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
							<?php } ?>
						</ul>
                    </div>
                </div>
                </div><!-- page phân trang -->
					<div class="sanphammoinhat">  <!-- Sản phẩm bán chạy nhất -->
						<h3>Sản phẩm nhiều lượt xem nhất</h3>

					<?php
						$tblTable = "sanphampost";
						$tencot = "luotxem";
						$data = $db->luotviewnhieu($tblTable,$tencot);

						foreach($data as $value){
					?>

						<div class="item-product">
							<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $value['id']; ?>"><img src="admin/<?php echo $value['hinhanh']; ?>" class="img-fluid" alt=""></a>
							<div class="info-product">
								<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $value['id']; ?>" class="tieude-product"><h5><?php echo $value['tensanpham']; ?></h5></a>
								<p class="gia">Giá : <?php echo number_format($value['giagoc'],0); ?>đ</p>
								<a href="index.php?controller=them-gio-hang&id=<?php echo $value['id']; ?>" class="themgio">Thêm giỏ hàng</a>
							</div>
						</div>  <!-- /item-product -->
					<?php
						}
					?>

				</div>