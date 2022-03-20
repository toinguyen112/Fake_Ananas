<!-- header -->
<?php
    include '../lib/session.php';
    Session::checkSession();    //,Kiểm tra admin có tồn tại ko kiểm tra sợ người dùng vào thẳng index
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


<?php include '../classes/cart.php';?>

<?php
    $ct = new cart();
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Liệt kê sản phẩm</h2>
        <div class="block"> 
        
        	
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên hàng hóa</th>
                    <th>Hình</th>
					<th>Giá</th>
					<th>Số Lượng</th>
					
					
				</tr>
			</thead>
			
			<tbody>
				<?php
			
				$getAll = $ct->getAll();
				if($getAll){
					$i = 0;
					while($result = $getAll->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX ">
					<td><?php echo $i ?></td>
					<td><?php echo $result['TenHH'] ?></td>
                    <td><img src="uploads/<?php echo $result['Hinh'] ?>" width="80"></td>
					<td><?php echo number_format($result['Gia'],0,',','.')." "."VND"?></td>
					<td class="amount-product"><?php echo $result['SoLuongHang'] ?></td>
					
					
				</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>

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