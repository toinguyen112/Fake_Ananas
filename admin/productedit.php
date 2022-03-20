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



<?php include '../classes/product.php';?>
<?php
//ipdate product
    $pd = new product();

    if(!isset($_GET['mshh']) || $_GET['mshh']==NULL){
       echo "<script>window.location ='productlist.php'</script>";
    }else{
         $id = $_GET['mshh']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updateProduct = $pd->update_product($_POST,$_FILES, $id);
        
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">    
         <?php

                if(isset($updateProduct)){
                    echo $updateProduct;
                }

            ?>        
        <?php
         $get_product_by_id = $pd->getproductbyId($id);
            if($get_product_by_id){
                while($result_product = $get_product_by_id->fetch_assoc()){
        ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
            <tr>
                    <td>
                        <label>Tên hàng hóa</label>
                    </td>
                    <td>
                        <input type="text" name="TenHH" value="<?php echo $result_product['TenHH'] ?>"  class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="Gia" value="<?php echo $result_product['Gia'] ?>"  class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Số Lượng</label>
                    </td>
                    <td>
                        <input type="text" name="SoLuongHang" value="<?php echo $result_product['SoLuongHang'] ?>"  class="medium" />
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Ghi chú</label>
                    </td>
                    <td>
                        <textarea name="GhiChu"  style = "width : 573px;height: 100px;">
                        <?php echo $result_product['GhiChu'] ?>
                        </textarea>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Màu</label>
                    </td>
                    <td>
                        <input type="text" name="Mau" value="<?php echo $result_product['Mau'] ?>"  class="medium" />
                    </td>
                </tr>
				
            
                <tr>
                    <td>
                        <label>Hình</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_product['Hinh'] ?>" width="90"><br>
                        <input type="file" name="Hinh" />
                    </td>
                </tr> 
               


				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
        }

        }
            ?>
        </div>
    </div>
</div>



<!-- footer -->


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



