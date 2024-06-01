<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, 
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>30th</title>

    <style>

		h1{
			text-align: center;
		}
        html {
            font-family: Arial, Helvetica, sans-serif;
            padding: 0%;
            margin: 0%;
			
        }

        body {
            padding: 0%;
			background-color: #ff9741;
			margin: 0%;
        }

        .container {
            width: 100%;
            height: 100%;
            
            position: relative;
            z-index: 1;
        }

        .navbar {
            padding: 50px;
            position: sticky;
            top: 0;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;

        }

        .endcontent {
            padding-right: 20px;


        }

        a {
            text-decoration: none;
            color: black;
            font-weight: bolder;
            font-size: larger;
        }

        h1 {
            font-size: 125px;
            text-align: center;
            margin-left: 20px;
			text-decoration:underline;
        }

        h2 {
            font-size: 27px;
            font-weight: normal;
            text-align: center;
            margin-right: 30%;
            margin-left: 30%;
        }

        p {
            text-align: center;
            font-size: large;
            font-weight: 100;
            margin-right: 20%;
            margin-left: 20%;
        }
        .chatbot img{
            padding: 10px;
            width: 200px;
            position: fixed;
            right: 0;
            bottom: 0;
            border-radius: 100px;
        }

		.button{
			margin: 0 auto;
			display:block;
			padding: 20px;
			border-radius:10px;
		}
    </style>
</head>

<body>



<div class="container">
        <div class="navbar">
		<a href="logout.php">Logout</a>
        </div>

        </div>
        <h1>Welcome! </h1>
		<h2>Hello, <?php echo $user_data['user_name']; ?></h2>
        <button class="button"><a href="quizProject.html">Go to Home Page</a></button>

        
    </div>



</body>

</html>