<?php
$flag= 0 ;
$missing= [];
$errors   = [];
session_start();
define("PATH", dirname(__FILE__) . "/includes/");
require_once (PATH .'db_connection.php');
$db     = db_connect();
$talents = get_telents();
if (isset($_POST['submit'])){
    require (PATH .'validation.php');
    if(!$flag){
        $send = select_user($name);
        if (!$send){
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }else if (mysqli_num_rows($send) == 0){
            $not_user = 1;
        }else if (mysqli_num_rows($send) != 0){
            $get                    = mysqli_fetch_assoc($send);
            $member                 = select_member('users', $get['id']);
            $member                 = mysqli_fetch_assoc($member);
            $_SESSION['name']       = $member['name'];
            $_SESSION['mobile']     = $member['mobile'];
            $_SESSION['email']      = $member['email'];
            $_SESSION['gender']     = $member['gender'];
            $_SESSION['birthday']   = $member['birthday'];
            $_SESSION['talent']     = $member['talent'];
            $_SESSION['id']         = $member['id'];
            if ($_POST['password'] == $member['password']){
                echo "<script>window.location.href='index.php'</script>";
            }else {
                $wrong_pass = 1;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter" >
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(img/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>
                <?php if(isset($not_user) && $not_user){ ?>
                <p class="warning">username or password is incorrect</p>
                <?php }else if(isset($wrong_pass) && $wrong_pass){ ?>
                <p class="warning"> Password is incorrect</p>
                <?php } ?>
                <form class="login100-form validate-form" method="post" action="<?=$_SERVER['PHP_SELF']?>">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="name" placeholder="Enter Name" />
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password" />
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" name="submit" value="login" />
                    </div>
                </form>
                <p>*username : Hadeel Ashraf </p>
                <p>*password: 12345689 </p>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/mainLogin.js"></script>

</body>
</html>