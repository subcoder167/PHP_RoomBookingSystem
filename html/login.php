<?php 

	session_start();
	error_reporting(E_ERROR | E_PARSE);
	ini_set('display_errors', 0);

	if(isset($_COOKIE['Users'])){
		$logins = json_decode($_COOKIE["Users"], true);
	} else{
		$demologins = array('student' => 'student123');
		setcookie('Users', json_encode($demologins));
	}
	

	if(isset($_POST['Submit'])) {

		$logins = json_decode($_COOKIE["Users"], true);
		
		$UserName = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

		if(isset($logins[$UserName]) && $logins[$UserName]==$Password ) {
			$_SESSION['UserStudent'] = $_POST['Username'];
			header("location:student.php");
			exit;
		}
	}
	elseif(isset($_POST['adminSubmit'])) {
		$admin = "admin";
		$a_passWord = "admin167";

		if ($_POST["adminUsername"] == $admin && $_POST["adminPassword"] == $a_passWord){
			$_SESSION['UserAdmin'] = $admin;
			header("Location:admin.php");
			exit();
		}
		else{
			echo ("<h6>Incorrect username or password!</h6>");
		}
	}
?>


<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Online Student Accommodation Management System.</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div>
		<div class="container">
		
			<div class="student_login">
				<h2>Login for Student</h2>
				<div class="student_login_container">
					<form action="login.php" method="POST" name="studentForm">
						<input type="text" placeholder="Your Name" class="input_style" name="Username"><br>
						<input type="password" placeholder="Your Password" id="sPassword" class="input_style" name="Password">
						<input type="checkbox" onclick="studentPass()">Show Password<br>
						<input type="submit" name="Submit" class="sBtn"><br>
						<a href="signup.php" id="signup_tag">Sign up?</a>
					</form>
				</div>
			</div>
			<div class="admin_login">
				<h2>Login for Admin</h2>
				<div class="admin_login_container">
					<form action="login.php" method="POST" name="adminForm">
						<input type="text" placeholder="Your Name" class="input_style" name="adminUsername"><br>
						<input type="password" placeholder="Your Password" id="aPassword" class="input_style" name="adminPassword">
						<input type="checkbox" onclick="adminPass()">Show Password<br>
						<input type="submit" name="adminSubmit" class="aBtn">
					</form>
				</div>
			</div>
			
		</div>
	</div>
	<script>
	function studentPass() {
  		var x = document.getElementById("sPassword");
  		if (x.type === "password") {
    		x.type = "text";
  		} else {
    		x.type = "password";
  		}
	}
	function adminPass() {
  		var x = document.getElementById("aPassword");
  		if (x.type === "password") {
    		x.type = "text";
  		} else {
    		x.type = "password";
  		}
	}

</script>
	<!-- <script src="./app.js"></script> -->
</body>
</html>