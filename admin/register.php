<?php
    include '../classes/adminlogin.php';
?>

<?php
    $adminlogin = new adminlogin();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
		$passwordR = md5($_POST['passwordR']);
        $email = $_POST['email'];

        $register = $adminlogin->insert_admin($username, $password, $email, $passwordR);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="lo/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lo/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lo/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lo/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lo/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lo/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lo/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lo/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lo/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lo/css/util.css">
	<link rel="stylesheet" type="text/css" href="lo/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form id="signup-form" method="post" action="" onsubmit="return validateForm()" class="login100-form validate-form">
					<?php
                        if(isset($register)){
                            echo $register;
                        }
			        ?>
                    <span class="login100-form-title p-b-34">
						Account REGISTER
					</span>
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20">
						<input class="input100" type="password" name="passwordR" id="confirm_password" placeholder="Repeat Password">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							User name / password?
						</a>
					</div>

					<div class="w-full text-center">
						<a href="login.php" class="txt3">
							Sign In
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('lo/images/bg3.png');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="lo/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="lo/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="lo/vendor/bootstrap/js/popper.js"></script>
	<script src="lo/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="lo/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="lo/vendor/daterangepicker/moment.min.js"></script>
	<script src="lo/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="lo/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="lo/js/main.js"></script>
	<script>
        function validateForm() {
            $password = $('#password').val();
            $confirm_password = $('#confirm_password').val();
            if ($password != $confirm_password) {
                alert("Mật khẩu không khớp, vui lòng kiểm tra lại");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>