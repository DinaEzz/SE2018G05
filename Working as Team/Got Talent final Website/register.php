<?php
	$duplicate = 0;
	$flag= 0 ;    // if 0 => no error , 1 => there is an error
	$missing= [];
    $errors   = []; // array for specifying errors
    session_start();
	define("PATH", dirname(__FILE__) . "/includes/");
	require_once (PATH .'db_connection.php');
    $db     = db_connect();
    $talents = get_telents(); 
	if (isset($_POST['submit'])){
        require (PATH .'validation.php');
      
		if(!$flag){
            $send = create_user("users", $name, $mobile, $email,  $gender,  $birthday, $talent, $password);
            if (!$send){
            	if (mysqli_errno($db) == 1062){
            		$duplicate = 1;
            	}else{
            		echo mysqli_error($db);
	                db_disconnect($db);
	                exit;
            	}
            }else{
                $new_id                         = mysqli_insert_id($db);
                $new_member                     = select_member('users', $new_id);
                $new_member                     = mysqli_fetch_assoc($new_member);
                $_SESSION['name']               = $new_member['name'];
                $_SESSION['mobile']              = $new_member['mobile'];
                $_SESSION['email']              = $new_member['email'];
                $_SESSION['gender']             = $new_member['gender'];
                $_SESSION['birthday']           = $new_member['birthday'];
                $_SESSION['talent']             = $new_member['talent'];
                $_SESSION['id']                 = $new_id;    
                echo "<script>window.location.href='index.php'</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
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
						Sign Up
					</span>
				</div>

				<form class="login100-form validate-form" method="post" action= "<?= $_SERVER['PHP_SELF']?>">
                     <?php if($_POST && isset($duplicate) && $duplicate): ?>
						<p class="warning">You're Already Registered before</p>
					    <?php endif; ?>
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Full Name  </span>
                        <?php if($_POST && $flag && in_array('username', $missing)){
                                  echo '<p class="warning">Required field*</p>';
                              }elseif($_POST && $flag && in_array('username', $errors)){
                                  echo '<p class="warning">Invalid Name</p>';
                              }?>
						<input class="input100 input1000" type="text" name="name" placeholder="Name" <?php if($_POST && $flag): 
		                            echo 'value="' . htmlentities($name) . '"';
		                            endif;  
                                                                                                     ?>	>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Gender  
                       </span>
                         <?php if($_POST && $flag && in_array('gender', $missing)){
                                   echo '<p class="warning">Required field*</p>';
                               }?>
						<select style="height: 5vh;margin-bottom: 5px" class="input100" name="gender" >
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" >
						<span class="label-input100">Birth   
                        </span>
                        <?php  if($_POST && $flag && in_array('birthday', $missing)){
                                   echo '<p class="warning">Required field*</p>';
                               }?>
						<input class="input100" type="date" name="birthday">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" >
						<span class="label-input100">Mobile </span>
                        <?php if($_POST && $flag && in_array('mobile', $missing)){
                                  echo '<p class="warning">Required field*</p>';
                              }elseif($_POST && $flag && in_array('mobile', $errors)){
                                  echo '<p class="warning">Invalid Phone Number</p>';
                              }?>
						<input class="input100" name="mobile" placeholder="your number phone" <?php if($_POST && $flag): 
		                            echo 'value="' . htmlentities($mobile) . '"';
		                            endif;  
                                                                                              ?>>
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Email </span>
                        <?php if($_POST && $flag && in_array('email', $missing)){
                                  echo '<p class="warning">Required field*</p>';
                              }elseif($_POST && $flag && in_array('email', $errors)){
                                  echo '<p class="warning">Invalid email</p>';
                              }?>
						<input class="input100" type="text" name="email" placeholder="Enter Email" <?php if($_POST && $flag): 
		                            echo 'value="' . htmlentities($email) . '"';
		                            endif;  
                                                                                                   ?>>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" >
						<span class="label-input100">Your Talent 
                       </span>
                         <?php if($_POST && $flag && in_array('talent', $missing)){
                                   echo '<p class="warning">Required field*</p>';
                               }?>
						<select style="height: 5vh;margin-bottom: 5px" class="input100" name="talent" required>
							<?php while($row = mysqli_fetch_assoc($talents)){?>
                                <option value="<?=$row['t_name']?>"><?= $row['t_name'] ?></option>
                            <?php } ?>
						</select>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" >
						<span class="label-input100">Password  
                      </span>
                         <?php if($_POST && $flag && in_array('password', $missing)){
                                   echo '<p class="warning">Required field*</p>';
                               }elseif($_POST && $flag && in_array('password', $errors)){
                                   echo "<p class='warning'>Please enter a valid Length</p>";
                               }?>
						<input class="input100" type="password" name="password" placeholder="Enter password at least 8 characters"   
                       <?php if($_POST && $flag): 
		                            echo 'value="' . htmlentities($password) . '"';
		                            endif;  
                       ?>>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Re-Pass </span>
                        <?php if($_POST && $flag && in_array('repassword', $missing)){
                                  echo '<p class="warning">Required field*</p>';
                              }elseif($_POST && $flag && in_array('repassword', $errors)){
                                  echo "<p class='warning'>Password doesn't match</p>";
                              }?>
						<input class="input100" type="password" name="repassword" placeholder="Re-password">
						<span class="focus-input100"></span>
					</div>
					<!--<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>-->
					<div class="container-login100-form-btn">
						<input type="submit" name="submit" class="login100-form-btn" value="Sign Up">
							
						
					</div>
				</form>
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