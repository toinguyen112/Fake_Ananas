<?php include 'inc/header.php'?>

<?php
if(isset($_GET['giohangId'])){
        $giohangId = $_GET['giohangId']; 
        $delcart = $ct->del_cart($giohangId);
    }
?>	
<?php
if(isset($_GET['sIdforAll'])){
	$delete_all = $ct->delete_all_cart();
}
?>

 <?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?> 


	<div class="container-fluid main-cart">
		<div class="row row-cart">
			<div class="column-8  test-8">
				<div class="row">
					<div class="cart-heading">GIỎ HÀNG</div>
					<div class="allCart">

						<?php
							$getCart = $ct->get_product_cart();
							if($getCart){
								$total  = 0;
								$count = 0;
								$subtotal = 0;
								$sIdnew = 0;
								$giamgia = 0;
								while($result = $getCart->fetch_assoc()){
					
						?>

						<div class="product-infor">
							<div class="media">
								<div class="media-left">
									<img src="admin/uploads/<?php echo $result['Hinh']?>" alt="" class="media-left--img">
								</div>
								<div class="media-right">
									<div class="media-right--name"><?php echo $result['TenHH']?></div>
									<div class="media-right-price"><span class="media-right-price--text" >Giá:</span> <?php echo number_format($result['Gia'],0,',','.')?> VND</div>
								</div>
							</div>
							<div class="product-right">
								<div class="product-price">
								<?php
								$total = $result['Gia']*$result['SoLuongHang'];
								 echo number_format($total,0,',','.')." "."VND"?></div>
								<div class="status">Còn hàng</div>
								<div class="product-button">
									
									<a href="?giohangId=<?php echo $result['giohangId']?>" class="product-button--link">
									<i class="fas fa-trash-alt product-bottom--trash"></i>
									</a>
								</div>
							</div>
						</div>
						<?php
								$subtotal = $subtotal + $total;
								$count = $count + 1;
								Session::set('sIdnew',$result['sId']);
								$giamgia = $result['giamgia'];
								}
							}
						?>
						



					</div>

					<div class="clearandback">
						<?php
							$sIdnew = Session::get("sIdnew");	//lấy sId để xóa hết
						?>
						<a href="?sIdforAll=<?php echo $sIdnew?>" class="clearAll">XÓA HẾT</a>
						<a href="index.php" class="backpage">QUAY LẠI MUA HÀNG</a>
					</div>
				</div>
			</div>

			<div class="grid__column-4">
				<div class="row  test-4">
					<div class="list-group">
						<div class="list-group-title">ĐƠN HÀNG</div>
						<div class="app_container_left-divider"></div>

						<?php
								$check_cart = $ct->check_cart();
								if($check_cart){								
							?>
						<div class="list-group-text1">
							<span class="text1-left">
								Đơn hàng
							</span>
							<span class="text1-right">
								<?php
									echo number_format($subtotal,0,',','.')." "."VND";
									Session::set('count',$count);	//đếm xong soluong sp, sau đó set vào biến count
								?>
							</span>
						</div>

						<div class="list-group-text1">
							<span class="text2-left">
								Giảm
							</span>
							<span class="text2-right">
								<?php echo $giamgia." "."%";?>
							</span>
						</div>

						<div class="listAll_divider list-space"></div>

						<div class="list-group-total">
							<span class="list-group-total--left">TẠM TÍNH</span>
							<span class="list-group-total--right">
							<?php
									$discount = $subtotal - $subtotal*($giamgia/100);
									echo number_format($discount,0,',','.')." "."VND";
							?>
							</span>
						</div>
						<?php
								}else{
									echo '
							<div class="list-group-text1">
							<span class="text1-left">
								Đơn hàng
							</span>
							<span class="text1-right">
								0 VND
							</span>
							</div>

						<div class="list-group-text1">
							<span class="text2-left">
								Giảm
							</span>
							<span class="text2-right">
								0%
							</span>
						</div>

						<div class="listAll_divider list-space"></div>

						<div class="list-group-total">
							<span class="list-group-total--left">TẠM TÍNH</span>
							<span class="list-group-total--right">
							0 VND
							</span>
						</div>';
							}
						?>

						<div class="list-group-nextpay">
							<!-- lấy sId để gửi qua thanh toán -->
							<a class="nextpay-btn" href="pay.php?sId =<?php echo $sIdnew?>">
								TIẾP TỤC THANH TOÁN
							</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	


<?php include 'inc/footer.php'?>