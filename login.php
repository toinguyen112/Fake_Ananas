<?php include 'inc/header.php'?>


<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $login_Customers = $cs->login_customers($_POST);
        
    }
?>

<div class="modal">
<div class="auth-form">

                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng nhập</h3>
                        <a href="register.php" class="auth-form__switch-btn">Đăng ký</a>
                    </div>


                    <span class="notify_register">
                    <?php
                        if(isset($login_Customers)){
                            echo $login_Customers;
                        }
                    ?>
                    </span>

                    <form action="" method="POST" class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" name="Email" class="auth-form__input" placeholder="Email của bạn">
                        </div>

                        <div class="auth-form__group">
                            <input type="password" name="MatKhau" class="auth-form__input" placeholder="Mật khẩu của bạn">
                        </div>

                    
                    <div class="auth-form__controls auth-form__controls-login">
                        <a href="index.php" class="btn auth-form__controls-back">TRỞ LẠI</a>
                        <input type="submit" name="login" class="btn btn--primary" value="ĐĂNG NHẬP"></input>
                    </div>

                    </form>
                </div>

            </div>
        

</div>
</div>

<?php include 'inc/footer.php'?>