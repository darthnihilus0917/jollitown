	<?php

session_start();


include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	



	if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
	{
			$user_id = random_num(20);
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			

			if($result && mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);
					if($user_data['password'] == $password){



							$_SESSION['user_id'] = $user_data['user_id'];
								


							header("Location: welcome.php");
							die;


					}
			}


					$invalid = "Invalid Password or Username";
//echo '<script type="text/javascript">';
//echo ' alert("Wrong Username or Password")';  //not showing an alert box.
//echo '</script>';

		 	
	}

	else
	{

		$invalid = "invalid password or username";

	//echo '<script type="text/javascript">';
//echo ' alert("Wrong Username or Password")';  //not showing an alert box.
//echo '</script>';

			
	}



if(empty($_POST['user_name'])){
$username_error = "Please enter username";
}

if(empty($_POST['password'])){
$password_error = "Please enter password";
}









}





	?>







	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Jollitown Admin</title>
<script src="https://kit.fontawesome.com/cf7bac4322.js" crossorigin="anonymous"></script>





		<link rel="stylesheet" href="style.css">
	</head>
	<body>





		

		<div class ="login">

	

		<div class = "profile">

			<img src="jabees.png" width="200px" height="200px">







		</div>

		
					<div class="group"> 
					<?php if(isset($invalid)) echo $invalid; ?> 

						</div>
		
				<form method="post">
				<h2> Login </h2>

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

			if(state){

				document.getElementById("password").setAttribute("type", "password");
				document.getElementById("eye").style.color='#7a797e';
				state = false;

			
			}
			else{
				document.getElementById("password").setAttribute("type", "text");
				document.getElementById("eye").style.color='#ff1464';
				state = true;
			

			}
		}


	</script>








	</body>


	</html>