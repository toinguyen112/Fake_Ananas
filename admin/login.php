<?php
	include '../classes/adminlogin.php';
?>

<?php
	$class = new adminlogin();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     	$adminUser = $_POST['adminUser'];
     	$adminPass = md5($_POST['adminPass']);
     	//gọi hàm login_admin
     	$login_check = $class->login_admin($adminUser,$adminPass);
     	
	}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    
	<link rel="stylesheet" href="./css/login.css">
</head>
<body>
<div class="container">
	
		<!-- gửi dữ liệu -->
		<form class="content-form" action="login.php" method="post">
			<h1 class="content-heading">Admin Login</h1>
			<span><?php

			if(isset($login_check)){
				echo $login_check;
			}
			 ?></span>
			
			<div class="content-div">
				<input class="content-input" type="text" placeholder="Username" required="" name="adminUser"/>
			</div>
			<div class="content-div">
				<input class="content-input" type="password" placeholder="Password" required="" name="adminPass"/>
			</div>
			<div>
				<input class="content-submit" type="submit" value="Log in" />
			</div>
		</form><!-- form -->

	
</div><!-- container -->
</body>
</html>