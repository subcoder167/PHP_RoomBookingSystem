<?php

    session_start();
	error_reporting(E_ERROR | E_PARSE);
	ini_set('display_errors', 0);

	$students = json_decode($_COOKIE['Users'], true);
    
    if($_POST['Submit']){
		$nUser = $_POST['Username'];
		$nPassword = $_POST['Password'];
		$students += [ $nUser => $nPassword ];
		setcookie('Users', json_encode($students));
		header("location:login.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div>
	<div class="container">		
			<div class="student_login">
				<h2>Signup for Student</h2>
				<div>
					<form action="signup.php" method="POST" name="studentForm">
						<input type="text" placeholder="Your Name" class="input_style" name="Username"><br>
						<input type="password" placeholder="Your Password" id="newPassword" class="input_style" name="Password">
						<input type="checkbox" onclick="newPass()">Show Password<br>
						<input type="submit" name="Submit" class="sBtn"><br>
					</form>
				</div>
			</div>
			
		</div>
	</div>
	<script>
		function newPass() {
  		var x = document.getElementById("newPassword");
  		if (x.type === "password") {
    		x.type = "text";
  		} else {
    		x.type = "password";
  		}
	}
	</script>
</body>
</html>