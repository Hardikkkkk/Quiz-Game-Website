<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!-- 
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html> -->


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		body {
        background: #76b852;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
	form{
		margin:20px
	}
	
	#text{
		border-radius:10px;

		height: 40px;
		width: 100%;
		border:none;
		background-color: #e8e8e8;
	}

	#button{
		border-radius:10px;

		padding: 12px 0px 12px 0px;
		width: 50%;
		color: white;
		background-color: #4CAF50;
		border: none;

	}

	#box{
		border-radius:12px;
		background-color: white;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
	h2 {
        color: white;
        display: flex;
        justify-content: center;
        text-shadow: 1px 1px 7px #000000;
    }
	a{
		text-decoration:none;

	}

	</style>
</head>
<body>

	<br> <br>
	<h2>Sign up Page</h2>
<br>
	<div id="box">
		
		<form method="post">
			Email:
			<input id="text" type="email" name="user_name"><br><br>
			Password:
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="LOGIN"><br><br>

			<p class="message">Already registered? <a href="login.php">Click to Login in</a></p>
		</form>
	</div>
</body>
</html>