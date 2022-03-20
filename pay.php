<?php include 'inc/header.php'?>


<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $dc = $_POST['diachi'];
        $mskh = Session::get("customer_id");
        $add_address = $ad->add_address($mskh,$dc); //thêm địa chỉ
        $add_order = $od->add_order($mskh);
    }
?>





<!-- css viết bên cart.css -->
<div class="app_container">
            <div class="detail__center">
                <div class="prd-detail container-fluid">
                    <div class="row row_detail">
                        <div class="column-7 main-left">
                            <div class="address">
                                <div class="address-heading">
                                    ĐỊA CHỈ GIAO HÀNG
                                </div>

                                <form action="" method="POST">
                                    <input type="text" name="diachi" class="address-input" placeholder="Nhập địa chỉ">
                                <div class="list-group-nextpay">
							        <input type="submit" name="submit" class="nextpay-btn" value="HOÀN TẤT ĐẶT HÀNG">
                                </div>
                                </form>
                               <?php
                                    if(isset($add_address)){
                                        echo $add_address;
                                    }
                               ?>

                                <?php
                                    if(isset($add_order)){
                                        echo $add_order;
                                    }
                               ?>
                                

                            </div>
                        </div>

                        <div class="column-5 main-right">
                            <div class="row main-right-pay">
                                <div class="pay-title">ĐƠN HÀNG</div>
                                <div class="app_container_left-divider"></div>

                                <?php
                                    $getCart = $ct->get_product_cart();
                                    if($getCart){
                                        $total = 0;
                                        $subtotal = 0;
                                        $giamgia = 0;
                                        while($result = $getCart->fetch_assoc()){
                                    
                                ?>
                                <div class="product-pay">
                                    <div class="product-pay-top">
                                        <div class="pay-top-left"><?php echo $result['TenHH']?></div>
                                        <div class="pay-top-right">
                                            <?php
                                             $total = $result['Gia']*$result['SoLuongHang'];
                                             echo number_format($total,0,',','.')." "."VND";
                                             ?>
                                        </div>
                                    </div>
                                    <div class="product-pay-bottom">
                                        <div class="pay-bottom-left"><?php echo "x"." ".$result['SoLuongHang']?></div>
                                       
                                    </div>
                                </div>

                                <?php
                                    $subtotal = $subtotal + $total;
                                    $giamgia = $result['giamgia'];
                                        }
                                    }
                                ?>

                                

                                <div class="listAll_divider list-space"></div>

                                <div class="list-group-text1">
							        <span class="text1-left">
								        Đơn hàng
							        </span>
							        <span class="text1-right">
                                       <?php
                                        echo number_format($subtotal,0,',','.')." "."VND";
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
							        <span class="list-group-total--left">TỔNG CỘNG</span>
							        <span class="list-group-total--right total-pay">
							        <?php
									    $discount = $subtotal - $subtotal*($giamgia/100);
									    echo number_format($discount,0,',','.')." "."VND";
							        ?>
							        </span>
						        </div>

                                
                            
                       
                                

						

                    </div>
                </div>
            </div>        
        </div>
</div>
<?php include 'inc/footer.php'?>