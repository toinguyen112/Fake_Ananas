<?php include 'inc/header.php'?>


<?php
    //đã khai báo cs trên header
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertCustomer = $cs->insert_customer($_POST);
    }
?>


<div class="modal">
<div class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng ký</h3>
                        <a href="login.php" class="auth-form__switch-btn">Đăng nhập</a>
                    </div>
                    <span class="notify_register">
                    <?php
                        if(isset($insertCustomer)){
                            echo $insertCustomer;
                        }
                    ?>
                    </span>

                    <form action=""  method="POST"  class="auth-form__form">

                        <div class="auth-form__group">
                            <input type="text" name="HoTenKH" class="auth-form__input" placeholder="Họ tên">
                        </div>

                        <div class="auth-form__group">
                            <input type="text" name="TenCongTy" class="auth-form__input" placeholder="Tên công ty">
                        </div>

                        <div class="auth-form__group">
                            <input type="text" name="SoDienThoai" class="auth-form__input" placeholder="Số điện thoại">
                        </div>

                        <div class="auth-form__group">
                            <input type="text" name="Email" class="auth-form__input" placeholder="Email của bạn">
                        </div>

                        <div class="auth-form__group">
                            <input type="password" name="MatKhau" class="auth-form__input" placeholder="Mật khẩu của bạn">
                        </div>

                   

                    <div class="auth-form__aside">
                        <p class="auth-form__policy-text">
                            Bằng việc đăng ký bạn đã đồng ý với ThanhToi-Shop về 
                            <a href="#" class="auth-form__text-link">Điều khoản dịch vụ</a> & 
                            <a href="#" class="auth-form__text-link">Chính sách bảo mật</a>
                        </p>
                    </div>

                    
                    <div class="auth-form__controls">
                        <a href="index.php" class="btn auth-form__controls-back">TRỞ LẠI</a>
                        <input type="submit" name="submit" class="btn btn--primary" value="ĐĂNG KÝ"></input>
                    </div>
                </div>

                </form>



            </div>
</div>

<?php include 'inc/footer.php'?>