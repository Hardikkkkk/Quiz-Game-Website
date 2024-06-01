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

			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}

			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


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
	<h2>LOGIN PAGE</h2>
<br>
	<div id="box">
		
		<form method="post">
			Email:
			<input id="text" type="email" name="user_name"><br><br>
			Password:
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="LOGIN"><br><br>

			<p class="message">Not registered? <a href="signup.php">Click to Sign Up</a></p>
		</form>
	</div>
</body>
</html>