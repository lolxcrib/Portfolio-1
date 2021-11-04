<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Vallendar</title>
	<link rel="stylesheet" type="text/css" href="css/vava.css">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	
	
</head>
<body>
	<div class="container">
		<div class="loginHeader">
			<h1 style="font-size: 70px; color: black;">Vallendar Construction Supply</h1>
			
			<p style="color: black;">Monitoring System</p>
		</div>
		<div class="loginbody">
			<form action="" method="POST">
				<div class="loginInputcontainer">
					<label for="">USERNAME</label>
					<input placeholder="Username" type="text" name="username">
				
					<label for="">Password</label>
					<input placeholder="Password" type="Password" name="password">

					<div class="status" style="color: red;">
				<?php
				if(isset($_POST['submit'])){
					$secretKey= "6Leafd8cAAAAADWcz09YEnIuuiyYqQ6a4vJfK1_7";
					$responsKey= $_POST['g-recaptcha-response'];
					$UserIP= $_SERVER['REMOTE_ADDR'];
					$url="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responsKey&remoteip=$UserIP";


					$response = file_get_contents($url);
					$response = json_decode($response);
					if($response->success)
					{


						include 'database/db.php';
session_start();

if(isset($_SESSION['lastname/firstname/midname'])){
	header("login.php");
}


if(isset($_POST['submit'])){

	$username= $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

	$result= mysqli_query($conn, $sql);

	$row= mysqli_fetch_assoc($result);

	if($row['stat_id']==1){

		if ($row['type_id']==1 ){


					//echo "<script>alert('ADMIN') </script>";
					header('location: try.php');

					$_SESSION['lastname/firstname/midname'] = $row['lastname/firstname/midname'];

				}if ($row['type_id']==2 ){

					//echo "<script>alert('Encoder') </script>";
					$_SESSION['lastname/firstname/midname'] = $row['lastname/firstname/midname'];
					header('location: try.php');

				}if ($row['type_id']==3 ){

					//echo "<script>alert('Supervisor') </script>";
					header('location: try.php');

					$_SESSION['lastname/firstname/midname'] = $row['lastname/firstname/midname'];
				}if ($row['type_id']==4 ){
						header('location: try.php');

					//echo "<script>alert('Accounting Staff') </script>";
						header('location: try.php');

					$_SESSION['lastname/firstname/midname'] = $row['lastname/firstname/midname'];
					
				}

	}if($row['stat_id']==2){

		echo "YOUR ACCOUNT HAS BEEN DEACTIVATED!!";

		
	}else{

			if ($row['type_id']==1 ){


					//echo "<script>alert('ADMIN') </script>";
					header('location: try.php');


				}if ($row['type_id']==2 ){

					//echo "<script>alert('Encoder') </script>";
					header('location: try.php');

				}if ($row['type_id']==3 ){

					//echo "<script>alert('Supervisor') </script>";
					header('location: try.php');

				}if ($row['type_id']==4 ){
						header('location: try.php');
					//echo "<script>alert('Accounting Staff') </script>";
				}

	}

}



					}else{
					


						echo "
                               <span>Robot is not allowed!!</span>";

					}


				}

				?>
			</div>

					<div class="g-recaptcha" data-sitekey="6Leafd8cAAAAAJG2M6_ZlO8hvgKRn861zU3i7RIO">
						
					</div>

				<div class="loginButtonContainer">
					<button name="submit" type="submit">Login</button>


				</div>
				


				</div>

			</form>
			

		</div>

	</div>


</body>
</html>