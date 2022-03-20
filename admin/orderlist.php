<!-- header -->
<?php
    include '../lib/session.php';
    Session::checkSession();   
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
   

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
               
				<div class="floatleft middle">
					<h1>ThanhToi-Shop</h1>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                       
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <!-- lấy tên -->
                            <li><?php echo Session::get('adminName') ?></li>
                        
                            <?php
                            //dùng log out
                            if(isset($_GET['action']) && $_GET['action']=='logout'){
                                Session::destroy();
                            }
                            ?>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>

<!-- sidebar -->
<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
             
                <li><a class="menuitem">Sản phẩm</a>
                    <ul class="submenu">
                        <li><a href="productlist.php">Liệt kê sản phẩm</a> </li>
                        <li><a href="productadd.php">Thêm sản phẩm</a> </li>
                    </ul>
                </li>

                <li><a class="menuitem">Đơn hàng</a>
                        <ul class="submenu">
                            <li><a href="orderlist.php">Liệt kê đơn hàng</a></li>
                        </ul>    
                </li>

                
              
                
            </ul>
        </div>
    </div>
</div>

<?php include '../classes/order.php';?>
<?php include '../classes/address.php';?>
<?php
    $od = new order();
    $ad = new address();
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Liệt kê đơn hàng</h2>
        <div class="block"> 
        
        	<!-- dat hang -->
            <h3 class="label-order">ĐƠN HÀNG</h3>
            <table class="order_list">
			<thead>
				<tr>
					<th class="order_list-th">ID</th>
					<th class="order_list-th">Mã khách hàng</th>
					<th class="order_list-th">Ngày đặt hàng</th>
					<th class="order_list-th">Ngày giao hàng</th>
					
				</tr>
			</thead>
			
			<tbody>
				<?php
			
				$odlist = $od->show_order();
				if($odlist){
					$i = 0;
					while($result = $odlist->fetch_assoc()){
						$i++;
				?>
				<tr class="order_list_body">
					<td class="order_list-td"><?php echo $i ?></td>
					<td class="order_list-td"><?php echo $result['MSKH'] ?></td>
					<td class="order_list-td"><?php echo $result['NgayDH']?></td>
					<td class="order_list-td"><?php echo $result['NgayGH'] ?></td>
					
				</tr>
				<?php
					}
				}
               
				?>
			</tbody>
		</table>

        <!-- dia chi -->
        <h3 class="label-order">ĐỊA CHỈ<h3>    
        <table class="order_list">
			<thead>
				<tr>
					<th class="order_list-th">Mã khách hàng</th>
					<th class="order_list-th">Địa chỉ</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
			
				$getAddress = $ad->getAddress();
				if($getAddress){
					$i = 0;
					while($result = $getAddress->fetch_assoc()){
						
				?>
				<tr class="order_list_body">
					<td class="order_list-td"><?php echo $result['MSKH'] ?></td>
					<td class="order_list-td"><?php echo $result['DiaChi']?></td>
					
				</tr>
				<?php
					}
				}
               
				?>
			</tbody>
		</table>

        <!-- qua chi tiet dat hang -->
        <a class="btn-hover btn-detail-order" href="detail_orderlist.php">CHI TIẾT CÁC ĐƠN HÀNG</a>

       </div>
    </div>
</div>





<!--footer  -->
<div class="clear">
        </div>
        </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
          Copyright &copy; 2020 ThanhToi-Shop
        </p>
    </div>
</div>
</body>
</html>