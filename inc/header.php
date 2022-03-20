<?php
    include 'lib/session.php';
    Session::init();    //khoi tao Session
?>
<?php
    
    include 'lib/database.php';
    include 'helpers/format.php';

    spl_autoload_register(function($class){
        include_once "classes/".$class.".php";  //auto lấy các file trong classes
    });
        

    $db = new Database();
    $fm = new Format();
    $ct = new cart();
    $ad = new address();
    $od = new order();
    $cs = new customer();
    $product = new product();
        
                
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/detail.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link rel="icon" href="./assets/img/logo/Logo_Ananas.png" type="image/gif" size="16x16">
    <title>ThanhToi-Shop</title>
</head>
<body>
    <div class="app">
        <!-- begin Header -->
        <div class="header container-fluid">
            <div class="row">
                <!-- header__navbar -->
                <div class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">
                                <i class="fas fa-search-plus header__navbar-item-icon"></i>
                                Tra cứu đơn hàng
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">
                                <i class="fas fa-map-marker-alt header__navbar-item-icon"></i>
                                Tìm cửa hàng
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">
                                <i class="fas fa-heart header__navbar-item-icon"></i>
                                Yêu thích
                            </a>
                        </li>

                        <li class="header__navbar-item">
                            <a href="cart.php" class="header__navbar-item-link ">
                                <i class="fas fa-shopping-cart header__navbar-item-icon"></i>
                                Giỏ hàng (<span class="countProduct">
                               
                             <?php
                                 $check_cart = $ct->check_cart();
                                    if($check_cart){
                                  $qty = Session::get("count");
                                 echo $qty;
                                 }
                                 else{
                                     echo '0';
                                 }
                                 ?>
                                </span>)
                            </a>
                        </li>

                        
                        <?php
                            if(isset($_GET['customer_id'])) 
                            {
                                $delete_all = $ct->delete_all_cart();
                                Session::destroy(); //đăng xuất, lấy từ thẻ a đăng xuất
                                
                            }
                        ?>
                        <li class="header__navbar-item header__navbar-item-user">
                        <?php
		                    	$login_check = Session::get('customer_login'); 
			                    if($login_check==false){
				                echo '<a href="login.php" class="header-login">Đăng nhập</a>';
			                    }else{
                                    //lấy customer_id để đăng xuất
                                    echo '<a href="?customer_id='.Session::get('customer_id').'" class="header-login">Đăng xuất</a>';
			                    }
			            ?>
                        </li>

                        <?php

                        ?>
                        
                    </ul>
                </div>
            </div>

            <div class="row">
                <!-- header__center -->
                <div class="header__center">    
                    <!-- header-brand -->
                    <div class="header__center-brand">
                        <a href="index.php" class="header__center-brand--link">
                            <img src="./assets/img/logo/Logo_Ananas_cut.png" alt="ananas" class="header__center-brand--img">
                        </a>
                    </div>
                    <!-- header-center-nav -->
                    <div class="header__center-nav">
                        <ul class="header__center-nav-navbar">
                            <li class="header__center-nav--dropdown">
                                <a href="index.php" class="dropdown-toggle">
                                    <span class="dropdown-toggle-text">
                                        SẢN PHẨM
                                    </span>
                                    <i class="fas fa-chevron-down dropdown-down"></i>
                                </a>
                            </li>
                            <li class="line"></li>
                            <li class="header__center-nav--dropdown">
                                <a href="#" class="dropdown-toggle">
                                    <span class="dropdown-toggle-text">
                                        NAM
                                    </span>
                                   
                                    <i class="fas fa-chevron-down dropdown-down"></i>
                                </a>
                            </li>
                            <li class="line"></li>
                            <li class="header__center-nav--dropdown">
                                <a href="#" class="dropdown-toggle">
                                   
                                    <span class="dropdown-toggle-text">
                                        NỮ
                                    </span>
                                    <i class="fas fa-chevron-down dropdown-down"></i>
                                </a>
                            </li>
                            <li class="line"></li>
                            <li class="header__center-nav--dropdown">
                                <a href="" class="dropdown-toggle">
                                    <span class="dropdown-toggle-text">
                                        SALE OF
                                    </span>
                                </a>
                            </li>
                            <li class="line"></li>
                            <li class="header__center-nav--dropdown">
                                <a href="" class="dropdown-toggle">
                                    <span class="dropdown-toggle-text">
                                        DISCOVER YOU
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- header__center-search -->
                    <div class="header__center-search">
                        <input type="text" class="header__center-search--input" placeholder="Tìm kiếm">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="header__hot-news">
                    <p class="header__hot-news--text">
                        Một đôi giày có thể thay đổi cuộc đời bạn
                    </p>
                </div>
            </div>
        </div>
        <a href="cart.php" class="cart-fixed">
            <span class="countProduct">
                   <?php
                    $check_cart = $ct->check_cart();
                    if($check_cart){
                        $qty = Session::get("count");
                        echo $qty;
                    }
                    else{
                        echo '0';
                    }
                   ?>
            </span>

            <br>
            <i class="fas fa-shopping-cart cart-fixed-icon"></i>
        </a>
        

        <div class="social">
            <a href="https://www.facebook.com/toi.nguyenthanh.9/" class="social-link" target="_blank">
                
                <i class="fab fa-facebook-f social-icon"></i>
            </a>
            <a href="https://www.instagram.com/ananasvn/" class="social-link" target="_blank">
                
                <i class="fab fa-instagram social-icon"></i>
            </a>
            <a href="https://www.youtube.com/channel/UCwJBnHPKUSdfqttFpTb9WNQ" class="social-link" target="_blank">
                
                <i class="fab fa-youtube social-icon"></i>
            </a>
        </div>
        <!-- end Header -->
