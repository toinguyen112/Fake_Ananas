<?php include 'inc/header.php'?>

        <div class="app_container">
    
            <div class="prd1-cont container-fluid app_content">
                <div class="row row_content">
                    <div class="grid__column-3 column_3">
                        <!-- sex -->
                        <div class="app_container_left-type">
                            <ul class="app_container_left-type--sex">
                                <li>
                                    <a href="#" class="left-type--sex_link">TẤT CẢ</a>
                                </li>

                                <li class="left-type--sex_line"></li>

                                <li>
                                    <a href="#" class="left-type--sex_link">NAM</a>
                                </li>

                                <li class="left-type--sex_line"></li>

                                <li>
                                    <a href="#" class="left-type--sex_link">NỮ</a>
                                </li>
                            </ul>
                        </div>
                        <!-- line -->
                        <div class="app_container_left-divider"></div>

                        <!-- item -->
                        <div class="app_container_left-type--items">
                            <ul class="app_container_left-type--items-list">
                                <li class="left-type--items-list_item">
                                    <a href="" class="left-type--items-list_link">Giày</a>
                                </li>
                                <li class="left-type--items-list_item">
                                    <a href="" class="left-type--items-list_link">Nữa trên</a>
                                </li>
                                <li class="left-type--items-list_item">
                                    <a href="" class="left-type--items-list_link">Phụ kiện</a>
                                </li>
                            </ul>
                        </div>

                        <div class="app_container_left-divider"></div>


                        <div class="app_container_left-free">
                            <ul class="app_container_left-free_listAll">
                                <li class="listAll_first">
                                    <p class="listAll_first-label">TRẠNG THÁI</p>
                                    <ul class="app_container_left-type--items-list listAll_first-ul">
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">Limited Edition</a>
                                        </li>
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">Online Only</a>
                                         </li>
                                         <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">Sale off</a>
                                        </li>
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">Best Seller</a>
                                        </li>
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">New Arrival</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="listAll_divider"></li>

                                <li class="listAll_first">
                                    <p class="listAll_first-label">KIỂU DÁNG</p>
                                    <ul class="app_container_left-type--items-list listAll_first-ul">
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">Low-top</a>
                                        </li>
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">High top</a>
                                         </li>
                                         <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">Slip-top</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li class="listAll_divider"></li>

                                <li class="listAll_first">
                                    <p class="listAll_first-label">DÒNG SẢN PHẨM</p>
                                    <ul class="app_container_left-type--items-list listAll_first-ul">
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">Basas</a>
                                        </li>
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">Vintas</a>
                                         </li>
                                         <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">Pattas</a>
                                        </li>
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">Creas</a>
                                        </li>
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">Track 6</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="listAll_divider"></li>

                                <li class="listAll_first">
                                    <p class="listAll_first-label">GIÁ</p>
                                    <ul class="app_container_left-type--items-list listAll_first-ul">
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">> 600</a>
                                        </li>
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">500k - 599k</a>
                                         </li>
                                         <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">400k - 499k</a>
                                        </li>
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">300k - 399k</a>
                                        </li>
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">200k - 299k</a>
                                        </li>
                                        <li class="left-type--items-list_item">
                                            <a href="" class="left-type--items-list_link">< 200</a>
                                        </li>
                                    </ul>
                                </li>
                                
                            </ul>

                        </div>
                    </div>
                    <div class="grid__column-9 home-product">
                        <div class="column_9-big-img">
                            <img src="./assets/img/desktop_productlist.jpg" alt="Banner">
                        </div>

                        <div class="grid__row">
                        <?php
                        $pdlist_index = $product->show_product();
                        if($pdlist_index){
                            while($result = $pdlist_index->fetch_assoc()){
                        ?>


                        <div class="grid__column-4 home-product_item">
                            <a href="detail_item.php?mshh=<?php echo $result['MSHH'] ?>" class="home-product_item--link">
                                <img src="admin/uploads/<?php echo $result['Hinh'] ?>" alt="" class="home-product_item--img">
                                <div class="home-product_item--name"><?php echo $result['TenHH'] ?></div>
                                <div class="home-product_item--color"><?php echo $result['Mau'] ?></div>
                                <div class="home-product_item--price"><?php echo number_format($result['Gia'],0,',','.')." "."VND" ?></div>
                                <div class="home-product_item--favourite">
                                    <i class="far fa-heart heart-empty"></i>  
                                   <!--  add heart-solid  -->
                                </div>
                            </a>
                        </div>
                        <?php
                        }   //while
                    }       //if

                    ?>

                        </div>
                        <ul class="pagination">
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fas fa-chevron-left"></i>
                                </a>
                            </li>

                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">1</a>
                            </li>

                            <li class="pagination-item pagination-item--action">
                                <a href="" class="pagination-item__link">2</a>
                            </li>

                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">3</a>
                            </li>

                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">4</a>
                            </li>

                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">5</a>
                            </li>

                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">...</a>
                            </li>

                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>

                        

                </div>
            </div>
        </div>

        <!--  -->
        
<?php include 'inc/footer.php'?>