<?php include 'inc/header.php'?>


<?php   
    if($_SERVER['REQUEST_METHOD'] == "POST"){   // sử dụng để truy cập trang
        $soluong = $_POST['select_amount']; //lấy giá trị có name select_amount trong form
    }
?>

<?php
    if(!isset($_GET['mshh']) || $_GET['mshh']==NULL){   //lấy mshh bên index gửi qua
       echo "<script>window.location ='index.php'</script>";
    }else{
         $id = $_GET['mshh'];  //da lay duoc id item
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {  //submit la name cua nut submit

        $AddtoCart = $ct->add_to_cart($id,$soluong);
    }

    $count_item = $ct->count_item();

?>





        <div class="app_container">
            <div class="detail__center">
                <div class="prd-detail container-fluid">
                    <div class="row row_detail">


                        <?php
                        $get_product_by_id = $product->getproductbyId($id);
                        if($get_product_by_id){
                            
                            while($result = $get_product_by_id->fetch_assoc()){
                        ?>

                        <div class="column-7">
                                <div class="wrapper-slide">
                                    <img class="detail__img" src="admin/uploads/<?php echo $result['Hinh'] ?>" alt="Ảnh sản phẩm">
                                </div>
                        </div>

                        <div class="column-5">
                            <h4 class="detail_name"><?php echo $result['TenHH']?></h4>
                            

                            <div class="detail_price"><?php echo number_format($result['Gia'],0,',','.')." "."VND"?></div>
                            <div class="listAll_divider"></div>
                            <div class="detail_desc">
                                <?php echo $result['GhiChu']?>
                            </div>
                            <div class="listAll_divider"></div>

                            

                            <div class="add-cart">
                                
                            <form action="" method="post" class="add-cart-form">

                            <div class="detail_sizeamount">       <!--so luong-->
                                <div class="detail_amount">
                                    <span class="detail_amount-label">
                                        SỐ LƯỢNG
                                    </span>
                                </div>
                                <select class="select_amount" name="select_amount">  <!--lấy name gửi lên-->
                                    <option value="1" selected="selected">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select> 
                            </div>
                                <input type="submit" class="add-cart-submit" name="submit" value="THÊM VÀO GIỎ HÀNG">
                            </form>
                            <div class="add-cart-status">
                                <?php
                                    if(isset($AddtoCart)){
                                        echo '<i class="fas fa-check add-cart-status-check"></i><span>Sản phẩm đã thêm vào giỏ hàng</span>';
                                    }
                                ?>
                            </div>
                            
                            </div>
                        </div>

                        <?php
                    }   //while
                }   //if
                ?>
                        
                    </div>
                </div>
            </div>        
        </div>

       

<?php include 'inc/footer.php'?>