<?php
session_start();
include('./../config/db.php'); 

if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {
		$query = "select * from users where user_name='".$username."' and password='".$password."' limit 1";
		$result = $conn->query($query);
		if ($result) {
			$userData = $result->fetch_assoc();
			$_SESSION['is_logged_in'] = true;
			$_SESSION['user_name'] = $userData['user_name'];
			$_SESSION['role'] = $userData['role'];
			header("Location: index.php");
			exit();
		}
    } else {
        $invalid = "Invalid password or username";
    }
	
	if (empty($_POST['user_name'])) $username_error = "Please enter username";

	if (empty($_POST['password'])) $password_error = "Please enter password";
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Jollitown: Admin - Sign In</title>
		<link rel="icon" type="image/png" href="../assets/images/favicon.png" />
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class ="login">
			<div class="profile">
				<img src="./image/jabee.png" width="200px" height="200px" style="border-radius: 50%">
			</div>
			<form method="POST" action="">
				<h2>Sign In </h2>
				<div class="group"> 
					<input id="text" type="text" name ="user_name" placeholder='Username'><i class="fa-solid fa-user"></i>
				</div>		
				<div class="group">
					<input id="password" type="password" name ="password" placeholder='Password' >
					<span> 
						<i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
					</span>
				</div>
				<div class="group"> 
					<?php if(isset($invalid)) echo $invalid; ?> 
				</div>
				<div class="group"> 
					<?php if(isset($username_error)) echo $username_error; ?> 
				</div>
				<div class="group"> 
					<?php if(isset($password_error)) echo $password_error; ?> 
				</div>
				<button type="submit" id="button" i class="fa-fa-send" value="Login" name="submit">Login</button>		
			</form>
		</div>	
		<script>
			var state= false;
			function toggle(){
				if (state){
					document.getElementById("password").setAttribute("type", "password");
					document.getElementById("eye").style.color='#7a797e';
					state = false;
				} else {
					document.getElementById("password").setAttribute("type", "text");
					document.getElementById("eye").style.color='#ff1464';
					state = true;
				}
			}
		</script>
	</body>
</html>