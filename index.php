<?php
session_start();
$_SESSION['active'] = 'login';

include 'db.php';

if(!$conn)
{
	die('Could not connect: ' . mysqli_error($conn));
}
$error = false;
$emailError = " ";
$passError = " ";
$errMSG = "";
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$pass     = $_POST['pass'];
	if(empty($username))
	{
		$error = true;
		$emailError = "Please enter your username.";
	}
	if(empty($pass))
	{
		$error = true;
		$passError = "Please enter your password.";
	}
	if (!$error)
	{
		$password =  $pass;
		$loginQuery 	= "SELECT * FROM login WHERE username = '$username'";
		
		}
		$loginQueryRec 	= mysqli_query($conn,$loginQuery);
		$loginQueryData = mysqli_fetch_array($loginQueryRec);
		$count = mysqli_num_rows($loginQueryRec);
   if($count == 1 && $loginQueryData['pass'] == $password) {
    header("Location: Dashboard/index.php");
   } else {
	$errMSG = "Incorrect Username/Password";

   }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/css/util.css">
    <link rel="stylesheet" type="text/css" href="login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('login/images/p1.jpg'); ">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Admin Login
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="" autocomplete="off">

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username" placeholder="User name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn" name="submit">
                            Login
                        </button><br>
                        <h5 style="text-align: center;"><b><?php echo $errMSG; ?></b></h5>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/bootstrap/js/popper.js"></script>
    <script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/daterangepicker/moment.min.js"></script>
    <script src="login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="login/js/main.js"></script>

</body>

</html>